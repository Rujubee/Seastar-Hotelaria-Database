<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="reply-to" content="">
<meta name="generator" content="Eclipse mars">
<script src="http://code.jquery.com/jquery-2.1.4.min.js">
</script><title>Minhas reservas</title>
<!--link rel="stylesheet" href="design_page.css"TIREI AQUI-->

</head>

<body>	
<div id="title">
        RESERVAS EFETUADAS
        <br>
        ______________________
    </div>

    <div class="container" name="resultados">
    <div class="hotel" name="hoteisEncontrados">
    <?php
    
        session_start(); 	   
        include ('conexao1.php');
        /*include ('index2.php');*/   	   

        $idUsuarioReserva = $_SESSION['idUsuario'];

        
        $buscaInformacoes = mysqli_query($conexao, "SELECT idQR, idHQ, idDaReserva,tipoCama, nome, cidade, bairro, dataEntrada, dataSaida, valorTotal FROM reserva, quarto, hotel, localizacao WHERE usuarioLogin='$idUsuarioReserva' and idQuarto = idQR and idHotel = idHQ and idH = idHQ");
    
        while($perfil = mysqli_fetch_object($buscaInformacoes)):
        
          echo"  <br> Hotel: ";

          echo $perfil->nome;
          
          echo"  <br> Cidade: ";

          echo $perfil->cidade;

          echo"  <br> Bairro: ";

          echo $perfil->bairro;
          
          echo"  <br> Quarto (ID): ";

          echo $perfil->idQR;

          echo"  <br> ID da Reserva: ";

          echo $perfil->idDaReserva;
          
          echo"  <br> Tipo da cama: ";

          echo $perfil->tipoCama;

          echo"  <br> Data de entrada: ";

          echo $perfil->dataEntrada;

          echo"  <br> Data de saída: ";

          echo $perfil->dataSaida;

          echo"  <br> Valor Total: R$";

          echo" $perfil->valorTotal,00";
          
          echo " <p> <a href='pagina_cancelamento_reserva.php?idDoHotel=$perfil->idHQ&idDoQuarto=$perfil->idQR&idDaReserva=$perfil->idDaReserva&checkIn=$perfil->dataEntrada&checkOut=$perfil->dataSaida&valorTotal=$perfil->valorTotal'> Clique aqui </a> para cancelar. </p>";

          echo "<br>______________________________";
    endwhile;

    echo "<p> <a href='painel_user.php'> Voltar </a></p>";
    ?>
     </div>
                </div> 
</body>
</html>   