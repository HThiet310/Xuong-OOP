<?php

// Giả định web có các trang: 
//      Trang chủ
//      Giới thiệu
//      Sản phẩm
//      Chi tiết sản phẩm
//      Liên hệ

// Để định nghĩa đc cần tạo controller trc
// Tiếp theo khai báo function tương ứng để xử lý
// Bước cuối, định nghĩa đường dẫn

// HTTP Method: get, post, put, path, delete, options, patch, head

use Hthiet\Xuongoop\Controllers\Client\AuthenController;
use Hthiet\Xuongoop\Controllers\Client\CartController;
use Hthiet\Xuongoop\Controllers\Client\ContactControler;
use Hthiet\Xuongoop\Controllers\Client\HomeController;
use Hthiet\Xuongoop\Controllers\Client\AboutController;
use Hthiet\Xuongoop\Controllers\Client\OrderController;
use Hthiet\Xuongoop\Controllers\Client\ProductController;

// Home
$router->get('/',                               HomeController::class       . '@home');

// Authen
$router->get('/login',                   AuthenController::class     . '@formShowLogin');
$router->post('/login/handle-login',     AuthenController::class     . '@login');
$router->get('/logout',                  AuthenController::class     . '@logout');
$router->get('/register',                AuthenController::class     . '@createUser');
$router->post('/register/store',         AuthenController::class     . '@store');

// About
$router->get('/about',                          AboutController::class      . '@index');

// Contact
$router->get('/contact',                        ContactControler::class     . '@index');
$router->get('/contact/store',                  ContactControler::class     . '@store');

// Product
$router->get('/product',                        ProductController::class    . '@index');
$router->get('/product/{id}',                   ProductController::class    . '@detail');

// Cart
$router->get('cart/add',           CartController::class . '@add');
$router->get('cart/quantityInc',   CartController::class . '@quantityInc');
$router->get('cart/quantityDec',   CartController::class . '@quantityDec');
$router->get('cart/remove',        CartController::class . '@remove');
$router->get('cart/detail',        CartController::class . '@detail');

// Order
$router->post('order/checkout',     OrderController::class . '@checkout');