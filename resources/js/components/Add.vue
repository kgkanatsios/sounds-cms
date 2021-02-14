<template>
    <div class="container mb-4">
        <div class="card">
            <div class="card-header">
                Add new file
            </div>
            <div class="card-body">
                <form class="card-text">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input v-model="title" type="text" class="form-control" id="title" placeholder="File title...">
                    </div>
                    <div class="form-group">
                        <label for="file">Choose MP3</label>
                        <input v-on:change="setInputFile" type="file" class="form-control-file" id="file">
                    </div>
                </form>
                <span class="btn btn-primary rounded-pill" @click="submitNewFile()">Add File</span>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
    name: "Add",
    data(){
        return {
            title:"",
            file:""
        }
    },
    methods: {
        ...mapActions({
            createFile: "createFile",
        }),
        setInputFile(event) {
            this.file = event.target.files[0];
        },
        submitNewFile(){
            this.createFile({title: this.title, file: this.file});
            this.title="";
            this.file="";
            document.getElementById('file').value = null;
        }
    },
}
</script>

<style>

</style>
