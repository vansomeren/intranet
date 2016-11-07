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
                    <h4>System Permissions</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="row">
                <div class="pull-right" >

                    @permission('role-create')

                    <a class="btn btn-success" href="{{ route('permissions.create') }}"> Create New Permission</a>

                    @endpermission

                </div>




                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
                <div class="clearfix" style="margin-bottom: 20px;"></div>

                <table class="table table-bordered">

                    <tr>

                        <th>No</th>

                        <th>Name</th>

                        <th>Description</th>

                        <th width="280px">Action</th>

                    </tr>

                    @foreach ($permissions as $key => $permission)

                        <tr>

                            <td>{{ ++$i }}</td>

                            <td>{{ $permission->display_name }}</td>

                            <td>{{ $permission->description }}</td>

                            <td>

                                <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>

                                @permission('role-edit')

                                <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>

                                @endpermission

                                @permission('role-delete')

                                {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}

                                @endpermission

                            </td>

                        </tr>

                    @endforeach

                </table>

                {!! $permissions->render() !!}
            </div>
        </div>

    </div>
</div>
@include('layouts.footer')

