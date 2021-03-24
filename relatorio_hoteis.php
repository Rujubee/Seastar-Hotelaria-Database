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
    <form action="exibe_relatorio.php" method ="POST">

        <label id="h_idhotel">ID do Hotel:</label> 
        <input type="text" name="idhotel" id="h_idhotel" required> <br><br>

        <input type="submit" name="checar" value="CHECAR RELATÓRIO" required> <br>
    </form>
    </div>

        <div>
        <!--p><a href="exibe_relatorio.php"> * Exibir Relatórios</a></p-->
        <p><a href="painel_adm.php"> * Voltar</a></p>
        </div>

</body>
</html>