<?php

namespace app\core;

use RuntimeException;

class View
{
    public string $content = '';

    public function __construct(
        public $route,
        public string $layout = '',
        public string $view = '',
        public array $meta = [],
    )
    {
        if (false !== $this->layout) {
            $this->layout = $this->layout ?: LAYOUT;
        }
    }

    public function render($data): void
    {
        if (is_array($data)) {
            extract($data);
        }
        $prefix = str_replace('\\', '/', $this->route['admin_prefix']);
        $viewFile = APP . "/views/{$prefix}{$this->route['controller']}/{$this->view}.php";
        if (is_file($viewFile)) {
            ob_start();
            require_once $viewFile;
            $this->content = ob_get_clean();
        } else {
            throw new RuntimeException("File view {$viewFile} not found", 500);
        }

        if (false !== $this->layout) {
            $layoutFile = APP . "/views/layouts/{$this->layout}.php";
            if (is_file($layoutFile)) {
                require_once $layoutFile;
            } else {
                throw new RuntimeException("File template {$layoutFile} not found", 500);
            }
        }
    }

    public function getMeta(): string
    {
        $out = '<title>' . App::$app::getProperty('site_name') . ' :: ' . htmlspecialchars($this->meta['title']) . '</title>' . PHP_EOL;
        $out .= "\t" . '<meta name="description" content="' . htmlspecialchars($this->meta['description']) . '">' . PHP_EOL;
        $out .= "\t" . '<meta name="keywords" content="' . htmlspecialchars($this->meta['keywords']) . '">' . PHP_EOL;

        return $out;
    }

}