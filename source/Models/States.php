<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class States extends  DataLayer
{
    public function __construct()
    {
        parent::__construct("estados", [], "id", false);
    }

    public function fetchstate($data)
    {
        $state = (new States())->find("id = '$data'")->fetch(true);
        if ($state) {
            echo json_encode(["response" => $state[0]->uf]);
            die;
        }
        echo json_encode(["response" => "Não Encontrado"]);
    }
}