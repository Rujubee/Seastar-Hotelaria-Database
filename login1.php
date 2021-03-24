<?php
session_start();
include ('conexao1.php');

if(empty($_POST['idUsuario']) || empty($_POST['senha'])){
    header('Location: pagina_login.php');
    exit();
}

$idUsuario = mysqli_real_escape_string($conexao, $_POST['idUsuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select idUsuario, Pnome from usuario where idUsuario = '{$idUsuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

if($row == 1){
    $usuario_bd = mysqli_fetch_assoc($result);
    
    $_SESSION['idUsuario'] = $usuario_bd['idUsuario'];
    $_SESSION['Pnome'] = $usuario_bd['Pnome'];
    
    if($usuario_bd['idUsuario'] == 'adm_bru' || $usuario_bd['idUsuario'] == 'adm_teteu' || $usuario_bd['idUsuario'] == 'adm_ana'){
        header('Location: painel_adm.php');
        exit();
    }else{
        header('Location: painel_user.php');
        exit();
    }
} else{
    $_SESSION['nao_autenticado'] = true;
    header('Location: pagina_login.php');
}

?>