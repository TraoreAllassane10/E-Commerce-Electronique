<template>
    <nav>
        <div class="logo">
            <span>BabiShop</span>
        </div>

        <ul>
            <li>
                <Link href="/">Acceuil</Link>
            </li>
            <li><a href="" class="link_produit">Nos Produits</a>

            </li>
            <li><a href="">Qui sommes-nous ?</a></li>
            <li><a href="">Contact</a></li>
        </ul>

        <div class="btns">
            <button>Panier</button>
            <Link href="/login" class="btn_blue" v-if="!logged">Connexion</Link>
            <Link href="/"><img src="../../../public/assets/profile.png" alt="" v-if="logged && !admin" class="profile">
            </Link>
            <Link href="/dashboard" class="btn_blue" v-if="admin">Dashboard</Link>
        </div>
    </nav>

    <!-- <ul class="menu_deroulant">
        <li><a href="">Tous les produits</a></li>
        <li><a href="">Telephone</a></li>
        <li><a href="">Casque BT</a></li>
        <li><a href="">Tablette</a></li>
        <li><a href="">Montre</a></li>
        <li><a href="">Ordinateur</a></li>
    </ul> -->

</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { inject, onMounted } from "vue";
const { logged, changeLogged } = inject('logged')

let admin = localStorage.getItem('user_admin') == 1 ? true : false

changeLogged()
</script>

<style scoped>
nav {
    display: flex;
    align-items: center;
    justify-content: space-around;
    place-items: center;
    padding: 20px;
    width: 100%;
    position: fixed;
    background-color: #fff;
    z-index: 1000;

}

.logo {
    color: rgb(64, 64, 64);
    font-weight: 600;
    font-size: 17px;
}

nav ul {
    display: flex;
    gap: 30px;
}

nav ul a {
    font-size: 17px;
    color: rgb(64, 64, 64);
    font-weight: 500;
    transition: all 0.3s ease-in-out;
}

nav ul a:hover{
    color: #3b73dc;
}

.menu_deroulant {
    display: flex;
    flex-direction: column;
    position: absolute;
    left: 480px;
    top: 50px;
    z-index: 1000;
    background-color: #fff;
    box-shadow: #e0e0e0 0px 4px 8px;
    padding: 10px;
}


.btns {
    display: flex;
    gap: 10px;
}

.btns .btn_blue {
    background-color: rgb(102, 136, 240);
    padding: 8px;
    color: #fff;
    font-size: 16px;
    font-weight: 500;
    border-radius: 5px;
}

.btns .btn_blue:hover {
    background-color: rgb(102, 136, 240);
}

.profile {
    width: 40px;
    height: 40px;
}
</style>
