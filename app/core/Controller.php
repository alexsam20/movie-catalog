<?php

namespace app\core;

abstract class Controller
{
    public array $data = [];
    public array $meta = ['title' => '', 'keywords' => '', 'description' => ''];
    public false|string $layout = '';
    public string $view = '';
    public object $model;

    public function __construct(public array $route = [])
    {
    }

    public function getModel(): void
    {
        $model = 'app\models\\' . $this->route['admin_prefix'] . $this->route['controller'];

        if (class_exists($model)) {
            $this->model = new $model;
        }
    }

    public function getView(): void
    {
        $this->view = $this->view ?: $this->route['action'];
        (new View($this->route, $this->layout, $this->view, $this->meta))->render($this->data);
    }

    public function setData($data): void
    {
        $this->data = $data;
    }

    public function setMeta(string $title = '', string $description = '', string $keywords = ''): void
    {
        $this->meta = [
            'title' => $title,
            'description' => $description,
            'keywords' => $keywords,
        ];
    }
}