<template>
    <span class="divider" />
    <div class="flex items-center">
        <input
            id="remember-me"
            name="remember-me"
            type="checkbox"
            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
        />
        <label
            for="remember-me"
            class="ml-2 block text-sm text-gray-900 cursor-pointer"
        >
            Get a copy of my data
        </label>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
        <button
            type="button"
            class="inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
            <EyeIcon class="w-4 h-4 mr-1" /> Preview
        </button>
        <button
            type="button"
            class="inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
        >
            <DownloadIcon class="w-4 h-4 mr-1" /> Download
        </button>
    </div>
</template>

<script>
import { DownloadIcon, EyeIcon } from '@heroicons/vue/solid'
export default {
    name: 'InvoiceActions',
    components: {
        DownloadIcon,
        EyeIcon,
    },
}
</script>

<style scoped>
/* (1366x768) WXGA Display */

@media screen and (min-width: 1366px) and (max-width: 1919px) {
}

@media (min-width: 1198px) and (max-width: 1365.9px) {
}

/* Normal desktop :992px. */

@media (min-width: 992px) and (max-width: 1197px) {
}

/* Normal desktop :991px. */

@media (min-width: 768px) and (max-width: 991px) {
}

/* small mobile :576px. */

@media (min-width: 576px) and (max-width: 767px) {
}

/* extra small mobile 320px. */

@media (max-width: 575px) {
}

/* Large Mobile :480px. */

@media only screen and (min-width: 480px) and (max-width: 575px) {
}

@media only screen and (max-width: 575px) and (min-width: 480px) {
}
</style>
