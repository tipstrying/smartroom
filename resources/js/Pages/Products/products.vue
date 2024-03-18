<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';

import CategoriesTree from '@/Components/CategoriesTree.vue';
import MainPage from '@/Layouts/MainPage.vue';

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

function edit(code: string) {

    axios.get(route('product.edit', code))
}
</script>
<template>

    <main-page>
        <template v-slot:bar>
            <categories-tree :data="category"></categories-tree>
        </template>
        <template v-slot:table>
            <table>
                <tr>
                    <th v-for="h in head" :key="h.title + 'head'">{{ h.title }}</th>
                    <th>操作</th>
                </tr>
                <tr v-for="d in data">
                    <td v-for="h in head" :key="d[h.key] + 'ddd'">{{ d[h.key] }}</td>
                    <td>
                        <a :href="route('product.edit', d.pcode)">修改</a>
                        <a :href="route('product.delete', d.pcode)">删除</a>
                        
                    </td>
                </tr>
            </table>
        </template>
    </main-page>

</template>