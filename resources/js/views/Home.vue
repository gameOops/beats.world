<template>
    <div class="row">
    <div  class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-8 posts_inner" style="height:400px;">

        <div class="post block" v-for="t in test">
            <div class="post_header">
                <div class="post_avatar"><img alt="Фото профиля sonya_rudskaya" class="_6q-tv" crossorigin="anonymous" data-testid="user-avatar" draggable="false" :src="t.user.image"></div>
                <div class="post_name">
                    <p id="author_post"><router-link :to="{path:'/user'+t.user.id}">
                    {{ t.user.name }}</router-link></p>
                    <p id="author_place">Киев, Украина</p>
                </div>
            </div>
            <div class="post_content"><img :src="t.image"></div>
            <div class="post_footer">
                <a href="#" id="post_like" class="nav-link px-2 link-dark like_ico"></a><p style="float:left;">{{t.likes}}</p>
                <a href="#" id="post_repost" class="nav-link px-2 link-dark airplain_ico"></a>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4" style="height:400px;">
        <div class="user_block_right ">
            <div class="user_info_right">
                <div class="user_info_right_image">
                    <img :src="this.storage_image" alt="">
                </div>
                <div class="user_info_right_name">
                    <p> <router-link :to="{path:'/user'+this.storage_id}">
                       {{ this.storage_name }}</router-link></p>
                    <p class="right_user_desc">{{ this.storage_desc }}</p>
                </div>
            </div>
            <h2>Рекомендации для Вас:</h2>
            <div class="user_right_menu_item" v-for="user in usersTop">
                <div class="user_right_menu_item_img">
                    <img :src="user.image" alt="">
                </div>
                <div class="user_right_menu_item_name">
                    <router-link :to="{path:'/user'+user.id}">{{user.name}}</router-link>
                </div>
            </div>
            <div class="footer">
                <p class="footer_text">© Nekitgram от FiersCO, 2021</p>
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
                test: [],
                usersTop: [],
                storage_image: localStorage.image,
                storage_desc: localStorage.desc,
                storage_id: localStorage.id,
                storage_name: localStorage.name
            }
        },
        methods: {
            loadPosts() {
                let data = {
                    'id' : this.storage_id
                };
                axios.post('/api/getPosts',data)
                    .then(({data}) => {
                       this.test = data;
                    })
                    .catch(({response}) => {

                    });
            },
            loadUsersTop() {
                axios.post('/api/getTopUsers')
                    .then(({data}) => {
                        this.usersTop = data;
                    })
                    .catch(({response}) => {

                    });
            }
        },
        mounted() {
            this.loadPosts();
            this.loadUsersTop();
            console.log(this.test);
        }
    }
</script>
