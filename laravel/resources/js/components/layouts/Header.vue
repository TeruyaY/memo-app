<script setup lang="ts">
import DocumentSvg from "../svgs/DocumentSvg.vue"
import HamburgerSvg from "../svgs/HamburgerSvg.vue";

const emit = defineEmits(['open']);

const openSidebar = async () => {
    await emit('open');
}

</script>

<template>
    <div class="text-center pb-8 pt-2 shadow border-b-[1px] border-primary-100 relative">
        <div class="flex justify-center items-center gap-x-2 mt-6">
            <DocumentSvg class="w-10 h-10"/>
            <h3 class="text-4xl font-bold text-primary-500">かんたんメモ</h3>
        </div>
        <p class="text-gray-800 mt-2 text-lg">思いついたことをサッと記録しよう</p>
        <div class="absolute right-8 top-1/2 -translate-y-1/2">
            <HamburgerSvg @click="openSidebar" class="w-10 h-10 text-gray-600" />
        </div>
    </div>
</template>

<style scoped>

</style>
