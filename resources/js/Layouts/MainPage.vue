<script lang="ts" setup>
</script>
<template>
    <div class="flex flex-row container mx-auto space-x-2">
        <div>
            <slot name="bar"></slot>
        </div>
        <div>
            <slot name="table"></slot>
        </div>
    </div>
</template>