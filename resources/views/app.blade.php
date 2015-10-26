<!-- Stored in resources/views/app.blade.php -->

<html>
    <head>
        <title> @yield('title')</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        {!! Html::style('css/style.css') !!}
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>