import Vue from 'vue'
import VueRouter from 'vue-router'
import ElementUI from 'element-ui'

import 'element-ui/lib/theme-chalk/index.css'
import 'element-ui/lib/theme-chalk/display.css'

import App from './views/App'
import Home from './views/Home'
import Add from './views/Add'

Vue.use(ElementUI)
Vue.use(VueRouter)

Vue.component('app', App)

const router = new VueRouter({
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/add',
            name: 'add',
            component: Add
        }
    ]
})
Vue.router = router
App.router = Vue.router

const app = new Vue({
    App,
    router
}).$mount('#app')
