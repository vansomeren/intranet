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
                    <h4>Show Roles</h4>
                </div>
            </div><!-- media -->
        </div><!-- pageheader -->
        <div class="contentpanel">
            <div class="row">

                <div class="pull-right">

                    <a class="btn btn-primary" href="{{ route('employee.index') }}"> Back</a>

                </div>

            </div>
            <div class="clearfix" style="margin-bottom: 20px;"></div>




            <div class="form-group">

                <strong>Employee Number:</strong>

                {{ $employee->employee_id }}

            </div>



            <div class="form-group">

                <strong>Full Name:</strong>

                {{ $employee->fullname }}

            </div>
            <div class="form-group">

                <strong>Email:</strong>

                {{ $employee->email }}

            </div>
            <div class="form-group">

                <strong>Branch:</strong>

                {{ $employee->branch->name }}

            </div>
            <div class="form-group">

                <strong>Department:</strong>

                {{ $employee->department->name }}

            </div>
            <div class="form-group">

                <strong> Designation:</strong>

                {{ $employee->designation->name }}

            </div>
            <div class="form-group">

                <strong>Employment Date:</strong>

                {{ $employee->employmentdate->format('Y-m-d') }}

            </div>


        </div>

    </div>
</div>
@include('layouts.footer')


