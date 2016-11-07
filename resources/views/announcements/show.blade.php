@include('layouts.header')

<div class="mainwrapper">
    @include('layouts.sidebar')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-bullhorn"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="glyphicon glyphicon-bullhorn"></i></a></li>
                        <li><a href="">Annoucements</a></li>
                        <li>Roles</li>
                    </ul>
                    <h4>Show Announcements</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('announcement.index') }}"> Back</a>

            </div>

            <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Title:</strong>

                        {{ $announcement->title }}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Message:</strong>

                        {{ $announcement->message }}

                    </div>

                </div>

                <div class="col-xs-12 col-sm-12 col-md-12">

                    <div class="form-group">

                        <strong>Created By:</strong>

                        {{ $announcement->owner?$announcement->owner->email:'' }}

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>