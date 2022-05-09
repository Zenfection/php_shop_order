$(function () {
	"use strict";

	function loadContent(pathUrl) {
		$.ajax({
			url: pathUrl,
			success: function (data) {
				window.scrollTo(0, 0);
				$('#content').html(data);
				AOS.init();
			}
		});
	}

	// function checkURL() {
	// 	if (window.location.href === window.location.origin + '/admin/') {
	// 		window.location.href = window.location.origin + '/admin/index.php';
	// 	}
	// }
	// checkURL();

	function nav() {
		let pathURL = window.location.href;
		if (pathURL.indexOf('#') == -1 && pathURL.indexOf('?') == -1) {
			loadContent('/admin/dashboard.php');
		} else {
			let path = pathURL.split('/')[4].split('#')[1].replace("=", "");
			path = '/admin/' + path + '.php';
			$.ajax({
				url: path,
				success: function (data) {
					$('#content').html(data);
					AOS.init();
				}
			});
		}
	}
	nav();
	/*-------------------------
		Ajax Load Data Nagivation
	---------------------------*/
	$(document).on('click', '#sidebar-dashboard', function () {
		loadContent('/admin/dashboard.php');
	});
	$(document).on('click', '#sidebar-product', function () {
		loadContent('/admin/product.php');
	});
	$(document).on('click', '#sidebar-order', function () {
		loadContent('/admin/order.php');
	});
	$(document).on('click', '#sidebar-product', function () {
		loadContent('/admin/customer.php');
	});
	$(document).on('click', '#sidebar-add-product', function () {
		loadContent('/admin/add_product.php');
	});
	$(document).on('click', '.viewOrderDetails', function(){
		let id = $(this).attr('id');
		$.ajax({
			type: 'POST',
			url: '/admin/order_details.php',
			data: {id: id},
			success: function (data) {
				window.scrollTo(0, 0);
				$('#content').html(data);
				AOS.init();
			}
		});
	});
});