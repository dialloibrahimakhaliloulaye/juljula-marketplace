<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">
            Envoyer un message
        </button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Discuter avec {{sellerName}}

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <textarea v-model="body" cols="30" rows="10" class="form-control" placeholder="ecrivez votre message ici"></textarea>
                        <p v-if="successMessage" style="color: green">Message envoyé</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" @click.prevent="sendMessage()">Envoyer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['sellerName', 'userId', 'receiverId', 'adId'],

        data(){
            return{
                body:'',
                successMessage:false,
            };
        },
        methods:{
            sendMessage(){
                if(this.body==''){
                    alert("vous n'avez rien saisi")
                }
                return;
                axios.post('/send/message',{
                    body:this.body,
                    receiverId:this.receiverId,
                    userId:this.userId,
                    adId:this.adId
                }).then((response)=>{
                    this.body=''
                    this.successMessage=true
                })
            }
        }

    };
</script>
