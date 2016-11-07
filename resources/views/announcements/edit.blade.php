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
                        <li><a href="">Annoucements</a></li>
                        <li>Edit Announcement</li>
                    </ul>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">


            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('announcement.index') }}"> Back</a>

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

            {!! Form::model($announcement, ['method' => 'PATCH','route' => ['announcement.update', $announcement->id]]) !!}

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Title:</strong>

                        {!! Form::text('title', null, ['placeholder' => 'title','class' => 'form-control']) !!}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Message:</strong>

                        {!! Form::textarea('message', null, ['placeholder' => 'Description','class' => 'form-control','style'=>'height:100px']) !!}

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

