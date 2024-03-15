<script setup lang="ts">
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

defineProps<{

}>();

const form = useForm({
    name: '',
    pcode: '',
    image:'',
    type:'',
    unit:'',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => {
            
        },
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="新增商品" />

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="商品名称" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="form.name" required autofocus
                    autocomplete="name" />

                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-4">
                <InputLabel for="email" value="商品编码" />

                <TextInput id="email" type="text" class="mt-1 block w-full" v-model="form.pcode" required
                    autocomplete="username" />

                <InputError class="mt-2" :message="form.errors.pcode" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="商品规格" />

                <TextInput id="password" type="password" class="mt-1 block w-full" v-model="form.type" required
                    autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="mt-4">
                <InputLabel for="password_confirmation" value="确认密码" />

                <TextInput id="password_confirmation" type="password" class="mt-1 block w-full"
                    v-model="form.password_confirmation" required autocomplete="new-password" />

                <InputError class="mt-2" :message="form.errors.password_confirmation" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link :href="route('login')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                已有账号？登录试试
                </Link>

                <PrimaryButton class="ms-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    注册
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>
