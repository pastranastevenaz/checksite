<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        I'm an example component!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>






<script src="https://cdn.jsdelivr.net/npm/vue@2.5.21/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<div id="app">
  <p v-for="user in users">{{ user.name }}</p>
</div>

<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue-WordPress!',
    users: []
  },
  methods: {
    makeApiRequest: function () {
      console.log("called makeApiRequest");
      axios.get('http://jsonplaceholder.typicode.com/users').then((response) => {
      this.users = response.data
    })
    .catch((e) => {
      console.error(e)
    })
    }
  },
  mounted(){
    console.log("Loaded the vue");
    this.makeApiRequest();
  }
})
</script>
