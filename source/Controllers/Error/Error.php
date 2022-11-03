<?php

namespace Source\Controllers\Error;

use Source\Controllers\Core\Controller;

class Error extends Controller
{
    public function index($data)
    {
        echo "<h1>Erro {$data["errcode"]}</h1>";
    }

}