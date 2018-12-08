@extends('layouts.app')

@section('content')
<div class="container">
  <center><h2>Websites</h2></center>
  @foreach ($websites as $website)
  <p>{{$website->url}}</p>
  @endforeach


  <br>
  <div class="row">
    <div class="col-md-5 col-md-offset-2">
      <center><h1>Tickets and Services</h1></center>
    </div></div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <a href="{{ url('tickets/create') }}" class="btn btn-default btn-lg btn-block">New Request Ticket</a>
      </div>
    </div>
  </div>

</div>
<br>
<div class="row">
  <div class="col-md-8 col-md-offset-2">


    @foreach ($tickets as $ticket)
    <div id="dashboard-info-panel" class="panel panel-default">



      <div id="admin-info-body" class="row">
        <div id="profileComplete">

          <!-- @if(Auth::user()->profileComplete == 0)
          <center><b>FINISH PROFILE!!!</b></center><br>

          @endif -->

        </div>

        <div class="row">

          <div class="col-sm-6" id="panel-body-left">
            <ul>
              <li>
                <p class=""><b>Ticket ID: </b>
                  <span>T-{{ $ticket->id }}</span></p>
                </li>

                <li>
                  <p class=""><b>Website: </b>
                    <span>{{ $ticket->website->url }}<span>
                    </li>

                    <li>
                      <p class=""><b>Created: </b>
                        <span>{{ \Carbon\Carbon::parse($ticket->created_at)->format('F j, Y, g:i a') }} UTC</span>
                      </li>


                    </ul>
                  </div>

                  <div class="col-sm-6" id="panel-body-right">
                    <ul>


                      <button class="btn btn-default btn-lg" id="more-button">More info</button>


                    </ul>
                  </div>

                </div>




              </div>

            </div>
            @endforeach












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
        <center><h1>Available Jobs Near You</h1></center>
        <!-- <div id="alljobs" class="text-center"> -->

        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <alljobs></alljobs>
          </div>
        </div>
        @endif


      </div>
      @endsection
