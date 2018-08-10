@extends('layouts.app')

@section('content')
  <div id="blog-index" class="container">
    <h1 class="text-center">Tasks</h1>

    @if(count($tasks)>0)
      @foreach($tasks as $task)
        <div class="task">
          <div class="row">
          <div class="col-md-4 col-sm-4">
            <img style="width:100%" src="/storage/cover_images/{{$task->cover_image}}">
          </div>
          <div class="col-md-8 col-sm-8">
            <h3> <a href="/tasks/{{$task->id}}"> {{$task->title}} </a> </h3>
            <small>Created on {{$task->created_at->toDayDateTimeString()}} by: <b>{{$task->user->name}}</b></small>
          </div>
        </div>
        </div>
        <br>
      @endforeach
      {{$tasks->links()}}
    @else
      <p class="text-center">No tasks Found</p>
    @endif
  </div>
@endsection
