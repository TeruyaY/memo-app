<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import Header from "../components/layouts/Header.vue";
import FeatureList from "@/features/FeatureList.vue";
import WelcomeMessage from "@/components/WelcomeMessage.vue";
import FormCard from "../components/FormCard.vue";
import MemoDisplay from "../components/MemoDisplay.vue";
</script>

<template>
    <Header class="relative z-10" />
    <div class="p-8 bg-primary-50 min-h-screen">
        <div class="mx-auto max-w-sm md:max-w-xl lg:max-w-3xl">
            <FormCard />
            <MemoDisplay class="mt-8"/>
        </div>
    </div>

</template>
