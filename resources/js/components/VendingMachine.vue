<template>
    <div>
        <div class="container">
            <userCoins></userCoins>
            <div class="row justify-content-center">
                <products></products>
                <vmCoins></vmCoins>
            </div>
            <returnBlock></returnBlock>
        </div>
    </div>
</template>

<script>
    import userCoins from './vm-parts/userCoins';
    import vmCoins from './vm-parts/vmCoins';
    import products from './vm-parts/products';
    import returnBlock from './vm-parts/returnBlock';

    import axios from 'axios';

    export default {
        components: {
            userCoins,
            products,
            vmCoins,
            returnBlock
        },
        methods: {

        },
        name: "VendingMachine"
    }
</script>

<style scoped>

</style>