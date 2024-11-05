
@extends('auth.layout')

@section('title', 'Dashboard')

@section('content')
  <div id="main-wrapper" class="auth-customizer-none">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100">
      <div class="position-relative z-index-5">
        <div class="row">
        <div class="col-xl-7 col-xxl-8">
    <a href="#" class="text-nowrap logo-img d-block px-4 py-9 w-100">
        <img src="{{ asset('assets/logo.png') }}" class="dark-logo" alt="Logo-Dark" width="150" height="50" />
        <img src="{{ asset('assets/logo.png') }}" class="light-logo" alt="Logo-light" width="150" height="50" />
    </a>
    <div class="d-none d-xl-flex align-items-center justify-content-center h-n80">
        <img src="{{ asset('assets/login-security.svg') }}" alt="modernize-img" class="img-fluid" width="500" height="auto">
    </div>
</div>


          <div class="col-xl-5 col-xxl-4">
            <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
              <div class="auth-max-width col-sm-8 col-md-6 col-xl-7 px-4">
                <h2 class="mb-1 fs-7 fw-bolder">Welcome</h2>
                <p class="mb-7">Jamuki</p>

                <form method="POST" action="{{ route('login') }}">

                  @csrf
                  
                  <div class="mb-3">
                    <label for="employee_id" class="form-label">Employee ID</label>
                    <input id="employee_id" type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required autofocus>
                    @error('employee_id')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>

                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label class="form-check-label text-dark fs-3" for="remember">
                        Remember this Device
                      </label>
                    </div>
                    @if (Route::has('password.request'))
                      <a class="text-primary fw-medium fs-3" href="{{ route('password.request') }}">Forgot Password?</a>
                    @endif
                  </div>

                  <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">Sign In</button>
                </form>
                
                <div class="d-flex align-items-center justify-content-center">
                  <p class="fs-4 mb-0 fw-medium">New ?</p>
                  <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an account</a>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function handleColorTheme(e) {
      document.documentElement.setAttribute("data-color-theme", e);
    }
  </script>
@endsection

