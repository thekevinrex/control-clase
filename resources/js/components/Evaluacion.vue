<template>

    <div class="flex flex-col gap-3 items-start">

        <span>Evaluación</span>

        <ul class="w-auto flex rounded-lg overflow-hidden border">

            <li :class="['w-10 h-10 flex items-center justify-center text-lg font-semibold cursor-pointer hover:bg-slate-300', {
                'bg-primary-800 hover:bg-primary-500 text-white': form.evaluation == 2
            }]" @click="change(2)">
                2</li>
            <li :class="['w-10 h-10 flex items-center justify-center text-lg font-semibold border-l cursor-pointer hover:bg-slate-300', {
                'bg-primary-800 hover:bg-primary-500 text-white': form.evaluation == 3
            }]" @click="change(3)">
                3</li>
            <li :class="['w-10 h-10 flex items-center justify-center text-lg font-semibold border-l cursor-pointer hover:bg-slate-300', {
                'bg-primary-800 hover:bg-primary-500 text-white': form.evaluation == 4
            }]" @click="change(4)">
                4</li>
            <li :class="['w-10 h-10 flex items-center justify-center text-lg font-semibold border-l cursor-pointer hover:bg-slate-300', {
                'bg-primary-800 hover:bg-primary-500 text-white': form.evaluation == 5
            }]" @click="change(5)">
                5</li>
        </ul>

    </div>

</template>

<script setup>

const props = defineProps({
    form: {
        type: Object,
        required: true,
    }
})

console.log(JSON.stringify(props.form));

const change = (value) => {
    props.form.evaluation = value;
}

</script>