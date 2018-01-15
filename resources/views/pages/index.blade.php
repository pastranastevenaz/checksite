@extends('layouts.app')
@section('content')
  <div class="jumbotron text-center">
    <h1>Thi is the index page</h1>
    <p>{{$greeting}}</p>
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
      <a class="btn btn-success btn-lg" href="/register" role="buton">Register</a></p>
  </div>



  <div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Dropdown
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
@endsection
