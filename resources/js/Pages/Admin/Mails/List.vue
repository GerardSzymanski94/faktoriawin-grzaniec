<template>
    <AppLayout>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Wszystkie maile</h3>
                    </div>

                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Status</th>
                        <th scope="col">Typ</th>
                        <th scope="col">Data wysłania</th>
                        <th scope="col">Email</th>
                        <th scope="col">Temat</th>
                        <th scope="col">Treść</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <list-item v-for="mail in mails" v-bind="mail">

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
        mails: Array,
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
