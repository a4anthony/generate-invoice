<template>
    <input v-if="!biller" type="text" class="default-form-input" readonly />
    <div
        v-else
        class="mt-1 bg-gray-50 border border-gray-100 rounded-md px-2.5 py-1.5 cursor-pointer text-gray-600"
    >
        <!--company name-->
        <span class="block text-sm font-semibold">{{
            biller.company_name
        }}</span>
        <!--first & last name-->
        <span class="block text-sm font-semibold"
            >{{ biller.first_name }} {{ biller.last_name }}</span
        >
        <div class="mt-3">
            <span class="block text-sm"
                >{{ biller.address_1 }}{{ biller.address_2 ? ',' : '' }}
                {{ biller.address_2 }}. {{ biller.country }}</span
            >
            <div class="mt-1 space-y-0.5">
                <span class="block text-sm">{{ biller.email }}</span>
                <span class="block text-sm">{{ biller.phone }}</span>
                <span class="block text-sm text-blue-400">{{
                    biller.website
                }}</span>
            </div>
        </div>
    </div>
</template>

<script>
import { useStore } from 'vuex'
import { computed, onMounted, ref, watch } from 'vue'

export default {
    name: 'BilledToInfo',
    props: {
        billerTitle: {
            type: String,
            required: true,
        },
    },

    setup(props) {
        const store = useStore()
        const billedTo = computed(() => store.state.settings.billedTo)
        const billedBy = computed(() => store.state.settings.billedBy)
        const biller = ref(null)

        watch(billedTo, (newVal) => {
            if (props.billerTitle.includes('Recipient')) {
                biller.value = newVal
            }
        })
        watch(billedBy, (newVal) => {
            if (props.billerTitle.includes('Sender')) {
                biller.value = newVal
            }
        })
        onMounted(() => {
            if (props.billerTitle.includes('Recipient')) {
                biller.value = billedTo.value
            }
            if (props.billerTitle.includes('Sender')) {
                biller.value = billedBy.value
            }
        })

        return {
            biller,
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
