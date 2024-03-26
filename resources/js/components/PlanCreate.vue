<template>
    <div class="flex flex-col gap-y-5">

        <div class="flex justify-between max-w-4xl">
            <div>
                <h2 class="font-bold">Planificación de controles</h2>
                <p class="text-xs">
                    Añade profesores controladores y controlados, ademas añade la semana en la que se debe realizar el
                    control a clase
                </p>
            </div>

            <button type="button" @click="addProfesor"
                class="border rounded-md shadow-sm font-bold py-2 px-4 focus:outline-none focus:ring focus:ring-opacity-50 bg-primary hover:bg-primary-800 text-white border-transparent focus:border-primary-300 focus:ring-primary-200">
                Añadir control
            </button>
        </div>

        <div class="py-4 max-w-4xl">
            <div v-if="form.controls.length == 0" class="flex flex-col space-y-3">
                <span class="font-lg font-semibold">Aun no se han añadido ningun profesor</span>

                <span class="text-xs text-red-500" v-if="form.hasError('profesors')"
                    v-bind="form.$errorAttributes('profesors')">
                </span>
            </div>
            <template v-else>
                <div v-for="  (control, i) in form.controls" :key="control.key" class="w-full flex flex-col space-y-2">
                    <div class="flex w-full justify-between space-x-5 items-end py-2 ">

                        <label class="flex w-full flex-col">
                            <span class="text-xs">Selecciona el profesor controlador</span>
                            <select v-model="control.profesor"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:opacity-50">
                                <option value="0" disabled>Selecciona el profesor controlador</option>
                                <option :value="profesor.id" v-for="profesor in profesors" :key="profesor.id">
                                    {{ profesor.name }}
                                </option>
                            </select>
                        </label>

                        <label class="flex w-full flex-col">
                            <span class="text-xs">Selecciona el profesor controlado</span>
                            <select v-model="control.to_profesor"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:opacity-50">
                                <option value="0" disabled>Selecciona el profesor controlador</option>
                                <option :value="profesor.id"
                                    v-for="profesor in profesors.filter(p => p.id != control.profesor)"
                                    :key="profesor.id">
                                    {{ profesor.name }}
                                </option>
                            </select>
                        </label>

                        <label class="flex flex-col">
                            <span class="text-xs">Semana</span>
                            <input type="number" placeholder="Semana"
                                class="w-[90px] rounded-md border border-gray-300 shadow-sm block focus:border-primary-300 focus:ring focus:ring-primary-200 focus:ring-opacity-50 disabled:opacity-50 disabled:bg-gray-50 disabled:cursor-not-allowed shrink-0"
                                v-model="control.semana">
                        </label>
                        <button type="button" @click="deleteProfesor(control.key)"
                            class="bg-red-500 text-white px-4 py-2 rounded-md shrink-0">
                            Eliminar
                        </button>
                    </div>

                    <span class="text-xs text-red-500" v-if="form.hasError('controls.' + i + '.profesor')"
                        v-bind="form.$errorAttributes('controls.' + i + '.profesor')">
                    </span>

                    <span class="text-xs text-red-500" v-if="form.hasError('controls.' + i + '.to_profesor')"
                        v-bind="form.$errorAttributes('controls.' + i + '.profesor')">
                    </span>

                    <span class="text-xs text-red-500" v-if="form.hasError('controls.' + i + '.semana')"
                        v-bind="form.$errorAttributes('controls.' + i + '.semana')">
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
    profesors: {
        type: Object,
        required: true,
    }
});

const deleteProfesor = (key) => {
    props.form.controls = props.form.controls.filter((item) => item.key != key);
}

const addProfesor = () => {
    props.form.controls.push({
        key: uuidv4(),
        profesor: 0,
        to_profesor: 0,
        semana: 0,
    });
};

</script>
