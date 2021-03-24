<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados da Reserva</title>

</head>
<body>
 
    <div>
   <?php
    if(isset($_SESSION['status_cadastro'])):
   ?>
    </div>

    <div>
        <p> Reserva efetuada! </p>
        <!--a href="pagina_cadastro_quartos.php"><button type="button" class="submit"> > Clique aqui para cadastrar quartos.</button></a-->
        <p><a href="painel_usuario.php"> > Voltar </a></p>
    </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    
    <?php
     if(isset($_SESSION['hotel_existe'])):
    ?>

    <div>
        <!--p>O ID do hotel informado já existe. Tente novamente.</p-->
    </div>
    <?php
    endif;
    unset($_SESSION['hotel_existe']);
    ?>

    <?php
        $idHotelHotel2 = $_GET['idDoHotel'];
        $idQto = $_GET['idDoQuarto'];
    ?>

    <div>
    <form action="pagina_reserva_provisoria.php?idDoHotel=<?php echo $idHotelHotel2; ?>&idDoQuarto=<?php echo $idQto; ?>" method="POST">
            
            <p><label for="ida">CHECK-IN</label>
            <input class ="checkin" type="date" name="checkin" id="ida" min="2020-01-20" max="2025-05-01" required>
            <label for="volta" width="500px">CHECKOUT</label>
            <input class="checkout" type="date" name="checkout" id="volta" min="2020-01-20" max="2025-05-01"></p>
            <p><label for="hospede">Possui um cupom de desconto?</label>
            <br><input class="cupom" type="text" name="cupom" id="cupom">
            <input type="button" name ="testar" value="Aplicar">

            <r><input class="buscar" type="submit" value="Continuar2 >"> </a></p>
            </form>

    </div>

        <div>
        <p><a href="painel_usuario.php"> * Voltar</a></p>
        </div>

</body>
</html>