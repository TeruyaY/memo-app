<script setup lang="ts">
import DoubleArrowSvg from "../svgs/DoubleArrowSvg.vue"
import { useRouter } from 'vue-router';

const props = defineProps<{
    openSidebar: boolean,
}>();


const emit = defineEmits(['closeSidebar']);


const closeSidebar = async () => {
    await emit('closeSidebar');
}

const router = useRouter();

const goToIndex = () => {
    router.push('/');
}
const goToSettings = () => {
    router.push('/settings');
}

const goToLogin = () => {
    router.push('/login');
}


</script>

<template>
    <div class="bg-white top-0 bottom-0 h-full
    fixed right-0 z-30 w-3/4 max-w-sm overflow-y-auto shadow-xl transition-transform"
         :class="openSidebar ? 'translate-x-0': 'translate-x-full'">

        <div class="p-4 flex justify-right w-full">
            <DoubleArrowSvg @click="closeSidebar" class="w-8 h-8"/>
        </div>

        <div class="p-4 flex flex-col justify-center w-full space-y-2">
            <button
                @click="goToIndex"
                class="p-2 m-1 mb-4 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:bg-primary-500 hover:text-white">メモ</button>
            <button
                @click="goToSettings"
                class="p-2 m-1 mb-4 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:bg-primary-500 hover:text-white">設定</button>

            <button
                @click="goToLogin"
                class="p-2 m-1 mb-4 rounded-xl max-h-10 transition-all duration-300
             flex justify-start items-center gap-x-3 border-2 border-transparent
             hover:bg-primary-500 hover:text-white">ログイン</button>


        </div>
    </div>

    <div v-if="openSidebar" @click="closeSidebar" class="fixed bg-black/50 inset-0 z-20"></div>
</template>

<style scoped>

</style>
