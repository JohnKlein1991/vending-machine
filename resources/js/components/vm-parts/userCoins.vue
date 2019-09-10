<template>
    <div class="col-md-12 user_wallet mb-4" id="user_coins">
        <div class="border rounded">
            <div class="card">
                <div class="card-header">
                    Your coins
                </div>
            </div>
            <div class="d-flex flex-row  justify-content-start">
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">1 RUB</h5>
                            <p class="card-text">Remains: 10</p>
                            <a href="#" class="btn btn-primary">Insert</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">2 RUB</h5>
                            <p class="card-text">Remains: 10</p>
                            <a href="#" class="btn btn-primary">Insert</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">5 RUB</h5>
                            <p class="card-text">Remains: 10</p>
                            <a href="#" class="btn btn-primary">Insert</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">10 RUB</h5>
                            <p class="card-text">Remains: 10</p>
                            <a href="#" class="btn btn-primary">Insert</a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 p-0 ml-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total sum in VM</h5>
                            <p class="card-text">0 RUB</p>
                            <a href="#" class="btn btn-primary">Get money</a>
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
            getUserCoins(){
                let token = this.getApiToken();
                axios
                    .get('/api/get-user-coins?api_token='+token)
                    .then(response => {
                        console.log(response.data);
                    })
                ;
            },
            getInsertedMoney(){

            }
        },
        created: function() {
            this.getUserCoins();
            this.getInsertedMoney();
        },
        name: "userCoins"
    }
</script>

<style scoped>

</style>