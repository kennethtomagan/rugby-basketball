require('./bootstrap');
import {createApp} from 'vue'
import router from './router'
import App from './App.vue'
import axios from 'axios'
import VueAxios from 'vue-axios'

const app = createApp(App);
app.router = router
app.use(router)
app.use(VueAxios, axios)
app.mount("#app")
