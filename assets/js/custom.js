$(function () {
    /* Function
    ------------------------- */
    var historyPage = new Array();
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
        let check = $('.header-actions #login').text().trim().toLowerCase();
        if (check == 'login') return false;
        else return true;
    }

    //* Load Content when refresh page
    function checkURL() {
        let url = new URL(window.location.href);
        let path = url.pathname;
        let id = path.replace('/', '');
        let loadPage = ['', 'about', 'account', `checkout`, 'contact', 'login', 'register', `shop`, 'viewcart'];

        if (id.indexOf('detail') > -1 || id.indexOf('order_view') > -1) {
            return;
        }
        if (!loadPage.includes(id)) {
            $('body').html('<h1>404 Page Not Found</h1>');
            return;
        }

        if (id == '') {
            id = 'home';
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
        if(id == '') id = 'home';

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
        let path;

        if (checkLoged() && (id == 'login' || id == 'register')) { //đã đăng nhập
            path = '/account';
            id = 'account';
        } else if (!checkLoged() && (id == 'account' || id == 'viewcart' || id == 'checkout')) {
            path = '/login';
            id = 'login';
        } else {
            if(id == 'home') path = '/';
            else path = '/' + id;
        }
        loadContent('./' + id + '.php');
        if(url != path){ 
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
            let newprice = $("#product" + id + " .price .new").text();
            let oldprice = $("#product" + id + " .price .old").text();
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
                    <i class="fa fa-trash-o"></i>
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
                add_id: id,
                qty: qty,
            },
        });
    }

    /*-------------------------
        Ajax Shop Page
    ---------------------------*/
    $(document).on("click", ".add-to_cart", function () {
        let qty = parseInt($(".cart-plus-minus-box").val());
        let id = $(this).attr("id").replace("product", "");
        $.ajax({
            type: "post",
            url: "./backend/add_product_cart.php",
            data: {
                add_id: id,
                qty: qty,
            },
            success: function () {
                addProduct(id, qty);
            },
        });
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
        $.ajax({
            type: 'post',
            url: './backend/clear_cart.php',
            success: function () {
                $('#table-cart').fadeOut("normal", function () {
                    $(this).remove();
                });
                $('.cart-product-wrapper').fadeOut("normal", function () {
                    $(this).remove();
                });
                $('#count-cart').text('0');
                $('#totalmoney').text('0.00$');
            }
        });
    })


    /*-------------------------
        Ajax Remove Product Cart 
    ---------------------------*/
    $(document).on('click', '.remove-cart', function () {
        let id = $(this).attr('id').replace('product', '');
        $('#product_id' + id).hide('normal');
        $.ajax({
            type: 'post',
            url: './backend/delete_product_cart.php',
            data: {
                delete_id: id
            },
            success: function () {
                let money = parseFloat($('#product_id' + id + " .price .new").text().replace('$', ''));
                let total = parseFloat($('#totalmoney').text().replace('$', ''));
                let amount = parseInt($('#count-cart').text());
                let qty = parseInt($('#quantity' + id).text().replace(/\D/g, ''));
                let totalMoney = (total - money * qty).toFixed(2);
                $('#totalmoney').text(totalMoney + '$');
                $('#count-cart').text(amount - 1);

                $('#product_id' + id).remove();
            }
        });
    });

    /*-------------------------
        Ajax Plus Product
    ---------------------------*/
    $(document).on('click', 'a#plus_product', function () {
        let id = $(this).parent().attr('id').replace('wrapper', '');
        let add_qty = 1;
        addProduct(parseInt(id), add_qty);
    });

});