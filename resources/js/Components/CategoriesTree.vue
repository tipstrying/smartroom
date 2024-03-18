<script lang="ts" setup>
import { useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const p = defineProps<{
    'data': {
        data: {
            name: string,
            ccode: string,
        },
        child: [
            {
                data: {
                    name: string,
                    ccode: string,
                }
                child: [{

                    name: string,
                    ccode: string,

                }]
            }
        ]
    }|any
}>();

const formData = useForm({
    'name': ""
})

onMounted(() => {
    console.log(p.data)
})

</script>
<template>
    <ul v-if="data.data">

        <li >
            <a href="/product">
                <span>{{ data.data.name }}</span>
            </a>
            
            <ul v-for="u in data.child" style="padding-left: 12px;">
                <li>
                    <span>{{ u.data.name }}</span>
                    <ul style="padding-left: 12px;">
                        <li v-for="uu in u.child">
                            <a :href="'/product/category/' + uu.ccode"><span>{{ uu.name }}</span></a>
                        </li>
                    </ul>

                </li>
            </ul>
        </li>
        <li>
            <a href="/category/create">新增品类</a>
            
        </li>
        <li>
            <a :href="route('product.create')">新增商品</a>
        </li>

    </ul>
</template>