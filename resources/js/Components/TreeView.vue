<script lang="ts" setup>
import { ref } from 'vue';

defineProps<{
    data:{
        
    }
}>()

const ctrlData = ref<{
    current:string
}>()
</script>
<template>
    <ul></ul>
</template>