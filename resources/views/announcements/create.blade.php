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
                        <li><a href="">Announcements</a></li>
                        <li>Add announcements</li>
                    </ul>
                    <h4>Add Announcements</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->


        <div class="contentpanel">

            <div class="row">

                {!! Form::open(['route' => 'announcement.create']) !!}

                <div class="col-md-16">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!--<div class="panel-btns">
                                <a href="" class="panel-minimize tooltips" data-toggle="tooltip" title="Minimize Panel"><i class="fa fa-minus"></i></a>
                                <a href="" class="panel-close tooltips" data-toggle="tooltip" title="Close Panel"><i class="fa fa-times"></i></a>
                            </div><!-- panel-btns -->
                            <h4 class="panel-title">Announcements:</h4>
                            <p>Create a new announcement</p>
                        </div><!-- panel-heading -->
                        <div class="panel-body">
                            <div class="pull-right" style="margin:10px;">

                                <a class="btn btn-primary" href="{{ route('announcement.index') }}"> Back</a>

                            </div>
                            <div class="row">
                                <div class="form-group  @if($errors->has('title'))has-error @endif">
                                    <div class="col-sm-12">{!! Form::text('title',null , ['class' => 'form-control  form-control-solid placeholder-no-fix', 'autocomplete' => 'off',
                                    'placeholder' => '' . trans('labels.announcement').'*' ]) !!}
                                        @foreach($errors->get('title') as $error)
                                            <span class="help-block">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                </div>

                            </div><!-- row -->
                            <div class="@if($errors->has('message'))has-error @endif">

                                {!! Form::textarea('message', null, ['class' => 'form-control', 'required' => '', 'placeholder' => ' '. trans('labels.message'). ' *']) !!}
                            </div>

                        </div>
                    </div><!-- panel-body -->
                    <div class="panel-footer">
                        <button class="btn btn-primary">Add Announcement</button>
                    </div><!-- panel-footer -->
                </div><!-- panel -->
                {!! Form::close() !!}

            </div><!-- col-md-6 -->


        </div><!-- contentpanel -->

    </div>
</div><!-- mainwrapper -->


</div>
@include('layouts.footer')