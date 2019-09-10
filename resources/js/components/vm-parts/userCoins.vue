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
                            <p class="card-text" v-if="userCoins">Remains: {{ userCoins.one_rub }}</p>
                            <button v-on:click="insertCoin('one_rub')" class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">2 RUB</h5>
                            <p class="card-text" v-if="userCoins">Remains: {{ userCoins.two_rub }}</p>
                            <button v-on:click="insertCoin('two_rub')" class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">5 RUB</h5>
                            <p class="card-text" v-if="userCoins">Remains: {{ userCoins.five_rub }}</p>
                            <button v-on:click="insertCoin('five_rub')" class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 p-0">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">10 RUB</h5>
                            <p class="card-text" v-if="userCoins">Remains: {{ userCoins.ten_rub }}</p>
                            <button v-on:click="insertCoin('ten_rub')" class="btn btn-primary">Insert</button>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 p-0 ml-auto">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Total sum in VM</h5>
                            <p class="card-text">{{ tempSum }} RUB</p>
                            <button href="#" class="btn btn-primary">Get money</button>
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
                userCoins: null,
                tempSum: null
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
                        this.userCoins = response.data;
                    })
                ;
            },
            insertCoin(value){
                let token = this.getApiToken();
                axios
                    .get('/api/insert-coin?value='+value+'&api_token='+token)
                    .then(response => {
                        this.userCoins = response.data;
                    })
                    .then(res => {
                        this.getUserCoins();
                        this.getInsertedMoney();
                    });
            }
            ,
            getInsertedMoney(){
                let token = this.getApiToken();
                axios
                    .get('/api/get-vm-temp-sum?api_token='+token)
                    .then(response => {
                        console.log(response.data);
                        if(response.data){
                            let data = response.data;
                            this.tempSum = data.one_rub + data.two_rub*2 + data.five_rub*5 + data.ten_rub*10;
                        }
                    })
                ;
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