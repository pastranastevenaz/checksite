@extends('layouts.app')

@section('content')
<div class="container">
  <a href="/posts" class="btn btn-default">Go Back</a>
  <h1>{{$post->title}}</h1>
  <img style="width:100%" src="{{$post->cover_image}}">

  <br><br>
  <div>
    <p>{!!$post->body!!}</p>
  </div>
  <hr>
  <small>Written on {{$post->created_at->toDayDateTimeString()}} by: <b>{{$post->user->name}}</b></small>
  <hr>

  @If(!Auth::guest())
  @if(Auth::user()->id == $post->user_id)
  <a href='{!! url('posts/'.$post->id.'/edit'); !!}' class="btn btn-default">Edit</a>

  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=> 'pull-right'])!!}
  {{Form::hidden('_method', 'DELETE')}}
  {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
  {!!Form::close()!!}
  @endif
  @endif
</div>
@endsection
