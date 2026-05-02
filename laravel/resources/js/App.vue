<script setup lang="ts">
import { useRoute } from 'vue-router';
import Header from './components/layouts/Header.vue';
import Sidebar from './components/layouts/Sidebar.vue';
import FormCard from "@/components/FormCard.vue";
import MemoDisplay from "@/components/MemoDisplay.vue";
import {ref} from "vue";

// 現在のURL（ルート）情報を取得
const route = useRoute();

const isSideBarOpen = ref(false);
const changeSidebar = () => {
    isSideBarOpen.value = !isSideBarOpen.value;
}
</script>

<template>
    <Header @open="changeSidebar" class="relative z-10" />
    <div class="p-8 bg-primary-50 min-h-screen">
        <router-view />
    </div>

    <Sidebar @closeSidebar="changeSidebar" :openSidebar="isSideBarOpen"/>
</template>

