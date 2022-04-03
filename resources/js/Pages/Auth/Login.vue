<template lang="pug">
Head
    title Авторизация
main.grid.place-items-center.min-h-screen
    section.bg-white.p-8.rounded-xl.max-w-md.mx-auto.border
        h1.text-2xl.mb-1 Авторизация
        form.max-w-md.mx-auto.mt-6(@submit.prevent="submit")
            div.mb-3
                label.form-label(for="email") Почта
                input.form-input(
                    v-model="form.email"
                    type="email"
                    placeholder="Введите почту"
                    name="email"
                    id="email"
                    :class="{'border-red-900': errors.email}"
                )
                div.text-red-900.mt-1(v-if="errors.email") {{ errors.email }}
            div.mb-3
                label.form-label(for="password") Пароль
                input.form-input(
                    v-model="form.password"
                    type="password"
                    placeholder="Введите пароль"
                    name="password"
                    id="password"
                    :class="{'border-red-900': errors.password}"
                )
                div.text-red-900.mt-1(v-if="errors.password") {{ errors.password }}
            div.flex.justify-between.mt-6
                a.btn(
                    href="/signup"
                ) Нет аккаунта?
                button.btn-primary.right-0(type="submit") Войти
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let props = defineProps({
    errors: Object,
});

let form = useForm({
    email: "",
    password: "",
});

let submit = () => {
    form.post("/login", form);
};
</script>
