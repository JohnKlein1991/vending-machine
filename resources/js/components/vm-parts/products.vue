<template>
    <div class="col-md-8" id="vm_goods">
        <div class="border rounded">
            <div class="row d-flex justify-content-around">
                <div class="card my-4" v-for="product in products" style="width: 18rem;">
                    <div class="row">
                        <img class="card-img-top" v-bind:src="getSrc(product.title)" alt="Coffee">
                        <div class="card-body">
                            <h5 class="card-title">{{ product.title }}</h5>
                            <p class="card-text">Cost: {{ product.cost }}</p>
                            <p class="card-text">Remains: {{ product.remains }}</p>
                            <button v-on:click="buyProduct(product.title)" class="btn btn-primary">Buy</button>
                        </div>
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
            buyProduct(title){
                let token = this.getApiToken();
                axios
                    .get('/api/buy-product?product='+title+'&api_token='+token)
                    .then(response => {

                    })
                    .then(res => {
                       this.getProductsInfo();
                    });
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