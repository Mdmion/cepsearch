<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;

class Cities extends DataLayer
{
    public function __construct()
    {
        parent::__construct("cidades", [], "id", false);
    }

    public function ufs()
    {
        $state = (new States())->find("id = :id","id=$this->id_estado")->fetch(true);
        if($state){
            return $state[0]->uf;
        }
        return "Não Encontrado";
    }

    public function fetchAll()
    {
        return (new Cities())->find()->fetch(true);
    }
}