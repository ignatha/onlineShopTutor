<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage()

</script>
<template>
    <div>
        <h1 class="text-red-300">Ini adalah template yang dibuat dari vue {{ page.props.room }}</h1>
    </div>
</template>
