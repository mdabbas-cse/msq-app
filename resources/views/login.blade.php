<!DOCTYPE html>
<html lang="en">

<head>

  @include('/layouts/css')

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-6 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
              </div>
              <form method="POST" class="user" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="Email" aria-describedby="email" placeholder="Enter Email Address..." name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  @error('email')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" placeholder="Password" name="password" required autocomplete="current-password">
                  @error('password')
                  <span class="text-danger" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="custom-control-label" for="remember">Remember Me</label>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>

                <hr>

                <div class="text-center">
                  <a class="small" href="{{route('forget.password.get')}}">Forgot Password?</a>
                </div>
                <!-- <div class="text-center">
                <a class="small" href="#">Create an Account!</a>
              </div> -->
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  @include('/layouts/js')

</body>

</html>