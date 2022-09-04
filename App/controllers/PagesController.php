<?php

namespace App\controllers;

use App\core\Controller;

class PagesController extends Controller
{
    public function home()
    {
        $this->load('home/main');
    }
}

