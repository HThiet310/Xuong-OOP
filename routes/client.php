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

use Hthiet\Xuongoop\Controllers\Client\HomeController;
use Hthiet\Xuongoop\Controllers\Client\AboutController;
use Hthiet\Xuongoop\Controllers\Client\ProductController;


$router->get('/',               HomeController::class       . '@index');
$router->get('/about',          AboutController::class      . '@index');

$router->get('/contact',        HomeController::class       . '@index');
$router->get('/contact/store',  HomeController::class       . '@index');

$router->get('/product',        ProductController::class    . '@index');
$router->get('/product/{id}',   ProductController::class    . '@detail');