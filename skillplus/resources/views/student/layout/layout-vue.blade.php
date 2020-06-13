<!doctype html>
<html class="fixed">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel - @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        @yield('page')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>