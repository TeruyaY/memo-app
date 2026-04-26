<script setup lang="ts">
import PlusSvg from "./svgs/PlusSvg.vue";

import {ref, computed} from 'vue';
import axios from 'axios';

const text = ref('');

const empty = computed(() => !text.value.trim());

const emit = defineEmits(['submit']);

const selectedTag = ref(1);

const selectTag = (id) => {
  selectedTag.value = id;
}

const submit = async () => {
    await emit('submit', { content: text.value, tag_id: selectedTag.value })
    text.value='';
    selectedTag.value=1;
}

// const colors = [
//   { name: 'red', hex: '#EF4444' },
//   { name: 'blue', hex: '#3B82F6' },
//   { name: 'green', hex: '#10B981' },
//   { name: 'yellow', hex: '#FACC15' },
//   { name: 'orange', hex: '#F59E0B' },
//   { name: 'purple', hex: '#8B5CF6' },
// ];

import type { Tag } from '../pages/index.vue';

const props = defineProps<{
    tags: Tag[]
}>();
</script>

<template>
    <div class="flex flex-col justify-center mx-auto w-full">
        <textarea
            v-model="text"
            class="w-full p-4 border border-gray-300 rounded-xl outline-none
            focus:border-primary-500 focus:ring-2 focus:ring-primary-500
            transition-all duration-300 min-h-[150px]"
            rows="4"
            placeholder="メモを入力してください"
        ></textarea>

        <div class="grid grid-cols-2 mt-4 p-2 w-full border:2px">
          <button v-for="tag in tags" :key="tag.name"
              @click="selectTag(tag.id)"
              class="p-2 m-1 rounded-xl max-h-10 transition-all duration-100
                flex justify-left items-center gap-x-2 border-2"
              :class="selectedTag===tag.id ? 'border-primary-500' : 'border-gray'">
            <span class="block rounded-full w-6 h-6"
                :style="{ backgroundColor: tag.hex }"></span>
            {{ tag.name }}</button>
        </div>

        <button @click="submit"
            :disabled="empty"
            class="mt-4 p-2 disabled:opacity-50 rounded-xl
                bg-gradient-to-r from-primary-500 to-primary-600
                flex justify-center items-center gap-x-2 text-white transition-opcaity duration-300 ease-in-out">
                <PlusSvg class="w-6 h-6"/>
                保存する
        </button>
    </div>

</template>

<style scoped>
</style>
