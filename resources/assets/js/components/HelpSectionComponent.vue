

<template>
  <div v-bind:class="{ fadeInUp: helpVisible, hidden: isHidden}" class="animated" id="help-section">
    <div class="container" id="help-text">
      <center>
        <h4>Find out how we've helped other businesses, and how we can help your digital presence</h4>
      </center>
      <br><br>
      <center>
        <button v-on:click="handleButtonClick()" class="btn btn-default btn-lg">
          Reach Out
        </button>
      </center>
    </div>
  </div>
</template>

<script>
    export default {
      data () {
        return{
          helpVisible: false,
          isHidden: true
        }
      },
      methods: {
        handleButtonClick () {
          console.log("Button Clicked");
          const contactSection = document.getElementById("contact-section");
          contactSection.scrollIntoView({
            block: 'end',
            behavior: 'smooth'
          });
        },
        handleIfVisible () {
          let div = document.getElementById("help-section");
          let rect = div.getBoundingClientRect();
          let x = rect.top;
          let winHeight = window.innerHeight;
          if(x < (winHeight - 60)){
            this.aboutVisible = true;
            this.isHidden = false;
          }
        }
      },
      created () {
        if (process.browser) {
          window.addEventListener('scroll', this.handleIfVisible);
        }
      },
      destroyed () {
        if (process.browser) {
          window.removeEventListener('scroll', this.handleIfVisible);
        }
      },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
<style scoped>
.hidden{
  visibility: hidden;
}
</style>
