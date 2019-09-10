import VueRouter from 'vue-router';
import Machine from './components/VendingMachine';

export default new VueRouter({
    routes: [{
        path: '/',
        component: Machine
    }],
    mode: 'history'
});