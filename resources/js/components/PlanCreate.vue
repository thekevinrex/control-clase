<template>
    <div>

        <h1 class="font-bold mb-5 text-lg">Plan de control a clases</h1>

        <div v-if="categories.length == 0">
            The are no categories
        </div>
        <template v-else>
            <h2 class="font-bold">Categories</h2>
            <p class="text-xs">
                select the number of control per category
            </p>
            <div v-for="category in   categories  " class=" w-full py-2" :key="category.id">
                <label class="w-full flex items-center justify-between max-w-2xl">
                    {{ category.name }}
                    <input class="max-w-[70px] rounded-md border-cyan-300" type="number"
                        v-model="form.categories[category.id].total">
                </label>

                <span class="text-xs text-red-500" v-if="form.hasError('categories.' + category.id + '.total')"
                    v-bind="form.$errorAttributes('categories.' + category.id + '.total')">
                </span>
            </div>
        </template>

        <hr class="my-5">

        <div class="flex justify-between max-w-2xl">
            <div>
                <h2 class="font-bold">Profesores controladores</h2>
                <p class="text-xs">
                    Añade profesores controladores
                </p>
            </div>

            <button type="button" @click="addProfesor" class="bg-cyan-300 text-white px-4 py-2 rounded-md">
                Add profesor
            </button>
        </div>

        <div class="py-4">
            <div v-if="form.profesors.length == 0" class="flex flex-col space-y-3">
                <span class="font-lg font-semibold">There are no profesors</span>

                <span class="text-xs text-red-500" v-if="form.hasError('profesors')"
                    v-bind="form.$errorAttributes('profesors')">
                </span>
            </div>
            <template v-else>
                <div v-for="  (controler, i)   in   form.profesors  " :key="controler.key"
                    class="w-full flex flex-col space-y-2">
                    <div class="flex w-full justify-between space-x-5 items-end py-2 max-w-2xl">
                        <label class="flex w-full flex-col">
                            <span class="text-xs">Select Profesor controlador</span>
                            <select v-model="controler.profesor" class="w-full rounded-md border-cyan-300">
                                <option value="0" disabled>Select Profesor controlador</option>
                                <option :value="profesor.id" v-for="  profesor   in   profesors  " :key="profesor.id">
                                    {{ profesor.name }}
                                </option>
                            </select>
                        </label>
                        <label class="flex flex-col">
                            <span class="text-xs">Semana</span>
                            <input type="number" placeholder="Semana"
                                class="max-w-[70px] rounded-md border-cyan-300 shrink-0" v-model="controler.semana">
                        </label>
                        <button type="button" @click="deleteProfesor(controler.key)"
                            class="bg-red-500 text-white px-4 py-2 rounded-md shrink-0">
                            Delete
                        </button>
                    </div>

                    <span class="text-xs text-red-500" v-if="form.hasError('profesors.' + i + '.profesor')"
                        v-bind="form.$errorAttributes('profesors.' + i + '.profesor')">
                    </span>

                    <span class="text-xs text-red-500" v-if="form.hasError('profesors.' + i + '.semana')"
                        v-bind="form.$errorAttributes('profesors.' + i + '.semana')">
                    </span>

                </div>
            </template>
        </div>

    </div>
</template>

<script setup>
import { v4 as uuidv4 } from "uuid";

const props = defineProps({
    form: {
        type: Object,
        required: true
    },
    categories: {
        type: Object,
        required: true,
    },
    profesors: {
        type: Object,
        required: true,
    }
});

const deleteProfesor = (key) => {
    props.form.profesors = props.form.profesors.filter((item) => item.key != key);
}

const addProfesor = () => {
    props.form.profesors.push({
        key: uuidv4(),
        profesor: 0,
        semana: 0,
    });
};

console.log(props.form);

</script>
