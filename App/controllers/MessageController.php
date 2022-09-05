<?php

namespace App\controllers;

use App\core\Controller;

class MessageController extends Controller
{
    public function message($code = 404)
    {
        http_response_code($code);
        $this->load('errorView/main');
    }
}
