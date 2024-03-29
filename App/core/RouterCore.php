<?php

namespace app\core;


class RouterCore
{
    private $uri;
    private $method;
    private $getArr = [];
    private $isExecute404 = false;

    public function __construct()
    {
     
        $this->initialize();
        require_once('../app/config/Router.php');
        $this->execute();
        $this->checkStatusError();
    }

    private function checkStatusError() {
        if($this->isExecute404) {
            (new \App\controllers\MessageController)->message(404);
            return;
        } else {
            $this->isExecute404 = false;
        }
    }

    private function initialize()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];

        $uri = $_SERVER['REQUEST_URI'];

        if (strpos($uri, '?'))
            $uri = mb_substr($uri, 0, strpos($uri, '?'));

        $ex = explode('/', $uri);

        $uri = $this->normalizeURI($ex);

        for ($i = 0; $i < UNSET_URI_COUNT; $i++) {
            unset($uri[$i]);
        }

        $this->uri = implode('/', $this->normalizeURI($uri));
        if (DEBUG_URI)
            dd($this->uri);
    }

    private function get($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function post($router, $call)
    {
        $this->getArr[] = [
            'router' => $router,
            'call' => $call
        ];
    }

    private function execute()
    {
        switch ($this->method) {
            case 'GET':
                $this->executeGet();
                break;
            case 'POST':
                $this->executePost();
                break;
        }
    }

    private function executeGet()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);
      
            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }
          
            if ($r == $this->uri) {
                $this->isExecute404 = false;
                
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }
                $this->executeController($get['call']);
                return;
            } else {
                $this->isExecute404 = true;
            }
        }
    }

    private function executePost()
    {
        foreach ($this->getArr as $get) {
            $r = substr($get['router'], 1);

            if (substr($r, -1) == '/') {
                $r = substr($r, 0, -1);
            }

            if ($r == $this->uri) {
                if (is_callable($get['call'])) {
                    $get['call']();
                    return;
                }
                $this->executeController($get['call']);
            } else {
                $this->isExecute404 = true;
            }
        }
    }

    private function executeController($get)
    {
        $ex = explode('@', $get);
        if (!isset($ex[0]) || !isset($ex[1])) {
            (new \App\controllers\MessageController)->message(404);
            return;
        }

        $cont = 'App\\controllers\\' . $ex[0];
        if (!class_exists($cont)) {
            (new \App\controllers\MessageController)->message(404);
            return;
        }


        if (!method_exists($cont, $ex[1])) {
            (new \App\controllers\MessageController)->message(404);
            return;
        }

        if (DEBUG_URI) {
            dd($this->uri);
            dd($cont);
            dd($ex);
        }
      
        call_user_func_array([
            new $cont,
            $ex[1]
        ], []);
    }

    private function normalizeURI($arr)
    {
        return array_values(array_filter($arr));
    }
}
