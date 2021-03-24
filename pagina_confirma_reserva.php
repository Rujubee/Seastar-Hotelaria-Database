<?php
    session_start();
    include('conexao1.php');

    $idHotelHotel2 = $_GET['idDoHotel'];
    $idDoQuarto = $_GET['idDoQuarto'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];
    $diasReservados = $_GET['diasReservados'];
    $valorFinalDiarias = $_GET['valorFinal'];
    $idDoCupom = $_GET['idDoCupom'];

    $idUsuarioReserva = $_SESSION['idUsuario'];

    $sql1 = "SELECT dataEntrada, dataSaida from reserva where idQR = '$idDoQuarto'";
    $pegaDatas = mysqli_query($conexao, $sql1);
    $resultado = mysqli_fetch_assoc($pegaDatas);

    $cont=0;

    while($perfil = mysqli_fetch_object($pegaDatas)):
        if(($perfil->dataEntrada >= $checkIn && $perfil->dataSaida <= $checkOut) ||  ($perfil->dataEntrada == '0000-00-00' && $perfil->dataSaida == '0000-00-00')){
            $cont = 1; 
            echo "Data indisponível!";
            break;
        }
    endwhile;

        if($cont == 0){
            $sql = "INSERT INTO reserva (idQR, statuss, usuarioLogin, dataEntrada, dataSaida, valorTotal) VALUES ('$idDoQuarto', 'R', '$idUsuarioReserva', '$checkIn', '$checkOut', '$valorFinalDiarias')";
            $sqlHotel = mysqli_query($conexao, "UPDATE hotel SET receita = receita + '$valorFinalDiarias', numDiarias = numDiarias + '$diasReservados' where idHotel = '$idHotelHotel2'");
            $sqlUpdateUsuario = mysqli_query($conexao, "UPDATE cliente SET numReservas = numReservas + '$diasReservados' where clienteLogin = '$idUsuarioReserva'");

            if($idDoCupom != '-'){
                $sqlUpdateCupom = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = '-' WHERE clienteLogin = '$idUsuarioReserva'");
            }
            
            if($conexao->query($sql) === TRUE) {
                $_SESSION['status_cadastro'] = true;
            }
            
            echo '<script>alert("Reserva realizada com sucesso!"); </script>';

            $numReservasUsu = mysqli_query($conexao, "SELECT numReservas, cupomCliente from cliente where clienteLogin = '$idUsuarioReserva'");
            $numReservasUsuario = mysqli_fetch_assoc($numReservasUsu);

            $possuiCupom = $numReservasUsuario['cupomCliente'];

            $verificaValor = mysqli_query($conexao, "SELECT valorDesc FROM cupom where idCupom = '$possuiCupom'");
            $valorDoCupomPossuido = mysqli_fetch_assoc($verificaValor);

            $valorPossuiCupom = $valorDoCupomPossuido['valorDesc'];


            if(($diasReservados >= 20) && ($diasReservados < 40)){

                $numIdCup = mysqli_query($conexao, "SELECT idCupom FROM cupom WHERE valorDesc = '10' + '$valorPossuiCupom'");
                $numIdCupom = mysqli_fetch_assoc($numIdCup);

                $sqlUpdateCupom = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = '".$numIdCupom['idCupom']."' where clienteLogin = '$idUsuarioReserva'");

            }else if(($diasReservados >= 40) && ($diasReservados < 60)){
               
                $numIdCup = mysqli_query($conexao, "SELECT idCupom FROM cupom WHERE valorDesc = '20' + '$valorPossuiCupom'");
                $numIdCupom = mysqli_fetch_assoc($numIdCup);

                $sqlUpdateCupom = mysqli_query($conexao,"UPDATE cliente SET cupomCliente = '".$numIdCupom['idCupom']."' where clienteLogin = '$idUsuarioReserva'");
            
            }else if(($diasReservados >= 60) && ($diasReservados < 80)){
               
                $numIdCup = mysqli_query($conexao, "SELECT idCupom FROM cupom WHERE valorDesc = '30' + '$valorPossuiCupom'");
                $numIdCupom = mysqli_fetch_assoc($numIdCup);

                $sqlUpdateCupom = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = '".$numIdCupom['idCupom']."' where clienteLogin = '$idUsuarioReserva'");
            
            }else if(($diasReservados >= 80) && ($diasReservados < 100)){
               
                $numIdCup = mysqli_query($conexao,"SELECT idCupom FROM cupom WHERE valorDesc = '40' + '$valorPossuiCupom'");
                $numIdCupom = mysqli_fetch_assoc($numIdCup);

                $sqlUpdateCupom = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = '".$numIdCupom['idCupom']."' where clienteLogin = '$idUsuarioReserva'");
            
            }else if($diasReservados >= 100){
               
                $numIdCup = mysqli_query($conexao, "SELECT idCupom FROM cupom WHERE valorDesc = '50'");
                $numIdCupom = mysqli_fetch_assoc($numIdCup);

                $sqlUpdateCupom = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = '".$numIdCupom['idCupom']."' where clienteLogin = '$idUsuarioReserva'");
            }

            //echo '<script>alert("Reserva realizada com sucesso!"); </script>';
            echo' <p><a href="painel_user.php"> * Voltar</a></p>';
            //header('Location: painel_user.php');
            
        }else{
            echo '<script>alert("Data Indisponível!"); </script>';

            echo' <p><a href="index2.php"> * Voltar</a></p>';
            //header('Location: index2.php');
        }

$conexao->close();
exit;
?>