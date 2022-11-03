<?php

namespace Source\Controllers\Core;

use CoffeeCode\Router\Router;
use DateTime;
use League\Plates\Engine;
use Source\Models\States;

class Controller
{
    protected Router $router;
    protected Engine $view;

    public function __construct($router)
    {
        $this->router = $router;
        $this->view = new Engine(__DIR__ . "/../../../theme");
        $this->view->addData(
            [
                'router' => $router,
                'company' => 'CEP Search - Encontre Localizações',
                'github' => PersonDATA["github"],
                "linkedin" => PersonDATA["linkedin"]
            ],
            [
                "/layouts/_theme",
                "/layouts/fragments/sidebar",
                "/layouts/fragments/navbar"
            ]
        );
    }

    public function isvalidcep($cep)
    {
        $cep = filter_var($cep, FILTER_SANITIZE_STRING, FILTER_SANITIZE_NUMBER_INT);
        if (!is_numeric($cep)) {
            echo json_encode(["error" => "CEP inválido, somente números!"]);
            die;
        }
        return $cep;
    }

    public function isvalidaddress($address)
    {
        if (is_numeric(filter_var($address, FILTER_SANITIZE_NUMBER_INT, FILTER_SANITIZE_STRING))) {
            echo json_encode(["error" => "Endereço inválido, somente letras!"]);
            die;
        }
        return str_replace(" ", "+", $address);
    }

    public function fetchstate($data)
    {
        if (isset($data)) {
            States::fetchstate($data["id"]);
            die;
        }
        echo json_encode(["response" => "Não Encontrado"]);
    }

    public function txtcreate($data)
    {
        $content = $data["txtresponse"] . PHP_EOL;
        $filename = "cep-" . $this->generateHash(3);
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-disposition: attachment; filename=$filename.txt");
        echo $content;
        exit;
    }

    public function generateHash(int $length): string
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $datetime = new DateTime();
        $var_size = strlen($chars);
        $output = [];

        for ($x = 0; $x < $length; $x++) {
            $random_str = $chars[rand(0, $var_size - 1)];
            $output[] = $random_str;
        }

        return implode($output) . $datetime->format("m-Y");
    }
}