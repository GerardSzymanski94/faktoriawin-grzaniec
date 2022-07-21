<template>
    <tr>
        <th scope="row">
            Brak
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
            <a class="btn-sm btn-primary" v-bind:href="'administracja/show/'+id">Szczegóły</a>
        </td>

    </tr>
</template>

<script>
export default {
    props: {
        email: String,
        phone: String,
        bill_number: String,
        shop: String,
        bill_date: String,
        type: Number,
        prize: Number,
        status: Number,
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
