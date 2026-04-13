<script setup lang="ts">

import PlusSvg from "./svgs/PlusSvg.vue";
import TextareaForm from "./TextareaForm.vue";
</script>

<template>
    <div class="mx-auto w-full max-w-sm md:max-w-xl lg:max-w-3xl p-4 bg-white rounded-xl shadow hover:shadow-lg transition duration-300 border-[1px] border-primary-100">
        <div class="flex items-center gap-x-2 mt-2">
            <PlusSvg class="w-8 h-8"/>
            <h3 class="text-2xl font-bold">新規メモ</h3>
        </div>
        <TextareaForm />
    </div>
</template>

<style scoped>

</style>
