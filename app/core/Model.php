<?php

namespace app\core;

abstract class Model
{
    public array $attributes = [];
    public array $errors = [];
    public array $rules = [];
    public array $labels = [];

    public Db $db;

    public function __construct()
    {
        $this->db =  new Db();
    }
}