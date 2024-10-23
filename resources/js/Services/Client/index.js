import axios from "axios"
import { ref } from "vue"
export default function useClient()
{

    const clients = ref([])

    const getClients = async () => {
        await axios.get("/api/clients", {
            headers : {
                "Authorization" : `Bearer ${localStorage.getItem("user_token")}`
            }
        }).then((res) => {
            clients.value = res.data.data
        }).catch((err) => console.log(err))
    }

    return {
        getClients,
        clients
    }
}
