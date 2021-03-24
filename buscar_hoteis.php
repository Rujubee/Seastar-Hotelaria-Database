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
</script><title>Seastar Hotelaria</title>
<!--link rel="stylesheet" href="design_page.css"-->
<!--link rel="stylesheet" href="design_page.css"-->
<!--style type="text/css">
    .perfil{
        background: #ccc;        
        margin-bottom: 15px;    
    }
</style-->
</head>

<body>	
    <div id="title">
        HOTEIS ENCONTRADOS
    </div>

    <div class="container" name="resultados">
        <div class="hotel" name="hoteisEncontrados">
        
            <?php
            
                session_start(); 	   
                include ('conexao1.php'); 	   
                    
                $caminho = "Imagens/";	   	   
                $localizacao = mysqli_real_escape_string($conexao, trim($_POST['h_cidade']));
                $checkin = mysqli_real_escape_string($conexao, trim($_POST['checkin']));    
                $checkout = mysqli_real_escape_string($conexao, trim($_POST['checkout']));
            
                $busca = mysqli_query($conexao, "SELECT idHotel, cidade, bairro, nome, imagem FROM localizacao, hotel where (cidade = '$localizacao' or nome = '$localizacao') and idH = idHotel");	   // ainda está defasado   
                
            
                    
                $sqlIDHOTEL = "select idH from localizacao where cidade = '$localizacao'";
                $sqlIDHOTEL2 = "select idHotel from hotel, quarto where idHotel = idHQ";
                $resultado = mysqli_query($conexao, $sqlIDHOTEL);

                $hotelqry = mysqli_fetch_assoc($resultado);

                while($perfil = mysqli_fetch_object($busca)):

                    $img = $caminho.$perfil->imagem;
                    $_SESSION['idH'] = $perfil->idHotel;
                    $temp = $_SESSION['idH'];
                

                    echo"                                  
                            <p> <a href='listarQuartos.php?idHotelHotel=$temp&checkIn=$checkin&checkOut=$checkout' name='temp' > Clique aqui </a> para ver os quartos. </p>
                            <img src='$img' width=300px height=300px alt=''/></a>

                            <br>$perfil->idHotel
                                        
                            <br>$perfil->nome
                                        
                            <br>$perfil->cidade 

                            <br>($perfil->bairro)
                                                        
                        ";              
                        endwhile;		  
                ?>
            </div>
        </div> 
</body>
</html>   