<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';

defineProps<{
    'data': Array<{
        'name': string,
        'ccode': string,
    }>
}>();

const formData = useForm({
    'name': ""
})


</script>
<template>
    <ul>
        <li v-for="c in data" :key="c.ccode">
            <div style="display: flex;">
                <div> {{ c.name }} : {{ c.ccode }}</div>
                <div><button>edit</button></div>
                <div><button>delete</button></div>
            </div>

        </li>
    </ul>
</template>