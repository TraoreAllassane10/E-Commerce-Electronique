<template>
    <LayoutDashboard>
        <template v-slot:contenu>
            <h3>Liste des clients</h3>
            <table>

            </table>
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

</style>
