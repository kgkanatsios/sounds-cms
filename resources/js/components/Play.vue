<template>
  <div class="container-fluid">
      <div v-if="Object.keys(selectedFile).length != 0" class="mb-2 text-center"><h2 class="m-0">{{selectedFile.attributes.title}}</h2></div>
      <div v-show="Object.keys(selectedFile).length != 0">
            <div class="mb-2" id="waveform"></div>
            <div class="controls text-center mx-auto">
                <button class="btn btn-primary" data-action="play">
                    Play / Pause
                </button>
            </div>
      </div>
  </div>
</template>

<script>
import WaveSurfer from 'wavesurfer.js';
import { mapGetters } from "vuex";

export default {
    name: "Play",
    data(){
        return {
            wavesurfer:null
        }
    },
    computed: {
        ...mapGetters(["selectedFile"])
    },
    watch: {
        selectedFile: function() {
            if (Object.keys(this.selectedFile).length != 0){
                this.wavesurfer.load(this.selectedFile.attributes.file);
            }
        }
    },
    mounted: function () {
        this.wavesurfer = WaveSurfer.create({
            container: document.querySelector('#waveform'),
            waveColor: 'violet',
            progressColor: 'purple'
        });
        document.querySelector('[data-action="play"]').addEventListener('click', this.wavesurfer.playPause.bind(this.wavesurfer));
    }
}
</script>

<style>

</style>
