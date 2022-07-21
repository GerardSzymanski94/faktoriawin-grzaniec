<template>
    <tr>
        <th scope="row">
            <span v-if="status == 1" class="text-green">Wysłany</span>
            <span v-else-if="status == 2" class="text-red">Nie wysłany</span>
            <span v-else>Brak</span>
        </th>
        <th scope="row">
            <span v-if="type == 1" class="text-green">Kontakt</span>
            <span v-else-if="type == 2" class="text-blue">Konkurs</span>
            <span v-else>Brak</span>
        </th>
        <th scope="row">
            {{ created_at }}
        </th>
        <td>
            {{ email }}
        </td>
        <td>
            {{ subject }}
        </td>
        <td>
            {{ message }}
        </td>
        <td>
            <a :href="'/administracja/mail/show/'+id" class="btn btn-primary">PODGLĄD</a>
        </td>

    </tr>
</template>

<script>
export default {
    props: {
        email: String,
        type: Number,
        message: String,
        subject: String,
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
