import axios from "axios"
import { router } from "@inertiajs/vue3"
import { ref } from "vue"
import useCart from "../Panier"

const {destroyCart} = useCart()

export default function useCommande()
{
    const commandes = ref([])

    const getCommandes = async () => {
        await axios.get('')
    }

    const addCommande = async (data) => {
        await axios.post('/api/commande/add',data,{
            headers: {
                "Authorization": `Bearer ${localStorage.getItem('user_token')}`
            }
        }).then((res) => {
            if(res.data.status_code == 200){
                destroyCart()
                router.visit('/')

            }
        }).catch((error) => console.log(error))
    }

    return {
        getCommandes,
        addCommande,
        commandes,
        commande_success
    }
}
