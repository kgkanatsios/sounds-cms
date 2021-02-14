const state = {
    alertStatus: false,
    alertClass: "",
    alertData: {
        title:"",
        text:"",
    }
};

const getters = {
    alertStatus: state => {
        return state.alertStatus;
    },
    alertClass: state => {
        return state.alertClass;
    },
    alertData: state => {
        return state.alertData;
    }
};

const actions = {
    fillAlert({ commit }, data) {
        commit("setAlertData", {
            title: data.title,
            text: data.text,
        });
        commit("setAlertClass", data.class);
        commit("setAlertStatus", true);
    },
    clearAlert({ commit }) {
        commit("setAlertStatus", false);
        commit("setAlertClass", "");
        commit("setAlertData", {
            title:"",
            text:"",
        });
    },
};

const mutations = {
    setAlertStatus(state, alertStatus) {
        state.alertStatus = alertStatus;
    },
    setAlertClass(state, alertClass) {
        state.alertClass = alertClass;
    },
    setAlertData(state, alertData) {
        state.alertData = alertData;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
