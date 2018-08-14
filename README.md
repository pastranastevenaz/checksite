
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

So I decided to use an AWS s# bucket for the avatar images.First thing I did was go create a new empty bucket in my AWS acct.

It took me several hours to even figure out how to connect to, upload, and display an image  using s3. Wow! I can't stand AWS documentation.
It's pretty much useless. 
