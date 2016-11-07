    {!! Form::open() !!}
    <div class="contentpanel">
        <div class="row">
            <div class="col-sm-3">
                <h5 class="md-title">New Announcements</h5>
                <ul class="nav nav-pills nav-stacked nav-contacts">
                    <li class="badge-success">
                        <a href="">
                            New  Announcements
                        </a>
                    </li>
                    <li class="">
                        <a href="{{route('announcement.index')}}">
                            All  Announcements
                        </a>
                    </li>
                </ul>

                <br/>

            </div><!-- col-sm-3-->
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-success mb30">
                        <thead>
                        <tr class="badge-success">
                            <th>Title</th>
                            <th>Message</th>
                            <th>Created By</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($announced as $announcement)
                            <tr>

                                <td>{{$announcement->title}}</td>
                                <td>{{$announcement->message}}</td>
                                <td>{{ $announcement->owner?$announcement->owner->email:'' }}</td>
                                <td class="table-action">
                                    <a href="" data-toggle="tooltip" title="Edit" class="tooltips"><i class="fa fa-pencil"></i></a>
                                    <a href="" data-toggle="tooltip" title="Delete" class="delete-row tooltips"><i class="fa fa-trash-o"></i></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-responsive -->
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
