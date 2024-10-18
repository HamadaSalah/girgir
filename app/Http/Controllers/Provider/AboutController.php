<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\ProviderInfo;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('provider-panel.about');
    }

    public function update(Request $request)
    {
        $request->validate([
            'instagram' => 'nullable|string|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'telegram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'wechat' => 'nullable|string|max:255',
        ]);

        $providerInfo = ProviderInfo::updateOrCreate(
            ['provider_id' => auth()->user()->id],
            [
                'instagram' => $request->input('instagram'),
                'whatsapp' => $request->input('whatsapp'),
                'twitter' => $request->input('twitter'),
                'telegram' => $request->input('telegram'),
                'facebook' => $request->input('facebook'),
                'youtube' => $request->input('youtube'),
                'wechat' => $request->input('wechat'),
            ]
        );

        return redirect()->route('provider-panel.home');
    }
}
