<?
include_once('includes/header.php');
?>
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
                        <span id="title-page">Условия доставки</span>
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
                        <form action="components/buy.php" method="POST">
                        <div class="col-md-12">
                            <form class="row">
                                <div class="col-md-12 cart__table__cart" id="content">
                                    <div class="row">
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <h2>Вид оплаты</h2>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="delivery" value="1" checked  >
                                                    <span class="bold-text__label">Самовывоз</span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="delivery" value="2">
                                                    <span class="bold-text__label">Доставка</span>
                                                </label>
                                            </div>

                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 20px;">
                                            <h2>Вид оплаты</h2>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pay" checked value="1">
                                                    <span class="bold-text__label">Наличными</span>
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="pay" value="2">
                                                    <span class="bold-text__label">Банковской картой</span>
                                                </label>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row address__block" style="transition: opacity 1s ease-out;
    opacity: 0;
    height: 0;
    overflow: hidden;">
                                        <div class="col-md-12">
                                            <h2>Адрес доставки</h2>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Введите адрес...">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 20px;">
                                        <div class="col-md-12">
                                            <h2>Комментарий</h2>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <textarea class="form-control" id="inputComment" rows="3" name="comment"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-total">
                                        <table>
                                            <tbody>
                                            <tr>
                                                <td class="text-right"><strong>Итого к оплате:</strong></td>
                                                <td class="text-right"><?=$_POST["total__sum"]?> тенге</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="buttons">
                                            <input type="hidden" name="promocode" id="promocode__" value="<?=$_POST['promocode'];?>">
                                            <input type="hidden" name="balance" id="balance__" value="<?=$_POST['balance'];?>">
                                            <input type="hidden" name="user_id" id="user-id_" value="<?=$_POST['user_id'];?>">
                                            <input type="hidden" name="discount_percent" id="discount-percent__" value="<?=$_POST['discount_percent'];?>">
                                            <div class="pull-right"><button type="submit"
                                                                            class="btn btn-primary" id="confirm__purchasing">Купить</button>
                                            </div>
                                    </div>

                                </div>

                        </div>
                        </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script>

    $('#confirm__purchasing').on('click', function (e) {
        e.preventDefault();
        let address = $("#inputAddress").val();
        if(address.length == 0 && $('input[name="delivery"]:checked').val() == 2){
            show__toast('Ошибка!', 'Заполните поле "адрес"');
            return 0;
        }
        let form = $("form[action='components/buy.php']");
        console.log(form.serializeArray());
        var input = $("<input>")
            .attr("type", "hidden")
            .attr("name", "cart").val(localStorage.getItem("cart"));
        form.append(input);
        localStorage.removeItem("cart");
        localStorage.removeItem("discount_percent");
        localStorage.removeItem("trainer");
        form.submit();
    });

    $('input[name="delivery"]').on('change', function () {
        let value = $(this).val();
        if(value == 2){
            $('.address__block').css('opacity', 1).css('height', 'auto');
        }
        else{
            $('.address__block').css('opacity', 0).css('height', 0);
        }
    })
</script>
<?
include_once('includes/footer.php');