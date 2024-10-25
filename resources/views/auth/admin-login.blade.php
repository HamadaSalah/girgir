<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} | Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>
<header>
    <div class="row justify-content-between">
        <div class="col-lg-4 d-none d-md-block">
            <img src="{{ asset('imgs/signup.webp') }}" alt="children" class="img-fluid h-100 object-fit-cover" />
        </div>

        <div class="col-lg-4 mx-md-auto col-md-6 mx-sm-1 vh-100 mt-4 mb-6">
            <div class="mb-3">
                <a href="{{Route('home')}}"><img src="{{ asset('imgs/logo.svg') }}" class="img-fluid" alt="brand logo" /></a>
            </div>

            <!-- Update the form action to the correct route for login -->
            <form class="form p-2" method="POST" action="">
                @csrf
                <h2 class="text-primary h2 mb-3">Login</h2>
                <p class="lead mb-5">Welcome back,</p>

                <!-- Company ID Input -->
                <input
                    type="text"
                    name="company_id"
                    value="{{ old('company_id') }}"
                    placeholder="Company ID"
                    class="form-control border-0 rounded-5 bg-secondary @error('company_id') is-invalid @else mb-3 @enderror"
                />
                @error('company_id')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                @enderror

                <!-- Manager ID Input -->
                <input
                    type="text"
                    name="manager_id"
                    value="{{ old('manager_id') }}"
                    placeholder="Manager ID"
                    class="form-control border-0 rounded-5 bg-secondary @error('manager_id') is-invalid @else mb-3 @enderror"
                />
                @error('manager_id')
                    <div class="invalid-feedback mb-3">{{ $message }}</div>
                @enderror

                <!-- Password Input -->
                <div class="input-group align-items-start password">
                    <input
                        type="password"
                        name="password"
                        placeholder="Password"
                        class="form-control p-2 rounded-start-5 bg-secondary border-0 @error('password') is-invalid @else mb-3 @enderror"
                    />
                    <button type="button" class="btn text-primary p-2 pe-3 border-0 bg-secondary rounded-end-5">
                        <img src="{{ asset('imgs/show_pass_icon.svg') }}" class="img-fluid" alt="show password icon" />
                    </button>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Forgot Password and Remember Me -->
                <div class="d-flex justify-content-between align-items-center my-3">
                    <div>
                        <input type="checkbox" name="remember" id="remember" />
                        <label for="remember">Remember me</label>
                    </div>
                    <a href="#" class="text-primary">Forgot your password?</a>
                </div>

                <!-- Submit Button -->
                <button class="btn btn-primary w-100 rounded-5 mb-3">Login</button>

                <!-- Admin Manager Login Button -->
                <a href="{{ route('users.login') }}" class="btn btn-secondary w-100 rounded-5">User login</a>
            </form>
        </div>

        <div class="col-lg-1 mt-4 d-none d-lg-block">
            <a href="#" class="btn p-4">
                <img src="{{ asset('imgs/humbruger icon.svg') }}" alt="hamburger icon" />
            </a>
        </div>
    </div>
</header>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
