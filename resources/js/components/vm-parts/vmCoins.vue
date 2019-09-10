<template>
    <div class="col-md-3 border rounded" id="vm_coins">
        <div class="card card-coin mt-4 mb-4" >
            <div class="card-body">
                <h5 class="card-title text-center">Coins in VM</h5>
            </div>
        </div>

        <div class="card card-coin">
            <div class="card-body">
                <h5 class="card-title">1 RUB</h5>
                <p class="card-text">Remains: {{ vmOneRub }}</p>
            </div>
        </div>
        <div class="card card-coin">
            <div class="card-body">
                <h5 class="card-title">2 RUB</h5>
                <p class="card-text">Remains: {{ vmTwoRub }}</p>
            </div>
        </div>
        <div class="card card-coin">
            <div class="card-body">
                <h5 class="card-title">5 RUB</h5>
                <p class="card-text">Remains: {{ vmFiveRub }}</p>
            </div>
        </div>
        <div class="card card-coin">
            <div class="card-body">
                <h5 class="card-title">10 RUB</h5>
                <p class="card-text">Remains: {{ vmTenRub }}</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                vmOneRub: null,
                vmTwoRub: null,
                vmFiveRub: null,
                vmTenRub: null,
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
            getVMCoins(){
                let token = this.getApiToken();
                axios
                    .get('/api/get-vm-coins?api_token='+token)
                    .then(response => {
                        this.vmOneRub = response.data.one_rub;
                        this.vmTwoRub = response.data.two_rub;
                        this.vmFiveRub = response.data.five_rub;
                        this.vmTenRub = response.data.ten_rub;
                    })
                ;
            },
        },
        created: function() {
            this.getVMCoins();
        },
        name: "vmCoins"
    }
</script>

<style scoped>

</style>