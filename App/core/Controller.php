<?php

namespace app\core;

class Controller
{
    protected function load(string $view, $params = [])
    {
        $loader = new \Twig\Loader\FilesystemLoader('../App/views/');
        $twig = new \Twig\Environment($loader);

        $twig->addGlobal('BASE', BASE);
        echo $twig->render($view . '.twig.php', $params);
    }
}
