<template>
    <section class="mb-5">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body card-background">
                                <h5 class="card-title mb-0">
                                    Wszystkie zamówienia
                                </h5>
                                <p class="card-stat">
                                    {{ orders }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <h5 class="card-title mb-0">
                                    Zamówienia oczekujące
                                </h5>
                                <p class="card-stat">
                                    {{ pendingOrders }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <h5 class="card-title mb-0">
                                    Zamówienia na 24h
                                </h5>
                                <p class="card-stat">
                                    {{ last24hOrders }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <h5 class="card-title mb-0">
                                    Zamówienia na 30 dni
                                </h5>
                                <p class="card-stat">
                                    {{ lastWeekOrders }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            orders: 0,
            pendingOrders: 0,
            last24hOrders: 0,
            today: 0,
            registers: 0,
            url: "",
        };
    },
    created() {
        const p = new Promise((resolve, reject) => {})
            .then((result) => console.log(`Success ${result}`))
            .catch((result) => console.log(`Error ${result}`));

        this.url = process.env.MIX_APP_URL;
        this.fetchApi();
    },

    methods: {
        async fetchApi() {
            const oneDay = 24 * 60 * 60 * 1000;
            const lastMonth = 30 * 24 * 60 * 60 * 1000;

            const responseAllOrdersReq = await axios.get(
                this.url + "/api/orders/all"
            );

            const [responseAllOrders] = await Promise.all([
                responseAllOrdersReq,
            ]);

            this.orders = responseAllOrders.data.length;

            this.pendingOrders = responseAllOrders.data.filter(
                (orders) => orders.status === 1
            ).length;

            this.last24hOrders = responseAllOrders.data.filter(
                (orders) => Date.now() - new Date(orders.date_add) < oneDay
            ).length;

            this.lastWeekOrders = responseAllOrders.data.filter(
                (orders) => Date.now() - new Date(orders.date_add) < lastMonth
            ).length;
        },
    },
};
</script>

