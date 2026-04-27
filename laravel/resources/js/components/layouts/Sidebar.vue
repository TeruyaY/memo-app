<script setup lang="ts">
import DoubleArrowSvg from "../svgs/DoubleArrowSvg.vue"

import type { Tag } from '../../pages/index.vue';
import {computed} from "vue";

const props = defineProps<{
    tags: Tag[],
    filterTag: number,
    openSidebar: boolean,
    openForm: boolean
}>();

const coloredTags = computed(() => {
    return props.tags.filter((tag) => {
        return tag.color != 'none';
    })
})

const emit = defineEmits(['filter', 'closeSidebar', 'changeForm']);

const changeFilterTag = async (id) => {
    await emit('filter', id);
}

const closeSidebar = async () => {
    await emit('closeSidebar');
}

const changeForm = async () => {
    await emit('changeForm');
}
</script>

<template>
    <div class="bg-white top-0 bottom-0 h-full
    fixed right-0 z-30 w-3/4 max-w-sm overflow-y-auto shadow-xl transition-transform"
         :class="openSidebar ? 'translate-x-0': 'translate-x-full'">

        <div class="p-4 flex justify-right w-full">
            <DoubleArrowSvg @click="closeSidebar" class="w-8 h-8"/>
        </div>

        <div class="p-4 flex flex-col justify-center w-full space-y-1">
            <button
                @click="changeForm"
                class="group p-2 m-1 mb-4 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:bg-primary-500 hover:text-white"
                :class="filterTag === 0 ? 'bg-primary-500 text-white shadow-md' : 'text-slate-500 bg-transparent'"
            >{{ openForm ? 'フォームを閉じる' : 'フォームを開く' }}</button>

            <button
                @click="changeFilterTag(0)"
                class="group p-2 m-1 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:bg-primary-500 hover:text-white"
                :class="filterTag === 0 ? 'bg-primary-500 text-white shadow-md' : 'text-slate-500 bg-transparent'"
            >
                <span
                  class="block rounded-full w-2 h-2 shrink-0 transition-colors"
                  :class="filterTag === 0 ? 'bg-white' : 'bg-primary-500 group-hover:bg-white'"
                ></span>
                <span class="font-medium text-sm">すべてのメモ</span>
            </button>

            <button
                v-for="tag in coloredTags"
                :key="tag.id"
                @click="changeFilterTag(tag.id)"
                class="group p-2 m-1 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:shadow-md"
                :class="filterTag === tag.id ? 'text-white shadow-md' : 'text-slate-600'"
                :style="filterTag === tag.id
                ? { backgroundColor: tag.hex }
                : { '--hover-bg': tag.hex }"
                @mouseenter="$event.target.style.backgroundColor = tag.hex"
                @mouseleave="filterTag !== tag.id ? $event.target.style.backgroundColor = 'transparent' : ''"
            >
                <span
                    class="block rounded-full w-2 h-2 shrink-0 transition-colors duration-300"
                    :style="{ backgroundColor: filterTag === tag.id ? 'white' : tag.hex }"
                    :class="filterTag !== tag.id ? 'group-hover:bg-white' : ''"
                ></span>

                <span
                    class="font-medium text-sm transition-colors duration-300"
                    :class="filterTag === tag.id ? 'text-white' : 'group-hover:text-white'"
                >{{ tag.name }}</span>
            </button>
        </div>
    </div>

    <div v-if="openSidebar" @click="closeSidebar" class="fixed bg-black/50 inset-0 z-20"></div>
</template>

<style scoped>

</style>
