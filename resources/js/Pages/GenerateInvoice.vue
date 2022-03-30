<template>
    <invoice-layout>
        <div>
            <div class="flex justify-between items-center mb-4">
                <span class="text-gray-600 font-bold text-xl">
                    {{ currentStep }}
                </span>
                <button
                    type="button"
                    class="inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                >
                    <UploadIcon class="w-4 h-4 mr-1" /> Upload Data
                </button>
            </div>
            <!--<span class="divider" />-->
            <div class="space-y-4 py-2">
                <select-template
                    v-if="currentStepCount === 1"
                    @mounted="
                        (val) => {
                            this.currentStep = val
                        }
                    "
                    @selected="
                        (val) => {
                            this.template = val
                        }
                    "
                />
                <form-layout
                    v-if="currentStepCount === 2"
                    @mounted="
                        (val) => {
                            this.currentStep = val
                        }
                    "
                ></form-layout>
            </div>
            <!--<span class="divider" />-->
            <div class="flex justify-end mt-4">
                <button
                    @click="proceed"
                    :disabled="!template"
                    class="default-btn"
                >
                    Proceed <ArrowCircleRightIcon class="w-5 h-5 ml-2" />
                </button>
            </div>
        </div>
        <template v-slot:side-bar>
            <div class="space-y-4">
                <select-color-scheme />
                <set-discount />
                <invoice-actions />
            </div>
        </template>
    </invoice-layout>
</template>

<script>
import InvoiceLayout from '../Layouts/InvoiceLayout'
import SelectTemplate from '../components/shared/SelectTemplate'
import SelectColorScheme from '../components/shared/SelectColorScheme'
import InvoiceActions from '../components/shared/InvoiceActions'
import { UploadIcon } from '@heroicons/vue/outline'
import { ArrowCircleRightIcon } from '@heroicons/vue/solid'
import SetDiscount from '../components/shared/SetDiscount'
import { ref } from 'vue'
import FormLayout from '../Layouts/FormLayout'

export default {
    name: 'GenerateInvoice',
    components: {
        FormLayout,
        SetDiscount,
        InvoiceActions,
        SelectColorScheme,
        SelectTemplate,
        UploadIcon,
        InvoiceLayout,
        ArrowCircleRightIcon,
    },
    setup() {
        const currentStep = ref('')
        const currentStepCount = ref(2)
        const template = ref(null)

        const proceed = () => {
            if (currentStep.value === 'Select Template') {
                currentStepCount.value = 2
                console.log(template.value)
            }
        }

        return {
            currentStep,
            template,
            proceed,
            currentStepCount,
        }
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
