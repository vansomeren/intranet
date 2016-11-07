<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prime Bank Intranet</title>

    <link href="{{asset('/assets/css/style.default.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset ('/assets/js/html5shiv.js') }}"></script>
    <script src="{{ asset ('/assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="signin">
<section>
    @yield('content')

</section>

<script src="{{ asset ('/assets/js/jquery-1.11.1.min.js')}}"></script>
<script src="{{ asset ('/assets/js/jquery-migrate-1.2.1.min.js')}}"></script>
<script src="{{ asset ('/asset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('/assets/js/modernizr.min.js') }}"></script>
<script src="{{ asset ('/assets/js/pace.min.js') }}"></script>
<script src="{{ asset ('/assets/js/retina.mi.js') }}"></script>
<script src="{{ asset ('/assets/js/jquery.cookies.js') }}"></script>

<script src="{{ asset ('/assets/js/custom.js') }}"></script>

</body>
</html>