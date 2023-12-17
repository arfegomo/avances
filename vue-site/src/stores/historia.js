import axios from "axios";
import { defineStore } from "pinia";
//import Swal from "sweetalert2";

export const useHistoriaStore = defineStore("historia", {

    state: () => ({

        historiaErrors: [],

        historiasPaciente: [],

        historiaPaciente: [],

    }),

    getters: {

        errors: (state) => state.historiaErrors

    },

    actions: {

        async mostrarHistoriasPaciente(id) {

            await axios.get(`/api/historia/${id}`)

            .then(response => {

                this.historiasPaciente = response.data

                //console.log(this.historiasPaciente);

            })

            .catch(error => {

                console.log(error);

            })
        },

        async crear(data){

            this.historiaErrors = [];

            try {
                
                await axios.post("/api/historia", {

                    profesional_id: data.profesional_id,
                    paciente_id: data.paciente_id,
                    antecedentes: data.antecedentes,
                    evolucion: data.evolucion,
                    concepto: data.concepto,
                    recomendaciones: data.recomendaciones

                });

                this.router.push(`/profesional/${data.paciente_id}`);

            } catch (error) {
                
                console.log(error);

            }
        },

        async actualizar(id, url){            //console.log(url);

            this.historiaErrors = [];

            try {
                
                await axios.put(`/api/historia-update/${id}`, {

                    estado: 1,
                    firma: url

                })

                this.router.push("/");

            } catch (error) {
                
                console.log(error);
            }
        },

        async mostrarHistoriaPaciente(id){

            await axios.get(`/api/firmar-historia/${id}`)

            .then(response => {

                const { name, last_name, identificacion } = response.data.paciente

                const { id, created_at, firma } = response.data

                this.historiaPaciente.name = name + " " + last_name;
                this.historiaPaciente.identificacion = identificacion;
                this.historiaPaciente.id = id;
                this.historiaPaciente.created_at = created_at;
                this.historiaPaciente.firma = firma;

                //console.log(response.data)

            })

            .catch(error => {

                console.log(error);

            })
        }
        
    }
})