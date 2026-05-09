import {computed, ref} from "vue";
import axios from "axios";
import { defineStore } from 'pinia';

export const useMemoStore = defineStore('memo', () => {

    const memos = ref([]);

    const filterTagIds = ref([]);
    const filtered_memos = computed(() => {
        if (filterTagIds.value.length == 0) {
            return [...memos.value].reverse();
        } else {
            let unordered_memos = memos.value.filter((memo) => { return memo.tags.some(tag => filterTagIds.value.includes(tag.id)) });
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

    const saveMemo = async (data) => {
        try {
            const response = await axios.post('/api/memos', data);

            await fetchMemos();
            console.log('保存成功', response.data);
            return true;
        } catch (error) {
            console.error('保存に失敗', error);
            return false;
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

    const changeFilterTag = (id) => {
        if (filterTagIds.value.includes(id)) {
            filterTagIds.value = filterTagIds.value.filter(item => item !== id);
        } else {
            filterTagIds.value.push(id);
        }

    }

    const emptyFilterTag = () => {
        filterTagIds.value = [];
    }

    return {
        memos,
        filtered_memos,
        filterTagIds,
        changeFilterTag,
        emptyFilterTag,
        fetchMemos,
        saveMemo,
        deleteMemo,
    };
});

