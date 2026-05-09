<script setup lang="ts">

import DocumentSvg from "@/components/svgs/DocumentSvg.vue";
import MemoCard from "@/components/MemoCard.vue";

import { onMounted } from 'vue';
import axios from "axios";

import { useMemoStore } from "../stores/memoStore"; // 1. インポート
import { useTagStore} from "../stores/tagStore.ts";

const memoStore = useMemoStore();
const tagStore = useTagStore();


onMounted(() => {
    tagStore.fetchTags();
    memoStore.fetchMemos();
})

</script>

<template>
    <div class="w-full flex flex-col">
        <div class="flex items-center justify-between  mt-2">
            <div class="flex items-center gap-x-2">
                <DocumentSvg class="w-8 h-8 text-primary-500"/>
                <h2 class="text-2xl font-bold">保存されたメモ</h2>
            </div>
            <div class="bg-primary-100 rounded-full py-1 px-[12px] text-gray-600">
                <p>{{ memoStore.filtered_memos.length }}/{{ memoStore.memos.length }}件</p>
            </div>


        </div>

        <button
            @click="memoStore.emptyFilterTag()"
            class="group p-2 m-1 mt-4 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:bg-primary-500 hover:text-white"
            :class="memoStore.filterTagIds.length === 0 ? 'bg-primary-500 text-white shadow-md' : 'text-slate-500 bg-transparent'"
        >
                <span
                    class="block rounded-full w-2 h-2 shrink-0 transition-colors"
                    :class="memoStore.filterTagIds.length === 0 ? 'bg-white' : 'bg-primary-500 group-hover:bg-white'"
                ></span>
            <span class="font-medium text-sm">すべてのメモ</span>
        </button>

        <button
            v-for="tag in tagStore.coloredTags"
            :key="tag.id"
            @click="memoStore.changeFilterTag(tag.id)"
            class="group p-2 m-1 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:shadow-md"
            :class="memoStore.filterTagIds.includes(tag.id) ? 'text-white shadow-md' : 'text-slate-600'"
            :style="memoStore.filterTagIds.includes(tag.id)
                ? { backgroundColor: tag.hex }
                : { '--hover-bg': tag.hex }"
            @mouseenter="$event.target.style.backgroundColor = tag.hex"
            @mouseleave="!memoStore.filterTagIds.includes(tag.id) ? $event.target.style.backgroundColor = 'transparent' : ''"
        >
                <span
                    class="block rounded-full w-2 h-2 shrink-0 transition-colors duration-300"
                    :style="{ backgroundColor: memoStore.filterTagIds.includes(tag.id) ? 'white' : tag.hex }"
                    :class="!memoStore.filterTagIds.includes(tag.id) ? 'group-hover:bg-white' : ''"
                ></span>

            <span
                class="font-medium text-sm transition-colors duration-300"
                :class="memoStore.filterTagIds.includes(tag.id) ? 'text-white' : 'group-hover:text-white'"
            >{{ tag.name }}</span>
        </button>

        <MemoCard class="mt-4" v-for="memo in memoStore.filtered_memos" :key="memo.id" :memo="memo"/>
    </div>
</template>

<style scoped>

</style>
