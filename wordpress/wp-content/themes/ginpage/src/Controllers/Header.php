<?php

namespace Ginpage\Controllers;

use Ginpage\Providers\Wordpress;
use Twig\Environment as Twig;

class Header extends AbstractController
{
    public $wordpress;

    public function __construct(Wordpress $wordpress_provider, Twig $twig)
    {
        parent::__construct($twig);
        $this->wordpress = $wordpress_provider;
    }

    public function enqueueStyles(string $versao)
    {
        // coloque aqui os css que precisar
        $this->enqueueStylesComum($versao);
    }

    public function enqueueScripts(string $versao)
    {
        // coloque aqui os js que precisar
        $this->enqueueScriptsComum($versao);
    }

    public function render()
    {
        return $this->twig->render("header.html", [
            "wp_head" => $this->wordpress->getWpHead()
        ]);
    }
}