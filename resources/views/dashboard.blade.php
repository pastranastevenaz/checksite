@extends('layouts.app')

@section('content')
<div class="">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">




            <div id="dashboard-info-panel" class="panel panel-default">





                <div id="admin-info-header" class="panel-heading">
                  <div class="row">
                  <div class="col-sm-4" id="panel-heading-left">
                    <img class="avatar-image" style="width:70%" src="{{ Auth::user()->avatar }}">

                    <!-- <img class="avatar-image" style="width:70%" src="<?php echo asset("storage/images/samplefemaleavatar.jpg")?>"> -->
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
                    <center><b>FINISH PROFILE!!!</b></center><br>

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
                        <span>{{ ucfirst($address->street_address) }}</span></p>
                      </li>


                    </ul>
                  </div>

                  <div class="col-sm-6" id="panel-body-right">
                    <ul>

                      <li>
                        <p class=""><b>City: </b>
                        <span>{{ ucfirst($address->city) }}</span></p>
                      </li>

                      <li>
                        <p class=""><b>State: </b>
                        <span>{{ ucfirst($address->state) }}</span></p>
                      </li>

                      <li>
                        <p class=""><b>ZIP: </b>
                        <span>{{ ucfirst($address->zip) }}</span></p>
                      </li>

                    </ul>
                  </div>

                </div>
              </div>

            </div>







            @if (Auth::user()->usertype === 2)
            <div id="dashboard-content-panel" class="panel panel-default">
                <div class="panel-heading">

                    <b><a href='{!! url('/tasks'); !!}'><span class="glyphicon glyphicon-list-alt" aria-hidden="true"> </span> Service Requests</a></b>


                  <span class="pull-right">Welcome {{ ucfirst(Auth::user()->name) }}</span>
                </div>


            </div><!-- END: content-panel -->

            @elseif (Auth::user()->usertype ===3)
              <h1>You are a Contractor</h1>

            @endif





        </div>
    </div>
</div>
@endsection
