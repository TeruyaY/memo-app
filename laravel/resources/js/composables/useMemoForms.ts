// useMemoForm.ts
import {computed, onMounted, ref} from "vue";
import axios from "axios";


export function useMemoForm() {

    const text = ref('');
    const selectedTag = ref(1);
    const isEmpty = computed(() => !text.value.trim());
    const resetForm = () => {
        text.value = '';
        selectedTag.value = 1;
    };

    const selectTag = (id) => {
        selectedTag.value = id;
    }

    return { text, selectedTag, isEmpty, resetForm, selectTag };
}
