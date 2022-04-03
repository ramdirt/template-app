<template lang="pug">
Head
    title Template 
    meta(
        type="description"
        content="About my template"
        head-key="description"
    )
the-header
section.container.max-w-screen-xl.mx-auto.p-3
    slot
</template>

<script setup>
import TheHeader from "@/components/header/TheHeader";
</script>
