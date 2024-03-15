<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';

defineProps<{
    'data': Array<{
        "name": string,
        "code": string,
    }>
}>();
const formData = useForm({
    'name': ""
})
formData.delete(route(''), {
    onFinish: () => { }
})
</script>
<template>
    <ul>
        <li v-for="c in data" :key="c.code">
            <div style="display: flex;">
                <div> {{ c.name }} : {{ c.code }}</div>
                <div><button>edit</button></div>
                <div><button>delete</button></div>
            </div>

        </li>
    </ul>
</template>