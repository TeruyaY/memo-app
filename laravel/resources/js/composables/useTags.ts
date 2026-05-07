import {computed, onMounted, ref} from "vue";
import axios from "axios";

const tags = ref([]);



const coloredTags = computed(() => {
    return tags.value.filter((tag) => {
        return tag.color != 'none';
    })
});

export function useTags() {


    const fetchTags = async  () => {
        try {
            const response = await axios.get('/api/tags');

            console.log('読み込み成功', response.data);
            tags.value = response.data;
        } catch (error) {
            console.error('読み込み失敗', error);
        }
    }

    return {
        tags,
        coloredTags,
        fetchTags,
    };
}
