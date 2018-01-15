<nav class="navbar navbar-inverse">
     <div class="container">
       <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
           <span class="sr-only">Toggle navigation</span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
           <span class="icon-bar"></span>
         </button>
         <a class="navbar-brand" href="/">{{config('app.name', 'Tim Barber')}}</a>
       </div>
       <div id="navbar" class="collapse navbar-collapse">
         <ul class="nav navbar-nav">
           <li class=""><a href='{!! url('/'); !!}'>Home</a></li>
           <li><a href='{!! url('/about'); !!}'>About</a></li>
           <li><a href='{!! url('/services'); !!}'>Services</a></li>
           <li><a href='{!! url('/posts'); !!}'>Blog</a></li>
         </ul>
         <ul class="nav navbar-nav navbar-right">
           <li>
             <a href='{!! url('/posts/create'); !!}'>New Blog Post</a>
           </li>
         </div>
       </div><!--/.nav-collapse -->
     </div>
   </nav>
