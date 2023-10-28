<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title') - Admin</title>
    @include('partials.style')
    @stack('style')
</head>

<body>
    @include('sweetalert::alert')
    <script src="{{ asset('assets/static/js/initTheme.js') }}"></script>
    <div id="app">

        @include('partials.sidebar')

        <div id="main" class='layout-navbar navbar-fixed'>
            <header>
                @include('partials.navbar')
            </header>
            <div id="main-content">

                @yield('content')

            </div>
            @include('partials.footer')
        </div>
    </div>

    @include('partials.script')
    @stack('script')
</body>

</html>
