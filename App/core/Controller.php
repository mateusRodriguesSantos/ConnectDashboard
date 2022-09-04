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

    public function showMessage(string $titulo, string $descricao, string $link = null, int $httpCode = 200)
    {
        http_response_code($httpCode);

        $this->load('partials/message', [
            'titulo'    => $titulo,
            'descricao' => $descricao,
            'link'      => $link
        ]);
    }
}
