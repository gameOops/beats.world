<template>
    <div class="block">

        <div class="left_directs_block">
            <div class="dialogs_header">
                <h2 class="site_h2_2" style="padding: 10px; font-size: 15px;">{{user_name}}</h2>
            </div>
            <div class="direct_left_item" v-for="t in test">
                <div class="item_direct_image">
                    <img v-if="t.fromu.id != user_ud" :src="t.fromu.image" alt="">
                    <img v-else :src="t.tou.image">
                </div>
                <div class="item_direct_name">
                    <p v-if="t.fromu.id != user_ud">{{t.fromu.name}}</p>
                    <p v-else>{{t.tou.name}}</p>
                </div>
            </div>
        </div>
    </div>




</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            direct_id: this.$route.params.id,
            user_ud: localStorage.id,
            user_name: localStorage.name,
            test: []
        }
    },
    methods: {
        getDialogs() {
            let data = {
                'id':this.user_ud
            }
            axios.post('/api/getDialogs',data)
                .then(({data}) => {
                    this.test = data;
                    console.log(data);
                })
                .catch(({response}) => {

                });
        }
    },
    mounted() {
        this.getDialogs();
    }
}
</script>
