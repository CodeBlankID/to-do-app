import { createRouter, createWebHistory } from 'vue-router'
import Login from '../pages/Login.vue'
import Task from '../pages/Task.vue'
import Dashboard from '../pages/Dashboard.vue'
import { useLoginStore } from '../stores/login'
import Formtask from '../pages/Formtask.vue'
import Formtaskdetail from '../pages/Formtaskdetail.vue'
import Formeditdetail from '../pages/Formeditdetail.vue'

const routes = [
    {
        path: '/',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/task',
        name: 'Task',
        component: Task
    }
    ,
    {
        path: '/logout',
        name: 'Logout'
    }
    ,
    {
        path: '/addtask',
        name: 'AddTask',
        component: Formtask
    }
    ,
    {
        path: '/addtaskdetail/:idtask',
        name: 'AddTaskDetail',
        component: Formtaskdetail,
        props: true
    }
    ,
    {
        path: '/editdetail/:iddetail',
        name: 'EditDetail',
        component: Formeditdetail,
        props: true
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

// router.beforeEach((to) => {
//     const loginStore = useLoginStore()
//     const publicPages = ['/', '/signup']
//     const authRequired = !publicPages.includes(to.path)

//     if (authRequired && !loginStore.isLogin) {

//         loginStore.returnUrl = to.fullPath
//         return '/'
//     }
// })

export default router