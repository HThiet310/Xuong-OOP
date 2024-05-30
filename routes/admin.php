<?php

// CRUD bao gồm: Danh sách, thêm, sửa, xóa
// User:
//      GET     -> USER/INDEX   -> INDEX    -> Danh sách
//      GET     -> USER/CREATE  -> CREATE   -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE    -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID      -> SHOW ($id)     -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT -> EDIT ($id)     -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      -> UPDATE ($id)   -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID      -> DELETE ($id)   -> XÓA BẢ

use Hthiet\Xuongoop\Controllers\Admin\UserControler;

$router->mount('/admin', function () use ($router) {
    
    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',           UserControler::class . '@index');
        $router->get('/create',     UserControler::class . '@create');
        $router->post('/store',     UserControler::class . '@store');
        $router->get('/{id}',       UserControler::class . '@show');
        $router->get('/{id}/edit',  UserControler::class . '@edit');
        $router->put('/{id}',       UserControler::class . '@update');
        $router->delete('/{id}',    UserControler::class . '@delete');
    });
});

