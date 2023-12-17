<script setup>
    import { onMounted } from 'vue';
    import { useAuthStore } from '../stores/auth';

    import { ref } from "vue";
    import { useRoute } from 'vue-router';

    const route = useRoute();

    const authStore = useAuthStore();

    const form = ref(

        {
            name: '',
            last_name: '',
            email: '',
            celular: '',
            ubicacion: '',
            identificacion: '',
            password: '',
            password_confirmation: '',
            id: route.params.id
        }

    );

    onMounted(

        async() => {

            await authStore.showUser(route.params.id);

        }

    );

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
              max-w-[1025px]
              overflow-hidden
              rounded-lg
              bg-white
              py-1
              px-10
              text-center
              sm:px-12
              md:px-[60px]
            "
          >
            <div class="mb-1 text-center md:mb-1">Editar mi perfil</div>
             <form @submit.prevent="authStore.actualizar(form)">
                <div class="mb-6">
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                <input
                  type="text"
                  v-model="authStore.usuario.name"
                  placeholder="Name"
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
              <div v-if="authStore.errors.name" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.name[0] }}</span>
                </div>

              <div class="mb-6">
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Apellidos</label>
                <input
                  type="text"
                  v-model="authStore.usuario.last_name"
                  placeholder="Last Name"
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
              <div v-if="authStore.errors.last_name" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.last_name[0] }}</span>
                </div>

              <div class="mb-6">
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Identificación</label>
                <input
                  type="text"
                  v-model="authStore.usuario.identificacion"
                  readonly
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
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                <input
                  type="email"
                  v-model="authStore.usuario.email"
                  placeholder="Email"
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
              <div v-if="authStore.errors.email" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.email[0] }}</span>
                </div>

              <div class="mb-6">
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Celular</label>
                <input
                  type="text"
                  v-model="authStore.usuario.celular"
                  placeholder="Celular"
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

              <div class="mb-6">
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Ubicación</label>
                <input
                  type="text"
                  v-model="authStore.usuario.ubicacion"
                  placeholder="Ubicación"
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

              <div class="mb-6">
                <label for="message" class="block text-left mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
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
                <input
                  type="password"
                  v-model="form.password_confirmation"
                  placeholder="Password Confirmation"
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

                <div v-if="authStore.errors.password_confirmation" class="flex">
                <span class="text-red-400 text-sm m-2 p-2">{{ authStore.errors.password_confirmation[0] }}</span>
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
                  Actualizar
                </button>
              </div>
            </form>               
            
          </div>
        </div>
      </div>
    </div>
  </section>

</template>