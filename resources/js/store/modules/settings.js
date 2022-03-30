const settings = {
    state: () => ({
        colorName: 'blue',
        colorCode: 'blue',
        billedTo: null,
        billedBy: null,
        logo: null,
    }),
    mutations: {
        setColor(state, data) {
            state.colorName = data.name
            state.colorCode = data.value
        },
        setBilledTo(state, data) {
            state.billedTo = data
        },
        setBilledBy(state, data) {
            state.billedBy = data
        },
        setLogo(state, data) {
            state.logo = data
        },
    },
    actions: {},
    getters: {},
    namespaced: true,
}

export default settings
