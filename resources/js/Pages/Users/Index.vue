<template>
    <div>
        <h1>Daftar {{ title }}</h1>
        <Link href="/users/create">Registrasi</Link>

        <div v-if="$page.props.flash.message" class="alert">
            {{ $page.props.flash.message }}
        </div>

        <ul>
            <li v-for=" user in users">
                <p>{{user.name}}</p>
                <Link :href="`/users/${user.id}`">Lihat user</Link>
            </li>
        </ul>
        
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

     export default{
        props: {
            title:String,
            users:Array
        },
        components: {
            Link
        }
    }
</script>