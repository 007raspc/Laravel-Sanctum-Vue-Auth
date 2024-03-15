<template>
    <div class="bd-intro">
        <h1>Product Index Template</h1>
    </div>
    <div class="bd-content">
        <router-view/>
    </div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: 'Template Product Component',
    methods: {
        ...mapActions([]),
    },
    components: {
    },
    mounted() {
        console.log('Template Product Component');
    },
}
</script>
