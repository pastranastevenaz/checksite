<template>
  <div id="about-section" class="animated" v-bind:class="{ fadeInUp: aboutVisible, hidden: isHidden}">
  <div class="row">



      <div class="col-md-4 card">
         <div class="thumbnail">
           <img class="" src="storage/images/about1.jpg" text="image cap" alt="Card image cap">
           <div class="caption">
             <h3>Elegant and eye catching design</h3>
             <hr>
             <ul>
               <div class="">
                 <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/ux.png"></span><b>UX/UI</b></li>
                 <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/mobile.png"></span><b>Mobile</b></li>
               </div>
             </ul>
           </div>
         </div>
       </div>



       <div class="col-md-4 card">
          <div class="thumbnail">
            <img class="" src="storage/images/about2.jpg" text="image cap" alt="Card image cap">
            <div class="caption">
              <h3>Custom sofware & plugin development</h3>
              <hr>
              <ul>
                <div class="">
                  <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/android.png"></span><b>Android</b></li>
                  <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/webdev.png"></span><b>Web</b></li>
                  <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/desktop.png"></span><b>Desktop</b></li>
                </div>
              </ul>
            </div>
          </div>
        </div>


        <div class="col-md-4 card">
           <div class="thumbnail">
             <img class="" src="storage/images/about3.3.jpg" text="image cap" alt="Card image cap">
             <div class="caption">
               <h3>IT, Automation & Marketing services.</h3>
               <hr>
               <ul>
                 <div class="">
                   <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/migration.png"></span><b>Migrations</b></li>
                   <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/backups.png"></span><b>Backups</b></li>
                   <li><span><img class="about-icon" alt="ux icon" id="nav-logo" src="storage/images/cloud.png"></span><b>Cloud / Servers</b></li>
                 </div>
               </ul>
             </div>
           </div>
         </div>


  </div>
</div>

</template>
<script>
  export default{
    data () {
      return{
        aboutVisible: false,
        isHidden: true
      }
    },
  methods: {
    handleIfVisible () {
      let div = document.getElementById("about-section");
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
  }
}
</script>

<style scoped>
.hidden{
  visibility: hidden;
}
img {
  vertical-align: middle;
}
.card-img-top{
    /* width: 300px; */
}
#about-section{
  /* min-height: 40vh; */
  margin-bottom: 26px;
}
ul{
  list-style-type: none;
  color: #f0384f;
  text-shadow: none;
}
li{
  margin-bottom: 8px;
}
div.thumbnail{
  background-color: #ECF2F4 !important;
}
.card{
  background-color: #ECF2F4 !important;
  margin-bottom: 16px;
}
.about-icon{
  height: 1.4em !important;
  margin-right:8px;
}
@media only screen and (min-width: 768px) {
    #about-section{
        margin-left: 24px;
        margin-right: 24px;
    }
    .card{
      height: 60vh;
    }
}
@media only screen and (min-width: 990px) {
    .card{
      height: 66vh;
    }
}
@media only screen and (min-width: 1120px) {
    .card{
      height: 70vh;
    }
}
@media only screen and (min-width: 1320px) {
    .card{
      height: 75vh;
    }
}
@media only screen and (min-width: 1560px) {
    .card{
      height: 85vh;
    }
}
@media only screen and (min-width: 1700px) {
    .card{
      height: 90vh;
    }
}
@media only screen and (min-width: 2000px) {
    .card{
      height: 95vh;
    }
}
</style>
