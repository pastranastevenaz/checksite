<template>

  <div class="container">

    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="animated fadeInLeft" id="address-form" v-if="addingAddress">
          <div class="panel panel-default">
            <div class="panel-heading">New Address</div>
            <div class="panel-body">


              <div class="form">


              <div class="form-group">
              <label for="add-street-address" class="col-md-4 control-label">
                Street Address
              </label>
              <div class="col-md-6">
                <input id="add-street-address" type="text" class="form-control" v-model="newStreetAddress">
              </div>
              </div>

              <div class="form-group">
                <label for="add-city" class="col-md-4 control-label">
                  City
                </label>
                <div class="col-md-6">
                  <input id="add-city" type="text" class="form-control" v-model="newCity">
                </div>
              </div>




              <div class="form-group">
              <label for="add-state" class="col-md-4 control-label">
                State
              </label>
              <div class="col-md-6">
                <!-- <input id="add-zip" type="text" class="form-control"> -->
                <select id="add-state" class="form-control" v-model="stateSelected">
                  <option v-for="state in states" v-bind:value="state">
                    {{ state.state }}
                  </option>
                </select>
              </div>
              </div>


              <div class="form-group">
              <label for="add-zip" class="col-md-4 control-label">
                Zip Code
              </label>
              <div class="col-md-6">
                <input pattern="[0-9]{5}" id="add-zip" type="text" class="form-control" v-model="newZip">
              </div>
              </div>

              <br>

            </div>

          </div>
          <button v-on:click="addAddressToDatabase" class="btn btn-light">
            <span>Add Address</span>
          </button>

          <button v-on:click="changePanel" class="btn btn-danger">
            Cancel
          </button>
        </div>
      </div>
    </div>
  </div>


    <div class="animated fadeInRight" id="submission-form" v-if="!addingAddress">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">New Service</div>

                  <div class="panel-body">
                      <h4><b>Address: </b>{{ selected.street_address}}</h4>
                      <div class="form-group">
                        <label for="address-selector">Address: </label>

                        <select id="address-selector" class="form-control" v-model="selected" required>
                          <option v-for="address in addresses" v-bind:value="address">
                          {{ address.street_address }}
                          </option>
                        </select>
                        <!-- <select v-model="address"> -->
                          <!-- <template v-for="address in all_addresses"> -->
                            <!-- <option v-for="(value, key) in address" -->
                            <!-- :value="key">{{value[0]['street_address']}}</option> -->
                          <!-- </template> -->
                        <!-- </select> -->

                        <button v-on:click="changePanel" class="btn btn-light">
                          New Address
                        </button>

                      </div>




                      <br>

                      <!-- ##################  -->
                      <!-- # Main ROOM SECTIONS-->
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
                      <div class="animated fadeIn" v-for="(bedroom, index) in bedrooms">



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

                      <div class="animated fadeIn" v-for="(bathroom, index) in bathrooms">
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




                      <div class="animated fadeIn" :id="'extraroomId' + (index+1)" v-for="(extraroom, index) in extrarooms">
                        <b><h4>Extraroom {{ index + 1}}</h4></b>
                        <label for="extraroomname">Room Name: </label>
                        <!-- ERROR SECTION -->
                        <div class="alert alert-danger" v-if="extraroom.errors.length">
                          Please enter a description!
                        </div>
                        <input class="form-control" :id="'extraroomname'+(index+1)" v-model="extraroom.name">
                        <label for="cleanlevel">Clean Level:</label>
                        <input type="radio" v-model="extraroom.cleanLevel" value="1">Standard
                        <input type="radio" v-model="extraroom.cleanLevel" value="2">Deluxe
                        <br>
                        <button class="btn btn-danger pull-right" v-on:click="removeExtraroom(index);" style="cursor: pointer">Remove</button>
                      </div>

                      <hr>




                      <button class="btn btn-default" v-on:click="addBedroomRow"
                              :disabled="this.bedrooms.length > 9">Add Bedroom</button>
                      <button class="btn btn-default" v-on:click="addBathroomRow"
                              :disabled="this.bathrooms.length > 4">Add Bathroom</button>
                      <button class="btn btn-default" v-on:click="addExtraroomRow"
                              :disabled="this.extrarooms.length > 1.">Add Extra Room</button>
                      <br><br>
                      <button class="btn btn-primary" v-on:click="submitRequest"
                              :disabled="(this.bedrooms.length < 1) && (this.bathrooms.length < 1) &&
                                         (this.livingroom.cleanLevel < 1) && (this.kitchen.cleanLevel < 1) && (this.diningroom.cleanLevel < 1)">Submit Request</button>
                  </div>
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
        addingAddress: false,
        errors: [],
        selected: "",

        city: "",
        state: "",
        main_address: '',
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
        extrarooms: [],
        stateSelected: {},
        newStreetAddress: "",
        newCity: "",
        newZip: "",
        states: [
          {'abr':'AL', 'state': 'Alabama'},
          {'abr':'AK', 'state': 'Alaska'},
          {'abr':'AZ', 'state': 'Arizona'},
          {'abr':'AR', 'state': 'Arkansas'},
          {'abr':'CA', 'state': 'California'},
          {'abr':'CO', 'state': 'Colorodo'},
          {'abr':'CT', 'state': 'Connecticut'},

          {'abr':'DE', 'state': 'Delaware'},
          {'abr':'DC', 'state': 'District of Columbia'},
          {'abr':'FL', 'state': 'Florida'},
          {'abr':'GA', 'state': 'Georgia'},
          {'abr':'HI', 'state': 'Hawaii'},
          {'abr':'ID', 'state': 'Idaho'},
          {'abr':'IL', 'state': 'Illinois'},

          {'abr':'IN', 'state': 'Indiana'},
          {'abr':'IA', 'state': 'Iowa'},
          {'abr':'KS', 'state': 'Kansas'},
          {'abr':'KY', 'state': 'Kentucky'},
          {'abr':'ME', 'state': 'Maine'},
          {'abr':'MD', 'state': 'Maryland'},
          {'abr':'MA', 'state': 'Massachusetts'},

          {'abr':'MI', 'state': 'Michigan'},
          {'abr':'MN', 'state': 'Minnesota'},
          {'abr':'MS', 'state': 'Mississippi'},
          {'abr':'MO', 'state': 'Missouri'},
          {'abr':'MT', 'state': 'Montana'},
          {'abr':'NE', 'state': 'Nebraska'},
          {'abr':'NV', 'state': 'Nevada'},

          {'abr':'NH', 'state': 'New Hampshire'},
          {'abr':'NJ', 'state': 'New Jersey'},
          {'abr':'NM', 'state': 'New Mexico'},
          {'abr':'NY', 'state': 'New York'},
          {'abr':'NC', 'state': 'North Carolina'},
          {'abr':'ND', 'state': 'North Dakota'},
          {'abr':'OH', 'state': 'Ohio'},
          {'abr':'OK', 'state': 'Oklahoma'},
          {'abr':'OR', 'state': 'Oregon'},
          {'abr':'PA', 'state': 'Pennsylvania'},
          {'abr':'PR', 'state': 'Puerto Rico'},
          {'abr':'RI', 'state': 'Rhode Island'},
          {'abr':'SC', 'state': 'South Carolina'},
          {'abr':'SD', 'state': 'South Dakota'},

          {'abr':'TN', 'state': 'Tennessee'},
          {'abr':'TX', 'state': 'Texas'},
          {'abr':'UT', 'state': 'Utah'},
          {'abr':'VT', 'state': 'Vermont'},
          {'abr':'VA', 'state': 'Virgina'},
          {'abr':'WA', 'state': 'Washington'},
          {'abr':'WV', 'state': 'West Virginia'},
          {'abr':'WI', 'state': 'Wisconsin'},
          {'abr':'WY', 'state': 'Wyoming'},

        ]
      }
    },

    methods: {
      changePanel: function () {
        this.addingAddress = !this.addingAddress;
        this.addingAddress ?
          console.log("Swiutched to address add form") :
          console.log("Added an address");
      },
      foo2: function () {
        console.log("New address added "+ this.newStreetAddress + " " + this.newCity + " " + this.stateSelected.abr + " " + this.newZip);
        this.changePanel();
      },
      addAddressToDatabase: function () {
        let newAddress = {
          _streetAddress: this.newStreetAddress,
          _city: this.newCity,
          _state: this.stateSelected,
          _zip: this.newZip
        }
        console.log(newAddress);
        axios.post('/addressadd', newAddress)
          .then(response => {
            console.log(response.data);
          })
        this.refreshAddress();
        this.newStreetAddress = '';
        this.newCity = '';
        this.stateSelected = '';
        this.newZip = '';
        this.changePanel();
      },
      // async updateAddresses
      makeRequest: function () {
        console.log("MAKE REQUEST FUNCTION CALLED!!!");
        console.log("MAKEREQUEST SELECTED: "+this.selected);
        let data = {
          street_address: this.selected.street_address,
          city: this.selected.city,
          state: this.selected.state,
          zip: this.selected.zip,
          lat: this.selected.lat,
          long: this.selected.long,
          livingroom: this.livingroom.cleanLevel,
          kitchen: this.kitchen.cleanLevel,
          diningroom: this.diningroom.cleanLevel,
          bedroom0: this.bedrooms[0] ? this.bedrooms[0].cleanLevel : 0,
          bedroom1: this.bedrooms[1] ? this.bedrooms[1].cleanLevel : 0,
          bedroom2: this.bedrooms[2] ? this.bedrooms[2].cleanLevel : 0,
          bedroom3: this.bedrooms[3] ? this.bedrooms[3].cleanLevel : 0,
          bedroom4: this.bedrooms[4] ? this.bedrooms[4].cleanLevel : 0,
          bedroom5: this.bedrooms[5] ? this.bedrooms[5].cleanLevel : 0,
          bedroom6: this.bedrooms[6] ? this.bedrooms[6].cleanLevel : 0,
          bedroom7: this.bedrooms[7] ? this.bedrooms[7].cleanLevel : 0,
          bedroom8: this.bedrooms[8] ? this.bedrooms[8].cleanLevel : 0,
          bedroom9: this.bedrooms[9] ? this.bedrooms[9].cleanLevel : 0,

          bathroom0: this.bathrooms[0] ? this.bathrooms[0].cleanLevel : 0,
          bathroom1: this.bathrooms[1] ? this.bathrooms[1].cleanLevel : 0,
          bathroom2: this.bathrooms[2] ? this.bathrooms[2].cleanLevel : 0,
          bathroom3: this.bathrooms[3] ? this.bathrooms[3].cleanLevel : 0,
          bathroom4: this.bathrooms[4] ? this.bathrooms[4].cleanLevel : 0,

          extraroom1_name: this.extrarooms[0] ? this.extrarooms[0].name : "",
          extraroom1_level: this.extrarooms[0] ? this.extrarooms[0].cleanLevel : 0,
          extraroom2_name: this.extrarooms[1] ? this.extrarooms[1].name : "",
          extraroom2_level: this.extrarooms[1] ? this.extrarooms[1].cleanLevel : 0,
        }
        console.log(data);
        axios.post('/services/store',data)
          .then(response => {
            console.log(response.data);
            // window.location.replace("/dashboard");
          })

        // CLEAR THE FIELDS
        this.bedrooms = [];
        this.bathrooms = [];
        this.extrarooms = [];
      },

      submitRequest: function () {
        this.errors = [];
        // console.log("Address is: "+this.selected);
        for(var i=0; i<this.bedrooms.length; i++){
          if(!this.bedrooms[i].name){
            this.bedrooms[i].errors = "This is an error";
            this.errors.push('error bedroom: '+i);
          }else{
          }
        }
        for(var n=0; n<this.bathrooms.length; n++){
          if(!this.bathrooms[n].name){
            this.bathrooms[n].errors = "This is an error";
            this.errors.push('error bathroom: '+n);
          }else{
          }
        }
        for(var j=0; j<this.extrarooms.length; j++){
          if(!this.extrarooms[j].name){
            this.extrarooms[j].errors = "This is an error";
            this.errors.push('error extraroom: '+j);
          }else{
          }
        }
        console.log("Total errors: "+this.errors.length);
        if (this.errors.length < 1){
          this.isValidRequest();
        }else{
          console.log(this.errors.length+" SUBMISSION HAS AN ERROR");
        }
        this.makeRequest();
      },

      isValidRequest: function () {
        // console.log("isValidRequest CALED!!!!!!!!!");
        if (this.livingroom.cleanLevel > 0  || this.kitchen.cleanLevel > 0 ||
            this.diningroom.cleanLevel > 0 || this.bedrooms.length > 0 ||
                                              this.bathroom.length){

          console.log("SUCCESSFUL SUBMISSION");
          console.log("living room is TRUE!: " +  this.livingroom.cleanLevel);
          console.log("Number of Bedrooms: " + this.bedrooms.length);
          // console.log("Extra Room 1: " + this.extrarooms[0].name + " clean level: " + this.extrarooms[0].cleanLevel);
          return true;
        }
        return false;
      },

      refreshAddress: function () {
        this.interval = setInterval(() => this.getAllAddresses(), 300);
      },

      getMainAddress: function () {
        console.log("Retrieved main address");
        axios.get('/getmainaddress')
        .then(response =>{
          this.mainAddress = response.data;
          console.log("This.Addresses: " + JSON.stringify(this.mainAddress));
          this.selected = this.mainAddress;
          console.log("This.Selected: " + this.selected);
        })
        .catch(error =>{
          console.log(error);
        })
      },

      getAllAddresses: function () {
        axios.get('/getalladdresses')
          .then(response =>{
            this.addresses = response.data;
            console.log(this.all_addresses);
          })
          .catch(error => {console.log(error);})
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
      removeBathroom: function(index) { this.bathrooms.splice(index, 1); },


      addExtraroomRow: function() {
        this.extrarooms.push({
          name: "",
          cleanLevel: "1",
          errors: ""
        })
      },
      removeExtraroom: function(index){
          // document.getElementById("extraroomId1").className = "animated";
          // extraroomDiv.className = "animated fadeOut";

          console.log(" DELETED!!!!");

          this.extrarooms.splice(index, 1);
        },

    },  // END METHODS ///////////////////////////////////////////////////////////////////




    // LIFECYCLE HOOKS
    created() {
      console.log('Before Monunted');
      this.getMainAddress();
      this.getAllAddresses();
      // this.interval = setInterval(() => this.getSavedAddresses(), 300);
      console.log('Addresses are: ' + this.addresses);
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
