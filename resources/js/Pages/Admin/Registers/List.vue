<template>
    <AppLayout>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">{{ title }}</h3>
                    </div>
                    <div class="col text-right">
                        <a v-bind:href="'/administracja/export/all'" class="btn btn-sm btn-success">Export wszystkich</a>
                    </div>
                    <div class="col text-right">
                        <a v-bind:href="'/administracja/export/winners'" class="btn btn-sm btn-success">Export zwycięzców</a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Nagroda</th>
                        <th scope="col">ID</th>
                        <th scope="col">Email</th>
                        <th scope="col">Numer paragonu</th>
                        <th scope="col">Data paragonu</th>
                        <th scope="col">Data zgłoszenia</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <list-item v-for="register in registers" v-bind="register">

                    </list-item>

                    </tbody>

                </table>
                <hr>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import ListItem from "./ListItem";
import {Head} from "@inertiajs/inertia-vue3";
import AppLayout from "../../../Layouts/AppLayout";

export default {
    components: {
        ListItem,
        Head,
        AppLayout
    }, props: {
        registers: Array,
        title: String
    },
    data() {
        return {
            url: [],
        }

    },
    created() {
        const p = new Promise((resolve, reject) => {

        })
            .then(result => console.log(`Success ${result}`))
            .catch(result => console.log(`Error ${result}`));

        this.url = process.env.MIX_APP_URL;
    },
    mounted() {
        // Fetch initial results

    },
    methods: {
        // Our method to GET results from a Laravel endpoint

    }


}
</script>
