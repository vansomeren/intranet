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

                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

            </div>

        </div>
            <div class="clearfix" style="margin-bottom: 20px;"></div>




            <div class="form-group">

                <strong>Name:</strong>

                {{ $role->display_name }}

            </div>



            <div class="form-group">

                <strong>Description:</strong>

                {{ $role->description }}

            </div>



            <div class="form-group">

                <strong>Permissions:</strong>

                @if(!empty($rolePermissions))

                    @foreach($rolePermissions as $v)

                        <label class="label label-success">{{ $v->display_name }}</label>

                    @endforeach

                @endif

            </div>

        </div>

    </div>
    </div>
@include('layouts.footer')


