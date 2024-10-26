<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class StripePaymentController extends Controller
{

    public function stripe()
    {
        $product = Config::get('stripe.product');
        return view('stripe', compact('product'));
    }

    public function stripeCheckout(Request $request)
    {
        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $redirectUrl = route('stripe.checkout.success') . '?session_id={CHECKOUT_SESSION_ID}';
        $response =  $stripe->checkout->sessions->create([
            'success_url' => $redirectUrl,
            'payment_method_types' => ['link', 'card'],
            'line_items' => [
                [
                    'price_data'  => [
                        'product_data' => [
                            'name' => $request->product,
                        ],
                        'unit_amount'  => 100 * $request->price,
                        'currency'     => 'USD',
                    ],
                    'quantity'    => 1
                ],
            ],
            'mode' => 'payment',
            'allow_promotion_codes' => false
        ]);

        return redirect($response['url']);
    }

    public function stripeCheckoutSuccess(Request $request)
    {
        $stripe = new \Stripe\StripeClient(Config::get('stripe.stripe_secret_key'));

        $session = $stripe->checkout->sessions->retrieve($request->session_id);
        info($session);

        $successMessage = "We have received your payment request and will let you know shortly.";

        $carts = Cart::with('cartable')->where('user_id', auth()->user()?->id)->get();
        $totalCost = Cart::with('cartable')
        ->where('user_id', auth()->user()?->id)
        ->get()
        ->sum(function($cart) {
            return $cart->cartable->cost;
        });
        
        if($carts->count() > 0) {
              $order = Order::create([
                'user_id'=> auth()->user()->id,
                'provider_id'=> $carts[0]->cartable->provider->id,
                "date_from" => $carts[0]->time_from,
                "date_to" => $carts[0]->time_to,
                "location" => $carts[0]->location,
                "notes" => $carts[0]->notes,
                "phone_numbers" => $carts[0]->phone_numbers,
                "total" => $totalCost ?? 0,
                "gender" => $carts[0]->gender,
            ]);
            
            foreach($carts as $cart){
                $order->items()->create([
                    'orderable_type' => $cart->cartable_type,
                    'orderable_id' => $cart->cartable_id,
                ]);
                $cart->delete();
            }
         }

        return redirect()->route('home')->With('success', 'Order Successfully');

    }
}
?>
