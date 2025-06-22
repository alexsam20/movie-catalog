<?php

namespace app\models;

use app\core\Model;

class Main extends Model
{
    public function all(): array
    {
        return $this->db->get('countries');
    }
}