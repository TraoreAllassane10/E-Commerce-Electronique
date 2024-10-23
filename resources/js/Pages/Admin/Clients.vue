<template>
    <LayoutDashboard>
        <template v-slot:contenu>
            <!-- Le tableau d'affichage -->
            <div class="card-table">
                <h3>Liste des clients</h3>

                <table>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Email</th>
                    </tr>

                    <tr v-for="client in clients" :key="client.id">
                            <td>{{ client.id }}</td>
                            <td>{{ client.name }}</td>
                            <td>{{ client.email }}</td>
                        </tr>
                </table>
            </div>
        </template>
    </LayoutDashboard>

</template>

<script setup>
import LayoutDashboard from "@/Layouts/LayoutDashboard.vue";
import useClient from "@/Services/Client";
import { router } from "@inertiajs/vue3"
import { inject, onMounted } from "vue"

const { getClients, clients } = useClient()

if (localStorage.getItem('user_admin') != 1) {
    router.visit('/')
}

onMounted(() => {
    getClients()
})
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
    width: 500px;
}

td,
th {
    border: 1px solid black;
    padding: 10px;
}
</style>
