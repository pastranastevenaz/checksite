<template>
    <div class="container">
      <center>
        <h3 v-on:click="handleDownArrowClick()" id="down-arrow" v-bind:class="{ fadeInUp: fadeInUp, infinite: infinite, pulse: pulse }"
       class="pointer pulse animated">
          <span><img alt="Down Arrow icon" id="nav-logo" src="storage/images/downarrow.png"></span>
        </h3>
      </center>
    </div>
</template>

<script>
    export default {
      data (){
        return{
          fadeInUp: true,
          infinite: true,
          pulse: true
        }
      },
      methods: {
        handleDownArrowClick: function () {
          this.infinite = false;
          const element = document.getElementById("about-section");
          element.scrollIntoView({ block: 'end',  behavior: 'smooth' });
        },
        changeDownArrowToPulse: function () {
          this.fadeInUp = false;
        }
      },
      created () {
        setTimeout(this.changeDownArrowToPulse, 4900);
      }
      // data () {
      //
      // }
    }
    </script>

    <style scoped>
    #down-arrow{
      animation-delay: 4s;
    }
    </style>
    }
</script>
