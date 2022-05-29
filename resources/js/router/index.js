import Vue from "vue";
import VueRouter from 'vue-router';

Vue.use(VueRouter)

const routes = [
    {
        path: '/report',
        name: 'report',
        component: () => import('../components/pages/Report')
    },
    {
        path: '/detail/:id',
        name: 'detail',
        component: () => import('../components/pages/Detail')
    },

]

const router = new VueRouter({
    mode: 'history',
    routes
})

export default router
