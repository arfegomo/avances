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
                </tr>
 
            </tbody>
        </table>
      </div>
</template>