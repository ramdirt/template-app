<template lang="pug">
section.p-3.py-6.bg-gray-800
  header.flex.justify-between.container.max-w-screen-xl.mx-auto
    .flex.items-center
      Link(href="/").font-bold.text-lg.text-white Шаблон
    the-nav
</template>

<script setup>
import TheNav from "./TheNav";
import TheNavLink from "./TheNavLink";
import { defineAsyncComponent, computed } from "vue";
import { usePage } from "@inertiajs/inertia-vue3";

const auth = computed(() => usePage().props.value.auth);
</script>
