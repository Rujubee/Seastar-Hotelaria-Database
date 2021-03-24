<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cupons</title>
    <!--link rel="stylesheet" href="design.css"-->

</head>
<body>

    <div>
   <?php
    if(isset($_SESSION['status_cupom'])):
   ?>
    </div>

    <div>
        <p> Cadastro de cupom efetuado! </p>
        <p><a href="painel_adm.php"> > Voltar </a></p>
    </div>
        <?php
        endif;
        unset($_SESSION['status_cupom']);
        ?>
    
    <?php
     if(isset($_SESSION['cupom_existe'])):
    ?>

    <div>
        <p>O cupom informado já existe. Tente novamente.</p>
    </div>
    <?php
    endif;
    unset($_SESSION['cupom_existe']);
    ?>

    <div>
    <form action="cadastro_cupom.php" method ="POST">

        <label id="c_id"> ID:</label>
        <input type="text" name="idCupom" id="c_id" required> <br><br>

        <label id="c_desconto">DESCONTO:</label> 
        <input type="number" name="valorDesc" id="c_valorDesc" required> <br><br>

        <input type="submit" name="cadastrar" value="Cadastrar" required> <br>
    </form>
        <div>
        <p><a href="painel_adm.php"> * Voltar</a></p>
        </div>
    </div>

</body>
</html>