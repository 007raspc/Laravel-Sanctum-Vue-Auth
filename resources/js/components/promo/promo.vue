<template>
    <Header/>
    <div class="container-xxl">
        <div class="row">
            <div class="col-12">
                <h1 class="display-1 mt-5 text-center">Promo Title</h1>
            </div>
        </div>
    </div>
</template>

<script>
import Header from '../layout/header.vue'

export default {
    name: "Promo Page Component",
    components: {
        'Header': Header,
    },
}
</script>

<style>

</style>
