
<div class="leftpanel">

    <h5 class="leftpanel-title">Menus</h5>
    <ul class="nav nav-pills nav-stacked">
{{--
        <li class="active"><a href="{{route('/')}}"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
--}}
        <li>
            <a href ="{{route ('announcement.index')}}">
                <i class="fa fa-bullhorn"></i>
                <span>Announcements</span>
            </a>
        </li>
     {{--   <li class="parent"><a href=""><i class="fa fa-upload"></i> <span>Upload</span></a>
            <ul class="children">
                 --}}{{--<li><a href="{{route('leave.create')}}">Apply Leave</a></li>--}}{{--
                  <li><a href="{{route('fileentry')}}">Upload Files</a></li>
                <li><a href="{{route('fileentry')}}">View Upload</a></li>
            </ul>
        </li>--}}
        <li class=""><a href="{{route('upload.index')}}"><i class="fa fa-users"></i> <span>Human Resource Forms</span></a>
{{--
        <li class="list-group panel">
            <a href="#demo3" class="list-group-item" data-toggle="collapse" data-parent="#MainMenu">
                <i class="fa fa-suitcase"></i> Human Resource</a>
            <ul class="collapse" id="demo3">
                <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">
                    <i class="fa fa-calendar"></i> Leave Management</a>
                <ul class="collapse list-group-submenu" id="SubMenu1">
                    <a href="#" class="list-group-item" data-parent="#SubMenu1">Leave Application</a>
                    <a href="#" class="list-group-item" data-parent="#SubMenu1">Leave Allowance</a>
                </ul>

                <a href="#demo4" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">
                    <i class="fa fa-money"></i> Remuneration</a>
                <ul class="collapse" id="demo4">
                    <a href="" class="list-group-item">Salary Advance</a>
                    <a href="" class="list-group-item">Reimbursements</a>
                </ul>
                <a href="" class="list-group-item"><i class="fa fa-file-text-o"></i> Loan Application</a>
                <a href="#demo5" class="list-group-item list-group-item" data-toggle="collapse" data-parent="#MainMenu">
                    <i class="fa fa-medkit"></i> Medical</a>
                <ul class="collapse" id="demo5">
                    <a href="" class="list-group-item">Medical Claim</a>
                </ul>

            </ul>

            </li>--}}
        <li class=""><a href="{{route('employee.index')}}"><i class="fa fa-users"></i> <span>Employee Management</span></a>

        </li>
        <li class=""><a href="{{route('training.index')}}"><i class="fa fa-graduation-cap"></i> <span>Trainings</span></a>

        </li>
        <li class="parent"><a href=""><i class="fa fa-user-md"></i> <span>System Administration</span></a>
            <ul class="children">
                <li><a href="{{ route('users.index') }}"><i class="fa fa-users"></i> Manage Users</a></li>
                <li><a href="{{ route('roles.index') }}"><i class="fa fa-cog"></i> Manage Roles</a></li>
                <li><a href="{{ route('permissions.index') }}"><i class="fa fa-lock"></i> Manage Permissions</a></li>

            </ul>
        </li>
    </ul>

</div><!-- leftpanel -->






