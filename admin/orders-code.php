<?php
include('../config/function.php');
include('../config.php');

if(isset($_POST['Create'])){

    $rua = mysqli_real_escape_string($con, $_POST['rua']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $complemento = isset($_POST['complemento']) ? mysqli_real_escape_string($con, $_POST['complemento']) : '';
    $cep = mysqli_real_escape_string($con, $_POST['cep']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);

    $productId = validate($_POST['product_id']);

    $checkProduct = mysqli_query($con,"SELECT * FROM products WHERE id='$productId' LIMIT 1");
    if(mysqli_num_rows($checkProduct) >0){

        $row = mysqli_fetch_assoc($checkProduct);
        if($row['quantity'] < $quantity){
            redirect('order-create.php','Apenas' .$row['quantity']. 'Quantidade disponível');
        }

    }else{
        redirect('order-create.php','No data found!');
    }
    $sql = "INSERT INTO pedidos ( rua, numero, complemento, cep,quantity)
                VALUES ('$rua', '$numero', '$complemento', '$cep','$quantity')";

        if(mysqli_query($con,$sql)){
            session_start();
            $_SESSION['create'] = "Dados inseridos com sucesso!";
            header("Location: orders.php");
        }else{
        die("Something went wrong");
}
    }

if (isset($_POST['editOrder'])) {
    include "../config.php";

    $rua = mysqli_real_escape_string($con, $_POST['rua']);
    $numero = mysqli_real_escape_string($con, $_POST['numero']);
    $complemento = isset($_POST['complemento']) ? mysqli_real_escape_string($con, $_POST['complemento']) : '';
    $cep = mysqli_real_escape_string($con, $_POST['cep']);
    $quantity = mysqli_real_escape_string($con, $_POST['quantity']);
    $id = mysqli_real_escape_string($con, $_POST['id']);

    $sqlUpdate = "UPDATE pedidos SET rua = '$rua', numero = '$numero', complemento = '$complemento', cep = '$cep', quantity = '$quantity' WHERE id ='$id'";

    if (mysqli_query($con, $sqlUpdate)) {
        $_SESSION['update'] = "Dados atualizados com sucesso!";
        header("location: orders.php"); 
        exit(); 
    } else {
        die("Algo deu errado!");
    }
}
?>