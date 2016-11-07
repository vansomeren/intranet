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
                        <li>Users</li>
                    </ul>
                    <h4>System Users</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('users.create') }}"><i class="fa fa-plus"></i> Create New User</a>

            </div>



    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif
            <table class="table table-bordered" id="users-table">
                <tr>

            <th>No</th>

            <th>Name</th>

            <th>Email</th>

            <th>Roles</th>

            <th width="280px">Action</th>

        </tr>


        @foreach ($data as $key => $user)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $user->name }}</td>

                <td>{{ $user->email }}</td>

                <td>

                    @if(!empty($user->roles))

                        @foreach($user->roles as $v)

                            <label class="label label-success">{{ $v->display_name }}</label>

                        @endforeach

                    @endif

                </td>

                <td>

                    <a class="btn btn-dark" href="{{ route('users.show',$user->id) }}">Show</a>

                    @permission('user-edit')

                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"> Edit</a>

                    @endpermission

                    @permission('user-delete')

                   {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}

                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                    {!! Form::close() !!}

                    @endpermission

                </td>

            </tr>

        @endforeach
    </table>
    {!! $data->render() !!}
</div>
    </div>
</div>
@include('layouts.footer')



