<template>
    <div>1</div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: "Show Product Component",
    methods: {
        ...mapActions([]),
    },
    components: {
    },
    mounted() {
        console.log('Show Product Component');
    },
}
</script>
