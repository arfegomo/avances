import axios from "axios";
import { defineStore } from "pinia";

export const useAuthStore = defineStore("auth", {

    state: () => ({

        authUser: null,

        authStatus: null,

        authErrors: [],

        pacientes: [],

        paciente: null,

        usuario: []

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

        async showUser(id){

            await axios.get(`/api/user-show/${id}`)

            .then(response => {

                const { name, last_name, identificacion, email, ubicacion, celular } = response.data

                this.usuario.name = name;
                this.usuario.last_name = last_name;
                this.usuario.identificacion = identificacion;
                this.usuario.email = email;
                this.usuario.ubicacion = ubicacion;
                this.usuario.celular = celular;

                //console.log(response.data)

            })

            .catch(error => {

                console.log(error);

            })
        },

        async actualizar(form){

            this.authErrors = [];

            try {
                
                await axios.put(`/api/user-update/${form.id}`, {

                    name: this.usuario.name,
                    last_name: this.usuario.last_name,
                    email: this.usuario.email,
                    celular: this.usuario.celular,
                    ubicacion: this.usuario.ubicacion,
                    password: form.password,
                    password_confirmation: form.password_confirmation                    

                })

                this.router.push("/");

            } catch (error) {
                
                if(error.response.status === 422){

                    this.authErrors = error.response.data.errors;
                    
                }
            }
        },

        async handleLogin(data){

            this.authErrors = [];
            
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

            this.authErrors = [];

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

        async passwordChange(data){

            this.authErrors = [];

            await this.getToken();

            try {
                
                await axios.put(`/api/password-change/${data.id}`, {
    
                    password: data.password,
                    password_confirmation: data.password_confirmation
        
                });
                 
                this.router.push("/");

            } catch (error) {
                
                if(error.response.status === 422){

                    this.authErrors = error.response.data.errors;

                }
            }
        }

    },


});