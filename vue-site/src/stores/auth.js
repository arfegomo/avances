import axios from "axios";
import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {

    state: () => ({

        authUser: null,

        authStatus: null,

        authErrors: [],

        pacientes: [],

        paciente: null,

    }),

    getters: {

        user: (state) => state.authUser,

        errors: (state) => state.authErrors,

        status: (state) => state.authStatus

    },

    actions: {

        async getToken(){

            await axios.get('/sanctum/csrf-cookie');
        },

        async getUser(){

            await this.getToken();

            const data = await axios.get('/api/user');

            this.authUser = data.data;

        },

        async getPaciente(id){

            const data = await axios.get(`/api/paciente/${id}`);

            this.paciente = data.data;

            //console.log(this.paciente);

        },

        async getPacientes() {

            await axios.get("/api/pacientes")

            .then(response => {

                this.pacientes = response.data

                //console.log(this.pacientes);

            })

            .catch(error => {

                console.log(error);

            })
        },

        async handleLogin(data){
            
            await this.getToken();
    
            try {
                
                await axios.post('/login', {
    
                    identificacion: data.identificacion,
                    password: data.password,
                    is_profesional: data.is_profesional
        
                });

                this.router.push("/");               

            } catch (error) {
                                
                if(error.response.status === 422){

                    this.authErrors = error.response.data.errors;
                    
                }
                
            }
    
        },

        async handleRegister(data){

            await this.getToken();

            try {
                
                await axios.post('/register', {
    
                    name: data.name,
                    last_name: data.last_name,
                    email: data.email,
                    celular: data.celular,
                    ubicacion: data.ubicacion,
                    identificacion: data.identificacion,
                    is_profesional: data.is_profesional,
        
                });
                 
                this.router.push("/");

            } catch (error) {
                
                if(error.response.status === 422){

                    this.authErrors = error.response.data.errors;
                    
                }

            }
        },

        async handleLogout(){

            await axios.post("/logout");

            this.authUser = null;

            this.router.push("/login");
        },

    }

});