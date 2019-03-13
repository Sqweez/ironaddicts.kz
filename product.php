<?php include_once('includes/header.php');
$id = $_GET["id"];
$sql = "SELECT * FROM product WHERE product_id = '$id' LIMIT 1";
$product = $conn->query($sql);
$product = mysqli_fetch_array($product, MYSQLI_ASSOC);
$category_id = $product["product_category_id"];
$sql = "SELECT category_name as name FROM category_product WHERE category_id = '$category_id'";
$category_name = mysqli_fetch_array($conn->query($sql));
$category_name = $category_name["name"];
$product_name = $product["product_name"];
$price = $product["prodazhnaya_cena"];
$massa = $product["ves_kolvo_tabletok"];
$sql = "SELECT * FROM `product` WHERE product_name = '$product_name' AND `prodazhnaya_cena` = '$price' AND `ves_kolvo_tabletok` = '$massa'";
$vkusy = $conn->query($sql);

if ($_GET["action"] == "getVkusy") {
    echo json_encode($vkusy);
}
?>
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
                                <a href="/category.php?id=<?= $category_id ?>"><?= $category_name ?></a>


                            </li>
                        </ul>
                        <span id="title-page"><?= $product["product_name"] ?></span>
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

                                <div data-i32temscope_mdp="" data-i32temtype_mdp="http://data-vocabulary.org/Product">
                                    <span data-i32temprop_mdp="name"
                                          class="hidden"><?= $product["product_name"] ?></span>
                                    <div class="product-info">

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="row" id="quickview_product">
                                                    <script>
                                                        function initZoom5c41b3d1d5bf7() {
                                                            $('.zoomContainer').remove();
                                                            $('#image').removeData('elevateZoom');
                                                            $('#image').removeData('zoomImage');


                                                            $('#image').elevateZoom({
                                                                tint: true,
                                                                tintOpacity: 0.5,
                                                                zoomTintFadeIn: 500,
                                                                zoomTintFadeOut: 500,
                                                                zoomWindowFadeIn: 500,
                                                                zoomWindowFadeOut: 500,
                                                                zoomWindowOffetx: 20,
                                                                zoomWindowOffety: -1,
                                                                easing: true,
                                                            });

                                                            setTimeout(function () {
                                                                $('.rtl .zoomContainer').addClass('zoom-left')
                                                            }, 500);
                                                        }

                                                        $(document).ready(function () {
                                                            if ($(window).width() > 992) {

                                                                initZoom5c41b3d1d5bf7();
                                                                var z_index = 0;

                                                                $(document).on('click', '.open-popup-image', function () {
                                                                    $('.popup-gallery').magnificPopup('open', z_index);
                                                                    return false;
                                                                });

                                                                $('.thumbnails a, .thumbnails-carousel a').click(function () {
                                                                    var smallImage = $(this).attr('data-image');
                                                                    var largeImage = $(this).attr('data-zoom-image');
                                                                    var ez = $('#image').data('elevateZoom');
                                                                    $('#ex1').attr('href', largeImage);
                                                                    ez.swaptheimage(smallImage, largeImage);
                                                                    $('#image').attr('data-zoom-image', largeImage);
                                                                    z_index = $(this).index('.thumbnails a, .thumbnails-carousel a');
                                                                    initZoom5c41b3d1d5bf7();
                                                                    return false;
                                                                });
                                                            } else {
                                                                $(document).on('click', '.open-popup-image', function () {
                                                                    $('.popup-gallery').magnificPopup('open', 0);
                                                                    return false;
                                                                });
                                                            }
                                                        });
                                                    </script>
                                                    <div class="col-sm-5 popup-gallery">

                                                        <div class="row">

                                                            <div class="col-sm-12">
                                                                <div class="product-image cloud-zoom">


                                                                    <a href="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"
                                                                       id="ex1" class="open-popup-image"><img
                                                                                src="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"
                                                                                title="<?=$product["product_name"];?>"
                                                                                alt="<?=$product["product_name"];?>"
                                                                                id="image" data-i32temprop_mdp="image"
                                                                                data-zoom-image="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"></a>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="overflow-thumbnails-carousel">
                                                                    <div class="thumbnails-carousel owl-carousel owl-theme"
                                                                         style="opacity: 1; display: block;">
                                                                        <div class="owl-wrapper-outer">
                                                                            <div class="owl-wrapper"
                                                                                 style="width: 78px; left: 0px; display: block; transition: all 1000ms ease 0s; transform: translate3d(0px, 0px, 0px);">
                                                                                <div class="owl-item"
                                                                                     style="width: 78px;">
                                                                                    <div class="item"><a
                                                                                                href="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"
                                                                                                class="popup-image"
                                                                                                data-image="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"
                                                                                                data-zoom-image="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"><img
                                                                                                    src="http://iron.controlsoft.kz/<?= $product["product_img"] ?>"
                                                                                                    title="<?=$product["product_name"];?>"
                                                                                                    alt="<?=$product["product_name"];?>"></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="owl-controls clickable"
                                                                             style="display: none;">
                                                                            <div class="owl-pagination">
                                                                                <div class="owl-page"><span
                                                                                            class=""></span></div>
                                                                            </div>
                                                                            <div class="owl-buttons">
                                                                                <div class="owl-prev"></div>
                                                                                <div class="owl-next"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <script type="text/javascript">
                                                                    $(document).ready(function () {
                                                                        $(".thumbnails-carousel").owlCarousel({
                                                                            autoPlay: 6000, //Set AutoPlay to 3 seconds
                                                                            navigation: true,
                                                                            navigationText: ['', ''],
                                                                            itemsCustom: [
                                                                                [0, 4],
                                                                                [450, 6],
                                                                                [550, 6],
                                                                                [768, 5],
                                                                                [1200, 6]
                                                                            ],
                                                                        });
                                                                    });
                                                                </script>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-sm-7 product-center clearfix">
                                                        <div data-i32temprop_mdp="offerDetails" data-i32temscope_mdp=""
                                                             data-i32temtype_mdp="http://data-vocabulary.org/Offer">
                                                            <div class="review">
                                            <span data-i32temprop_mdp="review" class="hidden" data-i32temscope_mdp=""
                                                  data-i32temtype_mdp="http://data-vocabulary.org/Review-aggregate">
                          <span data-i32temprop_mdp="itemreviewed"><?= $product["product_name"] ?></span>
                          <span data-i32temprop_mdp="rating">4</span>
                          <span data-i32temprop_mdp="votes">1</span>
                      </span>

                                                                <div class="product-name">
                                                                    <h1 style="padding: 0"><?= $product["product_name"] . " | " . $product["ves_kolvo_tabletok"] ?></h1>
                                                                </div>
                                                                <div class="description">
                                                                    <span class="label">Модель:</span> <span
                                                                            class="value"><?= $product_name ?></span><br>
                                                                </div>
                                                                <div class="price">
                                                                    <span class="price-new"><span
                                                                                data-i32temprop_mdp="price"
                                                                                id="price-old"><?= $product["prodazhnaya_cena"] ?>
                                                                            тенге</span></span>
                                                                    <br>
                                                                </div>
                                                            </div>
                                                                <?
                                                                $sql = "SELECT COUNT(*) as `count` FROM `product_sell` WHERE `product_single_id` = '$id' AND `product_status` = 1";
                                                                $result = mysqli_fetch_assoc($conn->query($sql));
                                                                if($result["count"] > 0){
                                                                echo '<div id="product">';
                                                                    if($vkusy->num_rows > 1){
                                                                        echo '
                                                                <div class="options">
                                                                    <h2>Доступные варианты</h2>
                                                                    <div class="form-group required">
                                                                        <label class="control-label"
                                                                               for="input-option231">Вкус</label>
                                                                        <select name="option[231]" id="select__taste__"
                                                                                class="form-control">';
                                                                        foreach ($vkusy as $item) {
                                                                            echo '<option value="' . $item["product_id"] . '">' . $item["product_vkus"] . '</option>';
                                                                        }
                                                                        echo '
                                                                        </select>
                                                                    </div>
                                                                </div>';
                                                                    }
                                                                echo '<div class="cart">
                                                                    <div class="add-to-cart clearfix">
                                                                        <p>Количество</p>
                                                                        <div class="quantity">
                                                                            <input type="text" name="quantity"
                                                                                   id="quantity_wanted" size="2"
                                                                                   value="1">
                                                                            <a href="https://kilosport.net/#" id="q_up"><i
                                                                                        class="fa fa-plus"></i></a>
                                                                            <a href="https://kilosport.net/#"
                                                                               id="q_down"><i
                                                                                        class="fa fa-minus"></i></a>
                                                                        </div>
                                                                        <input type="hidden" name="product_id" size="2"
                                                                               value="51">
                                                                        <input type="button" value="Купить"
                                                                               id="button-cart" rel="51"
                                                                               data-loading-text="Загрузка..."
                                                                               class="button"
                                                                               onclick="add_to_cart(' . $product["product_id"] . ')">
                                                                        <input type="button" id="btn_oneclick"
                                                                               style="visibility: hidden"
                                                                               onclick="add_to_cart(' . $product["product_id"] . ')"
                                                                               class="button" value="Купить в 1 клик">
                                                                    </div>


                                                                </div> </div>';
                                                                }
                                                                else{
                                                                    echo '<h3>Нет в наличии</h3>';
                                                                }

                                                                ?>
                                                           <!-- End #product -->

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div id="tabs" class="htabs" style="display: none;">
                                            <a href="#tab-description" class="selected">Описание</a><a
                                                    href="#tab-review" class="">Отзывов (1)</a></div>
                                        <div id="tab-description" class="tab-content" data-i32temprop_mdp="description"
                                             style="display: block; margin-top: 20px;">
                                            <h1>Описание товара</h1>
                                            <?
                                            if (base64_decode($product["product_opisanie"], true) == true)
                                            {
                                                echo base64_decode($product["product_opisanie"], true);
                                            }
                                            else
                                            {
                                                echo $product["product_opisanie"];
                                            }
                                            ?>
                                            <div class="meta-row">
                                                <div class="inline">
                                                    <span class="label">Категории:</span>
                                                    <span><a href="/category.php?id=<?= $category_id ?>"><?= $category_name ?></a></span>
                                                </div>
                                                <div class="inline">
                                                    <span class="label"><i class="fa fa-tags"></i></span>
                                                    <span><a href="/category.php?id=<?= $category_id ?>"><?= $category_name ?></a></span>
                                                </div>
                                            </div>

                                        </div>
                                        <div id="tab-review" class="tab-content" style="display: none;">
                                            <form class="form-horizontal" id="form-review">
                                                <div id="review">
                                                    <div class="review-list">
                                                        <div class="author"><b>Лёлик</b> <span>27.04.2017</span></div>
                                                        <div class="rating"><i class="fa fa-star active"></i><i
                                                                    class="fa fa-star active"></i><i
                                                                    class="fa fa-star active"></i><i
                                                                    class="fa fa-star active"></i><i
                                                                    class="fa fa-star"></i></div>
                                                        <div class="text">Сладенький. Брал шоколад , вкус на 4 с "-".
                                                            Про остальные не знаю
                                                        </div>
                                                    </div>
                                                    <div class="row pagination-results">
                                                        <div class="col-sm-6 text-left"></div>
                                                        <div class="col-sm-6 text-right">Показано с 1 по 1 из 1 (всего 1
                                                            страниц)
                                                        </div>
                                                    </div>
                                                </div>
                                                <h2 id="review-title">Написать отзыв</h2>
                                                <div class="form-group required">
                                                    <div class="col-xs-12 col-sm-8">
                                                        <label class="control-label" for="input-name">Ваше имя:</label>
                                                        <input type="text" name="name" value="" id="input-name"
                                                               class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="col-xs-12 col-sm-8">
                                                        <label class="control-label">Оценка:</label>

                                                        <div class="rating set-rating">
                                                            <i class="fa fa-star" data-value="1"></i>
                                                            <i class="fa fa-star" data-value="2"></i>
                                                            <i class="fa fa-star" data-value="3"></i>
                                                            <i class="fa fa-star" data-value="4"></i>
                                                            <i class="fa fa-star" data-value="5"></i>
                                                        </div>
                                                        <script type="text/javascript">
                                                            $(document).ready(function () {
                                                                $('.set-rating i').hover(function () {
                                                                    var rate = $(this).data('value');
                                                                    var i = 0;
                                                                    $('.set-rating i').each(function () {
                                                                        i++;
                                                                        if (i <= rate) {
                                                                            $(this).addClass('active');
                                                                        } else {
                                                                            $(this).removeClass('active');
                                                                        }
                                                                    })
                                                                })

                                                                $('.set-rating i').mouseleave(function () {
                                                                    var rate = $('input[name="rating"]:checked').val();
                                                                    rate = parseInt(rate);
                                                                    i = 0;
                                                                    $('.set-rating i').each(function () {
                                                                        i++;
                                                                        if (i <= rate) {
                                                                            $(this).addClass('active');
                                                                        } else {
                                                                            $(this).removeClass('active');
                                                                        }
                                                                    })
                                                                })

                                                                $('.set-rating i').click(function () {
                                                                    $('input[name="rating"]:nth(' + ($(this).data('value') - 1) + ')').prop('checked', true);
                                                                });
                                                            });
                                                        </script>
                                                        <div class="hidden">
                                                            &nbsp;&nbsp;&nbsp; Плохо&nbsp;
                                                            <div class="iradio" style="position: relative;"><input
                                                                        type="radio" name="rating" value="1"
                                                                        style="position: absolute; opacity: 0;">
                                                                <ins class="iCheck-helper"
                                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                            </div>
                                                            &nbsp;
                                                            <div class="iradio" style="position: relative;"><input
                                                                        type="radio" name="rating" value="2"
                                                                        style="position: absolute; opacity: 0;">
                                                                <ins class="iCheck-helper"
                                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                            </div>
                                                            &nbsp;
                                                            <div class="iradio" style="position: relative;"><input
                                                                        type="radio" name="rating" value="3"
                                                                        style="position: absolute; opacity: 0;">
                                                                <ins class="iCheck-helper"
                                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                            </div>
                                                            &nbsp;
                                                            <div class="iradio" style="position: relative;"><input
                                                                        type="radio" name="rating" value="4"
                                                                        style="position: absolute; opacity: 0;">
                                                                <ins class="iCheck-helper"
                                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                            </div>
                                                            &nbsp;
                                                            <div class="iradio" style="position: relative;"><input
                                                                        type="radio" name="rating" value="5"
                                                                        style="position: absolute; opacity: 0;">
                                                                <ins class="iCheck-helper"
                                                                     style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                            </div>
                                                            &nbsp;Хорошо
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <div class="col-xs-12 col-sm-8">
                                                        <label class="control-label" for="input-review">Ваш
                                                            отзыв:</label>
                                                        <textarea name="text" rows="5" id="input-review"
                                                                  class="form-control"></textarea>
                                                        <!--  <div class="help-block"><span style="color: #FF0000;">Примечание:</span> HTML разметка не поддерживается! Используйте обычный текст.</div> -->
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12 col-sm-8 ">
                                                        <div class="pull-right">
                                                            <button type="button" id="button-review"
                                                                    data-loading-text="Загрузка..."
                                                                    class="btn btn-primary">Отправить отзыв
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>


                                        <!--  <div class="box clearfix">
                                            <a class="next" href="https://kilosport.net/#myCarousel6045336" id="myCarousel6045336_next"><span></span></a>
                                            <a class="prev" href="https://kilosport.net/#myCarousel6045336" id="myCarousel6045336_prev"><span></span></a>

                                            <div class="box-heading">Рекомендуемые товары</div>
                                            <div class="strip-line"></div>
                                            <div class="box-content products related-products">
                                              <div class="box-product">
                                                  <div id="myCarousel6045336" class="carousel slide">
                                                      <div class="carousel-inner owl-carousel owl-theme" style="opacity: 1; display: block;">
                                                                                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1200px; left: 0px; display: block;"><div class="owl-item" style="width: 1200px;"><div class="active item"><div class="product-grid"><div class="row">  	    			  	    			<div class="col-sm-3 col-xs-6">
                                        <div class="product clearfix product-hover">
                                            <div class="left">

                                                                    <div class="ribbon green bestseller"><span>BestSeller</span></div>

                                                    <div class="image ">

                                                        <a href="https://kilosport.net/proteiny/steel-power-fast-whey-0-9kg">

                                                                                <img src="images/blank.gif" data-echo="https://kilosport.net/image/cache/catalog/5172eb0e7-80x80.png" alt="Steel Power Fast Whey 0.9кг" class="">
                                                                            </a>
                                                    </div>
                                                            </div>
                                            <div class="right">
                                                <div class="name" style="height: 119px;">
                                                    <div class="label-discount green saleclear">
                                                                    </div>
                                                    <a href="https://kilosport.net/proteiny/steel-power-fast-whey-0-9kg">Steel Power Fast Whey 0.9кг</a>
                                                    <div class="brand">Steel Power</div>
                                                                <div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
                                                                         <div class="availability">
                                                                 Наличие: <span class="available">Есть в наличии</span>
                                                             </div>
                                                </div>
                                                <div class="price">
                                                                1 300 руб.					</div>
                                                        <div class="only-hover">
                                                                                      <a onclick="cart.add(&#39;52&#39;);" class="button">Купить</a>
                                                         <a onclick="cart.oneclick(&#39;52&#39;);" class="button">Купить в 1 клик</a>
                                                                                             <ul>
                                                                        <li><a onclick="wishlist.add(&#39;52&#39;);" class="btn-add-to-compare">добавить в закладки</a></li>
                                                                                        <li><a onclick="compare.add(&#39;52&#39;);" class="btn-add-to-wishlist">Сравнить</a></li>
                                                                    </ul>

                                                </div>
                                                    </div>
                                        </div>  	    			</div>
                                                                                                                            <div class="col-sm-3 col-xs-6">
                                        <div class="product clearfix product-hover">
                                            <div class="left">


                                                    <div class="image ">

                                                        <a href="https://kilosport.net/proteiny/geneticlab-whey-pro-1kg">

                                                                                <img src="images/blank.gif" data-echo="https://kilosport.net/image/cache/catalog/yty-80x80.PNG" alt="GeneticLab Whey Pro 1кг" class="">
                                                                            </a>
                                                    </div>
                                                            </div>
                                            <div class="right">
                                                <div class="name" style="height: 119px;">
                                                    <div class="label-discount green saleclear">
                                                                    </div>
                                                    <a href="https://kilosport.net/proteiny/geneticlab-whey-pro-1kg">GeneticLab Whey Pro 1кг</a>
                                                    <div class="brand">GeneticLab</div>
                                                                         <div class="availability">
                                                                 Наличие: <span class="available">Есть в наличии</span>
                                                             </div>
                                                </div>
                                                <div class="price">
                                                                1 440 руб.					</div>
                                                        <div class="only-hover">
                                                                                      <a onclick="cart.add(&#39;89&#39;);" class="button">Купить</a>
                                                         <a onclick="cart.oneclick(&#39;89&#39;);" class="button">Купить в 1 клик</a>
                                                                                             <ul>
                                                                        <li><a onclick="wishlist.add(&#39;89&#39;);" class="btn-add-to-compare">добавить в закладки</a></li>
                                                                                        <li><a onclick="compare.add(&#39;89&#39;);" class="btn-add-to-wishlist">Сравнить</a></li>
                                                                    </ul>

                                                </div>
                                                    </div>
                                        </div>  	    			</div>
                                                                                                                            <div class="col-sm-3 col-xs-6">
                                        <div class="product clearfix product-hover">
                                            <div class="left">


                                                    <div class="image ">

                                                        <a href="https://kilosport.net/proteiny/mad-god-of-whey-1000gr">

                                                                                <img src="images/blank.gif" data-echo="https://kilosport.net/image/cache/catalog/777c6c751ff541a16dba4cf4cdb64d9d-80x80.jpg" alt="MAD GOD OF WHEY 1000gr" class="">
                                                                            </a>
                                                    </div>
                                                            </div>
                                            <div class="right">
                                                <div class="name" style="height: 119px;">
                                                    <div class="label-discount green saleclear">
                                                                    </div>
                                                    <a href="https://kilosport.net/proteiny/mad-god-of-whey-1000gr">MAD GOD OF WHEY 1000gr</a>
                                                    <div class="brand">MAD</div>
                                                                <div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
                                                                         <div class="availability">
                                                                 Наличие: <span class="available">Есть в наличии</span>
                                                             </div>
                                                </div>
                                                <div class="price">
                                                                1 190 руб.					</div>
                                                        <div class="only-hover">
                                                                                      <a onclick="cart.add(&#39;448&#39;);" class="button">Купить</a>
                                                         <a onclick="cart.oneclick(&#39;448&#39;);" class="button">Купить в 1 клик</a>
                                                                                             <ul>
                                                                        <li><a onclick="wishlist.add(&#39;448&#39;);" class="btn-add-to-compare">добавить в закладки</a></li>
                                                                                        <li><a onclick="compare.add(&#39;448&#39;);" class="btn-add-to-wishlist">Сравнить</a></li>
                                                                    </ul>

                                                </div>
                                                    </div>
                                        </div>  	    			</div>
                                                                            </div></div></div></div></div></div>      		<div class="owl-controls clickable" style="display: none;"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div></div></div></div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        -->
                                        <script type="text/javascript">
                                            $(document).ready(function () {
                                                var owl6045336 = $(".box #myCarousel6045336 .carousel-inner");

                                                $("#myCarousel6045336_next").click(function () {
                                                    owl6045336.trigger('owl.next');
                                                    return false;
                                                })
                                                $("#myCarousel6045336_prev").click(function () {
                                                    owl6045336.trigger('owl.prev');
                                                    return false;
                                                });

                                                owl6045336.owlCarousel({
                                                    slideSpeed: 500,
                                                    singleItem: true,
                                                });
                                            });
                                        </script>

                                    </div>
                                    <script type="text/javascript"><!--
                                        $('select[name=\'recurring_id\'], input[name="quantity"]').change(function () {
                                            $.ajax({
                                                url: 'index.php?route=product/product/getRecurringDescription',
                                                type: 'post',
                                                data: $('input[name=\'product_id\'], input[name=\'quantity\'], select[name=\'recurring_id\']'),
                                                dataType: 'json',
                                                beforeSend: function () {
                                                    $('#recurring-description').html('');
                                                },
                                                success: function (json) {
                                                    $('.alert, .text-danger').remove();

                                                    if (json['success']) {
                                                        $('#recurring-description').html(json['success']);
                                                    }
                                                }
                                            });
                                        });
                                        //--></script>
                                    <script type="text/javascript"><!--
                                        $('#button-cart').on('click', function () {

                                            let user_data = JSON.parse(localStorage.getItem("user_data"));
                                            let user_id;
                                            if (!user_data) {
                                                console.log('no');
                                                user_id = localStorage.getItem("temp_id");
                                            }

                                            let data = {};

                                            $.ajax({
                                                url: "components/cart.php",
                                                type: "POST",

                                            })

                                            /*$.ajax({
                                                url: 'index.php?route=checkout/cart/add',
                                                type: 'post',
                                                data: $('#product input[type=\'text\'], #product input[type=\'hidden\'], #product input[type=\'radio\']:checked, #product input[type=\'checkbox\']:checked, #product select, #product textarea'),
                                                dataType: 'json',
                                                beforeSend: function () {
                                                    $('#button-cart').button('loading');
                                                },
                                                complete: function () {
                                                    $('#button-cart').button('reset');
                                                },
                                                success: function (json) {
                                                    $('.alert, .text-danger').remove();
                                                    $('.form-group').removeClass('has-error');

                                                    if (json['error']) {
                                                        if (json['error']['option']) {
                                                            for (i in json['error']['option']) {
                                                                var element = $('#input-option' + i.replace('_', '-'));

                                                                if (element.parent().hasClass('input-group')) {
                                                                    element.parent().after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                                                                } else {
                                                                    element.after('<div class="text-danger">' + json['error']['option'][i] + '</div>');
                                                                }
                                                            }
                                                        }

                                                        if (json['error']['recurring']) {
                                                            $('select[name=\'recurring_id\']').after('<div class="text-danger">' + json['error']['recurring'] + '</div>');
                                                        }

                                                        // Highlight any found errors
                                                        $('.text-danger').parent().addClass('has-error');
                                                    }

                                                    if (json['success']) {
                                                        $.notify({
                                                            message: json['success'],
                                                            target: '_blank'
                                                        }, {
                                                            // settings
                                                            element: 'body',
                                                            position: null,
                                                            type: "info",
                                                            allow_dismiss: true,
                                                            newest_on_top: false,
                                                            placement: {
                                                                from: "top",
                                                                align: "right"
                                                            },
                                                            offset: 20,
                                                            spacing: 10,
                                                            z_index: 2031,
                                                            delay: 5000,
                                                            timer: 1000,
                                                            url_target: '_blank',
                                                            mouse_over: null,
                                                            animate: {
                                                                enter: 'animated fadeInDown',
                                                                exit: 'animated fadeOutUp'
                                                            },
                                                            onShow: null,
                                                            onShown: null,
                                                            onClose: null,
                                                            onClosed: null,
                                                            icon_type: 'class',
                                                            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-success" role="alert">' +
                                                            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                                                            '<span data-notify="message"><i class="fa fa-check-circle"></i>&nbsp; {2}</span>' +
                                                            '<div class="progress" data-notify="progressbar">' +
                                                            '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                                                            '</div>' +
                                                            '<a href="{3}" target="{4}" data-notify="url"></a>' +
                                                            '</div>'
                                                        });

                                                        $('#cart_block #cart_content').on("load", 'index.php?route=common/cart/info #cart_content_ajax');
                                                        $('#cart_block #total_price_ajax').on("load", 'index.php?route=common/cart/info #total_price');
                                                        $('#cart_block #cart_count_ajax').on("load", 'index.php?route=common/cart/info #cart_count');
                                                        $('#cart-total').html(json['total']);
                                                    }
                                                },
                                                error: function (xhr, ajaxOptions, thrownError) {
                                                    alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                                }
                                            });*/
                                        });
                                        //--></script>
                                    <!--<script type="text/javascript"><!--
                                    $('.date').datetimepicker({
                                        pickTime: false
                                    });

                                    $('.datetime').datetimepicker({
                                        pickDate: true,
                                        pickTime: true
                                    });

                                    $('.time').datetimepicker({
                                        pickDate: false
                                    });

                                    $('button[id^=\'button-upload\']').on('click', function() {
                                        var node = this;

                                        $('#form-upload').remove();

                                        $('body').prepend('<form enctype="multipart/form-data" id="form-upload" style="display: none;"><input type="file" name="file" /></form>');

                                        $('#form-upload input[name=\'file\']').trigger('click');

                                        timer = setInterval(function() {
                                            if ($('#form-upload input[name=\'file\']').val() != '') {
                                                clearInterval(timer);

                                                $.ajax({
                                                    url: 'index.php?route=tool/upload',
                                                    type: 'post',
                                                    dataType: 'json',
                                                    data: new FormData($('#form-upload')[0]),
                                                    cache: false,
                                                    contentType: false,
                                                    processData: false,
                                                    beforeSend: function() {
                                                        $(node).button('loading');
                                                    },
                                                    complete: function() {
                                                        $(node).button('reset');
                                                    },
                                                    success: function(json) {
                                                        $('.text-danger').remove();

                                                        if (json['error']) {
                                                            $(node).parent().find('input').after('<div class="text-danger">' + json['error'] + '</div>');
                                                        }

                                                        if (json['success']) {
                                                            alert(json['success']);

                                                            $(node).parent().find('input').attr('value', json['code']);
                                                        }
                                                    },
                                                    error: function(xhr, ajaxOptions, thrownError) {
                                                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                                                    }
                                                });
                                            }
                                        }, 500);
                                    });
                                    //</script>-->
                                    <script type="text/javascript"><!--
                                        $(document).ready(function () {
                                            $('.popup-gallery').magnificPopup({
                                                delegate: 'a.popup-image',
                                                type: 'image',
                                                tLoading: 'Loading image #%curr%...',
                                                mainClass: 'mfp-with-zoom',
                                                gallery: {
                                                    enabled: true,
                                                    navigateByImgClick: true,
                                                    preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
                                                },
                                                image: {
                                                    tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
                                                    titleSrc: function (item) {
                                                        return item.el.attr('title');
                                                    }
                                                }
                                            });
                                        });
                                        //--></script>

                                    <script type="text/javascript">
                                        var ajax_price = function () {
                                            $.ajax({
                                                type: 'POST',
                                                url: 'index.php?route=product/liveprice/index',
                                                data: $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\']:checked, .product-info input[type=\'checkbox\']:checked, .product-info select, .product-info textarea'),
                                                dataType: 'json',
                                                success: function (json) {
                                                    if (json.success) {
                                                        change_price('#price-special', json.new_price.special);
                                                        change_price('#price-tax', json.new_price.tax);
                                                        change_price('#price-old', json.new_price.price);
                                                    }
                                                }
                                            });
                                        }

                                        var change_price = function (id, new_price) {
                                            $(id).html(new_price);
                                        }

                                        $('.product-info input[type=\'text\'], .product-info input[type=\'hidden\'], .product-info input[type=\'radio\'], .product-info input[type=\'checkbox\'], .product-info select, .product-info textarea, .product-info input[name=\'quantity\']').on('change', function () {
                                            ajax_price();
                                        });
                                    </script>

                                    <script type="text/javascript">
                                        $.fn.tabs = function () {
                                            var selector = this;

                                            this.each(function () {
                                                var obj = $(this);

                                                $(obj.attr('href')).hide();

                                                $(obj).click(function () {
                                                    $(selector).removeClass('selected');

                                                    $(selector).each(function (i, element) {
                                                        $($(element).attr('href')).hide();
                                                    });

                                                    $(this).addClass('selected');

                                                    $($(this).attr('href')).show();

                                                    return false;
                                                });
                                            });

                                            $(this).show();

                                            $(this).first().click();
                                        };
                                    </script>
                                    <script>
                                        function getUrlVars() {
                                            var vars = {};
                                            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
                                                vars[key] = value;
                                            });
                                            return vars;
                                        }

                                        $(document).ready(() => {
                                            let id = getUrlVars()["id"];
                                            let views_history = JSON.parse(localStorage.getItem("view_history"))
                                            let _key = -1;
                                            let countOfItems = 8;
                                            if (views_history) {
                                                views_history.forEach((i, key) => {
                                                    if (i == id) {
                                                        _key = key;
                                                    }
                                                });
                                                if (Object.keys(views_history).length == countOfItems && _key == -1) {
                                                    views_history.shift();
                                                }
                                            }
                                            else {
                                                views_history = [];
                                            }
                                            console.log(_key);
                                            if (_key == -1) {
                                                views_history.push(id);
                                            }
                                            localStorage.setItem("view_history", JSON.stringify(views_history));
                                        });
                                    </script>
                                    <script type="text/javascript"><!--
                                        $('#tabs a').tabs();
                                        //--></script>

                                    <script type="text/javascript" src="js/jquery.elevateZoom-3.0.3.min.js"></script>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "BreadcrumbList",
"itemListElement": [{
"@type": "ListItem",
"position": 1,
"item": {
"@id": "https://kilosport.net/",
"name": "Килоспорт"
}
},{
"@type": "ListItem",
"position": 2,
"item": {
"@id": "https://kilosport.net/proteiny",
"name": "Протеины"
}
}]
}	  


                            </script>
                            <span itemscope="" itemtype="http://schema.org/BreadcrumbList">
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<link itemprop="item" href="https://kilosport.net/">
<meta itemprop="name" content="Килоспорт">
<meta itemprop="position" content="1">
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<link itemprop="item" href="https://kilosport.net/proteiny">
<meta itemprop="name" content="Протеины">
<meta itemprop="position" content="2">
</span>
</span>
                            <script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Organization",
"url": "https://kilosport.net/",
"name": "Килоспорт",
"email": "evgen-atlet75@mail.ru",
"logo": "https://kilosport.net/image/catalog/3.png",
"description": "магазин Килоспорт",			  
"potentialAction": {
"@type": "SearchAction",
"target": "https://kilosport.net/index.php?route=product/search&search={search_term_string}",
"query-input": "required name=search_term_string"
},	  
"contactPoint" : [
{
"@type" : "ContactPoint",
"telephone" : "+7-913-382-22-70",
"contactType" : "customer service"
}]	  
}	  


                            </script>
                            <span itemscope="" itemtype="http://schema.org/Organization">
<meta itemprop="name" content="Килоспорт">
<link itemprop="url" href="https://kilosport.net/">
<link itemprop="logo" href="images/3.png">
<meta itemprop="description" content="магазин Килоспорт"><meta itemprop="email" content="evgen-atlet75@mail.ru">
<meta itemprop="telephone" content="+7-913-382-22-70">
<span itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
<meta itemprop="ratingValue" content="4.6896551724138">
<meta itemprop="reviewCount" content="29">
</span>
<form itemprop="potentialAction" itemscope="" itemtype="http://schema.org/SearchAction">
<meta itemprop="target" content="https://kilosport.net/index.php?route=product/search&amp;search={search_term_string}">
<input itemprop="query-input" type="text" required="" name="search_term_string" style="display:none;">
</form>		  
</span>
                            <script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "Product",
"url": "https://kilosport.net/proteiny/geon-excellent-whey-920gr",
"image": "https://kilosport.net/image/cache/catalog/geon-500x500_enl-228x228.jpg",
"brand": "GEON",
"manufacturer": "GEON",
"model": "GEON Excellent Whey 920гр",
"aggregateRating": {
"@type": "AggregateRating",
"ratingValue": "4",
"reviewCount": "1"
},"description": "  Когда организм подвергается усиленным тренировкам, то ему необходимо усиленное питние. Но получить много белка из обычных источников пищи почти невозможно. Концентрированный сывороточный протеин GEON Excellent Whey 920 гр – это качественный продукт, который производится с использованием инновационной технологии микрофильтрации. Данный продукт содержит высокую эффективность и биологическую активность за счет свободных аминокислот и специальных компонентов. Excellent Whey количество лактозы сведено к минимуму. За счет натуральных и качественных ароматизаторов и сукралозы имеет хороший и не навязчивый вкус. Купить протеин можно с разными вкусовыми добавками, а главное без сахара! Принимать Excellent Whey можно, смешав с водой или не жирным молоком. Для предотвращения катаболизма протеин принимают сразу после тренировки.  Состав на порцию (30 порций) 30 гр: Калории 147 ккал Калории из жира 11,7 ккал Жиры 1,3 гр Углеводы 1,96 гр Сахар 0 гр Бетаин 0,4 гр Глицин 1,45 гр Белок 23,8 гр Незаменимые аминокислоты: Триптофан 405 мг Валин 1422 мг Треонин 1654 мг Изолейцин 1573 мг Лейцин 2531 мг Лизин 2233 мг Фенилаланин 748 мг Метионин 492 мг Условно незаменимые аминокислоты: Аргинин 505 мг Цистин 494 мг Тирозин 703 мг Гистидин 423 мг Пролин 1509 мг Глютамин/глютаминовая кислота 4082 мг Заменимые аминокислоты: Аспарагиновая кислота 2508 мг Серин 1126 мг Глицин 1862 мг Аланин 1180 мг Бетаин 400 мг Другие ингредиенты: концентрат сывороточного белка, глицин, бетаина гидрохлорид, лецитин, цитрусовые пищевые волокна, эмульгатор, загуститель - ксантановая камедь, подсластитель - сукралоза, ароматизаторы, идентичные натуральным.  Применение Взрослым по 4 мерные ложки (60 г), растворив в воде или в обезжиренном молоке, 1 раз в день за час до еды или перед физическими нагрузками или по 2 мерные ложки (30 г), растворив в воде или обезжиренном молоке, 2 раза в день за час до еды или перед физическими нагрузками.  Противопоказания Индивидуальная непереносимость компонентов продукта, беременность и кормление грудью. Перед применением рекомендуется проконсультироваться с врачом. Интернет-магазин «Килоспорт» предлагает широкий выбор качественного спортивного питания по привлекательным ценам. GEON Excellent Whey 920гр производителя GEON - это качество известное многим. GEON Excellent Whey 920гр 1350 р. с доставкой по Новосибирску и области. По всем вопросам подбора спортпита - обращайтесь к нашим менеджерам. Будьте красивыми и здоровыми вместе с нами!",
"name": "Протеин GEON Excellent Whey 920гр",
"offers": {
"@type": "Offer",
"availability": "http://schema.org/InStock",
"price": "1280",
"priceCurrency": "RUB"
},
"review": [
{
"@type": "Review",
"author": "Лёлик",
"datePublished": "2017-04-27",
"description": "Сладенький. Брал шоколад , вкус на 4 с  - . Про остальные не знаю",
"reviewRating": {
"@type": "Rating",
"bestRating": "5",
"ratingValue": "4",
"worstRating": "1"
}
}],"isRelatedTo": [ 
{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/5172eb0e7-80x80.png",
"url": "https://kilosport.net/proteiny/steel-power-fast-whey-0-9kg",
"name": "Steel Power Fast Whey 0.9кг",
"description": " В случае увеличения нагрузки на организм, мышцам необходимо увеличить потребление белков. Но п..",
"offers": {
"@type": "Offer",
"price": "1300",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/yty-80x80.PNG",
"url": "https://kilosport.net/proteiny/geneticlab-whey-pro-1kg",
"name": "GeneticLab Whey Pro 1кг",
"description": "Протеин Whey усваивается постепенно, благодаря сывороточному белку. Большое содержание белка по..",
"offers": {
"@type": "Offer",
"price": "1440",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/777c6c751ff541a16dba4cf4cdb64d9d-80x80.jpg",
"url": "https://kilosport.net/proteiny/mad-god-of-whey-1000gr",
"name": "MAD GOD OF WHEY 1000gr",
"description": " При интенсивных тренировках организму не хватает белков, получаемых с пищей. Для человека, зан..",
"offers": {
"@type": "Offer",
"price": "1190",
"priceCurrency": "RUB"
}
} 	
]
}


                            </script>

                            <span itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Протеин GEON Excellent Whey 920гр">
<link itemprop="url" href="https://kilosport.net/proteiny/geon-excellent-whey-920gr">
<link itemprop="image" href="https://kilosport.net/image/cache/catalog/geon-500x500_enl-228x228.jpg">
<meta itemprop="brand" content="GEON">
<meta itemprop="manufacturer" content="GEON">
<meta itemprop="model" content="GEON Excellent Whey 920гр">
<span itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
<meta itemprop="ratingValue" content="4">
<meta itemprop="reviewCount" content="1">
</span>
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1280">
<link itemprop="availability" href="http://schema.org/InStock">
</span>
<meta itemprop="description"
      content="  Когда организм подвергается усиленным тренировкам, то ему необходимо усиленное питние. Но получить много белка из обычных источников пищи почти невозможно. Концентрированный сывороточный протеин GEON Excellent Whey 920 гр – это качественный продукт, который производится с использованием инновационной технологии микрофильтрации. Данный продукт содержит высокую эффективность и биологическую активность за счет свободных аминокислот и специальных компонентов. Excellent Whey количество лактозы сведено к минимуму. За счет натуральных и качественных ароматизаторов и сукралозы имеет хороший и не навязчивый вкус. Купить протеин можно с разными вкусовыми добавками, а главное без сахара! Принимать Excellent Whey можно, смешав с водой или не жирным молоком. Для предотвращения катаболизма протеин принимают сразу после тренировки.  Состав на порцию (30 порций) 30 гр: Калории 147 ккал Калории из жира 11,7 ккал Жиры 1,3 гр Углеводы 1,96 гр Сахар 0 гр Бетаин 0,4 гр Глицин 1,45 гр Белок 23,8 гр Незаменимые аминокислоты: Триптофан 405 мг Валин 1422 мг Треонин 1654 мг Изолейцин 1573 мг Лейцин 2531 мг Лизин 2233 мг Фенилаланин 748 мг Метионин 492 мг Условно незаменимые аминокислоты: Аргинин 505 мг Цистин 494 мг Тирозин 703 мг Гистидин 423 мг Пролин 1509 мг Глютамин/глютаминовая кислота 4082 мг Заменимые аминокислоты: Аспарагиновая кислота 2508 мг Серин 1126 мг Глицин 1862 мг Аланин 1180 мг Бетаин 400 мг Другие ингредиенты: концентрат сывороточного белка, глицин, бетаина гидрохлорид, лецитин, цитрусовые пищевые волокна, эмульгатор, загуститель - ксантановая камедь, подсластитель - сукралоза, ароматизаторы, идентичные натуральным.  Применение Взрослым по 4 мерные ложки (60 г), растворив в воде или в обезжиренном молоке, 1 раз в день за час до еды или перед физическими нагрузками или по 2 мерные ложки (30 г), растворив в воде или обезжиренном молоке, 2 раза в день за час до еды или перед физическими нагрузками.  Противопоказания Индивидуальная непереносимость компонентов продукта, беременность и кормление грудью. Перед применением рекомендуется проконсультироваться с врачом. Интернет-магазин «Килоспорт» предлагает широкий выбор качественного спортивного питания по привлекательным ценам. GEON Excellent Whey 920гр производителя GEON - это качество известное многим. GEON Excellent Whey 920гр 1350 р. с доставкой по Новосибирску и области. По всем вопросам подбора спортпита - обращайтесь к нашим менеджерам. Будьте красивыми и здоровыми вместе с нами!">
<span itemprop="review" itemscope="" itemtype="http://schema.org/Review">
<meta itemprop="author" content="Лёлик">
<meta itemprop="datePublished" content="2017-04-27">
<span itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
<meta itemprop="worstRating" content="1">
<meta itemprop="ratingValue" content="4">
<meta itemprop="bestRating" content="5">
</span>
<meta itemprop="description" content="Сладенький. Брал шоколад , вкус на 4 с  - . Про остальные не знаю">
</span>
<span id="related-product-1" itemprop="isRelatedTo" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Steel Power Fast Whey 0.9кг">
<meta itemprop="description"
      content=" В случае увеличения нагрузки на организм, мышцам необходимо увеличить потребление белков. Но п..">
<link itemprop="url" href="https://kilosport.net/proteiny/steel-power-fast-whey-0-9kg">
<link itemprop="image" href="https://kilosport.net/image/cache/catalog/5172eb0e7-80x80.png">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1300">
</span>	   
</span>	
<span id="related-product-2" itemprop="isRelatedTo" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GeneticLab Whey Pro 1кг">
<meta itemprop="description"
      content="Протеин Whey усваивается постепенно, благодаря сывороточному белку. Большое содержание белка по..">
<link itemprop="url" href="https://kilosport.net/proteiny/geneticlab-whey-pro-1kg">
<link itemprop="image" href="https://kilosport.net/image/cache/catalog/yty-80x80.PNG">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1440">
</span>	   
</span>	
<span id="related-product-3" itemprop="isRelatedTo" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="MAD GOD OF WHEY 1000gr">
<meta itemprop="description"
      content=" При интенсивных тренировках организму не хватает белков, получаемых с пищей. Для человека, зан..">
<link itemprop="url" href="https://kilosport.net/proteiny/mad-god-of-whey-1000gr">
<link itemprop="image" href="https://kilosport.net/image/cache/catalog/777c6c751ff541a16dba4cf4cdb64d9d-80x80.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1190">
</span>	   
</span>	
</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? include_once('includes/footer.php'); ?>