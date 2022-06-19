<!DOCTYPE html>
<html lang="en">

<head>
    @include('app.partials.head')
</head>

<body>
<div class="wrapper">
    @include('app.partials.nav')

    <div class="main">
        @include('app.partials.top')

        <main class="content">
            <div class="container-fluid p-0">
                <div class="mb-3">
                    <h1 class="h3 d-inline align-middle">@yield('heading', 'Dashboard')</h1>
                    <a class="badge bg-dark text-white ms-2">
                        @yield('sub_heading')
                    </a>
                </div>
                @yield('contents')
            </div>
        </main>

        @include('app.partials.footer')
    </div>
</div>

@include('app.partials.scripts')

</body>

</html>
