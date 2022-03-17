import Vue from 'vue';

Vue.component('mobile-menu', require('./components/MobileMenu.vue').default);
Vue.component('mobile-menu-icon', require('./components/MobileMenuIcon.vue').default);

new Vue({
    el: '#app',
    mounted() {
        this.$root.$on('stopScrolling', () => {
            document.body.classList.add('has--no-scrolling');
        });

        this.$root.$on('resumeScrolling', () => {
            document.body.classList.remove('has--no-scrolling');
        });
    },
    computed: {},
    data: {}
});
