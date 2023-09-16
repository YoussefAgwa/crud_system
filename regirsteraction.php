<?php 
  session_start();
  $email_take = "";
  if(isset($_SESSION['email taken'])) {
    $email_take = "Email is Already Used";

  }
?>
    <?php 
    $conn = mysqli_connect("localhost","root" ,"" ,"crud");
    if(isset($_POST['register-btn'])){
      $username = $_POST['name'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);
      $checksql = "SELECT * FROM users WHERE email = '$email'";
      $result = mysqli_query($conn , $checksql);
      $row = mysqli_num_rows($result);
      if($row > 0) {
        $_SESSION['email taken'] = 1;
        header("location:register.php");
      }else{
        $insertsql = "INSERT INTO users(name , email , password) 
        VALUES ('$username' , '$email' , '$password')";
        $res = mysqli_query($conn , $insertsql);
        if($res){
          $_SESSION['email'] = $email;
          header("location:home.php");
        }
      }
    }
    ?>