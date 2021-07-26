<template>
    <div class="form-inline form-group mt-1">
        <div class="col-md-4">
            <select class="form-control" name="category_id" v-model="category" @change="getSubcategories">
                <option value="">Choisir la catégorie</option>
                <option v-for="data in categories" :value="data.id" :key="data.id">{{data.name}}</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="subcategory_id" v-model="subcategory" @change="getChildcategories">
                <option value="">Choisir la sous-catégorie</option>
                <option v-for="data in subcategories" :value="data.id" :key="data.id">{{data.name}}</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" name="childcategory_id" >
                <option value="">Choisir la sous sous-catégorie</option>
                <option v-for="data in childcategories" :value="data.id" :key="data.id">{{data.name}}</option>
            </select>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            category:0,
            categories:[],
            subcategory:0,
            subcategories:[],
            childcategories:[]
        }
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        getCategories(){
            axios.get('/api/category').then((response)=>{
                this.categories=response.data
            }).bind(this)
        },
        getSubcategories(){
            //alert(this.category)
            axios.get('/api/subcategory', {params:{category_id:this.category}})
                .then((response)=>{
                    this.subcategories=response.data
            }).bind(this)
        },
        getChildcategories(){
            axios.get('/api/childcategory', {params:{subcategory_id:this.subcategory}})
                .then((response)=>{
                    this.childcategories=response.data
                }).bind(this)
        }
    }
}
</script>
