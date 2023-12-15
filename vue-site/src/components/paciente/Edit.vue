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

        await historiaStore.mostrarHistoriaPaciente(route.params.id);

    });

    const form = ref({

        firma: '',

    });

    const pictureUrl = ref(null);

    const handleFile = (event) => {

        const file = event.target.files[0];

        pictureUrl.value = URL.createObjectURL(file);

        //const formData = new FormData();

        //formData.append('picture', file);

    }
    
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

        <div class="mb-12 text-center md:mb-1">Firmar Historia</div>
        

          <form enctype="multipart/form-data" @submit.prevent="historiaStore.actualizar(route.params.id, pictureUrl)">

            <div class="mb-6">
                
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Identificacion</label>
                <input
                  type="text"
                  v-model="historiaStore.historiaPaciente.identificacion"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />

                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Identificacion</label>
                <input
                  type="text"
                  v-model="historiaStore.historiaPaciente.name"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />

                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
                <input
                  type="text"
                  v-model="historiaStore.historiaPaciente.created_at"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />

                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Adjuntar firma</label>
                <input
                type="file"
                @change="handleFile"
                  class="
                    bordder-[#E9EDF4]
                    w-full
                    rounded-md
                    border
                    bg-[#FCFDFE]
                    py-3
                    px-5
                    text-base text-body-color
                    placeholder-[#ACB6BE]
                    outline-none
                    focus:border-primary
                    focus-visible:shadow-none
                  "
                />

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
              Firmar
            </button>
          </div>
        </form>               
        
      </div>
    </div>
  </div>
</div>

</section>

</template>