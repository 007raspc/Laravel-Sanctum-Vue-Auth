<template>
    <div class="bd-intro">
        <h1>Dashboard1 Index Component</h1>
    </div>
    <div class="bd-content">
        <button @click.prevent="test1()">Test</button>
    </div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: 'Dashboard App Component',
    data() {
        return {
            name: 'Dashboard App Component',
            errors: {},
        }
    },
    components: {},
    methods: {
        ...mapActions([
            'checkLogin',
        ]),
        test1() {
            // console.log(this.$route.name)
        },
    },
    mounted() {
        console.log('Dashboard App Component')
    }
}
</script>

<style>

</style>
