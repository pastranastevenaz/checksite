@extends('layouts.app')

@section('content')
  <div class="container">
    <h4><b>Service Agent: </b>{{ $service->agent->name }}</h4>
    <h5><b>Agent Rating: </b> RATING GOES HERE { $service->agent->rating } </h5>
    <h5><b>Street Address: </b>{{ $service->street_address }}, {{ $service->city }}, {{ $service->state }}</h5>
    <hr>
    <p><b>Service Request Date: </b>September 20, 2018</p>
    <p><b>Service Request Time: </b> 7:00 pm</p>
    <small><b>Requested: </b>{{ \Carbon\Carbon::parse($service->created_at)->format('F j, Y, g:i a') }}</small>
    <hr>
    <h2>Details</h2>
    <br>
    <h4>Bedrooms</h4>

    @if ($service->bedroom0 > 0)
      <p>Bedroom 1: {{ $service->bedroom0 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom1 > 0)
      <p>Bedroom 2: {{ $service->bedroom1 == "1" ? "Essential" : "Premium" }} </p>
    @endif

    @if ($service->bedroom2 > 0)
      <p>Bedroom 3: {{ $service->bedroom2 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom3 > 0)
      <p>Bedroom 4: {{ $service->bedroom3 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom4 > 0)
      <p>Bedroom 5: {{ $service->bedroom4 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom5 > 0)
      <p>Bedroom 6: {{ $service->bedroom5 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom6 > 0)
      <p>Bedroom 7: {{ $service->bedroom6 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom7 > 0)
      <p>Bedroom 8: {{ $service->bedroom7 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom8 > 0)
      <p>Bedroom 9: {{ $service->bedroom8 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bedroom9 > 0)
      <p>Bedroom 10: {{ $service->bedroom9 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    <br>
    <h4>Bathrooms</h4>

    @if ($service->bathroom0 > 0)
      <p>Bathroom 1: {{ $service->bathroom0 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bathroom1 > 0)
      <p>Bathroom 2: {{ $service->bathroom1 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bathroom2 > 0)
      <p>Bathroom 3: {{ $service->bathroom2 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bathroom3 > 0)
      <p>Bathroom 4: {{ $service->bathroom3 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if ($service->bathroom4 > 0)
      <p>Bathroom 5: {{ $service->bathroom4 == "1" ? "Essential" : "Premium" }}</p>
    @endif

    <br>
    <h4>Kitchen</h4>

    @if ($service->kitchen > 0)
      <p>Kitchen: {{ $service->kitchen == "1" ? "Essential" : "Premium" }}</p>
    @endif

    <br>
    <h4>Dining Room</h4>
    @if ($service->diningroom > 0)
      <p>Dining Room: {{ $service->diningroom == "1" ? "Essential" : "Premium" }}</p>
    @endif

    <br>
    <h4>Living Room</h4>
    @if ($service->livingroom > 0)
      <p>Living Room: {{ $service->livingroom == "1" ? "Essential" : "Premium" }}</p>
    @endif

    <br>
    <h4>Garage</h4>
    @if ($service->garage > 0)
      <p>Garage: {{ $service->garage == "1" ? "Essential" : "Premium" }}</p>
    @else
      <p>No Garage Service</p>
    @endif

    <!-- Additional Rooms -->
    <br>
    <h3>Additional Rooms</h3>
    <br>

    @if (!is_null($service->extraroom1_name))
      <p>{{ $service->extraroom1_name }}: {{ $service->extraroom1_level == "1" ? "Essential" : "Premium" }}</p>
    @endif

    @if (!is_null($service->extraroom2_name))
      <p>{{ $service->extraroom2_name }}: {{ $service->extraroom2_level == "1" ? "Essential" : "Premium" }}</p>
    @endif
  </div>
@endsection
