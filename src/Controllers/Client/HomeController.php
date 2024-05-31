<?php

namespace Hthiet\Xuongoop\Controllers\Client;

use Hthiet\Xuongoop\Commons\Controller;
use Hthiet\Xuongoop\Commons\Helper;
use Hthiet\Xuongoop\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $name = 'Hthiet';

        $this->rendViewClient('Home', [
            'name' => $name
        ]);
    }
}