<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>

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
    ?>

    <meta charset="UTF-8">
    <title>Recargas colaborador</title>
    <link rel="stylesheet" href="style3.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <style>
     /* Googlefont Poppins CDN Link */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
   </style>
<body>
  <div class="sidebar">
    <div class="logo-details">
    <i><img src="" alt="mega+" style ="width: 70px;"></i>
      <span class="logo_name"></span>
    </div>
    <ul class="nav-links">



    </ul>
      
  </div>
  <section class="home-section">

    <nav>
    
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard"></span>
      </div>

      <div class="sidebar-button">
        
        <p style="font-size: 15px"><?php echo''.$logado?><p>
        <a class="link_name" href="logout.php"><i class='bx bx-log-out'></i></a>
        
        <span class="dashboard"></span>
      </div>
      
    </nav>

    <div class="home-content">
      <script>
   let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
sidebarBtn.onclick = function() {
  sidebar.classList.toggle("active");
  if(sidebar.classList.contains("active")){
  sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
}else
  sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
}
 </script>
      <section class="section">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.5.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <div class="columns is-four-fifths">
    <div class="container is-fullhd">
    <div class="notification is-white">
 
<div class="resultadoForm">
      <h5 class="title">
      Realizar Recarga
        <div class="dropdown is-hoverable">
  <div class="dropdown-trigger">
    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
      
      <span class="icon is-small">
        <i class="fa fa-info" aria-hidden="true"></i>
      </span>
    </button>
  </div>
  <div class="dropdown-menu" id="dropdown-menu4" role="menu">
    <div class="dropdown-content">
      <div class="dropdown-item">
        <p>Insira o MSISDN que deseja realizar a recarga com 55.</p>
      </div>
    </div>
  </div>
</div>  
        <br>
      </h5>
<!-- inicio do form-->

  <form name="formBusca" id="formBusca" action="" method="POST">
       
    <div class="columns">
    <div class="column">
        <label for="MSISDN" class="label">MSISDN (com 55)*</label>
        <div class="control has-icons-left">
          <input maxlength="13" placeholder="" type="text" class="input" name="MSISDN" id="MSISDN" style='border-radius:15px'>
          <span class="icon is-small is-left">
          <i class="fa fa-tablet"></i>
          </span>
        </div>
    </div>
      <div class="column">
        <label for="busca" class="label"></label><br>
          <input id="div1" type="submit" class="button" value='Buscar' style='border-radius:15px'>
      </div>
</div>
</form>

    </div>
  </div>
</div>
</div>
</section>
<!-- Querys de retorno da pesquisa-->
<?php
error_reporting(0);
$msisdn = ($_POST['MSISDN']);
           if(!empty($_POST['MSISDN'])){
             try{
           $dbh = new PDO();
           $sth = $dbh->prepare("SELECT * from `` where `` LIKE ?;");
           $sth->execute(array($msisdn));
           $resultadosWhitelist = $sth->fetchAll(PDO::FETCH_ASSOC);


           $dbh = new PDO();
           $sth = $dbh->prepare("SELECT * from where `` like ?");
           $sth->execute(array($msisdn));
           $resultadosRecarga = $sth->fetchAll(PDO::FETCH_ASSOC);


           $dbh = new PDO();
           $sth = $dbh->prepare("SELECT * from `` where `like ?;");
           $sth->execute(array($msisdn));
           $resultadosBSS = $sth->fetchAll(PDO::FETCH_ASSOC);
           }catch (Exception $e) { /*Pegue a exception e coloque na variável $e */
            
            ?>
          
          <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script>
            swal({
                  title: "ERRO",
                  text: "Erro ao conectar ao Banco de Dados, entre em contato com o suporte",
                  icon: "error",
                  button: "OK",
                });
                
          </script>
          
          
<?php              
           }}
?>
<!-- Fim das Querys de retorno da pesquisa-->

<?php
error_reporting(0);
if (count($resultadosWhitelist)) {
foreach ($resultadosWhitelist as $key => $value) {
?> 
      <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
           
<?php
error_reporting(0);
if (count($resultadosWhitelist)) {
foreach ($resultadosWhitelist as $key => $value) {
?>        
       
            <div class="box-topic"style="font-size: 16px">MSISDN</div>
            <div class="number"><?php echo''.$value['msisdn']; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/telefone-celular.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
           
<?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?>        
       
            <div class="box-topic"style="font-size: 16px">CPF</div>
            <div class="number"><?php echo''.$value['nuDocumento']; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/documento.png"></i>
        </div>

   <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosRecarga)) {
foreach ($resultadosRecarga as $key => $value) {
?>  
            <div class="box-topic" style="font-size: 15px">ULTIMA RECARGA </div>
            <div class="number"><?php echo''.substr($value['dtExecucao'],0,10) ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/calendario.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?>  
            <div class="box-topic" style="font-size: 16px">ATIVAÇÃO</div>
            <div class="number"><?php echo''.substr($value['dtAtivacao'],0,10) ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/calendario.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?>  
            <div class="box-topic"style="font-size: 16px">EXPIRAÇÃO</div>
            <div class="number"><?php echo''.substr($value['dtPlanoExpira'],0,10); ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/calendario.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?>  
            <div class="box-topic"style="font-size: 16px">VOZ</div>
            <div class="number"><?php echo''.$value['qtMinutoRestante'].' minutos'; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/chamada-telefonica.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?>  
            <div class="box-topic"style="font-size: 16px">DADOS</div>
            <div class="number"><?php echo''.number_format($value['qtDadoRestante'], 2).' MBs'; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/rede.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?>  
            <div class="box-topic"style="font-size: 16px">SMS</div>
            <div class="number"><?php echo''.$value['qtSmsRestante']; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/adicionar-mensagem.png"></i>
        </div>

        <div class="box">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosRecarga)) {
foreach ($resultadosRecarga as $key => $value) {
?>  
            <div class="box-topic"style="font-size: 16px ">PLANO</div>
            <div class="number" style="padding-top: 5px"><?php echo''.$value['noPlano']; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class=''><img src="img/valor.png"></i>
        </div>
        
        

        <div class="box" style="background: #0000ff;">
          <div class="right-side">
            <?php
error_reporting(0);
if (count($resultadosBSS)) {
foreach ($resultadosBSS as $key => $value) {
?> 
            <div class="box-topic"style="color: #ffffff; font-size: 16px;">STATUS</div>
            <div class="number"><?php echo''.$value['noMsisdnStatus']; ?></div>
            <?php  
}}  
?>
            <div class="indicator">
            </div>
          </div>
          <i class='' ><img src="img/status.png"></i>
        </div>
        <div></div>
      </div>
      
      

      <div class="sales-boxes">
        <div class="recent-sales box">

          
          <div class="sales-details">
            
            <ul class="details">
              <?php
error_reporting(0);
if (count($resultadosWhitelist)) {
foreach ($resultadosWhitelist as $key => $value) {
?> 
              
            
            <div class="title">Informações</div>
            <hr><li><p><?php echo'MSISDN: '.$value['msisdn'];?></p></li>
            <li><p><?php echo'MVNO: MEGA MAIS'?></p></li>
            <li><p><?php echo'A validade do plano é de:'?></p></li>
            <li><p><?php echo'Os benefícios do plano acumulam'?></p></li>
             <?php  
}}  
?>
          </ul>
      
          </div>
        </div>
        
        <div class="top-sales box">
        <form method="POST" action="requestAPI.php">
          <div class="title">Ação</div>
          <ul class="top-sales-details">
            <?php
error_reporting(0);
if (count($resultadosWhitelist)) {
foreach ($resultadosWhitelist as $key => $value) {
?>
          <hr>
          <li>
            <p>
              <span class="product"><?php echo'O plano que será recaregado é: '?></span>
          </p>
          </li>
          <li>
            <p>
              <span class="product"><?php echo'Deseja realmente recaregar?'?></span>
              
          </p>

          <div class="input-box">
            <input type="hidden" name="MSISDN" value='<?php echo''.$msisdn?>' style="width: 300px; height:45px; border-radius: 5px;border-color: #0000ff;">
          </div>
          <div class="input-box">
            <input type="hidden" name="IDWHITELIST" value='<?php echo''.$value['idWhitelist']?>' style="width: 300px; height:45px; border-radius: 5px;border-color: #0000ff;">
          </div>
          <div class="input-box">
            <input type="hidden" name="IMSI" value='<?php echo''.$value['imsi']?>' style="width: 300px; height:45px; border-radius: 5px;border-color: #0000ff;">
          </div>
          </li>
              <label for="Recarga" class="label"></label><br>
                <input id="div1" type="submit" class="button" value="Confirmar a recarga" style= 'width: 165px; border-radius:15px'/>
          <?php  
}}  
?>
          </ul>
        </div>
        </form>
      </div>
    
    </div>
<?php  
}}else{  
?>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
          <script>
            swal({
                  title: "ERRO",
                  text: "Não foi encontrado nenhum número disponivel para recarga, tente outro número.",
                  icon: "error",
                  button: "OK",
                });
                
          </script>
<?php
}
?>
    <br>
  </section>
</body>
</html>

