<template>
    <div class="col-md-12 user_wallet mb-4" id="user_coins">
        <div class="border rounded">
            <button type="button" v-on:click="returnToInitialValues" class="btn btn-primary btn-lg btn-block">Return to initial values</button>
        </div>
    </div>
</template>

<script>
    export default {
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
            returnToInitialValues(){
                let token = this.getApiToken();
                axios
                    .get('/api/return?api_token='+token)
                    .then(response => {
                        this.products = response.data;
                        window.location.reload();
                    })
                ;
            },
        },
        name: "returnBlock"
    }
</script>

<style scoped>

</style>