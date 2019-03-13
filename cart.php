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
                        </ul>
                        <span id="title-page">Корзина покупок</span>
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
                                <div class="col-md-12 center-column cart__table__cart" id="content">
                                    <h1>Корзина покупок</h1>

                                    <form enctype="multipart/form-data">
                                        <div class="table-responsive cart-info">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td class="text-center">Изображение</td>
                                                    <td class="text-center hidden-xs">Название</td>
                                                    <td class="text-center">Количество</td>
                                                    <td class="text-right hidden-xs">Цена за шт.</td>
                                                    <td class="text-center">Всего</td>
                                                    <td class="text-center">Удалить</td>
                                                </tr>
                                                </thead>
                                                <tbody class="cart-info__tbody">
                                                </tbody>
                                            </table>
                                        </div>
                                    </form>
                                    <h2>Ваш баланс:
                                        <span id="my_balance">
                                        <strong>5000</strong> тенге
                                    </span>
                                    </h2>
                                    <h2>Что бы вы хотели сделать дальше?</h2>
                                    <p style="padding-bottom: 10px">Если у вас есть промокод тренера или вы хотите
                                        списать деньги с внутреннего баланса выберите соответствующий пункт ниже.</p>
                                    <div class="panel-group" id="accordion">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a
                                                            href="#collapse-coupon"
                                                            class="accordion-toggle" data-toggle="collapse"
                                                            data-parent="#accordion">Списать с баланса <i
                                                                class="fa fa-caret-down"></i></a></h4>
                                            </div>
                                            <div id="collapse-coupon" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <label class="col-sm-2 control-label" for="input-coupon"
                                                           style="padding-top: 10px;padding-left: 0px">Введите сумму
                                                        списания</label>
                                                    <form id="getFromBalance">
                                                        <div class="input-group">
                                                            <input type="text" name="balance" value=""
                                                                   placeholder="Введите сумму" id="input-balance"
                                                                   class="form-control">
                                                            <span class="input-group-btn">
        <input type="submit" value="Применить" id="button-balance" data-loading-text="Загрузка..."
               class="btn btn-primary">
                                                        </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><a
                                                            href="#collapse-voucher"
                                                            data-toggle="collapse" data-parent="#accordion"
                                                            class="accordion-toggle">Использовать промокод
                                                        <i class="fa fa-caret-down"></i></a></h4>
                                            </div>
                                            <div id="collapse-voucher" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <label class="col-sm-2 control-label" for="input-voucher"
                                                           style="padding-left: 0px">Введите промокод</label>
                                                    <form id="getPromocode">
                                                        <div class="input-group">
                                                            <input type="text" name="promocode" value=""
                                                                   placeholder="Введите промокод"
                                                                   id="input-voucher" class="form-control">
                                                            <span class="input-group-btn">
        <input type="submit" value="Применить" id="button-promocode" data-loading-text="Загрузка..."
               class="btn btn-primary">
                                                        </span></div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-total cart-total__cart">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Сумма:</strong></td>
                                                <td class="text-right"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Скидка</strong></td>
                                                <td class="text-right"></td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Списано со счета:</strong></td>
                                                <td class="text-right">0 тенге</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right"><strong>Итого к оплате:</strong></td>
                                                <td class="text-right"></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-left"><a href="/"
                                                                  class="btn btn-default">Продолжить покупки</a>
                                        </div>
                                        <form id="buy__items" method="POST" action="delivery_confirmation.php">
                                            <input type="hidden" name="promocode" id="promocode__h">
                                            <input type="hidden" name="balance" id="balance__h">
                                            <input type="hidden" name="user_id" id="user-id_h">
                                            <input type="hidden" name="discount_percent" id="discount-percent__h">
                                            <div class="pull-right"><button type="submit"
                                                                       class="btn btn-primary __buy">Оформление
                                                    заказа</button>
                                            </div>
                                        </form>
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
<? include_once('includes/footer.php'); ?>