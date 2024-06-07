<?php

namespace Hthiet\Xuongoop\Controllers\Client;

use Hthiet\Xuongoop\Commons\Controller;

class ContactControler extends Controller
{
    public function index()
    {
        $this->renderViewClient('contacts.index');
    }

    public function create()
    {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function store()
    {
        
    }
}