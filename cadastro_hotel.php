<?php
session_start();
include('conexao1.php');

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome'])); 
    $idHotel = mysqli_real_escape_string($conexao, trim($_POST['idHotel']));                       
    //$quartoQtd = mysqli_real_escape_string($conexao, trim($_POST['quartoQtd']));
    $imagem = mysqli_real_escape_string($conexao, trim($_POST['imagemHotel']));
    $cidade = mysqli_real_escape_string($conexao, trim($_POST['cidade']));
    $bairro = mysqli_real_escape_string($conexao, trim($_POST['bairro']));

    $sql = "select count(*) as total from hotel where idHotel = '$idHotel'";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1){
        $_SESSION['hotel_existe'] = true;
        header('Location: pagina_cadastro_hotel.php');
        exit;
    }



    $sql = "INSERT INTO hotel (nome, idHotel, imagem) VALUES ('$nome', '$idHotel', '$imagem')";


    if($conexao->query($sql) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }

    $sql2 = "INSERT INTO localizacao (idH, cidade, bairro) VALUES ('$idHotel', '$cidade', '$bairro')";

    if($conexao->query($sql2) === TRUE) {
        $_SESSION['status_cadastro'] = true;
    }



    $sqlIDHOTEL = "select idHotel from hotel where idHotel = '$idHotel'";
    $result2 = mysqli_query($conexao, $sqlIDHOTEL);

    $hotel_bd = mysqli_fetch_assoc($result2);
    $_SESSION['idHotel'] = $hotel_bd['idHotel'];


$conexao->close();

header('Location: pagina_cadastro_hotel.php');
exit;
?>