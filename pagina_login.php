<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>

<div>
    <?php
    if(isset($_SESSION['nao_autenticado'])):
    ?>
    <p> ERRO LOGIN: Usuário ou senha inválidos. </p>
    </div>

    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>


  <div class="cont">
    <div class="form sign-in">
    <form action="login1.php" method ="POST">
      <h2>Entrar</h2>
      <label>
        <span>Usuário</span>
        <input type="text" name="idUsuario">
      </label>
      <label>
        <span>Senha</span>
        <input type="password" name="senha">
      </label>
      <button class="submit" type="submit">Entrar</button>
      </form>
      <p class="forgot-pass">Esqueci minha senha.</p>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Novo por aqui?</h2>
          <p>Cadastre-se e aproveite nossas diversas ofertas de hospedagem!</p>
        </div>
        <div class="img-text m-in">
          <h2>Já possuo uma conta</h2>
          <p>Clique abaixo para fazer login!</p>
        </div>
        <div class="img-btn">
          <h5><span class="m-up">Criar conta</span></h5>
          <h5><span class="m-in">Fazer Login</span></h5>
        </div>
      </div>
      <div class="form sign-up">
    
      <form action="cadastrar.php" method ="POST">
        <h2>Cadastre-se</h2>
        <label>
        <label>
          <span>Nome</span>
          <input type="text" name="Pnome" required>
        </label>

        <label>
          <span>Sobrenome</span>
          <input type="text" name="Snome" required>
        </label>

        <label>
          <span>Usuário</span>
          <input type="text" name="idUsuario" required>
        </label>

        <label>
          <span>Senha</span>
          <input type="password" name="senha" required>
        </label>

        <label>
          <span>Email</span>
          <input type="email" name="email" required>
        </label>
        
        <label>
          <span>Telefone</span>
          <input type="number" name="telefone" required>
        </label>
        
        <button type="submit" class="submit">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>
<script type="text/javascript" src="script.js"></script>
</body>
</html>