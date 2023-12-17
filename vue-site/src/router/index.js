import { createRouter, createWebHistory } from "vue-router";

import Home from "../components/Home.vue";

const routes = [

    { 
        path: "/", 
        name: 'Home', 
        component: Home 
    },

    { 
        path: "/guest", 
        name: 'Guest', 
        component: () => import("../components/Guest.vue") 
    },

    { 
        path: "/login", 
        name: 'Login',
        component: () => import("../components/Login.vue") 
    },

    { 
        path: "/register", 
        name: 'Register',
        component: () => import("../components/Register.vue") 
    },

    { 
        path: "/profesional/:id", 
        name: 'Historia',
        component: () => import("../components/profesional/Historia.vue") 
    },

    { 
        path: "/profesional/create/:id", 
        name: 'CreateHistoria',
        component: () => import("../components/profesional/Create.vue") 
    },

    { 
        path: "/paciente/edit/:id", 
        name: 'FirmarHistoria',
        component: () => import("../components/paciente/Edit.vue") 
    },

    { 
        path: "/perfil/edit/:id", 
        name: 'Perfil',
        component: () => import("../components/Perfil.vue") 
    },

];

const router = createRouter({

    history: createWebHistory(),
    routes,

});

export default router;