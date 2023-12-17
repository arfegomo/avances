<script setup>
    
    import { onMounted } from 'vue';

    import { useAuthStore } from '../stores/auth';

    import { useHistoriaStore } from '../stores/historia';

    import { useRoute } from 'vue-router';

    const route = useRoute();

    const historiaStore = useHistoriaStore();

    const authStore = useAuthStore();

    onMounted(async () => {
        
        await authStore.getUser();

        await authStore.getPacientes();

        await historiaStore.mostrarHistoriasPaciente(authStore.user.id);

    });

</script>

<template>
    <div v-if="authStore.user"> 

        <div v-if="authStore.user.is_profesional == 0" class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"> 
            
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                Mis historias
            </div>                
            </div>        

            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        
                        <th scope="col" class="px-6 py-3">
                            ID Historia
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Paciente
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Profesional
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Concepto
                        </th>                
                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>                        
                        <th scope="col" class="px-6 py-3">
                            Antecedentes
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Evolución
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Recomendaciones
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr v-for="historia in historiaStore.historiasPaciente" :key="historia.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        
                        <td class="px-6 py-4">
                            {{ historia.id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ historia.created_at }}
                        </td>
                        <td class="px-6 py-4">
                            {{ historia.paciente.name }} {{ historia.paciente.last_name }}
                        </td>
                        <td class="px-6 py-4">
                            {{ historia.profesional.name }} {{ historia.profesional.last_name }}
                        </td>
                        
                        <td class="px-6 py-4">
                            {{ historia.concepto }}
                        </td>
                        <td v-if="historia.estado == 0" class="px-6 py-4">
                            Sin firmar
                        </td>
                        <td v-if="historia.estado == 1" class="px-6 py-4">
                            Firmado
                        </td>
                        <td class="px-6 py-4">
                            {{ historia.antecedentes }}
                        </td>
                        <td class="px-6 py-4">
                            {{ historia.evolucion }}
                        </td>
                        <td class="px-6 py-4">
                            {{ historia.recomendaciones }}
                        </td>
                        <td class="px-6 py-4">
                            <router-link :to='{name:"FirmarHistoria",params:{id:historia.id}}' class="text-white bg-blue-800 hover:bg-blue-900 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-xs px-3 py-1.5 me-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Firmar</router-link>
                        </td>
                    </tr>
    
                </tbody>
            </table>

        </div>

        <div v-if="authStore.user.is_profesional == 1" class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"> 
            <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                Listado de pacientes
            </div>                
        </div>        
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    
                    <th scope="col" class="px-6 py-3">
                        Paciente
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Identificación
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Celular
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                
                <tr v-for="paciente in authStore.pacientes" :key="paciente.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    
                    <td class="px-6 py-4">
                        {{ paciente.name }} {{ paciente.last_name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ paciente.identificacion }}
                    </td>
                    <td class="px-6 py-4">
                        {{ paciente.celular }}
                    </td>
                    <td class="px-6 py-4">
                        <router-link :to='{name:"Historia",params:{id:paciente.id}}' class="btn btn-light">Ver Historia</router-link>
                    </td>
                </tr>

            </tbody>
        </table>
        </div>


    </div>

    <div v-else>
        
    </div>
</template>