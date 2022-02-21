<?php
session_start();
if((!isset ($_SESSION['EMAIL']) == true) and (!isset ($_SESSION['SENHA']) == true))
{
  header('location:index.php');
}

if (isset($_SESSION['start']) && (time() - $_SESSION['start'] > 600)) {
    session_unset(); 
    session_destroy(); 
    header('location:index.php'); 
}
$_SESSION['start'] = time();
$logado = $_SESSION['EMAIL'];


error_reporting(0);
include_once("conexao1.php");
date_default_timezone_set('America/Sao_Paulo');
$msisdn =($_POST['MSISDN']);
$imsi=($_POST['IMSI']);
$idWhitelist=($_POST['IDWHITELIST']);
$dtExecucao = date('Y-m-d  H:i:s');

$url = "";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(

);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = <<<DATA
{
    "msisdn": $msisdn,
    "valor": 3490,
    "dtExecucao": "$dtExecucao",
    "recorrencia": "N",
    "origem": "vendas",
    "nsu": "",
    "nuChamado": 0
  }
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
  try{
    $result_usuario = "INSERT INTO '' () VALUES ()";
    $resultado_usuario = mysqli_query($conn, $result_usuario);
    
    echo "
    <META HTTP-EQUIV=REFRESH CONTENT = ''>
    <script type=\"text/javascript\">
      alert(\"Recarga realizada com sucesso.\");
    </script>
    
  ";
    }catch (Exception $e) {
      ?>  
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        swal({
              title: "ERRO",
              text: "Erro ao conectar ao registrar a recarga, favor tente novamente mais tarde",
              icon: "error",
              button: "OK",
            });  
      </script>  
<?php 
    } 
}else{
 
  echo "
      <META HTTP-EQUIV=REFRESH CONTENT = ''>
      <script type=\"text/javascript\">
        alert(\"Recarga não realizada.\");
      </script>
    ";
}

?>