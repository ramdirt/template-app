<template lang="pug">
nav.mr-3
    ul.flex.space-x-6
        li(v-if="auth")
            the-nav-link(href="/", :active="$page.url == '/'") Главная     
        li(v-if="auth")
            the-nav-link(href="/helper", :active="$page.url == '/helper'") Помощь       
        li(v-if="auth")
            Link(
                href="/logout",
                method="post",
                as="button"
                class="text-white hover:underline" 
            ) Выйти
        li(v-else)
            the-nav-link(href="/login", :active="$page.component === 'Login'") Войти
</template>

<script setup>
import TheNavLink from "./TheNavLink";
import { computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const auth = computed(() => usePage().props.value.auth);
</script>
