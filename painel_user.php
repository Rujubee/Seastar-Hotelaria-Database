<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Página do Cliente</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <style type="text/css">
        a:link{
        text-decoration:none;
        }   
    </style> 
</head>
<body>

<div>
    <?php
    if(isset($_SESSION['nao_autenticado'])):
    ?>
    <p> ERRO USER: Usuário ou senha inválidos. </p>
    </div>

    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>


  <div class="cont">
    <div class="form sign-in">
      <h2>Olá, <?php echo $_SESSION['Pnome'];?>! Bem vindo(a).</h2>
      
    <a href="index2.php"><button type="button" class="submit"> Busque por um hotel </button></a>
    <a href="cupons_usuario.php"><button type="button" class="submit"> Meus cupons </button></a>
    <a href="reservas_usuario.php"><button type="button" class="submit"> Minhas Reservas </button></a>
    <h4><a href="login_out.php"><button type="button" class="submit"> SAIR </button></a></h4>

    </div>


    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-in">
          <!--h2>Novo por aqui?</h2>
          <p>Cadastre-se e aproveite nossas diversas ofertas de hospedagem!</p-->
        </div>
        <!--div class="img-text m-in">
          <h2>Já possuo uma conta</h2>
          <p>Clique abaixo para fazer login!</p>
        </div-->
        <!--div class="img-btn">
          <h5><span class="m-up">Criar conta</span></h5>
          <h5><span class="m-in">Fazer Login</span></h5!>
        </div-->
      </div>
      <!--div class="form sign-up">
      <form action="login1.php" method ="POST">
        <h2>Cadastre-se</h2>
        <label>
          <span>Usuário</span>
          <input type="text" name="usuario">
        </label>
        <label>
          <span>ID</span>
          <input type="text" name="id" required>
        </label>
        <label>
          <span>Nome</span>
          <input type="text" name="nome" required>
        </label>
        <label>
          <span>Sobrenome</span>
          <input type="text" name="sobrenome" required>
        </label>
        <label>
          <span>Email</span>
          <input type="email" name="email" required>
        </label>
        <label>
          <span>Senha</span>
          <input type="password" name="senha" required>
        </label>
        <button type="submit" class="submit">Cadastrar</button>
        </form-->
      </div>
      </div>
    </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>