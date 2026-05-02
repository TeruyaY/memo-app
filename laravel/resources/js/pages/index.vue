<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import Header from "../components/layouts/Header.vue";
import Sidebar from "../components/layouts/Sidebar.vue";
import FeatureList from "@/features/FeatureList.vue";
import WelcomeMessage from "@/components/WelcomeMessage.vue";
import FormCard from "../components/FormCard.vue";
import MemoDisplay from "../components/MemoDisplay.vue";
import {computed, onMounted, ref} from "vue";
import axios from "axios";

export interface Tag {
    id: number;
    color: string;
    name: string;
    hex: string;
}

const memos = ref([]);
const tags = ref([]);

const DEFAULT_FILTER_TAG = 0;
const filterTag = ref(DEFAULT_FILTER_TAG);
const filtered_memos = computed(() => {
    if (filterTag.value == 0) {
        return [...memos.value].reverse();
    } else {
        let unordered_memos = memos.value.filter((memo) => {return memo.tag?.id == filterTag.value;});
        return unordered_memos.reverse();
    }
})

const fetchMemos = async  () => {
    try {
        const response = await axios.get('/api/memos');


        console.log('読み込み成功', response.data);
        memos.value = response.data;
    } catch (error) {
        console.error('読み込み失敗', error);
    }
}

onMounted(() => {
    fetchMemos();
    fetchTags();
})

const saveMemo = async (data) => {
    try {
        const response = await axios.post('/api/memos', data);

        await fetchMemos();
        console.log('保存成功', response.data);
    } catch (error) {
        console.error('保存に失敗', error);
    }
}

const deleteMemo = async (id) => {
    try {
        const response = await axios.delete(`/api/memos/${id}`);

        await fetchMemos();
        console.log('削除成功', response.data);
    } catch (error) {
        console.error('削除失敗', error);
    }
}

const fetchTags = async  () => {
    try {
        const response = await axios.get('/api/tags');

        console.log('読み込み成功', response.data);
        tags.value = response.data;
    } catch (error) {
        console.error('読み込み失敗', error);
    }
}

const filterMemos = (id) => {
    filterTag.value = id;
}

</script>

<template>

        <div class="mx-auto max-w-sm md:max-w-xl lg:max-w-3xl">
            <FormCard @submit="saveMemo" :tags="tags"/>
            <MemoDisplay @delete="deleteMemo" @filter="filterMemos" :filterTag="filterTag" :tags="tags" class="mt-8" :filtered_memos="filtered_memos" :memos="memos"/>
        </div>


</template>
