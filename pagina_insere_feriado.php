<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Definir Feriados</title>
    <!--link rel="stylesheet" href="design.css"-->

</head>
<body>

    <div>
   <?php
    if(isset($_SESSION['status_cadastro'])):
   ?>
    </div>

    <div>
        <p> Cadastro de feriado efetuado! </p>
        <!--a href="pagina_cadastro_quartos.php"><button type="button" class="submit"> > Clique aqui para cadastrar quartos.</button></a-->
        <p><a href="painel_adm.php"> > Voltar </a></p>
    </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    
    <?php
     if(isset($_SESSION['hotel_existe'])):
    ?>

    <div>
        <p>O feriado cadastrado já existe. Tente novamente.</p>
    </div>
    <?php
    endif;
    unset($_SESSION['hotel_existe']);
    ?>

    <div>
    <form action="pagina_feriado.php" method ="POST">

        <label id="h_nome">Nome do feriado:</label> 
        <input type="text" name="nomeFeriado" id="h_nome" required> <br><br>

        <label id="h_id"> Data (mm-dd-aaaa):</label>
        <input type="date" name="dataFeriado" id="c_id" required> <br><br>

        <input type="submit" name="cadastrar" value="Cadastrar" required> <br>
    </form>

    </div>

        <div>
        <p><a href="painel_adm.php"> * Voltar</a></p>
        </div>

</body>
</html>