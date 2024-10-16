<?php

namespace Ginpage\Controllers;

use Ginpage\Providers\Wordpress;
use Twig\Environment as Twig;

class Footer extends AbstractController
{
    public $twig;
    public $wordpress;

    public function __construct(Wordpress $wordpress_provider, Twig $twig)
    {
        parent::__construct($twig);
        $this->wordpress = $wordpress_provider;
    }

    public function render()
    {
        return $this->twig->render("footer.html", [
            "wp_footer" => $this->wordpress->getWpFooter()
        ]);
    }
}