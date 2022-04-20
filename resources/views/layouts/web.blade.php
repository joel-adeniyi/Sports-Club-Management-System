<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> Westminster F.C. Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/main/favicon.png') }}">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!----css3---->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
 
</head>

<body>
    <div class=" container-fluid ">
        @yield('content')
    </div>
</body>

</html>