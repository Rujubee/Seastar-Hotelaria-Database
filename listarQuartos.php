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
</script><title>Quartos</title>
<!--link rel="stylesheet" href="design_page.css"-->

</head>

<body>	
<div id="title">
        QUARTOS DISPONÍVEIS
    </div>

    <div class="container" name="resultados">
        <div class="hotel" name="hoteisEncontrados">
        <?php
    
            session_start(); 	   
            include ('conexao1.php');   	   
            
            $caminho = "Imagens/";	  

            $confirmaCupom = 1; 
            $idHotelHotel2 = $_GET['idHotelHotel'];
            $CheckIn = $_GET['checkIn'];
            $CheckOut = $_GET['checkOut'];

        
            $statusCup = 0;

            $busca = mysqli_query($conexao, "SELECT idQuarto, valor, tipoCama, imagem FROM quarto where idHQ = '$idHotelHotel2'");	

            while($perfil = mysqli_fetch_object($busca)):
            $img = $caminho.$perfil->imagem;
            $idQto = $perfil->idQuarto;
                if($perfil->tipoCama == 'S'){
                    echo "TIPO DE CAMA: SOLTEIRO";
                }else{
                    echo "TIPO DE CAMA: CASAL";
                }
                
                echo"                                   
                                
                                <br><img src='$img' width=300px height=300px alt=''/>
                                <br>
                                <br>$perfil->imagem
                                <br>
                                R$ <br>$perfil->valor
                                <br>
                                <p> <a href='pagina_reserva_provisoria.php?idDoHotel=$idHotelHotel2&idDoQuarto=$idQto&checkIn=$CheckIn&checkOut=$CheckOut&cupom=$statusCup'> Clique aqui </a> para reservar. </p>
                ";	   
                endwhile;		  
        ?>
     </div>
</div> 
</body>
</html>   