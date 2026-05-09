import {computed, onMounted, ref} from "vue";
import axios from "axios";

const memos = ref([]);

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

export function useMemos() {


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
        filterTag.value = id;
    }

    return {
        memos,
        filtered_memos,
        filterTag,
        changeFilterTag,
        fetchMemos,
        saveMemo,
        deleteMemo,
    };
}

