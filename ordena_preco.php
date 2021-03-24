<?php
session_start();
include('conexao1.php');

    $menor = $_POST['cupomm'];
    $maior = $_GET['valorFinalDiarias'];
    $localizacao = $_GET['localizacao'];
    $checkIn = $_GET['checkIn'];
    $checkOut = $_GET['checkOut'];

    $idUsuarioReserva = $_SESSION['idUsuario'];

    $verificaFeriado = mysqli_query($conexao, "SELECT dataFeriado FROM feriado");


    if((isset($menor) && !empty($maior)) || (isset($maior) && !empty($maior))){
            $verificaCupom = mysqli_query($conexao, "SELECT cupomCliente, valorDesc FROM cliente, cupom WHERE cupomCliente = idCupom and clienteLogin = '$idUsuarioReserva'");
            $resultado = mysqli_fetch_assoc($verificaCupom);


            $valorDesconto = $resultado['valorDesc'];
            $cupomUtilizado = $resultado['cupomCliente'];

        if($count == 0){
            if($resultado['cupomCliente'] == $cupom){
                $status_cupom = 1;
                $aux = (($valorDesconto / 100) * $valorDiarias);
                $valorDiariasDescontado = $valorDiarias - $aux;

                echo "<script>alert('Cupom de $valorDesconto% aplicado!'); </script>";
                header("Location: pagina_reserva_provisoria.php?idDoHotel=$idDoHotel&idDoQuarto=$idDoQuarto&checkIn=$checkIn&checkOut=$checkOut&cupom=$status_cupom&idCupom=$cupomUtilizado&desconto=$aux&valorDescontado=$valorDiariasDescontado");
            }else{
                $_SESSION['status_cupom'] = 0;
                echo '<script>alert("Cupom inválido!"); </script>';
                header("Location: pagina_reserva_provisoria.php?idDoHotel=$idDoHotel&idDoQuarto=$idDoQuarto&checkIn=$checkIn&checkOut=$checkOut&cupom=$status_cupom&valorDescontado=$valorDiarias");
            }
        }else if($valorDesconto <= 30){
            if($resultado['cupomCliente'] == $cupom){
                $status_cupom = 1;
                $aux = (($valorDesconto / 100) * $valorDiarias);
                $valorDiariasDescontado = $valorDiarias - $aux;

                echo "<script>alert('Cupom de $valorDesconto% aplicado!'); </script>";
                header("Location: pagina_reserva_provisoria.php?idDoHotel=$idDoHotel&idDoQuarto=$idDoQuarto&checkIn=$checkIn&checkOut=$checkOut&cupom=$status_cupom&idCupom=$cupomUtilizado&desconto=$aux&valorDescontado=$valorDiariasDescontado");
            }else{
                $_SESSION['status_cupom'] = 0;
                echo '<script>alert("Cupom inválido!"); </script>';
            }
        }else{
            echo '<script>alert("Não é possível usar esse cupom em um feriado!"); </script>';
            header("Location: pagina_reserva_provisoria.php?idDoHotel=$idDoHotel&idDoQuarto=$idDoQuarto&checkIn=$checkIn&checkOut=$checkOut&cupom=$status_cupom&valorDescontado=$valorDiarias");
        }
    }

$conexao->close();
exit;
?>