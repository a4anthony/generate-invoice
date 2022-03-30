<template>
    <div>
        <label class="font-semibold text-gray-400" :class="labelClass"
            >Logo</label
        >
        <div
            @click="$refs.fileRef.click()"
            :class="imageBlob ? 'justify-center' : 'justify-center'"
            class="border rounded-md border-gray-100 bg-gray-50 flex items-center h-16 w-40 cursor-pointer space-x-2 mt-1"
        >
            <img
                v-if="imageBlob"
                :src="imageBlob"
                class="h-10 w-auto"
                alt="your_logo"
            />
            <input
                type="file"
                class="hidden"
                ref="fileRef"
                accept="image/*"
                @change="uploadFile"
            />
        </div>
    </div>
</template>

<script>
import { computed, ref } from 'vue'
import { useStore } from 'vuex'

export default {
    name: 'LogoUpload',
    props: {
        labelClass: {
            type: String,
            default: '',
        },
    },
    setup() {
        const store = useStore()
        const fileRef = ref(null)
        const imageBlob = computed(() => store.state.settings.logo)
        const imageUrl = ref(null)
        const uploadFile = (e) => {
            const image = e.target.files[0]
            imageUrl.value = URL.createObjectURL(image)
            const reader = new FileReader()
            reader.readAsDataURL(image)
            reader.onload = (e) => {
                // imageBlob.value = e.target.result
                store.commit('settings/setLogo', e.target.result)
                console.log(imageBlob.value)
            }
        }
        return {
            fileRef,
            uploadFile,
            imageBlob,
            imageUrl,
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
