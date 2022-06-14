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

    //* Load Content
    function reLoadHeader() {
        $.ajax({
            url: './frontend/header.php',
            success: function (data) {
                $('#header').html(data);
            }
        });
    }

    //* Check loged in
    function checkLoged() {
        let check = $('svg.svg-inline--fa.fa-user.fa-xl').length;
        if (check == 0) return true;
        else return false;
    }

    //* Load Content when refresh page
    function checkURL() {
        let url = new URL(window.location.href);
        let path = url.pathname;
        let id = path.replace('/', '');
        let loadPage = ['', 'about', 'account', `checkout`, 'contact', 'login', 'register', `shop`, 'viewcart', 'detail_product', 'order_view'];

        if (!loadPage.includes(id)) {
            loadContent('./404.php');
            return;
        }
        if (id == '') {
            return;
        } else if (id == 'detail_product' || id == 'order_view') {
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
        let short_by = $("option:selected", '.nice-select').val();
        if (short_by != 'default') {
            let total = parseInt($('.shop-top-show').text().trim().replace(/[^0-9\.]+/g, ''));
            $.ajax({
                type: 'post',
                url: './content/short-by-shop.php',
                data: {
                    page: id,
                    short_by: short_by,
                    total: total
                },
                success: function (data) {
                    $('#product-content').html(data);
                    AOS.init();
                }
            });
        } else {
            $.ajax({
                type: "get",
                url: './content/filter-shop.php',
                data: {
                    page: id
                },
                success: function (data) {
                    $("#shop-content").html(data);
                    AOS.init();
                },
            });
        }
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
    function notify(type, icon, position, msg) {
        Lobibox.notify(type, {
            pauseDelayOnHover: true,
            size: 'mini',
            rounded: true,
            icon: icon,
            continueDelayOnInactiveTab: false,
            position: position,
            msg: msg
        });
    }
    var callLogin = function(){
        let user = $('#loginForm input[name=user]').val();
        let pass = $('#loginForm input[name=pass]').val();

        if($('.is-invalid').length > 0) return;
        if (user == '' || pass == '') {
            notify('warning', 'fa-duotone fa-pen-field', 'center', 'Bạn chưa nhập tài khoản hoặc mật khẩu');
            return;
        }
        $.ajax({
            type: 'POST',
            url: './backend/login.php',
            async: false,
            data: {
                user: user,
                pass: pass,
                submit: true,
            },
            success: function (data) {
                if (data == 'true') {
                    window.history.pushState('home', 'HOME', './');
                    setTimeout(function () {
                        loadContent('./home.php');
                        notify('success', 'fa-duotone fa-user-check', 'bottom', 'Đăng Nhập Thành Công');
                    }, 300);
                    reLoadHeader();
                } else {
                    notify('error', 'fa-duotone fa-user-xmark', 'center', 'Sai tài khoản & mật khẩu');
                }
            }
        });
    }
    // Sign in
    $(document).on('click', '#loginForm button[name=submit]', function () {
        callLogin();
    });

    $(document).on('keypress', '#loginForm', function (e) {
        if (e.which == 13) { callLogin() }
    });
    
    // Register
    var callRegister = function(){
        let fullname = $('#registerForm input[name=fullname]').val();
        let username = $('#registerForm input[name=username]').val();
        let email = $('#registerForm input[name=email]').val();
        let password = $('#registerForm input[name=password]').val();

        if($('.is-invalid').length > 0) return;
        if (fullname == '' || username == '' || email == '' || password == '') {
            notify('warning', 'fa-duotone fa-pen-field', 'center', 'Bạn chưa nhập đầy đủ thông tin');
            return;
        }
        $.ajax({
            type: 'POST',
            url: './backend/register.php',
            async: false,
            data: {
                fullname: fullname,
                username: username,
                email: email,
                password: password,
                submit: true,
            },
            success: function (data) {
                if (data == 'true') {
                    window.history.pushState('login', 'LOGIN', './login');
                    setTimeout(function () {
                        loadContent('./login.php');
                        notify('success', 'fa-duotone fa-user-plus', 'bottom', 'Đăng Ký Thành Công');
                    }, 300);
                    reLoadHeader();
                } else {
                    notify('error', 'fa-duotone fa-person-walking-arrow-right', 'center', 'Tài khoản đã tồn tại');
                }
            }
        });
    }
    $(document).on('click', '#registerForm button[name=submit]', function () {
        callRegister();
    });
    $(document).on('keypress', '#registerForm', function(){
        if (e.which == 13) { callRegister() }
    })

    // Logout
    $(document).on('click', '#logout', function () {
        $.ajax({
            url: './backend/logout.php',
            success: function () {
                reLoadHeader();
            }
        });
        setTimeout(function () {
            window.history.pushState('home', 'HOME', './');
            loadContent('./home.php');
            notify('success', 'fa-duotone fa-right-from-bracket', 'bottom left', 'Đăng Xuất Thành Công');
        }, 300);
    })

    //Change Info
    var callChangeInfo = function(){
        let fullname = $('#changeInfoForm input[name=fullname]').val();
        let phone = $('#changeInfoForm input[name=phone]').val();
        let email = $('#changeInfoForm input[name=email]').val();
        
        if($('.is-invalid').length > 0) return;
        if(fullname == '' || phone == '' || email == ''){
            notify('warning', 'fa-duotone fa-pen-field', 'center', 'Bạn chưa nhập đầy đủ thông tin');
            return;
        }
        $.ajax({
            type: 'POST',
            url: './backend/change_info.php',
            data: {
                fullname: fullname,
                phone: phone,
                email: email,
                submit: true,
            },  
            async: false,
            success: function(data){
                if(data == 'true'){
                    notify('success', 'fa-duotone fa-user-check', 'center', 'Thay Đổi Thành Công');
                } else {
                    notify('error', 'fa-duotone fa-user-xmark', 'center', 'Thay Đổi Thất Bại');
                }
            }
        });
    }
    $(document).on('click', '#changeInfoForm button[name=submit]', function(){
        callChangeInfo();
    })
    $(document).on('keypress', '#changeInfoForm', function(e){
        if (e.which == 13) { callChangeInfo() }
    })

    var callChangePass = function(){
        let current_pwd = $('#changePassForm input[name=current_pwd]').val(); 
        let new_pwd = $('#changePassForm input[name=new_pwd]').val();
        let confirm_pwd = $('#changePassForm input[name=confirm_pwd]').val();
        if(current_pwd == '' || new_pwd == '' || confirm_pwd == ''){
            notify('warning', 'fa-duotone fa-pen-field', 'center', 'Bạn chưa nhập đầy đủ thông tin');
            return;
        }
        if($('.is-invalid').length > 0) return;
        $.ajax({
            type: 'POST',
            url: './backend/change_password.php',
            data: {
                current_pwd: current_pwd,
                new_pwd: new_pwd,
                submit: true,
            },
            async: false,
            success: function(data){
                if(data == 'true'){
                    notify('success', 'fa-duotone fa-user-check', 'center', 'Thay Đổi Thành Công');
                } else{
                    notify('error', 'fa-duotone fa-user-xmark', 'center', 'Thay Đổi Thất Bại');
                }
            }
        });
    }
    
    $(document).on('click', '#changePassForm button[name=submit]', function(){
        callChangePass();
    })
    $(document).on('keypress', '#changePassForm', function(e){
        if (e.which == 13) { callChangePass() }
    })

    $(document).on('click', '.load-product', function () {
        let id = 'detail_product';
        let id_product = $(this).attr('id');
        window.history.pushState(id, id.toUpperCase(), '/detail_product?id=' + id_product);
        loadContent('./detail_product.php?id=' + id_product);
    });
    $(document).on('click', '.load-order', function () {
        let id = 'order_view';
        let id_order = $(this).attr('id');
        window.history.pushState(id, id.toUpperCase(), '/order_view?id=' + id_order);
        loadContent('./order_view.php?id=' + id_order);
    });
    $(document).on('click', '.load-checkout', function () {
        let count_cart = parseInt($('#count-cart').text());
        if (count_cart > 0) {
            let id = 'checkout';
            window.history.pushState(id, id.toUpperCase(), '/checkout');
            loadContent('./checkout.php');
        } else {
            notify('warning', 'fa-duotone fa-right-to-bracket', 'bottom', 'Bạn chưa đăng nhập, hãy đăng nhập');
        }
    });

    //* Listen click to load content
    $(document).on('click', '.nav-content', function () {
        let url = new URL(window.location.href).pathname;
        let id = $(this).attr('id');
        let path;

        if (checkLoged() && (id == 'login' || id == 'register')) { //đã đăng nhập
            notify('error', 'fa-duotone fa-hexagon-xmark', 'bottom', 'Bạn đã đăng nhập, không thể sử dụng chức năng này');
            return;
        } else if (!checkLoged() && (id == 'account' || id == 'viewcart')) {
            notify('warning', 'fa-duotone fa-right-to-bracket', 'bottom', 'Bạn chưa đăng nhập, hãy đăng nhập');
            return;
        } else {
            if (id == 'home') path = '/';
            else path = '/' + id;
        }
        loadContent('./' + id + '.php');
        if (url != path) {
            window.history.pushState(id, id.toUpperCase(), path);
        }
    });

    $(document).on('click', '.category-filter', function () {
        let category_filter = $(this).attr('id');
        let active = $(this).parent();
        active.addClass('active').siblings().removeClass('active');
        $.ajax({
            type: "post",
            url: "./content/filter-shop.php",
            data: {
                category_filter: category_filter,
            },
            success: function (data) {
                $("#shop-content").html(data);
                AOS.init();
            },
        });
    });

    // SHOP
    $(document).on("keypress", "#searchFilterProduct", function (e) {
        if (e.which == 13) {
            let search_filter = $(this).val();
            $.ajax({
                type: "post",
                url: "./content/filter-shop.php",
                data: {
                    search_filter: search_filter
                },
                success: function (data) {
                    $("#shop-content").html(data);
                    AOS.init();
                }
            });
        }
    });

    $(document).on("click", ".search-box button", function () {
        let search_filter = $(this).siblings('input').val();
        $.ajax({
            type: "post",
            url: "./content/filter-shop.php",
            data: {
                search_filter: search_filter
            },
            success: function (data) {
                $("#shop-content").html(data);
                AOS.init();
            }
        });
    });
    $(document).on("change", ".nice-select", function () {
        let short_by = $("option:selected", this).val();
        let total = parseInt($('.shop-top-show').text().trim().replace(/[^0-9\.]+/g, ''));
        let category = $('.sidebar-list li.active a').attr('id');
        $.ajax({
            type: "post",
            url: "./content/short-by-shop.php",
            data: {
                short_by: short_by,
                total: total,
                category: category
            },
            success: function (data) {
                $("#product-content").html(data);
                AOS.init();
            }
        });
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
        $('.cart-product-wrapper').children().hide('normal', function () {
            $(this).remove();
        });
        $('#count-cart').text('0');
        $('#totalmoney').text('0.00$');
        $('#total-money').text('0.00$');
        $('#total-bill').text('0.00$');
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