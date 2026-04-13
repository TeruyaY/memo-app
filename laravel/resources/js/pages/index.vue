<script setup lang="ts">
import Welcome from "../features/Welcome.vue";
import Header from "../components/layouts/Header.vue";
import FeatureList from "@/features/FeatureList.vue";
import WelcomeMessage from "@/components/WelcomeMessage.vue";
import FormCard from "../components/FormCard.vue";
</script>

<template>
    <Header class="relative z-10" />
    <div class="p-8 bg-primary-50 min-h-screen">
        <FormCard />
    </div>
    <Welcome />

</template>
