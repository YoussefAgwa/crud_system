<?php

    $conn = mysqli_connect("localhost","root" ,"" ,"crud");

    $id = $_GET['id'];
    $deleteSql = "DELETE FROM employees WHERE id=$id";

    if(mysqli_query($conn , $deleteSql)) {
        header('location:home.php');
    } ?>