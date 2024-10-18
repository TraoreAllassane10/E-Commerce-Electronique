<template>
    <div class="container" v-if="visible">
        <p>{{ props.message }}</p>
    </div>
</template>

<script setup>
import { defineProps, onMounted, ref } from 'vue';
const props = defineProps(['message'])
const visible = ref(true)

onMounted(() => {
    setTimeout(() => {
        visible.value = false
    }, 1000)
})
</script>

<style scoped>
.container {
    position: fixed;
    right: 10px;
    bottom: 0;
    background-color: rgb(27, 252, 121);
    box-shadow: 0px 4px 8px #E0E0E0;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 300px;
    padding: 10px;
    border-radius: 5px;
}

p {
    color: #fff;
    font-weight: bold;
    font-size: 20;
}
</style>
