@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="text-center">My Tickets</h1>

  <a href="/tickets/create"><button>New</button></a>

  @if(count($services)>0)
  @foreach($services as $service)

  <ul>
    <li>
      <a href="/services/{{$service->id}}">
        <div class="post">
          <div class="row">
            <div class="col-md-4 col-sm-4">
              <p><b>Street Address: </b>{{ $service->street_address }}, {{ $service->city }}, {{ $service->state }}</p>
              <p><b>Date Requested: </b>{{  \Carbon\Carbon::parse($service->created_at)->format('F j, Y, g:i a') }}</p>
            </div>
            <div class="col-md-4 col-sm-4">
              <p><b>Service Agent: </b>{{ $service->city }}</p>
              <p><b>Street Address: </b>{{ $service->state }}</p>
            </div>
          </div>
        </div>
      </a>
    </li>
  </ul>

  @endforeach
  @endif
@endsection
