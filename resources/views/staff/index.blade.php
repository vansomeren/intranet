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
                        <li><a href="">Employee Management</a></li>
                        <li>Employees</li>
                    </ul>
                    <h4>Employees List</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="row">
                <div class="pull-right" >

                    @permission('role-create')

                    <a class="btn btn-success" href="{{ route('employee.create') }}"> Create New Employee</a>

                    @endpermission

                </div>
                {!! Form::open(['method'=>'GET','url'=>'employees','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
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

                        <th>Employee Number</th>

                        <th>Full Name</th>

                        <th>Email Address</th>

                        <th>Branch</th>

                        <th>Department</th>

                        <th>Designation</th>

                        <th>Employment Date</th>

                        <th width="300px">Action</th>

                    </tr>

                    @foreach ($employees as $key => $employee)

                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $employee->employee_id }}</td>
                            <td>{{ $employee->fullname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->branch->name }}</td>
                            <td>{{$employee->department->name}}</td>
                            <td>{{$employee->designation->name}}</td>
                            <td>{{$employee->employmentdate->format('Y-m-d')}}</td>
                            <td>

                                <a class="btn btn-dark" href="{{ route('employee.show',$employee->id) }}">Show</a>

                                @permission('role-edit')

                                <a class="btn btn-primary" href="{{ route('employee.edit',$employee->id) }}">Edit</a>

                                @endpermission

                                @permission('role-delete')

                                {!! Form::open(['method' => 'DELETE','route' => ['employee.destroy', $employee->id],'style'=>'display:inline']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}

                                @endpermission

                            </td>

                        </tr>

                    @endforeach

                </table>

                {!! $employees->render() !!}
            </div>
        </div>

    </div>
</div>
@include('layouts.footer')

