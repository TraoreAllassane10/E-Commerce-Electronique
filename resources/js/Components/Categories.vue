<template>
    <section>
        <h3>Nos Categories</h3>

        <div class="card-container">
            <div v-if="chargement">
                <Loader />
            </div>
                <div class="card" v-for="categorie in categorieData" :key="categorie.id">
                <img :src="`/storage/image/${categorie.image}`" :alt="categorie.nom">

                <div class="card-text">
                    <Link :href="categorie.nom != 'Tout' ? categorie.nom : '/produits'"><p class="categorie_nom">{{ categorie.nom }}</p></Link>
                    <p>{{ categorie.nom != 'Tout'? categorie.products_count : '+100'}} produit(s)</p>
                </div>
            </div>

        </div>
    </section>
</template>

<script setup>
import Loader from "@/Shared/Loader.vue"
import { Link } from "@inertiajs/vue3";
import axios from "axios"
import { onMounted, ref } from "vue"

const categorieData = ref([])
const chargement = ref(true)

const getImage = () => {
    return `/storage/image/headphone.png`
}

const allCategories = async () => {
    await axios.get("http://127.0.0.1:8000/api/categories")
        .then((res) => {
            categorieData.value = res.data.data
            chargement.value = false
        })
        .catch((err) => console.log(err))
}

onMounted(() => {
    allCategories()
})


</script>

<style scoped>
section {
    padding: 0 100px;
}

h3 {
    color: rgb(64, 64, 64);
    font-size: 23px;
    font-weight: 500;
}

.card-container {
    margin-top: 20px;
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
}

.card {
    display: flex;
    place-items: center;
    background-color: #fff;
    box-shadow: 0px 4px 8px #E0E0E0;
    width: 30%;
}

.card img {
    width: 80px;
    height: 80px;
    background-color: rgb(180, 196, 243);
}

.card .card-text {
    padding-left: 35px;
}

.card .card-text .categorie_nom {
    font-size: 17px;
    color: rgb(64, 64, 64);
    font-weight: 500;
}

.card .card-text .categorie_nom+p {
    font-size: 14px;
    color: rgb(64, 64, 64);
}


</style>
