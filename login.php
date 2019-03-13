<? include_once('includes/header.php'); ?>
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
                    <span id="title-page">Авторизация</span>
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
                                <h1>Авторизация</h1>
                                <div class="warning-container"></div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="well">
                                            <h2>Новый клиент</h2>
                                            <p><strong>Регистрация</strong></p>
                                            <p style="padding-bottom: 10px">Создание учетной записи поможет покупать
                                                быстрее. Вы сможете контролировать состояние заказа, а также
                                                просматривать заказы сделанные ранее. Вы сможете накапливать призовые
                                                баллы и получать скидочные купоны. <br>А постоянным покупателям мы
                                                предлагаем гибкую систему скидок и персональное обслуживание.<br></p>
                                            <a href="https://kilosport.net/create-account" class="btn btn-primary">Продолжить</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="well">
                                            <h2>Зарегистрированный клиент</h2>
                                            <p><strong>Войти в Личный Кабинет</strong></p>
                                            <form method="post"
                                                  enctype="multipart/form-data">
                                                <div class="form-group">
                                                    <label class="control-label" for="input-email">Телефон</label>
                                                    <input type="number" name="phone_number" value="" placeholder="8ХХХХХХХХХ"
                                                           id="input-email" class="form-control">
                                                </div>
                                                <div class="form-group" style="padding-bottom: 10px">
                                                    <label class="control-label" for="input-password">Пароль</label>
                                                    <input type="password" name="password" value="" placeholder="Пароль"
                                                           id="input-password" class="form-control">
                                                    <a href="/"
                                                       style="margin-top: 10px;display: inline-block;">Забыли
                                                        пароль?</a></div>
                                                <input type="submit" value="Войти" class="btn btn-primary">
                                                <!--


			  			  <link rel="stylesheet" type="text/css" href="./Авторизация_files/socnetauth2.css">

<div class="content account_socnetauth2_bline_content" style="min-height: 0px;">
	<style>
	a.socnetauth2_buttons:hover img
	{
		opacity: 0.8;
	}
	</style>
	<div class="account_socnetauth2__header">Авторизация через Соц.сети</div>
	<div class="account_socnetauth2_bline_links">
		<table>
			<tbody><tr>
				<td style="padding: 5px;"><a class="socnetauth2_buttons" href="https://kilosport.net/socnetauth2/vkontakte.php?first=1"><img src="./Авторизация_files/vk45.png"></a></td>				<td style="padding: 5px;"><a class="socnetauth2_buttons" href="https://kilosport.net/socnetauth2/odnoklassniki.php?first=1"><img src="./Авторизация_files/od45.png"></a></td>				<td style="padding: 5px;"><a class="socnetauth2_buttons" href="https://kilosport.net/socnetauth2/facebook.php?first=1"><img src="./Авторизация_files/fb45.png"></a></td>				<td style="padding: 5px;"><a class="socnetauth2_buttons" href="https://kilosport.net/socnetauth2/twitter.php?first=1"><img src="./Авторизация_files/tw45.png"></a></td>											</tr>
		</tbody></table>
	</div>
</div>




			  	-->         <input type="hidden" name="redirect"
                            value="/">
                                            </form>



                                        </div>
                                    </div>
                                </div>

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
<script>
    $('form').on('submit', (e) => {
        e.preventDefault();
        let data = $('form').serializeArray();
        console.log(data);
        $.ajax({
            type: "POST",
            url: "components/auth.php",
            data: data,
            success: (data) => {
                data = JSON.parse(data);
                if(data.msg == "OK"){
                    localStorage.setItem("user_data", data.data);
                    window.location.href = "/";
                }
                else{
                    let warning = (error) => {
                        $('.warning-container').html('<div class="warning"><button type="button" class="close" data-dismiss="alert">×</button>' + error + '</div>')
                    };
                    warning(data.error);
                }
            }

        })
    })
</script>
<? include_once ("includes/footer.php"); ?>