<?php

namespace Hthiet\Xuongoop\Controllers\Client;

use Hthiet\Xuongoop\Commons\Controller;
use Hthiet\Xuongoop\Commons\Helper;
use Hthiet\Xuongoop\Models\User;

class AuthenController extends Controller
{
    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function formShowLogin()
    {
        avoid_login();

        $this->renderViewClient('authens.login');
    }

    public function login() {
        avoid_login();

        try {
            $user = $this->user->findByEmail($_POST['email']);
            if (empty($user)) {
                throw new \Exception('Không tồn tại email: ' . $_POST['email']);
            }

            $flag = password_verify($_POST['password'], $user['password']); 
            if ($flag) {

                $_SESSION['user'] = $user;

                unset($_SESSION['cart']);

                if ($user['type'] == 'admin') {
                    header('Location: ' . url('admin/') );
                    exit;
                }

                header('Location: ' . url() );
                exit;
            }

            throw new \Exception('Password không đúng');
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th->getMessage();

            header('Location: ' . url('login') );
            exit;
        }
    }

    public function logout()
    {
        unset($_SESSION['cart-' . $_SESSION['user']['id'] ]);
        unset($_SESSION['user']);
        
        header('Location: ' . url());
        exit();
    }
}