<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>@section('title') @show</title>
</head>
<body style="height: 100%;">


<div class="wrapper" style=" min-height: 100%;flex-direction: column;">
    <div class="header" style="flex-grow: 1;">
        @yield('menu')
    </div>
    <div style="display: flex;flex-direction: column;">

        @yield('content')
        </div>

        @yield('footer')

</div>
</body>
</html>
