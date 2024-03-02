<template>
    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="fw-bold mb-0 text-uppercase">Register</h2>
            </div>
            <div class="card-body">
                <form class="form-horizontal" role="form" @submit.prevent="onSubmit()">
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name"
                                   v-model="form.name"
                                   :class="{ 'is-invalid': errors.name }"
                                   required="" autocomplete="name" autofocus="">
                            <div class="invalid-feedback" v-if="errors.name">
                                <small class="d-inline-block" v-for="(error, index) in errors.name"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control" name="email"
                                   v-model="form.email"
                                   :class="{ 'is-invalid': errors.email }"
                                   required="" autocomplete="email">
                            <div class="invalid-feedback" v-if="errors.email">
                                <small class="d-inline-block" v-for="(error, index) in errors.email"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>
                        <div class="col-md-6">
                            <select id="role" class="form-select"
                                    v-model="form.role"
                                    :class="{ 'is-invalid': errors.role }">
                                <option selected></option>
                                <option value="user">User</option>
                                <option value="manager">Manager</option>
                            </select>
                            <div class="invalid-feedback" v-if="errors.role">
                                <small class="d-inline-block" v-for="(error, index) in errors.role"
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
                                   v-model="form.password"
                                   :class="{ 'is-invalid': errors.password }"
                                   name="password" required="" autocomplete="new-password">
                            <div class="invalid-feedback" v-if="errors.password">
                                <small class="d-inline-block" v-for="(error, index) in errors.password"
                                       :key="index">
                                    {{ error }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm
                            Password</label>
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   v-model="form.password_confirmation"
                                   name="password_confirmation" required="" autocomplete="new-password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-4 mb-0">
                            <button class="btn btn-primary mb-5">Register
                            </button>
                            <p class="mb-0">Have an account?
                                <router-link class="fw-bold" :to="{name: 'auth.login'}">Login</router-link>
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <router-view/>
</template>

<script>
import {mapActions} from "vuex";

export default {
    name: "Register Component",
    data() {
        return {
            form: {
                name: null,
                email: null,
                role: null,
                password: null,
                password_confirmation: null,
            },
            errors: {},

        }
    },
    methods: {
        ...mapActions([
            'register',
        ]),
        onSubmit() {
            this.errors = {}
            this.register(this.form)
                .then(() => {
                    this.$router.push({name: 'auth.login'})
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
