import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import SecureLS from 'secure-ls'

const ls = new SecureLS({
    isCompression: true,
})

import settings from './modules/settings'
const store = createStore({
    state: {},
    getters: {},
    mutations: {},
    actions: {},
    modules: {
        settings,
    },
    plugins: [
        createPersistedState({
            paths: ['settings'],
            key: 'invoiceApp',
            storage: {
                getItem: (key) => ls.get(key),
                setItem: (key, value) => ls.set(key, value),
                removeItem: (key) => ls.remove(key),
            },
        }),
    ],
})

export default store
