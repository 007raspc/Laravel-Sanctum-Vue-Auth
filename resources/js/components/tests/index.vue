<template>
    <main class="db-main">
        <div class="bd-intro">
            <h1>Test Index Component</h1>
        </div>
        <div class="bd-content row">
            <div class="col-12">
                123
            </div>
        </div>
    </main>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "TestIndexController",
    data() {
        return {
            data: {
                documentId: '1v6PJvPCmPaFCQZLAUNQ6uNOUfgpdCGEMtkZDvn5yZzg',
                range: 'list1!A1:H10',
            }
        }
    },
    mounted() {
        this.readSheets(this.data)
        this.onStart()
    },
    methods: {
        ...mapActions([
            'readSheets',
        ]),
        onStart() {
            console.log(123)
        },
    },
}
</script>

<style scoped>

</style>
