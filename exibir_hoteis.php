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
</script><title>Hoteis Cadastrados</title>
<style type="text/css">
    .perfil{
        background: #ccc;        
        margin-bottom: 15px;    
    }
</style>
</head>
<body>	

    <?php
        session_start(); 	   
        include ('conexao1.php');	   	   
        
        $caminho = "Imagens/";	   	   
        
        $buscaHotel = mysqli_query($conexao, "SELECT nome, idHotel, imagem FROM hotel");
        
        while($perfil = mysqli_fetch_object($busca)):	   
            $img = $caminho.$perfil->imagem;
                echo"                
                    <div class='perfil'>                    
                        <h1> Dados do Hotel </h1>                    
                        <p> Nome: $perfil->nome </p>                    
                        <p> Id: $perfil->idHotel </p>                    
                        <img src='$img' width=1500px height= 1000px alt=''/>Nome da imagem: $perfil->imagem 
                        
                        </div>                 
                        ";	   
        endwhile;		
    ?>
</body>
</html>