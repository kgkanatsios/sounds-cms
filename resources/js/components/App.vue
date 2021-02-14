<template>
    <div class="main-content py-4">
        <div class="container text-center mb-4">
            <h1 class="m-0">Sound files</h1>
        </div>
        <alert></alert>
        <add></add>
        <list></list>
        <player-bar></player-bar>
    </div>
</template>

<script>
import List from "./List.vue";
import PlayerBar from "./PlayerBar.vue";
import Alert from "./Alert.vue";
import Add from "./Add.vue";

export default {
    name: "App",
    components: {
        List,
        PlayerBar,
        Alert,
        Add
    }
}
</script>
