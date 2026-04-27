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
        return memos.value;
    } else {
        return memos.value.filter((memo) => {
            return memo.tag?.id == filterTag.value;
        });
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

const isSideBarOpen = ref(false);
const changeSidebar = () => {
    isSideBarOpen.value = !isSideBarOpen.value;
}

const isFormOpen = ref(true);
const changeForm = () => {
    isFormOpen.value = !isFormOpen.value;
}
</script>

<template>
    <Header @open="changeSidebar" class="relative z-10" />
    <div class="p-8 bg-primary-50 min-h-screen">
        <div class="mx-auto max-w-sm md:max-w-xl lg:max-w-3xl">
            <FormCard v-if="isFormOpen" @submit="saveMemo" :tags="tags"/>
            <MemoDisplay @delete="deleteMemo" class="mt-8" :memos="filtered_memos"/>
        </div>
    </div>

    <Sidebar @filter="filterMemos" @closeSidebar="changeSidebar" @changeForm="changeForm"
             :openForm="isFormOpen" :openSidebar="isSideBarOpen" :filterTag="filterTag" :tags="tags"/>

</template>
