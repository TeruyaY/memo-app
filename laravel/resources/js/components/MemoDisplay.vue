<script setup lang="ts">

import DocumentSvg from "@/components/svgs/DocumentSvg.vue";
import MemoCard from "@/components/MemoCard.vue";

import { onMounted, ref } from 'vue';
import axios from "axios";

import type { Tag } from '../pages/index.vue';

export interface Memo {
    id: number;
    content: string;
    tag: Tag;
    created_at: string;
}

const props = defineProps<{
    memos: Memo[]
}>();

const emit = defineEmits(['delete']);

</script>

<template>
    <div class="w-full flex flex-col">
        <div class="flex items-center justify-between  mt-2">
            <div class="flex items-center gap-x-2">
                <DocumentSvg class="w-8 h-8 text-primary-500"/>
                <h2 class="text-2xl font-bold">保存されたメモ</h2>
            </div>
            <div class="bg-primary-100 rounded-full py-1 px-[12px] text-gray-600">
                <p>{{ memos.length }}件</p>
            </div>
        </div>


        <MemoCard @delete="$emit('delete', $event)" class="mt-4" v-for="memo in memos" :key="memo.id" :memo="memo"/>
    </div>
</template>

<style scoped>

</style>
