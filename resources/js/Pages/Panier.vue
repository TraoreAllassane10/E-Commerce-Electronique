<template>
    <Navbar />
    <div class="container">
        <h1>Mon panier</h1>
        <table>
            <tr v-for="produit in produits" :key="produit.id">
                <td><img :src="`/storage/${produit.options.image}`" alt="" srcset=""></td>
                <td>{{ produit.name }}</td>
                <td>{{ produit.qty }}</td>
                <td>{{ produit.price }}</td>
                <td><Button @click="removeToCart(produit.rowId)">Supprimer</Button></td>
            </tr>
        </table>

        <p>Montant total : {{ FormatagePrix(total) }}</p>

        <div class="btns">
            <button @click="destroyCart()" class="btn-destroy">Vider</button>
            <Link class="btn-commander" href="/confirmation">Commander</Link>
        </div>
    </div>
</template>

<script setup>
import Navbar from "@/Components/Navbar.vue"
import useCart from "@/Services/Panier";
import useProduct from "@/Services/Produit";
import { Link } from "@inertiajs/vue3";

import { onMounted } from "vue";

const { getCart, removeToCart, produits, total, destroyCart } = useCart()
const { FormatagePrix } = useProduct()
onMounted(() => {
    getCart(localStorage.getItem('user_token'))
})
</script>

<style scoped>
.container {
    position: relative;
    top: 100px;
    width: 50%;
    margin: auto;
    height: 70vh;
    background-color: #ffff;
    box-shadow: 0px 4px 4px 1px #E0E0E0;

}

table {
    border-collapse: collapse;
}

td {
    width: 20%;
    font-size: 18px;
    color: rgb(64, 64, 64);
    margin-left: 100px;
    border-top: 1px solid grey;
    padding: 0 10px;
}

td img {
    margin-left: 10px;
    width: 50px;
    height: 50px;
}

h1 {
    color: rgb(64, 64, 64);
    text-align: center;
    font-size: 20px;
}

table button {
    background-color: rgb(236, 92, 92);
    color: #FFF;
    padding: 5px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

table button:hover {
    background-color: rgba(236, 92, 92, 0.8);
}

.container p {
    font-size: 20px;
    font-weight: bold;
    margin-top: 30px;
    margin-left: 10px;
    color: rgb(64, 64, 64);
}

.btns {
    display: flex;
    align-items: center;
    gap: 30px;
    margin: 20px;
}

.btn-destroy {
    background-color: rgb(236, 92, 92);
    color: #FFF;
    padding: 10px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

.btn-destroy:hover {
    background-color: rgba(236, 92, 92, 0.8);
}

.btn-commander {
    background-color: #3b73dc;
    color: #FFF;
    padding: 10px;
    border-radius: 5px;
    transition: all 0.3s ease-in-out;
}

.btn-commander:hover {
    background-color: #3b73dc;
    opacity: 0.8;
}

/*Le style du modal */
.modal{
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #1d1d1d;
    opacity: 0.4;
    z-index: 1000;
}

.modal-wrapper
{
    padding: 50px;
    background-color: #FFF;
    color: rgb(64, 64, 64);
    box-shadow: 0px 4px 4px 8px #e0e0e0;
}

form
{
    display: flex;
    flex-direction: column;
    gap: 10px;
}
</style>
