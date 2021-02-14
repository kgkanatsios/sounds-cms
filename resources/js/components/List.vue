<template>
  <div v-if="loadData">
      <div class="container">
          <div class="row">
              <div class="col-12">
                <ul class="list-group mb-4">
                    <li class="list-group-item d-flex" v-for="(file, index) in files" :key="index">
                        <div class="font-weight-bold mr-4">{{ file.data.attributes.title }}</div>
                        <div class="file-actions ml-auto">
                            <span class="btn btn-success btn-sm rounded-pill mx-1" @click="fetchFile(file.data.file_id)">Play</span>
                            <span class="btn btn-danger btn-sm rounded-pill mx-1" @click="deleteFile(file.data.file_id)">Delete</span>
                        </div>
                    </li>
                </ul>
              </div>
          </div>
      </div>
  </div>
  <div v-else class="text-center p-4">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
  </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    name: "List",
    computed: {
        ...mapGetters(["loadData", "files"])
    },
    methods: {
        ...mapActions({
            fetchFiles: "fetchFiles",
            fetchFile: "fetchFile",
            deleteFile: "deleteFile",
        })
    },
    created() {
        this.fetchFiles();
    }
}
</script>

<style>

</style>
