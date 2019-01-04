@extends('layouts.app')
@section('content')
<div class="container">
  <h1>{{$title}}</h1><br>
  <center>
    <h3 style="color: #555;">We are your one stop shop for anything and everything web and technology related.
      Check out some of the things we offer.</h3><br><hr>
  </center>
  <center><h3 class="red-text">Website Design/Development Services</h3></center>
  <ul class="service-list">
    <span><li>Service</li>Price</p></span>
    <li>Service</li>
    <li>Service</li>
  </ul>


  <center><h3 class="red-text">Self Hosting Service</h3></center>
  <center><h4 class="purple-text">Just need some space to host your website or application?</h4></center>
  <br>
  <p style="margin-left: 26px;">We've got exactly that. Simple and stable hosting options you can bundle with firewall options to secure your content</p>
  <p style="margin-left: 26px;">We offer Linux/Centos hosting, featuring the easy to use cPanel control panel, to best manage your website hosting space.
  If Windows is you is your flavor of choice, we offer Windows hosting featuring the easy to use PLesk Onyx control panel</p>
  <p style="margin-left: 26px;"><b>Coming Soon: </b>Linux/Ubuntu hosting with Easy Control Panel.</p>
  <p style="margin-left: 26px;"><b>What you get: </b>An initial consultation and setup. Ongoing patches and access to discounted rates to our additional products and services</p>
  <br>
  <ul class="service-list">
    <li>Service <span>Price</p></span></li>
    <li>Service</li>
    <li>Service</li>
  </ul>

  <br>

  <center><h3 class="red-text">Managed Hosting Service</h3></center>
  <center><h4 class="purple-text">Want a dedicated administrator to manage your site and hosting. </h4></center>
  <br>
  <p style="margin-left: 26px;"><span class="purple-text">We've got that too! </span>Managed web hosting. This is painless web-hosting redefined.</p>
  <p style="margin-left: 26px;">On all our managed hosting packages, we offer Linux/Centos hosting, featuring the easy to use cPanel control panel, to best manage your website hosting space.
  If Windows is you is your flavor of choice, we offer Windows hosting featuring the easy to use PLesk Onyx control panel</p>
  <p style="margin-left: 26px;"><b>Coming Soon: </b>Linux/Ubuntu hosting with Easy Control Panel.</p>
  <p style="margin-left: 26px;"><b>What you get: </b></p>
  <br>
  <br>
  <ul class="service-list">

    <li id="admin" class="you-get purple-text">A dedicated account admin</li>
    <br>
    <li id="security" class="you-get purple-text">Website Firewall and Security</li>
    <br>
    <li id="updates" class="you-get purple-text">Ongoing Regular Updates</li>
    <br>
    <li id="design" class="you-get purple-text">Design Updates</li>
    <br>
    <li id="troubleshooting" class="you-get purple-text">Fixes and Troubleshooting</li>

  </ul>

  <br>

  <div style="padding: 60px;" class="row">

      <div class="col-md-4 service-card">

         <div class="">
           <center><h4 class="purple-text">Linux/Centos Hosting with cPanel</p></center>
         </div>
         <br>
         <ul>
           <li>Malware Cleanup</li>
           <li>6 Hour Response time</li>
           <li>Blacklist Removal</li>
         </ul>
         <h4 class="service-card-price red-text"><b>Starting at $50.00</b> /monthly</h4>
     </div>



     <div class="col-md-4 service-card">

        <div class="">
          <center><h4 class="purple-text">Windows Hosting with Plesk</h4></center>
        </div>
        <br>
        <ul>
          <li>Malware Cleanup</li>
          <li>24 Hour Response time</li>
          <li>Blacklist Removal & Monitoring</li>
          <li>Application Firewall</li>
          <li>Denial of Service Protection</li>
        </ul>
        <h4 class="service-card-price red-text"><b>Starting at $60.00</b> /monthly</h4>
    </div>

    <div class="col-md-4 service-card">

       <div class="">
         <center><h4 class="purple-text">High Availability Hosting w/ AWS</h4></center>
       </div>
       <br>
       <ul>
         <li>Malware Cleanup</li>
         <li>24 Hour Response time</li>
         <li>Blacklist Removal & Monitoring</li>
         <li>Application Firewall</li>
         <li>Denial of Service Protection</li>
       </ul>
       <h4 class="service-card-price red-text"><b>Starting at $160.00</b> /monthly</h4>
   </div>



  </div>


  <br>


  <center><h3 class="red-text">Website Security</h3></center>
  <center><h4 class="purple-text">Website cleanup. Ongoing protection and firewalls</h4></center>
  <br>
  <p style="margin-left: 26px;">Proactive and reactive website malware cleanup and protection.</p>
  <p style="margin-left: 26px;">Has your website been compromised. Do you suspect malicious content has made it's way in?
  Let our website security service deliver the peace of mind you deserve, so can focus on your online presence. Let us worry about keeping you safe online.</p>
  <p style="margin-left: 26px;"><b>Options: </b></p>
  <br>
  <div style="padding: 60px;" class="row">

      <div class="col-md-5 col-sm-offset-1 service-card">

         <div class="">
           <center><h4 class="purple-text">One time cleanup</p></center>
         </div>
         <br>
         <ul>
           <li>Malware Cleanup</li>
           <li>6 Hour Response time</li>
           <li>Blacklist Removal</li>
         </ul>
         <h4 class="service-card-price red-text"><b>$20.00</b> one time</h4>
     </div>



     <div class="col-md-5 col-sm-offset-1 service-card">

        <div class="">
          <center><h4 class="purple-text">Ongoing protection</h4></center>
        </div>
        <br>
        <ul>
          <li>Malware Cleanup</li>
          <li>24 Hour Response time</li>
          <li>Blacklist Removal & Monitoring</li>
          <li>Application Firewall</li>
          <li>Denial of Service Protection</li>
        </ul>
        <h4 class="service-card-price red-text"><b>$50.00</b> every 3mo</h4>
    </div>



  </div>



<br><br>

<center><h3 class="red-text">Reach out or Chat for a Consulting Session</h3></center>
<contact></contact>
<br><br>
</div>



@endsection
