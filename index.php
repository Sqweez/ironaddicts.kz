<?
include_once('includes/header.php') ?>
    <style>
        .slick-dots {
            display: flex;
            justify-content: center;

            margin: 0;
            list-style-type: none;
            position: absolute;
            top: 94%;
            left: 50%;
            transform: translateX(-50%);
            background: white;
            padding: 5px 10px;
        }

        li {
            margin: 0 0.25rem;
        }

        button {
            display: block;
            width: 1.5rem;
            height: 1.5rem;
            padding: 0;

            border: none;
            border-radius: 100%;
            background-color: #8d8c91;

            text-indent: -9999px;
        }

        li.slick-active button {
            background-color: #ff0000;
        }

        i.fa {
            color: #ff0000 !important;
        }
    </style>
    <!-- MAIN CONTENT
================================================== -->
    <div class="main-content full-width home">
        <div class="background-content"></div>
        <div class="background">
            <div class="shadow"></div>
            <div class="pattern">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-3">

                            <div id="megamenu_28039136" class="container-megamenu container vertical">
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
                                                    /*    echo ' <li class=""><p class="close-menu"></p>
                                                    <p class="open-menu mobile-disabled"></p><a
                                                            href="/components/router.php?id=' . $item["id"] . '&page=category"
                                                            class="clearfix"><span><strong>'.$item["name"].'</strong></span></a>
                                                </li>';*/
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
                                    css_tpl += '#megamenu_28039136 ul.megamenu > li > .sub-menu > .content {';
                                    css_tpl += '-webkit-transition: all 300ms ease-out !important;';
                                    css_tpl += '-moz-transition: all 300ms ease-out !important;';
                                    css_tpl += '-o-transition: all 300ms ease-out !important;';
                                    css_tpl += '-ms-transition: all 300ms ease-out !important;';
                                    css_tpl += 'transition: all 300ms ease-out !important;';
                                    css_tpl += '}</style>'
                                    $("head").append(css_tpl);
                                });
                            </script>

                            <div class="wow fadeInUp" style="display:none;; animation-name: fadeInUp;"><p><a
                                            href="https://www.instagram.com/kilosportnet/"><img
                                                src="images/Instagram.jpg"
                                                class="img_zoom"></a><br>
                                    <a href="https://vk.com/kilosportnet"><img
                                                src="images/vk.jpg"
                                                class="img_zoom"></a><br>
                                    <a href="https://www.youtube.com/channel/UCP0Levrx5bEBASP2yoRr97A"><img
                                                src="images/youtube.jpg"
                                                class="img_zoom"></a></p></div>
                        </div>

                        <div class="col-sm-12 col-md-9">
                            <link rel="stylesheet" type="text/css"
                                  href="css/settings.css"
                                  property="stylesheet">
                            <link rel="stylesheet" type="text/css"
                                  href="css/static-captions.css"
                                  property="stylesheet">
                            <link rel="stylesheet" type="text/css"
                                  href="css/dynamic-captions.css"
                                  property="stylesheet">
                            <link rel="stylesheet" type="text/css"
                                  href="css/captions.css"
                                  property="stylesheet">
                            <link rel="stylesheet" type="text/css"
                                  href="css/slider.css"
                                  property="stylesheet">
                            <script type="text/javascript"
                                    src="js/jquery.themepunch.tools.min.js"></script>
                            <script type="text/javascript"
                                    src="js/jquery.themepunch.revolution.min.js"></script>
                            <!-- Slideshow container -->
                            <div class="slick-slider" style="padding-top: 30px">
                                <img src="images/kilosport.net-001.JPG" alt="">
                                <img src="images/kilosport.net-002.JPG" alt="">
                                <img src="images/kilosport.net-003.JPG" alt="">
                                <img src="images/kilosport.net-004.JPG" alt="">
                                <img src="images/kilosport.net-005.JPG" alt="">
                            </div>
                            <script>
                                $(document).ready(function () {
                                    $('.slick-slider').slick({
                                        arrows: false,
                                        autoplay: true,
                                        autoplaySpeed: 2000,
                                        fade: true,
                                        dots: true,
                                        prevArrow: '<i class="fa fa-angle-left prev1"></i>',
                                        nextArrow: '<i class="fa fa-angle-right next1"></i>'
                                    });
                                })
                            </script>
                            <div class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <div class="filter-product wow fadeInUp"
                                     style="visibility: visible; animation-name: fadeInUp;">
                                    <div class="filter-tabs">
                                        <div class="bg-filter-tabs">
                                            <div class="bg-filter-tabs2 clearfix">
                                                <ul id="tab28966890">
                                                    <li class="active"><a
                                                                href="https://kilosport.net/#latest-28966890-0">Новинки</a>
                                                    </li>
                                                    <li><a href="https://kilosport.net/#bestsellers-28966890-1">Популярное</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-content clearfix">
                                        <div class="tab-pane active" id="latest-28966890-0">

                                            <div class="box-product">
                                                <div id="myCarousel28966890-0">
                                                    <!-- Carousel items -->
                                                    <div class="carousel-inner">
                                                        <div class="active item">
                                                            <div class="product-grid">
                                                                <div class="row owl-carousel-news container-carousel-news">
                                                                    <div class="block  col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon blue latest">
                                                                                    <span>New</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/geynery/mutant-mass-2270-gr">

                                                                                        <img src="images/mutant-mass--2-2kg-200x200.jpg"
                                                                                             alt="Mutant Mass 2270 гр"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/geynery/mutant-mass-2270-gr">Mutant
                                                                                        Mass 2270 гр</a>
                                                                                    <div class="brand">Mutant</div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    1 990 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;677&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;677&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;677&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;677&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block  col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon blue latest">
                                                                                    <span>New</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/specialnye-preparaty/geneticlab-collagen-plus-225gr-45serv">

                                                                                        <img src="images/510782bb966f4165de65f4d052a59a1-200x200.jpg"
                                                                                             alt="Geneticlab Collagen Plus 225gr/45serv"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/specialnye-preparaty/geneticlab-collagen-plus-225gr-45serv">Geneticlab
                                                                                        Collagen Plus
                                                                                        225gr/45serv</a>
                                                                                    <div class="brand">GeneticLab
                                                                                    </div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    780 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;676&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;676&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;676&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;676&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block last col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon blue latest">
                                                                                    <span>New</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/specialnye-preparaty/geneticlab-glycine-capsules">

                                                                                        <img src="images/0a356aad9322cbd1aa99e48ba4aac859-200x200.jpg"
                                                                                             alt="Geneticlab Glycine capsules"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/specialnye-preparaty/geneticlab-glycine-capsules">Geneticlab
                                                                                        Glycine capsules</a>
                                                                                    <div class="brand">GeneticLab
                                                                                    </div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    720 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;675&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;675&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;675&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;675&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block  col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon blue latest">
                                                                                    <span>New</span>
                                                                                </div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/kreatin/notbad-creatine-matrix-250gr">

                                                                                        <img src="images/NotBad Creatine Matrix - 250 гр ( Креатин моногидрат), вкус - Кола-200x200.png"
                                                                                             alt="NotBad Creatine Matrix 250гр"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/kreatin/notbad-creatine-matrix-250gr">NotBad
                                                                                        Creatine Matrix 250гр</a>
                                                                                    <div class="brand">NotBad</div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    500 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;674&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;674&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;674&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;674&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane " id="bestsellers-28966890-1">

                                            <div class="box-product">
                                                <div id="myCarousel28966890-1">
                                                    <!-- Carousel items -->
                                                    <div class="carousel-inner">
                                                        <div class="active item">
                                                            <div class="product-grid">
                                                                <div class="row">
                                                                    <div class="block  col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon green bestseller">
                                                                                    <span>BestSeller</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/proteiny/steel-power-fast-whey-1portsiya">

                                                                                        <img src="images/steel-power-fast-whey-30-200x200.jpg"
                                                                                             alt="Steel Power Fast Whey 1порция"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/proteiny/steel-power-fast-whey-1portsiya">Steel
                                                                                        Power Fast Whey 1порция</a>
                                                                                    <div class="brand">Steel Power
                                                                                    </div>
                                                                                    <div class="rating"><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i>
                                                                                    </div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    60 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;252&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;252&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;252&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;252&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block  col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon green bestseller">
                                                                                    <span>BestSeller</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/batonchiki/bombbar-proteinovyj-batonchik-60-gr">

                                                                                        <img src="images/4-500x500-200x200.jpg"
                                                                                             alt="Протеиновый батончик Bombbar 60 гр"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/batonchiki/bombbar-proteinovyj-batonchik-60-gr">Протеиновый
                                                                                        батончик Bombbar 60 гр</a>
                                                                                    <div class="brand">Bombbar</div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    100 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;572&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;572&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;572&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;572&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block last col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon green bestseller">
                                                                                    <span>BestSeller</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/proteiny/steel-power-long-casein-900g">

                                                                                        <img src="images/long_n-500x500-200x200.png"
                                                                                             alt="Steel Power Long Casein 900г"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/proteiny/steel-power-long-casein-900g">Steel
                                                                                        Power Long Casein 900г</a>
                                                                                    <div class="brand">Steel Power
                                                                                    </div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    1 400 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;56&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;56&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;56&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;56&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="block  col-sm-6 col-md-3 col-xs-12  ">
                                                                        <!-- Product -->
                                                                        <div class="product clearfix product-hover">
                                                                            <div class="left">

                                                                                <div class="ribbon green bestseller">
                                                                                    <span>BestSeller</span></div>

                                                                                <div class="image ">

                                                                                    <a href="https://kilosport.net/proteiny/steel-power-fast-whey-0-9kg">

                                                                                        <img src="images/5172eb0e7-200x200.png"
                                                                                             alt="Steel Power Fast Whey 0.9кг"
                                                                                             class="">
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="right">
                                                                                <div class="name"
                                                                                     style="height: 152px;">
                                                                                    <div class="label-discount green saleclear">
                                                                                    </div>
                                                                                    <a href="https://kilosport.net/proteiny/steel-power-fast-whey-0-9kg">Steel
                                                                                        Power Fast Whey 0.9кг</a>
                                                                                    <div class="brand">Steel Power
                                                                                    </div>
                                                                                    <div class="rating"><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star active"></i><i
                                                                                                class="fa fa-star"></i>
                                                                                    </div>
                                                                                    <div class="availability">
                                                                                        Наличие: <span
                                                                                                class="available">Есть в наличии</span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="price">
                                                                                    1 300 руб.
                                                                                </div>
                                                                                <div class="only-hover">
                                                                                    <a onclick="cart.add(&#39;52&#39;);"
                                                                                       class="button">Купить</a>
                                                                                    <a onclick="cart.oneclick(&#39;52&#39;);"
                                                                                       class="button">Купить в 1
                                                                                        клик</a>
                                                                                    <ul>
                                                                                        <li>
                                                                                            <a onclick="wishlist.add(&#39;52&#39;);"
                                                                                               class="btn-add-to-compare">добавить
                                                                                                в закладки</a></li>
                                                                                        <li>
                                                                                            <a onclick="compare.add(&#39;52&#39;);"
                                                                                               class="btn-add-to-wishlist">Сравнить</a>
                                                                                        </li>
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    $('#tab28966890 a').click(function (e) {
                                        e.preventDefault();
                                        $(this).tab('show');
                                    })
                                </script>
                            </div>
                            <div class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                <div class="box clearfix box-with-products with-scroll">
                                    <!-- Carousel nav -->
                                    <a class="next" href="#myCarousel18346560"
                                       id="myCarousel18346560_next"><span></span></a>
                                    <a class="prev" href="#myCarousel18346560"
                                       id="myCarousel18346560_prev"><span></span></a>

                                    <script type="text/javascript">
                                        $(document).ready(function () {
                                            var owl18346560 = $(".owl-carousel");

                                            $("#myCarousel18346560_next").click(function () {
                                                owl18346560.trigger('owl.next');
                                                return false;
                                            })
                                            $("#myCarousel18346560_prev").click(function () {
                                                owl18346560.trigger('owl.prev');
                                                return false;
                                            });

                                            owl18346560.owlCarousel({
                                                slideSpeed: 500,
                                                singleItem: true,
                                            });
                                        });
                                    </script>

                                    <div class="box-heading">Недавно Просмотренные</div>
                                    <div class="strip-line"></div>
                                    <div class="box-content products">
                                        <div class="box-product">
                                            <div class="owl-carousel owl-theme recently-viewed-container" style="text-align: center">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <script>

                                let recently_viewed = localStorage.getItem("view_history");

                                if (recently_viewed) {
                                    $.ajax({
                                        type: "POST",
                                        url: "components/product_grabber.php",
                                        data: {data: recently_viewed},
                                        success: (data) => {
                                            let products = JSON.parse(data);
                                                products.forEach((item) => {
                                                    let product = item[0];
                                                    let el = $('.recently-viewed-container');
                                                    let el2 = $('.container-carousel-news');
                                                    let html = '<div class="recently-viewed-card"><a href="/product.php?id=' + product.product_id + '"> <div class="d-flex" style="text-align: center; width: 100%; height: 215px;"> <img src="http://iron.controlsoft.kz/' + product.product_img + '"alt="' + product.product_name + '"class=""> </div> <div class="name" style="height: 110px;"> <a href="/product.php?id=' + product.product_id + '">' + product.product_name + '</a> <div class="brand">' + product.manufacturer + '</div> <div class="availability">Наличие: <spanclass="available">Есть в наличии</span> </div> </div> <div class="price" style="text-align: center;">' + product.prodazhnaya_cena + ' тнг</div></a></div>';
                                                    el.append(html);
                                                });

                                            $('.owl-carousel').owlCarousel({
                                                loop: true,
                                                items: 4,
                                                nav: true,
                                                responsive: {
                                                    0: {
                                                        items: 1
                                                    },
                                                    600: {
                                                        items: 2
                                                    },
                                                    1000: {
                                                        items: 4
                                                    }
                                                }
                                            })
                                        }

                                    })
                                }


                            </script>
                            <div class="desc">
                                <h1>Магазин спортивного питания</h1>
                                <h2>Для чего необходимо спортивное питание?</h2>
                                <p>Интенсивные тренировки, полноценное питание и восстановление – три неотъемлемых
                                    элемента любого спортсмена. Физические нагрузки требуют больших энергозатрат
                                    и,как известно, энергию для них, мы получаем из пищи. Наш <strong>магазин
                                        спортивного питания</strong> «Килоспорт» поможет обеспечить организм всем
                                    необходимым для роста мышечной массы и силовых параметров, похудения и
                                    оздоровления организма.</p>
                                <p>Обычная еда не в состоянии удовлетворить потребности атлета, поскольку в ней
                                    содержится недостаточный уровень необходимых веществ, чтобы хоть как-то
                                    приблизиться к необходимому объему, приходится съедать огромные объемы пищи, что
                                    не каждому под силу. Ученым пришлось сделать концентрированные источники белков,
                                    витаминов, которые сегодня в изобилии представлены на сайте спортивного питания
                                    kilosport.net. Ваше питание и набор массы или похудения будет проходить намного
                                    результативней, решив вы пить необходимые добавки.</p>
                                <h2>Где купить спортивное питание</h2>
                                <p>Многие атлеты, бодибилдеры и люди, ведущие здоровый образ жизни, интересуются,
                                    где заказать и купить спортивное питание высокого качества. Довольно непросто
                                    определиться с выбором в щедром предложении рынка. Любой поисковик с готовностью
                                    выдаст многостраничную информацию с метками на карте о расположении магазинов
                                    спортивного питания. Но проще всего купить спортивное питание в
                                    интернет-магазине «Килоспорт». Мы справляемся с высоким спросом и добились
                                    регулярных поставок от лучших производителей спортпита. Мы грамотно подберем
                                    нужные Вам продукты и составим эффективный комплект спортивного питания из
                                    нашего каталога, где представлены множество известных марок.</p>
                                <p>Наша компания поставляет не только спортивное питание в Новосибирске. Покупая
                                    спортпит, можно выбрать сопутствующие аксессуары, одежду для спорта и отдыха.
                                    Чтобы купить спортивное питание в Новосибирске офлайн, нужно посетить один из
                                    магазинов, указанных на Яндекс-Карте. Адреса и телефоны торговых точек продаж
                                    есть в соответствующем разделе сайта. </p>
                                <h2>О доставке спортивного питания</h2>
                                <p>У вас есть множество причин покупать спортпит в Новосибирске в магазине
                                    «Килоспорт». Большой перечень добавок к рациону по лояльным ценам:</p>
                                <ul>
                                    <li>Предтренировочные комплексы;</li>
                                    <li><a href="https://kilosport.net/proteiny">Протеин для набора мышечной
                                            массы</a>;
                                    </li>
                                    <li>Гейнеры;</li>
                                    <li>Жиросжигатели;</li>
                                    <li>Специальные препараты(омега3, для суставов, витамины).</li>
                                </ul>
                                <p>Многочисленные отзывы покупателей подтверждают эффективность качественного
                                    спортивного питания. Выбирать и покупать товар для спортивного питания можно
                                    через интернет. Предусмотрена бесплатная доставка спортивного питания по
                                    Новосибирску. Такой же сервис доступен также для покупателей спортивного питания
                                    в Бердске. Доставка в другие регионы России доступна при покупке от 1500 рублей.
                                    Город доставки не имеет значения.</p>
                                <p>Магазины спортивного питания в Новосибирске, Бердскепредлагают выгодную
                                    партнерскую программу, подарочные сертификаты для покупателей,
                                    интернет-пользователей.</p>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="wow fadeInUp" style="visibility: hidden; animation-name: none;">
                                <script type="application/ld+json">
                                </script>
                                <span itemscope="" itemtype="http://schema.org/Organization">
<meta itemprop="name" content="Килоспорт">
<link itemprop="url" href="https://kilosport.net/">
<link itemprop="logo"
      href="images/3.png">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function () {
            // WOW
            wow = new WOW(
                {
                    boxClass: 'wow',      // animated element css class (default is wow)
                    animateClass: 'animated', // animation css class (default is animated)
                    offset: 0,          // distance to the element when triggering the animation (default is 0)
                    mobile: true,       // trigger animations on mobile devices (default is true)
                    live: true,       // act on asynchronously loaded content (default is true)
                    callback: function (box) {
                        $(box.children[0]).trigger('wowShow');
                    },
                    scrollContainer: null // optional scroll container selector, otherwise use window
                }
            );
            wow.init();
        })

    </script>


    <!-- FOOTER

    ================================================== -->

<? include_once('includes/footer.php') ?>