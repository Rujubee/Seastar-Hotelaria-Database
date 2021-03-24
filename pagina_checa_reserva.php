<?php
session_start();
include('conexao1.php');

    $nomeCliente = mysqli_real_escape_string($conexao, trim($_POST['nomeCliente'])); 
    $numReserva = mysqli_real_escape_string($conexao, trim($_POST['numReserva']));


    $verifica = mysqli_query($conexao, "SELECT Pnome, Snome, idUsuario, idQR, dataEntrada, dataSaida, idHQ, idDaReserva, valorTotal, cidade, bairro from usuario, reserva, quarto, localizacao WHERE idDaReserva = '$numReserva' and usuarioLogin = idUsuario and idQR = idQuarto and idH = idHQ");
    $verificaUsuario = mysqli_fetch_object($verifica);

    if($verificaUsuario == false){
        echo '<script>alert("Não há reserva com este ID!"); </script>';
        echo' <p><a href="painel_adm.php"> * Voltar</a></p>';
    }else{
        
    $idCliente = $verificaUsuario->idUsuario;


    echo "Nome: $verificaUsuario->Pnome

        <br> Sobrenome: $verificaUsuario->Snome

        <br> ID do Quarto: $verificaUsuario->idQR

        <br> Data de Entrada: $verificaUsuario->dataEntrada

        <br> Data de Saída: $verificaUsuario->dataSaida

        <br> idDaReserva: $verificaUsuario->idDaReserva

        <br> Hotel: $verificaUsuario->idHQ

        <br> Localização: $verificaUsuario->cidade, $verificaUsuario->bairro

        <br> Valor: $verificaUsuario->valorTotal
        ";

        $checkIn = $verificaUsuario->dataEntrada;
        $checkOut = $verificaUsuario->dataSaida;

        $dias = strtotime($checkOut) - strtotime($checkIn);
        $diasReservados = floor($dias/(60*60*24));

        echo" <p><a href='confirmar_checkin.php?idDaReserva=$numReserva'> * Confirmar Check-in</a></p>";
        echo" <p><a href='confirmar_checkout.php?idDaReserva=$numReserva&idCliente=$idCliente&diasReservados=$diasReservados'> * Confirmar Check-out-in</a></p>";
        echo' <p><a href="painel_adm.php"> * Voltar</a></p>';
    }
$conexao->close();
exit;
?>