<script setup>
import Bannierre from "@/Components/Bannierre.vue";
import Categories from "@/Components/Categories.vue";
import Footer from "@/Components/Footer.vue";
import Navbar from "@/Components/Navbar.vue";
import Telephone from "@/Components/Telephone.vue";
import Casque from "@/Components/Casque.vue";
import Ipad from "@/Components/Ipad.vue";
import Promotion from "@/Components/Promotion.vue";
import { inject, onMounted } from "vue";
import useProduct from "@/Services/Produit";
import useCommande from "@/Services/Commande";
import Alert from "@/Shared/Alert.vue";


const {logged,user,changeLogged} = inject('logged')

onMounted(() => {
    changeLogged()
})

</script>

<template>
    <Navbar/>
    <Bannierre/>
    <Categories/>
    <Telephone/>
    <Casque/>
    <Promotion/>
    <Ipad/>
    <Footer/>

    <div v-if="commande_success">
        <Alert message="Commande validée" />
    </div>
</template>

<style scoped>

</style>
