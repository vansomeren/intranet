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
                        <li>View Announcements</li>
                    </ul>
                    <h4>View Announcements</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="row">
                <div class="pull-right" >

                    @permission('role-create')

                    <a class="btn btn-success" href="{{ route('announcement.create') }}"> Create New Announcement</a>

                    @endpermission

                </div>
                <div class="clearfix" style="margin-bottom: 20px;"></div>
                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif

                <table class="table table-bordered">

                    <tr>

                        <th>No</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th>Created By</th>
                        <th width="280px">Action</th>

                    </tr>

                    @foreach ($announcements as $key => $announcement)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{$announcement->title}}</td>
                            <td>{{$announcement->message}}</td>
                            <td>{{ $announcement->owner?$announcement->owner->email:'' }}</td>
                            <td>
                                @can('show',$announcement)
                                <a class="btn btn-dark" href="{{ route('announcement.show',$announcement->id) }}">Show</a>
                                @endcan
                                @can('update',$announcement)
                                <a class="btn btn-primary" href="{{ route('announcement.edit',$announcement->id) }}">Edit</a>
                                @endcan

                                @can('delete',$announcement)

                                {!! Form::open(['method' => 'DELETE','route' => ['announcement.destroy',$announcement->id],'style'=>'display:inline']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}

                                @endcan

                            </td>

                        </tr>
                    @endforeach

                </table>

                {!! $announcements->render() !!}
            </div>
        </div>

    </div>
</div>
@include('layouts.footer')

