<template>
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="fw-bold mb-0 text-uppercase">Login</h2>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" @submit.prevent="onSubmit()">
                    <div class="row mb-3">
                        <label for="username" class="col-md-4 col-form-label text-md-end">Login or Email</label>
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control" name="username"
                                   required="" autofocus=""
                                   v-model="form.username"
                                   :class="{ 'is-invalid': errors.username }">
                            <div class="invalid-feedback 1" v-if="errors.username">
                                <small class="d-inline-block" v-for="(error, index) in errors.username"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control"
                                   name="password"
                                   required="" autocomplete="current-password"
                                   v-model="form.password"
                                   :class="{ 'is-invalid': errors.password }">
                            <div class="invalid-feedback" v-if="errors.password">
                                <small class="d-inline-block" v-for="(error, index) in errors.password"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                       v-model="form.remember" checked>
                                <label class="form-check-label" for="remember"> Remember Me</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-4">
                            <button class="btn btn-primary mb-5">Login</button>
                            <!--                            <p class="mb-0"><a class="" href="#!">Forgot password?</a></p>-->
                            <p class="mb-0">Don't have an account?
                                <router-link class="fw-bold" :to="{name: 'auth.register'}">Sign Up</router-link>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "Login Component",
    data() {
        return {
            form: {
                username: null,
                password: null,
                remember: true,
            },
            errors: {},

        }
    },
    methods: {
        ...mapActions([
            'login',
        ]),
        onSubmit() {
            this.errors = {}
            this.login(this.form)
                .then(() => {
                    this.$router.push({name: 'dashboard'})
                })
                .catch(error => {
                    this.errors = error.errors || {}
                })
        },
    },


}
</script>

<style scoped>
.card {
    border-radius: 1rem;
}
</style>
