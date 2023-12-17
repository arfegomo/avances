<script setup>
    import { onMounted } from 'vue';
    import { useAuthStore } from '../stores/auth';

    import { ref } from "vue";
    import { useRoute } from 'vue-router';

    const route = useRoute();

    const authStore = useAuthStore();

    const form = ref(

        {
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
              max-w-[725px]
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
            <div class="mb-1 text-center md:mb-1">Pirmer inicio de sesión, por favor cambie su contraseña!</div>
             <form @submit.prevent="authStore.passwordChange(form)">
                
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