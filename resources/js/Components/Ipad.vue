<template>
    <section id="ExempleProduit">
        <h3>Ipad</h3>
        <div class="card_container">

            <div class="card" v-for="produit in five_ipad" :key="produit.id">
                <div class="card-img">
                    <img :src="`/storage/${produit.image}`" alt="" srcset="">
                </div>
                <div class="card-text">
                    <h4>{{ produit.libelle }}</h4>
                    <p>{{ FormatagePrix(produit.prix) }}</p>
                    <button>Ajouter au panier</button>
                </div>
            </div>

        </div>
    </section>
</template>

<script setup>
import useProduct from '@/Services/Produit';
import { defineProps, onMounted, ref } from 'vue';

const { fiveIpad, five_ipad, FormatagePrix } = useProduct()

onMounted(() => {
    fiveIpad()
})
</script>

<style scoped>
section {
    padding: 30px 100px;
}

h3 {
    color: rgb(64, 64, 64);
    font-size: 23px;
    font-weight: 500;
}

.card_container {
    margin-top: 20px;
    display: flex;
    flex-direction: row;
    gap: 50px;
}

.card {
    width: 17%;
    height: 300px;
    display: flex;
    flex-direction: column;
    box-shadow: 0px 4px 4px 1px #E0E0E0;
}

.card-img {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 50%;
    background-color: rgb(180, 196, 243);
}

.card-img img {
    width: 125px;
    height: 125px;
}

.card-text {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 20px 0 0 20px;
}

.card-text h4 {
    color: rgb(64, 64, 64);
    font-weight: 500;
}

.card-text p {
    color: rgb(64, 64, 64);
}

.card-text button {
    background-color: #3b73dc;
    color: #fff;
    font-size: 16px;
    padding: 5px;
    border-radius: 5px;
    width: 160px;
    margin-left: -7px;
}
</style>
