<?
include_once ('index.php');
include_once('includes/header.php');
$page = $_GET["page"];
$id = $_GET["id"];
$sql = "SELECT category_name as `name` FROM `category_product` WHERE category_id = '$id'";
$result = $conn->query($sql);
$category = mysqli_fetch_array($result, MYSQLI_ASSOC);

$shop_id = $_COOKIE["city_id"];
if (!$shop_id) {
    $shop_id = 87;
}

$sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id";
$products = $conn->query($sql);
$countTotal = $products->num_rows;
$countOfPages = $countTotal / 15;
$countOfPages = ceil($countOfPages);
$limitStart = 0;
$limit = 15;
if (!$page) {
    $page = 1;
}
$limitStart = ($limit * ($page - 1));
$sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id";
if (isset($_GET["sort"])) {
    $sort = $_GET["sort"];
    $order = $_GET["order"];
    if ($sort == "name") {
        $sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_name";
    }
    if ($sort == "cost") {
        $sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY prodazhnaya_cena";
    }
    if ($order == "desc") {
        $sql .= " DESC";
    }
    if ($order == "asc") {
        $sql .= " ASC";
    }
}
$sql .= " LIMIT " . $limitStart . ", " . $limit;
$products = $conn->query($sql);
?>
    <script type="text/javascript" src="js/ajax-scripts.js" defer></script>
    <script>
        function getUrlVars() {
            var vars = {};
            var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
                vars[key] = value;
            });
            return vars;
        }

        let url = window.location.pathname.substr(1);
        $.ajax({
            url: "components/data_grabber.php",
            method: "POST",
            data: {id: getUrlVars().id, data: url},
            success: function (data) {
                let element = $('.product-grid.active');
                let count = 0;
                data = JSON.parse(data);
                /* data.forEach(function (item, key, arr) {
                     if((key)%3==0 || key == 0){
                         element.append('<div class="row">');
                     }
                     if((key+1)%3==0){
                         element.append('</div>');
                     }
                     let count = key;
                 });
                 if(!((count+1)%3==0)){
                     element.append('</div>');
                 }*/
            }
        })
    </script>
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
                        <span id="title-page"><?= $category["name"]; ?></span>
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
                        <div class="col-md-3" id="column-left">

                            <div id="megamenu_770000" class="container-megamenu container vertical">
                                <div id="menuHeading">
                                    <div class="megamenuToogle-wrapper">
                                        <div class="megamenuToogle-pattern">
                                            <div class="container">
                                                Все категории
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="megamenu-wrapper">
                                    <div class="megamenu-pattern">
                                        <div class="container">
                                            <ul class="megamenu shift-down">
                                                <?
                                                $sql = "SELECT category_id as `id`, category_name as `name` FROM `category_product` ORDER BY category_name";
                                                $data = $conn->query($sql);
                                                foreach ($data as $item) {
                                                    echo ' <li class=""><p class="close-menu"></p>
                                                        <p class="open-menu mobile-disabled"></p><a
                                                                href="/category.php?id=' . $item["id"] . '"
                                                                class="clearfix"><span><strong>' . $item["name"] . '</strong></span></a>
                                                    </li>';
                                                }
                                                ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script type="text/javascript">
                                $(window).on("load", function () {
                                    var css_tpl = '<style type="text/css">';
                                    css_tpl += '#megamenu_770000 ul.megamenu > li > .sub-menu > .content {';
                                    css_tpl += '-webkit-transition: all 500ms ease-out !important;';
                                    css_tpl += '-moz-transition: all 500ms ease-out !important;';
                                    css_tpl += '-o-transition: all 500ms ease-out !important;';
                                    css_tpl += '-ms-transition: all 500ms ease-out !important;';
                                    css_tpl += 'transition: all 500ms ease-out !important;';
                                    css_tpl += '}</style>'
                                    $("head").append(css_tpl);
                                });
                            </script>

                            <div class="box" style="display:none;">
                                <div class="box-heading">Фильтр</div>
                                <div class="strip-line"></div>
                                <div class="box-content">
                                    <ul class="box-filter">
                                        <li><span id="filter-group5">Бренд</span>
                                            <ul>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="42" id="filter42"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter42" class="">BSN (2)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="33" id="filter33"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter33">QNT (1)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="21" id="filter21"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter21">GENETICLAB (3)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="19" id="filter19"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter19">GEON (5)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="23" id="filter23"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter23">IRONMAN (4)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="26" id="filter26"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter26">MAXLER (1)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="57" id="filter57"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter57">NATROL (2)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="48" id="filter48"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter48">OPTIMUM NUTRITION (1)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="36" id="filter36"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter36">SIBERIAN NUTROGUNZ (0)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="37" id="filter37"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter37">STEEL POWER (0)</label>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span id="filter-group7">Наличие</span>
                                            <ul>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="17" id="filter17"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter17">Есть в наличии (11)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="18" id="filter18"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter18">Нет в наличии (8)</label>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span id="filter-group6">Ярлык</span>
                                            <ul>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="16" id="filter16"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter16">Акция (3)</label>
                                                </li>
                                                <li>
                                                    <div class="icheckbox" style="position: relative;"><input
                                                                type="checkbox" value="15" id="filter15"
                                                                style="position: absolute; opacity: 0;">
                                                        <ins class="iCheck-helper"
                                                             style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                    </div>
                                                    <label for="filter15">Новинка (2)</label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <a id="button-filter" class="button">Поиск</a>
                                </div>
                            </div>
                            <script type="text/javascript"><!--
                                $('#button-filter').bind('click', function () {
                                    filter = [];

                                    $('.box-filter input[type=\'checkbox\']:checked').each(function (element) {
                                        filter.push(this.value);
                                    });

                                    location = 'https://kilosport.net/aminokisloty&filter=' + filter.join(',');
                                });
                                //--></script>
                            <div class="box clearfix box-with-products ">

                                <div class="box-heading">Новинки</div>
                                <div class="strip-line"></div>
                                <div class="box-content products">
                                    <div class="box-product">
                                        <div id="myCarousel8166783">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <div class="active item">
                                                    <div class="product-grid active">
                                                        <div class="row">
                                                            <?php
                                                            $sql = "SELECT * FROM `product` WHERE product_category_id = '$id' AND `product_shop_id` = '$shop_id' GROUP BY product_name, ves_kolvo_tabletok, prodazhnaya_cena ORDER BY product_id DESC LIMIT 5";
                                                            $new_products = mysqli_query($conn, $sql);
                                                            foreach ($new_products as $item){
                                                                echo '<div class="block col-sm-4 col-xs-12  new__product__card" style="border: 1px solid #e6e6e7; margin-bottom: 10px;">
                                                                <!-- Product -->
                                                                <div class="product clearfix product-hover">
                                                                    <div class="left">

                                                                        <div class="ribbon blue latest"><span>New</span>
                                                                        </div>

                                                                        <div class="image ">

                                                                            <a href="/product.php?id=' . $item["product_id"] .'">

                                                                                <img src="http://iron.controlsoft.kz/' . $item["product_img"] . '"
                                                                                     alt="Mutant Mass 2270 гр" class="">
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="right">
                                                                        <div class="name" style="">
                                                                            <div class="label-discount green saleclear">
                                                                            </div>
                                                                            <a href="/product.php?id=' . $item["product_id"] .'">' . $item["product_name"] . " " . $item["ves_kolvo_tabletok"] . '</a>
                                                                            <div class="availability">
                                                                                Наличие: <span class="available">Есть в наличии</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="price">
                                                                            ' . $item["prodazhnaya_cena"] . ' тенге
                                                                        </div>
                                                                        <div class="only-hover">
                                                                            <a onclick="add_to_cart(' . $product["product_id"] . ')"
                                                                               class="button">Купить</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>';
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">


                            <div class="row">
                                <div class="col-md-12 center-column" id="content">
                                    <h1><?= $category["name"]; ?></h1>

                                    <div id="mfilter-content-container">
                                        <!-- Filter -->
                                        <div class="product-filter clearfix">
                                            <div class="options">
                                                <!--  <div class="product-compare"><a
                                                              href="https://kilosport.net/compare-products"
                                                              id="compare-total">Сравнение товаров (0)</a></div>-->

                                                <div class="button-group display" data-toggle="buttons-radio">
                                                    <button class="active" id="grid" rel="tooltip" title="Grid"
                                                            onclick="display(&#39;grid&#39;);"><i
                                                                class="fa fa-th-large"></i></button>
                                                    <button id="list" rel="tooltip" title="List"
                                                            onclick="display(&#39;list&#39;);"><i
                                                                class="fa fa-th-list"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="list-options">
                                                <div class="sort">
                                                    Сортировка: <select onchange="location = this.value">
                                                        <option value="/category.php?id=<?= $id ?>&page=<?= $page ?>">По
                                                            умолчанию
                                                        </option>
                                                        <option value="/category.php?id=<?= $id ?>&sort=name&order=asc&page=<?= $page ?>">
                                                            Название (А - Я)
                                                        </option>
                                                        <option value="/category.php?id=<?= $id ?>&sort=name&order=desc&page=<?= $page ?>">
                                                            Название (Я - А)
                                                        </option>
                                                        <option value="/category.php?id=<?= $id ?>&sort=cost&order=asc&page=<?= $page ?>">
                                                            Цена (низкая &gt; высокая)
                                                        </option>
                                                        <option value="/category.php?id=<?= $id ?>&sort=cost&order=desc&page=<?= $page ?>">
                                                            Цена (высокая &gt; низкая)
                                                        </option>
                                                    </select>
                                                </div>

                                                <div class="limit">
                                                    Показать: <select onchange="location = this.value;">
                                                        <option value="https://kilosport.net/aminokisloty?limit=15"
                                                                selected="selected">15
                                                        </option>
                                                        <option value="https://kilosport.net/aminokisloty?limit=25">25
                                                        </option>
                                                        <option value="https://kilosport.net/aminokisloty?limit=50">50
                                                        </option>
                                                        <option value="https://kilosport.net/aminokisloty?limit=75">75
                                                        </option>
                                                        <option value="https://kilosport.net/aminokisloty?limit=100">100
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Products list -->
                                        <div class="product-list">
                                            <!-- Product -->
                                            <?php
                                            foreach ($products as $key => $product) {
                                                $sql = "SELECT COUNT(*) as `count` FROM `product_sell` WHERE `product_single_id` = " . $product["product_id"] . " AND `product_status` = 1";
                                                $result = mysqli_fetch_assoc($conn->query($sql));
                                                echo '<div>

                                            <div class="row">

                                                <div class="image col-sm-4">


                                                    <a href="/product.php?id=' . $product["product_id"] . '"><img
                                                                src="http://iron.controlsoft.kz/' . $product["product_img"] . '"
                                                                alt="' . $product["product_name"] . '"></a>
                                                </div>

                                                <div class="name-desc col-sm-5">
                                                    <div class="name">
                                                        <a href="/product.php?id=' . $product["product_id"] . '">' . $product["product_name"] . ' ' . $product["ves_kolvo_tabletok"] . '</a>
                                                        <div class="brand"></div>
                                                    </div>
                                                    <div class="description">' . $product["product_desc"] . '
                                                    </div>

                                                </div>

                                                <div class="actions col-sm-3">
                                                    <div>
                                                        <div class="price">
                                                            ' . $product["prodazhnaya_cena"] . ' тенге
                                                        </div>
                                                        <div class="availability">
                                                            Наличие: <span class="available">';
                                                if ($result["count"] > 0) {
                                                    echo 'Есть в наличии';
                                                } else {
                                                    echo 'Нет в наличии';
                                                }
                                                echo '</span>
                                                        </div>';
                                                if($result["count"] > 0){
                                                echo '
                                                        <div class="add-to-cart">
                                                            <a onclick="add_to_cart(' . $product["product_id"] . ')"
                                                               class="button" style="margin-bottom: 5px">Купить</a>
                                                        </div>
                                                        ';}
                                                        echo '

                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                            }
                                            ?>
                                            <script>
                                                $(document).ready(() => {
                                                    let el = $('.image > a > img');
                                                })
                                            </script>
                                        </div>

                                        <!-- Products grid -->
                                        <div class="product-grid active">
                                            <?
                                            $k = 0;
                                            foreach ($products as $key => $product) {
                                                $sql = "SELECT COUNT(*) as `count` FROM `product_sell` WHERE `product_single_id` = " . $product["product_id"] . " AND `product_status` = 1";
                                                $result = mysqli_fetch_assoc($conn->query($sql));
                                                if (($key) % 3 == 0 || $key == 0) {
                                                    echo '<div class="row">';
                                                }
                                                echo '<div class="col-sm-4 col-xs-6"><div class="product clearfix product-hover">

                                                    <div class="left">


                                                        <div class="image d-flex" style="height: 220px; justify-content: center">

                                                            <a href="/product.php?id=' . $product["product_id"] . '">

                                                                <img src="http://iron.controlsoft.kz/' . $product["product_img"] . '"
                                                                     alt="BSN Amino X 435 г" class="" style="max-height: 216px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="right">
                                                        <div class="name" style="height: 107px;">
                                                            <div class="label-discount green saleclear">
                                                            </div>
                                                            <a href="/product.php?id=' . $product["product_id"] . '">' . $product["product_name"] . '<br>' . $product["ves_kolvo_tabletok"] . '</a>
                                                            <br>
                                                            <div class="availability">
                                                                Наличие: <span class="available">'; if($result["count"] > 0){echo 'Есть в наличии';}else{echo 'Нет в наличии';}echo '</span>
                                                            </div>
                                                        </div>
                                                        <div class="price">
                                                            ' . $product["prodazhnaya_cena"] . ' тенге
                                                        </div>
                                                        <div class="only-hover"'; if($result["count"] == 0) echo 'style="visibility: hidden;"'; echo'>
                                                            <a onclick="add_to_cart(' . $product["product_id"] . ')"
                                                               class="button" style="width: 80%;">Купить</a>
                                                        </div>
                                                    </div>
                                                </div></div>';
                                                if (($key + 1) % 3 == 0) {
                                                    echo '</div>';
                                                }
                                            }
                                            $count = $products->num_rows;
                                            if (!($count + 1) % 3 == 0) {
                                                echo '</div>';
                                            }
                                            ?>
                                        </div>

                                        <div class="row pagination-results">
                                            <div class="col-sm-7 text-left">
                                                <ul class="pagination">
                                                    <?
                                                    for ($i = 0; $i < $countOfPages; $i++) {
                                                        echo '<li></li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </div>
                                            <div class="col-sm-5 text-right">Показано с <?= $limitStart + 1 ?>
                                                по <?= ceil(($countTotal) / (($countOfPages - $page) + 1)) ?>
                                                из <?= $countTotal; ?> (всего <?= $countOfPages; ?> страниц)
                                            </div>
                                        </div>
                                        <div class="category-info clearfix">
                                            <p><br></p></div>

                                        <script type="text/javascript"><!--
                                            function display(view) {

                                                if (view == 'list') {
                                                    $('.product-grid').removeClass("active");
                                                    $('.product-list').addClass("active");

                                                    $('.display').html('<button id="grid" rel="tooltip" title="Grid" onclick="display(\'grid\');"><i class="fa fa-th-large"></i></button> <button class="active" id="list" rel="tooltip" title="List" onclick="display(\'list\');"><i class="fa fa-th-list"></i></button>');

                                                    localStorage.setItem('display', 'list');
                                                } else {

                                                    $('.product-grid').addClass("active");
                                                    $('.product-list').removeClass("active");

                                                    $('.display').html('<button class="active" id="grid" rel="tooltip" title="Grid" onclick="display(\'grid\');"><i class="fa fa-th-large"></i></button> <button id="list" rel="tooltip" title="List" onclick="display(\'list\');"><i class="fa fa-th-list"></i></button>');

                                                    localStorage.setItem('display', 'grid');
                                                }
                                            }

                                            if (localStorage.getItem('display') == 'list') {
                                                display('list');
                                            } else {
                                                display('grid');
                                            }
                                            //--></script>
                                    </div>
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
}]
}

                        
                            </script>
                            <span itemscope="" itemtype="http://schema.org/BreadcrumbList">
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
<link itemprop="item" href="https://kilosport.net/">
<meta itemprop="name" content="Килоспорт">
<meta itemprop="position" content="1">
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
<link itemprop="logo"
      href="category_img/3.png">
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
"name": "Аминокислоты",
"description": "",
"url": "https://kilosport.net/aminokisloty",
"offers": {
"@type": "AggregateOffer",
"priceCurrency": "RUB",
"lowPrice": "390",
"highPrice": "1430",
"offerCount": "15"
}
}

                        
                            </script>
                            <span itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Аминокислоты">
<link itemprop="url" href="https://kilosport.net/aminokisloty">
<meta itemprop="description" content="">
<span itemtype="http://schema.org/AggregateOffer" itemscope="" itemprop="offers">
<meta content="15" itemprop="offerCount">
<meta content="1430" itemprop="highPrice">
<meta content="390" itemprop="lowPrice">
<meta content="RUB" itemprop="priceCurrency">
</span>
</span>
                            <script type="application/ld+json">
{
"@context": "http://schema.org",
"@type": "ItemList",
"name": "Аминокислоты",
"url": "https://kilosport.net/aminokisloty",
"numberOfItems": "15",
"itemListElement": [
{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/3dfv8kc55iluc4x5azyu-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/bsn-amino-x-435-g",
"name": "FFFFFF",
"description": "В нашем магазине вы можете купить спортивное питание BSN Amino X: это аминокислоты, которые жизненно..",
"offers": {
"@type": "Offer",
"price": "1340",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/BSN-AminoX-Edge-Review_AI_1-228x228.png",
"url": "https://kilosport.net/aminokisloty/bsn-amino-x-edge-420-gr",
"name": "BSN Amino X EDGE 420 гр. ",
"description": "Добавка Amino X EDGE представляет собой комплекс аминокислот с повышенным содержанием кофеина, котор..",
"offers": {
"@type": "Offer",
"price": "1340",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/6ccf35c3ceaff3b72277f1fe2238528f-228x228.jpg",
"url": "https://kilosport.net/specialnye-preparaty/geneticlab-aakg-150g",
"name": "Geneticlab AAKG 150g",
"description": "В основу пищевой добавки AAKG входит одна из самых важных аминокислот, которая стимулирует выработку..",
"offers": {
"@type": "Offer",
"price": "780",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/75bd0431fcbb04bcb74e4e6c69f61802-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/geneticlab-glutamine-capsules-180gr-90serv",
"name": "Geneticlab GLUTAMINE capsules 180gr/90serv",
"description": "Состав: глутамин, вспомогательные вещества – мальтодекстрин, твердая желатиновая капсула (желатин –..",
"offers": {
"@type": "Offer",
"price": "920",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/2a609a0b1e47ee29db6a01a1b53e53fc-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/geneticlab-glutamine-powder-300gr",
"name": "GeneticLab Glutamine Powder 300гр",
"description": "Глутамин - условно незаменимая аминокислота, необходимая для эффективного роста мышц и поддержки имм..",
"offers": {
"@type": "Offer",
"price": "850",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/aakg570-1-228x228.jpg",
"url": "https://kilosport.net/predtrenirovochnye-kompleksy/geon-aakg-nitro-power-120t",
"name": "GEON AAKG Nitro Power 120т",
"description": "AAKG Nitro Power это соль Л-аргинина и альфа кетоглютаровой кислоты.Постоянно присутствующий в орган..",
"offers": {
"@type": "Offer",
"price": "890",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/735-500x500-228x228.jpg",
"url": "https://kilosport.net/predtrenirovochnye-kompleksy/geon-aakg-nitro-power-150g",
"name": "GEON AAKG nitro power 150g",
"description": "Создавая новый препарат, основной задачей ученых было получить высокоэффективный и в тоже время нату..",
"offers": {
"@type": "Offer",
"price": "790",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/geon-complete-amino-360-tabs-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/geon-amino-complete-360-tab",
"name": "GEON Amino Complete 360 таб",
"description": "Комплекс добавок Amino Complete включает в свой состав аминокислоты позволяющие добиться скорейшего ..",
"offers": {
"@type": "Offer",
"price": "1430",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/525-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/geon-glutamine-power-180k",
"name": "GEON Glutamine Power 180к",
"description": "Аминокислота производителя GEON - Glutamine Power 180к – это пищевая добавка в капсулах, содержащая ..",
"offers": {
"@type": "Offer",
"price": "720",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/geon-glutamine-power-300-228x228.jpg",
"url": "https://kilosport.net/specialnye-preparaty/geon-glutamine-power-300gr",
"name": "GEON Glutamine Power 300гр",
"description": "Glutamine Power предлагается покупателям в интернет-магазинах спортивного питания в порошкообразном ..",
"offers": {
"@type": "Offer",
"price": "780",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/12249-228x228.png",
"url": "https://kilosport.net/aminokisloty/ironman-amino-2500-224-tab",
"name": "Ironman Amino 2500 224 таб",
"description": "Аминокислотный комплекс Amino 2500 представляет собой сбалансированный препарат, создающий препятств..",
"offers": {
"@type": "Offer",
"price": "970",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/AMINO-2500-72-tab-ironman-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/ironman-amino-2500-72t",
"name": "IRONMAN™ Amino 2500 72т",
"description": "Amino 2500 - это научно-сбалансированный источник аминокислот, позволяющий эффективно восстановить а..",
"offers": {
"@type": "Offer",
"price": "390",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/12179-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/ironman-amino-3600-100t",
"name": "IRONMAN™ Амино 3600 100т",
"description": "Амино 3600 научно-сбалансированный источник кислот с улучшенным профилем. Комплекс создан на базе на..",
"offers": {
"@type": "Offer",
"price": "620",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/12179-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/ironman-amino-3600-200t",
"name": "IRONMAN™ Амино 3600 200т",
"description": "Амино 3600 научно-сбалансированный источник кислот с улучшенным профилем. Комплекс создан на базе на..",
"offers": {
"@type": "Offer",
"price": "1100",
"priceCurrency": "RUB"
}
},{
"@type": "Product",
"image": "https://kilosport.net/image/cache/catalog/maxler_whey_amino_tabs_2000-300______..500x500-228x228.jpg",
"url": "https://kilosport.net/aminokisloty/maxler-whey-amino-tabs-2000-300-t",
"name": "Maxler Whey Amino Tabs 2000 300 т",
"description": "Комплекс аминокислот Whey AminoTabs компании Макслер станет идеальным вариантом всем, кто стремиться..",
"offers": {
"@type": "Offer",
"price": "1240",
"priceCurrency": "RUB"
}
} ]
}

                        
                            </script>
                            <span itemtype="http://schema.org/ItemList" itemscope="">
<link itemprop="url" href="https://kilosport.net/aminokisloty">
<meta itemprop="name" content="Аминокислоты">
<meta itemprop="numberOfItems" content="15">
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="BSN Amino X 435 г">
<meta itemprop="description"
      content="В нашем магазине вы можете купить спортивное питание BSN Amino X: это аминокислоты, которые жизненно..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/bsn-amino-x-435-g">
<link itemprop="image"
      href="category_img/3dfv8kc55iluc4x5azyu-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1340">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="BSN Amino X EDGE 420 гр. ">
<meta itemprop="description"
      content="Добавка Amino X EDGE представляет собой комплекс аминокислот с повышенным содержанием кофеина, котор..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/bsn-amino-x-edge-420-gr">
<link itemprop="image"
      href="category_img/BSN-AminoX-Edge-Review_AI_1-228x228.png">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1340">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Geneticlab AAKG 150g">
<meta itemprop="description"
      content="В основу пищевой добавки AAKG входит одна из самых важных аминокислот, которая стимулирует выработку..">
<link itemprop="url" href="https://kilosport.net/specialnye-preparaty/geneticlab-aakg-150g">
<link itemprop="image"
      href="category_img/6ccf35c3ceaff3b72277f1fe2238528f-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="780">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Geneticlab GLUTAMINE capsules 180gr/90serv">
<meta itemprop="description"
      content="Состав: глутамин, вспомогательные вещества – мальтодекстрин, твердая желатиновая капсула (желатин –..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/geneticlab-glutamine-capsules-180gr-90serv">
<link itemprop="image"
      href="category_img/75bd0431fcbb04bcb74e4e6c69f61802-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="920">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GeneticLab Glutamine Powder 300гр">
<meta itemprop="description"
      content="Глутамин - условно незаменимая аминокислота, необходимая для эффективного роста мышц и поддержки имм..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/geneticlab-glutamine-powder-300gr">
<link itemprop="image"
      href="category_img/2a609a0b1e47ee29db6a01a1b53e53fc-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="850">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GEON AAKG Nitro Power 120т">
<meta itemprop="description"
      content="AAKG Nitro Power это соль Л-аргинина и альфа кетоглютаровой кислоты.Постоянно присутствующий в орган..">
<link itemprop="url" href="https://kilosport.net/predtrenirovochnye-kompleksy/geon-aakg-nitro-power-120t">
<link itemprop="image"
      href="category_img/aakg570-1-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="890">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GEON AAKG nitro power 150g">
<meta itemprop="description"
      content="Создавая новый препарат, основной задачей ученых было получить высокоэффективный и в тоже время нату..">
<link itemprop="url" href="https://kilosport.net/predtrenirovochnye-kompleksy/geon-aakg-nitro-power-150g">
<link itemprop="image"
      href="category_img/735-500x500-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="790">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GEON Amino Complete 360 таб">
<meta itemprop="description"
      content="Комплекс добавок Amino Complete включает в свой состав аминокислоты позволяющие добиться скорейшего ..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/geon-amino-complete-360-tab">
<link itemprop="image"
      href="category_img/geon-complete-amino-360-tabs-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1430">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GEON Glutamine Power 180к">
<meta itemprop="description"
      content="Аминокислота производителя GEON - Glutamine Power 180к – это пищевая добавка в капсулах, содержащая ..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/geon-glutamine-power-180k">
<link itemprop="image"
      href="category_img/525-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="720">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="GEON Glutamine Power 300гр">
<meta itemprop="description"
      content="Glutamine Power предлагается покупателям в интернет-магазинах спортивного питания в порошкообразном ..">
<link itemprop="url" href="https://kilosport.net/specialnye-preparaty/geon-glutamine-power-300gr">
<link itemprop="image"
      href="category_img/geon-glutamine-power-300-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="780">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Ironman Amino 2500 224 таб">
<meta itemprop="description"
      content="Аминокислотный комплекс Amino 2500 представляет собой сбалансированный препарат, создающий препятств..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/ironman-amino-2500-224-tab">
<link itemprop="image"
      href="category_img/12249-228x228.png">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="970">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="IRONMAN™ Amino 2500 72т">
<meta itemprop="description"
      content="Amino 2500 - это научно-сбалансированный источник аминокислот, позволяющий эффективно восстановить а..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/ironman-amino-2500-72t">
<link itemprop="image"
      href="category_img/AMINO-2500-72-tab-ironman-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="390">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="IRONMAN™ Амино 3600 100т">
<meta itemprop="description"
      content="Амино 3600 научно-сбалансированный источник кислот с улучшенным профилем. Комплекс создан на базе на..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/ironman-amino-3600-100t">
<link itemprop="image"
      href="category_img/12179-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="620">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="IRONMAN™ Амино 3600 200т">
<meta itemprop="description"
      content="Амино 3600 научно-сбалансированный источник кислот с улучшенным профилем. Комплекс создан на базе на..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/ironman-amino-3600-200t">
<link itemprop="image"
      href="category_img/12179-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1100">
</span>
</span>
<span itemprop="itemListElement" itemscope="" itemtype="http://schema.org/Product">
<meta itemprop="name" content="Maxler Whey Amino Tabs 2000 300 т">
<meta itemprop="description"
      content="Комплекс аминокислот Whey AminoTabs компании Макслер станет идеальным вариантом всем, кто стремиться..">
<link itemprop="url" href="https://kilosport.net/aminokisloty/maxler-whey-amino-tabs-2000-300-t">
<link itemprop="image"
      href="category_img/maxler_whey_amino_tabs_2000-300______..500x500-228x228.jpg">
<span itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
<meta itemprop="priceCurrency" content="RUB">
<meta itemprop="price" content="1240">
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