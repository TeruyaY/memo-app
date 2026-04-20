<script setup lang="ts">

interface Memo {
    id: number;
    content: string;
    created_at: string;
}

const props = defineProps<{
    memo: Memo
}>();


</script>

<template>
    <div class="flex flex-col mx-auto w-full p-4 bg-white rounded-xl shadow hover:shadow-lg transition duration-300 border-[1px] border-primary-100">
        <h3 class="text-xl mb-2">{{ memo.content }}</h3>
        <p class="text-lg text-gray-500">{{ memo.created_at }}</p>
    </div>
</template>

<style scoped>

</style>
