<template>
    <AppLayout>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Podgląd maila</h3>
                    </div>

                    <div class="col text-right">
                        <a href="javascript:history.back()" class="btn btn-sm btn-primary"> Wstecz</a>
                    </div>
                    <!--<div class="col text-right">
                        <a :href="url+'/administracja/edit/'+register.id" class="btn btn-sm btn-success">Edytuj</a>
                    </div>-->
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Mail</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-if="mail.email != null">
                        <th scope="row">
                            Email
                        </th>
                        <td>
                            {{ mail.email }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Data wysłania
                        </th>
                        <td>
                            {{ mail.created_at }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            Status
                        </th>
                        <td v-if="mail.status == 1">
                            Wysłany
                        </td>
                        <td v-if="mail.status ==2">
                            Nie udało się wysłać
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Tytuł
                        </th>
                        <td>
                            {{ mail.subject }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Treść
                        </th>
                        <td v-html="mail.message">

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

export default {
    components: {
        Head,
        AppLayout
    },
    props: {
        mail: Array,
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

