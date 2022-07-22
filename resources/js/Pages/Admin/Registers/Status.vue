<template>
    <span v-if="status == null && prize == null" class="">Brak</span>
    <span v-else-if="status == null && prize != null" class="text-orange">Czeka na wysłanie maila</span>
    <span v-else-if="status == 1 && prize != null" class="text-blue">Czeka na uzupełnienie danych</span>
    <span v-else-if="status == 2" class="text-cyan">Uzupełnił formularz, zweryfikuj</span>
    <span v-else-if="status == 3" class="text-green">Zweryfikowany</span>
    <span v-else-if="status == 4" class="text-red">Odrzucony</span>
    <span v-else>Brak</span>
</template>

<script>

export default {
    props: {
        prize: Number,
        status: Number,
    },
}

</script>

