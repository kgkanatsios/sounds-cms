<template>
  <div class="player-bar bg-dark text-white py-2">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <play></play>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
import Play from "./Play.vue";
export default {
    name: "PlayerBar",
    components: {
        Play
    }
}
</script>

<style lang="scss" scoped>
    .player-bar{
        position: fixed;
        bottom: 0;
        right: 0;
        left: 0;
        z-index: 1;
    }
</style>>
