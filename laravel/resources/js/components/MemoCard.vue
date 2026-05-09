<script setup lang="ts">
import TrashSvg from "@/components/svgs/TrashSvg.vue";
import PlusSvg from "@/components/svgs/PlusSvg.vue";

import { ref } from 'vue';

import type { Memo } from '../types/index.ts';

import { useMemoStore } from "../stores/memoStore";

const memoStore = useMemoStore();

const props = defineProps<{
    memo: Memo
}>();

const isHovered = ref(false);

</script>

<template>
    <div @mouseenter="isHovered = true"
         @mouseleave="isHovered = false"
        class="flex justify-between items-center mx-auto w-full p-4 bg-white rounded-xl
        shadow hover:shadow-lg transition duration-300 border-[1px] border-primary-100
        overflow-hidden relative">

        <div class="flex absolute top-0 right-0 h-8 overflow-hidden rounded-tr-xl">
            <div v-for="tag in memo.tags" :key="tag.id"
                 class="w-0 h-0 mr-2
            border-l-[12px]
            border-r-[12px]
            border-t-[24px]
            border-b-[6px] border-b-transparent"
                 :style="{ borderTopColor: tag.hex, borderLeftColor: tag.hex, borderRightColor: tag.hex }"></div>

        </div>

        <div class="flex flex-col">
            <h3 class="text-xl mb-2">{{ memo.content }}</h3>
            <p class="text-lg text-gray-500">{{ memo.created_at }}</p>
        </div>

        <TrashSvg @click="memoStore.deleteMemo(memo.id)" v-if="isHovered" class="w-[24px] h-[24px] text-red-500"/>
    </div>

</template>

<style scoped>

</style>
