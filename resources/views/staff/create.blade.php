@include('layouts.header')
<div class="mainwrapper">
    @include('layouts.sidebar')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-briefcase"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="glyphicon glyphicon-users"></i></a></li>
                        <li><a href="">Staff</a></li>
                        <li>Members</li>
                    </ul>
                    <h4>Create Staff</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>

            </div>



            @if (count($errors) > 0)

                <div class="alert alert-danger">

                    <strong>Whoops!</strong> There were some problems with your input.<br><br>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            {!! Form::open(['route' => 'employee.store','method'=>'POST']) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Employee Number:</strong>
                        {!! Form::text('employee_id', null, ['placeholder' => 'Employee Number','class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Full Name:</strong>
                        {!! Form::text('fullname', null, ['placeholder' => 'Full Name','class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Email Address</strong>
                        {!! Form::email('email', null, ['placeholder' => 'Email Address','class' => 'form-control', 'autocomplete' => 'off']) !!}
                    </div>

                </div>

              <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Branch:</strong>
                        {!! Form::select('branch_id',(['0' => 'Select a Branch'] + $branches),null,['class' => 'form-control']) !!}
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Department:</strong>
                        {!! Form::select('department_id',(['0' => 'Select a Department'] + $departments),null,['class' => 'form-control']) !!}
                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Designation:</strong>
                        {!! Form::select('designation_id',(['0' => 'Select a Designation'] + $designations),null,['class' => 'form-control']) !!}
                    </div>

                </div>
               <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">
                        <strong>Employment Date:</strong>
                        {!! Form::text('employmendate',null,['class'=>'date form-control']) !!}
                    </div>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>

            </div>

            {!! Form::close() !!}
        </div>
    </div>
</div>

@include('layouts.footer')




