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
</script><title>Meus cupons</title>
<!--link rel="stylesheet" href="design_page.css"TIREI AQUI-->

</head>

<body>	
<div id="title">
        CUPONS DISPONÍVEIS
        <br>
        ______________________
    </div>

    <div class="container" name="resultados">
    <div class="hotel" name="hoteisEncontrados">
    <?php
    
        session_start(); 	   
        include ('conexao1.php');
        /*include ('index2.php');*/   	   


        $idUsuarioCup = $_SESSION['idUsuario'];

        $buscaCupomUsuario = mysqli_query($conexao, "SELECT cupomCliente FROM cliente where clienteLogin = '$idUsuarioCup'");
        $resultadoBusca = mysqli_fetch_assoc($buscaCupomUsuario);

        if($resultadoBusca['cupomCliente'] != '-'){
                $buscaCupom = mysqli_query($conexao, "SELECT idCupom, valorDesc FROM cupom where idCupom = '".$resultadoBusca['cupomCliente']."'");

                $Cupom = mysqli_fetch_object($buscaCupom);

                echo"   
                        <br>                                
                        Cupom: $Cupom->idCupom
                        <br>
                        Valor do desconto em reservas (%): $Cupom->valorDesc   
                        <br>     
                        <p> <a href='painel_user.php'>Voltar </a></p>
                ";	
        }else{
                echo "<br> Você não possui cupons!<br> 
                <p> <a href='painel_user.php'>Voltar </a></p>";
        }   		  
    ?>
     </div>
                </div> 
</body>
</html>   