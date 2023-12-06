<template>
    <div class="bg-gray-600">
        <h2 class="text-white bg-gray-800"> Lista de libros </h2>
        <ul>
            <li v-for="book in books" :key="book.id">
                {{ book.title }}
            </li>
        </ul>
    </div>
</template>


<script>
    export default{
        data(){
            return{
                books: [],
            }
        },
        mounted(){
            fetch('api/libros')
            .then((response) => response.json())
            .then((data) => {
                this.books = data;
            })
        }
    }
</script>
