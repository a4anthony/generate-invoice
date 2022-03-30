<template>
    <div class="border border-gray-200 shadow-sm bg-white">
        <default-form v-if="formName === 'default'" />
    </div>
</template>

<script>
import DefaultForm from '../components/shared/forms/DefaultForm'
import { onMounted } from 'vue'
export default {
    name: 'FormLayout',
    components: { DefaultForm },
    props: {
        formName: {
            type: String,
            default: 'default',
        },
    },
    emits: ['mounted'],
    setup(props, { emit }) {
        onMounted(() => {
            emit('mounted', 'Invoice Details')
        })
        return {}
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
