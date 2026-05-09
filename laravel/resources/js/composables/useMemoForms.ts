// useMemoForm.ts
import {computed, onMounted, ref} from "vue";
import axios from "axios";


export function useMemoForm() {

    const text = ref('');
    const selectedTag = ref([]);
    const isEmpty = computed(() => !text.value.trim());
    const resetForm = () => {
        text.value = '';
        selectedTag.value = [];
    };

    const selectTag = (id) => {
        if ( selectedTag.value.includes(id) ) {
            selectedTag.value = selectedTag.value.filter(item => item !== id);
        } else {
            selectedTag.value.push(id);
        }
    }

    const emptyTag = () => {
        selectedTag.value = [];
    }

    return { text, selectedTag, isEmpty, resetForm, selectTag, emptyTag };
}
