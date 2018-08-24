@extends('layouts.app')

@section('content')
  <div class="container">
<h1>Create New Subject</h1>

{!! Form::open(['action' => 'SubjectController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
  <div class="form-group">
    {{form::label('first_name', 'First Name')}}
    {{form::text('first_name', '', ['class' => 'form-control', 'placeholder' => 'First Name'])}}
  </div>

  <div class="form-group">
    {{form::label('middle_name', 'Middle Name or Initial')}}
    {{form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Middle Name'])}}
  </div>

  <div class="form-group">
    {{form::label('last_name', 'Last Name')}}
    {{form::text('last_name', '', ['class' => 'form-control', 'placeholder' => 'Last Name'])}}
  </div>

  <div class="form-group">
    {{form::label('street_address', 'Street Address')}}
    {{form::text('street_address', '', ['class' => 'form-control', 'placeholder' => 'Street Address'])}}
  </div>

  <div class="form-group">
    {{form::label('city', 'City')}}
    {{form::text('city', '', ['class' => 'form-control', 'placeholder' => 'City'])}}
  </div>

  <div class="form-group">
    {{form::label('state', 'State')}}
    echo Form::select('size', ['L' => 'Large', 'S' => 'Small'], null, ['placeholder' => 'Pick a size...']);


  </div>






    {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
</div>

@endsection
