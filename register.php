<?php
  session_start();
  $email_take = "";
  if(isset($_SESSION['email taken'])) {
    $email_take = "Email is Already Used";

  }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="design/main.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Register</title>
</head>
<body>
  <div class="container">
    <h1>Register</h1>
    <h2><?php echo $email_take ?> </h2>
    <form action="regirsteraction.php" method="post">
      <div class="input-container">
      <input type="text" class="us" placeholder="Username" name="name" required>
      <i class='bx bxs-user'></i>
    </div>
      <div class="input-container">
      <input type="email" class="em" placeholder="Email" name="email" required>
      <i class='bx bxl-gmail' ></i>
    </div>
    <div class="input-container">
      <input type="password" class="pw" min="8" placeholder="Password" name="password" required>
      <i class='bx bx-show'></i>
    </div>
    <label style="user-select: none; cursor: pointer; color: #FFF; font-size: 18px; font-weight: 600;"><input class="show" type="checkbox">Show Password</label>
    <p>
      Already Have Account ? <a href="index.php">Login</a> 
    </p>
    <button class="sub" name="register-btn" type="submit">Register</button>
  
  </form>
  </div>
  <script>
      let check = document.querySelector(".show");
      let pass =  document.querySelector(".pw");
      check.onclick = function() {
        if(pass.type === "password") {
          pass.setAttribute("type" , "text")
        }else {
          pass.setAttribute("type" , "password")
        }
      }
    </script>
    <?php 
      unset($_SESSION['email taken']);
    ?>
</body>
</html>