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
    <select class="form-control" input name="state">
      @foreach($states as $state)
        <option value="{{ $state }}">{{ $state }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    {{form::label('postal_code', 'Postal Code')}}
    {{form::text('postal_code', '', ['class' => 'form-control', 'placeholder' => 'Postal Code'])}}
  </div>

  <div class="form-group">
    {{form::label('phone', 'Phone')}}
    {{form::tel('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
  </div>

  <hr>

  <!-- ### Driver's License Info -->
  <!-- ### -->
  <div class="form-group">
    {{form::label('drivers_license_type', 'Drivers License Type')}}
    <select class="form-control" input name="drivers_license_type", 1>
      @foreach($states as $state)
        <option value="{{ $state }}">{{ $state }}</option>
      @endforeach
    </select>
  </div>

  <div class="form-group">
    {{form::label('drivers_license_agency', 'Drivers Licence Agency')}}
    {{form::tel('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
  </div>

  <div class="form-group">
    {{form::label('drivers_license_number', 'Drivers Licence Number')}}
    {{form::tel('phone', '', ['class' => 'form-control', 'placeholder' => 'Phone'])}}
  </div>



    {{Form::submit('Submit', ['class' => 'btn btn-primary']) }}
{!! Form::close() !!}
</div>

@endsection
