import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)
import Login from '../components/auth/Login'
import Signup from '../components/auth/Signup'
import Logout from '../components/auth/Logout'
import CreateCategory from '../components/category/CreateCategory'
import Forum from '../components/forum/Forum'
import ReadQuestion from '../components/forum/ReadQuestion'
import CreateQuestion from '../components/forum/CreateQuestion'

const routes = [
	{ path: '/login', component: Login },
	{ path: '/logout', component: Logout },
	{ path: '/signup', component: Signup },
	{ path: '/category', component: CreateCategory },
	{ path: '/forum', component: Forum, name: 'forum' },
	{ path: '/ask', component: CreateQuestion },
	{ path: '/question/:slug', component: ReadQuestion, name: 'read' },
]




const router = new VueRouter({
	routes, // short for 'routes: router'
	hashbang: false,
	mode: 'history'
})


export default router