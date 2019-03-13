<?php include_once("includes/header.php"); ?>
    <!-- BREADCRUMB
        ================================================== -->
    <div class="breadcrumb full-width">
        <div class="background-breadcrumb"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="clearfix">
                        <ul>
                            <li class="item ">
                                <a href="/">Главная</a>


                            </li>
                            <li class="item ">
                                <a href="/">Личный Кабинет</a>


                            </li>
                        </ul>
                        <span id="title-page">Регистрация</span>
                        <div class="strip-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MAIN CONTENT
        ================================================== -->


    <div class="main-content full-width inner-page">
        <div class="background-content"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">


                    <div class="row">

                        <div class="col-md-12">


                            <div class="row">
                                <div class="col-md-12 center-column" id="content">
                                    <h1>Регистрация</h1>
                                    <div class="warning-container"></div>

                                    <p>Если Вы уже зарегистрированы, перейдите на страницу <a
                                                href="/login.php">авторизации</a>.</p>
                                    <form action="/register.php" method="post"
                                          enctype="multipart/form-data" class="form-horizontal">
                                        <fieldset id="account">
                                            <legend>Основные данные</legend>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-firstname">Имя</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="firstname" value="" placeholder="Имя"
                                                           id="input-firstname" class="form-control">
                                                    <div class="register-error" id="error-fn"></div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label"
                                                       for="input-lastname">Фамилия</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="lastname" value="" placeholder="Фамилия"
                                                           id="input-lastname" class="form-control">
                                                    <div class="register-error" id="error-ln"></div>

                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label"
                                                       for="input-telephone">Телефон</label>
                                                <div class="col-sm-10">
                                                    <input type="tel" name="telephone" value="" placeholder="Телефон"
                                                           id="input-telephone" class="form-control">
                                                    <div class="register-error" id="error-phone"></div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label"
                                                       for="input-birthdate">Дата рождения</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="birthdate" value=""
                                                           placeholder="XX.XX.XXXX"
                                                           id="input-birthdate" class="form-control"
                                                           data-provide="datepicker">
                                                    <div class="register-error" id="error-bd"></div>

                                                </div>
                                            </div>
                                        </fieldset>
                                        <fieldset id="address">
                                            <legend>Ваш адрес</legend>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-address-1">Адрес
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="address_1" value="" placeholder="Адрес"
                                                           id="input-address-1" class="form-control">
                                                    <div class="register-error" id="error-addr"></div>
                                                </div>
                                            </div>

                                        </fieldset>
                                        <fieldset>
                                            <legend>Ваш пароль</legend>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label"
                                                       for="input-password">Пароль</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="password" value="" placeholder="Пароль"
                                                           id="input-password" class="form-control">
                                                    <div class="register-error" id="error-pwd"></div>
                                                </div>
                                            </div>
                                            <div class="form-group required">
                                                <label class="col-sm-2 control-label" for="input-confirm">Подтверждение
                                                    пароля</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="confirm" value=""
                                                           placeholder="Подтверждение пароля" id="input-confirm"
                                                           class="form-control">
                                                    <div class="register-error" id="error-conf"></div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="buttons">
                                            <input type="submit" value="Продолжить" class="btn btn-primary"
                                                   style="float: right">
                                        </div>
                                    </form>

                                    <script type="text/javascript">
                                        let checkFields = (user) => {
                                            let data = user;
                                            let error = true;
                                            function message(el, msg) {
                                                el.html('<div class="text-danger">' + msg + '</div>');
                                                error = false;
                                            };
                                            if(data.name.length === 1){
                                                message($('#error-fn'), "Поле должно быть заполнено");
                                                message($('#error-ln'), "Поле должно быть заполнено");
                                            }
                                            if(data.date.length === 0){
                                                message($('#error-bd'), "Поле должно быть заполнено");
                                            }
                                            if(user.address === ""){
                                                message($('#error-addr'), "Поле должно быть заполнено");
                                            }
                                            if(user.password === ""){
                                                message($('#error-pwd'), "Поле должно быть заполнено");
                                            }
                                            if(user.password.length < 4){
                                                message($('#error-pwd'), "Пароль должен быть длиннее 3 символов");
                                            }
                                            if(user.password != user.confirm){
                                                message($('#error-pwd'), "Пароли должны совпадать");
                                                message($('#error-сonf'), "Пароли должны совпадать");
                                            }
                                            if(user.phone === ""){
                                                message($('#error-ph'), "Поле должно быть заполнено");
                                            }
                                            return error;
                                        };
                                        $('form').on('submit', function (e) {
                                            e.preventDefault();
                                            $('.register-error').html('');
                                            let element = $('form');
                                            let data = element.serializeArray();

                                            let user = {
                                                name: data[0].value + " " + data[1].value,
                                                phone: data[2].value,
                                                date: data[3].value,
                                                address: data[4].value,
                                                password: data[5].value,
                                                confirm: data[6].value
                                            };
                                            if(checkFields(user)){
                                                $.ajax({
                                                    type: "POST",
                                                    data: user,
                                                    url: 'components/register.php',
                                                    success: (data) => {
                                                        data =  JSON.parse(data);
                                                        if(data.error){
                                                            $('.warning-container').html('<div class="warning"><button type="button" class="close" data-dismiss="alert">×</button>' + data.error + '</div>')

                                                        }
                                                        if(data.message){
                                                            localStorage.setItem('user_data', data.data);
                                                            window.location.href = "/";
                                                        }
                                                    }
                                                })
                                            }
                                        })
                                    </script>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<? include_once("includes/footer.php"); ?>