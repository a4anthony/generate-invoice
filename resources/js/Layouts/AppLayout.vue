<template>
    <div class="h-screen flex flex-col">
        <Head :title="title" />
        <navbar />
        <div class="flex flex-grow bg-cyan-100">
            <slot></slot>
        </div>
        <footer-bar />
    </div>
</template>

<script>
import { defineComponent } from "vue";
import { Head } from "@inertiajs/inertia-vue3";
import Navbar from "../components/layouts/Navbar";
import FooterBar from "../components/layouts/FooterBar";

export default defineComponent({
    props: {
        title: String,
    },

    components: {
        FooterBar,
        Navbar,
        Head,
    },
});
</script>
