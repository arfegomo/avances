<script setup>

    import { onMounted } from 'vue';
    import { ref } from 'vue';
    import { useAuthStore } from '../../stores/auth';
    import { useHistoriaStore } from '../../stores/historia';
    import { useRoute } from 'vue-router';

    const route = useRoute();
    
    const historiaStore = useHistoriaStore();

    const authStore = useAuthStore();

    onMounted(async () => {
        
        await authStore.showUser(route.params.id);

    });

    const form = ref({

        antecedentes: '',
        evolucion: '',
        concepto: '',
        recomendaciones: '',
        profesional_id: authStore.authUser.id,
        paciente_id: route.params.id

    });
    
</script>

<template>

    <section class="bg-[#F4F7FF] py-20 lg:py-[1px]">

    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div
            class="
              relative
              mx-auto
              max-w-[1025px]
              overflow-hidden
              rounded-lg
              bg-white
              py-1
              px-10
              text-center
              sm:px-12
              md:px-[10px]
            "
          >

            <div class="mb-12 text-center md:mb-1">Nueva Historia</div>
            <div class="mb-12 text-center md:mb-0">
                <div id="alert-border-3" class="flex items-center p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
            
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <div class="ms-3 text-sm font-medium">
                        Paciente: {{ authStore.usuario.name }} {{ authStore.usuario.last_name }}
                    </div>    
                    <div class="ms-3 text-sm font-medium">
                        Identificación: {{ authStore.usuario.identificacion }}
                    </div>    
                
                </div>        
            </div>

              <form @submit.prevent="historiaStore.crear(form)">
    
                <div class="mb-6">
                    
                    <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Antecedentes</label>
                    <textarea 
                        v-model="form.antecedentes"
                        rows="4" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Antecedentes...">
                    </textarea>

                    <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Evolución</label>
                    <textarea 
                        v-model="form.evolucion"
                        rows="4" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Evolución...">
                    </textarea>

                    <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Concepto</label>
                    <textarea 
                        v-model="form.concepto"
                        rows="4" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Concepto...">
                    </textarea>

                    <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Recomendaciones</label>
                    <textarea 
                        v-model="form.recomendaciones"
                        rows="4" 
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                        placeholder="Recomendaciones...">
                    </textarea>

                  </div>

              
              

              <div class="mb-10">
                <button
                  type="submit"
                  class="
                    w-full
                    px-4
                    py-3
                    bg-indigo-500
                    hover:bg-indigo-700
                    rounded-md
                    text-white
                  "
                >
                  Grabar
                </button>
              </div>
            </form>               
            
          </div>
        </div>
      </div>
    </div>

    </section>

</template>