<template>
  <div id="contact-section">

    <div class="container">
      <hr>
      <center><h3>Say Hi</h3></center>

      <div class="animated" v-bind:class="{ fadeOutLeft: submitted, hidden: contactHidden}" >
        <form v-on:submit.prevent="handleFormSubmit" action="">
          <div class="form-group">
            <label for="name">Name</label>
            <input v-model="contact.name" type="text" class="form-control input-lg" id="name" placeholder="Your Name..." required>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input v-model="contact.email" type="email" class="form-control input-lg" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Your Email...">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="messageArea">Message</label>
            <textarea placeholder="What services are you inquiring about?" v-model="contact.message" class="form-control" id="messageArea" rows="4" required></textarea>
          </div>


          <label class="check-container">Request Follow-up Consult Call
            <input v-on:click="handleFollowUpClicked()" type="checkbox">
            <span class="checkmark"></span>
          </label>

          <div v-if="followupIsVisible" class=""  id="followup-field">
            <div class="form-group">
              <label for="phone">Phone</label>
              <input v-model="contact.phone" type="tel" class="form-control input-lg" id="phone" placeholder="Your Phone Number..." required>
            </div>
            <div class="form-group">
              <label for="time">Best Time to Call </label>
              <input v-model="contact.time" type="time" class="form-control input-lg" id="time" placeholder="Your Phone Number..." required>
              <small id="timeHelp1" class="form-text text-muted">Expect a call the following business day.</small>
              <small id="timeHelp1" class="form-text text-muted">Please allow a buffer of 30 min prior or after the entered time.</small>
            </div>
          </div>

          <button type="submit" class="btn btn-default btn-lg">Submit</button>
        </form>
      </div>

      <div id="thank-you" class="animated" v-bind:class="{ fadeInRight: submitted, hidden: thankyouHidden}">
        <br><br><br>
        <center><h3><span class="red-text">Thank you</span> for reaching out to us. We will be in touch shortly</h3></center>
        <br><br>
      </div>


    </div>
  </div>
</template>
<script>
  export default{
    data () {
      return {
        followupIsVisible: false,
        submitted: false,
        contactHidden: false,
        thankyouHidden: true,
        contact: {
          name: '',
          email: '',
          message: '',
          phone: '',
          time: ''
        }
      }
    },
    methods: {
      handleFollowUpClicked () {
        this.followupIsVisible = !this.followupIsVisible;
      },
      handleFormSubmit () {
        // e.preventDefault()
        let name = this.contact.name;
        let email = this.contact.email;
        let message = this.contact.message;
        let phone = this.contact.phone;
        let time = this.contact.time;
        this.submitted = 1;
        console.log(name +" "+ email +" "+ message +" "+ phone +" "+ time);
        // this.contactHidden = true;
        setTimeout(function () { this.contactHidden = true }.bind(this), 1000);
        setTimeout(function () { this.thankyouHidden = false; }.bind(this), 1000);
        // this.thankyouHidden = false;
        let newContact = {
          name: name = this.contact.name,
          email: this.contact.email,
          message: this.contact.message,
          phone: this.contact.phone,
          time: this.contact.time
        }
        console.log(newContact);
        axios.post('/submit', newContact)
          .then(response => {
            console.log(response.data);
          }).catch(error => {
            console.log(error);
          })
      }
    }
  }
</script>

<style scoped>
.hidden{
  visibility: hidden;
}
#contact-section{
    padding-bottom: 30px;
}
#thank-you{
  height: 400px;
}
textarea{
  border-radius: 0px;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-color: #f0384f;
}
input{
  border-radius: 0px;
  border-top-style: none;
  border-left-style: none;
  border-right-style: none;
  border-bottom-color: #f0384f;
}
.check-container{
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.check-container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}
.check-container input ~ .checkmark {
  background-color: #ccc;
}
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}
/* On mouse-over, add a grey background color */
.check-container:hover input ~ .checkmark {
  background-color: #ccc;
}
/* When the checkbox is checked, add a blue background */
.check-container input:checked ~ .checkmark {
  background-color: #f0384f;
}
/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}
/* Show the checkmark when checked */
.check-container input:checked ~ .checkmark:after {
  display: block;
}
/* Style the checkmark/indicator */
.check-container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
button{
  border-radius: 0px;
  background-color: #f0384f;
  color: white;
}

@media only screen and (min-width: 900px) {
    form{
      padding-left: 16%;
      padding-right: 16%;
    }
}
</style>
