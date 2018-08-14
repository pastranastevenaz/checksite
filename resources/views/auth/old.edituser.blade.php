@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Edit Profile</b></div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ action('DashboardController@updateUser') }}">
                        {{ csrf_field() }}



                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>

                            <div class="col-md-6">
                                <!-- <input id="avatar" type="text" class="form-control" name="avatar" value="{{ Auth::user()->avatar }}" required autofocus> -->
                                <img class="avatar-image" style="width:70%" src="<?php echo asset("storage/images/samplefemaleavatar.jpg")?>">
                                <br><br>
                                <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span>
                                <a href='{!! url('/edituser'); !!}'><b>Upload Image</b></a>
                                @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('organization') ? ' has-error' : '' }}">
                            <label for="organization" class="col-md-4 control-label">Organization</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control" name="organization" value="{{ Auth::user()->organization }}" autofocus>

                                @if ($errors->has('organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ Auth::user()->phone }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('street_address') ? ' has-error' : '' }}">
                            <label for="street_address" class="col-md-4 control-label">Street Address</label>

                            <div class="col-md-6">
                                <input id="street_address" type="text" class="form-control" name="street_address" value="{{ Auth::user()->street_address }}" required autofocus>

                                @if ($errors->has('street_address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ Auth::user()->city }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="state" class="col-md-4 control-label">State</label>

                            <div class="col-md-6">

                                <select id="state" class="form-control" name="state" value="{{ Auth::user()->state }}" required autofocus>
                                  <ul class="dropdown-menu" aria-labelledby="state">
                                    <!-- ********************** -->
                                    <!-- ** -->
                                    <!-- ** This is Sedi's work right here <3 -->
                                    <!-- ** -->
                                    <!-- *********************** -->
                                    <li><option value="AL" href="#">Alabama</option></li>
                                    <li><option value="AK" href="#">Alaska</option></li>
                                    <li><option value="AZ" href="#">Arizona</option></li>
                                    <li><option value="AR" href="#">Arkansas</option></li>
                                    <li><option value="CA" href="#">California</option></li>
                                    <li><option value="CO" href="#">Colorodo</option></li>
                                    <li><option value="CT" href="#">Connecticut</option></li>
                                    <li><option value="DE" href="#">Delaware</option></li>
                                    <li><option value="DC" href="#">District of Columbia</option></li>
                                    <li><option value="FL" href="#">Florida</option></li>
                                    <li><option value="GA" href="#">Georgia</option></li>
                                    <li><option value="HI" href="#">Hawaii</option></li>
                                    <li><option value="ID" href="#">Idaho</option></li>
                                    <li><option value="IL" href="#">Illinois</option></li>
                                    <li><option value="IN" href="#">Indiana</option></li>
                                    <li><option value="IA" href="#">Iowa</option></li>
                                    <li><option value="KS" href="#">Kansas</option></li>
                                    <li><option value="KY" href="#">Kentucky</option></li>
                                    <li><option value="LA" href="#">Louisiana</option></li>
                                    <li><option value="ME" href="#">Maine</option></li>
                                    <li><option value="MD" href="#">Maryland</option></li>
                                    <li><option value="MA" href="#">Massachusetts</option></li>
                                    <li><option value="MI" href="#">Michigan</option></li>
                                    <li><option value="MN" href="#">Minnesota</option></li>
                                    <li><option value="MS" href="#">Mississippi</option></li>
                                    <li><option value="MO" href="#">Missouri</option></li>
                                    <li><option value="MT" href="#">Montana</option></li>
                                    <li><option value="NE" href="#">Nebraska</option></li>
                                    <li><option value="NV" href="#">Nevada</option></li>
                                    <li><option value="NH" href="#">New Hampshire</option></li>
                                    <li><option value="NJ" href="#">New Jersey</option></li>
                                    <li><option value="NM" href="#">New Mexico</option></li>
                                    <li><option value="NY" href="#">New York</option></li>
                                    <li><option value="NC" href="#">North Carolina</option></li>
                                    <li><option value="ND" href="#">North Dakota</option></li>
                                    <li><option value="OH" href="#">Ohio</option></li>
                                    <li><option value="OK" href="#">Oklahoma</option></li>
                                    <li><option value="OR" href="#">Oregon</option></li>
                                    <li><option value="PA" href="#">Pennsylvania</option></li>
                                    <li><option value="PR" href="#">Puerto Rico</option></li>
                                    <li><option value="RI" href="#">Rhode Island</option></li>
                                    <li><option value="SC" href="#">South Carolina</option></li>
                                    <li><option value="SD" href="#">South Dakota</option></li>
                                    <li><option value="TN" href="#">Tennessee</option></li>
                                    <li><option value="TX" href="#">Texas</option></li>
                                    <li><option value="UT" href="#">Utah</option></li>
                                    <li><option value="VT" href="#">Vermont</option></li>
                                    <li><option value="VA" href="#">Virgina</option></li>
                                    <li><option value="WA" href="#">Washington</option></li>
                                    <li><option value="WV" href="#">West Virginia</option></li>
                                    <li><option value="WI" href="#">Wisconsin</option></li>
                                    <li><option value="WY" href="#">Wyoming</option></li>
                                    <li role="separator" class="divider"></li>
                                    <li><option value="GU" href="#">Guam</option></li>
                                    <li><option value="VI" href="#">Virgin islands</option></li>
                                    <!-- <li><option value="AS" href="#">AS</option></li> -->
                                    <!-- <li><option value="MP" href="#">MP</option></li> -->
                                    <!-- <li><option href="#">Other</option></li> -->
                                  </ul>
                                </select>


                                <!-- <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required autofocus> -->
                                <!-- <button class="btn btn-default dropdown-toggle" type=button id="state" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                  State<span class="caret"></span>
                                </button> -->


                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('zip') ? ' has-error' : '' }}">
                            <label for="zip" class="col-md-4 control-label">Zip</label>

                            <div class="col-md-6">
                                <input id="zip" type="text" class="form-control" name="zip" value="{{ Auth::user()->zip }}" required autofocus>

                                @if ($errors->has('zip'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                                <span id="cancelupdate">
                                  | <a href='{!! url('/dashboard'); !!}'>Cancel</a>
                                </span>
                            </div>
                        </div>





                    </form>
                </div>
            </div>
        </div>
    </div>
</div>







<script>

stateSet="{{ Auth::user()->state }}";

var stateList = [
  "AL","AK", "AZ", "AR", "CA", "CO", "CT", "DE", "DC", "FL",
  "GA","HI", "ID", "IL", "IN", "IA", "KS", "KY",
  "LA","ME", "MD", "MA", "MI","MN", "MS", "MO", "MT", "NE", "NV",
  "NH" , "NJ", "NM", "NY", "NC", "ND" ,
  "OH", "OK", "OR", "PA", "PR" ,"RI" ,"SC" ,"SD" ,"TN",
  "TX","UT","VT","VA","WA","WV" ,"WI","WY","GU","VI"
  ];

var s = document.getElementById("state").selectedIndex=stateList.indexOf(stateSet);

</script>
@endsection
