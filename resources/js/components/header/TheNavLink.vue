<template lang="pug">
Link(
    class="text-white hover:underline"
    :class="{ 'font-bold underline': active }"
) <slot />
</template>

<script setup>
let props = defineProps({
    active: Boolean,
});
</script>
