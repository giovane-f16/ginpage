<?php

namespace Ginpage\Controllers;

use Twig\Environment as Twig;

class AbstractController
{
    public string $path_files;
    public string $path;
    public string $versao;
    public $twig;

    public function __construct(Twig $twig)
    {
        $this->path_files = get_template_directory_uri() . "/views";
        $this->path       = get_template_directory_uri();
        $this->twig       = $twig;
    }

    public function enqueueStylesComum(string $versao)
    {
        wp_enqueue_style("bootstrap-grid", "{$this->path_files}/css/dist/bootstrap-grid.min.css", [], $versao);
        wp_enqueue_style("bootstrap-reboot", "{$this->path_files}/css/dist/bootstrap-reboot.min.css", [], $versao);
        wp_enqueue_style("bootstrap-utilities", "{$this->path_files}/css/dist/bootstrap-utilities.min.css", [], $versao);
        wp_enqueue_style("bootstrap", "{$this->path_files}/css/dist/bootstrap.min.css", [], $versao);
    }

    public function enqueueScriptsComum(string $versao)
    {
        wp_enqueue_script("bootstrap", "{$this->path_files}/javascript/dist/bootstrap.min.js", [], $versao, true);
        wp_enqueue_script("bootstrap-bundle", "{$this->path_files}/javascript/dist/bootstrap.bundle.min.js", [], $versao, true);
    }

    public function getVersao(): string
    {
        if (isset($this->versao)) {
            return $this->versao;
        }

        $tema = wp_get_theme();
        $this->versao = $tema->get("Version") ?? "";
        return $this->versao;
    }
}