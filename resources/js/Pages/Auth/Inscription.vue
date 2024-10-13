<template>
    <Navbar/>
    <div class="card">

        <h3>Inscription</h3>
        <form @submit.prevent="handleSignup">
            <label for="">Nom : </label>
            <input type="text" v-model="form.name">
            <span v-if="error.name" class="errorText">{{ error.name.toString() }}</span>

            <label for="">Email : </label>
            <input type="email" v-model="form.email">
            <span v-if="error.email" class="errorText">{{ error.email.toString() }}</span>

            <label for="">Mot de passe : </label>
            <input type="password" v-model="form.password">
            <span v-if="error.password" class="errorText">{{ error.password.toString() }}</span>

            <button type="submit">S'incrire</button>
            <p>Vous avez déjà un compte ?
                <Link class="lien" href="/login">connectez-vous</Link>
            </p>
        </form>
    </div>
</template>

<script setup>
import Navbar from '@/Components/Navbar.vue';
import { Link, router } from '@inertiajs/vue3';
import { onMounted, reactive } from 'vue';
import useUsers from '@/Services/Auth/index'

const form = reactive({
    name : '',
    email : '',
    password: ''
})

const {error,saveUser,redirectUser} = useUsers()

const handleSignup = () => {
    saveUser({...form})
    console.log(error)
}

redirectUser()

</script>

<style scoped>
.card {
    position: absolute;
    top: 15%;
    left: 40%;
    box-shadow: 0px 4px 4px 3px #E0E0E0;
    padding:5px 40px;
    color: rgb(64, 64, 64);
}

.card h3 {
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-bottom: 20px;
    color: #3b73dc;
}

form {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label {
    font-weight: 500;
}

input {
    border: none;
    background-color: #E0E0E0;
    outline: none;
    font-size: 17px;
    width: 300px;
    font-weight: 500;
}

button {
    background-color: #3b73dc;
    color: #fff;
    font-weight: 500;
    padding: 10px;
    margin-top: 10px;
}

.lien {
    color: #3b73dc;
}

.errorText{
    color: rgb(233, 93, 93);
}
</style>
