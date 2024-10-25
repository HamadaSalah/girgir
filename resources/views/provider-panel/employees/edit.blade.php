@extends('provider-panel.layouts.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('') }}provider-panel/css/service.css" />
@endpush

@section('title', 'Edit Employee')

@section('content')
<main class="col-md-12 ms-sm-auto col-lg-12 underline mt-3">
    <div class="container">
        <h1 class="text-center">Edit Employee</h1>

        <!-- Form to edit the employee -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card p-4 shadow-sm" style="border-radius: 10px; border: 1px solid #e0e0e0;">

                    <!-- Show profile picture if available -->
                    <div class="text-center mb-4">
                        <img src="{{ $employee->avatar }}" alt="Profile Picture"
                            class="rounded-circle" style="width: 100px; height: 100px; object-fit: cover;">
                    </div>
                    <form action="{{ route('provider-panel.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') <!-- For updating -->

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $employee->name) }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Manager ID -->
                        <div class="mb-3">
                            <label for="manager_id" class="form-label">Employee ID</label>
                            <input type="text" class="form-control" id="manager_id" name="manager_id" value="{{ old('manager_id', $employee->manager_id) }}" required>
                            @error('manager_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $employee->phone) }}" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password (Leave blank if not changing)</label>
                            <input type="password" class="form-control" id="password" name="password">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Profile Picture -->
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Change Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                            @error('profile_picture')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Update Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
