(function ($) {
  "use strict";

  /*----------------------------------------
    Sticky Menu Activation
  ------------------------------------------*/

  $(window).on('scroll', function () {
    if ($(this).scrollTop() > 150) {
      $('.header-sticky').addClass('sticky');
    } else {
      $('.header-sticky').removeClass('sticky');
    }
  });

  /*---------------------
      Header Search Action
  --------------------- */

  $(".action-execute").on('click', function () {
    // If the clicked element has the active class, remove the active class from EVERY .nav-link>.state element
    if ($(".action-execute, .header-search-form").hasClass("visible-execute")) {
      $(".action-execute, .header-search-form").removeClass("visible-execute");
    }
    // Else, the element doesn't have the active class, so we remove it from every element before applying it to the element that was clicked
    else {
      $(".action-execute, .header-search-form").removeClass("visible-execute");
      $(".action-execute, .header-search-form").addClass("visible-execute");
    }
  });

  /*---------------------
      Header Cart Toggle
  --------------------- */

  $(".cart-visible").on('click', function () {
    $(".header-cart-content").slideToggle("slow");
  });

  /*-----------------------------------------
    Off Canvas Mobile Menu
  -------------------------------------------*/

  $(".header-action-btn-menu").on('click', function () {
    $("body").addClass('fix');
    $(".mobile-menu-wrapper").addClass('open');
  });

  $(".offcanvas-btn-close,.offcanvas-overlay").on('click', function () {
    $("body").removeClass('fix');
    $(".mobile-menu-wrapper").removeClass('open');
  });

  /*----------------------------------------*/
  /* Toggle Function Active
  /*----------------------------------------*/

  // showlogin toggle
  $('#showlogin').on('click', function () {
    $('#checkout-login').slideToggle(500);
  });
  // showlogin toggle
  $('#showcoupon').on('click', function () {
    $('#checkout_coupon').slideToggle(500);
  });
  // showlogin toggle
  $('#cbox').on('click', function () {
    $('#cbox-info').slideToggle(500);
  });

  // Ship box toggle
  $('#ship-box').on('click', function () {
    $('#ship-box-info').slideToggle(1000);
  });

  /*----------------------------------------
    Responsive Mobile Menu
  ------------------------------------------*/

  //Variables
  var $offCanvasNav = $('.mobile-menu, .category-menu'),
    $offCanvasNavSubMenu = $offCanvasNav.find('.dropdown');

  //Close Off Canvas Sub Menu
  $offCanvasNavSubMenu.slideUp();

  //Category Sub Menu Toggle
  $offCanvasNav.on('click', 'li a, li .menu-expand', function (e) {
    var $this = $(this);
    if (($this.parent().attr('class').match(/\b(menu-item-has-children|has-children|has-sub-menu)\b/)) && ($this.attr('href') === '#' || $this.hasClass('menu-expand'))) {
      e.preventDefault();
      if ($this.siblings('ul:visible').length) {
        $this.parent('li').removeClass('active');
        $this.siblings('ul').slideUp();
      } else {
        $this.parent('li').addClass('active');
        $this.closest('li').siblings('li').removeClass('active').find('li').removeClass('active');
        $this.closest('li').siblings('li').find('ul:visible').slideUp();
        $this.siblings('ul').slideDown();
      }
    }
  });

  /*----------------------------------------
	   Slider Activation
    ------------------------------------------*/

  /* Hero Slider Activation */
  var swiper = new Swiper('.hero-slider.swiper-container', {
    loop: true,
    speed: 1150,
    spaceBetween: 30,
    slidesPerView: 1,
    effect: 'fade',
    pagination: true,
    navigation: true,

    // Navigation arrows
    navigation: {
      nextEl: '.hero-slider .home-slider-next',
      prevEl: '.hero-slider .home-slider-prev'
    },
    pagination: {
      el: '.hero-slider .swiper-pagination',
      type: 'bullets',
      clickable: 'true'
    },
  });

  /* Product Deal Activation */
  var swiper = new Swiper('.product-deal-carousel .swiper-container', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    pagination: true,
    navigation: true,
    slideVisibleClass: 'swiper-slide-visible',
    watchSlidesVisibility: true,

    navigation: {
      nextEl: '.product-deal-carousel .swiper-deal-button-next',
      prevEl: '.product-deal-carousel .swiper-deal-button-prev'
    },
    pagination: {
      el: '.product-deal-carousel .swiper-pagination',
      type: 'bullets',
      clickable: 'true'
    }

  });

  // Testimonial Carousel
  var galleryThumbs = new Swiper('.testimonial-gallery-top', {
    slidesPerView: 1,
    loop: true,
    effect: 'fade',
    fadeEffect: {
      crossFade: true
    },
    grabCursor: false,
    centeredSlides: true,
  });
  var galleryTop = new Swiper('.testimonial-gallery-thumbs', {
    loop: true,
    effect: 'coverflow',
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 50,
      modifier: 6,
      slideShadows: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    thumbs: {
      swiper: galleryThumbs,
    }
  });

  // Single Product Carousel
  var productgalleryThumbs = new Swiper('.product-gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 3,
    // loop: false,
    freeMode: true,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
  });
  var galleryTop = new Swiper('.product-gallery-top', {
    spaceBetween: 10,
    loop: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    thumbs: {
      swiper: productgalleryThumbs
    }
  });

  /* Pruduct Carousel Activation */
  var productCarousel = new Swiper('.product-carousel .swiper-container', {
    loop: true,
    slidesPerView: 4,
    spaceBetween: 20,
    slideVisibleClass: 'swiper-slide-visible',
    watchSlidesVisibility: true,
    observer: true,
    observeParents: true,

    pagination: {
      el: '.product-carousel .swiper-pagination',
      type: 'bullets',
      clickable: 'true'
    },

    // Navigation arrows
    navigation: {
      nextEl: '.product-carousel .swiper-button-next',
      prevEl: '.product-carousel .swiper-button-prev',
    },
    // Responsive breakpoints
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1,
        spaceBetween: 10
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 2,
        spaceBetween: 20
      },
      // when window width is >= 768px
      768: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      // when window width is >= 992px
      992: {
        slidesPerView: 3,
        spaceBetween: 20
      },
      // when window width is >= 1200px
      1200: {
        slidesPerView: 4,
        spaceBetween: 20
      }
    }
  });

  /* Modal Product Carousel Activation */
  var productCarousel = new Swiper('.modal-product-carousel .swiper-container', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 0,
    pagination: false,
    navigation: true,
    observer: true,
    observeParents: true,

    navigation: {
      nextEl: '.modal-product-carousel .swiper-product-button-next',
      prevEl: '.modal-product-carousel .swiper-product-button-prev'
    }
  });

  /*----------------------------------------*/
  /*  Shop Grid Activation
  /*----------------------------------------*/

  $('.shop_toolbar_btn > button').on('click', function (e) {

    e.preventDefault();

    $('.shop_toolbar_btn > button').removeClass('active');
    $(this).addClass('active');

    var parentsDiv = $('.shop_wrapper');
    var viewMode = $(this).data('role');


    parentsDiv.removeClass('grid_3 grid_4 grid_5 grid_list').addClass(viewMode);

    if (viewMode == 'grid_3') {
      parentsDiv.children().addClass('col-lg-4 col-md-4 col-sm-6').removeClass('col-lg-3 col-cust-5 col-12');

    }

    if (viewMode == 'grid_4') {
      parentsDiv.children().addClass('col-xl-3 col-lg-4 col-md-4 col-sm-6').removeClass('col-lg-4 col-cust-5 col-12');
    }

    if (viewMode == 'grid_list') {
      parentsDiv.children().addClass('col-12').removeClass('col-xl-3 col-lg-3 col-lg-4 col-md-6 col-md-4 col-sm-6 col-cust-5');
    }

  });

  /*----------------------------------------*/
  /*  Countdown
  /*----------------------------------------*/

  $('[data-countdown]').each(function () {
    var $this = $(this),
      finalDate = $(this).data('countdown');
    $this.countdown(finalDate, function (event) {
      $this.html(event.strftime('<div class="single-countdown"><span class="single-countdown_time">%D</span><span class="single-countdown_text">Days</span></div><div class="single-countdown"><span class="single-countdown_time">%H</span><span class="single-countdown_text">Hours</span></div><div class="single-countdown"><span class="single-countdown_time">%M</span><span class="single-countdown_text">Mins</span></div><div class="single-countdown"><span class="single-countdown_time">%S</span><span class="single-countdown_text">Secs</span></div>'));
    });
  });

  /*----------------------------------------*/
  /*  Cart Plus Minus Button
  /*----------------------------------------*/

  $('.cart-plus-minus').append(
    '<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>'
  );
  $('.qtybutton').on('click', function () {
    var $button = $(this);
    var oldValue = $button.parent().find('input').val();
    if ($button.hasClass('inc')) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }
    $button.parent().find('input').val(newVal);
  });


  /*----------------------------------------*/
  /*  Lightgallery Active
  /*----------------------------------------*/

  $(".popup-gallery").lightGallery({
    pager: false, // Enable/Disable pager
    thumbnail: false, // Enable thumbnails for the gallery
    fullScreen: true, // Enable/Disable fullscreen mode
    zoom: true, // Enable/Disable zoom option
    rotateLeft: true, // Enable/Disable Rotate Left
    rotateRight: true, // Enable/Disable Rotate Right
  });

  /*---------------------------------
    MailChimp
    -----------------------------------*/
  $('#mc-form').ajaxChimp({
    language: 'en',
    callback: mailChimpResponse,
    // ADD YOUR MAILCHIMP URL BELOW HERE!
    url: 'http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef'
  });

  function mailChimpResponse(resp) {
    if (resp.result === 'success') {
      $('.mailchimp-success').html('' + resp.msg).fadeIn(900);
      $('.mailchimp-error').fadeOut(400);
    } else if (resp.result === 'error') {
      $('.mailchimp-error').html('' + resp.msg).fadeIn(900);
    }
  }

  /*-------------------------
      Ajax Add Product Cart 
  ---------------------------*/
  function checkProductCart(id) {
    let check = $('.cart-product-wrapper .cart-product-inner');
    for (let i = 0; i < check.length; i++) {
      if (check[i].id == 'product_id' + id)
        return true;
    }
    return false
  }
  $('.add-to_cart').on('click', function () {
    let qty = parseInt($('.cart-plus-minus-box').val());
    let id = $(this).attr('id').replace('product', '');
    $.ajax({
      type: 'post',
      url: '/backend/add_product_cart.php',
      data: {
        add_id: id,
        qty: qty
      },
      success: function () {
        let product = $('.cart-product-wrapper');
        if (checkProductCart(id)) {
          // có hàng trong giỏ chỉ cần tăng số lượng
          let add_qty = parseInt($('#quantity' + id).text().replace(/\D/g, ''));
          let money = parseFloat($('#product_id' + id + " .price .new").text().replace('$', ''));
          let total_qty = add_qty + qty;
          let total = parseFloat($('#totalmoney').text().replace('$', ''));
          let totalMoney = parseFloat(total + money * qty).toFixed(2);
          $('#quantity' + id + ' > strong').text(total_qty);
          $('#totalmoney').text(totalMoney + '$');
          
        } else {
          // không có hàng trong giỏ thì thêm mới
          let amount = $('#count-cart').text();
          let image = $('#img-product' + id).attr('src');
          let name = $('.product-title').text();
          let newprice = $('.regular-price').text();
          let oldprice = $('.old-price').text();
          let total = parseFloat($('#totalmoney').text().replace('$', ''));
          let totalMoney = parseFloat(newprice.replace('$', '')) * qty + total;
          $('#count-cart').text(parseInt(amount) + 1);

          let html = `<div class="cart-product-inner p-b-20 m-b-20 border-bottom" id="product_id${id}">
              <div class="single-cart-product">
                  <div class="cart-product-thumb">
                      <a href="/frontend/detail_product.php"><img src="${image}" alt="Cart Product" class="rounded"></a>
                  </div>
                  <div class="cart-product-content">
                      <h3 class="title"><a href="/frontend/detail_product.php">${name}</a></h3>
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
                  <a class="remove-cart" id="product${id}" onclick="
                    $.ajax({
                      type: 'post',
                      url: '/backend/delete_product_cart.php',
                      data: { delete_id: ${id} },
                      success: function () {
                        let total = parseFloat($('#totalmoney').text().replace('$', ''));
                        let amount = parseInt($('#count-cart').text());
                        let qty = $('#quantity${id}').text().replace(/\\D/g, '');c
                        let money = parseFloat('${newprice}'.replace('$', ''));
                        let totalMoney = parseFloat(total - money * qty).toFixed(2);
                        console.log(money);
                        console.log(total);
                        console.log(qty);
                        console.log(totalMoney);
                        $('#product_id${id}').hide('normal', function () {
                          $(this).remove();
                        });
                        $('#count-cart').text(amount - 1);
                        $('#totalmoney').text(totalMoney + '$');
                      }
                    });
                  ">
                    <i class="fa fa-trash-o"></i>
                  </a>
              </div>
          </div>`;
          $('.cart-product-wrapper').append(html);
          $('#product_id'+id).hide().fadeIn('slow');
          $('#totalmoney').text(parseFloat(totalMoney) + '$');
        }
      }
    });
  });

  /*-------------------------
      Ajax Clear Cart
  ---------------------------*/  
  $('#clear-cart').on('click', function(){
    $.ajax({
      type: 'post',
      url: '/backend/clear_cart.php',
      success: function(){
        $('#table-cart').fadeOut("normal", function(){
          $(this).remove();
        });
        $('.cart-product-wrapper').fadeOut("normal", function(){
          $(this).remove();
        });
        $('#count-cart').text('0');
        $('#totalmoney').text('0.00$');
      }
    });
  })

  /*-------------------------
      Ajax Remove Product View Cart 
  ---------------------------*/
  $('.pro-remove > a').on('click', function(){
    let id = $(this).closest('tr').attr('id').replace('view_cart_product', '');
    $.ajax({
      type: 'post',
      url: '/backend/delete_product_cart.php',
      data: { delete_id: id },
      success: function(){
        let money = parseFloat($('#product_id' + id + " .price .new").text().replace('$', ''));
        let total = parseFloat($('#totalmoney').text().replace('$', ''));
        let amount = parseInt($('#count-cart').text());
        let qty = parseInt($('#quantity' + id).text().replace(/\D/g, ''));
        console.log(money, total, amount, qty);
        $('#view_cart_product'+id).fadeOut('normal', function(){
          $(this).remove();
        });
        let totalMoney = (total - money * qty).toFixed(2);
        console.log(totalMoney);
        $('#totalmoney').text(totalMoney + '$');
        $('#count-cart').text(amount - 1);
        $('#product_id' + id).hide('normal', function () {
          $(this).remove();
        });
      }
    });
  });

  /*-------------------------
      Ajax Remove Product Cart 
  ---------------------------*/
  $('.remove-cart').on('click', function () {
    let id = $(this).attr('id').replace('product', '');
    $.ajax({
      type: 'post',
      url: '/backend/delete_product_cart.php',
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
        $('#product_id' + id).hide('normal', function () {
          $(this).remove();
        });
      }
    });
  });

  /*-------------------------
      Ajax Load Data Nagivation
  ---------------------------*/
    $('#nav-home a').on('click', function(){
      $.ajax({
        url: '/home.php',
        success: function(data){
          $('#content').html(data);

        }
      });
    });
    $('#nav-about a').on('click', function(){
      $.ajax({
        url: '/about.php',
        success: function(data){
          $('#content').html(data);

        }
      });
    });
    $('#nav-contact a').on('click', function(){
      $.ajax({
        url: '/contact.php',
        success: function(data){
          $('#content').html(data);
          $('.contact-form-wrapper').hide().fadeIn('slow');
          $('#mapDiv').hide().fadeIn('fast');
        }
      });
    });
    $('#nav-shop a').on('click', function(){
      $.ajax({
        url: '/shop.php',
        success: function(data){
          $('#content').html(data);
        }
      });
    });
    $('#login').on('click', function(){
      $.ajax({
        url: '/login.php',
        success: function(data){
          $('#content').html(data);
        }
      });
    });
    $('#account').on('click', function(){
      $.ajax({
        url: '/account.php',
        success: function(data){
          $('#content').html(data);
        }
      }); 
    });

    function nav(){
      let pathURL = window.location.href;
      if(pathURL.indexOf('#') == -1){
        $('#content').load('/home.php');
      } else {
        let path = pathURL.split('/')[3].split('#')[1];
        $('#content').load('/' + path + '.php');
      }
    }
    nav();
  
  /*-------------------------
      Ajax Contact Form 
  ---------------------------*/
  $(function () {

    // Get the form.
    var form = $('#contact-form');

    // Get the messages div.
    var formMessages = $('.form-messege');

    // Set up an event listener for the contact form.
    $(form).on('submit', function (e) {
      // Stop the browser from submitting the form.
      e.preventDefault();

      // Serialize the form data.
      var formData = $(form).serialize();

      // Submit the form using AJAX.
      $.ajax({
          type: 'POST',
          url: $(form).attr('action'),
          data: formData
        })
        .done(function (response) {
          // Make sure that the formMessages div has the 'success' class.
          $(formMessages).removeClass('error');
          $(formMessages).addClass('success');

          // Set the message text.
          $(formMessages).text(response);

          // Clear the form.
          $('#contact-form input,#contact-form textarea').val('');
        })
        .fail(function (data) {
          // Make sure that the formMessages div has the 'error' class.
          $(formMessages).removeClass('success');
          $(formMessages).addClass('error');

          // Set the message text.
          if (data.responseText !== '') {
            $(formMessages).text(data.responseText);
          } else {
            $(formMessages).text('Oops! An error occured and your message could not be sent.');
          }
        });
    });

  });

  /*----------------------------------------*/
  /*  Scroll to top
  /*----------------------------------------*/
  function scrollToTop() {
    var $scrollUp = $('#scroll-top'),
      $lastScrollTop = 0,
      $window = $(window);

    $window.on('scroll', function () {
      var st = $(this).scrollTop();
      if (st > $lastScrollTop) {
        $scrollUp.removeClass('show');
      } else {
        if ($window.scrollTop() > 200) {
          $scrollUp.addClass('show');
        } else {
          $scrollUp.removeClass('show');
        }
      }
      $lastScrollTop = st;
    });

    $scrollUp.on('click', function (evt) {
      $('html, body').animate({
        scrollTop: 0
      }, 600);
      evt.preventDefault();
    });
  }
  scrollToTop();

  /*----------------------------------------*/
  /*  When document is loading, do
  /*----------------------------------------*/
  var varWindow = $(window);
  varWindow.on('load', function () {
    AOS.init({
      once: true,
    });
  });

})(jQuery);