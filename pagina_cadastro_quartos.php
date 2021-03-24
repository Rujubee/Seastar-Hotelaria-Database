<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Quartos</title>
    <!--link rel="stylesheet" href="design.css"-->

</head>
<body>

    <div>
   <?php
    if(isset($_SESSION['status_cadastro'])):
   ?>
    </div>

    <div>
        <p> Cadastro de quartos efetuado! </p>
        <a href="pagina_cadastro_quartos.php"><button type="button" class="submit"> > Clique aqui para cadastrar mais quartos.</button></a>
        <!--p><a href="painel_adm.php"> > Voltar </a></p-->
    </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        unset($_SESSION['hotel_existe']);
        ?>

    <div>
    <form action="cadastro_quartos.php" method ="POST">

        <label id="q_valor">Valor:</label> 
        <input type="number" name="valor" id="q_valor" min="1" required> <br><br>

        <label id="q_cama"> Tipo da cama:</label> 
        <input type="radio" name="tipoCama" value="S"> Casal<br><br>
        <input type="radio" name="tipoCama" value="C"> Solteiro<br><br>

        <label id="h_imagem"> FOTO:</label>  
        <input type="file" name="imagem" id="h_imagem"> <br><br>

        <input type="submit" name="cadastrar" value="Cadastrar" required> <br>
    </form>

    </div>

        <div>
        <p><a href="painel_adm.php"> * Voltar</a></p>
        </div>

</body>
</html>