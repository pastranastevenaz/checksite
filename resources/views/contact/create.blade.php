{!! Form::open(['route' => 'contact.store']) !!}

<div class="form-group">
  {!! Form::label('name', 'Your Name') !!}
  {!! form::text('name', null, ['class' => 'form-controll']) !!}
</div>

<div class="form-controll">
  {{!! Form::label('email', 'Email Address') !!}}
  {{!! Form::text('email', null, ['class' => 'form-controll']) !!}}
</div>

<div class-="form-controll">
  {{!! Form::textarea('msg', null, ['class' => 'form-controll']) !!}}
</div>

{{!! Form::submit('Submit', ['class' => 'btn btn-info']) !!}}

{!! Form::close() !!}
