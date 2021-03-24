<?php
    session_start();
    include('conexao1.php');

    $idHotelHotel2 = $_GET['idDoHotel'];
    $idDoQuarto = $_GET['idDoQuarto'];
    $idDaReserva = $_GET['idDaReserva'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];
    $valorFinalDiarias = $_GET['valorTotal'];



            $idUsuarioReserva = $_SESSION['idUsuario'];

            $dias = strtotime($checkOut) - strtotime($checkIn);
            $diasReservados = floor($dias/(60*60*24));

            $sqlApagaReserva = mysqli_query($conexao, "DELETE FROM reserva WHERE (idDaReserva = '$idDaReserva')");
            
            $sqlUpdateUsuario = mysqli_query($conexao, "UPDATE cliente SET numReservas = numReservas - '$diasReservados' where clienteLogin = '$idUsuarioReserva'");

            $sqlTiraReceita = mysqli_query($conexao, "UPDATE hotel SET receita = receita - '$valorFinalDiarias', numDiarias = numDiarias - '$diasReservados' where idHotel = '$idHotelHotel2'");
           
        
            $sqlApagaCupom = mysqli_query($conexao, "SELECT cupomCliente FROM cliente WHERE clienteLogin = '$idUsuarioReserva'");
            $sqlCupom= mysqli_fetch_assoc($sqlApagaCupom);

            $cupomDoCliente = $sqlCupom['cupomCliente'];

            echo "<br> CUPOM DO KLYENTE: $cupomDoCliente";

            if($cupomDoCliente == 'vale10'){
                $sqlRemove = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = '-' WHERE clienteLogin = '$idUsuarioReserva'");
            }else if($cupomDoCliente == 'vale20'){
                $sqlRemove = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = 'vale10' WHERE clienteLogin = '$idUsuarioReserva'");
            }else if($cupomDoCliente == 'vale30'){
                $sqlRemove = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = 'vale20' WHERE clienteLogin = '$idUsuarioReserva'");
            }else if($cupomDoCliente == 'vale40'){
                $sqlRemove = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = 'vale30' WHERE clienteLogin = '$idUsuarioReserva'");
            }else if($cupomDoCliente == 'vale50'){
                $sqlRemove = mysqli_query($conexao, "UPDATE cliente SET cupomCliente = 'vale40' WHERE clienteLogin = '$idUsuarioReserva'");
            }
            
            echo '<script>alert("Cancelamento realizado com sucesso!"); </script>';

$conexao->close();

header('Location: reservas_usuario.php');
exit;
?>