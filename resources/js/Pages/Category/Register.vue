<script lang="ts" setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const formData = useForm({
    name: "",
    code: "",
})

const submit = () => {
    formData.post(route('category.create'), {
        onFinish: () => {

        },
    });
};

</script>
<template>
    <GuestLayout>

        <Head title="新增品类" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="品类名" />

                <TextInput id="email" type="text" class="mt-1 block w-full" v-model="formData.name" required autofocus
                    autocomplete="username" />

                <InputError class="mt-2" :message="formData.errors.name" />
            </div>
            <div>
                <InputLabel for="email" value="品类编码" />

                <TextInput id="email" type="text" class="mt-1 block w-full" v-model="formData.code" required autofocus
                    autocomplete="username" />

                <InputError class="mt-2" :message="formData.errors.code" />
            </div>
            <div>
                <PrimaryButton class="ms-4" :class="{ 'opacity-25': formData.processing }"
                    :disabled="formData.processing">
                    注册
                </PrimaryButton>
            </div>
        </form>

    </GuestLayout>
</template>