<template>
    <div>
        <Head :title="title"/>

        <jet-banner/>

        <div class="min-h-screen bg-gray-100">
            <div class="flex justify-center">

                <!-- Page Content -->
                <div style="width: 50%;">
                    <slot></slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {defineComponent} from 'vue'
import {Head, Link} from '@inertiajs/inertia-vue3';
import Sidebar from "./Sidebar";
import Top from "./Top";

export default defineComponent({
    props: {
        title: String,
    },

    components: {
        Top,
        Sidebar,
        Head,
        Link,
    },

    data() {

    },

    methods: {}
})
</script>
