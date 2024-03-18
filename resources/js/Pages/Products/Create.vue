<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { onMounted } from 'vue';

const props = defineProps<{
    categories: [{
        name: string,
        ccode: string,
    }],
    product: {
        name: '',
        pcode: '',
        image: '',
        type: '',
        unit: '',
        ccode: '',
        brand: "",
    } | undefined,
}>();

const form = useForm({
    name: '',
    pcode: '',
    image: '',
    type: '',
    unit: '',
    ccode: '',
    brand: "",
});

const submit = () => {
    form.post(route('product.create'), {
        onFinish: () => {

        },
    });
};
function showForm() {
    console.log(form);
}

onMounted(() => {
    if (props.product ) {
        if (props.product.name) {
            form.name = props.product.name
        }
        if (props.product.ccode) {
            form.ccode = props.product.ccode
        }
        if (props.product.brand) {
            form.brand = props.product.brand
        }
        if (props.product.image) {
            form.brand = props.product.image
        }
        if (props.product.pcode) {
            form.pcode = props.product.pcode
        }
        if (props.product.type) {
            form.type = props.product.type
        }
        if (props.product.unit) {
            form.unit = props.product.unit
        }
    }
})
</script>

<template>
    <GuestLayout>

        <Head title="新增商品"></Head>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="商品名称" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name"  />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="pcode" value="商品编码" />

                <TextInput id="pcode" type="text" class="mt-1 block w-full" v-model="form.pcode" required
                    autocomplete="pcode" />

                <InputError class="mt-2" :message="form.errors.pcode" />
            </div>

            <div class="mt-4">
                <InputLabel for="type" value="商品规格" />

                <TextInput id="type" type="text" class="mt-1 block w-full" v-model="form.type" required
                    autocomplete="type" />

                <InputError class="mt-2" :message="form.errors.type" />
            </div>
            <div class="mt-4">
                <InputLabel for="category" value="商品品类" />
                <select v-model="form.ccode" name="cars" id="category"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>
                    <option v-for="c in categories" :value="c.ccode">{{ c.name }}</option>
                </select>
            </div>

            <div class="mt-4">
                <InputLabel for="brand" value="商品品牌" />

                <TextInput id="brand" type="text" class="mt-1 block w-full" v-model="form.brand" required
                    autocomplete="brand" />

                <InputError class="mt-2" :message="form.errors.type" />
            </div>
            <div class="mt-4">
                <InputLabel for="unit" value="商品单位" />

                <TextInput id="unit" type="text" class="mt-1 block w-full" v-model="form.unit" required
                    autocomplete="unit" />

                <InputError class="mt-2" :message="form.errors.unit" />
            </div>


            <div class="flex items-center justify-end mt-4">

                <PrimaryButton v-if="product" class="ms-4" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    修改
                </PrimaryButton>

                <PrimaryButton v-else class="ms-4" :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing">
                    新增
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
