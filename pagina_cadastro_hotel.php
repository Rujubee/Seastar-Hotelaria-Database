<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Hoteis</title>
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
        <a href="pagina_cadastro_quartos.php"><button type="button" class="submit"> > Clique aqui para cadastrar quartos.</button></a>
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
        <p>O ID do hotel informado já existe. Tente novamente.</p>
    </div>
    <?php
    endif;
    unset($_SESSION['hotel_existe']);
    ?>

    <div>
    <form action="cadastro_hotel.php" method ="POST">

        <label id="h_nome">NOME:</label> 
        <input type="text" name="nome" id="h_nome" required> <br><br>

        <label id="h_id"> ID:</label>
        <input type="text" name="idHotel" id="c_id" required> <br><br>

        <!--label id="h_quartoQuantidade">QUANTIDADE DE QUARTOS:</label> 
        <input type="number" name="quartoQtd" id="h_quartoQuantidade" min="1" required> <br><br-->

        <label id="h_imagem"> FOTO:</label>   
        <input type="file" name="imagemHotel" id="h_imagem"> <br><br>
        
        <label id="h_cidade"> CIDADE:</label> 
        <input type="text" name="cidade" id="h_cidade" required> <br><br>

        <label id="h_bairro"> BAIRRO:</label> 
        <input type="text" name="bairro" id="h_bairro" required> <br><br>

        <input type="submit" name="cadastrar" value="Cadastrar" required> <br>
    </form>

    </div>

        <div>
        <p><a href="painel_adm.php"> * Voltar</a></p>
        </div>

</body>
</html>