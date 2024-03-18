<script lang="ts" setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
const prop = defineProps<{
    room: {
        name: string,
        rcode: string,
    } | undefined,
    nextcode: string | undefined,
}>();


const formData = useForm({
    name: "",
    rcode: "",
})

const submit = () => {
    if (formData.rcode.length == 0) {
        if (prop.nextcode) {
            formData.rcode = prop.nextcode;
        }
    }
    formData.post(route('room.create'), {
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
                <InputLabel for="name" value="仓库名称" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="formData.name" required autofocus
                    autocomplete="cname" />

                <InputError class="mt-2" :message="formData.errors.name" />
            </div>
            <div>
                <InputLabel for="code" value="仓库编码" />
                <input :placeholder="nextcode"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="formData.rcode" ref="input" />
                <InputError class="mt-2" :message="formData.errors.rcode" />
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