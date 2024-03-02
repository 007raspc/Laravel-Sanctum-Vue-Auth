<template>
    <div>1</div>
</template>

<script>
import {mapActions} from 'vuex'

export default {
    name: "Index Product Component",
    methods: {
        ...mapActions([]),
    },
    components: {
    },
    mounted() {
        console.log('Index Product Component');
    },
}
</script>
