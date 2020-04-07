<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <header-first></header-first>
        <header-second></header-second> 
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <catalog-component></catalog-component>
            </div>
            <div class="col-md-8">
                <carousel-component> </carousel-component>
            </div>
            
            <div class="col-md-12">
                <br/><br/>
                <card-component></card-component>
            </div>
            <div class="col-md-12">
                <footer-component></footer-component>
            </div>
        </div>
        </div>
    </div>  
</body>
</html>