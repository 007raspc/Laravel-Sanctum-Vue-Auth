<template>
    <div>1</div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: "Edit Product Component",
    methods: {
        ...mapActions([]),
    },
    components: {
    },
    mounted() {
        console.log('Edit Product Component');
    },
}
</script>
