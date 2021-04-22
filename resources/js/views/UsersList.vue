<template>
    <div class="musiclist">
        <div v-if="error" class="error">
            <p>{{ error }}</p>
        </div>
        <div v-for="audi in audio" class="musicblock" v-on:click="setTrack(audi.src,audi.name)">
            <div class="image_cover"><img v-bind:src=audi.cover></div>
            <p>{{audi.name}}</p>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    const getAudio = (callback) => {

        axios
            .get('/api/audio')
            .then(response => {
                callback(null, response.data);
            }).catch(error => {
            callback(error, error.response.data);
        });
    };


    export default {
        data () {
            return {
                audio: null,
                error: null
            }
        },
        beforeRouteEnter (to, from, next) {
            getAudio((err, audio) => {
                next(vm => vm.setData(err, audio))
            })
        },
        beforeRouteUpdate (to, from, next) {
            this.audio = null
            getAudio(to.params.id, (err, post) => {
                this.setData(err, post)
                next()
            })
        },
        methods: {
            setData (err, audio) {
                if (err) {
                    this.error = err.toString()
                } else {
                    this.audio = audio
                }
            },
            setTrack (src,name) {

                document.getElementById("audioplaye").setAttribute('src', src);
                document.getElementById("currentMusic").innerHTML = name;
                play == 1;
            },
            play() {
                document.getElementById("audioplaye").play()

            }
        }
    }


</script>
