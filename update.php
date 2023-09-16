<?php
    $conn = mysqli_connect("localhost","root" ,"" ,"crud");
    $id = $_GET['update'];
    $selectsql = "SELECT * FROM employees WHERE id=$id";
    $res = mysqli_query($conn , $selectsql) ;
    $row = mysqli_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="design/bootstrap.min.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Login</title>
</head>

<body>
  <h2 class="my-5 text-center container 
  p-3 w-50 bg-success text-light border shadow">
    Update Employee
  </h2>

  <div class="container bg-light p-5 mx-auto w-50 border shadow">
    <form action="" method="post">
      <div class="form-group my-1">
        <label for="name">Employee Name</label>
        <input type="text" value= "<?php echo $row['name'] ?>" class="form-control" name="name" placeholder="Employee Name">
      </div>
      <div class="form-group my-1">
        <label for="salary">Emloyee Salary</label>
        <input type="number" name="salary" value= "<?php echo $row['salary'] ?>" placeholder="Employee Salary" class="form-control">
      </div>
      <div class="form-group my-1">
        <label for="address">Employee Address</label>
        <input type="text" class="form-control"  value= "<?php echo $row['address'] ?>" name="address" placeholder="Employee Address">
      </div>
      <div class="form-group mt-2 mb-1">
        <label for="male" class="mx-1">Male</label>
        <input type="radio" name="gender" <?php echo $row['gender'] == 'male' ? "checked" : ""  ?> value="male">
          
        <label for="female" class="mx-1">Female</label>
        <input type="radio" name="gender" <?php echo $row['gender'] == 'female' ? "checked" : ""  ?> value="female">
      </div>
      <input type="submit" class="mt-3 mx-1 btn btn-primary" name="update" value="Update Employee"></input>
      <?php
      if(isset($_POST['update'])) {
        $name = $_POST['name'];
        $salary = $_POST['salary'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $updatesql = "UPDATE employees SET name = '$name' , salary = '$salary' ,
      address = '$address' , gender = '$gender' WHERE id = $id  ";
      $run = mysqli_query($conn , $updatesql);
      if($run) {
        header("location:home.php");
      }
    }
        ?>
      <a href="home.php" class="mx-1 mt-3 btn btn-info">Return to index</a>
    </form>
  </div>
</body>

</html>