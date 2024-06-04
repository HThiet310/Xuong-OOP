<?php

namespace Hthiet\Xuongoop\Controllers\Admin;

use Hthiet\Xuongoop\Commons\Controller;
use Hthiet\Xuongoop\Commons\Helper;

class DashboardController extends Controller
{
    public function dashboard() {        
        $this->renderViewAdmin(__FUNCTION__);
    }
}