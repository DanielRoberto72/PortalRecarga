<?php
error_reporting(0);
session_start();
$email =($_POST['EMAIL']);
$senha1=($_POST['SENHA']);
$senha = rawurlencode($senha1);

$url = "";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
email=$email&senha=$senha
DATA;

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
$obj = json_decode($resp);
$array = json_decode($resp,true);
curl_close($curl);
$sucesso = $obj->sucesso;
$erro = $obj->erro;

if($sucesso== 0 && $erro== NULL){
   $_SESSION['EMAIL'] = $email;
   $_SESSION['SENHA'] = $senha;
   header('location:RecargasColaboradorMega+.php');
 }else{
   unset ($_SESSION['EMAIL']);
   unset ($_SESSION['SENHA']);
   echo "
       <META HTTP-EQUIV=REFRESH CONTENT = ''>
       <script type=\"text/javascript\">
         alert(\"Erro ao realizar login. Tente novamente.\");
       </script>
     ";
 }


?>