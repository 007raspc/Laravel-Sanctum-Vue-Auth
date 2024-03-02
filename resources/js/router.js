import {createRouter, createWebHistory} from 'vue-router'
import store from './store/store.js'

const routes = [
    {
        path: '/get',
        name: 'get',
        component: () => import('./components/get.vue'),
    },
    {
        path: '/post',
        name: 'post',
        component: () => import('./components/post.vue'),
    },
    {
        path: '/',
        name: 'promo',
        component: () => import('./components/promo/promo.vue'),
    },
    {
        path: '/auth',
        component: () => import('./components/auth/default.vue'),
        children: [
            {
                path: '/login',
                name: 'auth.login',
                component: () => import('./components/auth/login.vue'),
                meta: {guestOnly: true},
            },
            {
                path: '/register',
                name: 'auth.register',
                component: () => import('./components/auth/register.vue'),
                meta: {guestOnly: true},
            },
            {
                path: '/logout',
                name: 'logout',
                component: () => import('./components/auth/logout.vue'),
                meta: {requiresAuth: true},
            },
            {
                path: '/profile',
                name: 'profile',
                component: () => import('./components/auth/profile.vue'),
                meta: {requiresAuth: true},
            },
        ],
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: () => import('./components/dashboard/default.vue'),
        meta: {requiresAuth: true},
        children: [
            {
                path: '/',
                name: 'dashboard.index',
                component: () => import('./components/dashboard/dashboard.vue'),
            },
            {
                path: '/products',
                'name': 'products',
                component: () => import('./components/products/template.vue'),
                children: [
                    {
                        path: '/',
                        name: 'products.index',
                        component: () => import('./components/products/index.vue'),
                    },
                    {
                        path: '/',
                        name: 'products.create',
                        component: () => import('./components/products/create.vue'),
                    },
                    {
                        path: '/',
                        name: 'products.edit',
                        component: () => import('./components/products/edit.vue'),
                    },
                    {
                        path: '/',
                        name: 'products.show',
                        component: () => import('./components/products/show.vue'),
                    },
                ],
            },
            {
                path: '/products',
                name: 'products.index',
                component: () => import('./components/products/index.vue'),
            },
        ],
    },
    {
        path: '/:catchAll(.*)', // Unrecognized path automatically matches 404
        name: 'page404',
        component: () => import('./components/404.vue'),
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (to.hash) {
            return {
                selector: to.hash,
                behavior: 'smooth'
            };
        } else if (savedPosition) {
            return savedPosition
        } else {
            return {x: 0, y: 0}
        }
    },
})

router.beforeEach(async (to, from, next) => {
    if (!store.state.auth.user && localStorage.getItem('access_token')) {
        await store.dispatch('checkLogin')
    }
    const is_authenticated = localStorage.getItem('access_token') && store.state.auth.user
    if (to.meta.requiresAuth && !is_authenticated) {
        next({name: 'auth.login'})
    } else if (to.meta.guestOnly && is_authenticated) {
        next({name: 'profile'})
    } else {
        next()
    }
})

export default router
