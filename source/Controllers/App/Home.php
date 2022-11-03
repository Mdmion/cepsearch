<?php

namespace  Source\Controllers\App;

use Source\Controllers\Core\Controller;
use Source\Models\Cities;

class Home extends  Controller
{
    public function index()
    {
        $cidades = Cities::fetchAll();
        $this->view->addData(["page" => "home"]);
        echo $this->view->render('/app/index',[
            "title" => "Pesquisar",
            "router" => $this->router,
            "cidades" => $cidades,
            "fetchstate" => $this->router->route("Controller.fetchstate")
        ]);
    }
}