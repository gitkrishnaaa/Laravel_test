<template>
    <div class="container">
         <button class="btn btn-primary" @click="followuser" v-text="ButtonText"></button>
    </div>
</template>

<script>
    export default {
        props:['userId','follows'],
        mounted() {
            console.log('Component mounted.')
        },
        data:function(){
           return{
            status:this.follows,
           }
        },
        methods:{
            followuser()
            {
                axios.post('/follow/' +this.userId)
                .then(
                    response=>{
                        this.status=!this.status;
                        console.log(response.data);
                }).catch(errors=>{
                    if(errors.response.status==401){
                        window.location="/login";
                    }
                });
                
            }
        },
        computed:{
            ButtonText(){
                return (this.status)?'Unfollow':'Follow';
            }
        }
    }
</script>
