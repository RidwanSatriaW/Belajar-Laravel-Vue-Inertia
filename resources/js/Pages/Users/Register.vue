<template>
    <div>
        <h1>Register</h1>
        <form @submit.prevent="register">
            <div class="form-group">
                <label >Name</label>
                <input type="text" v-model="form.name">
                <p v-if="errors.name" class="error">{{errors.name}}</p>
            </div>
            <div class="form-group">
                <label >Email</label>
                <input type="text" v-model="form.email">
                <p v-if="errors.email" class="error">{{errors.email}}</p>
            </div>
            <div class="form-group">
                <label >Password</label>
                <input type="password" v-model="form.password">
                <p v-if="errors.password" class="error">{{errors.password}}</p>
            </div>

            <button type="submit">Register</button>
        </form>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                form:{
                    name:'',
                    email:'',
                    password:''
                }
            }
        },
        methods:{
            register(){
                this.$inertia.post('/users', this.form)
            }
        },
        props:{
            errors: Object
        }
    }
</script>

<style>
    .form-group{
        margin-bottom:5px
    }
    .error{
        color:red
    }
</style>