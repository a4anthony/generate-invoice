<template>
    <div class="space-y-5">
        <!--business name-->
        <div>
            <label for="" class="form-label">Business/Company Name</label>
            <input type="text" v-model="form.company_name" class="form-input" />
        </div>
        <!--client name-->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="" class="form-label">First Name</label>
                <input
                    type="text"
                    v-model="form.first_name"
                    class="form-input"
                />
            </div>
            <div>
                <label for="" class="form-label">Last Name</label>
                <input
                    type="text"
                    v-model="form.last_name"
                    class="form-input"
                />
            </div>
        </div>
        <!--phone & website-->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
                <label for="" class="form-label">Phone</label>
                <input type="tel" v-model="form.phone" class="form-input" />
            </div>
            <div>
                <label for="" class="form-label">Website</label>
                <input type="text" v-model="form.website" class="form-input" />
            </div>
        </div>
        <!--email & country-->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
            <div class="col-span-2">
                <label for="" class="form-label">Email</label>
                <input type="email" v-model="form.email" class="form-input" />
            </div>
            <div>
                <label for="" class="form-label">Country</label>
                <select
                    id="location"
                    name="location"
                    class="form-select"
                    v-model="form.country"
                >
                    <option value="">-- select country --</option>
                    <option v-for="country in countries" :value="country.name">
                        {{ country.name }}
                    </option>
                </select>
            </div>
        </div>
        <!--address 1 & 2-->
        <div class="space-y-5">
            <div class="col-span-2">
                <label for="" class="form-label">Address 1</label>
                <input
                    type="text"
                    v-model="form.address_1"
                    class="form-input"
                />
            </div>
            <div>
                <label for="" class="form-label">Address 2</label>
                <input
                    type="text"
                    v-model="form.address_2"
                    class="form-input"
                />
            </div>
        </div>
    </div>
</template>

<script>
import ModalContainer from '../../modal/ModalContainer'
import { onMounted, ref } from 'vue'
import { useForm } from '@inertiajs/inertia-vue3'
import { getCountries } from '../../../../helpers'

const countries = getCountries()

export default {
    name: 'Biller',
    components: { ModalContainer },
    setup() {
        const open = ref(false)
        const form = useForm({
            company_name: '',
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            website: '',
            country: '',
            address_1: '',
            address_2: '',
        })
        onMounted(() => {
            setDummyData()
        })
        const setDummyData = () => {
            form.company_name = 'Company Name'
            form.first_name = 'FirstName'
            form.last_name = 'LastName'
            form.email = 'company@email.com'
            form.phone = '08023412345'
            form.website = 'www.company.com'
            form.country = 'Nigeria'
            form.address_1 = '10. Oron rd. Ikeja'
        }
        return {
            open,
            countries,
            form,
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
