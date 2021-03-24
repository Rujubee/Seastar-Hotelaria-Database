<?php
session_start();
include('conexao1.php');
  
    $idDoHotel = mysqli_real_escape_string($conexao, trim($_POST['idDoHotel']));                       
    $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
    $tipoCama = mysqli_real_escape_string($conexao, trim($_POST['tipoCama']));
    $imagem = mysqli_real_escape_string($conexao, trim($_POST['imagem']));


    $sql = "INSERT INTO quarto (idHQ, valor, tipoCama, imagem) VALUES ('$idDoHotel', '$valor', '$tipoCama', '$imagem')";

    if($conexao->query($sql) === TRUE) {
        echo '<script>alert("Cadastro de quarto realizado com sucesso!"); </script>';

        $idQtoInserido=mysqli_insert_id($conexao);

        $sqlQR = "INSERT INTO reserva (idQR, statuss, usuarioLogin, dataEntrada, dataSaida) VALUES ('$idQtoInserido', 'D', '-', '0000-00-00', '0000-00-00')";

        if($conexao->query($sqlQR) === TRUE) {
            $_SESSION['status_cadastro'] = true;
                echo 'ok';
        }   
        
        echo' <p><a href="painel_adm2.php"> * Voltar</a></p>';
    }else{ 
        echo '<script>alert("Não há hotéis com este ID!"); </script>';
        echo' <p><a href="painel_adm2.php"> * Voltar</a></p>';
    }
$conexao->close();

exit;
?>