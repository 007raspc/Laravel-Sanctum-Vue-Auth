<template>
    <div class="bd-intro">
        <h1>Dashboard Index Component</h1>
    </div>
    <div class="bd-content">
        <button @click.prevent="test1()">Test</button>
        <br>
        <button @click.prevent="test2()">Test</button>
    </div>
</template>

<script>
import store from '../../store/store.js';
import {mapActions} from "vuex";

export default {
    name: "Dashboard App Component",
    components: {},
    methods: {
        ...mapActions([
            'checkLogin',
        ]),
        test1() {
            this.checkLogin()
        },
        test2() {
            console.log(store.state);
        }
    },
    mounted() {
        console.log('Dashboard App Component');
    }
}
</script>

<style>

</style>
