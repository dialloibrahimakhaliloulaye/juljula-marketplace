<template>
    <div>
        <button v-if="saveBtn" class="btn btn-info" @click.prevent="saveAd()"><i class="fas fa-heart"> Sauvegarder cette annonce</i></button>
        <p v-else class="alert alert-success"> Annonce enregistrée avec succès</p>
    </div>
</template>

<script>
    export default {
        props:['adId', 'userId'],
        data(){
            return{
                saveBtn:true
            }
        },
        methods:{
            saveAd(){
                axios.post('/ad/save', {
                    adId:this.adId,
                    userId:this.userId
                }).then((response)=>{
                    this.saveBtn=false
                }).catch((err)=>{
                    alert('Error !!!')
                })
            }
        }
    }
</script>
