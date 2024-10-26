<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Jobs\CreateWithdrawalJob;
use App\Models\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{

    public function index() {

        $chats = Chat::with(['messages', 'user'])->where('provider_id', auth()->user()->id)->get();

        return view('provider-panel.chat.index', compact('chats'));
    }
}
