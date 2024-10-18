<template>
    <Navbar />
    <div class="container">
        <div class="wrapper">
            <h1>Confirmation de la commande</h1>

            <form @submit.prevent="saveCommande">
                <label for="">Votre nom complet</label>
                <input type="text" v-model="form.nom">

                <label for="">Votre adresse</label>
                <input type="text" v-model="form.adresse">

                <label for="">Votre numero de Telephone</label>
                <input type="text" v-model="form.telephone">

                <label for="">Montant</label>
                <input type="text" v-model="form.montant">

                <span style="font-style: italic;">Montant de la commande : {{ total }} fcfa</span>

                <button type="submit">Passer la commande</button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { defineProps, onMounted, reactive, ref } from 'vue';
import Navbar from '@/Components/Navbar.vue';
import useCart from '@/Services/Panier';
import useCommande from "@/Services/Commande"

const {total,getCart} = useCart()
const {addCommande} = useCommande()

const form = reactive({
    nom: '',
    adresse: '',
    telephone: '',
    montant: ''
})

const saveCommande = () => {
    addCommande({...form})
    form.nom = "",
    form.adresse = "",
    form.telephone = "",
    form.montant = ""
}


onMounted(() => {
    getCart(localStorage.getItem('user_token'))
})
</script>

<style scoped>
.container {
    width: 40%;
    margin: 0 auto;
    position: absolute;
    top: 15%;
    left: 30%;
}

.wrapper {
    padding: 30px 50px;
    background-color: #ffff;
    color: rgba(64, 64, 64);
}

h1 {
    margin-bottom: 10px;
    font-size: 20px;
    font-weight: bold;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    gap: 10px;
}

form label {
    font-size: 16px;
    font-weight: 500;
}

form button{
    background-color: #3b73dc;
    color: #FFF;
    padding: 10px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

form button:hover{
    background-color: #3b73dc;
    opacity: 0.8;
}
</style>
