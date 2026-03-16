@include('layouts.partials.header')
<title>Custom Bootstrap | Log in</title>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="/login" class="h1"><b>Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="{{ route('process_login') }}" method="POST">
                    @csrf

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif(session('danger'))
                        <div class="alert alert-danger">{{ session('danger') }}</div>
                    @endif

                    <div class="input-group mb-3">
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" id="password" class="form-control"
                            placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Remember Me</label>
                            </div>
                        </div>
                    </div>

                    <div class="social-auth-links text-center mt-2 mb-3">
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-user"></i> Login
                        </button>
                    </div>
                </form>

                <p class="mb-1">
                    <a href="#">Forgot my password</a>
                </p>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
</body>

</html>