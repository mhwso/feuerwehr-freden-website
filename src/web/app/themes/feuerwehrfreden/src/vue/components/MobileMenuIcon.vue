<template>
    <a class="menu-button" href="#" v-on:click="toggleActive">
        <div :class="{'is-active': isActive}" class="menu-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </a>
</template>

<script>
export default {
    name: 'MobileMenuIcon',
    mounted() {
        this.$root.$on('mobileMenuClosed', () => {
            this.reset();
        });
    }, data() {
        return {
            isActive: false
        };
    }, methods: {
        toggleActive: function (event) {
            event.preventDefault();
            this.isActive = !this.isActive;
            this.$root.$emit('toggleSidebar');
        },
        reset: function () {
            this.isActive = false;
        }
    }
};
</script>

