<template>
    <section id="footer">
        <div class="container">
            <div class="logo">
                <h1>BabiShop</h1>
            </div>

            <p>babishop@gmail.com - 05 64 63 99 33 - Cocody 2 plateaux</p>

            <p>Copyright 2024 - Tous les droits sont reservés</p>
        </div>
    </section>
</template>

<script setup>

</script>

<style scoped>
section {
    width: 100%;
    height: 200px;
    background-color: #a4b8db;
    display: flex;
    align-items: center;
    justify-content: center;
}

.container
{
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 60%;
    margin: 0 auto;
}

h1{
    font-weight: 500;
    color: #fff;
    font-size: 40px;
}

p{
    color: #fff;
    font-weight: 300;
    font-size: 16px;
}
</style>
