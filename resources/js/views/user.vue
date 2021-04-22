<template>
    <div class="user_page_content">
        <div class="user_profile_header">
            <div class="user_profile_header_image_block">
                <img :src="test.image" alt="">
            </div>
            <div class="user_profile_header_info_block">
                <div class="user_profile_header_info_username">
                    <p>{{test.name}}</p> <div class="verify" v-if="test.verify == 1"></div>
                </div>
                <div class="btn btn-light" v-if="this.isSub == 'sub'">
                    <a @click="unsub" style="color:black;text-decoration: none" href="">Отписаться</a>
                </div>
                <div class="btn_sub" v-else>
                    <a @click="sub" href="">Подписаться</a>
                </div>
                <a class="btn" href="">Отправить сообщение</a>
            </div>
            <div class="user_stats">
                <div class="user_posts_info user_info_lable">
                    <p class="text_bold">1</p> <p>публикация</p>
                </div>
                <div class="user_subs_info user_info_lable">
                    <p class="text_bold">1</p> <p>подписчик</p>
                </div>
                <div class="user_tosubs_info user_info_lable">
                    <p class="text_bold">1</p> <p>подписок</p>
                </div>
            </div>
            <div class="user_stats" style="padding-top: 40px;">

                    <p class="text_bold">{{test.desc}}</p>

            </div>

        </div>
        <div class="user_posts_block" >
            <div class="user_post"  v-for="t in posts">
                <img :src="t.image" alt="">
            </div>
        </div>
    </div>

</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            test: [],
            posts: [],
            isSub: '',
        }
    },
    methods: {
        unsub() {
            let data = {
                'id': localStorage.id,
                'sub_id': this.$route.params.id,
            };
            axios.post('/api/unSub',data)
                .then(({data}) => {
                    console.log(data.message);
                })
        },
        sub() {
            let data = {
                'id': localStorage.id,
                'sub_id': this.$route.params.id,
            };
            axios.post('/api/subscribe',data)
                .then(({data}) => {
                    console.log(data.message);
                })
        },
        getUser() {
            let data = {
                'id': this.$route.params.id,
            };
            axios.post('/api/userInfo',data)
                .then(({data}) => {
                    this.test = data;
                })
        },
        getPosts() {
            let data = {
                'id': this.$route.params.id,
            };
            axios.post('/api/getPostsWhere',data)
                .then(({data}) => {
                    this.posts = data;
                })
        },
        checkSub() {
            let data = {
                'id': localStorage.id,
                'sub_id': this.$route.params.id,
            };
            axios.post('/api/checkSub',data)
                .then(({data}) => {
                    console.log(data.message);
                    this.isSub = data.message;
                    console.log(this.isSub);
                })
        }
    },
    mounted() {
        this.getUser();
        this.getPosts();
        this.checkSub();

    }
}
</script>
