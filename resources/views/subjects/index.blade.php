@extends('layouts.app')

@section('content')
  <div id="blog-index" class="container">
    <h1 class="text-center">Subjects</h1>

    @if(count($subjects)>1)
      @foreach($subjects as $subject)
        <div class="post">
          <div class="row">
          <div class="col-md-4 col-sm-4">
            <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
          </div>
          <div class="col-md-8 col-sm-8">
            <h3>
              <!-- <a href="/posts/{{$post->id}}">  -->
                {{$subject->first_name}}
              <!-- </a>  -->
            </h3>
            <!-- <small>Written on {{$post->created_at->toDayDateTimeString()}} by: <b>{{$post->user->name}}</b></small> -->
          </div>
        </div>
        </div>
        <br>
      @endforeach

    @else
      <p class="text-center">No Subjects Found for this User</p>
    @endif
  </div>
@endsection
