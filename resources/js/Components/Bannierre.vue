<template>
    <div id="product-page-body">

        <div id="product-top-container">
            <div id="product-top-wrapper">
                <div id="product-top-text-section">
                    <h1>Derniére tendance</h1>
                    <h2>Casque Audio BT</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac cursus orci, a hendrerit
                        libero. Integer rhoncus felis a sapien rhoncus, a lobortis nisi euismod
                    </p>
                    <button class="blue-button">
                        <Link href="/produits">Decouvrir</Link>
                    </button>
                </div>
                <div id="product-top-image-section">
                    <img src="../../../public/assets/top_image.png" alt="Large Light Beige Headphone">
                </div>
            </div>
        </div>

    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<style scoped>
/*PRODUCTS PAGE'S MAIN BODY*/

#product-page-body {
    padding: 0 100px;
}

/*TOP SECTION OF MAIN BODY*/

#product-top-container {
    padding-top: 80px;
    padding-bottom: 50px;
    display: flex;
    justify-content: center;
}

#product-top-wrapper {
    background-color: #edf2fb;
    width: 100%;
    height: 320px;
    overflow: hidden;
    padding: 100px;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
    place-items: center;
    justify-content: space-between;
}

#product-top-text-section {
    width: 52%;
}

#product-top-text-section h1 {
    color: rgb(64, 64, 64);
    font-size: 23px;
    font-weight: 500;
}

#product-top-text-section h2 {
    color: rgb(64, 64, 64);
    font-size: 45px;
    font-weight: 500;
}

#product-top-text-section p {
    color: rgb(137, 137, 137);
    font-size: 17px;
    margin-top: 10px;
    margin-bottom: 25px;
    line-height: 1.7;
}

.blue-button {
    background-color: #3b73dc;
    color: white;
    font-size: 16px;
    font-weight: 500;
    transition: 0.3s ease-in-out;
}

.blue-button:hover {
    background-color: rgb(102, 136, 240);
}

#product-top-text-section button {
    padding: 15px 45px;
    border-radius: 5px;
    font-size: 17px;
}

#product-top-image-section {
    background-color: #c7d5f1;
    width: 420px;
    height: 420px;
    border-radius: 100%;
    display: flex;
    justify-content: center;
    place-items: center;
    box-shadow: 0 20px 50px rgb(0, 0, 0, 0.2);
}

#product-top-image-section img {
    height: 82%;
    width: auto;
}

#product-top-image-section:hover {
    animation: shake 0.5s linear infinite;
    cursor: pointer;
}

@keyframes shake {
    0% {
        transform: rotate(0deg);
    }

    25% {
        transform: rotate(3deg);
    }

    50% {
        transform: rotate(0deg);
    }

    75% {
        transform: rotate(-3deg);
    }

    100% {
        transform: rotate(0deg);
    }
}
</style>
