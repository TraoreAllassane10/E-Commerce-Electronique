<template>
    <LayoutDashboard>
        <template v-slot:contenu>
              <!-- Le tableau d'affichage -->
                <div class="card-table">
                    <h3>Liste des clients</h3>

                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Libelle</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Image</th>
                        </tr>

                        <!-- <tr v-for="produit in produits" :key="produit.id">
                            <td>{{ produit.id }}</td>
                            <td>{{ produit.libelle }}</td>
                            <td>{{ FormatagePrix(produit.prix) }}</td>
                            <td>{{ produit.category.nom }}</td>
                            <td><img :src="`/storage/${produit.image}`" alt="" srcset=""></td>
                        </tr> -->
                    </table>
                </div>
        </template>
    </LayoutDashboard>

</template>

<script setup>
import LayoutDashboard from "@/Layouts/LayoutDashboard.vue";
import { router } from "@inertiajs/vue3"
import { inject } from "vue"

if(localStorage.getItem('user_admin') != 1){
    router.visit('/')
}
</script>

<style scoped>
.card-table
{
    box-shadow: 0px 4px 8px #E0E0E0;
    padding: 10px;
}

.card-table h3
{
    font-size: 18px;
    font-weight: 500;
}

table {
    border-collapse: collapse;
    width: 500px;
}

td,
th {
    border: 1px solid black;
    padding: 10px;
}

</style>
