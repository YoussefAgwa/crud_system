<?php
session_start();
$conn = mysqli_connect("localhost","root" ,"" ,"crud");
header("location:index.php");
session_destroy();
?>