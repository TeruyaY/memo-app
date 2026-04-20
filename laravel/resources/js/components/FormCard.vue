<script setup lang="ts">

import PlusSvg from "./svgs/PlusSvg.vue";
import TextareaForm from "./TextareaForm.vue";

const emit = defineEmits(['submit']);
</script>

<template>
    <div class="mx-auto w-full p-4 bg-white rounded-xl shadow hover:shadow-lg transition duration-300 border-[1px] border-primary-100">
        <div class="flex items-center gap-x-2 mt-2">
            <PlusSvg class="w-8 h-8 text-primary-500"/>
            <h3 class="text-2xl font-bold">新規メモ</h3>
        </div>
        <div class="p-2">
            <TextareaForm @submit="$emit('submit',$event)" class="mt-4"/>
        </div>
    </div>
</template>

<style scoped>

</style>
