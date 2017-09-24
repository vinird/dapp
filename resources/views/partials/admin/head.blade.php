<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="robots" content="all,follow">
<meta name="description" content="">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Bootstrap CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrapious/bootstrap.min.css') }}">
<!-- Google fonts - Roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
<!-- theme stylesheet-->
<link rel="stylesheet" href="{{ asset('css/bootstrapious/style.default.css') }}" id="theme-stylesheet">
<!-- Custom stylesheet - for your changes-->
<link rel="stylesheet" href="{{ asset('css/bootstrapious/custom.css') }}">
<!-- Favicon-->
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

<!-- Jquery -->
<script src="{{ asset('js/libs/jquery.min.js') }}"></script>
<!--  -->

<!-- Font Awesome CDN-->
<!-- you can replace it by local Font Awesome-->
<script src="https://use.fontawesome.com/99347ac47f.js"></script>
<!-- Font Icons CSS-->
<link rel="stylesheet" href="https://file.myfontastic.com/da58YPMQ7U5HY8Rb6UxkNf/icons.css">
<!-- Tweaks for older IEs--><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

<!-- Styles -->
<!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

<link href="{{ asset('css/libs/datepicker.min.css') }}" rel="stylesheet">
