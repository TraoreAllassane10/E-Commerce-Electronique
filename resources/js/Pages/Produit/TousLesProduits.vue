<template>
    <Navbar />
    <BanniereProduit nom="Tous les produits" />
    <div v-if="loading">
        <Loader />
    </div>
    <ProduitCard :produits="produits" />
    <Footer />
</template>

<script setup>
import BanniereProduit from '@/Components/BanniereProduit.vue';
import Footer from '@/Components/Footer.vue';
import Navbar from '@/Components/Navbar.vue';
import ProduitCard from '@/Components/ProduitCard.vue';
import useProduct from '@/Services/Produit';
import Loader from '@/Shared/Loader.vue';
import { onMounted } from 'vue';

const { getProducts, produits, loading } = useProduct()

onMounted(() => {
    getProducts()
})
</script>

<style scoped></style>
