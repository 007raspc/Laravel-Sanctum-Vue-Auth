<template>
    <Header/>
    <div class="container-xxl db-layout">
        <Aside/>
        <main class="db-main">
            <Dashboard/>
        </main>
    </div>
    <Footer/>
</template>

<script>
import Header from '../layout/header.vue'
import Aside from '../layout/aside.vue'
import Footer from '../layout/footer.vue'
import Dashboard from '../dashboard/dashboard.vue'

export default {
    name: "Dashboard template Component",
    components: {
        'Header': Header,
        'Aside': Aside,
        'Footer': Footer,
        'Dashboard': Dashboard,
    },
    mounted() {
        console.log('Dashboard template Component');
    }
}
</script>

<style scoped>

</style>
