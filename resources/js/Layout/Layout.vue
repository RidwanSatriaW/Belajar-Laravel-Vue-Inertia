<template>
  <main>
    <header>
      <Link href="/home">Home</Link>
      <Link href="/about">About</Link>
      <Link href="/users">User</Link>
    </header>
    <article>
      <slot />
    </article>
    <footer>
      <p>
        Belajar inertia
      </p>
    </footer>
  </main>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Link,
  }
}
</script>