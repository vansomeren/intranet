<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prime Bank Intranet Portal</title>

    <link href="{{ asset('/assets/css/style.default.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/select2.css')}}" rel="stylesheet" />
    <link href="{{asset('/assets/css/datatables.min.css')}}" rel="stylesheet"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset ('/assets/js/html5shiv.js') }}"></script>

    <script src="{{ asset('/assets/js/respond.min.js') }}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <![endif]-->
</head>

<body>


<header>
    <div class="headerwrapper">
        <div class="header-left">
            <a href="index.html" class="logo">
                <img src="{{asset('/assets/images/intarnet-prime-logo.png')}}" alt="" />

            </a>
        </div><!-- header-left -->

        <div class="header-right">

            <div class="pull-right">

                <a class="btn btn-success" href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> LOGIN</a>

{{--
                <a class="btn btn-info" href="{{url('/register')}}"><i class="fa fa-lock"></i> Register</a>
--}}

            </div><!-- pull-right -->

        </div><!-- header-right -->

    </div><!-- headerwrapper -->
</header>