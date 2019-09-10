<template>
    <div>
        <div class="container">
            <userCoins></userCoins>
            <div class="row justify-content-center">
                <products></products>
                <vmCoins></vmCoins>
            </div>
        </div>
    </div>
</template>

<script>
    import userCoins from './vm-parts/userCoins';
    import vmCoins from './vm-parts/vmCoins';
    import products from './vm-parts/products';
    import axios from 'axios';
    export default {
        components: {
            userCoins,
            products,
            vmCoins
        },
        methods: {

        },
        name: "VendingMachine"
    }
</script>

<style scoped>

</style>