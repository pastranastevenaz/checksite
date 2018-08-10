
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$(function() {
    var header = $(".clearHeader");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 840) {
            // header.removeClass('clearHeader').addClass("darkHeader");
            console.log("Greater than: " + scroll);
        } else {
          console.log("Less than: " + scroll);
            // header.removeClass("darkHeader").addClass('clearHeader');
        }
    });
});



window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));
// 
// Vue.component('statedrop', require('./components/Statedrop.vue'));
//
// const app = new Vue({
//     el: '#statedrop'
// });
