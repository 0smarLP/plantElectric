<script setup>
import { defineProps } from "vue";
import { Link, router } from "@inertiajs/vue3";

const props = defineProps({
  data: {
    type: Object,
  },
});

const btnDelete = (id) => {
  Swal.fire({
    title: "Eliminar",
    text: "¿Estas seguro de eliminar el Cuarto Electrico?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, eliminar",
  }).then((result) => {
    if (result.isConfirmed) {
      router.delete(route("cuartos-electricos.destroy", id), {
        preserveScroll: true,
        onSuccess: () => {
          Swal.fire({
            icon: "success",
            title: "Cuarto Electrico eliminado",
          });
        },
      });
    }
  });
};
</script>

<template>
  <div>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
      <h1 class="mt-8 text-2xl font-medium text-gray-900">
        Lista de Cuartos Electricos
      </h1>
    </div>

    <div class="d-flex justify-end p-6">
      <Link
        :href="route('cuartos-electricos.create')"
        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded my-3"
      >
        Crear Cuarto Electrico
      </Link>
    </div>

    <div>
      <DataTable class="display w-100 p-6">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="item in data" :key="item.id">
            <td>{{ item.id }}</td>
            <td>{{ item.name }}</td>
            <td>{{ item.description }}</td>
            <td>
              <Link
                :href="route('cuartos-electricos.show', item.id)"
                class="text-indigo-600 hover:text-indigo-900 m-2"
              >
                Ver
              </Link>

              <Link
                :href="route('cuartos-electricos.edit', item.id)"
                class="text-blue-600 hover:text-blue-900 m-2"
              >
                Editar
              </Link>

              <Link
                href="#"
                class="text-red-600 hover:text-red-900 m-2"
                @click="btnDelete(item.id)"
              >
                Eliminar
              </Link>
            </td>
          </tr>
        </tbody>
      </DataTable>
    </div>
  </div>
</template>
