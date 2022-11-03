<?php

namespace Source\CepSearch;

class CepSearch
{
    private string $url = ApiCEP["url"];
    private string $callback = ApiCEP["callback"];
    private string $maprequest = IframeMAPS["request"];
    private string $mapoutput = IframeMAPS["output"];
    private string $errorexception = "Cep não encontrado";

    public function getLocaleFromZipCode(string $zipCode, bool $enablemaps = false)
    {
        $url_googlemaps = null;
        $url = $this->prepareurl($zipCode);
        $returncep = json_decode($this->requestapi($url));
        $returnjson = array();

        if ($returncep->success !== true) {
            echo json_encode(["error" => $returncep->response]);
            die;
        }

        $ridereturn = json_decode($returncep->response);

        if (!isset($ridereturn->cep)) {
            echo json_encode(["error" => $this->errorexception]);
            die;
        }

        $returnjson[] = "$ridereturn->logradouro $ridereturn->complemento\n$ridereturn->bairro, $ridereturn->localidade - $ridereturn->uf - $ridereturn->cep\nDDD da região: ($ridereturn->ddd)";

        if ($enablemaps) {
            $url_googlemaps = $this->maprequest . $ridereturn->cep . $this->mapoutput;
        }

        echo json_encode(["success" => true, "response" => implode($returnjson), "googlemaps" => $url_googlemaps]);


    }

    public function getLocaleFromAddress(string $state, string $city, string $address, bool $enablemaps = false)
    {
        $url_googlemaps = null;
        $url = $this->prepareurl("$state/$city/$address");
        $returncep = json_decode($this->requestapi($url));
        $returnjson = array();

        if ($returncep->success !== true) {
            echo json_encode(["error" => $returncep->response]);
            die;
        }

        $ridereturn = json_decode($returncep->response);

        if (!isset($ridereturn[0]->cep)) {
            echo json_encode(["error" => $this->errorexception]);
            die;
        }

        foreach ($ridereturn as $val) {
            $returnjson[] = "$val->logradouro $val->complemento\n$val->bairro, $val->localidade - $val->uf - $val->cep\nDDD da região: ($val->ddd)\n\n";
        }

        if ($enablemaps) {
            //Pega o primeiro cep da lista de jsons
            $url_googlemaps = $this->maprequest . $ridereturn[0]->cep . $this->mapoutput;
        }

        echo json_encode(["success" => true, "response" => implode($returnjson), "googlemaps" => $url_googlemaps]);

    }

    public function prepareurl(string $param): string
    {
        return $this->url . $param . $this->callback;
    }

    public function requestapi($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        if (!$result) {
            return json_encode(["success" => false, "response" => "Cep não encontrado!"]);
        } else {
            //A API do ViaCEP Retorna um json com um erro caso o cep não seja encontrado, aqui esse json é capturado e tratado
            $searcherror = json_decode($result);
            if (isset($searcherror->erro)) {
                return json_encode(["success" => false, "response" => "Cep não encontrado!"]);
            }
            return json_encode(["success" => true, "response" => $result]);
        }
    }
}