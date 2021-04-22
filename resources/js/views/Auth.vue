<template>
    <div>

        <div ref="modal" class="modal fade" id="myModal" tabindex="-1" role="dialog" style="display: none;" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h4 class="modal-title" id="myModalLabel">Ошибка!</h4>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>


        <div class="mx-auto col-md-6">
            <div class="form-horizontal register_form">
                <h1 class="mainH ">Регистрация</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя пользователя</label>
                    <input type="text" class="form-control" v-model="regname" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email адрес</label>
                    <input type="email" class="form-control" v-model="regmail" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" v-model="regpassword" id="exampleInputPassword1">
                </div>
                <div class="form-group" style="margin-top: 15px;">
                    <button type="submit" @click="register" class="btn btn-success">Зарегестрироваться</button>
                    <button type="submit" onclick="$('.register_form').hide(); $('.login_form').show();" class="btn btn">Уже зарегестрированы ?</button>
                </div>
            </div>
            <div class="form-horizontal login_form" style="display: none;">
                <h1 class="mainH ">Авторизация</h1>
                <div class="form-group">
                    <label for="exampleInputEmail1">Имя пользователя</label>
                    <input type="text" class="form-control" v-model="username" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" v-model="password" id="exampleInputPassword1">
                </div>
                <div class="form-group" style="margin-top: 15px;">
                    <button type="submit" @click="login" class="btn btn-success">Войти</button>
                    <button type="submit" onclick="$('.login_form').hide(); $('.register_form').show();"  class="btn btn">Нет аккаунта? </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import axios from 'axios';
    import modal from './Modal.vue';


    export default {
        data() {
            return {
                username: '',
                password: '',
                regpassword: '',
                regname: '',
                regmail: '',
            };
        },
        components: {

        },

        methods: {
            login() {
                let data = {
                    username: this.username,
                    password: this.password
                };

                axios.post('/api/auth', data)
                    .then(({data}) => {
                        console.log(data.token);
                        localStorage.token = data.token;
                        localStorage.image = data.image;
                        localStorage.name = data.name;
                        localStorage.desc = data.desc;
                        localStorage.id = data.id;
                        $('.rounded-circle').attr('src',data.image);
                        $('#dropdownUser1').attr('href','/user'+data.id);
                        console.log(localStorage.token);
                        this.$router.push({ name: "home"});
                        location.reload();
                    })
                    .catch(({response}) => {

                        console.log(response.data.message);



                    });
            },
            showToken() {
                console.log(localStorage.token);
            },
            register()  {
                let data = {
                    regname: this.regname,
                    regmail: this.regmail,
                    regpassword: this.regpassword
                };

                axios.post('/api/reg', data)
                    .then(({data}) => {
                        console.log(data);
                        this.$router.push('Home');
                    })
                    .catch(({response}) => {
                        console.log(response.data.message);

                        $(this.$refs.modal).modal('show');
                        $('.modal-body').text(response.data.message);
                    });
            },

        }
    }
</script>
