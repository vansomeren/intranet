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
                        <li><a href="">Create</a></li>
                        <li>Training</li>
                    </ul>
                    <h4>Create Training</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('training.index') }}"> Back</a>

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

            {!! Form::open(['route' => 'training.store','method'=>'POST']) !!}

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Training Title:</strong>

                        {!! Form::text('title', null, ['placeholder' => 'Training Title','class' => 'form-control', 'autocomplete' => 'off']) !!}

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

                        <strong>Start Date:</strong>


                        {!! Form::text('startdate',null,['class'=>'date form-control']) !!}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>End Date:</strong>


                        {!! Form::text('enddate',null,['class'=>'date form-control']) !!}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Training Venue:</strong>

                        {!! Form::text('venue', null, ['placeholder' => 'Training Venue','class' => 'form-control', 'autocomplete' => 'off']) !!}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Training Description:</strong>

                        {!! Form::textarea('description', null, ['placeholder' => 'Training Description','class' => 'form-control', 'autocomplete' => 'off']) !!}

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




