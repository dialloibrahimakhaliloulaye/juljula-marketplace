<template>
    <div>
        <p>
           <button class="btn btn-success" v-if="showBtn" @click.prevent="showPhoneBtn()"><i class="fas fa-phone-volume"></i> Afficher Téléphone</button>
        </p>
        <p v-if="showPhoneNumber">
            <button class="btn btn-success">{{phoneNumber}}</button>
        </p>
    </div>
</template>

<script>
    export default {
        props:['phoneNumber'],
        data(){
            return{
                showPhoneNumber:false,
                showBtn:true
            }
        },
        methods:{
            showPhoneBtn(){
                this.showPhoneNumber=true
                this.showBtn=false
            }
        }
    }
</script>
