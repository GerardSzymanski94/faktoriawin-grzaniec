<template>
    <AppLayout>
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Szczegóły zgłoszenia</h3>
                    </div>

                    <div class="col text-right">
                        <a href="/administracja" class="btn btn-sm btn-primary"> Wstecz</a>
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
                        <th scope="col">Dane zgłoszenia</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr>
                        <th scope="row">
                            Email
                        </th>
                        <td>
                            {{ register.email }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Numer paragonu
                        </th>
                        <td>
                            {{ register.bill_number }}
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            Data paragonu
                        </th>
                        <td>
                            {{ register.bill_date }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">
                            Odpowiedź
                        </th>
                        <td>
                            {{ register.description }}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Zdjęcie paragonu
                        </td>
                        <td>
                            <img style="max-width: 100%" v-bind:src="this.url+'/storage/'+register.bill_photo">
                        </td>
                    </tr>

                    <tr v-if="register.prize != null">
                        <td>Oznaczony jako zwycięzca</td>
                        <td v-if="register.prize ==1 ">Nagroda główna</td>
                        <td v-if="register.prize ==2 ">Nagroda 1. stopnia</td>
                        <td v-if="register.prize ==3 ">Nagroda 2. stopnia</td>
                        <td v-if="register.prize ==4 ">Nagroda 3. stopnia</td>
                        <td v-if="register.mail_send == 0">
                            <a :href="url+'/administracja/register/undowinner/'+register.id" class="btn-primary btn-sm">
                                Cofnij przyznanie nagrody</a>
                        </td>
                    </tr>
                    <tr v-else>
                        <th scope="row">
                            Oznacz jako zwycięzce
                        </th>
                        <td>
                            <a :href="url+'/administracja/register/winner/'+register.id+'/1'" class="btn-primary btn-sm">Nagroda
                                - Kubek</a>
                        </td>
                        <td>
                            <a :href="url+'/administracja/register/winner/'+register.id+'/2'" class="btn-primary btn-sm">Nagroda
                                - Czapka</a>
                        </td>
                    </tr>

                    <tr v-if="(register.mail_send==0 || register.mail_send==2)  && register.prize!=null">
                        <td>Wyślij email</td>
                        <td>
                            <a :href="url+'/administracja/register/sendmail/'+register.id"
                               class="btn-primary btn-sm">Wyślij</a>
                        </td>
                    </tr>

                    <tr v-if="register.mail_send != 0">
                        <td>Mail wysłany</td>
                        <td v-if="register.mail_send == 1"><span class="text-green">Mail wysłany prawidłowo</span></td>
                        <td v-if="register.mail_send == 2"><span class="text-red">Nie udało się wysłać maila, spróbuj ponownie</span>
                        </td>
                    </tr>

                    </tbody>
                </table>

            </div>
            <div class="table-responsive" v-if="register.status >= 2">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Dane zwycięzcy do weryfikacji</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>


                    <tr v-if="register.status == 2">
                        <td>
                            Akceptacja
                        </td>
                        <td>
                            <a :href="url+'/administracja/register/confirm/'+register.id" class="btn-sm btn-primary">Zaakceptuj</a>
                            <a :href="url+'/administracja/register/reject/'+register.id" class="btn-sm btn-danger" style="margin-left: 40px">Odrzuć</a>
                        </td>
                    </tr>
                    <tr v-else-if="register.status == 3">
                        <td>
                            Potwierdzenie
                        </td>
                        <td>
                            Potwierdzony jako zwycięzca
                        </td>
                        <td>
                            <a :href="url+'/administracja/register/reject/'+register.id" class="btn-sm btn-danger" style="margin-left: 40px">Odrzuć</a>
                        </td>

                    </tr>
                    <tr v-else-if="register.status == 4">
                        <td>
                            Potwierdzenie
                        </td>
                        <td>
                            Odrzucony
                        </td>
                        <td>
                            <a :href="url+'/administracja/register/confirm/'+register.id" class="btn-sm btn-primary">Zaakceptuj</a>
                        </td>

                    </tr>
                    <tr v-if="register.name != null">
                        <td>
                            Imię
                        </td>
                        <td>
                            {{ register.name }}
                        </td>
                    </tr>
                    <tr v-if="register.lastname != null">
                        <td>
                            Nazwisko
                        </td>
                        <td>
                            {{ register.lastname }}
                        </td>
                    </tr>
                    <tr v-if="register.city != null">
                        <td>
                            Adres
                        </td>
                        <td>
                            {{ register.city }} {{ register.zip_code }}, {{ register.street }}
                        </td>
                    </tr>


                    <tr v-if="register.account_number != null">
                        <td>
                            Nr konta
                        </td>
                        <td>
                            {{ register.account_number }}
                        </td>
                    </tr>


                    </tbody>
                </table>

            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Maile wysłane do użytkownika</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="mail in mails">
                        <th scope="row">
                            {{ mail.created_at }}
                        </th>
                        <td>
                            {{ mail.subject }}
                        </td>
                        <td>
                            <a :href="url+'/administracja/mail/show/'+mail.id" class="btn btn-primary">PODGLĄD</a>
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
        register: Array,
        mails: Array
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

