<template>
    <Layout>
        <h1>Hello, {{ title }}</h1>
        <div>
            <Link href="/about" as="button">About</Link>
        </div>
    </Layout>
</template>

<style>

</style>

<script>
import { Link } from '@inertiajs/inertia-vue3';

import Layout from '../Layout/Layout.vue';  

    export default{
        props: ['title'],
        components: {
            Link,
            Layout
        }
    }

    
</script>