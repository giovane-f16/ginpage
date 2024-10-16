<?php

require_once "vendor/autoload.php";

$wordpress_provider = new Ginpage\Providers\Wordpress;
$loader             = new \Twig\Loader\FilesystemLoader(__DIR__ . "/views");
$twig               = new \Twig\Environment($loader, []);
$controller         = new Ginpage\Controllers\Header($wordpress_provider, $twig);

$versao = $controller->getVersao();
$controller->enqueueStyles($versao);
$controller->enqueueScripts($versao);
echo $controller->render();