<template>
    <header class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm">
        <div class="container">
            <button class="btn navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#bdSidebar"
                    aria-controls="bdSidebar" aria-expanded="false" aria-label="navigation">
                <span class="bi bi-toggle-off"></span>
                <span class="bi bi-toggle-on"></span>
            </button>
            <button @click.prevent="showTest()">Show Tests</button>
            <template v-if="!user">
                <router-link class="navbar-brand" :to="{name: 'promo'}">
                    <i class="bi bi-badge-3d" style="font-size: 2rem; color: cornflowerblue;"></i>
                    Promo
                </router-link>
                <ul class="navbar-nav flex-grow-1">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Что делаем</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Как делаем</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Почему делаем</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Ништяки</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Контакты</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'auth.login'}">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'auth.register'}">Register</router-link>
                    </li>
                </ul>
            </template>
            <template v-if="user">
                <router-link class="navbar-brand flex-grow-1" :to="{name: 'dashboard'}">
                    <i class="bi bi-badge-3d" style="font-size: 2rem; color: cornflowerblue;"></i>Dashboard
                </router-link>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name: 'promo'}">
                            <i class="bi bi-1-circle"></i>Promo
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" title="" aria-current="page">
                            <i class="bi bi-1-circle"></i>
                            <span>Поддержка</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" title="" aria-current="page">
                            <i class="bi bi-1-circle"></i>
                            <span>Вопросы/ответы</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="" aria-current="page">
                            <i class="bi bi-1-circle"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li class="dropdown profile">
                        <button class="dropdown-toggle" :id="'dropdown_header'"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <img :src="user.avatar[0]"
                                 alt="mdo" class="avatar rounded-circle">
                            <span class="account-data">
                                                <span class="fw-bold">{{ user.name }}</span>
                                                <small class="opacity-75">{{ user.email }}</small>
                                            </span>
                        </button>

                        <ul class="dropdown-menu" role="menu" :aria-labelledby="'dropdown_header'">
                            <li>
                                <router-link class="dropdown-item" :to="{ name: 'profile', hash: '#company' }">
                                    <small>Company:</small>
                                    <span class="fw-bold">{{ user.company ? user.company.name : 'DEFAULT' }}</span>
                                </router-link>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <router-link class="dropdown-item" :to="{name: 'profile' }">Profile</router-link>
                            </li>
                            <li>
                                <router-link class="dropdown-item" :to="{name: 'logout' }">Logout</router-link>
                            </li>
                        </ul>
                    </li>
                </ul>
            </template>
        </div>
    </header>
</template>

<script>
import {Dropdown} from 'bootstrap'
import {mapGetters, mapState} from 'vuex'

export default {
    name: 'Header component',
    data() {
        return {
            avatarDefaultUrl: '/storage/users_data/default_avatar.jpg',
        }
    },
    components: {},
    computed: {
        ...mapGetters({
            user: 'user',
        }),
        ...mapState({
            // route: state => state.route,
        }),
    },
    watch: {
        route() {
            this.$forceUpdate()
        },
    },
    mounted() {
    },
    methods: {
        showTest() {
            // console.log(this.auth_user);
        },
    },
}
</script>

<style scoped>
.profile .dropdown-menu {
    position: absolute;
    width: 100%;
}

.profile .dropdown-menu .dropdown-item {
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.profile .dropdown-menu small {
    line-height: 0.2rem;
    display: block;
    margin-top: 0.2rem;
}

.profile .dropdown-toggle {
    background: transparent;
    border: 0;
    color: white;
    display: flex;
    align-items: center;
    flex-direction: row;
    opacity: 0.8;
    transition: opacity 0.3s ease;
}

.profile .dropdown-toggle:hover {
    opacity: 1;
}

.profile .avatar {
    width: 35px;
    height: 35px;
}

.profile .account-data {
    display: flex;
    flex-direction: column;
    align-items: baseline;
    margin-left: 0.5rem;
    line-height: 1rem;
}


/*.profile a {*/
/*    display: flex;*/
/*    align-items: center;*/
/*    min-width: 10rem;*/
/*}*/

/*.profile .account-user {*/
/*    display: inline-flex;*/
/*    flex-direction: column;*/
/*    margin-left: 0.5rem;*/
/*    line-height: 1rem;*/
/*    white-space: nowrap;*/
/*    overflow: hidden;*/
/*    text-overflow: ellipsis;*/
/*}*/
</style>
