<template>
  <div class="panel panel-default">
      <div id="service" v-for="service in all_services">
        <b><span class="glyphicon glyphicon-unchecked" aria-hidden="true"> </span> {{ service.street_address }} | {{ service.city }}</b>
        <br>
      </div>
  </div>
</template>

<script>
export default {
  data() {
    return{
      all_services: [],
    }
  },

  methods: {
    getAllServices: function () {
      console.log("Getting all the services");
      axios.get('/getallservices')
        .then(response => {
          this.all_services = response.data;
          console.log(this.all_services);
        })
        .catch(error => {console.log(error);})
    }
  },
  // LIFECYCLE HOOKS
  created() {
    this.getAllServices();
  },
  mounted() {
    console.log('Add Address Component mounted.');
  }
}
</script>
<style scoped>
  #service{
    border-bottom: solid;
    border-bottom-width: 1px;
    padding-top: 8px;
    padding-bottom:8px;
    padding-left: 16px;
  }
</style>
