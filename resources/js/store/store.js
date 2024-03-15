import {createStore, createLogger} from 'vuex'
// import toast from './modules/toast'
import auth from './modules/auth'
import product from './modules/product'
import helper from './modules/helpers'
import company from './modules/companies'

const debug = process.env.NODE_ENV !== 'production'

const store = createStore({
    plugins: debug ? [createLogger()] : [],
    modules: {
        // toast,
        // helper,
        auth,
        product,
        helper,
        company,
        // sheets,
        // marketplace,
        // orders,
    },
})
export default store
