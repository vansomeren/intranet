@extends('layouts.login')

@section('content')
    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="{{ asset ('assets/images/prime-bank-logo.png') }}" alt="Prime Bank Logo" >
            </div>
            <br />
            <h4 class="text-center mb5">Already a Member?</h4>
            <p class="text-center">Sign in to your account</p>
            <div class="mb30"></div>
            @if ($message = Session::get('success'))

                <div class="alert alert-success">

                    <p>{{ $message }}</p>

                </div>

            @endif


            @if ($message = Session::get('warning'))

                <div class="alert alert-warning">

                    <p>{{ $message }}</p>

                </div>

            @endif

            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group">

                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="email address">

                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        <span>{{ $errors->first('email') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="input-group mb15">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="password"/>

                            @if ($errors->has('password'))
                                    <div class="alert alert-danger">

                                        <span>{{ $errors->first('password') }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>


                <div class="clearfix">
                            <div class="pull-left">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-sign-in"></i> Login
                                </button>

                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
