<template>

  <div class="container">


    <div class="animated fadeInRight" id="submission-form" v-if="!addingAddress">
      <services></services>
    </div>


    <div class="row">
      <div class="col-md-8 col-md-offset-2">

        <div class="panel panel-default">
          <div class="panel-heading">New Address</div>
          <div class="panel-body">





            <div class="form">


              <div class="form-group">
                <label for="add-street-address" class="col-md-4 control-label">
                  Street Address
                </label>
                <div class="col-md-6">
                  <input id="add-city" type="text" class="form-control">
                </div>
              </div>


              <div class="form-group">
                <label for="add-city" class="col-md-4 control-label">
                  City
                </label>
                <div class="col-md-6">
                  <input id="add-city" type="text" class="form-control">
                </div>
              </div>

              <div class="form-group">
                <label for="add-state" class="col-md-4 control-label">
                  State
                </label>
                <div class="col-md-6">
                  <input id="add-zip" type="text" class="form-control">
                </div>
              </div>


              <div class="form-group">
                <label for="add-zip" class="col-md-4 control-label">
                  Zip Code
                </label>
                <div class="col-md-6">
                  <input id="add-zip" type="text" class="form-control">
                </div>
              </div>


              <div class="row">

              </div>

            </div>
            <button v-on:click="foo" class="btn btn-light">
              <span>Add Address</span>
            </button>
          </div>

        </div>

      </div>
    </div>
  </div>
  </template>

  <script>
  export default {
    data() {
      return{
        addingAddress: true,
      }
    },

    methods: {
      foo: function () {
        this.addingAddress = !this.addingAddress;
      },
    },
    mounted() {
      console.log('Add Address Component mounted.')
    }
  }
  </script>

  <style>

  </style>
