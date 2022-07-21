<template>
    <AppLayout>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Statystyki konkursu</h3>
                    </div>

                    <div class="col text-right">
                        <a href="javascript:history.back()" class="btn btn-sm btn-primary"> Wstecz</a>
                    </div>
                    <!--<div class="col text-right">
                        <a :href="url+'/administracja/edit/'+register.id" class="btn btn-sm btn-success">Edytuj</a>
                    </div>-->
                </div>
            </div>
            <div v-if="success" class="alert alert-success"></div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Statystyki</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">
                            Wszystkie zgłoszenia
                        </th>
                        <td>
                            {{ allRegisters }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            Średnia zgłoszeń na dzień
                        </th>
                        <td>
                            {{ registersPerDay }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            Wszystkich nagród natychmiastowych
                        </th>
                        <td>
                            {{ instantWinsAll }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            Wylosowanych nagród natychmiastowych
                        </th>
                        <td>
                            {{ instantWins }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            Pozostało nagród natychmiastowych
                        </th>
                        <td>
                            {{ instantWinsLeft }}
                        </td>
                    </tr>


                    <tr>
                        <td>Rozkład zgłoszeń na dzień</td>
                        <td>
                            <BarChart v-bind:days="days" v-bind:registersInDays="registersInDays"></BarChart>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import {Head} from "@inertiajs/inertia-vue3";
import AppLayout from "../../../Layouts/AppLayout";
import {Bar} from 'vue-chartjs';
import BarChart from './BarChart';

export default {
    components: {
        Head,
        AppLayout,
        BarChart
    },
    props: {
        success: Boolean,
        allRegisters: Number,
        registersPerDay: Number,
        instantWinsLeft: Number,
        instantWins: Number,
        instantWinsAll: Number,
        registersInDays: Array,
        days: Array,
    },
    data() {
        return {
            url: "",
        }

    },
    created() {

        const p = new Promise((resolve, reject) => {

        })
            .then(result => console.log(`Success ${result}`))
            .catch(result => console.log(`Error ${result}`));

        this.url = process.env.MIX_APP_URL;
    }
}

</script>

