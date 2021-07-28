<template>
    <div>
        <input type="file" name="first_image" class="custom-file-upload"  @change="onFileChange" accept="image/*">
        <div id="preview">
            <img width="100" height="60" v-if="url" :src="url">
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                url:''
            }
        },
        methods:{
            onFileChange(e){
                const file=e.target.files[0];
                this.url=URL.createObjectURL(file);
            }
        }
    }
</script>
