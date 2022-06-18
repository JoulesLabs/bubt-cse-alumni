
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ config('illumineadmin.app_name') }} | @yield('title', 'Dashboard')</title>

   @include('admin.partials.styles')

</head>

<body>
@yield('modal')    
<div id="app">
    <div class="main-wrapper">
        @include('admin.partials.header')

        @include('admin.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>@yield('heading', 'Dashboard')</h1>
                    <div class="buttons" style="margin: 0 0 -10px 20px;">
                        @yield('buttons')
                    </div>

                    @yield('breadcrumbs')

                </div>
                @include('admin.partials.alert')
                <div class="section-body">
                    @yield('contents')
                </div>
            </section>
        </div>

        @include('admin.partials.footer')
    </div>
</div>

@include('admin.partials.scripts')
@include('admin.partials.toaster')

</body>
</html>
