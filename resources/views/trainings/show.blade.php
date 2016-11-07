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
                        <li><a href="">System Administration</a></li>
                        <li>Roles</li>
                    </ul>
                    <h4>Show Roles</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('training.index') }}"> Back</a>

            </div>



            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Title:</strong>

                        {{ $training->title }}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Department:</strong>

                        {{ $training->department->name }}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Start date:</strong>

                        {{ $training->startdate}}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>End date:</strong>

                        {{ $training->enddate}}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Venue:</strong>

                        {{ $training->venue}}

                    </div>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Description:</strong>

                        {{ $training->description}}

                    </div>

                </div>




            </div>
        </div>
    </div>
</div>