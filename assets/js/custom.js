$(function () {
    /* Function
    ------------------------- */
    //* Load Content
    function loadContent(pathUrl) {
        window.scrollTo(0, 0);
        $.ajax({
            url: pathUrl,
            success: function (data) {
                $('#content').html(data);
                AOS.init();
            }
        });
    }

    //* Check loged in
    function checkLoged() {
        let check = $('svg.svg-inline--fa.fa-user.fa-xl').length;
        if(check == 0) return true;
        else return false;
    }

    //* Load Content when refresh page
    function checkURL() {
        let url = new URL(window.location.href);
        let path = url.pathname;
        let id = path.replace('/', '');
        let loadPage = ['', 'about', 'account', `checkout`, 'contact', 'login', 'register', `shop`, 'viewcart', 'detail_product', 'order_view'];

        if (!loadPage.includes(id)) {
            $('body').html('<h1>404 Page Not Found</h1>');
            return;
        }

        if (id == '') {
            return;
        } else if(id == 'detail_product' || id == 'order_view') {
            loadContent('/' + id + '.php' + url.search);
            return;  
        } else {
            if (checkLoged() && (id == 'login' || id == 'register')) { //đã đăng nhập
                id = 'account';
            } else if (!checkLoged() && (id == 'account' || id == 'viewcart' || id == 'checkout')) {
                id = 'login';
            }
        }
        loadContent('./' + id + '.php');
    }
    checkURL();
    //* Listen back & forward button to load content
    window.addEventListener('popstate', function () {
        let path = new URL(window.location.href).pathname;
        let id = path.replace('/', '');
        if (id == '') id = 'home';

        loadContent('/' + id + '.php');
    });

    //* choose num page paginator page
    function choosePage(id) {
        $.ajax({
            type: "get",
            url: "./shop.php",
            data: {
                page: id,
            },
            success: function (data) {
                $("#content").html(data);
                AOS.init();
            },
        });
    }

    //* Check product exist or not in cart by id
    function checkProductExistCart(id) {
        let check = $(".cart-product-wrapper .cart-product-inner");
        for (let i = 0; i < check.length; i++) {
            if (check[i].id == "product_id" + id) return true;
        }
        return false;
    }

    /*-------------------------
        Ajax Load Data Nagivation
    ---------------------------*/

    //* Listen click to load content
    $(document).on('click', '.nav-content', function () {
        let url = new URL(window.location.href).pathname;
        let id = $(this).attr('id');

        if (id == 'detail_product') {
            let id_product = $(this)
                .closest('.product-inner')
                .attr('id')
                .replace('product', '')
                .replace('_id', '');

            loadContent('/detail_product.php?id=' + id_product);
            window.history.pushState(id, id.toUpperCase(), '/detail_product?id=' + id_product);
            return;
        }
        if (id == 'order_view') {
            let id_order = $(this).closest('tr').attr('id').replace('id_order', '');
            loadContent('/order_view.php?id=' + id_order);
            window.history.pushState(id, id.toUpperCase(), '/order_view?id=' + id_order);
            return;
        }
        let path;

        if (checkLoged() && (id == 'login' || id == 'register')) { //đã đăng nhập
            path = '/account';
            id = 'account';
        } else if (!checkLoged() && (id == 'account' || id == 'viewcart' || id == 'checkout')) {
            path = '/login';
            id = 'login';
        } else {
            if (id == 'home') path = '/';
            else path = '/' + id;
        }
        loadContent('./' + id + '.php');
        if (url != path) {
            window.history.pushState(id, id.toUpperCase(), path);
        }
    });


    //* search Product by name, listener via Enter
    $(document).on("keypress", "#searchProduct", function (e) {
        if (e.which == 13) {
            let search = $("#searchProduct input").val();
            $.ajax({
                type: "post",
                url: "./shop.php",
                data: {
                    search: search,
                },
                success: function (data) {
                    $("#content").html(data);
                    AOS.init();
                },
            });
        }
    });



    function getQtyProductCart(id) {
        let amount = parseInt(
            $("#quantity" + id)
            .text()
            .replace(/\D/g, "")
        );
        return amount;
    };

    function addProduct(id, qty) {
        if (checkProductExistCart(id)) {
            // có hàng trong giỏ chỉ cần tăng số lượng
            let add_qty = getQtyProductCart(id);
            let money = parseFloat(
                $("#product_id" + id + " .price .new")
                .text()
                .replace("$", "")
            );
            let total_qty = add_qty + qty;
            let total = parseFloat($("#totalmoney").text().replace("$", ""));
            let totalMoney = parseFloat(total + money * qty).toFixed(2);
            $("#quantity" + id + " > strong").text(total_qty);
            $("#totalmoney").text(totalMoney + "$");
        } else {
            // không có hàng trong giỏ thì thêm mới
            let amount = $("#count-cart").text();
            $("#count-cart").text(parseInt(amount) + 1);

            let image = $("#img-product" + id).attr("src");
            let name = $("#product" + id + " .product-title").text();
            if (name == '') name = $(".product-title").text();
            let newprice = $("#product" + id + " .price .new").text();
            if (newprice == '') newprice = $(".regular-price").text();
            let oldprice = $("#product" + id + " .price .old").text();
            if (oldprice == '') oldprice = $(".old-price").text();
            let total = parseFloat($("#totalmoney").text().replace("$", ""));
            let totalMoney = parseFloat(newprice.replace("$", "")) * qty + total;

            let html = `<div class="cart-product-inner p-b-20 m-b-20 border-bottom" id="product_id${id}">
                    <div class="single-cart-product">
                  <div class="cart-product-thumb">
                      <a href="./frontend/detail_product.php"><img src="${image}" alt="Cart Product" class="rounded"></a>
                  </div>
                  <div class="cart-product-content">
                      <h3 class="title"><a href="./frontend/detail_product.php">${name}</a></h3>
                      <div class="product-quty-price">
                          <span class="cart-quantity" id="quantity${id}">Số lượng: <strong> ${qty} </strong></span>
                          <span class="price">
                            `;

            if (oldprice != "") {
                html += `
              <span class="new">${newprice}</span>
              <span class="old" style="text-decoration: line-through;color: #DC3545;opacity: 0.5;">${oldprice}</span>
              </span>
            `;
            } else {
                html += `<span class='new'>${newprice}</span>
            </span>`;
            }
            html += `
                      </div>
                  </div>
              </div>
              <div class="cart-product-remove">
                  <a class="remove-cart" id="product${id}">
                    <i class="fa-duotone fa-trash-can"></i>
                  </a>
              </div>
          </div>`;

            $(".cart-product-wrapper").prepend(html);
            $("#product_id" + id).hide().fadeIn();
            $("#totalmoney").text(parseFloat(totalMoney).toFixed(2) + "$");
        }

        $.ajax({
            type: "post",
            url: "./backend/add_product_cart.php",
            data: {
                id: id,
                qty: qty,
            },
        });
    }

    /*-------------------------
        Ajax Shop Page
    ---------------------------*/
    $(document).on("click", ".add-to_cart", function () {
        let id = parseInt($(this).attr("id").replace("product", ""));
        let qty = parseInt($(".cart-plus-minus-box").val());
        addProduct(id, qty);
    });
    $(document).on('click', 'a#plus_product', function () {
        let id = parseInt($(this).parent().attr('id').replace('wrapper', ''));
        let qty = 1;
        addProduct(id, qty);
    });
    
    $(document).keydown('.shop_wrapper grid_4', function (e) {
        let next = $('.page-item a[aria-label="Next"]');
        let prev = $('.page-item a[aria-label="Prev"]');
        switch (e.which) {
            case 37: //left arrow key
                if (prev.length > 0) {
                    let id = parseInt($(prev).attr('name').split('page=')[1]);
                    choosePage(id - 1);
                }
                break;
            case 39: //right arrow key
                if (next.length > 0) {
                    let id = parseInt($(next).attr('name').split('page=')[1]);
                    choosePage(id + 1);
                }
                break;
        }
    })

    $(document).on('click', '.page-item a[aria-label="Next"]', function () {
        let id = parseInt($(this).attr('name').split('page=')[1]);
        choosePage(id + 1);
    });
    $(document).on('click', '.page-item a[aria-label="Prev"]', function () {
        let id = parseInt($(this).attr('name').split('page=')[1]);
        choosePage(id - 1);
    });
    $(document).on('click', '#page-choose', function () {
        let id = parseInt($(this).attr('name').split('page=')[1]);
        choosePage(id);
    });


    /*-------------------------
        Ajax Cart View
    ---------------------------*/
    $(document).on('click', '#clear-cart', function () {
        $('#table-cart').hide('normal', function () {
            $(this).remove();
        });
        $('.cart-product-wrapper').hide('normal', function () {
            $(this).remove();
        });
        $('#count-cart').text('0');
        $('#totalmoney').text('0.00$');
        $.ajax({
            type: 'post',
            url: './backend/clear_cart.php',
        });
    })


    /*-------------------------
        Ajax Remove Product Cart 
    ---------------------------*/
    $(document).on('click', '.remove-cart', function () {
        let id = $(this).attr('id').replace('product', '');
        $('#product_id' + id).fadeOut('normal', function () {
            let amount = parseInt($('#count-cart').text());
            $('#count-cart').text(amount - 1);
            let money = parseFloat($('#product_id' + id + " .price .new").text().replace('$', ''));
            let total = parseFloat($('#totalmoney').text().replace('$', ''));
            let qty = parseInt($('#quantity' + id).text().replace(/\D/g, ''));
            let totalMoney = (total - money * qty).toFixed(2);
            $('#totalmoney').text(totalMoney + '$');
            $(this).remove();
        });
        $.ajax({
            type: 'post',
            url: './backend/delete_product_cart.php',
            data: {
                delete_id: id
            },
        });
    });
});