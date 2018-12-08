<template>


<div>
              <hr>
              <h4>Source Website Information</h4>
              <p>URL: {{ website.url }}</p>
              <div v-if="!website">

                <div class="form-group">
                  <!-- if we have ftp information -->
                  <div class="flex-container">
                    <p>FTP Info: <img  class="checkmark-circle right" alt="checkmark" src="/storage/images/checkmark.png"></p>
                  </div>

                  <p>FTP User{{ website.primaryftp_username}}</p>
                  <p v-if="website.primaryftp_pass">FTP Password: ********</p>
                  <br>

                  <!-- <p v-else-if="!website"></ -->
                  <!-- show a green checkmark -->
                  <!-- else if -->
                  <!-- show a vue component //ftp-info-component -->
                </div>
              </div>


              <div v-else-if="website">

                <!-- <h4>Setup Contact Form</h4> -->

                <div class="form-group">
                  <label for="sourceUrl">domain  <span class="green-text">URL</span></label>
                  <input id="sourceWebsiteUrl" type="text" class="form-control form-input input-lg" placeholder="myexample.com">
                  <small class="pull-right"><b>Example: </b>myexample.com</small>
                </div>
                <div class="form-group">
                  <label for="sourcenWebsiteUrl">FTP  <span class="green-text">Username</span></label>
                  <input id="sourceWebsiteUrl" type="text" class="form-control form-input input-lg">
                </div>



                <label class="check-container">Has Database
                  <input v-on:click="handleHasDatabaseClicked()" type="checkbox">
                  <span class="checkmark"></span>
                </label>

                <div v-if="hasDatabase">
                  <div class="form-group">
                    <label for="sourceDHost">Database <span class="green-text">Host</span></label>
                      <input id="destinationFtpDirectory" type="text" class="form-control form-input input-lg" placeholder="localhost">
                      <small class="pull-right"><b>Tip: </b>Commonly Localhost or an IP address</small>
                  </div>
                  <div class="form-group">
                    <label for="destinationFtpDirectory">Database <span class="green-text">Name</span></label>
                      <input id="destinationFtpDirectory" type="text" class="form-control form-input input-lg" placeholder="">
                  </div>
                </div>


              </div>

              <hr>




              <h4>Destination Website Information</h4>


              <div class="form-group">
                <label for="destinationWebsiteUrl">Desired Temporary Url</label>
                  <input id="destinationWebsiteUrl" type="text" class="form-control form-input input-lg"  placeholder="migration.myexample.com">
                  <small class="pull-right">Default: <b>migration.</b>{{ website.url }}</small>
              </div>

              <div class="form-group">
                <label for="destinationFtpHost">Destination FTP <span class="green-text">Host</span></label>
                  <input id="destinationFtpHost" type="text" class="form-control form-input input-lg">
                  <small class="pull-right"><b>Tip: </b>This is usually the domain name or ip address</small>
              </div>
              <div class="form-group">
                <label for="destinationFtpUser">Destination FTP <span class="green-text">User</span></label>
                  <input id="destinationFtpUser" type="text" class="form-control form-input input-lg">
                  <!-- <small class="pull-right"><b>Tip: </b>This is usually the domain name or ip address</small> -->
              </div>
              <div class="form-group">
                <label for="destinationFtpPassword">Destination FTP <span class="green-text">Password</span></label>
                  <input id="destinationFtpPassword" type="password" class="form-control form-input input-lg">
                  <!-- <small class="pull-right"><b>Tip: </b>This is usually the domain name or ip address</small> -->
              </div>
              <div class="form-group">
                <label for="destinationFtpDirectory">Destination Path or <span class="green-text">Directory</span></label>
                  <input id="destinationFtpDirectory" type="text" class="form-control form-input input-lg" placeholder="/ or /public_html">
                  <small class="pull-right"><b>Tip: </b>Is there a directory we must path into?</small>
              </div>

              <label class="check-container">External Database | <span style="color: #777">Advanced</span>
                <input v-on:click="handleHasExternalDatabaseClicked()" type="checkbox">
                <span class="checkmark"></span>
              </label>


              <div v-if="hasExternalDatabase">

                <div class="form-group">
                  <label for="destinationDatabaseHost">Destination Database <span class="green-text">Host</span></label>
                    <input id="destinationDatabaseHost" type="text" class="form-control form-input input-lg" placeholder="Server IP">
                    <!-- <small class="pull-right"><b>Tip: </b>I?</small> -->
                </div>

                <div class="form-group">
                  <label for="destinationDatabaseName">Destination Database <span class="green-text">Name</span></label>
                    <input id="destinationDatabaseName" type="text" class="form-control form-input input-lg" placeholder="">
                    <small class="pull-right"><b>Tip: Leave blank to not change</b></small>
                </div>

                <div class="form-group">
                  <label for="destinationDatabasePassword">Destination Database <span class="green-text">Password</span></label>
                    <input id="destinationDatabasePassword" type="password" class="form-control form-input input-lg" placeholder="">
                    <small class="pull-right"><b>Tip: </b>Leave blank to not change</small>
                </div>

                <div class="form-group">
                  <label for="destinationDatabasePort">Destination Database <span class="green-text">Port</span></label>
                    <input id="destinationDatabasePort" type="number" class="form-control form-input input-lg" placeholder="3306">
                    <small class="pull-right"><b>Tip: </b>WE will try common ports, ie:3306</small>
                </div>
              </div>



              <!-- <label class="check-container">Save Website in Profile -->
                <!-- <input v-on:click="handleSaveWebsiteClicked()" type="checkbox"> -->
                <!-- <span class="checkmark"></span> -->
              <!-- </label> -->


</div>
</template>

<script>
    export default {
      data () {
        return {
          hasDatabase: false,
          hasExternalDatabase: false,
          saveWebsite: false,
          tempSubdomain: "migration"+ this.website.url
        }
      },
      // data: {
      // },
      props: [
        'website'
      ],
      // computed: {
      //   ftpInfo: () => {
      //     console.log(website.url);
      //   }
      // },
      methods: {
        doWeHaveFtp: function(){
          console.log("doWeHaveFtp function");
        },
        handleHasDatabaseClicked: function () {
          this.hasDatabase = !this.hasDatabase;
          console.log("Has Database: " + this.hasDatabase);
        },
        handleSaveWebsiteClicked: function () {
          this.saveWebsite = !this.saveWebsite;
          console.log("Save Website: " + this.saveWebsite);
        },
        handleHasExternalDatabaseClicked: function () {
          this.hasExternalDatabase= !this.hasExternalDatabase;
        }
      },
        mounted() {
            console.log('Component mounted.')
            this.doWeHaveFtp();
        }
    }
</script>
<style scoped>
h4{
  color: #777;

}
.checkmark-circle{
  height: 2em;
  /* position: relative; */
}
.flex-container{
    /* display: flex; */
    align-items: center; /* align vertical */
    justify-content: space-between;
}
.form-note-text{
  color: #999;
}










</style>
