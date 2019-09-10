<template>
    <div>
        <div class="container">
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

            <div class="row justify-content-center">
                <div class="col-md-8" id="vm_goods">
                    <div class="border rounded">
                        <div class="row d-flex justify-content-around mt-4">
                            <div class="card card-coffee" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/images/coffee.gif" alt="Coffee">
                                <div class="card-body">
                                    <h5 class="card-title">Coffee</h5>
                                    <p class="card-text">Cost: 20</p>
                                    <p class="card-text">Remains: 10</p>
                                    <a href="#" class="btn btn-primary">Buy</a>
                                </div>
                            </div>
                            <div class="card card-latte" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/images/latte.gif" alt="latte">
                                <div class="card-body">
                                    <h5 class="card-title">Latte</h5>
                                    <p class="card-text">Cost: 20</p>
                                    <p class="card-text">Remains: 10</p>
                                    <a href="#" class="btn btn-primary">Buy</a>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4 mb-4 d-flex justify-content-around">
                            <div class="card card-juice" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/images/tea.gif" alt="tea">
                                <div class="card-body">
                                    <h5 class="card-title">Tea</h5>
                                    <p class="card-text">Cost: 20</p>
                                    <p class="card-text">Remains: 10</p>
                                    <a href="#" class="btn btn-primary">Buy</a>
                                </div>
                            </div>
                            <div class="card card-tea" style="width: 18rem;">
                                <img class="card-img-top" src="/storage/images/juice.gif" alt="juice">
                                <div class="card-body">
                                    <h5 class="card-title">Juice</h5>
                                    <p class="card-text">Cost: 20</p>
                                    <p class="card-text">Remains: 10</p>
                                    <a href="#" class="btn btn-primary">Buy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 border rounded" id="vm_coins">
                    <div class="card card-coin mt-4 mb-4" >
                        <div class="card-body">
                            <h5 class="card-title text-center">Coins in VM</h5>
                        </div>
                    </div>

                    <div class="card card-coin">
                        <div class="card-body">
                            <h5 class="card-title">1 RUB</h5>
                            <p class="card-text">Remains: 100</p>
                        </div>
                    </div>
                    <div class="card card-coin">
                        <div class="card-body">
                            <h5 class="card-title">2 RUB</h5>
                            <p class="card-text">Remains: 100</p>
                        </div>
                    </div>
                    <div class="card card-coin">
                        <div class="card-body">
                            <h5 class="card-title">5 RUB</h5>
                            <p class="card-text">Remains: 100</p>
                        </div>
                    </div>
                    <div class="card card-coin">
                        <div class="card-body">
                            <h5 class="card-title">10 RUB</h5>
                            <p class="card-text">Remains: 100</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "VendingMachine"
    }
</script>

<style scoped>

</style>