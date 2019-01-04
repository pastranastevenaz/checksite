
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./scripts');
$(function() {
    var header = $(".clearHeader");
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        // if (scroll >= 840) {
        //     // header.removeClass('clearHeader').addClass("darkHeader");
        //     console.log("Greater than: " + scroll);
        // } else {
        //   console.log("Less than: " + scroll);
        //     // header.removeClass("darkHeader").addClass('clearHeader');
        // }
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

Vue.component(
  'services',
  require('./components/ServicesComponent.vue')
);
Vue.component(
  'addAddress',
  require('./components/AddAddressComponent.vue')
);

Vue.component(
    'alljobs',
    require('./components/AllJobsComponent.vue')
);

Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue')
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue')
);

Vue.component(
    'passport-personal-access-tokens',
    require('./components/passport/PersonalAccessTokens.vue')
);
Vue.component(
    'homeabout',
    require('./components/HomeAboutComponent.vue')
);
Vue.component(
    'downarrow',
    require('./components/DownArrowComponent.vue')
);
Vue.component(
    'contact',
    require('./components/ContactComponent.vue')
);
Vue.component(
  'helpsection',
  require('./components/HelpSectionComponent.vue')
);
Vue.component(
  'blogcomponent',
  require('./components/BlogComponent.vue')
);
Vue.component(
  'migrationscomponent',
  require('./components/MigrationsComponent.vue')
);

Vue.component(
  'indexmenu',
  require('./components/IndexMenuComponent.vue')
);

const app = new Vue({
  el: '#app'
});
