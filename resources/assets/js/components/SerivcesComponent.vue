<template>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Service</div>

                  <div class="panel-body">
                      <p><b>Address: </b>{{ selected }}</p>
                      <div class="form-group">
                        <label for="address-selector">Address: </label>
                        <select id="address-selector" class="form-control" v-model="selected" required>
                          <option v-for="address in addresses">
                            {{ address }}
                          </option>
                        </select>
                      </div>
                      <br>

                      <!-- ##################  -->
                      <!-- # OTHER ROOM SECTION-->
                      <!-- #                   -->
                      <h4><b>Living Room: </b></h4>
                      <label for="cleanlevel">Clean Level: </label>
                      <input type="radio" value="1" v-model="livingroom.cleanLevel">Standard
                      <input type="radio" value="2" v-model="livingroom.cleanLevel">Deluxe
                      <input type="radio" value="0" v-model="livingroom.cleanLevel" class="pull-right"> <span class="pull-right"> None </span>
                      <br>
                      {{ livingroom.cleanLevel }}
                      <h4> <b>Kitchen: </b></h4>
                      <label for="cleanlevel">Clean Level: </label>
                      <input type="radio" value="1" v-model="kitchen.cleanLevel">Standard
                      <input type="radio" value="2" v-model="kitchen.cleanLevel">Deluxe
                      <input type="radio" value="0" v-model="kitchen.cleanLevel" class="pull-right"> <span class="pull-right"> None </span>
                      <br>
                      {{ kitchen.cleanLevel }}
                      <h4><b>Dining Room:</b></h4>
                      <label for="cleanlevel">Clean Level: </label>
                      <input type="radio" value="1" v-model="diningroom.cleanLevel" selected="true">Standard
                      <input type="radio" value="2" v-model="diningroom.cleanLevel">Deluxe
                      <input type="radio" value="0" v-model="diningroom.cleanLevel" class="pull-right"> <span class="pull-right"> None </span>
                      <br>
                      {{ diningroom.cleanLevel }}

                      <!-- ################## -->
                      <!-- # BEDROOM SECTION  -->
                      <!-- #                  -->
                      <h3><b>Bedrooms: {{ bedrooms.length }}</b></h3>
                      <div v-for="(bedroom, index) in bedrooms">



                        <b><h4>Bedroom {{ index + 1 }}</h4></b>
                        <label for="bedroomname">Room Name:</label>
                        <!-- ERROR SECTION -->
                        <div class="alert alert-danger" v-if="bedroom.errors.length">
                          Please enter a description!
                        </div>
                        <input class="form-control" :id="'bedroomname'+(index+1)" v-model="bedroom.name">

                        <label for="cleanlevel" class="radioLabel">Clean Level: </label>
                        <input type="radio" v-model="bedroom.cleanLevel" value="1">Standard
                        <input type="radio" v-model="bedroom.cleanLevel" value="2">Deluxe
                        <br>
                        <!-- <span>Clean Level: {{ bedroom.cleanLevel }}</span> -->
                        <br>
                        <button class="btn btn-danger pull-right" v-on:click="removeBedroom(index);" style="cursor: pointer">Remove</button>
                      </div>


                      <!-- ################## -->
                      <!-- # BATHROOM SECTION  -->
                      <!-- #                  -->
                      <h3><b>Bathrooms: {{ bathrooms.length }}</b></h3>
                      <div v-for="(bathroom, index) in bathrooms">


                        <b><h4>Bathroom {{ index + 1 }}</h4></b>
                        <label for="bathroomname">Room Name: </label>

                        <!-- ERROR SECTION -->
                        <div class="alert alert-danger" v-if="bathroom.errors.length">
                          Please enter a description!
                        </div>
                        <input class="form-control" :id="'bathroomname'+(index+1)" v-model="bathroom.name">

                        <label for="cleanlevel">Clean Level:</label>
                        <input type="radio" v-model="bathroom.cleanLevel" value="1">Standard
                        <input type="radio" v-model="bathroom.cleanLevel" value="2">Deluxe

                        <br>
                        <button class="btn btn-danger pull-right" v-on:click="removeBathroom(index);" style="cursor: pointer">Remove</button>
                      </div>

                      <hr>
                      <h2>Extras</h2>

                      <button class="btn btn-default" v-on:click="addBedroomRow"
                              :disabled="this.bedrooms.length > 9">Add Bedroom</button>
                      <button class="btn btn-default" v-on:click="addBathroomRow"
                              :disabled="this.bathrooms.length > 4">Add Bathroom</button>
                      <br><br>
                      <button class="btn btn-primary" v-on:click="submitRequest"
                              :disabled="(this.bedrooms.length < 1) && (this.bathrooms.length < 1) &&
                                         (this.livingroom.cleanLevel < 1) && (this.kitchen.cleanLevel < 1) && (this.diningroom.cleanLevel < 1)">Submit Request</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import axios from 'axios';


export default {
    data() {
      return{
        errors: [],
        selected: "",
        addresses: [],
        livingroom: {
          cleanLevel: "1"
        },
        kitchen: {
          cleanLevel: "1"
        },
        diningroom: {
          cleanLevel: "1"
        },
        bedrooms: [],
        bathrooms: [],
      }
    },
    methods:{

      // checkForm: function
      makeRequest: function () {

      },

      submitRequest: function () {
        // let noErrors = false;
        this.errors = [];
        // console.log("Address is: "+this.selected);

        for(var i=0; i<this.bedrooms.length; i++){
          if(!this.bedrooms[i].name){
            this.bedrooms[i].errors = "This is an error";
            // console.log(this.bedrooms.errors);
            // noErrors = false;
            this.errors.push('error bedroom: '+i);
          }else{
            // console.log(this.bedrooms[i]);
            // noErrors = true;
          }
        }

        for(var n=0; n<this.bathrooms.length; n++){
          if(!this.bathrooms[n].name){
            this.bathrooms[n].errors = "This is an error";
            // noErrors = false;
            this.errors.push('error bathroom: '+n);
          }else{
            // noErrors = true;
          }
        }


        console.log("Total errors: "+this.errors.length);
        if (this.errors.length < 1){
          console.log("SUCCESSFUL SUBMISSION");

          console.log("Submitted "+this.bedrooms.length+" bedrooms & "+this.bathrooms.length+ " bathrooms");
          // console.log("Bedroom " +(i+1)+": "+ this.bedrooms[i].name+"| Clean Level: "+ this.bedrooms[i].cleanLevel);
          // console.log("bathroom "+(n+1)+": "+ this.bathrooms[n].name + "| Clean Level: " + this.bathrooms[n].cleanLevel);
          this.bedrooms = [];
          this.bathrooms = [];
        }else{
          console.log(this.errors.length+" SUBMISSION HAS AN ERROR");
        }
      },
      getSavedAddresses: function () {
        console.log("Retrieved addresses");
        axios.get('/userdata')
        .then(response =>{
          console.log(response.data);
          this.addresses = response.data;
          this.selected = response.data[0];
          // console.log(this.address[1]);
        })
        .catch(error =>{
          console.log(error);
        })
      },

      // CREATE NEW BEDROOM INPUT
      addBedroomRow: function () {
        this.bedrooms.push({
          name:"",
          cleanLevel: "1",
          errors: ""
        });
        console.log('Added a Bedroom row');
      },

      removeBedroom: function(index) {
                    this.bedrooms.splice(index, 1);
                },





      // CREATE NEW BATHROOM INPUT
      addBathroomRow: function () {
        this.bathrooms.push({
          name: "",
          cleanLevel: "1",
          errors: ""
        });
        console.log('Added Bathroom Row');
      },

      removeBathroom: function(index) {
                    this.bathrooms.splice(index, 1);
                },



    },




    // LIFECYCLE HOOKS
    created() {
      console.log('Before Monunted');
      this.getSavedAddresses();
    },
    mounted() {
        console.log('Services Component mounted.');

    }
}
</script>

<style scoped>
.radioLabel{
  margin-right: 2em !important;
}
</style>
