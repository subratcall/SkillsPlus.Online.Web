<html>

<head>
    
    <link href="{!! asset('css/app.css') !!}" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
    </script>
</head>

<body>
    <div id="app">
        <quiz-component :id="{{ request()->route('id') }}" :lid="{{ request()->route('lid') }}"></quiz-component>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>