@extends('layouts.app')
@section('content')
<div id="header-area" class="container-fluid">
  <center>
    <h1 id="header-text-1" class="animated fadeInUp">
      <span><img class="header-icon" alt="Automation icon" id="nav-logo" src="{{ 'storage/images/auto.png' }}"></span> Automation
    </h1>
  </center>
  <br><br>
  <center>
    <h1 id="header-text-2" class="animated fadeInUp">
      <span><img class="header-icon" alt="Web Development icon" id="nav-logo" src="{{ 'storage/images/web.png' }}"></span> Web Development
    </h1>
  </center>
  <br><br>
  <center>
    <h1 id="header-text-3" class="animated fadeInUp">
      <span><img class="header-icon" alt="Cloud Consulting icon" id="nav-logo" src="{{ 'storage/images/r.png' }}"></span> Cloud Consulting
    </h1>
  </center>
  <br><br>
  <center>
    <h5 id="header-text-4" class="animated fadeInUp">
      And More...
    </h5>
  </center>



@include('pages.indexcomponents.downarrow')
<br>
<br>
<br>
@include('pages.indexcomponents.about')
<br>
@include('pages.indexcomponents.menu')
<br>
<br>
@include('pages.indexcomponents.help')
<br>
<div class="container">
<div class="row">
  <div class="col-md-8 offset-md-2">
    <div class="container">
      <br>
      <center><h3 class="red-text">Haminastu | The Team</h3></center><br>
      <center>
      <p>We are a small, dedicated team striving to not only meet, but exceed your expectations. </p>
      <p>Led by our company founders. our team consists of designers, developers, SEO marketers, and more. </p>
    </center>
    <center>
      <p>Whatever the need, whatever the project. We are there... </p>
    </center>
      <hr><br>
    </div>
  </div>
  </div>
</div>

<br>
@include('pages.indexcomponents.contact')
<br>
<br>
</div>
@include('pages.indexcomponents.testimonials')

@endsection
