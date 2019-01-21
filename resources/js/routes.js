import posts from './components/posts'
import users from './components/users'

export const routes = [
    { path: '/posts', component: posts},
    { path: '/users', component: users, props: true}
]