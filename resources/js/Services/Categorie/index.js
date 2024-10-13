import axios from "axios";
import { ref } from "vue";

export default function useCategory() {
    let categories = ref([]);

    const getCategories = async () => {
        await axios.get("/api/categories").then((res) => {
            console.log(res.data);
            categories.value = res.data.data;
        });
    };


    return {
        getCategories,
        categories
    };
}
