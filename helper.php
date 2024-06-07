<?php

// Hỗ trợ cho việc upload file
const PATH_ROOT = __DIR__ . '/';

// 
if (!function_exists('asset')) {
    function asset($path)
    {
        return $_ENV['BASE_URL'] . $path;
    }
}

//
if (!function_exists('url')) {
    function url($uri = null)
    {
        return $_ENV['BASE_URL'] . $uri;
    }
}

// // Check đã đăng nhập
// if (!function_exists('is_logged')) {
//     function is_logged()
//     {
//         return isset($_SESSION['user']);
//     }
// }

// // Check đăng nhận admin
// if (!function_exists('is_admin')) {
//     function is_admin()
//     {
//         return is_logged() && $_SESSION['user']['type'] == 'admin';
//     }
// }

// // Bỏ qua trang login khi đã đăng nhập
// if (!function_exists('avoid_login')) {
//     function avoid_login()
//     {
//         if (is_logged()) {
//             if ($_SESSION['user']['type'] == 'admin') {
//                 header('Location: ' . url('admin/'));
//                 exit();
//             }
//             header('Location: ' . url());
//             exit();
//         }
//     }
// }
