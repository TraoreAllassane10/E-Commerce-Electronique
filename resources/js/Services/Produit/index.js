import axios from "axios";
import { ref } from "vue";

export default function useProduct() {
    let loading = ref(true);

    let produits = ref([]);
    let AlertSuccess = ref(false);

    let five_phones = ref([]);
    let five_casques = ref([]);
    let five_ipad = ref([]);

    const getProducts = async () => {
        await axios
            .get("/api/products")
            .then((res) => {
                produits.value = res.data.data;
                loading.value = false;
            })
            .catch((err) => console.log(err));
    };

    const saveProduct = async (data, token) => {
        await axios
            .post("/api/product/create", data, {
                headers: {
                    Authorization: `Bearer ${token}`,
                    "Content-Type": "multipart/form-data",
                },
            })
            .then((res) => {
                getProducts();
                if (res.data.code_status == 200) {
                    AlertSuccess.value = true;
                }
            })
            .catch((err) => console.log(err));
    };


    const getProductByCategory = async (id) => {
        await axios.get(`/api/products/bycategory/${id}`).then((res) => {
            produits.value = res.data.data;
            loading.value = false
        });
    }

    const fivePhone = async () => {
        await axios.get("/api/products/category/" + 1).then((res) => {
            five_phones.value = res.data.data;
        });
    };

    const fiveCasque = async () => {
        await axios.get("/api/products/category/" + 2).then((res) => {
            five_casques.value = res.data.data;
        });
    };

    const fiveIpad = async () => {
        await axios.get("/api/products/category/" + 4).then((res) => {
            five_ipad.value = res.data.data;
        });
    };

    const FormatagePrix = (prix) => {
        return prix.toLocaleString("fr-FR") + " fcfa";
    };

    return {
        loading,
        getProducts,
        saveProduct,
        FormatagePrix,
        produits,
        AlertSuccess,
        fivePhone,
        five_phones,
        fiveCasque,
        five_casques,
        fiveIpad,
        five_ipad,
        getProductByCategory
    };
}
