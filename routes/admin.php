<?php

// CRUD bao gồm: Danh sách, thêm, sửa, xóa
// User:
//      GET     -> USER/INDEX   -> INDEX    -> Danh sách
//      GET     -> USER/CREATE  -> CREATE   -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE    -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID/SHow -> SHOW ($id)     -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT -> EDIT ($id)     -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      -> UPDATE ($id)   -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID      -> DELETE ($id)   -> XÓA BẢ

use Hthiet\Xuongoop\Controllers\Admin\CategoryController;
use Hthiet\Xuongoop\Controllers\Admin\DashboardController;
use Hthiet\Xuongoop\Controllers\Admin\ProductController;
use Hthiet\Xuongoop\Controllers\Admin\UserControler;


// $router->before('GET|POST', '/admin/*.*', function () {
//     if(!is_logged()){
//         header('Location: ' . url('login'));
//         exit();
//     }

//     if(!is_admin()){
//         header('Location: ' . url());
//         exit();
//     }
// });

$router->mount('/admin', function () use ($router) {

    // DASHBOARD
    $router->get('/',      DashboardController::class . '@dashboard');

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserControler::class . '@index');
        $router->get('/create',         UserControler::class . '@create');
        $router->post('/store',         UserControler::class . '@store');
        $router->get('/{id}/show',      UserControler::class . '@show');
        $router->get('/{id}/edit',      UserControler::class . '@edit');
        $router->post('/{id}/update',   UserControler::class . '@update');
        $router->get('/{id}/delete',    UserControler::class . '@delete');
    });

    // CRUD PRODUCT
    $router->mount('/products', function () use ($router) {
        $router->get('/',               ProductController::class . '@index');
        $router->get('/create',         ProductController::class . '@create');
        $router->post('/store',         ProductController::class . '@store');
        $router->get('/{id}/show',      ProductController::class . '@show');
        $router->get('/{id}/edit',      ProductController::class . '@edit');
        $router->post('/{id}/update',   ProductController::class . '@update');
        $router->get('/{id}/delete',    ProductController::class . '@delete');
    });

    // CRUD CATEGORY
    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoryController::class . '@index');
        $router->get('/create',         CategoryController::class . '@create');
        $router->post('/store',         CategoryController::class . '@store');
        $router->get('/{id}/show',      CategoryController::class . '@show');
        $router->get('/{id}/edit',      CategoryController::class . '@edit');
        $router->post('/{id}/update',   CategoryController::class . '@update');
        $router->get('/{id}/delete',    CategoryController::class . '@delete');
    });

});
