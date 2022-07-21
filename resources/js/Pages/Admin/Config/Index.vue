<template>
    <AppLayout>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Konfiguracja konkursu</h3>
                    </div>

                    <div class="col text-right">
                        <a href="javascript:history.back()" class="btn btn-sm btn-primary"> Wstecz</a>
                    </div>
                    <!--<div class="col text-right">
                        <a :href="url+'/administracja/edit/'+register.id" class="btn btn-sm btn-success">Edytuj</a>
                    </div>-->
                </div>
            </div>
            <div v-if="success" class="alert alert-success">Zaktualizowano konfigurację</div>
            <div class="table-responsive">
                <!-- Projects table -->
                <form action="/administracja/config/store" method="post">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">Konfiguracja</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <th scope="row">
                                Data odsłonięcia strony
                            </th>
                            <td>
                                <input type="datetime-local" v-model="showSiteInput" name="show_site">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Data ukrycia strony
                            </th>
                            <td>
                                <input type="datetime-local" v-model="hideSiteInput" name="hide_site">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Data odsłonięcia formularza
                            </th>
                            <td>
                                <input type="datetime-local" v-model="startInput" name="start">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Data ukrycia formularza
                            </th>
                            <td>
                                <input type="datetime-local" v-model="stopInput" name="stop">
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                Zapisz
                            </th>
                            <td>
                                <input class="btn-sm btn-primary" style="background-color: #007bff" type="submit" value="Zapisz">
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </AppLayout>
</template>

<script>

import {Head} from "@inertiajs/inertia-vue3";
import AppLayout from "../../../Layouts/AppLayout";

export default {
    components: {
        Head,
        AppLayout
    },
    props: {
        start: Array,
        stop: Array,
        hideSite: Array,
        showSite: Array,
        success: Boolean,
    },
    data() {
        return {
            url: "",
            startInput: "",
            stopInput: "",
            hideSiteInput: "",
            showSiteInput: "",
        }

    },
    created() {

        this.startInput = this.start.value;
        this.stopInput = this.stop.value;
        this.showSiteInput = this.showSite.value;
        this.hideSiteInput = this.hideSite.value;

        const p = new Promise((resolve, reject) => {

        })
            .then(result => console.log(`Success ${result}`))
            .catch(result => console.log(`Error ${result}`));

        this.url = process.env.MIX_APP_URL;
    }
}

</script>

