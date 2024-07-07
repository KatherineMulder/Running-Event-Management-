<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Running Event Management')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Add other head elements here like CSS files, meta tags, etc. -->
</head>
<body>
    @include('layouts.header')
    @include('layouts.navbar')

    <div class="container">
        @yield('content')
    </div>

    @include('layouts.footer')

    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
