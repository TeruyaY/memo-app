<script setup lang="ts">

import DocumentSvg from "@/components/svgs/DocumentSvg.vue";
import MemoCard from "@/components/MemoCard.vue";

const mockMemos = [
    {
        id: 1,
        title: "スーパーで買い物",
        content: "牛乳、たまご、鶏肉を買う",
        created_at: "2026-04-20 10:00"
    },
    {
        id: 2,
        title: "Laravelの勉強",
        content: "axiosの使い方をノートにまとめる",
        created_at: "2026-04-20 12:00"
    }
];

</script>

<template>
    <div class="w-full flex flex-col">
        <div class="flex items-center justify-between  mt-2">
            <div class="flex items-center gap-x-2">
                <DocumentSvg class="w-8 h-8 text-primary-500"/>
                <h2 class="text-2xl font-bold">保存されたメモ</h2>
            </div>
            <div class="bg-primary-100 rounded-full py-1 px-[12px] text-gray-600">
                <p>{{ mockMemos.length }}件</p>
            </div>
        </div>


        <MemoCard class="mt-4" v-for="memo in mockMemos" :key="memo.id" :memo="memo"/>
    </div>
</template>

<style scoped>

</style>
