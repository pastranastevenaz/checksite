@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-default">Go Back</a>
  <h1>{{$post->title}}</h1>
  <div>
    <p>{!!$post->body!!}</p>
  </div>
  <hr>
  <small>Written on {{$post->created_at->toDayDateTimeString()}} by: <b>{{$post->user->name}}</b></small>
  <hr>
  <a href='{!! url('posts/'.$post->id.'/edit'); !!}' class="btn btn-default">Edit</a>


  {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'=> 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
  {!!Form::close()!!}
  <!-- <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a> -->

@endsection