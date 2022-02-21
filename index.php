<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <title>Login</title>
    <link rel="sortcut icon" href="img/icone.png"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
  </style>    
  <body>
    <div class="container">
    <h3 align="middle" class="title"><img src="" alt="" style ="height: 60px;"></h3>
      <form action="authAPI.php" method="POST">
        <div class="title" >Login</div>
        <div class="input-box underline">
          <input type="email" placeholder="Login" name="EMAIL" id="EMAIL" required>
          <div class="underline"></div>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Senha" name="SENHA" id="SENHA" required>
          <div class="underline"></div>
        </div>
        <div class="input-box button">
          <input type="submit" name="" value="Acessar">
        </div>
      </form>
        
        
    </div>
  </body>
</html>
