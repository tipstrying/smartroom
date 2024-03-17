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
    }
}>();

const formData = useForm({
    'name': ""
})

onMounted(() => {
    console.log(p.data)
})

</script>
<template>
    <ul>
        <li><span>{{ data.data.name }}</span>
            <ul v-for="u in data.child" style="padding-left: 12px;">
                <li>
                    <span>{{ u.data.name }}</span>
                    <ul style="padding-left: 12px;">
                        <li v-for="uu in u.child">

                            <span>{{ uu.name }}</span>

                        </li>
                    </ul>

                </li>
            </ul>
        </li>

    </ul>
</template>