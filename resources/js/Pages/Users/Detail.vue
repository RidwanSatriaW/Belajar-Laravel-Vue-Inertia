<template>
    <div>
        <h1>{{ title }}</h1>
        <ul>
            <li>
                <h3>{{user.name}}</h3>
                <p>Email : <strong>{{user.email}}</strong></p>
                <p>{{user.created_at}}</p>
                <Link href="/users">Kembali</Link><br>
                <a href="" @click.prevent="deleteuser">Delete</a><br>
                <Link :href="`/users/${user.id}/edit`">edit</Link>
            </li>
        </ul>
        
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';


     export default{
        props: {
            title:String,
            user:Object
        },
        components:{
            Link
        },
        methods:{
            deleteuser(){
                if(confirm('data user ingin dihapus?')){
                    this.$inertia.delete('/users/' + this.user.id)
                }else{
                    return false
                }
                
            }
        }
    }
</script>