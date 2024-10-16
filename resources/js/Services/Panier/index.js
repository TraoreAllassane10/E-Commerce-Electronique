import axios from "axios";
import { ref } from "vue";

export default function useCart() {
    const produits = ref([])
    const addSuccess = ref(false)
    const total = ref(0)

    // La fonction qui recupere le contenu du panier
    const getCart = async (token) => {
        await axios
            .get("api/panier/all", {
                headers: {
                    "Authorization" : `Bearer ${token}`
                },
                withCredentials: true
            })
            .then((res) => {
                console.log(res.data);
                produits.value = res.data.data
                total.value = res.data.total
            });
    };

    // La fonction qui fait l'ajout de produit dans le panier
    const addToCart = async (id, libelle, prix,image,token) => {
        await axios.post("/api/panier/add",
                { id, libelle, prix, image },
                {
                    headers: {
                        "Authorization" : `Bearer ${token}`,

                    },
                    withCredentials: true
                }
            )
            .then((res) => {
                console.log(res.data);
                getCart(token);
            })
            .catch((err) => {
                console.log(err);
            });
    };

    // La fonction qui supprimer un produit du panier
    const removeToCart = async (rowId) => {
        await axios.delete(`/api/panier/delete/${rowId}`,{
            headers: {
                "Authorization" : `Bearer ${localStorage.getItem('user_token')}`
            }
        }).then((res) => {
            console.log(res.data)
            getCart(localStorage.getItem('user_token'))
        }).catch((err) => console.log(err))
    }

    const destroyCart = async () => {
        await axios.get("/api/panier/vider",{
            headers: {
                "Authorization" : `Bearer ${localStorage.getItem('user_token')}`
            }
        }).then((res) => {
            console.log(res.data)
            getCart(localStorage.getItem('user_token'))

        }).catch((err) => console.log(err))
    }

    return {
        addToCart,
        getCart,
        removeToCart,
        destroyCart,
        produits,
        total
    };
}
