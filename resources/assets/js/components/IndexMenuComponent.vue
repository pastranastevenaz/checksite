<template>
  <div v-bind:class="{ fadeInUp: indexMenuVisible, hidden: isHidden}" class="animated" id="indexmenu-section">
    <hr>
    <div class="container">
      <h2 class="menu-heading">Web Development/Design ?</h2>
      <!-- <h3 class="menu-subheading">Yep... We do that.</h3> -->
      <center>
        <p>Work with some of the best developers and designers to get your web presence started.</p>
        <p>Perhaps a touch up is in order, we can give your website a modern upgrade</p>
      </center>
      <br>
      <h2 class="menu-heading">Need Hosting or Servers?</h2>
      <!-- <h3 class="menu-subheading">Yep... We do that.</h3> -->
      <center>
        <p>Check out our affordable managed hosting options.</p>
        <p>Our hosting and server administrators can take the stress out of managing your website or application</p>
      </center>
      <hr>
      <center><h4><a href="/services" class="red-text">Take a look at our entire menu of services and our managed hosting options</a></h4></center>
      <hr>
    </div>
  </div>
</template>

<script>
    export default {
        data () {
          return{
            indexMenuVisible: false,
            isHidden: true
          }
        },
        methods: {
          handleIfVisible () {
            let div = document.getElementById("indexmenu-section");
            let rect = div.getBoundingClientRect();
            let x = rect.top;
            // console.log(x);
            let winHeight = window.innerHeight;
            if(x < (winHeight - 60)){
              this.aboutVisible = true;
              this.isHidden = false;
              // console.log("Index Menu Visible");
            }
          },
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
            console.log('Menu Component mounted.')
        }
    }
</script>
<style scoped>
.hidden{
  visibility: hidden;
}
.menu-heading{
  margin-left: 20%;
  border-left-style: solid;
  padding-left: 1em;
  border-left-color: #f0384f;
  border-left-width: thick;
}
</style>
