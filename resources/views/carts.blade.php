@extends('layouts.app')
@section('title' , 'Home Page')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/card.css') }}" />
@endpush

@section('content')


<main class="bg-main main__content">

    <div class="container cardItems">
        <div class="card-header">
            <span><a href="">Home</a>-<a href="">Card</a> </span>
            <h2>card</h2>
            <div class="col-12">
                <div class="Group40660" style="
                width: 638px;
                height: 0.5px;
                position: relative;
                transform: rotate(180deg);
                transform-origin: 0 0;
              ">
                    <div class="Line441" style="
                  width: 65.23px;
                  height: 0px;
                  left: 1px;
                  top: 5px;
                  position: absolute;
                  transform: rotate(180deg);
                  transform-origin: 0 0;
                  border: 3px #931158 solid;
                "></div>
                </div>
            </div>
        </div>
        <!-- items -->
        @if ($carts->count() > 0)
        <div class="cardItems container">
            @foreach ($carts as $cart)
                <div class="cardItem">
                    <div class="card-actions2">
                        <img src="./imgs/Group 1000004716.png" alt="" />
                    </div>
                    <div class="card-image">
                        <img src="./imgs/most1.png" alt="Pink Theme Wedding" />
                        <div class="card-actions3">
                            <img src="./imgs/Group 1000004587.png" alt="" />
                        </div>
                    </div>
                    <div class="card-content">
                        <h2>{{ $cart->cartable->name }}</h2>
                        <p class="shop-name"><strong>Name Shop:</strong> {{ $cart->cartable->provider->name }}</p>
                        <span> <strong>Details Pacckages :</strong></span>
                        <p class="details">
                            {{ $cart->cartable->description }}
                        </p>

                        <span>
                            <strong>Provider Type : </strong>
                            <span style="color: #8b8b8b">Company</span></span>
                        <p class="price"><span style="color: #8b8b8b">From /</span> {{ $cart->cartable->cost }}$</p>
                        {{-- <button class="pay-now">Pay Now</button> --}}
                    </div>
                    <div class="card-actions">
                        <form action="{{ Route('deleteMyCart', $cart) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button class="delete">
                                <img src="./imgs/Group 1000004715.png" alt="Delete" />
                            </button>
                        </form>
                    </div>
                </div>                
            @endforeach

        </div>

        <!-- items -->
    </div>

    <!-- last container -->
    <div class="container Shoppingcartdetails d-flex">
        <div class="text1">
            <p>Shoppingcartdetails</p>
        </div>
        <div class="columtext" class="Line461" style="
            width: 61px;
            height: 0px;
            transform: rotate(90deg);
            transform-origin: 0 0;
            border: 1px #aeaeae solid;
            background: #931158;
            margin-left: 25px;
          "></div>
        <div class="text2">
            <p>Sub-fee &nbsp; 0 $</p>
            <p>Service Fee&nbsp;&nbsp; :{{ $totalCost/10 }} $</p>
        </div>
        <div class="columtext" class="Line461" style="
            width: 61px;
            height: 0px;
            transform: rotate(90deg);
            transform-origin: 0 0;
            border: 1px #aeaeae solid;
            background: #931158;
            margin-left: 25px;
          "></div>
        <div class="text3">
            <p>Promo discount &nbsp; 0$</p>
            <p> Total amount &nbsp;&nbsp; {{ $totalCost+$totalCost/10 }} $</p>
        </div>

        <div class="columtext" class="Line461" style="
            width: 61px;
            height: 0px;
            transform: rotate(90deg);
            transform-origin: 0 0;
            border: 1px #aeaeae solid;
            background: #931158;
            margin-left: 25px;
          "></div>

        <div class="text4">
            <form action="{{ Route('checkout') }}" method="POST">
                @csrf
                <a  href="{{ route('stripe.checkout', ['price' => $totalCost , 'product' => '100 baloon product']) }}"  style="color: #FFF">pay now</a>

            </form>
        </div>
    </div>
    <!-- header -->
    @else
        <div class="text-center">
            <img src="{{ asset('Group 1000004395.png') }}" alt="">
        </div>
            <center class="mt-5 mb-5">Empty Card</center>
    @endif

</main>


@endsection


@push('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
