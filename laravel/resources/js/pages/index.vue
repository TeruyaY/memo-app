<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import Header from "../components/layouts/Header.vue";
import FeatureList from "@/features/FeatureList.vue";
import WelcomeMessage from "@/components/WelcomeMessage.vue";
import FormCard from "../components/FormCard.vue";
import MemoDisplay from "../components/MemoDisplay.vue";
import {onMounted, ref} from "vue";
import axios from "axios";


const memos = ref([]);

// const mockMemos = [
//     {
//         id: 1,
//         title: "スーパーで買い物",
//         content: "牛乳、たまご、鶏肉を買う",
//         created_at: "2026-04-20 10:00"
//     },
//     {
//         id: 2,
//         title: "Laravelの勉強",
//         content: "axiosの使い方をノートにまとめる",
//         created_at: "2026-04-20 12:00"
//     }
// ];

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
})

const saveMemo = async (text) => {
    try {
        const response = await axios.post('/api/memos', {
            content: text
        });

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
</script>

<template>
    <Header class="relative z-10" />
    <div class="p-8 bg-primary-50 min-h-screen">
        <div class="mx-auto max-w-sm md:max-w-xl lg:max-w-3xl">
            <FormCard @submit="saveMemo" />
            <MemoDisplay @delete="deleteMemo" class="mt-8" :memos="memos"/>
        </div>
    </div>

</template>
