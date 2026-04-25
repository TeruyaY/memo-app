<script setup lang="ts">
import TrashSvg from "@/components/svgs/TrashSvg.vue";
import PlusSvg from "@/components/svgs/PlusSvg.vue";

import { ref } from 'vue';

import type { Memo } from './MemoDisplay.vue';

const props = defineProps<{
    memo: Memo
}>();

const isHovered = ref(false);

const colorClassMap = {
  red: 'border-t-red-500',
  blue: 'border-t-blue-500',
  green: 'border-t-green-500',
  yellow: 'border-t-yellow-500',
  orange: 'border-t-orange-500',
  purple: 'border-t-purple-500',
};

const emit = defineEmits(['delete']);

const deleteMemo = async(id) => {
    await emit('delete', id)
}
</script>

<template>
    <div @mouseenter="isHovered = true"
         @mouseleave="isHovered = false"
        class="flex justify-between items-center mx-auto w-full p-4 bg-white rounded-xl
        shadow hover:shadow-lg transition duration-300 border-[1px] border-primary-100
        overflow-hidden relative">

        <div v-if="memo.tag!='none'" class="absolute top-0 right-0 border-t-[50px] border-l-[50px] 500 border-l-transparent"
          :class="colorClassMap[memo.tag]"></div>

        <div class="flex flex-col">
            <h3 class="text-xl mb-2">{{ memo.content }}</h3>
            <p class="text-lg text-gray-500">{{ memo.created_at }}</p>
        </div>

        <TrashSvg @click="deleteMemo(memo.id)" v-if="isHovered" class="w-[24px] h-[24px] text-red-500"/>
    </div>

</template>

<style scoped>

</style>
