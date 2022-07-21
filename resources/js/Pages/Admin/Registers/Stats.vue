<template>
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0">Statystyki zgłoszeń</h3>
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
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>

                <tr>
                    <th scope="row">
                        Zarejestrowani dziś
                    </th>
                    <td>
                        {{ today }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        1. tydzień
                    </th>
                    <td>
                        {{ week1 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        2. tydzień
                    </th>
                    <td>
                        {{ week2 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        3. tydzień
                    </th>
                    <td>
                        {{ week3 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        4. tydzień
                    </th>
                    <td>
                        {{ week4 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        5. tydzień
                    </th>
                    <td>
                        {{ week5 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        6. tydzień
                    </th>
                    <td>
                        {{ week6 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        7. tydzień
                    </th>
                    <td>
                        {{ week7 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        8. tydzień
                    </th>
                    <td>
                        {{ week8 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        9. tydzień
                    </th>
                    <td>
                        {{ week9 }}
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        Wszystkie zgłoszenia
                    </th>
                    <td>
                        {{ all }}
                    </td>
                </tr>

                </tbody>
            </table>

        </div>
    </div>
</template>

<script>
export default {
    props: {
        registerid: Number
    },
    data() {
        return {
            today: 0,
            week1: 0,
            week2: 0,
            week3: 0,
            week4: 0,
            week5: 0,
            week6: 0,
            week7: 0,
            week8: 0,
            week9: 0,
            all: 0,
            url: "",
        }

    },
    created() {
        const p = new Promise((resolve, reject) => {

        })
            .then(result => console.log(`Success ${result}`))
            .catch(result => console.log(`Error ${result}`));

        this.url = process.env.MIX_APP_URL;
        axios.get(this.url + "/api/registers/today/").then(response => (this.today = response.data));
        axios.get(this.url + "/api/registers/allcount/").then(response => (this.all = response.data));
        axios.get(this.url + "/api/registers/week/1").then(response => (this.week1 = response.data));
        axios.get(this.url + "/api/registers/week/2").then(response => (this.week2 = response.data));
        axios.get(this.url + "/api/registers/week/3").then(response => (this.week3 = response.data));
        axios.get(this.url + "/api/registers/week/4").then(response => (this.week4 = response.data));
        axios.get(this.url + "/api/registers/week/5").then(response => (this.week5 = response.data));
        axios.get(this.url + "/api/registers/week/6").then(response => (this.week6 = response.data));
        axios.get(this.url + "/api/registers/week/7").then(response => (this.week7 = response.data));
        axios.get(this.url + "/api/registers/week/8").then(response => (this.week8 = response.data));
        axios.get(this.url + "/api/registers/week/9").then(response => (this.week9 = response.data));
    }
}

</script>

