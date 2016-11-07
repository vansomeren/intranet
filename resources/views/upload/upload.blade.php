@include('layouts.header')
<div class="mainwrapper">
    @include('layouts.sidebar')
    <div class="mainpanel">
        <div class="pageheader">
            <div class="media">
                <div class="pageicon pull-left">
                    <i class="fa fa-folder-open"></i>
                </div>
                <div class="media-body">
                    <ul class="breadcrumb">
                        <li><a href=""><i class="glyphicon glyphicon-folder-close"></i></a></li>
                        <li><a href="">Files</a></li>
                        <li>Uploaded Files</li>
                    </ul>
                    <h4>Uploaded Files</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
            <div class="row">
                @permission('file-create')
            <form action="{{route('upload.store', [])}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

                <div class="form-group">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Name:</strong>

                            {!! Form::text('subject', null, ['placeholder' => 'Subject','class' => 'form-control']) !!}

                        </div>

                    </div>

                <input type="file" name="filefield" style="margin:10px;">
                    <div class="col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group">

                            <strong>Department</strong>

                            {!! Form::select('filetype_id',
                                (['0' => 'Select a Form Type'] + $filetype),
                                     null,
                                     ['class' => 'form-control']) !!}
                        </div>

                    </div>
                </div>
                <div class="panel-footer">
                    <button class="btn btn-primary btn-success"><i class="fa fa-cloud-upload"></i>Upload</button>
                </div><!-- panel-footer -->
            </form>
                @endpermission
                </div>
            </div>
    </div>
    </div>
@include('layouts.footer')

