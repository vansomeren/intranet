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
                        <li><a href="">Training Management</a></li>
                        <li>Training</li>
                    </ul>
                    <h4>Training List</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->

        <div class="contentpanel">
            <div class="row">
                <div class="pull-right" >

                    @permission('role-create')

                    <a class="btn btn-success" href="{{ route('training.create') }}"> Create New Training</a>

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

                        <th>Training Title</th>

                        <th>Department</th>

                        <th>Start Date</th>

                        <th>End Date</th>

                        <th>Venue</th>

                        <th>Description</th>

                        <th width="300px">Action</th>

                    </tr>

                    @foreach ($trainings as $key => $training)

                        <tr>

                            <td>{{ ++$i }}</td>

                            <td>{{ $training->title }}</td>

                            <td>{{ $training->department->name }}</td>

                            <td>{{ $training->startdate}}</td>

                            <td>{{ $training->enddate}}</td>

                            <td>{{ $training->venue}}</td>

                            <td>{{ $training->description }}</td>

                            <td>
                                @can('update',$training)
                                    <a class="btn btn-success" href="{{ route('training.apply',$training->id) }}"> Apply</a>
                                @endcan


                                    <a class="btn btn-dark" href="{{ route('training.show',$training->id) }}"> Show</a>

                                @permission('role-edit')

                                <a class="btn btn-primary" href="{{ route('training.edit',$training->id) }}">Edit</a>

                                @endpermission

                                @permission('role-delete')

                                {!! Form::open(['method' => 'DELETE','route' => ['training.destroy', $training->id],'style'=>'display:inline']) !!}

                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

                                {!! Form::close() !!}

                                @endpermission

                            </td>

                        </tr>

                    @endforeach

                </table>

                {!! $trainings->render() !!}
            </div>
        </div>

    </div>
</div>
@include('layouts.footer')

