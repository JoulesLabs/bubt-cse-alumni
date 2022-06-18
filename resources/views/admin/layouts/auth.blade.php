
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('illumineadmin.app_name') }} | @yield('title', 'Auth')</title>

    @include('admin.partials.styles')
    <link rel="stylesheet" href="{{ asset('/illumine-admin/assets/css/bootstrap-social.css') }}">

</head>

<body>
<div id="app">
    @include('admin.partials.alert')

    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        @php $brandImage = config('illumineadmin.brand_image') @endphp
                        <img src="{{asset('/illumine-admin/images/'.$brandImage)}}" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>

                    <div class="card card-primary">
                        <div class="card-header"><h4>@yield('heading', 'Auth')</h4></div>
                        <div class="card-body">
                            @yield('contents')
                        </div>
                    </div>


                    <div class="simple-footer">
                        Copyright &copy; {{config('illumineadmin.app_name')}} 2021
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include('admin.partials.scripts')
</body>
</html>
