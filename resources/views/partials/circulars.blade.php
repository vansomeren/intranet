 <div class="contentpanel">
            <div class="row">
                <div class="col-sm-3">
                    <h5 class="md-title">New Circularts</h5>
                    <ul class="nav nav-pills nav-stacked nav-contacts">
                        <li class="badge-success">
                            <a href="">
                                New  Circulars
                            </a>
                        </li>
                        <li class="">
                            <a href="{{route('upload.index')}}">
                                All  Circulars
                            </a>
                        </li>
                    </ul>

                    <br/>

                </div><!-- col-sm-3-->
                <div class="pull-right" >

                {!! Form::open(['method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search...">
                    <span class="input-group-btn">
            <button class="btn btn-default-sm" type="submit">
                <i class="fa fa-search"></i>
                </button>

                </span>
                </div>
                    </div>
                {!! Form::close() !!}
                <div class="col-md-9">
                    <div class="clearfix" style="margin-bottom: 20px;"></div>

                    <div class="table-responsive">


                        <table class="table table-bordered" >
                            <tr>
                        <th>Date</th>
                        <th>
                            {!! Form::open(['method'=>'GET','role'=>'search'])  !!}
                                <input type="text" class="form-control" name="search" placeholder="Search Circular Number">
                            {!! Form::close() !!}
                        </th>
                        <th>
                            {!! Form::open(['method'=>'GET','role'=>'search'])  !!}
                                <input type="text" class="form-control" name="search" placeholder="Search Subject">
                            {!! Form::close() !!}</th>
                        <th>
                            {!! Form::open(['method'=>'GET','role'=>'search'])  !!}
                                <input type="text" class="form-control" name="search" placeholder="Search Department">
                            {!! Form::close() !!}</th>
                        <th>Actions</th>
                    </tr>
                   @foreach($entries as $entry)
                            <tr>
                                <td>{{$entry->created_at}}</td>
                                <td>{{$entry->id}}</td>
                                <td>{{$entry->subject}}</td>
                                <td>{{$entry->name}}</td>
                                <td><a href="{{URL::to('/uploads/' . $entry->subject) }}" target="_blank">
                                <button class="btn btn-primary btn-dark">
                                <i class="fa fa-cloud-download"></i> Download</button>
                                </td>
                            </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
