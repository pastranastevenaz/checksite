
## About

Background Check


LARAVEL Base app





### JOURNAL

#### 2018-08-09

Worked on the Account profile admin and edit pages.. I think I found a great layout for now. PHPMyadmin in the top left of the screen. I've got the application on the bottom left. And taking up the entire right side, I've got my text editor Atom, and an Atom plugin enabled terminal Sitting bottom right.

I'm working on the login for whether the application considers the user's profile complete or not.

This is a lot of fun. Pretty challenging but fun. I've been on this particular feature for about 2 days now.


#### 2018-08-10

Today I added a link and icon to the adshboard on the profile page. It now links
to a newly created tasks resource; specifically the index of all the tasks
belonging to the Auth::user() .

I used the artisan make resource tool in order to scaffold the tasks. Using
that reminds me of ruby generate scaffold command in rails. I'm proud of what
I've done today. I think tomorrow I will continue to add the rest of the views
and functions to the Takscontroller.

I'm putting off the avatar upload. I feel it will be eaier to just store the
avatars on local storage. Im just afraid that wont scal. I just dont want  to
dedicate too  much time to figuring how I'll off shot that somewhere.

I'm thinking trynig to use some kind of clode block storage for thise, as
long as I can find something affordable.


#### 2018-08-13

It's been a few days since I've worked on this. Hopefully I can make some
decent progress today. I plan on working on the layout of the services page to
start out with. However, i believe I'll start with the avatar upload feature.

--

So I decided to use an AWS s# bucket for the avatar images.First thing I did was
go create a new empty bucket in my AWS acct.

It took me several hours to even figure out how to connect to, upload, and
display an image  using s3. Wow! I can't stand AWS documentation.It's pretty
much useless.

After a few hours spent trying to figure out the elementary task of connecting to
s3 with it's odd user documentation, I was able to start working on the form and
image upload for the avatar feature. I would use the Starage:: fascade to save
the file to s3, use a little PHP ninjacraft to generate the absolute URL to the
s3 object, and saved that to the database, with a default avatar as fallback.

Next I need to figure out a way to delete the old image, during an updated.

Well, that was not too difficult. Just enclosed a Storage:: delete fascade within
a if(old_filename != 'default_filename'){ delete it }; This day beat the crap out
of me. I've historically had a hard time wrapping my mind around Amazon's API,
but I'm glad I stuck with it. I feel fairly accomplished today.




#### 2018-08-17

I woke up pretty early this moring. I woke up at 5AM. I went to the gym for an
hour, then came back home to focus on finally learning to use this Sterling API
I recently got test keys to. I hate to admint, but I was really doubting my ability
to learn to use this. I've consumed APIs before, but never tried consuming one
that required authenticaiton headers; much less Oauth2. I thought I would have
an easier time trying to learn to use this API if I used a Postman. Mind you,
I've never use Postman.

Mind you, I've never used Postman. {{ Link to what is Postman }}. It took me
about 3 hours of clumbsily fumbling around with it to finally figure out how
to use Postman to generate an HTTP request and add the corect Auth headers to
generate an authentication token.

Fast forward another few hours, and I finally figured out hot to make
authenticated requests to all the API endpoints.

You can check out my walkthrough of how to connect to the Sterling API _link("here")

By that time I had to go to my actual job.

Fast forward to later that day. I finally got on the computer and added a new
migration to include a default value avater for the Auth::user . I also added
authentication requirement to the services page, and a redirect back to the
dashboard if the Auth::user did not have a completed profile.

Not sure what I'll work on tomorrow, but I'm looking forward to it.

#### 2018-08-18


I decided to use this codebase as the codebase for the house cleaning app.

#### 2018-10-19

I haven't appended to the journal in quite some time, but I've added quite a bit
to this app in the last coupke of months. Although, progress is still slow. I've
added the features to register the user. I've added the feature to request a service,
which is all done using Ajax, via VueJS. Lately I've been working on a feature where
a client can add a new address while in the middle of requesting a service. So far I
have the DOM updating correctly. When the address form is filled out, I have it
console log the address data. Next I need to work on sending that data to the server.

Once the address data gets to the server, I must validate it, and get the geolocation,
and then save all tha tdata to the server, and be certain to link that to the
Authenticated user's profile.

This project has been quite a long trudge. I've recently also started experimenting
with Flutter. I think I'm going to use that as the application framework for the
mobile app. Although, I'm on the fence, since I'm already proficient with JS. Time
will tell.  
