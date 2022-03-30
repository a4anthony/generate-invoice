<template>
    <div class="flex flex-col bg-gray-100 min-h-screen py-20">
        <Head :title="title" />
        <!--<div class="container w-full mx-auto">-->
        <!--    <h3 class="mb-2 text-gray-600 font-bold text-xl px-4 sm:px-0">-->
        <!--        Generate Invoice-->
        <!--    </h3>-->
        <!--</div>-->
        <div
            class="flex space-x-0 sm:space-x-4 container w-full mx-auto flex-wrap-reverse sm:flex-nowrap"
        >
            <div class="mx-auto w-full sm:w-3/4">
                <!--<div-->
                <!--    class="border border-gray-200 bg-white p-4 sm:px-4 sm:py-2"-->
                <!--&gt;-->
                <slot></slot>
                <!--</div>-->
            </div>
            <div
                class="h-full relative sm:sticky sm:top-20 w-full sm:w-1/4 mb-6 sm:mb-0 flex-none bg-transparent px-4 sm:px-0"
            >
                <slot name="side-bar"></slot>
            </div>
        </div>
    </div>
</template>

<script>
import { defineComponent } from 'vue'
import { Head } from '@inertiajs/inertia-vue3'
import Navbar from '../components/layouts/Navbar'
import FooterBar from '../components/layouts/FooterBar'

export default defineComponent({
    props: {
        title: String,
    },

    components: {
        FooterBar,
        Navbar,
        Head,
    },
})
</script>
