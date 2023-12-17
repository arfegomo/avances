<script setup>
    
    import { onMounted } from 'vue';
    import { useAuthStore } from '../../stores/auth';
    import { useHistoriaStore } from '../../stores/historia';
    import { useRoute } from 'vue-router';

    const route = useRoute();

    const historiaStore = useHistoriaStore();

    const authStore = useAuthStore();

    onMounted(async () => {

        await historiaStore.mostrarHistoriasPaciente(route.params.id);

        await authStore.showUser(route.params.id);

    });

</script>

<template>
     
     <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"> 

        <router-link :to='{name:"CreateHistoria",params:{id:route.params.id}}' class="
                        px-4
                        py-3
                        bg-indigo-500
                        hover:bg-indigo-700
                        rounded-md
                        text-white
                    ">Nueva historia</router-link>

        <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            
            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <div class="ms-3 text-sm font-medium">
                Listado de historias: {{authStore.usuario.name}}
            </div>                
            <div class="ms-3 text-sm font-medium">
                Identificación: {{authStore.usuario.identificacion}}
            </div>                
        </div>        
        
        <div class="container p-2 mx-auto sm:p-4 dark:text-gray-100">
        		<h2 class="mb-4 text-2xl font-semibold leadi">Historias</h2>
                    <div class="overflow-x-auto">
                    <table class="w-full p-6 text-xs text-left whitespace-nowrap">
                        <colgroup>
                            <col class="w-5">
                            <col>
                            <col>
                            <col>
                            <col>
                            <col>
                            <col class="w-5">
                        </colgroup>
                        <thead>
                            <tr class="bg-teal-400">
                                <th class="p-3">ID Historia</th>
                                <th class="p-3">Fecha</th>
                                <th class="p-3">Paciente</th>
                                <th class="p-3">Profesional</th>
                                <th class="p-3">Concepto</th>
                                <th class="p-3">Estado</th>
                                <th class="p-3">Antecedentes</th>
                                <th class="p-3">Evolución</th>
                                <th class="p-3">Recomendaciones</th>
                                <th class="p-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="border-b dark:bg-gray-900 dark:border-gray-700">
                            <tr v-for="historia in historiaStore.historiasPaciente" :key="historia.id">
                                <td class="px-3 text-2xl font-medium dark:text-gray-400">{{ historia.id }}</td>
                                <td class="px-3 py-2">
                                    <p>{{ historia.created_at }}</p>
                                </td>
                                <td class="px-3 py-2">
                                    <span>{{ historia.paciente.name }}</span>
                                    <p class="dark:text-gray-400">{{ historia.paciente.last_name }}</p>
                                </td>
                                <td class="px-3 py-2">
                                    <p>{{ historia.profesional.name }} {{ historia.profesional.last_name }}</p>
                                </td>
                                <td class="px-3 py-2">
                                    <p>{{ historia.concepto }}</p>
                                </td>
                                <td v-if="historia.estado == 0" class="px-3 py-2">
                                    <p>Sin firmar</p>
                                    
                                </td>
                                <td v-if="historia.estado == 1" class="px-3 py-2">
                                    <p>Firmado</p>
                                    
                                </td>
                                <td class="px-3 py-2">
                                    <p>{{ historia.antecedentes }}</p>
                                </td>
                                <td class="px-3 py-2">
                                    <p>{{ historia.evolucion }}</p>
                                </td>
                                <td class="px-3 py-2">
                                    <p>{{ historia.recomendaciones }}</p>
                                </td> 
           
                            </tr>
                        </tbody>
                    </table>
                    </div>
	        </div>  

      </div>
</template>