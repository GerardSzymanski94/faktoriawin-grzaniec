<template>
    <tr>
        <th scope="row">
            <status v-bind:prize="prize" v-bind:status="status"></status>
        </th>
        <th scope="row">
            <span v-if="prize == 1" class="text-green">Nagroda Główna</span>
            <span v-else-if="prize == 2" class="text-green">Nagroda I</span>
            <span v-else-if="prize == 3" class="text-green">Nagroda II</span>
            <span v-else-if="prize == 4" class="text-green">Nagroda III</span>
            <span v-else>Brak</span>
        </th>
        <th scope="row">
            {{ id }}
        </th>
        <td>
            {{ email }}
        </td>
        <td>
            {{ bill_number }}
        </td>
        <td>
            {{ bill_date }}
        </td>
        <td>
            {{ created_at }}
        </td>
        <td>
            <a class="btn-sm btn-primary" v-bind:href="url+'/administracja/register/show/'+id">Szczegóły</a>
        </td>

    </tr>
</template>

<script>
import Status from './Status';

export default {
    components: {
        Status
    },
    props: {
        email: String,
        phone: String,
        bill_number: String,
        shop: String,
        bill_date: String,
        type: Number,
        prize: Number,
        prize_name: String,
        status: Number,
        status_name: String,
        created_at: Date,
        id: Number,
    },
    data() {
        return {
            url: [],
        }

    },
    created() {
        this.url = process.env.MIX_APP_URL;
    }
}
</script>
