<?php
session_start();
if(isset($_GET['id'])){

    include('../db.php');

    $id = $_GET['id'];

    $sql = "DELETE FROM model WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['success'] = "Модель успешно удалена!";
        header("Location: ./");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}else{
    header("Location: ./");
    exit();
}

?>