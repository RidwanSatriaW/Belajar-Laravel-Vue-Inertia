<template>
    <div>
        <h1>Update</h1>
        <form @submit.prevent="update">
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
           

            <button type="submit">Update</button>
        </form>
    </div>
</template>

<script>
    export default{
        data(){
            return{
                form:{
                    name:this.user.name,
                    email:this.user.email,
                }
            }
        },
        methods:{
            update(){
                this.$inertia.put('/users/' +this.user.id, this.form)
            }
        },
        props:{
            errors: Object,
            user: Object
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