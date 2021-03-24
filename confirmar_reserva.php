<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check-in do cliente</title>
    <!--link rel="stylesheet" href="design.css"-->

</head>
<body>

    <div>
   <?php
    if(isset($_SESSION['status_cadastro'])):
   ?>
    </div>

    <div>
        <p> Check-in efetuado! </p>
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
    <form action="pagina_checa_reserva.php" method ="POST">

        <label id="h_nomeCliente">Nome do cliente:</label> 
        <input type="text" name="nomeCliente" id="h_nomeCliente" required> <br><br>

        <label id="h_checkin"> Nº da Reserva:</label>
        <input type="text" name="numReserva" id="h_checkin" required> <br><br>

        <input type="submit" name="checar" value="CHECAR RESERVA" required> <br>
    </form>

    </div>

        <div>
        <p><a href="painel_adm.php"> * Voltar</a></p>
        </div>

</body>
</html>