import './bootstrap';
import { createApp } from 'vue';
import HelloWorld from '@/components/HelloWorld.vue';
import BookList from '@/components/BookList.vue';
// crear aplicacion
import router from "./router";


import '../css/app.css';


createApp(HelloWorld).use(router).mount("#app");
