<template>
    <div>
       <div>
           <ol >
               <li class="py-4" v-for="post in posts" :key="post.id">
                   {{post.title}}
                   <button @click="takeId(post.id)" class="btn btn-success mx-3">Details</button>
               </li>
           </ol>
       </div>
       <div class="d-flex justify-content-center align-items-center">
           <button :class="{disable: !postsobject.prev_page_url}" @click="go(postsobject.prev_page_url)" class="btn btn-info mx-3">Previous</button>
           <p class="m-0">{{currentPage}}/{{lastPage}}</p>
           <button :class="{disable: !postsobject.next_page_url}" @click="go(postsobject.next_page_url)" class="btn btn-info mx-3">Next</button>
       </div>
    </div>
   </template>
   <script>
   export default {
   name:'PostListComponent',
   computed:{
       posts(){
           return this.postsobject.data;
       },
       currentPage(){
           return this.postsobject.current_page;
       },
       lastPage(){
           return this.postsobject.last_page;
       }
   },
   props: {
       postsobject:Object
   },
   methods:{
       takeId(id){
           this.$emit('showPost', id)
       },
       go(url){
           this.$emit('requestPage', url)
       }
   }
   }
   </script>
   <style scoped lang="scss">
   button.disable{
       opacity: 0.5;
       pointer-events: none;
       cursor: none;
   }
   </style>
