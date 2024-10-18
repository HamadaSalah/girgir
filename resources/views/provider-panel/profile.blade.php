@extends('provider-panel.layouts.app')

@section('title', 'User Profile')

@section('content')
<main class="mt-5" id="pmain">
    <div class="container">
        <h2>User Profile</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card mt-4">
            <div class="card-body">
                <!-- Display Profile Picture -->
                <div class="text-center mb-4">
                    <img src="{{ auth()->user()->avatar }}" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px;">
                </div>

                <!-- Display User Information -->
                <div class="mb-3">
                    <strong>Name:</strong> {{ auth()->user()->name }}
                </div>
                <div class="mb-3">
                    <strong>Tag:</strong> {{ auth()->user()->tag ?? 'N/A' }}
                </div>
                <div class="mb-3">
                    <strong>Type:</strong> {{ auth()->user()->type }}
                </div>
                <div class="mb-3">
                    <strong>Description:</strong> {{ auth()->user()->description ?? 'N/A' }}
                </div>
                <div class="mb-3">
                    <strong>Phone:</strong> {{ auth()->user()->phone ?? 'N/A' }}
                </div>
                <div class="mb-3">
                    <strong>Email:</strong> {{ auth()->user()->email }}
                </div>
                <div class="mb-3">
                    <strong>Balance:</strong> ${{ number_format(auth()->user()->balance, 2) }}
                </div>
                <div class="mb-3">
                    <strong>Joined At:</strong> {{ auth()->user()->created_at->format('d-m-Y H:i') }}
                </div>
            </div>
        </div>

        <!-- Profile Picture Upload Form -->
        <div class="card mt-4">
            <div class="card-body">
                <h5>Update Profile Picture</h5>

                <form action="{{ route('provider-panel.updateProfilePicture') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Choose a new profile picture:</label>
                        <input type="file" class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture" name="profile_picture" accept="image/*">
                        @error('profile_picture')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Profile Picture</button>
                </form>
            </div>
        </div>

        <!-- Password Update Section -->
        <div class="card mt-4">
            <div class="card-body">
                <h5>Update Password</h5>

                <form action="{{ route('provider-panel.updatePassword') }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Use PUT method for updating -->

                    <div class="mb-3">
                        <label for="current_password" class="form-label">Current Password</label>
                        <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                        @error('current_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password" class="form-label">New Password</label>
                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" required>
                        @error('new_password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" required>
                        @error('new_password_confirmation')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update Password</button>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
