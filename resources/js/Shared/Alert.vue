<template>
    <div class="container">
        <p>{{ props.message }}</p>
    </div>
</template>

<script setup>
import { defineProps, ref } from 'vue';
const props = defineProps(['message'])
</script>

<style scoped>
.container{
    position: absolute;
    right: 10px;
    background-color: rgb(27, 252, 121);
    box-shadow: 0px 4px 8px #E0E0E0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 300px;
    padding: 10px;
    border-radius: 5px;
}

p{
    color: #fff;
    font-weight: bold;
    font-size: 20;
}
</style>
