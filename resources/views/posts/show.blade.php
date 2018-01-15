@extends('layouts.app')

@section('content')
  <a href="/posts" class="btn btn-default">Go Back</a>
  <h1>{{$post->title}}</h1>
  <div>
    <p>{!!$post->body!!}</p>
  </div>
  <hr>
  <small>written on {{$post->created_at->toDayDateTimeString()}}</small>
  <hr>
  <a href='{!! url('posts/'.$post->id.'/edit'); !!}' class="btn btn-default">Edit</a>

  <!-- <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a> -->

@endsection
