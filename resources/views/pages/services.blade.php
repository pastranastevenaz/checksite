@extends('layouts.app')
@section('content')
  <h1>{{$title}}</h1>
  <div id="services">
    <services></services>
  </duv>


  <!-- This page will have have 2 main forks

    =>Create new task
    =>View All Tasks (where task creator == Auth::user())

    =>Create new Subject
    =>View all Tasks (where subject creator == Auth::user()) -->

  <!-- @if(count($services)>0)
  <ul class="list-group">
    @foreach($services as $service)

    <li class="list-group-item">{{$service}}</li>

    @endforeach
  </ul>
  @endif -->
@endsection
