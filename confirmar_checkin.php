<?php
    session_start();
    include('conexao1.php');

    $idDaReserva = $_GET['idDaReserva'];

            
    $sqlUpdateStatus = mysqli_query($conexao, "UPDATE reserva SET statuss = 'O' where idDaReserva = '$idDaReserva'");

    echo '<script>alert("Check-in realizado com sucesso!"); </script>';
    echo' <p><a href="painel_adm.php"> * Voltar</a></p>';
    

    $conexao->close();
    exit;
?>