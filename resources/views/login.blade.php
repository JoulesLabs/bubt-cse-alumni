<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<main class="d-flex w-100">
    <div class="container d-flex flex-column">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">

                    <div class="text-center mt-4">
                        <h1 class="h2">Welcome back</h1>
                        <p class="lead">
                            Sign in to your account to continue
                        </p>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="m-sm-4">
                                <form action="/login" method="post">
                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" />
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input class="form-control form-control-lg" type="password" name="password" placeholder="Enter your password" />
                                        <small>
                                            <a href="index.html">Forgot password?</a>
                                        </small>
                                    </div>
                                    <div>
                                        <label class="form-check">
                                            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
                                            <span class="form-check-label">
              Remember me next time
            </span>
                                        </label>
                                    </div>
                                    <div class="text-center mt-3">
                                        @csrf
                                        <button type="submit" class="btn btn-lg btn-primary">Sign in</button>
                                    </div>

                                    <div class="d-block">
                                        <div class="float-right">
                                            <a href="signup" class="text-small">
                                                Signup Here!
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

<script src="js/app.js"></script>

</body>

</html>
