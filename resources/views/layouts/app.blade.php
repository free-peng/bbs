<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
<header>
    <div class="container">
        <nav class="nav">
            <a class="nav-link active" href="#">Active</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link" href="#">Link</a>
            <a class="nav-link disabled" href="#">Disabled</a>
        </nav>
    </div>
</header>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p style="margin-top:15px;">
                    <strong>Powered by free-peng/bbs</strong>
                    &nbsp;&nbsp;
                </p>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
