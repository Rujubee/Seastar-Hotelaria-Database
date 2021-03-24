<?php
session_start();
include('verifica_login.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Painel do Administrador</title>
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
    <p> ERRO ADM: Usuário ou senha inválidos. </p>
    </div>

    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>


  <div class="cont">
    <div class="form sign-in">
      <h2>SEASTAR HOTELARIA</h2>

    <a href="pagina_cadastro_hotel.php"><button type="button" class="submit"> Cadastrar um hotel</button></a>
    <a href="cadastrar_novo_quarto.php"><button type="button" class="submit"> Cadastrar novo(s) quarto(s)</button></a>
    <a href="pagina_cadastro_cupom.php"><button type="button" class="submit"> Cadastrar cupons </button></a>
    <a href="pagina_insere_feriado.php"><button type="button" class="submit"> Cadastrar feriados </button></a>

    <h4><a href="painel_adm.php"><button type="button" class="submit"> VOLTAR </button></a></h4>

    </div>


    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-in">
        </div>
      </div>
      </div>
      </div>
    </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>