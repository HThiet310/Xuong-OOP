<?php

namespace Hthiet\Xuongoop\Controllers\Client;

use Hthiet\Xuongoop\Commons\Controller;
use Hthiet\Xuongoop\Commons\Helper;
use Hthiet\Xuongoop\Models\Product;
use Hthiet\Xuongoop\Models\User;

class HomeController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    
    public function home()
    {
        $name = 'Hoàng Thiết';

        $products = $this->product->all();

        $this->renderViewClient('home', [
            'name' => $name,
            'products' => $products
        ]);
    }
}