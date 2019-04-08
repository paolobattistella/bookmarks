
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/* vendor components */
// Vue.use(VueInternationalization);
// const lang = document.documentElement.lang.substr(0, 2);
// // or however you determine your current app locale
// const i18n = new VueInternationalization({
//     locale: lang,
//     messages: Locale
// });

//Vue.component('multiselect', require('vue-multiselect'));
//Vue.component(Buefy.Checkbox.name, Buefy.Checkbox);
/* custom components */
Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('bookmark-search', require('./components/BookmarkSearch.vue'));
Vue.component('bookmark-table', require('./components/BookmarkTable.vue'));
Vue.component('category-table', require('./components/CategoryTable.vue'));
Vue.component('tag-table', require('./components/TagTable.vue'));
Vue.component('tag-multiselect', require('./components/TagMultiselect.vue'));
//Vue.component('tag-input', require('./components/TagInput.vue'));

const app = new Vue({
    el: '#app',
    // i18n,
});


// Bulma NavBar Burger Script
document.addEventListener('DOMContentLoaded', function () {
    // Get all "navbar-burger" elements
    const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

    // Check if there are any navbar burgers
    if ($navbarBurgers.length > 0) {

        // Add a click event on each of them
        $navbarBurgers.forEach(function ($el) {
            $el.addEventListener('click', function () {

                // Get the target from the "data-target" attribute
                let target = $el.dataset.target;
                let $target = document.getElementById(target);

                // Toggle the class on both the "navbar-burger" and the "navbar-menu"
                $el.classList.toggle('is-active');
                $target.classList.toggle('is-active');

            });
        });
    }

});



require('./bulma-extensions');
