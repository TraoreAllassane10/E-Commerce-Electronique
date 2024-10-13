<template>
    <LayoutDashboard>
        <template v-slot:contenu>

            <div class="container">
                <div v-if="AlertSuccess">
                    <Alert message="Produit enregistré avec succes"/>
                </div>
                <!-- Le formulaire -->
                <div class="card-register">
                    <h3>Nouveau produit</h3>
                    <form @submit.prevent="registerProduct" >
                        <label for="">Libelle</label>
                        <input type="text" v-model="form.libelle">

                        <label for="">Prix</label>
                        <input type="text" v-model="form.prix">

                        <label for="">Categorie</label>
                        <select v-model="form.category_id" >
                            <option value="" disabled></option>
                            <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.nom }}</option>
                        </select>

                        <label for="">Image</label>
                        <input type="file" @input="(e) => {form.image = e.target.files[0]}">

                        <button type="submit">Enregister</button>
                    </form>
                </div>

                <!-- Le tableau d'affichage -->
                <div class="card-table">
                    <h3>Liste des Produits</h3>

                    <table>
                        <tr>
                            <th>Id</th>
                            <th>Libelle</th>
                            <th>Prix</th>
                            <th>Categorie</th>
                            <th>Image</th>
                        </tr>

                        <tr v-for="produit in produits" :key="produit.id">
                            <td>{{ produit.id }}</td>
                            <td>{{ produit.libelle }}</td>
                            <td>{{ FormatagePrix(produit.prix) }}</td>
                            <td>{{ produit.category.nom }}</td>
                            <td><img :src="`/storage/${produit.image}`" alt="" srcset=""></td>
                        </tr>
                    </table>
                </div>
            </div>

        </template>
    </LayoutDashboard>
</template>

<script setup>
import LayoutDashboard from "@/Layouts/LayoutDashboard.vue";
import { router } from "@inertiajs/vue3"
import { inject, onMounted, reactive, ref } from "vue"
import useProduct from "@/Services/Produit/index"
import useCategory from "@/Services/Categorie/index"
import Alert from "@/Shared/Alert.vue";


const form = reactive({
    libelle: '',
    prix: '',
    category_id: '',
    image: ''
})


// Redirection de l'utilisateur au cas où c'est pas l'admin
if (localStorage.getItem('user_admin') != 1) {
    router.visit('/')
}

const {getProducts,saveProduct,FormatagePrix,produits,AlertSuccess} = useProduct()
const {getCategories,categories} = useCategory()

onMounted(() => {
    getProducts()
    getCategories()
})

// Enregistrement d'un nouveau produit
const registerProduct = () => {

    // Faire disparaitre l'alert de succes
    AlertSuccess.value = false

    const formData = new FormData();
    formData.append('libelle', form.libelle);
    formData.append('prix', form.prix);
    formData.append('category_id', form.category_id);
    formData.append('image', form.image); // Ajoute le fichier image au FormData

    saveProduct(formData, localStorage.getItem('user_token'));

    form.libelle = ""
    form.prix = ""
    form.category_id = ""
    form.image = ""
}


</script>

<style scoped>
.container{
    display: flex;
    gap: 50px;
    color: rgb(64, 64, 64);
}

/* Le style du formulaire */

.card-register
{
    box-shadow: 0px 4px 8px #E0E0E0;
    padding: 20px;
    height: 450px;
}

.card-register h3
{
    font-size: 18px;
    font-weight: 500;
    text-align: center;
}

form
{
    display: flex;
    flex-direction: column;
    gap: 10px;
}

label{
    font-size: 17px;
    font-weight: 500;
}

.card-register button{
    padding: 10px;
    color: #fff;
    background-color: #3b73dc;
    margin-top: 10px;
    transition: all 0.3s ease-in-out;
}

.card-register button:hover{
    background-color: #5e8bdf;
    font-weight: 500;
}


/* Le style du tableau d'affichage */
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

table img{
    width: 50px;
    height: 50px;
}
</style>
