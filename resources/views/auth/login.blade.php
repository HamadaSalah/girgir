
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ env('APP_NAME') }} | Login</title>
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('assets/') }}/css/style.css" />
  </head>
  <body>
    <header>
      <div class="row justify-content-between">
        <div class="col-lg-4 d-none d-md-block">
          <img
            src="{{ asset('assets/') }}/imgs/signup.webp"
            alt="childern"
            class="img-fluid h-100 object-fit-cover"
          />
        </div>

        <div class="col-lg-4 mx-md-auto col-md-6 mx-sm-1 vh-100 mt-4 mb-6">
          <div class="mb-3">
            <img src="{{ asset('assets/') }}/imgs/logo.svg" class="img-fluid" alt="brand logo" />
          </div>
          <form class="form p-2" method="POST" action="">
            @csrf
            <h2 class="text-primary h2 mb-3">Login</h2>
            <p class="lead mb-5">Welcome back,</p>
            <input
              type="email"
              name="email"
              value="{{ old('email') }}"
              placeholder="Email"
              class="form-control border-0 rounded-5 bg-secondary @error('email') is-invalid @else mb-3 @enderror"
            />
            @error('email')
                <div class="invalid-feedback mb-3">
                {{ $message }}
                </div>
            @enderror
            <div class="input-group align-items-start password">
              <input
                type="password"
                name="password"
                value="{{ old('password') }}"
                placeholder="Password"
                class="form-control p-2 rounded-start-5 bg-secondary border-0 @error('password') is-invalid @else mb-3 @enderror"
              />
              <button
                type="button"
                class="btn text-primary p-2 pe-3 border-0 bg-secondary rounded-end-5"
              >
                <img
                  src="{{ asset('assets/') }}/imgs/show_pass_icon.svg"
                  class="img-fluid"
                  alt="show password icon"
                />
              </button>
              @error('password')
                <div class="invalid-feedback">
                {{ $message }}
                </div>
              @enderror
            </div>
            <button class="btn btn-primary position-fixed bottom-0 end-0 m-4">
              Go To Dahsbord
            </button>
          </form>
        </div>
        <div class="col-lg-1 mt-4 d-none d-lg-block">
          <a href="#" class="btn p-4">
            <img src="{{ asset('assets/') }}/imgs/humbruger icon.svg" alt="humburger icon" />
          </a>
        </div>
      </div>
    </header>
    <script src="{{ asset('assets/') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/') }}/js/script.js"></script>
  </body>
</html>
