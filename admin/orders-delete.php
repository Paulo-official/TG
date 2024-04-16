<?php

require '../config/function.php';

if(isset($_GET['id'])){
    include('../config.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM pedidos WHERE id=$id";
    if(mysqli_query($con,$sql)){
        session_start();
        $_SESSION['delete'] = "Dados deletado com sucesso!";
        header("location: orders.php");
    }
}
?>