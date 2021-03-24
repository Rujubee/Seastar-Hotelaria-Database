<?php
session_start();
include('conexao1.php');

    $idCupom = mysqli_real_escape_string($conexao, trim($_POST['idCupom']));
    $valorDesc = mysqli_real_escape_string($conexao, trim($_POST['valorDesc']));


    $sql = "select count(*) as total from cupons where idCupom = '$idCupom'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $dados_usuario = mysqli_fetch_assoc($result);


    if($row['total'] == 1){
        $_SESSION['cupom_existe'] = true;
        header('Location: pagina_cadastro_cupom.php');
        exit;
    }


    $sql = "INSERT INTO cupom (idCupom, valorDesc, admId) VALUES ('$idCupom', '$valorDesc', '".$_SESSION['idUsuario']."')";
    
    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cupom'] = true;
    }

$conexao->close();

header('Location: pagina_cadastro_cupom.php');
exit;
?>