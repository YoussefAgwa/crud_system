<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="design/main.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Login</title>
</head>
<body>

  <div class="container">
    <h1>Login</h1>
    <form method="post">  
      <div class="input-container">
        <input type="email" class="us" placeholder="Email" name="email" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-container">
        <input type="password" class="pw" placeholder="Password" name="password" required>
        <i class='bx bx-show'></i>
      </div>
      <label style="user-select: none; cursor: pointer; color: #FFF; font-size: 18px; font-weight: 600;"><input class="show" type="checkbox">Show Password</label>
      <p>
        Don't Have Account ? <a href="register.php">Register</a>
      </p>
      <button class="sub" name="login" type="submit">Login</button>
    </form>
  </div>
  <?php
  $conn = mysqli_connect("localhost","root" ,"" ,"crud");
  if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $res = mysqli_query($conn , $sql);
    $row = mysqli_fetch_array($res);
    $user_email = $row['email'];
    $user_password = $row['password'];
    if($email == $user_email && $pass == $user_password) {
      header("location:home.php");
      $_SESSION['email'] = $user_email;
    }
    else {
      header("location:home.php");
    }
  }
  
  ?>
  <script>
    let check = document.querySelector(".show");
    let pass = document.querySelector(".pw");
    check.onclick = function() {
      if (pass.type === "password") {
        pass.setAttribute("type", "text")
      } else {
        pass.setAttribute("type", "password")
      }
    }
  </script>
</body>

</html>