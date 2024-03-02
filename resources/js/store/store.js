import {createStore, createLogger} from 'vuex'
// import toast from './modules/toast'
import auth from './modules/auth';

const debug = process.env.NODE_ENV !== 'production'

const store = createStore({
    plugins: debug ? [createLogger()] : [],
    modules: {
        // toast,
        // helper,
        auth,
        // products,
        // sheets,
        // marketplace,
        // orders,
    },
})
export default store
