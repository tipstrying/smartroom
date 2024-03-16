<script lang="ts" setup>
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { nextTick, ref } from 'vue';
const prop = defineProps<{
    categories: [{
        name: string,
        ccode: string,
        fcode: string,
        level: number,
    }],
    nextcode: string,
}>();

/*
defineProps<{
    "date": Array<{
        name: string,
        ccode: string,
        fcode: string,
        level: number,
    }>
}>()
*/

const level = ref([{
    name: "1级",
    value: 1
},
{
    name: "2级",
    value: 2
},
{
    name: "3级",
    value: 3
}
])

const formData = useForm({
    name: "",
    ccode: "",
    fcode: "",
    level: 0,
})

const submit = () => {
    if (formData.ccode.length == 0) {
        formData.ccode = prop.nextcode;
    }
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
                <InputLabel for="name" value="品类名" />

                <TextInput id="name" type="text" class="mt-1 block w-full" v-model="formData.name" required autofocus
                    autocomplete="cname" />

                <InputError class="mt-2" :message="formData.errors.name" />
            </div>
            <div>
                <InputLabel for="code" value="品类编码" />
                <input :placeholder="nextcode"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    v-model="formData.ccode" ref="input" />
                <InputError class="mt-2" :message="formData.errors.ccode" />
            </div>
            <div class="mt-4">
                <InputLabel for="category" value="所属品类" />
                <select v-model="formData.fcode" name="cars" id="category"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>
                    <option v-for="c in categories" :value="c.ccode">{{ c.name }}: {{ c.level }} 级</option>
                </select>
            </div>
            <div class="mt-4">
                <InputLabel for="level" value="级别" />
                <select v-model="formData.level" name="cars" id="level"
                    class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                    required>
                    <option v-for="c in level" :value="c.value">{{ c.name }}</option>
                </select>
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