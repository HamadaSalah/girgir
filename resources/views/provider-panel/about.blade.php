@extends('provider-panel\layouts\app')


@section('title', 'About')
@section('content')

<main class="mt-5" style="" id="pmain">
    <div class="d-flex" style="flex-direction: column;justify-content: center;align-items: center;">
        <div class="account-type-form acard">
            <h3>Account Type : <span>{{ ucfirst(auth()->user()->type) }}</span></h3>
            <form method="POST" action="">
                @csrf
                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/instagram.png" alt="Instagram Icon">
                    <label>Instagram</label>
                    <input type="text" name="instagram" value="{{ auth()->user()->info->instagram ?? '' }}" placeholder="Add your profile">
                </div>

                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/whatsapp.png" alt="WhatsApp Icon">
                    <label>WhatsApp</label>
                    <input type="text" name="whatsapp" value="{{ auth()->user()->info->whatsapp ?? '' }}" placeholder="+1 ♥ 0655555555">
                </div>

                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/tweeter.png" alt="X Icon">
                    <label>X</label>
                    <input type="text" name="twitter" value="{{ auth()->user()->info->twitter ?? '' }}" placeholder="Add your profile">
                </div>

                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/telegram.png" alt="Telegram Icon">
                    <label>Telegram</label>
                    <input type="text" name="telegram" value="{{ auth()->user()->info->telegram ?? '' }}" placeholder="Add your profile">
                </div>

                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/facebook.png" alt="Facebook Icon">
                    <label>Facebook</label>
                    <input type="text" name="facebook" value="{{ auth()->user()->info->facebook ?? '' }}" placeholder="Add your profile">
                </div>

                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/Youtube.png" alt="YouTube Icon">
                    <label>YouTube</label>
                    <input type="text" name="youtube" value="{{ auth()->user()->info->youtube ?? '' }}" placeholder="Add your profile">
                </div>

                <div class="account-row">
                    <img src="{{ asset('provider-panel') }}/imgs/Wechat.png" alt="WeChat Icon">
                    <label>WeChat</label>
                    <input type="text" name="wechat" value="{{ auth()->user()->info->wechat ?? '' }}" placeholder="Add your profile">
                </div>

                <div class="submit-row" style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>

          </div>

        <div id="acard" style="margin-top: 20px;">
            <h3 style="color: darkred;margin-top: 5px">
                Provider Details
            </h3>
            <div>
                <strong style="font-size: 0.8rem;">Name :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->name }}</small><br>
                <strong style="font-size: 0.8rem;">Date :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->created_at->format('d-m-Y') }}</small><br>
                <strong style="font-size: 0.8rem;">Invoice No :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">2136</small><br>
                <strong style="font-size: 0.8rem;">Date :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">12-3-2024</small>   <br>
                 <strong style="font-size: 0.8rem;">Email :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->email }}</small><br>
                <strong style="font-size: 0.8rem;">Licence  :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->license_number ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Phones No :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">
                    @if (auth()->user()->info && auth()->user()->info->phones)
                        {{ implode('- ', json_decode(auth()->user()->info->phones)) }}
                    @else
                        N/A
                    @endif
                </small><br>
                <strong style="font-size: 0.8rem;">Date :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">12-3-2024</small><br>
                <strong style="font-size: 0.8rem;">Country :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->country ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">City  :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->city ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Address :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->address ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">ZipCode :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->zip_code ?? 'N/A' }}</small>
            </div>
        </div>
    </div>
          </main>

@endsection
