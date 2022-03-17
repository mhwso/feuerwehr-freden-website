<template>
  <div :class="{'is-active': isActive}" class="slideout-sidebar">
    <ul>
      <li><a href="/"><img src="assets/img/logo_white.png" class="img-fluid" alt="Logo"/></a></li>
      <li v-for="route in routes" v-on:click="close">
        <a :href="route.url" :title="route.title">
          {{ route.name }}
        </a>
      </li>
    </ul>
  </div>
</template>

<style>
.slideout-sidebar {
  box-shadow       : 2px 0 2px 0 rgba(33, 37, 41, 0.3);
  background-color : #130f0d;
  height           : 100vh;
  position         : fixed;
  left             : -260px;
  top              : 0;
  transition       : all 300ms ease-in-out;
  width            : 250px;
  z-index          : 999999;
}

.slideout-sidebar ul {
  margin          : 0;
  padding         : 0;
  list-style-type : none;
  display         : block;
}

/*.slideout-sidebar ul li:first-child {*/
/*  padding : 20px;*/
/*}*/

.slideout-sidebar ul li {
  border-bottom  : 1px solid rgba(255, 255, 255, 0.10);
  color          : #fff;
  cursor         : pointer;
  font-weight    : bold;
  list-style     : none;
  text-transform : uppercase;
}

.slideout-sidebar ul a {
  color           : #fff;
  cursor          : pointer;
  display         : block;
  font-weight     : normal;
  padding         : 20px;
  text-decoration : none;
  text-transform  : uppercase;
  letter-spacing  : 4px;
}

.slideout-sidebar ul a:hover {
  color : #d0cece;
}

.slideout-sidebar.is-active {
  left : 0;
}
</style>


<script>
export default {
  name: 'MobileMenu',
  components: {},
  mounted() {
    this.$root.$on('toggleSidebar', () => {
      this.toggleActive();
    });
  },
  data() {
    return {
      routes: [
        {
          url: '/about',
          name: 'About',
          title: 'About',
          type: 'page'
        },
        {
          url: '/legal-notice',
          name: 'Legal notice',
          title: 'Legal notice',
          type: 'page'
        },
        {
          url: '/data-privacy',
          name: 'Data Privacy',
          title: 'Data Privacy',
          type: 'page'
        }
      ],
      isActive: false
    };
  }, methods: {
    toggleActive: function () {
      this.isActive = !this.isActive;
    },
    close: function () {
      this.isActive = false;
      this.$root.$emit('mobileMenuClosed');
    }
  }
};
</script>



