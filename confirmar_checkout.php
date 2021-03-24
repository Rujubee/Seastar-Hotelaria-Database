<?php
    session_start();
    include('conexao1.php');

    $idDaReserva = $_GET['idDaReserva'];
    $idCliente = $_GET['idCliente'];
    $diasReservados = $_GET['diasReservados'];
    
    $sqlApagaReserva = mysqli_query($conexao, "DELETE FROM reserva WHERE idDaReserva = '$idDaReserva'");
    $sqlDecrementa = mysqli_query($conexao, "UPDATE cliente SET numReservas = numReservas - '$diasReservados' WHERE clienteLogin = '$idCliente'");

    echo '<script>alert("Check-out realizado com sucesso!"); </script>';

    echo' <p><a href="painel_adm.php"> * Voltar</a></p>';
    

    $conexao->close();
    
    exit;
?>