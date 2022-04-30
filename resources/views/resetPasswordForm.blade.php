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
                <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                <p class="mb-4">We get it, stuff happens. Just enter your email address below
                  and we'll send you a link to reset your password!</p>
              </div>
              <div class="alert alert-success" role="alert">
                uakdev
              </div>
              <form class="user" method="POST" action="{{ route('forget.password.post') }}">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" aria-describedby="email" autofocus placeholder="Enter Email Address...">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password" aria-describedby="password" autofocus placeholder="Enter Password.">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="confirm-password" aria-describedby="confirm-password" autofocus placeholder="Enter Confirm Password...">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Reset Password
                </button>
              </form>
              <hr>

              <div class="text-center">
                <a class="small" href="{{route('login')}}">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  @include('/layouts/js')

</body>

</html>