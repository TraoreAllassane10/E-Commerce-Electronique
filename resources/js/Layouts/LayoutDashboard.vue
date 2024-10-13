<template>
    <header>
        <div class="nav-item">
            <Link href="/">Acceuil</Link>
            <Link href="/contact">Contact</Link>
        </div>
    </header>
    <nav>
        <div class="logo">
            <h2>BabyShop</h2>
        </div>

        <div class="nav-item">
            <Link href="/dashboard">Dashboard</Link>
            <Link href="/clients">Clients</Link>
            <Link href="/admin/produits">Produits</Link>
            <Link href="/commandes">Commandes</Link>
            <Link href="/utilisateurs">Utilisateurs</Link>
            <Link href="/parametres">Parametres</Link>
        </div>
    </nav>

    <section id="content">
        <slot name="contenu">
        </slot>
    </section>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<style scoped>
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 50px;
    background-color: rgb(255, 255, 255);
    box-shadow: 0px 4px 8px #E0E0E0;
}

header .nav-item
{
    display: flex;
    margin-left: 300px;
}

header .nav-item a{
    margin: 9px 10px 0 0;
    font-size: 17px;
    color: rgb(64, 64, 64);
    font-weight: 500;
}

nav {
    display: flex;
    flex-direction: column;
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100vh;
    background-color: #3b73dc;
    color: #fff;
}

nav .logo h2 {
    font-size: 30px;
    font-weight: 600;
    padding-left: 20px;
}

nav .nav-item {
    display: flex;
    flex-direction: column;
    padding-top: 30px;
}

nav .nav-item a{
    font-size: 20px;
    margin-bottom: 10px;
    padding-left: 30px;
}

nav .nav-item a:hover{
    border-left: 4px solid #fff;
}

#content{
    margin-left: 280px;
    margin-top: 60px;
    color: black;

}
</style>
