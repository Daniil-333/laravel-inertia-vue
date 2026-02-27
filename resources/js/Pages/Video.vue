<template>
    <Head>
        <title>{{ title }}</title>
    </Head>
    <h1>{{ title }}</h1>
</template>

<script lang="ts">
import { Head } from "@inertiajs/vue3";

export default {
    components: {
        Head
    },
    props: {
        title: String,
        videos: Array
    },
}
</script>

<style scoped></style>
