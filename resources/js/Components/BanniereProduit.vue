<template>
    <div id="product-page-body">

        <div id="product-top-container">
            <div id="product-top-wrapper">
                <div id="product-top-text-section">
                    <h2>{{ props.nom }}</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam ac cursus orci, a hendrerit
                        libero. Integer rhoncus felis a sapien rhoncus, a lobortis nisi euismod
                    </p>
                </div>

            </div>
        </div>

    </div>
</template>

<script setup>
import { defineProps } from 'vue';
const props = defineProps(['nom'])
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
    height: 220px;
    overflow: hidden;
    padding: 100px;
    border-radius: 5px;
    display: flex;
    flex-direction: row;
    place-items: center;
    justify-content: space-between;
}

#product-top-text-section {
    width: 60%;
    margin: 0 auto;
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
</style>
