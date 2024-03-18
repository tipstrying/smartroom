<script lang="ts" setup>
defineProps<{
    'data':Array<{
        name:string,
        rcode:string
    }>
}>();
</script>
<template>
    <ul>
        <li v-for=" r in data" :key="r.rcode">{{ r.name }}:{{ r.rcode }}</li>
    </ul>

</template>