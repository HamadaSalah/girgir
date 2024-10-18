<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ProviderInfo;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        return view('provider-panel.location');
    }

    public function update(Request $request)
{
    // Validate the new location fields
    $request->validate([
        'country' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'province' => 'nullable|string|max:255',
        'zip_code' => 'nullable|string|max:20',
        'lat' => 'nullable|numeric',
        'lng' => 'nullable|numeric',
    ]);

    $providerInfo = ProviderInfo::updateOrCreate(
        ['provider_id' => auth()->user()->id],
        [
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'address' => $request->input('address'),
            'province' => $request->input('province'),
            'zip_code' => $request->input('zip_code'),
            'lat' => $request->input('lat'),
            'lng' => $request->input('lng'),
        ]
    );

    return redirect()->route('provider-panel.home')->with('success', 'Location updated successfully.');
}

}
