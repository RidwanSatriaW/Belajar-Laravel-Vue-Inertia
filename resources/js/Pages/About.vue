<template>

    <Layout>
        <div>
            <h1>Hello, {{ name }}</h1>
        </div>
    </Layout>
</template>

<script>
    import Layout from '../Layout/Layout.vue';  
    export default{
        props: ['name'],
        components: {
            Layout
        }
    }
</script>

<style>

</style>