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

use Hthiet\Xuongoop\Controllers\Admin\DashboardController;
use Hthiet\Xuongoop\Controllers\Admin\UserControler;

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
        $router->get('/',               UserControler::class . '@index');
        $router->get('/create',         UserControler::class . '@create');
        $router->post('/store',         UserControler::class . '@store');
        $router->get('/{id}/show',      UserControler::class . '@show');
        $router->get('/{id}/edit',      UserControler::class . '@edit');
        $router->post('/{id}/update',   UserControler::class . '@update');
        $router->get('/{id}/delete',    UserControler::class . '@delete');
    });
});
