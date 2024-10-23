<template>
    <LayoutDashboard>
        <template v-slot:contenu>
            <!-- Le tableau d'affichage -->
            <div class="card-table">
                <h3>Liste des Commandes</h3>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Montant</th>
                        <th>Clients</th>
                        <th>Adresse</th>
                        <th>Telephone</th>
                        <th>Date</th>
                    </tr>

                    <tr v-for="commande in commandes" :key="commande.id">
                            <td>{{ commande.id }}</td>
                            <td>{{ FormatagePrix(commande.montant) }}</td>
                            <td>{{ commande.nom}}</td>
                            <td>{{ commande.adresse}}</td>
                            <td>{{ commande.telephone}}</td>
                            <td>{{ commande.created_at}}</td>
                        </tr>
                </table>
            </div>
        </template>
    </LayoutDashboard>
</template>

<script setup>
import LayoutDashboard from "@/Layouts/LayoutDashboard.vue";
import useCommande from "@/Services/Commande";
import useProduct from "@/Services/Produit";
import { router } from "@inertiajs/vue3"
import { inject, onMounted } from "vue"

const { getCommandes,commandes } = useCommande()
const {FormatagePrix} = useProduct()


onMounted(() => {
    getCommandes()
})

if (localStorage.getItem('user_admin') != 1) {
    router.visit('/')
}
</script>

<style scoped>
.card-table {
    box-shadow: 0px 4px 8px #E0E0E0;
    padding: 10px;
}

.card-table h3 {
    font-size: 18px;
    font-weight: 500;
}

table {
    border-collapse: collapse;
    width: 800px;
}

td,
th {
    border: 1px solid black;
    padding: 10px;
}
</style>
