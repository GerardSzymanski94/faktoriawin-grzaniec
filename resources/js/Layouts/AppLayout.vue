<template>
    <div>
        <Head :title="title"/>

        <jet-banner/>

        <div class="min-h-screen bg-gray-100">
            <top></top>
            <div style="display: flex">
                <sidebar></sidebar>

                <!-- Page Content -->
                <div style="float: left; width: 100%;">
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

    methods: {

    }
})
</script>
