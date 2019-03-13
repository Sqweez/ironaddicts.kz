<?
$HOST = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
include_once("db.php");
?>
<!DOCTYPE html>
<html lang="ru" class="responsive">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Iron Addicts - Магазин спортивного питания</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../css/icheck.css">
    <link rel="stylesheet" type="text/css" href="../css/filter_product.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../css/wide-grid.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/slick/slick.css">
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
            crossorigin="anonymous"></script>
    <script src="../assets/slick/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    <script>
        $("html,body").animate({scrollTop:0},500);
    </script>
    <style type="text/css">


        ::selection {
            background: #ff0000;
            color: #fff;
        }

        ::-moz-selection {
            background: #ff0000;
            color: #fff;
        }

        .logo-svg {
            fill: #ff0000;
        }

        .button,
        .le-button,
        .btn {
            background: #ff0000;
        }

        .le-color {
            color: #ff0000;
        }

        .dropdown .dropdown-menu {
            border-top-color: #ff0000;
        }

        #top-bar-right .dropdown-menu {
            border-top-color: #ff0000;
        }

        #top .contact-row i {
            color: #ff0000;
        }

        .search_form .button-search,
        .search_form .button-search2 {
            background-color: #ff0000;
        }

        #top .top-cart-row-container .wishlist-compare-holder a:hover,
        #top .top-cart-row-container .wishlist-compare-holder a:hover i {
            color: #ff0000;
        }

        #top #cart_block .cart-heading .basket-item-count .count {
            background-color: #ff0000;
        }

        #top #cart_block .cart-heading .total-price {
            color: #ff0000;
        }

        #main #top #cart_block.open > .dropdown-menu {
            border-top-color: #ff0000;
        }

        .mini-cart-info .price {
            color: #ff0000;
        }

        /* @end */

        /* @group 3. MegaMenu */
        .megamenu-wrapper {
            background: #ff0000;
        }

        .megamenuToogle-wrapper {
            background: #ff0000;
        }

        ul.megamenu li .sub-menu .content .static-menu a.main-menu {
            color: #ff0000;
        }

        ul.megamenu > li > .sub-menu > .content > .arrow:after {
            border-bottom-color: #ff0000;
        }

        ul.megamenu li .sub-menu .content {
            border-top-color: #ff0000;
        }

        @media (max-width: 991px) {

            .responsive .megamenu-wrapper {
                background: #ff0000;
            }

        }

        /* @group 3. RevolutionSlider */
        .tp-bullets.simplebullets.round .bullet:hover,
        .tp-bullets.simplebullets.round .bullet.selected {
            background-color: #ff0000;
        }

        /* @end */

        /* @group 4. ProductFilter */
        .filter-product .filter-tabs ul > li.active > a,
        .filter-product .filter-tabs ul > li.active > a:hover,
        .filter-product .filter-tabs ul > li.active > a:focus {
            background-color: #ff0000;
        }

        /* @end */

        .carousel-brands .owl-prev:hover,
        .carousel-brands .owl-next:hover {
            color: #ff0000;
        }

        .camera_wrap .owl-controls .owl-pagination .active span {
            background: #ff0000;
        }

        .box-product .owl-pagination > div.active,
        .box-product .owl-pagination > div:hover {
            background: #ff0000;
        }

        .product-grid .product:hover .image .quickview a {
            background: #ff0000;
        }

        .product-grid .product:hover .image .quickview a,
        .product-list .row:hover .quickview a {
            background: #ff0000;
        }

        div.pagination-results ul li:hover a,
        div.pagination-results ul li:hover span,
        div.pagination-results ul li.active a,
        div.pagination-results ul li.active span {
            color: #ff0000;
            border-color: #ff0000;
        }

        .product-info .thumbnails-carousel:hover .owl-buttons .owl-prev:hover,
        .product-info .thumbnails-carousel:hover .owl-buttons .owl-next:hover {
            background: #ff0000;
        }

        .htabs a.selected {
            background: #ff0000;
        }

        .center-column .tab-content .meta-row span a {
            color: #ff0000;
        }

        ul.contact-us li span {
            color: #ff0000;
        }

        .center-column .list-unstyled li:before {
            color: #ff0000;
        }

        .custom-footer h4 i {
            color: #ff0000;
        }

        .footer .contact-info .social-icons li a:hover {
            background-color: #ff0000;
        }

        .footer h4 {
            color: #ff0000;
        }

        /* ElevateZoom */
        .zoomTint {
            background-color: #ff0000 !important;
        }

        /* Mega Filter */
        .mfilter-heading-content {
            color: #ff0000
        }

        .mfilter-slider-slider .ui-slider-handle,
        #mfilter-price-slider .ui-slider-handle {
            color: #ff0000 !important;
        }

        .mfilter-slider-slider .ui-slider-range,
        #mfilter-price-slider .ui-slider-range {
            background: #ff0000 !important;
        }

        /* iCheck */
        .icheckbox.checked:before,
        .iradio.checked:before {
            background-color: #ff0000;
            border-color: #ff0000;
        }

        .information-contact .our-store a {
            color: #ff0000;
        }

        /* Blog */
        .post .date-published {
            background: #ff0000;
        }

        .posts + .pagination li:hover a,
        .posts + .pagination li:hover span,
        .posts + .pagination li.active a,
        .posts + .pagination li.active span {
            color: #ff0000;
            border-color: #ff0000;
        }

        .post .meta-row span a {
            color: #ff0000;
        }

        .post .comments-list .author .name {
            color: #ff0000;
        }

        .news.v1 .media-body .date-published {
            color: #ff0000;
        }

        .product-grid-template .product-grid .product.product-img-slider .owl-carousel .owl-item .item.active {
            border-bottom-color: #ff0000;
        }

        .advanced-grid-latest-blogs .news .article-date-added i {
            color: #ff0000;
        }

        body .popup-module .mfp-close {
            background: #ff0000;
        }

        body .popup-module .newsletter-discount {
            color: #ff0000;
        }

        body .mfp-image-holder .mfp-close,
        body .mfp-iframe-holder .mfp-close {
            background: #ff0000;
        }

        .popup h4 {
            color: #ff0000;
        }

        .category-wall .name a {
            color: #ff0000;
        }

        ul.megamenu > li > a:hover,
        ul.megamenu > li.active > a,
        ul.megamenu > li:hover > a {
            background: #9b0800 !important;
        }

        .vertical ul.megamenu > li:hover > a,
        .vertical ul.megamenu > li.active > a {
            border-color: #9b0800
        }

        @media (max-width: 991px) {

            .responsive ul.megamenu > li:hover,
            .responsive ul.megamenu > li.active {
                background: #9b0800
            }
        }

        .button:hover,
        .le-button:hover,
        .btn:hover,
        .product-grid .product:hover .image .quickview a:hover,
        .product-list .row:hover .quickview a:hover {
            background: #bc0500
        }

        a:hover {
            color: #ff0000
        }

        .tp-leftarrow.default:hover,
        .tp-rightarrow.default:hover {
            color: #ff0000
        }

        .btn-add-to-wishlist:hover,
        .btn-add-to-wishlist:hover i,
        .btn-add-to-compare:hover,
        .btn-add-to-compare:hover i {
            color: #ff0000
        }

        #top-bar .top-links li a:hover {
            color: #ff0000
        }

        ul.megamenu li .product .name a:hover {
            color: #ff0000
        }

        .product-grid .product .name a:hover {
            color: #ff0000
        }

        .product-grid .product .only-hover ul li a:hover,
        .product-grid .product .only-hover ul li a:hover:before {
            color: #ff0000
        }

        .products-carousel-overflow > .prev:hover span:before,
        .products-carousel-overflow > .next:hover span:before {
            color: #ff0000
        }

        .box > .prev:hover span:before,
        .box > .next:hover span:before {
            color: #ff0000
        }

        .tab-content .prev-button:hover span:before,
        .tab-content .next-button:hover span:before {
            color: #ff0000
        }

        .advanced-grid-products .product .name a:hover {
            color: #ff0000
        }

        .col-sm-3 .products .advanced-grid-products .product .name a:hover,
        .col-sm-4 .products .advanced-grid-products .product .name a:hover,
        .col-md-3 .products .advanced-grid-products .product .name a:hover,
        .col-md-4 .products .advanced-grid-products .product .name a:hover {
            color: #ff0000
        }

        .col-sm-3 .products .row > div .product .name a:hover,
        .col-sm-4 .products .row > div .product .name a:hover,
        .col-md-3 .products .row > div .product .name a:hover,
        .col-md-4 .products .row > div .product .name a:hover {
            color: #ff0000
        }

        .product-info .links a:hover,
        .product-info .links a:hover i {
            color: #ff0000
        }

        .product-info .cart .add-to-cart .quantity #q_up:hover,
        .product-info .cart .add-to-cart .quantity #q_down:hover {
            color: #ff0000
        }

        .product-filter .options .button-group button:hover,
        .product-filter .options .button-group .active {
            color: #ff0000
        }

        .faq-area .faq-section .panel-faq .panel-heading .panel-title:hover a.collapsed,
        .faq-area .faq-section .panel-faq .panel-heading .panel-title a {
            color: #ff0000
        }

        .faq-area .faq-section .panel-faq .panel-heading .panel-title > a:after,
        .faq-area .faq-section .panel-faq .panel-heading .panel-title:hover > a.collapsed:after {
            color: #ff0000
        }

        .footer ul li a:hover {
            color: #ff0000
        }

        .camera_wrap:hover .owl-controls .owl-buttons .owl-prev:hover:before,
        .camera_wrap:hover .owl-controls .owl-buttons .owl-next:hover:before {
            color: #ff0000;
        }

        /* Blog */
        .post .meta > li a:hover {
            color: #ff0000;
        }

        .posts .pagination li:hover a,
        .posts .pagination li:hover span {
            color: #ff0000;
            border-color: #ff0000;
        }

        .posts .pagination-ajax .load-more:hover {
            color: #ff0000;
        }

        .post .post-media .media-slider:hover .owl-next:hover,
        .post .post-media .media-slider:hover .owl-prev:hover {
            color: #ff0000;
        }

        .post .post-media .media-slider:hover .owl-page.active span,
        .post .post-media .media-slider:hover .owl-page:hover span {
            background: #ff0000;
        }

        .post .blog-post-author .media .media-heading:hover a {
            color: #ff0000;
        }

        .blog-categories .box-category ul li a:hover {
            color: #ff0000;
        }

        .blog-popular-posts .media a:hover h5,
        .blog-related-posts .media a:hover h5,
        .blog-product-related-posts .media a:hover h5,
        .blog-latest-posts .media a:hover h5 {
            color: #ff0000;
        }

        .blog-tags .tagcloud a:hover {
            color: #ff0000;
        }

        .megamenu-wrapper ul.megamenu > li {
            border-right-color: #9b0800
        }

        .megamenuToogle-wrapper {
            border-bottom-color: #9b0800
        }

        .megamenuToogle-wrapper .container > div {
            background-color: #9b0800
        }

        .megamenuToogle-wrapper .container > div {
            border-color: #9b0800
        }


    </style>


    <style type="text/css">
        .sale.ribbon:after {
            border-top-color: #F8484A !important;
        }

        .label-discount {
            background-color: #F8484A !important;
        }

        .bestseller.ribbon:after {
            border-top-color: #ff0000 !important;
        }

        .latest.ribbon:after {
            border-top-color: #407AC5 !important;
        }

    </style>


    <link rel="stylesheet" type="text/css"
          href="css/magnific-popup.css"
          media="screen">


    <script type="text/javascript"
            src="../js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript"
            src="../js/bootstrap.min.js"></script>
    <script type="text/javascript"
            src="../js/echo.min.js"></script>
    <script type="text/javascript"
            src="../js/common.js"></script>
    <script type="text/javascript"
            src="../js/tweetfeed.min.js"></script>
    <script type="text/javascript"
            src="../js/bootstrap-notify.min.js"></script>
    <script type="text/javascript"
            src="../js/jquery.matchHeight.min.js"></script>
    <script type="text/javascript"
            src="../js/icheck.min.js"></script>
    <script type="text/javascript"
            src="../js/wow.min.js"></script>
    <script type="text/javascript"
            src="../js/jquery.plugin.min.js"></script>
    <script type="text/javascript"
            src="../js/jquery.countdown.min.js"></script>


    <script type="text/javascript"
            src="../js/owl.carousel.min.js"></script>

    <script
            src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
            integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
    <script type="text/javascript"
            src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/cart__script.js"></script>
    <script type="text/javascript">
        var responsive_design = 'yes';
    </script>

    <style type="text/css">#megamenu_70180736 ul.megamenu > li > .sub-menu > .content {
            -webkit-transition: all 300ms ease-out !important;
            -moz-transition: all 300ms ease-out !important;
            -o-transition: all 300ms ease-out !important;
            -ms-transition: all 300ms ease-out !important;
            transition: all 300ms ease-out !important;
        }</style>
    <style type="text/css">#megamenu_28039136 ul.megamenu > li > .sub-menu > .content {
            -webkit-transition: all 300ms ease-out !important;
            -moz-transition: all 300ms ease-out !important;
            -o-transition: all 300ms ease-out !important;
            -ms-transition: all 300ms ease-out !important;
            transition: all 300ms ease-out !important;
        }</style>
</head>
<body class="common-home">


<div class="standard-body">
    <div id="main" class=" header-type-1">
        <header>
            <div class="background-header"></div>
            <div class="slider-header">
                <!-- Top Bar -->
                <div id="top-bar" class="full-width">
                    <div class="background-top-bar"></div>
                    <div class="background">
                        <div class="shadow"></div>
                        <div class="pattern" style="background-color: #2d2d2d;">
                            <div class="container">
                                <div class="row">
                                    <!-- Top Bar Left -->
                                    <div class="col-xs-12 col-sm-8 d-flex" id="top-bar-left">
                                        <!-- Top Links -->
                                        <ul class="top-links">
                                            <li class="spl"><a href="/contact_us.php"><i class="fas fa-envelope" style="    font-size: 29px;
    padding: 5px 0;"></i> </a></li>

                                            <div class="city__choise" onclick="showCityChange()"><i class="fas fa-map-marker-alt"></i>Город:
                                                <span>
                                                <?
                                                $city__name = $_COOKIE["city_name"];
                                                if(!$city__name){
                                                    echo "Павлодар";
                                                }
                                                else{
                                                    echo $city__name;
                                                }
                                                ?>
                                            </span><span style="font-size: 16px; margin-left: 5px;" class="fas fa-angle-down rotate"></span></div>
                                    </div>
                                    <!-- Top Bar Right -->
                                    <div class="col-xs-12 col-sm-4" id="top-bar-right">
                                        <ul class="top-links top-links-right">
                                            <li class="sp2"><a href="https://www.instagram.com/iron_addicts_pvl/"><i class="fab fa-instagram"></i></a>
                                            </li>
                                            <li class="sp2"><a href="https://vk.com/ironpvl"><i class="fab fa-vk"></i></a>
                                            </li>
                                            <script type="text/javascript">
                                                let el = $('ul.top-links-right');
                                                if(!localStorage.getItem("user_data")){
                                                    el.append('<li class="sp"><a href="/register.php" class="link ">Регистрация</a></li>' +
                                                        '&nbsp;&nbsp;<li class="sp"><a href="/login.php" class="link sp_cls ">Личный кабинет</a></li>')
                                                }
                                                else{
                                                    el.append('<li class="sp"><a href="logout" class="link sp_cls ">Выход</a></li>')
                                                }
                                                $('a[href="logout"]').on('click', (e) => {
                                                    e.preventDefault();
                                                    localStorage.removeItem("user_data");
                                                    window.location.href = "/";
                                                })

                                                function showCityChange() {
                                                    $(".change__city__form").toggleClass('display__block');
                                                    $('.rotate').toggleClass('down');

                                                }
                                            </script>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="change__city__form">
                    <ul>
                       <?
                        $sql = "SELECT * FROM `shop`";
                        $result = mysqli_query($conn, $sql);
                        foreach ($result as $item){
                            echo "<li class='select__city__item' id='" . $item['shop_id'] .  "'>" . explode(" ", $item["shop_name"])[2] . "</li>";
                        }
                       ?>
                        <script>
                            $('.select__city__item').on("click", function(){
                                let city_id = $(this).attr('id');
                                let city_name = $(this).text();
                                localStorage.removeItem("cart");
                                localStorage.removeItem("discount_percent");
                                document.cookie = "city_id=" + city_id;
                                document.cookie = "city_name=" + city_name;
                                window.location.reload();
                            })
                        </script>
                    </ul>
                </div>
                <!-- Top of pages -->
                <div id="top" class="full-width">
                    <div class="background-top"></div>
                    <div class="background">
                        <div class="shadow"></div>
                        <div class="pattern" >
                            <div class="container">
                                <div class="row">
                                    <!-- Header Left -->
                                    <div class="col-xs-12 col-md-3" id="header-left">
                                        <!-- Logo -->
                                        <div class="logo d-flex" style="width: 175px;"><a href="/"><img
                                                        src="../images/logo.png"
                                                        title="Iron Addicts" alt="Iron Addicts"></a></div>
                                    </div>

                                    <!-- Header Center -->
                                    <div class="col-xs-12 col-md-6 no-margin" id="header-center">
                                        <!-- Search -->
                                        <div class="contact-row">
                                            <div class="phone inline">
                                                <i class="fa fa-phone fa-flip-horizontal"></i>8 (913) 382-22-70 - Академгородок <br>
                                                <i class="fa fa-phone fa-flip-horizontal"></i>8 (993) 012-09-96 - Новосибирск <br>
                                                <i class="fa fa-phone fa-flip-horizontal"></i>8 (923) 702-92-21 - Бердск
                                            </div>
                                            <div class="contact inline">
                                                <i class="fa fa-envelope"></i><a href="mailto:andrplaz@gmail.com">andrplaz@gmail.com</a><br>
                                                <i class="fa fa-clock-o"></i> 09:00-20:00
                                            </div>
                                        </div>
                                        <div class="search_form">
                                            <div class="button-search"></div>
                                            <form action="../search.php" class="find__form">
                                            <span role="status" aria-live="polite"
                                                  class="ui-helper-hidden-accessible"></span><input type="text"
                                                                                                    class="input-block-level search-query ui-autocomplete-input"
                                                                                                    name="search"
                                                                                                    placeholder="Поиск по продуктам"
                                                                                                    id="search_query"
                                                                                                    value=""
                                                                                                    autocomplete="off">
                                            <div class="input-layer"></div>
                                            <div class="search-cat">
                                                <select name="category_id" class="form-control">
                                                    <option value="0">Все категории</option>
                                                    <?php
                                                    $sql = "SELECT category_id as `id`, category_name as `name` FROM `category_product` ORDER BY category_name";
                                                    $data = $conn->query($sql);
                                                    foreach ($data as $item) {
                                                        echo '<option value="' . $item["id"] . '">' . $item["name"] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            </form>
                                            <div id="autocomplete-results" class="autocomplete-results">
                                                <ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content ui-corner-all"
                                                    id="ui-id-1" tabindex="0" style="display: none;"></ul>
                                            </div>

                                            <script type="text/javascript">
                                                $(document).ready(function () {

                                                    $('.find__form').on('submit', () => {
                                                        window.location.reload();
                                                    });

                                                    $('.button-search').on('click', () => {
                                                        $('.find__form').submit();
                                                    })

                                                    function b64DecodeUnicode(str) {
                                                        // Going backwards: from bytestream, to percent-encoding, to original string.
                                                        return decodeURIComponent(atob(str).split('').map(function(c) {
                                                            return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
                                                        }).join(''));
                                                    }
                                                    $('#search_query').autocomplete({
                                                        delay: 0,
                                                        appendTo: "#autocomplete-results",
                                                        source: function (request, response) {
                                                            var category_filter = $('header select[name=\'category_id\']').val();
                                                            var category_filter_url = '';
                                                            if (category_filter) {
                                                                category_filter_url = '&filter_category_id=' + encodeURIComponent(category_filter);
                                                            }
                                                            console.log(request);
                                                            $.ajax({
                                                                url: 'components/search_engine.php?category_id=' + category_filter + '&name=' + request.term,
                                                                dataType: 'json',
                                                                success: function (json) {
                                                                    response($.map(json, function (item) {
                                                                        return {
                                                                            label: item.product_name,
                                                                            value: item.product_id,
                                                                            href: 'product.php?id=' + item.product_id,
                                                                            thumb: 'http://iron.controlsoft.kz/' + item.product_img,
                                                                            desc: b64DecodeUnicode(item.product_opisanie).substr(0, 300) + '...',
                                                                            price: item.prodazhnaya_cena + ' тенге'
                                                                        }
                                                                    }));
                                                                }
                                                            });
                                                        },
                                                        select: function (event, ui) {
                                                            document.location.href = ui.item.href;

                                                            return false;
                                                        },
                                                        focus: function (event, ui) {
                                                            return false;
                                                        },
                                                        minLength: 2
                                                    })
                                                        .data("ui-autocomplete")._renderItem = function (ul, item) {
                                                        return $("<li>")
                                                            .append("<a><img src='" + item.thumb + "' alt=''><span style='font-weight: 600; font-size: 16px;'>" + item.label + "</span><br><span class='description'>" + item.desc + "</span><br><span class='price'>" + item.price + "</span></a>")
                                                            .appendTo(ul);
                                                    };
                                                });
                                            </script>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>

                                    <!-- Header Right -->
                                    <div class="col-xs-12 col-md-3 no-margin" id="header-right">
                                        <div class="top-cart-row-container">
                                            <div class="wishlist-compare-holder">
                                                <div class="wishlist" style="visibility: hidden">
                                                    <a href="/" id="wishlist-total"><i
                                                                class="fa fa-heart"></i> Закладки (0)</a>
                                                </div>
                                                <div class="compare" style="visibility: hidden">
                                                    <a href="/" id="compare-total"><i
                                                                class="fa fa-exchange"></i> Сравнить <span
                                                                class="value">(0)</span></a>
                                                </div>
                                            </div>

                                            <!-- Cart block -->
                                            <div id="cart_block" class="dropdown">
                                                <div class="cart-heading dropdown-toogle" data-toggle="dropdown">
                                                    <div class="basket-item-count">
            <span id="cart_count_ajax">
                <span class="count" id="cart_count">0</span>
            </span>
                                                        <img src="images/icon-cart.png"
                                                             alt="">
                                                    </div>
                                                    <div class="total-price-basket">
                                                        <span class="lbl" style="font-weight: 600;">Корзина:</span>
                                                        <span class="total-price" id="total_price_ajax">
                <span class="value" id="total_price" style="text-transform: lowercase">0 тенге</span>
            </span>
                                                    </div>
                                                </div>

                                                <div class="dropdown-menu" id="cart_content">
                                                    <div id="cart_content_ajax">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <script type="text/javascript">

                            </script>

                            <div id="megamenu_70180736" class="container-megamenu  horizontal">
                                <div class="megaMenuToggle">
                                    <div class="megamenuToogle-wrapper">
                                        <div class="megamenuToogle-pattern">
                                            <div class="container">
                                                <div><span></span><span></span><span></span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="megamenu-wrapper">
                                    <div class="megamenu-pattern">
                                        <div class="container">
                                            <ul class="megamenu shift-down">
                                                <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/"
                                                            class="clearfix"><span><strong>Главная</strong></span></a>
                                                </li>
                                                <li class=" with-sub-menu hover"><p class="close-menu"></p>
                                                    <p class="open-menu"></p><a href="/"
                                                                                class="clearfix"><span><strong>Каталог</strong></span></a>
                                                    <div class="sub-menu" style="width:250px">
                                                        <div class="content"><p class="arrow"></p>
                                                            <div class="row">
                                                                <div class="col-sm-12  mobile-enabled">
                                                                    <div class="row">
                                                                        <div class="col-sm-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <?
                                                                                    foreach ($data as $item) {
                                                                                        echo '  <li>
                                                                                        <a href="/category.php?id=' . $item["id"] . '"
                                                                                           onclick=""
                                                                                           class="main-menu ">' . $item["name"] . '</a>
                                                                                    </li>';
                                                                                    }
                                                                                    ?>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/about_us.php"
                                                            class="clearfix"><span><strong>О нас</strong></span></a>
                                                </li>
                                                <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/delivery.php"
                                                            class="clearfix"><span><strong>О Доставке</strong></span></a>
                                                </li>
                                                <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/contact_us.php"
                                                            class="clearfix"><span><strong>Магазины</strong></span></a>
                                                </li>
                                                <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/skidki.php"
                                                            class="clearfix"><span><strong>Скидки</strong></span></a>
                                                </li>
                                                <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/"
                                                            class="clearfix"><span><strong>Акции</strong></span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script type="text/javascript">
                                $(window).on("load", function () {
                                    var css_tpl = '<style type="text/css">';
                                    css_tpl += '#megamenu_70180736 ul.megamenu > li > .sub-menu > .content {';
                                    css_tpl += '-webkit-transition: all 300ms ease-out !important;';
                                    css_tpl += '-moz-transition: all 300ms ease-out !important;';
                                    css_tpl += '-o-transition: all 300ms ease-out !important;';
                                    css_tpl += '-ms-transition: all 300ms ease-out !important;';
                                    css_tpl += 'transition: all 300ms ease-out !important;';
                                    css_tpl += '}</style>'
                                    $("head").append(css_tpl);
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>

        </header>