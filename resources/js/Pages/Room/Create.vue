<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router, useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

const form = useForm({
  name: "",
  description: "",
});

const sendForm = () => {
  form.submit("post", route("cuartos-electricos.store"), {
    onFinish: () => {
      if (Object.keys(form.errors).length) {
        Swal.fire({
          icon: "error",
          title: "Hay errores en el formulario",
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "La información del cuarto eléctrico ha sido guardada",
        }).then(() => {
          router.push(route("cuartos-electricos.index"));
        });
      }
    },
  });
};
</script>

<template>
  <AppLayout title="Crear Cuarto">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Crear Cuarto Eléctrico
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <form @submit.prevent="sendForm" class="space-y-6">
            <div>
              <label for="name" class="block text-sm font-medium text-gray-700"
                >Nombre del cuarto eléctrico</label
              >
              <input
                id="name"
                type="text"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="form.name"
                required
                autofocus
                autocomplete="name"
                placeholder="Nombre del cuarto eléctrico"
              />

              <InputError :message="form.errors.name" />
            </div>

            <div>
              <label
                for="description"
                class="block text-sm font-medium text-gray-700"
                >Descripción</label
              >
              <textarea
                id="description"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                v-model="form.description"
                required
                autocomplete="description"
                placeholder="Descripción del cuarto eléctrico"
              ></textarea>

              <InputError :message="form.errors.description" />
            </div>

            <div class="flex justify-between">
              <Link
                :href="route('cuartos-electricos.index')"
                class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150"
              >
                Regresar
              </Link>
              <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150"
              >
                Guardar información
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
