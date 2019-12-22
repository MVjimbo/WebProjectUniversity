<template>
    <div>
        <div @click="likePost">
            <button class="btn btn-success" v-text="buttonText">
                Like
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['postId','likes'],

        mounted() {
            console.log('Component mounted.')
        },

        data: function(){
            return {
                status: this.likes,
            }
        },

        methods: {
            likePost() {
                axios.post('/like/'+this.postId)
                .then(response=>{
                    this.status= ! this.status;
                    console.log(response.data);
                });
            }
        },

        computed:{
            buttonText() {
                return(this.status) ? 'Unlike' : 'Like';
            }
        }
    }
</script>
