<?php
session_start();
include('conexao1.php');

$nomeFeriado = mysqli_real_escape_string($conexao, trim($_POST['nomeFeriado'])); 
$dataFeriado = mysqli_real_escape_string($conexao, trim($_POST['dataFeriado']));

$sql = "select count(*) as total from hotel where idHotel = '$idHotel'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['hotel_existe'] = true;
    header('Location: pagina_cadastro_hotel.php');
    exit;
}


$idAdm = $_SESSION['idUsuario'];

$sql = "INSERT INTO feriado (adm, feriado, dataFeriado) VALUES ('$idAdm', '$nomeFeriado', '$dataFeriado')";


if($conexao->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$conexao->close();

header('Location: pagina_insere_feriado.php');
exit;
?>