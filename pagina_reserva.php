<?php
session_start();
include('conexao1.php');

$idHotelHotel2 = $_GET['idHotelHotel'];

$checkin = mysqli_real_escape_string($conexao, trim($_POST['checkin'])); 
$checkout = mysqli_real_escape_string($conexao, trim($_POST['checkout']));                       
$cupom = mysqli_real_escape_string($conexao, trim($_POST['cupom']));

$sql = "select count(*) as total from hotel where idHotel = '$idHotel'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);





$conexao->close();

//header('Location: painel_adm.php');
header('Location: pagina_cadastro_hotel.php');
//header('Location: pagina_cadastro_quartos.php');
exit;
?>