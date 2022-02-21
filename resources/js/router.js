import vueRouter from 'vue-router'
import Vue from 'vue'

Vue.use(vueRouter)

import FeedbackForm from './components/FeedbackForm.vue'

const routes = [
    {
        path: "/",
        component: FeedbackForm
    }
]

export default new vueRouter({
    mode: "history",
    routes
})
