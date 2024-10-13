import axios from "axios";
import { inject, ref } from "vue";
import { router } from '@inertiajs/vue3';

export default function useUsers() {
    const error = ref([]);
    const errorValidation = ref([])
    const {logged,user} = inject('logged')

    const saveUser = async (data) => {
        await axios
            .post("/api/register", data)
            .then((res) => {
                if (res.data.code_status == 200) {
                    router.visit('/login')
                }
                else{
                    error.value = res.data.errorList
                }
            })
            .catch((err) => (error.value = err));
    };

    const authUser = async (data) => {
        await axios
            .post("/api/login", data)
            .then((res) => {
                console.log(res.data)
                if (res.data.code_status == 200) {
                    localStorage.setItem('user_token',res.data.token)
                    localStorage.setItem('user_admin',res.data.data.admin)

                    logged.value = true
                    user.value = res.data.data

                    router.visit('/')
                }
                else{
                    errorValidation.value = res.data.message
                }
            })
            .catch((err) => (error.value = err));
    };

    const redirectUser = () => {
        if(localStorage.getItem('user_token')){
            router.visit('/')
        }
    }

    return {
        saveUser,
        authUser,
        error,
        errorValidation,
        redirectUser
    };
}
