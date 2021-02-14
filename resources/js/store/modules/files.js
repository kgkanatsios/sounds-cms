const state = {
    loadData: false,
    files: [],
    selectedFile: {}
};

const getters = {
    loadData: state => {
        return state.loadData;
    },
    files: state => {
        return state.files;
    },
    selectedFile: state => {
        return state.selectedFile;
    }
};

const actions = {
    fetchFiles({ commit }) {
        commit("setLoadData", false);
        axios
            .get("/api/files")
            .then(res => {
                commit("setFiles", res.data.data);
                commit("setLoadData", true);
            })
            .catch(err => {
                console.log("Unable to fetch files. Error:" + err);
            });
    },
    fetchFile({ commit }, data) {
        axios
            .get("/api/files/" + data)
            .then(res => {
                commit("setSelectedFile", res.data.data);
            })
            .catch(err => {
                console.log("Unable to fetch file. Error:" + err);
            });
    },
    createFile({ commit, dispatch }, data) {
        let fd = new FormData();
        fd.append('title',data.title);
        fd.append('file',data.file);

        commit("setLoadData", false);
        axios
            .post("/api/files", fd, {
                headers: {
                  'Content-Type': 'multipart/form-data'
                }
            })
            .then(res => {
                commit("setFiles", res.data.data);
                commit("setLoadData", true);
            })
            .catch(err => {
                commit("setLoadData", true);
                dispatch("clearAlert");
                dispatch("fillAlert", { class:"alert-danger", title: err.response.data.errors.title, text: err.response.data.errors.meta });
            });
    },
    deleteFile({ commit, dispatch }, fileId) {
        axios
            .delete("/api/files/"+fileId)
            .then(res => {
                dispatch("fetchFiles");
                dispatch("clearAlert");
                dispatch("fillAlert", { class:"alert-danger", title: "File Deleted", text: ((res.data.data.attributes.title) ? `${res.data.data.attributes.title} deleted!!!` : 'A file without title, deleted!!!') });
                commit("setSelectedFile", {});
            })
            .catch(err => {
                console.log("Unable to delete a file. Error: " + err);
            });
    }
};

const mutations = {
    setLoadData(state, loadData) {
        state.loadData = loadData;
    },
    setFiles(state, files) {
        state.files = files;
    },
    setSelectedFile(state, selectedFile) {
        state.selectedFile = selectedFile;
    }
};

export default {
    state,
    getters,
    actions,
    mutations
};
