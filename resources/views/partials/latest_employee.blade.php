    {!! Form::open() !!}
    <div class="contentpanel">
        <div class="row">
            <div class="col-sm-3">
                <h5 class="md-title">New Employees</h5>
                <ul class="nav nav-pills nav-stacked nav-contacts">
                    <li class="active-success badge-primary">
                        <a href="">
                            New  Employees
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route ('employee.index')}}">
                            All  Employees
                        </a>
                    </li>
                </ul>

                <br />

            </div><!-- col-sm-3-->

            <div class="col-sm-9">


                <div class="list-group contact-group">
                    @foreach($employed as $employee)
                        <a href="#" class="list-group-item">
                            <div class="media">
                                <div class="pull-left">
                                    <img class="img-circle img-online" src="{{asset('/assets/images/photos/user1.png')}}" alt="...">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><small>{{$employee->fullname}},{{$employee->email}}</small></h4>
                                    <div class="media-content">
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-map-marker"></i>{{$employee->branch->name}}</li>
                                            <li><i class="fa fa-briefcase"></i>{{$employee->department->name}}</li>
                                            <li><i class="fa fa-suitcase"></i>{{$employee->designation->name}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div><!-- media -->
                        </a><!-- list-group -->
                    @endforeach
                </div>
            </div>

        </div>
    </div>

</div>
{!! Form::close() !!}


<script>
    jQuery(document).ready(function(){

        // Delete row in a table
        jQuery('.delete-row').click(function(){
            var c = confirm("Continue delete?");
            if(c)
                jQuery(this).closest('tr').fadeOut(function(){
                    jQuery(this).remove();
                });
            return false;
        });

        // Show aciton upon row hover
        jQuery('.table tbody tr').hover(function(){
            jQuery(this).find('.table-action-hide a').animate({opacity: 1},100);
        },function(){
            jQuery(this).find('.table-action-hide a').animate({opacity: 0},100);
        });

    });
</script>
