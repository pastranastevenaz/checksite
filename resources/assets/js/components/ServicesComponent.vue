<template>

  <div class="container">



    <div class="row">
      <div class="col-md-8 col-md-offset-2">


        <div class="animated fadeIn" id="submission-form">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3>New Service Request</h3>
              <h4>Need help? <span style="cursor: pointer;" v-on:click="handleScheduleCallClicked" class="green-text">Schedule a call</span></h4>
              <div v-for="error in errors">
                <small class="red-text">{{error}}</small>
              </div>
            </div>

            <div class="panel-body">


              <div v-if="step === 1">

                <div class="form-group">
                  <label for="address-selector">Website: </label>

                  <select id="address-selector" class="form-control input-lg" v-model="selected" required>
                    <option v-for="website in websites" v-bind:value="website">
                    {{ website.url }}
                    </option>
                  </select>
                  <br>


                  <div v-on:click="handleMigrationSelected" class="service-button">
                    <h4>Website Migrations</h4>
                    <span><img v-if="serviceSelected === 1" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <div v-on:click="handleMalwareSelected" class="service-button">
                    <h4>Malware Cleanup</h4>
                    <span><img v-if="serviceSelected === 2" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <div v-on:click="handleDesignSelected" class="service-button">
                    <h4>Design or Content Edit</h4>
                    <span><img v-if="serviceSelected === 3" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <div v-on:click="handleContactSelected" class="service-button">
                    <h4>Setup Contact Form</h4>
                    <span><img v-if="serviceSelected === 4" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <div v-on:click="handleWordpressSelected" class="service-button">
                    <h4>WordPress Support</h4>
                    <span><img v-if="serviceSelected === 5" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <div v-on:click="handleTroubleshootingSelected" class="service-button">
                    <h4>General Troubleshooting</h4>
                    <span><img v-if="serviceSelected === 6" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <div v-on:click="handleEvaluationSelected" class="service-button">
                    <h4>Performance Evaluation</h4>
                    <span><img v-if="serviceSelected === 7" class="checkmark-circle" alt="checkmark" src="/storage/images/checkmark.png"></span>
                  </div>

                  <br>
                  <button v-on:click="handleNext" class="pull-right btn-block btn btn-light btn-lg">
                    Next
                  </button>

                </div>
              </div>









              <div v-else-if="step === 2">
                <h3>Website: <b>{{ selected.url }}</b></h3>
                <div v-if="serviceSelected === 1">
                  <h4>Service: <b>Migration</b></h4>
                  <br>
                  <center><p>We will migrate your website from one server or hosting platform to another</p></center>
                  <!-- <migrationscomponent website="haminastu.com"></migrationscomponent> -->

                  <migrationscomponent v-bind:website="selected"></migrationscomponent>
                </div>
                <div v-else-if="serviceSelected === 2">
                  <h4>Service: <b>Malware Cleanup</b></h4>
                  <br>
                  <center><p>We will rid your website of malware and attempt to prevent future reinfection</p></center>
                </div>
                <div v-else-if="serviceSelected === 3">
                  <h4>Service: <b>Design or Content</b></h4>
                  <br>
                  <center><p>We will perform minor design or content changes</p></center>
                </div>
                <div v-else-if="serviceSelected === 4">
                  <h4>Service: <b>Contact Form</b></h4>
                  <br>
                  <center><p>We will setup or troubleshoot a contact form on your website</p></center>
                </div>
                <div v-else-if="serviceSelected === 5">
                  <h4>Service: <b>WordPress Support</b></h4>
                  <br>
                  <center><p>We offer plenty of wordpress support and services</p></center>
                </div>
                <div v-else-if="serviceSelected === 6">
                  <h4>Service: <b>General Troubleshooting</b></h4>
                  <br>
                  <center><p>Not sure where to start. We can troubleshoot many types of errors on your website.</p></center>
                </div>
                <div v-else-if="serviceSelected === 7">
                  <h4>Service: <b>Performance Evaluation</b></h4>
                  <br>
                  <center><p>Website running slow? Start here, we know how to speed up you site!</p></center>
                </div>

                <br>

                <button v-on:click="handleBack"  class="white-button btn-block btn btn-warning btn-lg">
                  Back
                </button>
                <button v-on:click="handleNext" class="pull-right btn-block btn btn-light btn-lg">
                  Next
                </button>

              </div>


              <div v-else-if="step === 3">
                <h3>Website: <b>{{ selected.url }}</b></h3>
                <br>
                <button v-on:click="handleBack"  class="white-button btn-block btn btn-warning btn-lg">
                  Back
                </button>
                <button v-on:click="handleNext" class="pull-right btn-block btn btn-light btn-lg">
                  Next
                </button>

              </div>

              <!-- ################################# -->
              <!-- SCHEDULE A CALL  -->
              <!-- CONTACT FORM -->
              <!-- # -->
              <div v-else-if="step === 4">
                <center><h3>Schedule a call</h3></center>
                <form>
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control input-lg" placeholder="Your Name">
                  </div>
                  <div class="form-group">
                    <label for="name">Email</label>
                    <input type="text" class="form-control input-lg" placeholder="Your Email">
                  </div>
                  <div class="form-group">
                    <label for="name">Phone</label>
                    <input type="tel" class="form-control input-lg" placeholder="Your Phone Number">
                  </div>
                  <div class="form-group">
                    <label for="time">Best Time to Call </label>
                    <input type="time" class="form-control input-lg" id="time" placeholder="Your Phone Number..." required>
                    <small id="timeHelp1" class="form-text text-muted">Expect a call the following business day.</small>
                    <small id="timeHelp1" class="form-text text-muted">Please allow a buffer of 30 min prior or after the entered time.</small>
                  </div>
                  <div class="form-group">
                    <label for="messageArea">Message</label>
                    <textarea placeholder="Tell us what service you're interested in, and any other info like" class="form-control" id="messageArea" rows="4" required></textarea>
                  </div>

                    <br>
                    <button v-on:click="handleReset"  class="white-button btn-block btn btn-warning btn-lg">
                      Cancel
                    </button>
                    <button v-on:click="handleNext" class="pull-right btn-block btn btn-light btn-lg">
                      Submit
                    </button>
                </form>
              </div>



            </div>



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
      step: 1,
      // tempSubdomain: "migration" + this.selected.url,
      errors: [],
      websites: [],
      selected: "",

      serviceSelected: 0
    }
  },

  methods: {
    handleNext: function () {
      this.errors = [];
      if(!this.selected){
        this.errors.push("Please select a website!")
        return;
      }
      console.log( "Selected: " + this.selected.url );
      this.step += 1;
    },
    handleReset: function () {
      this.errors = [];
      this.step = 1;
    },
    handleBack: function () {
      this.errors = [];
      console.log("Clicked Back");
      this.step -=1;
    },
    handleScheduleCallClicked: function () {
      this.errors = [];
      this.step = 4;
    },
    // SERVICES /////////////////////////////////////////////////////////
    handleMigrationSelected: function () {
      this.serviceSelected = 1;
    },
    handleMalwareSelected: function () {
      this.serviceSelected = 2;
    },
    handleDesignSelected: function () {
      this.serviceSelected = 3;
    },
    handleContactSelected: function () {
      this.serviceSelected = 4;
    },
    handleWordpressSelected: function () {
      this.serviceSelected = 5;
    },
    handleTroubleshootingSelected: function () {
      this.serviceSelected = 6;
    },
    handleEvaluationSelected: function () {
      this.serviceSelected = 7;
    },
    // SERVICES /////////////////////////////////////////////////////////

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



    getAllWebsites: function () {
      axios.get('/getallwebsites')
      .then(response =>{
        this.websites = response.data;
        console.log("Websites are: " + this.websites);
      })
      .catch(error => {console.log(error);})
    },


  },  // END METHODS ///////////////////////////////////////////////////////////////////




  // LIFECYCLE HOOKS
  created() {
    console.log('Before Monunted');
    // this.getMainAddress();
    this.getAllWebsites();
    // this.interval = setInterval(() => this.getSavedAddresses(), 300);
  },
  mounted() {
    console.log('Services Component mounted.');
    // setTimeout(function(){ console.log('Websites are: ' + this.websites.url ); }, 3000);
    // console.log('Addresses are: ' + this.addresses);
  }
}
</script>

<style scoped>
.radioLabel{
  margin-right: 2em !important;
}
.service-button{
  border-style: solid;
  border-width: 1px;
  height: 64px;
  display: flex;
  padding-left: 16px;
  padding-right: 16px;
  align-items: center; /* align vertical */
  justify-content: space-between;
  border-color: #ddd;
  cursor: pointer;
}
h4{
  color: #777;

}


</style>
