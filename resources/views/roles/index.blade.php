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
                    <h4>System Roles</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="row">
            <div class="pull-right" >

                @permission('role-create')

                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>

                @endpermission

            </div>

                {!! Form::open(['method'=>'GET','url'=>'roles','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                <div class="input-group">
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

            <th>Description</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($roles as $key => $role)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $role->display_name }}</td>

                <td>{{ $role->description }}</td>

                <td>

                    <a class="btn btn-dark" href="{{ route('roles.show',$role->id) }}">Show</a>

                    @permission('role-edit')

                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>

                    @endpermission

                    @permission('role-delete')

                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                    @endpermission

                </td>

            </tr>

        @endforeach

    </table>

    {!! $roles->render() !!}
                </div>
            </div>

    </div>
</div>
@include('layouts.footer')

