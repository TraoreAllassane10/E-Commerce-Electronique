<template>
    <section id="promotion">
        <div class="card">
            <div class="card-img">
                <img src="../../../public/assets/all.png" alt="" srcset="">
            </div>
            <div class="card-text">
                <h3>Qui-sommes nous ?</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi, adipisci? Voluptatibus in
                    necessitatibus doloribus corporis optio dolorem debitis itaque ipsam voluptatem dolor minima vel, ea
                    quos. Possimus officia commodi quae.Excepturi, adipisci? Voluptatibus in
                    necessitatibus doloribus corporis optio dolorem debitis itaque ipsam voluptatem dolor minima vel, ea
                    quos. Possimus officia commodi quae.Excepturi, adipisci? Voluptatibus in
                    necessitatibus doloribus corporis optio dolorem debitis itaque ipsam voluptatem dolor minima vel, ea
                    quos. Possimus officia commodi quae.</p>
                <button>Decouvrez Nos Produits</button>
            </div>
        </div>
    </section>
</template>

<script setup>

</script>

<style scoped>
section {
    padding: 30px 100px;
}

.card
{
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    width: 100%;
    height: 400px;
    box-shadow: 0px 4px 4px 1px #E0E0E0;
}

.card .card-img{
    display: flex;
    align-items: center;
    justify-content: center;
    width: 50%;
    background-color: rgb(180, 196, 243);
}

.card .card-img img
{
   width: 300px;
   height: 300px;
}

.card .card-text
{
    display: flex;
    flex-direction: column;
    gap: 30px;
    width: 50%;
    padding: 10px;
    color: rgb(64, 64, 64);
}

.card .card-text h3{
    font-size: 25px;
    font-weight: 600;
}

.card .card-text p{
    font-size: 17px;
    font-weight: 400;
}

.card .card-text button{
    width: 300px;
    background-color: #3b73dc;
    color: #fff;
    font-size: 16px;
    padding: 10px;
    border-radius: 5px;

}
</style>
