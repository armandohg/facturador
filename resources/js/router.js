import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

// Pages
import Login from './views/Login'
import Logout from './views/Logout'
import Panel from './views/Panel'

// Routes
const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'is-active',
    routes: [
        {
            path: '/login',
            name: 'login',
            component: Login,
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
            meta: {
                requiresAuth: true,
            }
        },
        {
            path: '/panel',
            name: 'panel',
            component: Panel,
            meta: {
                requiresAuth: true,
            }
        },
        // Crear rutas para interactuar con la API
    ],
});

export default router
