<?php

namespace  Source\Controllers\App;

use Source\Controllers\Core\Controller;

class Author extends  Controller
{
    public function index()
    {
        $this->view->addData(["page" => "author"]);
        echo $this->view->render('/app/author',[
            "title" => "Sobre o Autor",
            "gmail" => PersonDATA["gmail"],
            "linkedin" => PersonDATA["linkedin"],
            "git_status" => PersonDATA["git_status"],
            "git_commits" => PersonDATA["git_commits"],
            "git_cobrinha" => PersonDATA["git_cobrinha"]
        ]);
    }
}