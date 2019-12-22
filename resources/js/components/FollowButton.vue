<template>
    <div>
        <div class="row" @click="likePost">
            <button class="btn btn-success">
                Like
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        //props: ['postId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            likePost() {
                axios.post('/like/1') //+ this.postId)
                .then(response=>{
                    alert(response.data);
                });
            }
        }
    }
</script>
