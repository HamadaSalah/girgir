@extends('layouts.app')

@section('title' , 'User Profile')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/card.css') }}" />
@endpush

@section('content')
    <div class="container">
        <h2>User Profile</h2>


        <div class="card mt-4">
            <div class="card-body">
                <!-- Display Profile Picture -->
                <div class="text-center mb-4">
                    <img src="{{ auth()->user()->profile_picture }}" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px;">
                </div>

                <!-- Display User Information -->
                <div class="mb-3">
                    <strong>Name:</strong> {{ auth()->user()->name }}
                </div>
                <div class="mb-3">
                    <strong>Phone:</strong> {{ auth()->user()->phone }}
                </div>
                <div class="mb-3">
                    <strong>Email:</strong> {{ auth()->user()->email }}
                </div>
                <div class="mb-3">
                    <strong>Joined At:</strong> {{ auth()->user()->created_at->format('d-m-Y h:i') }}
                </div>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body text-center">
                <h5>Update Account Information</h5>
                <div class="d-flex justify-content-around mt-3">
                    <!-- Button for showing profile picture update form -->
                    <button class="btn btn-primary" onclick="toggleForm('profilePictureForm')">Update Profile Picture</button>

                    <!-- Button for showing personal information update form -->
                    <button class="btn btn-primary" onclick="toggleForm('personalInfoForm')">Update Personal Information</button>

                    <!-- Button for showing password update form -->
                    <button class="btn btn-primary" onclick="toggleForm('passwordForm')">Update Password</button>
                </div>
            </div>
        </div>

        <!-- Hidden forms -->
        <div id="profilePictureForm" class="mt-4" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <h5>Update Profile Picture</h5>
                    <form action="{{ route('profile.update-picture') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="personalInfoForm" class="mt-4" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <h5>Update Personal Information</h5>
                    <form action="{{ route('profile.update-info') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ auth()->user()->first_name }}">
                            </div>
                            <div class="col-md-6">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ auth()->user()->last_name }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ auth()->user()->phone }}">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <div id="passwordForm" class="mt-4" style="display: none;">
            <div class="card">
                <div class="card-body">
                    <h5>Update Password</h5>
                    <form action="{{ route('profile.update-password') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password">
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- JavaScript to toggle form visibility -->
        <script>
            function toggleForm(formId) {
                // Hide all forms
                const forms = ['profilePictureForm', 'personalInfoForm', 'passwordForm'];
                forms.forEach(function(id) {
                    document.getElementById(id).style.display = 'none';
                });

                // Show the selected form
                document.getElementById(formId).style.display = 'block';
            }
        </script>


    </div>
</main>
@endsection

@push('js')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
