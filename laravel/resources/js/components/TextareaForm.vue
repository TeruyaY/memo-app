<script setup lang="ts">
import PlusSvg from "./svgs/PlusSvg.vue";

import {ref, computed, onMounted} from 'vue';
import axios from 'axios';



import { useMemoStore } from "../stores/memoStore";
import { useTagStore } from "../stores/tagStore";

const memoStore = useMemoStore();
const tagStore = useTagStore();


import { useMemoForm } from "../composables/useMemoForms.ts";
const { text, selectedTag, isEmpty, resetForm, selectTag } = useMemoForm();

onMounted(() => {
    tagStore.fetchTags();
})

const submit = async () => {
    const success = await memoStore.saveMemo({
        content: text.value,
        tag_id: selectedTag.value
    });

    if (success) resetForm();
}

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
          <button v-for="tag in tagStore.tags" :key="tag.name"
              @click="selectTag(tag.id)"
              class="p-2 m-1 rounded-xl max-h-10 transition-all duration-100
                flex justify-left items-center gap-x-2 border-[1.5px]"
              :class="selectedTag===tag.id ? 'border-primary-500' : 'border-gray'">
            <span class="block rounded-full w-4 h-4"
                :style="{ backgroundColor: tag.hex }"></span>
            {{ tag.name }}</button>
        </div>

        <button @click="submit"
            :disabled="isEmpty"
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
