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
        <p> Cadastro de quartos efetuado! </p>
        <!--a href="cadastrar_novo_quarto.php"><button type="button" class="submit"> > Clique aqui para cadastrar mais quartos.</button></a-->
        <!--p><a href="painel_adm.php"> > Voltar </a></p-->
   
    <form action="novo_quarto.php" method ="POST">

        <label id="q_valor">ID do Hotel:</label> 
        <input type="text" name="idDoHotel" id="q_valor" min="1" required> <br><br>

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
        <p><a href="painel_adm2.php"> * Voltar</a></p>
        </div>

</body>
</html>