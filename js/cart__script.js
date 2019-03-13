let cart__items = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
let user_id = JSON.parse(localStorage.getItem("user_data")).id;
let cart_total__sum = 0;
localStorage.setItem("discount_percent", 0);
let show__toast = (title, message) => {
    iziToast.error({
        title,
        message
    });
};

let get_client_total_sum = () => {
    $.post({
        url: "../components/cart.php",
        data: {user_id: user_id, action: 'getSellsSum'},
        success: data => localStorage.setItem("client_total_sum", data)
    });
};

get_client_total_sum();

let get__items__remaining = () => {
    let ids = [];
    Object.keys(cart__items).forEach(item => {
        let val = cart__items[item];
        ids.push(val.id);
    });
    $.ajax({
        type: "POST",
        url: '../components/cart.php',
        data: {ids: JSON.stringify(ids), action: "get_availables"},
        success: async (json) => {
            let data = JSON.parse(json);
            Object.keys(cart__items).forEach(item => {
                let cart = cart__items[item];
                let available = data[item].count_available;
                if (cart__items[item].id == data[item].id) {
                    cart__items[item].count_available = available;
                }
                if (cart.count > available) {
                    cart.count = available;
                }
            });
            localStorage.setItem("cart", JSON.stringify(cart__items));
            get__discount(cart__items);
            draw__cart__item(cart__items);
            draw__cart__table(cart__items);
        }
    });
};

let get_total_cost = (items) => {
    let total__cost = 0;
    if (items) {
        Object.keys(items).forEach(item => {
            let val = items[item];
            total__cost += val.count * val.cost;
        });
    }
    return total__cost;
};

let get__discount = async (items) => {
    let client_discount = 0;
    let trainer_discount = 0;
    let summa_discount = 0;
    let total_sum = localStorage.getItem("client_total_sum");
    if (total_sum >= 30000) {
        client_discount = 5;
    }
    if (total_sum >= 60000) {
        client_discount = 10;
    }
    if (localStorage.getItem("trainer")) {
        trainer_discount = 7;
    }
    let cost = get_total_cost(items);
    if (cost >= 15000) {
        summa_discount = 5;
    }
    if (cost >= 30000) {
        summa_discount = 10;
    }
    let discount_percent = Math.max(client_discount, trainer_discount, summa_discount);
    $('#discount-percent__h').val(discount_percent);
    localStorage.setItem("discount_percent", discount_percent);
};

let get_balance = () => {
    $.post({
        url: '../components/cart.php',
        data: {user_id: user_id, action: "get_balance"},
        success: (data) => {
            $("#my_balance strong").html(data);
        }
    });
}

function draw__cart__table(items) {
    let tbody = $(".cart-info__tbody");
    let discount = parseInt(localStorage.getItem("discount_percent")) / 100;
    let total_cost = get_total_cost(items);
    let html = "";
    if (items.length > 0) {
        items.forEach((item) => {
            item.temp_cost = Math.floor(item.cost - (item.cost * discount));
            html += `
            <tr id="${item.id}">
                <td class="text-center"><a href="/product.php?id=${item.id}"><img width="47" height="47" src="http://iron.controlsoft.kz/${item.img}" alt="${item.name} | ${item.weigth}" title="${item.name} | ${item.weigth}" class="img-thumbnail"></a>
                <div class="visible-xs"><a href="/product.php?id=${item.id}">${item.name}<div>
                                                            </div>
                                                        </a></div>
                                                </td>
                                                <td class="text-center hidden-xs"><a
                                                            href="/product.php?id=${item.id}">${item.name} | ${item.weigth}</a>
                                                </td>
                                                <td class="text-center">
                                                    <input type="number" name="quantity" class="quantity_item" value="${item.count}" size="2">
                                                </td>
                                                <td class="text-right hidden-xs">${item.temp_cost} тенге</td>
                                                <td class="text-right">${item.temp_cost * item.count} тенге</td>
                                                <td class="text-center"><a onclick="remove__from__cart(${item.id})"><img
                                                                src="../images/remove.png" alt="Удалить"
                                                                title="Удалить"></a></td>
                                            </tr>`;
        });
    }
    else {
        $("#content.cart__table__cart").html("<h1>Корзина покупок</h1><p>Корзина пуста!</p><div class='buttons'><div class='pull-right'><a href='/' class='btn btn-primary'>Продолжить</a></div></div>");
    }
    tbody.html(html);
    $('.quantity_item').off().on('change', function (e) {
        let count = $(this).val();
        let id = $(this).parent().parent().attr("id");
        Object.keys(cart__items).forEach(item => {
            let val = cart__items[item];
            if (id == val.id) {
                if (count > val.count_available) {
                    show__toast('Внимание!', `На складе недостаточно товара, поэтому будет добавлено ${val.count_available} единиц товара`);
                    count = val.count_available;
                }
                cart__items[item].count = parseInt(count);
                localStorage.setItem("cart", JSON.stringify(cart__items));
                draw__cart__item(cart__items);
                draw__cart__table(cart__items);
                return 0;
            }
        })
    });
    $('.cart-total__cart tr:nth-child(1) td:nth-child(2)').html(`${total_cost} тенге`);
    $('.cart-total__cart tr:nth-child(2) td:nth-child(2)').html(`${Math.floor(total_cost - (total_cost * (1 - discount)))} тенге`);
    $('.cart-total__cart tr:nth-child(4) td:nth-child(2)').html(`${Math.floor(total_cost - (total_cost * (discount)))} тенге`);
    cart_total__sum = Math.floor(total_cost - (total_cost * (discount)));
}

let draw__cart__item = (items_in_cart) => {
    let discount = parseInt(localStorage.getItem("discount_percent")) / 100;
    let element = $('#cart_content_ajax');
    element.html('');
    if (items_in_cart.length === 0) {
        let html = '<div class="empty">Ваша корзина пуста!</div>';
        element.html(html);
    }
    else {
        let data = `<div class="mini-cart-info"><table><tbody></tbody></table></div>`;
        element.append(data);
        let table = $('.mini-cart-info>table>tbody');
        let __cart = "";
        let total__count = 0;
        let total__cost = get_total_cost(items_in_cart);
        total__cost = Math.floor(total__cost - (total__cost * discount));
        Object.keys(items_in_cart).forEach(item => {
            let i = items_in_cart[item];
            total__count += i.count;
            __cart += `
                                        <tr>
		                                    <td class="image">
		                                        <a href="/product.php?id=${i.id}">
		                                            <img src="http://iron.controlsoft.kz/${i.img}" height="47" width="47" alt="${i.name}" title="${i.name}">
                                                </a>
                                             </td>
		                                    <td class="name">
                                                <span class="quantity">${i.count}&nbsp;x&nbsp;</span>
                                                 <a href="/product.php?id=${i.id}">${i.name} | ${i.weigth}</a>
		                                        <div>
		          		                            - <small style="font-weight: 600;">Вкус ${i.taste}</small><br>
		          		                            <div class="price" style="text-align: left;">${i.cost} тенге</div>
		                                        </div>
                                            </td>
                                            <td class="remove">
                                                <a href="#" onclick="remove__from__cart(${i.id});" title="Удалить"></a>
                                            </td>
                                        </tr>`;
        });
        table.append(__cart);
        let html = `<div class="checkout"><a href="../cart.php" class="button btn-view-cart inverse" style="width: 100%">Перейти в корзину</a></div>`;
        element.append(html);
        $('#cart_count').html(total__count);
        $('#total_price').html(`${total__cost} тенге`);
    }
};

$(function () {
    get_balance();
    get__items__remaining();
    if (localStorage.getItem("trainer")) {
        $('#promocode__h').val(localStorage.getItem("trainer"));
    }
    $('#user-id_h').val(user_id);

    $('.__buy').on('click', function (e) {
        e.preventDefault();
        let form = $(this).parent().parent();
        var input = $("<input>")
            .attr("type", "hidden")
            .attr("name", "cart").val(JSON.stringify(cart__items));
        console.log(input);
        form.append(input);
        input = $("<input>")
            .attr("type", "hidden")
            .attr("name", "total__sum").val(cart_total__sum);
        form.append(input);
        form.submit();
    });

    $('form#getFromBalance').off().on('submit', function (e) {
        let discount = parseInt(localStorage.getItem("discount_percent")) / 100;
        e.preventDefault();
        let balance = $(this).serializeArray()[0].value;
        if (balance.length == 0) balance = 0;
        let user_balance = parseInt($("#my_balance strong").text());
        if (balance > user_balance) {
            show__toast('Ошибка!', 'На вашем счету недостаточно средств!');
            return 0;
        }
        $("#balance__h").val(balance);
        let cost = get_total_cost(cart__items);
        cost = cost - (cost * discount);
        cost = cost - balance;
        $(".cart-total__cart tr:nth-child(3) td:nth-child(2)").html(`${balance} тенге`);
        $(".cart-total__cart tr:nth-child(4) td:nth-child(2)").html(`${Math.floor(cost)} тенге`);
        cart_total__sum = Math.floor(cost);
    });

    $('form#getPromocode').off().on('submit', function (e) {
        e.preventDefault();
        let promocode = $(this).serializeArray()[0].value;
        $.post({
            url: "../components/cart.php",
            data: {promocode: promocode, action: "get_promocode"},
            success: (data) => {
                if (data === "null") {
                    show__toast('Ошибка!', 'Промокод не существует или уже был активирован!');
                    localStorage.removeItem("trainer");
                }
                else {
                    localStorage.setItem("trainer", promocode);
                    $('#promocode__h').val(promocode);
                }
                get__discount(cart__items);
                draw__cart__table(cart__items);
                draw__cart__item(cart__items);
            }
        });
    });

});

let remove__from__cart = (id) => {
    cart__items = cart__items.filter((item) => {
        return !(item.id == id)
    });
    if (cart__items.length == 0) {
        localStorage.removeItem("cart");
        $('#cart_count').html(0);
        $('#total_price').html(`0 тенге`);
    }
    else {
        localStorage.setItem("cart", JSON.stringify(cart__items));
    }
    get__discount(cart__items);
    draw__cart__item(cart__items);
    draw__cart__table(cart__items);
};

let add_to_cart = (id) => {
    let count = $('input[name="quantity"]').val();
    let prod_id = $('#select__taste__').val();
    if (!prod_id) {
        prod_id = id;
    }
    $.ajax({
        url: '../components/cart.php',
        data: {id: prod_id, action: "add_to_cart"},
        type: "POST",
        success: (json) => {
            let item = JSON.parse(json);
            let cart__obj = {
                id: prod_id,
                name: item.product_name,
                count: parseInt(count),
                cost: parseInt(item.prodazhnaya_cena),
                img: item.product_img,
                taste: item.product_vkus,
                weigth: item.ves_kolvo_tabletok,
                count_available: 0
            };
            let condition = true;
            cart__items = localStorage.getItem('cart') ? JSON.parse(localStorage.getItem('cart')) : [];
            cart__items.forEach((item, index) => {
                if (item.id == cart__obj.id) {
                    cart__items[index].count += cart__obj.count;
                    condition = false;
                    return 0;
                }
            });
            if (condition) {
                cart__items.push(cart__obj);
            }
            else {

            }
            localStorage.setItem('cart', JSON.stringify(cart__items));
            draw__cart__item(cart__items);
            var cart = $('#cart_block');
            var imgtodrag = $('.item > a > img');
            if (imgtodrag) {
                var imgclone = imgtodrag.clone()
                    .offset({
                        top: imgtodrag.offset().top,
                        left: imgtodrag.offset().left
                    })
                    .css({
                        'opacity': '0.5',
                        'position': 'absolute',
                        'height': '150px',
                        'width': '150px',
                        'z-index': '100'
                    })
                    .appendTo($('body'))
                    .animate({
                        'top': cart.offset().top + 10,
                        'left': cart.offset().left + 10,
                        'width': 75,
                        'height': 75
                    }, 1000, 'easeInOutExpo');

                setTimeout(function () {
                    cart.effect("shake", {
                        times: 2
                    }, 200);
                }, 1500);

                imgclone.animate({
                    'width': 0,
                    'height': 0
                }, function () {
                    $(this).detach()
                });
            }
        }
    })
};