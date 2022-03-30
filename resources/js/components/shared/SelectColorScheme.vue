<template>
    <div>
        <span class="section-header-sm">Color</span>
        <span class="divider" />
        <div class="flex flex-wrap">
            <button
                v-for="color in colors"
                :key="color"
                :id="`colorScheme_${color}`"
                @click="setColorValue(color)"
                :class="[
                    `bg-${color}-700`,
                    selectedColor === color
                        ? `ring-offset-1 ring-2 ring-${color}-700`
                        : `ring-offset-1 ring-2 ring-gray-100 hover:ring-${color}-700`,
                ]"
                class="h-6 w-6 rounded-full border block m-1"
            ></button>
        </div>
    </div>
</template>

<script>
import { computed, onMounted, ref, watch } from 'vue'
import { useStore } from 'vuex'

const colors = [
    'slate',
    'gray',
    'zinc',
    'neutral',
    'stone',
    'red',
    'orange',
    'amber',
    'yellow',
    'lime',
    'green',
    'emerald',
    'teal',
    'cyan',
    'sky',
    'blue',
    'indigo',
    'violet',
    'purple',
    'fuchsia',
    'pink',
    'rose',
]
export default {
    name: 'SelectColorScheme',
    emits: ['selected'],
    setup() {
        // const selectedColor = ref('')
        const selectedColor = computed(() => store.state.settings.colorName)
        const colorValue = ref('')
        const store = useStore()

        watch(
            () => selectedColor.value,
            (val) => {
                setColorValue(val)
            }
        )

        onMounted(() => {
            // selectedColor.value = 'green'
            setTimeout(() => {
                console.dir(
                    document.getElementById(
                        `colorScheme_${selectedColor.value}`
                    )
                )
                console.log(
                    getComputedStyle(
                        document.getElementById(
                            `colorScheme_${selectedColor.value}`
                        )
                    ).backgroundColor
                )
            }, 1000)
        })

        const setColorValue = (color) => {
            selectedColor.value = color
            colorValue.value = getComputedStyle(
                document.getElementById(`colorScheme_${selectedColor.value}`)
            )?.backgroundColor
            store.commit('settings/setColor', {
                name: color,
                value: colorValue.value,
            })
            console.log(colorValue.value)
        }

        return {
            colors,
            selectedColor,
            setColorValue,
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
