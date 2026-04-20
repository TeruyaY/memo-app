<script setup lang="ts">
import TrashSvg from "@/components/svgs/TrashSvg.vue";
import PlusSvg from "@/components/svgs/PlusSvg.vue";

import { ref } from 'vue';

import type { Memo } from './MemoDisplay.vue';

const props = defineProps<{
    memo: Memo
}>();

const isHovered = ref(false);

</script>

<template>
    <div @mouseenter="isHovered = true"
         @mouseleave="isHovered = false"
        class="flex justify-between items-center mx-auto w-full p-4 bg-white rounded-xl shadow hover:shadow-lg transition duration-300 border-[1px] border-primary-100">
        <div class="flex flex-col">
            <h3 class="text-xl mb-2">{{ memo.content }}</h3>
            <p class="text-lg text-gray-500">{{ memo.created_at }}</p>
        </div>

        <TrashSvg v-if="isHovered" class="w-8 h-8 text-red-500"/>
    </div>

</template>

<style scoped>

</style>
