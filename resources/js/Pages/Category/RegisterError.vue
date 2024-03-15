<script lang="ts" setup>
defineProps<{
    error: string
}>();
</script>
<template>
    <div class="container mx-auto">
        <p class="font-sans ...">{{ error }}</p>
    </div>

</template>