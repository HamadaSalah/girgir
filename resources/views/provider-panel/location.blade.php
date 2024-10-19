@extends('provider-panel\layouts\app')

@section('title', 'Location')
@section('content')

<main class="mt-5" id="pmain">
    <div class="d-flex" style="flex-direction: column; justify-content: center; align-items: center;">
        <div class="account-type-form acard">
            <h3>Account Type : <span>{{ ucfirst(auth()->user()->type) }}</span></h3>
            <form method="POST" action="">
                @csrf

                <div class="account-row">
                    <label>Country</label>
                    <input type="text" name="country" value="{{ old('country', auth()->user()->info->country ?? '') }}" placeholder="Enter your country">
                    @error('country')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account-row">
                    <label>City</label>
                    <input type="text" name="city" value="{{ old('city', auth()->user()->info->city ?? '') }}" placeholder="Enter your city">
                    @error('city')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account-row">
                    <label>Address</label>
                    <input type="text" name="address" value="{{ old('address', auth()->user()->info->address ?? '') }}" placeholder="Enter your address">
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account-row">
                    <label>Province</label>
                    <input type="text" name="province" value="{{ old('province', auth()->user()->info->province ?? '') }}" placeholder="Enter your province">
                    @error('province')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account-row">
                    <label>Zip Code</label>
                    <input type="text" name="zip_code" value="{{ old('zip_code', auth()->user()->info->zip_code ?? '') }}" placeholder="Enter your zip code">
                    @error('zip_code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account-row">
                    <label>Latitude</label>
                    <input type="text" name="lat" value="{{ old('lat', auth()->user()->info->lat ?? '') }}" placeholder="Enter latitude">
                    @error('lat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="account-row">
                    <label>Longitude</label>
                    <input type="text" name="lng" value="{{ old('lng', auth()->user()->info->lng ?? '') }}" placeholder="Enter longitude">
                    @error('lng')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="submit-row" style="text-align: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>

        <div id="acard" style="margin-top: 20px">
            <h3 style="color: darkred; margin-top: 5px">
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
                <small style="font-size: 0.8rem; margin-left: 5px;">12-3-2024</small><br>
                <strong style="font-size: 0.8rem;">Email :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->email }}</small><br>
                <strong style="font-size: 0.8rem;">Licence :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->license_number ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Phones No :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">
                    @if (auth()->user()->info && auth()->user()->info->phones)
                        {{ implode('- ', json_decode(auth()->user()->info->phones)) }}
                    @else
                        N/A
                    @endif
                </small><br>
                <strong style="font-size: 0.8rem;">Country :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->country ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">City :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->city ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Address :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->address ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Province :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->province ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">ZipCode :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->zip_code ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Latitude :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->lat ?? 'N/A' }}</small><br>
                <strong style="font-size: 0.8rem;">Longitude :</strong>
                <small style="font-size: 0.8rem; margin-left: 5px;">{{ auth()->user()->info->lng ?? 'N/A' }}</small>
            </div>
        </div>
    </div>
</main>

@endsection
