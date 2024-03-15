<template>
        <div class="bd-intro">
            <h1>Profile Component</h1>
            <router-link class="btn btn-primary mb-3" :to="{name: 'dashboard'}">Dashboard</router-link>
        </div>
    <div class="bd-content">
        <div class="row g-3" v-if="me">
            <div class="col-md-8">
                <ProfileEdit :user="me" @updated="updateMe()" />
                <CompaniesIndex :user="me" />
                <div class="row" ref="other">
                    Other
                </div>
            </div>
            <div class="col-md-4">
                <div class="list-group d-none d-md-block">
                    <button class="list-group-item list-group-item-action"
                            @click.prevent="ankerLink('user')"
                            :class="{ active: scroll_spy.is_active === 'user' }">
                        Profile
                    </button>
                    <button class="list-group-item list-group-item-action"
                            @click.prevent="ankerLink('companies')"
                            :class="{ active: scroll_spy.is_active === 'companies' }">
                        Companies
                    </button>
                    <button class="list-group-item list-group-item-action"
                            @click.prevent="ankerLink('other')"
                            :class="{ active: scroll_spy.is_active === 'other' }">
                        Other
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {mapActions, mapGetters} from 'vuex'
import CompaniesIndex from '../companies/index.vue'
import ProfileEdit from './edit.vue'

export default {
    name: 'User Profile Component',
    data() {
        return {
            name: 'User Profile Component',
            scroll_spy: {
                is_active: 'user'
            },
            errors: {},
        }
    },
    components: {
        CompaniesIndex,
        ProfileEdit,
    },
    computed: {
        ...mapGetters({
            me: 'user',
        }),
    },
    methods: {
        ...mapActions([
            'checkLogin'
        ]),
        ankerLink(link) {
            const element = this.$refs[link];
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' })
            }
        },
        updateMe() {
            this.checkLogin()
        },
    },
    mounted() {
        console.log('User Profile Component');
    },
}
</script>

<style>

</style>
