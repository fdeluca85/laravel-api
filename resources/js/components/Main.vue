<template>
  <main>
      <h2>Lista Post</h2>
      <ul>
          <li v-for="posts in posts" :key="posts.id">
               <h3>{{post.title}}</h3>
          </li>
      </ul>
  </main>
</template>

<script>

export default {
    name:"Main",
    data(){
        return{
            posts:[]
        }
    },
    created(){
        axios.get('/api/posts')
            .then( (response) => {
                this.posts = response.data;
            })
    }
}
</script>

<style>

</style>