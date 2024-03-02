<template>
    <div/>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: "Logout Component",
    methods: {
        ...mapActions([
            'logout',
        ]),
    },
    mounted() {
        this.logout()
            .then(() => {
                this.$router.push({name: 'promo'})
            })
    },
}
</script>
