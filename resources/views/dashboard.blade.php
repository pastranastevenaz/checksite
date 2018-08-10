@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">












            <div id="dashboard-info-panel" class="panel panel-default">





                <div id="admin-info-header" class="panel-heading">
                  <div class="row">
                  <div class="col-sm-4" id="panel-heading-left">
                    <img class="avatar-image" style="width:70%" src="<?php echo asset("storage/images/samplefemaleavatar.jpg")?>">
                    <br><br>
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    <a href='{!! url('/edituser'); !!}'><b>Edit Profile</b></a>
                  </div>
                  <div class="col-sm-8" id="panel-heading-right">
                    <ul>
                      <li>
                        <h5 class=""><b>Username: </b>
                        <span>{{ ucfirst(Auth::user()->name) }}</span></h5>
                      </li>

                      <li>
                        <h5 class=""><b>Email: </b>
                        <span>{{ Auth::user()->email }}</span></h5>
                      </li>
                      <li>
                        <h5 class=""><b>Member Since: </b>
                        <span>{{ Auth::user()->created_at }}</span></h5>
                      </li>


                    </ul>
                  </div>
                </div>
              </div>




              <div id="admin-info-body" class="row">
                <div id="profileComplete">

                  @if(Auth::user()->profileComplete == 0)
                    <b>FINISH PROFILE!!!</b>

                  @endif

                </div>
                <div class="row">

                  <div class="col-sm-6" id="panel-body-left">
                    <ul>
                      <li>
                        <p class=""><b>Organization: </b>
                        <span>{{ ucfirst(Auth::user()->organization) }}</span></p>
                      </li>

                      <li>
                        <p class=""><b>Phone: </b>
                        <span>{{ ucfirst(Auth::user()->phone) }}</span></p>
                      </li>
                      <li>
                        <p class=""><b>Street Address: </b>
                        <span>{{ ucfirst(Auth::user()->street_address) }}</span></p>
                      </li>


                    </ul>
                  </div>

                  <div class="col-sm-6" id="panel-body-right">
                    <ul>

                      <li>
                        <p class=""><b>City: </b>
                        <span>{{ ucfirst(Auth::user()->city) }}</span></p>
                      </li>

                      <li>
                        <p class=""><b>State: </b>
                        <span>{{ ucfirst(Auth::user()->state) }}</span></p>
                      </li>

                      <li>
                        <p class=""><b>ZIP: </b>
                        <span>{{ ucfirst(Auth::user()->zip) }}</span></p>
                      </li>

                    </ul>
                  </div>

                </div>
              </div>

            </div>


















            <div id="dashboard-content-panel" class="panel panel-default">
                <div class="panel-heading">

                    <b><a href='{!! url('/tasks'); !!}'><span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span> Dashboard</a></b>


                  <span class="pull-right">Welcome {{ ucfirst(Auth::user()->name) }}</span>
                </div>



                <!-- <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{!! url('/posts/create')!!}" class="btn btn-primary">Create Post</a>
                    <h3> Your Blog Posts</h3>
                    @if(count($posts)>0)
                      <table class="table table-striped">
                        <tr>
                          <th>Title</th>
                          <th></th>
                          <th></th>
                        </tr>
                        @foreach($posts as $post)
                          <tr>
                            <td>{{$post->title}}</td>
                            <td><a href="{!! url('/posts/'.$post->id.'/edit') !!}" class="btn btn-default">Edit</a></td>
                            <td>
                              {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                              {!!Form::close()!!}
                            </td>
                          </tr>
                        @endforeach
                      </table>
                    @else

                    <center><p>You have no blog posts....</p></center>
                    @endif
                </div> -->
            </div><!-- END: content-panel -->




        </div>
    </div>
</div>
@endsection
