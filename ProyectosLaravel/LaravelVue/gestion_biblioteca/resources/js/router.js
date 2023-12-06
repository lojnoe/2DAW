import { createRouter, createWebHistory} from 'vue-router'
import HelloWorld from '@/components/HelloWorld.vue'
import BookList from '@/components/BookList.vue'


const routes = [
    {
        path : '/books',
        component : BookList,
    }
]

const router =  createRouter({
    history: createWebHistory(),
    routes,
})

export default router
