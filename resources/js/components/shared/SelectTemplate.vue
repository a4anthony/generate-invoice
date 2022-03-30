<template>
    <div>
        <!--<span class="font-semibold text-gray-600 block"> Select template</span>-->
        <div
            class="mt-4 grid grid-cols-3 sm:grid-cols-4 sm:grid-cols-5 gap-4 sm:gap-6 sm:gap-8"
        >
            <div v-for="template in templates" :key="`template${template.id}`">
                <button
                    @click="selectedTemplate = template.id"
                    class="w-full border relative"
                    :class="
                        selectedTemplate === template.id
                            ? 'ring-offset-2 ring-4 ring-blue-400'
                            : 'ring-offset-2 hover:ring-4 ring-blue-100 '
                    "
                >
                    <img :src="template.image" :alt="template.name" />
                    <span
                        v-if="template.id === selectedTemplate"
                        class="top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 absolute z-20"
                    >
                        <CheckCircleIcon class="h-8 w-8 text-blue-300" />
                    </span>
                    <span
                        v-if="template.id === selectedTemplate"
                        class="absolute inset-0 bg-black opacity-25 flex justify-center items-center z-10"
                    >
                    </span>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import { CheckCircleIcon } from '@heroicons/vue/solid'
import { ref, computed, watch, onMounted } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default {
    name: 'SelectTemplate',
    components: {
        CheckCircleIcon,
    },
    emits: ['selected', 'mounted'],
    setup(_, { emit }) {
        const templateSelected = ref(false)
        const selectedTemplate = ref(null)
        const templates = computed(() => usePage().props.value.templates)

        watch(
            () => selectedTemplate.value,
            (val) => {
                // console.log(
                //     templates.value.find((template) => template.id === val)
                // )
                emit(
                    'selected',
                    templates.value.find((template) => template.id === val)
                )
            }
        )

        onMounted(() => {
            emit('mounted', 'Select Template')
            selectedTemplate.value = 3
        })

        return {
            templateSelected,
            templates,
            selectedTemplate,
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
