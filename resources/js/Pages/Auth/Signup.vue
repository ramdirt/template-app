<template lang="pug">
Head
    title Зарегистрироваться
main.grid.place-items-center.min-h-screen
    section.bg-white.p-8.rounded-xl.max-w-md.mx-auto.border
        h1.text-2xl.mb-1 Зарегистрироваться
        form.max-w-md.mx-auto.mt-6(@submit.prevent="submit")
            div.mb-3
                label.form-label(for="name") Имя
                input.form-input(
                    v-model="form.name"
                    placeholder="Введите имя"
                    type="name"
                    name="name"
                    id="name"
                )
            div.mb-3
                label.form-label(for="email") Почта
                input.form-input(
                    v-model="form.email"
                    type="email"
                    placeholder="Введите почту"
                    name="email"
                    id="email"
                )
            div.mb-3
                label.form-label(for="password") Пароль
                input.form-input(
                    v-model="form.password"
                    placeholder="Введите пароль"
                    type="password"
                    name="password"
                    id="password"
                )
            div.mb-3
                label.form-label(for="password_confirmation") Повторно введите пароль
                input.form-input(
                    v-model="form.password_confirmation"
                    placeholder="Введите повторно пароль"
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                )
            div.flex.justify-between.mt-8
                a.btn(
                    href="/login"
                ) Есть аккаунт?
                button.btn-primary.right-0(type="submit") Отправить
</template>

<script>
export default {
    layout: null,
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

let form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

let submit = () => {
    form.post("/signup", form);
};
</script>
