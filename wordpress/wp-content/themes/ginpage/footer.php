<?php

require_once "vendor/autoload.php";

$loader             = new \Twig\Loader\FilesystemLoader(__DIR__ . "/views");
$twig               = new \Twig\Environment($loader, []);
$wordpress_provider = new Ginpage\Providers\Wordpress;
$controller         = new Ginpage\Controllers\Footer($wordpress_provider, $twig);

echo $controller->render();