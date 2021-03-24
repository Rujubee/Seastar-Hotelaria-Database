<?php
session_start();
include('conexao1.php');
                      
    $valor = mysqli_real_escape_string($conexao, trim($_POST['valor']));
    $tipoCama = mysqli_real_escape_string($conexao, trim($_POST['tipoCama']));
    $imagem = mysqli_real_escape_string($conexao, trim($_POST['imagem']));


    $sql = "INSERT INTO quarto (idHQ, valor, tipoCama, imagem) VALUES ('".$_SESSION['idHotel']."', '$valor', '$tipoCama', '$imagem')";

    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
        echo 'ok';
    }


    $idQtoInserido=mysqli_insert_id($conexao);

    $sqlQR = "INSERT INTO reserva (idQR, statuss, usuarioLogin, dataEntrada, dataSaida) VALUES ('$idQtoInserido', 'D', '-', '0000-00-00', '0000-00-00')";

    if($conexao->query($sqlQR) === TRUE) {
        $_SESSION['status_cadastro'] = true;
        echo 'ok';
    }

$conexao->close();

header('Location: pagina_cadastro_quartos.php');
exit;
?>