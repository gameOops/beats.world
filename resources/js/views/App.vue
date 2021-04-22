<template>
    <div class="page" >
        <header class="p-3 mb-3 border-bottom" style="padding-right: 390px!important;padding-left: 390px!important;position: sticky;">

            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="/" class="col-xl-4 d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                    <img ondblclick="alert('некит гей')" style="width: 108px;" src="https://see.fontimg.com/api/renderfont4/5Y58/eyJyIjoiZnMiLCJoIjo2NSwidyI6MTAwMCwiZnMiOjY1LCJmZ2MiOiIjMDAwMDAwIiwiYmdjIjoiI0ZGRkZGRiIsInQiOjF9/TmVraXRncmFt/vegan-style-personal-use.png" alt="">
                </a>

                <form class="col-12 col-lg-4 mb-4 mb-lg-0 me-lg-4" >
                    <input type="search" class="form-control search" placeholder="Search...">
                </form>

                <ul v-if="this.userId" style="margin-right: 0px!important;" class="control nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li class="lilimenu"><router-link class="nav-link px-2 link-secondary home_ico" :to="{path:'/'}">
                        </router-link></li>
                    <li class="lilimenu"><router-link class="nav-link px-2 link-dark airplain_ico" :to="{path:'/direct'+this.userId}"></router-link></li>
                    <li class="lilimenu"><a href="#" class="nav-link px-2 link-dark compass_ico"></a></li>
                    <li class="lilimenu"><a href="#" class="nav-link px-2 link-dark like_ico"></a></li>
                </ul>

                <div  v-if="this.userId" class="dropdown text-end">
                    <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img :src="this.userImage" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
                        <li> <a class="dropdown-item"><router-link :to="{path:'/user'+this.userId}">
                           Мой Профиль</router-link></a></li>
                        <li><a class="dropdown-item" href="#">Сохраненное</a></li>
                        <li><a class="dropdown-item" href="#">Настройки</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" @click="logout" href="#">Выйти</a></li>
                    </ul>
                </div>
            </div>

        </header>
        <div class="container">
            <router-view></router-view>


        </div>
    </div>


</template>
<script>
    import axios from "axios";

    export default {
        data() {
            return {
                userImg: '',
                userId: localStorage.id,
                userImage: localStorage.image
            };
        },
        methods: {
            getUserImage() {
                let data = {
                    token: localStorage.token,
                };
                axios.post('/api/getPosts', data)
                    .then(({data}) => {
                       this.userImg = data;
                    })
            },
            logout() {
                localStorage.removeItem('token');
                localStorage.removeItem('image');
                localStorage.removeItem('id');
                this.userId = null;
                this.$router.push({ name: "auth.index"});
            }
        },
        mounted() {
            if(!localStorage.token) {
                this.$router.push({ name: "auth.index"});
            }
        }
    }
</script>
