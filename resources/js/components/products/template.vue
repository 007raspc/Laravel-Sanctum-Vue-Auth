<template>
    <div>1</div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: "Create Product Component",
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
