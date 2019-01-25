<template>


  <div class="animated" v-bind:class="{ fadeOutLeft: submitted, hidden: formHidden}">
    <form>

      <div class="form-group">
        <label for="case-number">Case Number:</label>
        <input v-model="casenum" type="number" class="form-control" id="case-number">
      </div>
      <div class="form-group">
        <label for="transferring-agent">Transferring Agent:</label>
        <select class="form-control" v-model="agentselected" id="">
          <option v-for="user in users" v-bind:value="user">
            {{ user.name }}
          </option>
        </select>
      </div>
      <br>

      <div class="form-group">
        <p>Was it valid?</p>
        <label class="radio-inline">
          <input v-model="valid" value="yes" type="radio">Yes
        </label>
        <label class="radio-inline">
          <input v-model="valid" value="no" type="radio">No
        </label>
      </label>
    </div>
    <br>
    <div v-if="valid === 'no'" class="form-group">
      <p>Why was it invalid?</p>
      <label class="radio-inline">
        <input v-model="whyinvalid" value="playbook" type="radio">Found in the playbook
      </label>
      <label class="radio-inline">
        <input v-model="whyinvalid" value="kb" type="radio">Knowledge base
      </div>
      <br>
      <div v-if="valid === 'no'">
        <div v-if="whyinvalid === 'kb'" class="form-group">
          <label for="knowledge-base">What knowledge base</label>
          <input v-model="kb" type="text" class="form-control" id="knowledge-base">
        </div>
      </div>
      <br>
      <div class="form-group">
        <p>Could a ticket have been made?</p>
        <label class="radio-inline">
          <input v-model="ticket" value="yes" type="radio" checked>Yes
        </label>
        <label class="radio-inline">
          <input v-model="ticket" value="no" type="radio" >No
        </label>
      </label>
    </div>
    <br>
    <div v-if="ticket === 'yes'" class="form-group">
      <label for="ticket-reason">How would a ticket have helped?</label>
      <input v-model="howticket" type="text" class="form-control" id="ticket-reason">
    </div>
    <div class="container-contact100-form-btn form-group">
      <button v-on:click="handleSubmitForm" class="contact100-form-btn">
        <span>
          Submit
          <i style="margin-left: .75em;" class="glyphicon glyphicon-arrow-right"></i>
        </span>
      </button>
    </div>

  </form>
</div>



</template>

<script>
new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!',
    page: 'form',
    users: [],
    casenum: '',
    agent: '',
    agentselected: '',
    valid: "yes",
    whyinvalid: 'playbook',
    kb: '',
    ticket: 'no',
    howticket: '',
    submitted: false,
    formHidden: false
  },
  methods: {
    loadChart(){
      console.log("Loaded Chart!!!!!");
    },
    handleNavToForm(){
      this.page = 'form';
    },
    handleNavToAgentMetrics(){
      this.page = 'agentMetrics';
    },
    handleNavToTeamMetrics(){
      this.page = 'teamMetrics';
    },
    handleNavToOverallMetrics(){
      this.page = 'overallMetrics';
    },
    handleSubmitForm(e){
      e.preventDefault();
      this.submitted = 1;
      console.log("Case: " + this.casenum);
      console.log("User: " + this.agentselected.name);
      console.log("Valid: " + this.valid);
      console.log("Why was it invalid: " + this.whyinvalid);
      console.log("Knowledgebase: " + this.kb);
      console.log("Ticket?: " + this.ticket);
      console.log("how would a ticket help?: " + this.howticket);
      var data = {
        casenum: this.casenum,
        agentselected: this.agentselected.name,
        valid: this.valid,
        whyinvalid: this.whyinvalid,
        kb: this.kb,
        ticket: this.ticket,
        howticket: this.howticket
      }
      axios.post('https://test.testmyssl.xyz/api/formsubmission', data)
      .then(response => {
        console.log("Response: " + response.data);
      })
      .catch(error => {
        console.log(error);
      })
    },
  },
  mounted(){

    axios.get('https://test.testmyssl.xyz/api/allusers')
    .then(response => {
      console.log('response: ' + response.data);
      this.users = response.data;
    })
    .catch(error =>{
      console.log(error);
    })
  }
})
</script>
