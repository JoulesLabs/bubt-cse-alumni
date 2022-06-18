@extends('admin.layouts.auth')


@section('heading', 'Login')

@section('contents')

    @if(!config('illumineadmin.sso_enabled'))
    <form method="POST" action="{{route('admin::auth.login')}}" class="needs-validation" novalidate="">
        <div class="form-group">
            <label for="email">Email</label>
            <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
            <div class="invalid-feedback">
                Please fill in your email
            </div>
        </div>

        <div class="form-group">
            <div class="d-block">
                <label for="password" class="control-label">Password</label>
                {{-- <div class="float-right">
                    <a href="auth-forgot-password.html" class="text-small">
                        Forgot Password?
                    </a>
                </div> --}}
            </div>
            <input id="password" type="password" class="form-control" name="password" minlength="6" tabindex="2" required>
            <div class="invalid-feedback">
                Please fill in your valid password
            </div>
        </div>

        {{-- <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
            </div>
        </div> --}}

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
            </button>
        </div>

        @csrf

    </form>
    @endif

    @if(config('illumineadmin.sso_enabled'))
    <div class="text-center mt-4 mb-3">
        <div class="text-job text-muted">SSO Login</div>
    </div>
    <div class="row sm-gutters">
        <div class="col-12">
            <a class="btn btn-block btn-google text-white">
                <span class="fab fa-google"></span> Google
            </a>
        </div>
    </div>
    @endif
@endsection
