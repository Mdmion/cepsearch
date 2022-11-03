<?php

namespace Source\Controllers\Api;

use Source\CepSearch\CepSearch;
use Source\Controllers\Core\Controller;

class Search extends Controller
{
    private string $emptyexception = "Complete o formulário para pesquisar o cep";

    public function fetchcep($data)
    {

        foreach ($data as $val) {
            if (empty($val)) {
                echo json_encode(["error" => $this->emptyexception]);
                die;
            }
        }

        $fetch = new CepSearch();
        $searchtype = $data["searchtype"];
        $param = $data["cep"];

        switch ($searchtype) {
            case 1:
                $cep = $this->isvalidcep($param);
                $fetch->getLocaleFromZipCode($cep, 1);
                break;
            case 2:
                $city = $data["cidade"];
                $state = $data["estado"];
                $address = $this->isvalidaddress($param);
                $fetch->getLocaleFromAddress($state, $city, $address, 1);
                break;
        }

    }

}