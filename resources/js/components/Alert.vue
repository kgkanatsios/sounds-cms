<template>
    <div class="container" v-if="alertStatus">
        <div class="alert" :class="[alertClass]" role="alert">
            <button type="button" class="close" data-dismiss="alert" @click="clearAlert()" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h4 class="alert-heading">{{ alertData.title }}</h4>
            <p>{{ alertData.text }}</p>
        </div>
    </div>
</template>

<script>
import { mapActions, mapGetters } from "vuex";
export default {
    computed: {
        ...mapGetters(["alertStatus", "alertClass", "alertData"])
    },
    methods: {
        ...mapActions({
            clearAlert: "clearAlert",
        })
    },
}
</script>

<style>

</style>
