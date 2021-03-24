<?php
session_start();
include('conexao1.php');

    $Pnome = mysqli_real_escape_string($conexao, trim($_POST['Pnome']));                        
    $Snome = mysqli_real_escape_string($conexao, trim($_POST['Snome']));
    $idUsuario = mysqli_real_escape_string($conexao, trim($_POST['idUsuario']));
    $senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));


    $sql = "select count(*) as total from usuario where idUsuario = '$idUsuario'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    $usuario_bd2 = mysqli_fetch_assoc($result);
    $admUser = $idUsuario;

    if($row['total'] == 1){
        $_SESSION['usuario_existe'] = true;
        header('Location: pagina_cadastro.php');
        exit;
    }

    $sql = "INSERT INTO usuario (Pnome, Snome, idUsuario, senha, email, telefone) VALUES ('$Pnome', '$Snome', '$idUsuario', '$senha', '$email', '$telefone')";

    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }

    if($idUsuario == 'adm_bru' || $idUsuario == 'adm_teteu' || $idUsuario == 'adm_ana'){
        $sql = "INSERT INTO administrador (admLogin) values ('$idUsuario')";
    }else{
        $sql = "INSERT INTO cliente (clienteLogin, cupomCliente) values ('$idUsuario', '-')";
    }

    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }
    
$conexao->close();

header('Location: pagina_login.php');
exit;
?>