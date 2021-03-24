<?php
session_start();
include('conexao1.php');

    $idHotel = mysqli_real_escape_string($conexao, trim($_POST['idhotel']));

    $verifica = mysqli_query($conexao, "SELECT distinct nome, idHotel, numDiarias, receita, cidade, bairro from hotel, localizacao WHERE idHotel = '$idHotel' and idH = '$idHotel'");
    $verificaHotel = mysqli_fetch_object($verifica);

    if($verificaHotel == false){
        echo '<script>alert("Não há hotéis com este ID!"); </script>';
        echo' <p><a href="painel_adm.php"> * Voltar</a></p>';
    }else{
        
    echo "
        INFORMAÇÕES DO HOTEL:

        <br><br> Nome: $verificaHotel->nome

        <br> Número de diárias reservadas: $verificaHotel->numDiarias

        <br> Receita: R$$verificaHotel->receita,00

        <br> Cidade: $verificaHotel->cidade

        <br> Bairro: $verificaHotel->bairro

        <br>___________________
        ";

        $verificaRes = mysqli_query($conexao, "SELECT idQR, Pnome, Snome, idDaReserva, tipoCama, statuss, valorTotal FROM reserva, usuario, quarto WHERE  idHQ = '$idHotel' AND idQR = idQuarto AND usuarioLogin=idUsuario AND statuss != 'D'");
        $verif = mysqli_fetch_assoc($verificaRes);
        echo " <br> RELATÓRIO DE HOSPEDAGENS ($verificaHotel->idHotel):
            <br>";
        


        while($verificaReserva=mysqli_fetch_object($verificaRes)):
        
        if($verificaReserva->tipoCama == 'S'){
            echo"<br> Quarto: $verificaReserva->idQR (Cama: Solteiro)";
        }else{
            echo "<br> Quarto: $verificaReserva->idQR (Cama: Casal)";
            }
        echo "   
        <br> Cliente: $verificaReserva->Pnome $verificaReserva->Snome

        <br> ID da reserva: $verificaReserva->idDaReserva

        <br> Valor Total: R$$verificaReserva->valorTotal,00

        <br>__________________________________
        ";
        endwhile;

        echo' <p><a href="painel_adm.php"> * Voltar</a></p>';
    }
$conexao->close();

exit;
?>