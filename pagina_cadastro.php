<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastre-se</title>
    <!--link rel="stylesheet" href="design.css"-->

</head>
<body>

    <div>
   <?php
    if(isset($_SESSION['status_cadastro'])):
   ?>
    </div>

    <div>
        <p> Cadastro efetuado! </p>
        <p> Faça login informando o seu usuário e senha <a href="pagina_login.php"> Aqui.</a></p>
    </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    
    <?php
     if(isset($_SESSION['usuario_existe'])):
    ?>

    <div>
        <p>O usuário informado já existe. Tente novamente.</p>
    </div>
    <?php
    endif;
    unset($_SESSION['usuario_existe']);
    ?>

    <div>
    <form action="cadastrar.php" method ="POST">

        <label id="c_nome">NOME:</label> 
        <input type="text" name="Pnome" id="c_nome" required> <br><br>

        <label id="c_sobrenome">SOBRENOME:</label> 
        <input type="text" name="Snome" id="c_sobrenome" required> <br><br>

        <label id="c_login"> USUÁRIO:</label>
        <input type="text" name="idUsuario" id="c_login" required> <br><br>

        <label id="c_senha"> SENHA:</label>     
        <input type="password" name="senha" id="c_senha" required> <br><br>

        <label id="c_email"> EMAIL:</label> 
        <input type="email" name="email" id="c_mail" required> <br><br>

        <label id="c_telefone"> TELEFONE:</label>     
        <input type="text" name="telefone" id="c_telefone" required> <br><br>

        <input type="submit" name="cadastrar" value="Cadastrar" required> <br>
    </form>
    </div>

</body>
</html>