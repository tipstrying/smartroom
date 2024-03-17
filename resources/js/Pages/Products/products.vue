<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';

import CategoriesTree from '@/Components/CategoriesTree.vue';

type dataType = {
    "name": string,
    "pcode": string,
    "type": string,
    "image": string,
    "unit": string,
    "company": string,
    "ccode": string,
}

defineProps<{
    "category": {},
    "data": [dataType],
    "head": [{
        align: string,
        key: "name" | "pcode" | "type" | "image" | "unit",
        value: string,
        sortable: boolean,
        title: string,
    }]

}>()

const formData = useForm({
    'name': "",
    'code': "",
})
function add() {
    axios.get(route('product.create'))
}
</script>
<template>
    <div style="display: flex;">
        <div>
            <categories-tree :data="category"></categories-tree>
        </div>
        <div>
            <table>
                <tr>
                    <th v-for="h in head" :key="h.title + 'head'">{{ h.title }}</th>
                </tr>
                <tr v-for="d in data">
                    <td v-for="h in head" :key="d[h.key] + 'ddd'">{{ d[h.key] }}</td>
                </tr>
            </table>
        </div>
    </div>



</template>