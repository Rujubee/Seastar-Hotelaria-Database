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
</script><title>Confirmação</title>
<!--link rel="stylesheet" href="design_page.css"TIREI AQUI-->

</head>

<body>	
<div id="title">
        INFORMAÇÕES DA RESERVA
    </div>

    <div class="container" name="resultados">
    <div class="hotel" name="hoteisEncontrados">
    
    <?php
    
        session_start(); 	   
        include ('conexao1.php');
       
       $_SESSION['status_cupom'] = false;
     
       $statusCupom = $_GET['cupom'];
       $idHotelHotel2 = $_GET['idDoHotel'];
       $idQto = $_GET['idDoQuarto'];
       $checkin = $_GET['checkIn'];
       $checkout = $_GET['checkOut'];                  
    
       $busca = mysqli_query($conexao, "SELECT nome, idQuarto, cidade, bairro, valor FROM hotel, quarto, localizacao where idHotel = '$idHotelHotel2' and idH = '$idHotelHotel2' and idQuarto = '$idQto'");	   // ainda está defasado   
          
        $dias = strtotime($checkout) - strtotime($checkin);
        $diasReservados = floor($dias/(60*60*24));

        
        $perfil = mysqli_fetch_object($busca);


            echo"           
            <br>                        
                            Hotel: $perfil->nome
                            <br>
                            <br>
                            Cidade: $perfil->cidade
                            <br>
                            <br>
                            Bairro: $perfil->bairro
                            <br>
                            <br>
                            Valor da diária: R$$perfil->valor
                            <br>
                            <br>
                            Quarto: $perfil->idQuarto
                            <br> 
            ";
            $checkinbr = date("d/m/Y", strtotime($checkin));
            $checkoutbr = date("d/m/Y", strtotime($checkout));

            echo "
            CHECK-IN: $checkinbr
            <br>
            CHECK-OUT: $checkoutbr
            <br>
            <br>";
            
            echo "Dias reservados: $diasReservados
                 <br>";
                
                if($statusCupom == 1){
                    $descontoDoCupom = $_GET['desconto'];
                    $valorFinalDiarias = $_GET['valorDescontado'];
                    $cupomUtilizado = $_GET['idCupom'];
                    echo" <br> (Cupom aplicado) Valor Total (diárias): R$ $valorFinalDiarias
                        <br>";
                }else{

                     $cupomUtilizado = '-';
                     $valorFinalDiarias = ($perfil->valor) * $diasReservados;
                     echo" <br> Valor Total (diárias): R$ $valorFinalDiarias
                        <br>";
                
                    
                //endwhile;
           echo"<br> Possui um cupom? Digite abaixo:";
        ?>
    
        <form name="form" action="testa_cupom_teste.php?idDoHotel=<?php echo $idHotelHotel2; ?>&idDoQuarto=<?php echo $idQto; ?>&checkIn=<?php echo $checkin; ?>&checkOut=<?php echo $checkout; ?>&valorFinalDiarias=<?php echo $valorFinalDiarias; ?>" method="POST">
        <input name="cupomm" type="text" />
        <br />
        <input type="submit" value="CONFIRMAR"/>
        </form>

     <?php
                }
        ?>

    <?php
      
        echo " <p> <a href='pagina_confirma_reserva.php?idDoHotel=$idHotelHotel2&idDoQuarto=$idQto&checkIn=$checkin&checkOut=$checkout&diasReservados=$diasReservados&valorFinal=$valorFinalDiarias&idDoCupom=$cupomUtilizado'> Clique aqui </a> para confirmar a reserva. </p> ";
    ?>
     </div>
                </div> 
</body>
</html>   