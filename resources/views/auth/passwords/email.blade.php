@extends('layouts.login')

<!-- Main Content -->
@section('content')
    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="{{ asset ('assets/images/prime-bank-logo.png') }}" alt="Prime Bank Logo" >
            </div>
            <br />
            <h4 class="text-center mb5">Reset Password</h4>
            <div class="mb30"></div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
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

                        <div class="form-group col-sm-12">
                            <div class="col-md-16">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

@endsection
