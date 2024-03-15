import '../sass/app.scss'
import {createApp} from 'vue'
import axios from 'axios'
import store from './store/store'
import router from './router'
import App from './components/app.vue'

window.axios = axios
axios.defaults.withXSRFToken = true

// Authorization header
axios.interceptors.request.use(config => {
    // configuration axios headers
    config.headers.Accept = 'application/json';
    config.withCredentials = true;
    const token = localStorage.getItem('access_token');
    if (token) {
        config.headers.Authorization = `Bearer ` + token;
    }
    return config
}, error => Promise.reject(error))


const app = createApp(App)
app.use(router)
app.use(store)
app.component('App', App)

app.mount('#app')
