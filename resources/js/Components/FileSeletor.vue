<script lang="ts" setup>
const m = defineModel<{
    fileName:string
}>()

</script>
<template>
    <input type="file" v-on:change="(f:Event)=>console.log(f)">

</template>