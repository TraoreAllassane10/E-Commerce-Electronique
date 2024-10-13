<template>
    <div class="chargement-container">
        <div class="chargement">

        </div>
    </div>
</template>

<script>

</script>

<style>
.chargement-container
{
    position: absolute;
    top: 60%;
    left: 50%;
}
.chargement{
    width: 50px;
    height: 50px;
    border: 10px solid #e0e0e0;
    border-top: 10px solid rgb(102, 136, 240);
    border-radius: 50%;
    animation: charge 1.5s linear infinite;
}

@keyframes charge {
    0%{
        transform: rotate(0deg);
    }
    100%{
        transform: rotate(360deg);
    }
}
</style>
