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





</script>

<template>

        <div class="mx-auto max-w-sm md:max-w-xl lg:max-w-3xl">
            <FormCard/>
            <MemoDisplay/>
        </div>


</template>
