<script setup lang="ts">
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';

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
    'name':"",
    'code':"",
})
function add(){
   axios.get( route('product.create'))
}
</script>
<template>
    <div>
        <button @click="add" > 新增商品 </button>
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

</template>