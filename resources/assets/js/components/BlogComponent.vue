<template>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <center><h1>Recent Posts</h1></center>
        <div v-if="!loading" class="blog-section">

          <!-- Now you see me -->
          <div  v-for="post in posts" class="panel panel-default">
            <div class="panel-body">
              <h2>
                {{ post.title.rendered }}
              </h2>
              <small>Created: {{ post.date }}</small>
              <p>{{ post.excerpt.rendered }}</p>
            </div>your
          </div>
        </div>
        <div v-else class="blog-section">

          <center><img id="post-preloader" class="loading" src="storage/images/rotate.png"></center>
        </div>
      </div>
    </div>


  </div>
</div>
</template>

<script>
export default {
  data () {
    return {
      posts:[

      ],
      loading: true,

    }
  },
  mounted() {
    fetch('http://blogapi.haminastu.com/wp-json/wp/v2/posts')
    .then(response => response.json())
    .then(json => {
      this.posts = json;
      this.loading = false;
    })
    console.log(this.posts);
  },
}
</script>

<style>
.panel-body{
  /* min-height: 70vh; */
}
.blog-section{
    min-height: 50vh;
}
.loading{
  -webkit-animation: rotation 2s infinite linear;
}
@-webkit-keyframes rotation {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(359deg);
  }
}
#post-preloader{
    margin-top: 10em;
}
</style>
