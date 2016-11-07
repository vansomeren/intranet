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
                <div class="pull-right" >

                    @permission('file-create')

                    <a class="btn btn-success" href="{{ route('upload.create') }}">Upload File</a>

                    @endpermission

                </div>
                {!! Form::open(['method'=>'GET','url'=>'uploaded','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                <div class="input-group" style="width: 400%">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-search"></i>
                </button>

                </span>
                </div>
                {!! Form::close() !!}



                <div class="clearfix" style="margin-bottom: 20px;"></div>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif


                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($entries as $entry)
                            <div class="table">
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$entry->original_filename}}</td>
                                    <td>{{$entry->mime}}</td>
                                    <td><a href="{{URL::to('/uploads/' . $entry->original_filename) }}" target="_blank">
                                            <button class="btn btn-primary btn-dark">
                                                <i class="fa fa-cloud-download"></i> Download</button>
                                    </td>
                                    </a>
                                </tr>
                            </div>
                        @endforeach
                    </table>
                {!! $entries->render() !!}

            </div>
            </div>
        </div>
    </div>
@include('layouts.footer')

