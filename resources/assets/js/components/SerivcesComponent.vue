<template>
  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
                  <div class="panel-heading">Available Background Services</div>

                  <div class="panel-body">
                      I'm the Services component!
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    data: {
      // CREATE CANDIDATE
      "id": "",
      "clientReferenceId": "",
      "email": "",
      "givenName": "",
      "familyName": "",
      "confirmedNoMiddleName": false,
      "dob": "",
      "ssn": "",
      // "candidateId": "",
      // "packageId": "",
      // "endUserCertificate": false,
      // "callback": {
      //     "uri": "https://requestinspector.com/inspect/01ce4rr85cwprmxqw6p76m10kz",
      //    //  "credentials": {
      //    //    "basic-auth": "narf:zort!"
      //    // }
       // },
    },
    mounted() {
        console.log('Services Component mounted.')
    }
}
</script>

<style scoped>

</style>
