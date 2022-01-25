<?php
date_default_timezone_set('America/Sao_Paulo');
$msisdn =($_POST['MSISDN']);
$dtExecucao = date('Y-m-d  H:i:s');

$url = "";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "Accept: application/json",
   "Content-Type: application/json",
   "token: "
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
    "msisdn": $msisdn,
    "valor": 3490,
    "dtExecucao": "$dtExecucao",
    "recorrencia": "N",
    "origem": "requestAPI",
    "nsu": ""
  }
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
var_dump($resp);// Apenas para mostrar a chamada da API quando estiver funcional
?>