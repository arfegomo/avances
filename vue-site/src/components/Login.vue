<script setup>
    
    import { ref } from 'vue';
    import { useAuthStore } from '../stores/auth';

    const authStore = useAuthStore();

    const form = ref({

        identificacion: '',
        password: '',

    });

</script>

<template>
    <section class="bg-[#F4F7FF] py-20 lg:py-[10px]">
    <div class="container mx-auto">
      <div class="-mx-4 flex flex-wrap">
        <div class="w-full px-4">
          <div
            class="
              relative
              mx-auto
              max-w-[525px]
              overflow-hidden
              rounded-lg
              bg-white
              py-16
              px-10
              text-center
              sm:px-12
              md:px-[60px]
            "
          >
            <div class="mb-10 text-center md:mb-16">Login Access</div>
                <form @submit.prevent="authStore.handleLogin(form)">
                    <div class="mb-6">
                    <input
                    type="text"
                    v-model="form.identificacion"
                    placeholder="Identificacion"
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
                <div v-if="authStore.errors.identificacion" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.identificacion[0] }}</span>
                </div>

                <div class="mb-6">
                    <input
                    type="password"
                    v-model="form.password"
                    placeholder="Password"
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
                <div v-if="authStore.errors.password" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.password[0] }}</span>
                </div>

                <div class="mb-6">
                    
                    <select 
                    
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
                  v-model="form.is_profesional"
                  >     
                        <option :value="undefined" disabled>Tipo de usuario</option>
                        <option value="0">Paciente</option>
                        <option value="1">Profesional</option>

                    </select>
                    
                </div>              
                <div v-if="authStore.errors.is_profesional" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.is_profesional[0] }}</span>
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
                    Login
                    </button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>