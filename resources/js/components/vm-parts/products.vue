<template>
    <div class="col-md-8" id="vm_goods">
        <div class="border rounded">
            <div class="row d-flex justify-content-around">
                <div class="card my-4" v-for="product in products" style="width: 18rem;">
                    <img class="card-img-top" v-bind:src="getSrc(product.title)" alt="Coffee">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.title }}</h5>
                        <p class="card-text">Cost: {{ product.cost }}</p>
                        <p class="card-text">Remains: {{ product.remains }}</p>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                products: null
            }
        },
        methods: {
            getApiToken(){
                let cookieArray = document.cookie.split(';');
                for (let i = 0; i < cookieArray.length; i++) {
                    if(cookieArray[i].indexOf('api_token=') != -1){
                        let pos = cookieArray[i].indexOf('=') + 1;
                        return cookieArray[i].substr(pos);
                    }
                }
            },
            getProductsInfo(){
                let token = this.getApiToken();
                axios
                    .get('/api/get-products-info?api_token='+token)
                    .then(response => {
                        this.products = response.data;
                    })
                ;
            },
            getSrc(title){
                return "/storage/images/" + title + ".gif";
            }
        },
        created: function() {
            this.getProductsInfo();
        },
        name: "vmProducts"
    }
</script>

<style scoped>

</style>