<?php
include_once 'config.php';

if (isset($_POST['create'])) {

    if (isset($_POST['descricao'], $_POST['rua'], $_POST['numero'], $_POST['cep'], $_POST['peso'])) {

        $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
        $rua = mysqli_real_escape_string($con, $_POST['rua']);
        $numero = mysqli_real_escape_string($con, $_POST['numero']);
        $complemento = isset($_POST['complemento']) ? mysqli_real_escape_string($con, $_POST['complemento']) : '';
        $cep = mysqli_real_escape_string($con, $_POST['cep']);
        $peso = mysqli_real_escape_string($con, $_POST['peso']);

        $sql = "INSERT INTO pedidos (descricao, rua, numero, complemento, cep, peso)
                VALUES ('$descricao', '$rua', '$numero', '$complemento', '$cep','$peso')";

        if(mysqli_query($con,$sql)){
            session_start();
            $_SESSION["create"] = "Dados inseridos com sucesso!";
            header("Location:lista.php");
        }else{
        die("Something went wrong");
}
    }
}
if (isset($_POST['edit'])) {
    $descricao = mysqli_real_escape_string($con, $_POST['descricao']);
    $rua = mysqli_real_escape_string($con, $_POST['rua']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $complemento = isset($_POST['complemento']) ? mysqli_real_escape_string($con, $_POST['complemento']) : '';
    $cep = mysqli_real_escape_string($con, $_POST['cep']);
    $peso = mysqli_real_escape_string($con, $_POST['peso']);
    $id = mysqli_real_escape_string( $con, $_POST['id'] );


    $sqlUpdate = "UPDATE pedidos SET descricao = '$descricao', rua = '$rua', numero = '$numero', complemento = '$complemento',
    cep ='$cep', peso ='$peso' WHERE id='$id'";

    if (mysqli_query($con, $sqlUpdate)) {
        session_start();
        $_SESSION['update'] = "Dados atualizados com sucesso!";
        header("location: lista.php");
    } else {
        die("Algo deu errado!");
    }
}
?>