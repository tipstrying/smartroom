<script setup lang="ts">
defineProps<{
    "data": [{
        "name": string,
        "pcode": string,
        "type": string,
        "image": string,
        "unit": string,
        "company": string,
        "ccode": string,
    }],
    "head":[{
        align:string,
        key:string,
        value:string,
        sortable:boolean,
        title:string,
    }]

}>()
</script>
<template>
     <v-data-table :items="data" :headers="head"></v-data-table>
</template>