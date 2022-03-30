<template>
    <div>
        <div class="pt-3 sm:pt-12" :class="container">
            <div class="flex justify-between items-center">
                <h1 :class="headerColor" class="text-2xl font-bold">Invoice</h1>
                <logo-upload
                    :label-class="`default-form-label ${labelColor}`"
                />
            </div>
            <span class="divider mt-3 mb-4" :class="`bg-${color}-300`"></span>
        </div>
        <div
            :class="container"
            class="w-full lg:w-4/5 grid grid-cols-1 sm:grid-cols-2 gap-4 pb-10"
        >
            <div>
                <label for="" class="default-form-label" :class="labelColor"
                    >Invoice Number.</label
                >
                <input
                    type="text"
                    v-model="form.invoice_no"
                    class="default-form-input"
                    placeholder="00001"
                />
            </div>
            <div>
                <label for="" class="default-form-label" :class="labelColor"
                    >Invoice Date.</label
                >
                <input
                    type="date"
                    v-model="form.invoice_date"
                    :placeholder="new Date().toLocaleDateString()"
                    class="default-form-input"
                />
            </div>
            <!--billed to-->
            <div>
                <label for="" class="default-form-label" :class="labelColor"
                    >Billed To</label
                >
                <billed-to-info
                    @click="
                        () => {
                            this.billerTitle = 'Add Recipient'
                            this.showBiller = true
                        }
                    "
                    biller-title="Recipient"
                />
            </div>
            <div>
                <label for="" class="default-form-label" :class="labelColor"
                    >Billed By</label
                >
                <billed-to-info
                    @click="
                        () => {
                            this.billerTitle = 'Add Sender'
                            this.showBiller = true
                        }
                    "
                    biller-title="Sender"
                />
            </div>
        </div>
        <div class="h-44" :class="bgColor">
            <div class="grid grid-cols-5 pt-10" :class="container">
                <div class="col-span-3">
                    <span class="default-form-label" :class="labelColor"
                        >Description</span
                    >
                </div>
                <div>
                    <span
                        class="default-form-label text-center"
                        :class="labelColor"
                    >
                        Qty
                    </span>
                </div>
                <div>
                    <span
                        class="default-form-label text-center"
                        :class="labelColor"
                        >Amount</span
                    >
                </div>
            </div>
            <div class="flex justify-center mt-8">
                <button
                    class="border-2 border-dashed px-3 py-2 rounded-md border-gray-400 inline-flex items-center"
                >
                    <PlusCircleIcon class="w-5 h-5 mr-2" /> Add Item
                </button>
            </div>
            <!--<div-->
            <!--    class="grid grid-cols-5 pt-4 gap-3 sm:gap-6"-->
            <!--    :class="container"-->
            <!--&gt;-->
            <!--    <div class="col-span-3">-->
            <!--        <input-->
            <!--            type="text"-->
            <!--            v-model="form.invoice_no"-->
            <!--            class="default-form-input"-->
            <!--            placeholder="00001"-->
            <!--        />-->
            <!--    </div>-->
            <!--    <div>-->
            <!--        <input-->
            <!--            type="text"-->
            <!--            v-model="form.invoice_no"-->
            <!--            class="default-form-input"-->
            <!--            placeholder="00001"-->
            <!--        />-->
            <!--    </div>-->
            <!--    <div>-->
            <!--        <input-->
            <!--            type="text"-->
            <!--            v-model="form.invoice_no"-->
            <!--            class="default-form-input"-->
            <!--            placeholder="00001"-->
            <!--        />-->
            <!--    </div>-->
            <!--</div>-->
        </div>
        <div class="h-12 mt-4" :class="bgColor"></div>
        <div class="mb-20"></div>
        <modal-container
            :open="showBiller"
            width="max-w-2xl"
            :title="billerTitle"
        >
            <biller ref="billerRef" />
            <template v-slot:action-btn>
                <button
                    type="button"
                    class="default-btn sm:ml-3"
                    @click="addBiller"
                >
                    {{ billerTitle }}
                </button>
            </template>
        </modal-container>
    </div>
</template>

<script>
import { useStore } from 'vuex'
import { computed, ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import ModalContainer from '../modal/ModalContainer'
import BilledTo from './helpers/BilledTo'
import BilledToInfo from './helpers/BilledToInfo'
import LogoUpload from './helpers/LogoUpload'
import Biller from './helpers/Biller'
import { PlusCircleIcon } from '@heroicons/vue/solid'
export default {
    name: 'DefaultForm',
    components: {
        Biller,
        LogoUpload,
        BilledToInfo,
        BilledTo,
        ModalContainer,
        PlusCircleIcon,
    },
    setup() {
        const store = useStore()
        const form = useForm({
            invoice_no: '',
            invoice_date: null,
            billed_to: computed(() => store.state.settings.billedTo),
            billed_by: computed(() => store.state.settings.billedBy),
        })
        const color = computed(() => store.state.settings.colorName)
        const showBiller = ref(false)
        const billerRef = ref(null)
        const billerTitle = ref('')

        const addBiller = () => {
            console.log(billerRef.value.form)
            showBiller.value = false
            if (billerTitle.value.includes('Recipient')) {
                // form.billed_to = billerRef.value.form
                store.commit('settings/setBilledTo', billerRef.value.form)
            } else if (billerTitle.value.includes('Sender')) {
                // form.billed_by = billerRef.value.form
                store.commit('settings/setBilledBy', billerRef.value.form)
            }
        }
        return {
            labelColor: computed(() => `text-${color.value}-500`),
            headerColor: computed(() => `text-${color.value}-700`),
            bgColor: computed(() => `bg-${color.value}-100`),
            form,
            showBiller,
            billerRef,
            addBiller,
            color,
            billerTitle,
            container: 'px-3 sm:px-6 lg:px-10',
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
