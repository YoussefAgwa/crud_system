<?php
  session_start();
  $conn = mysqli_connect("localhost","root" ,"" ,"crud");
  if(!isset($_SESSION['email'])) {
    header("location:index.php");
  }
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
  <header class="bg-primary text-light text-center p-3">
    <h2>Employee Crud Demo</h2>
  </header>
  <section class="my-5 container">
    <a href="add.php" class="btn btn-dark mb-3">Add Employee</a>
    <a href="logout.php" class="btn btn-danger mb-3">Log Out</a>
    
    
    <table class="table table-bordered text-center mt-4">
      <thead>
        <tr>
          
          <th>Id</th>
          <th>Employee Name</th>
          <th>Employee Salary</th>
          <th>Employee Address</th>
          <th>Gender</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $conn = mysqli_connect("localhost","root" ,"" ,"crud");
        $sql = "SELECT * FROM employees";
        $selectedEmployees = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($selectedEmployees)) {
        ?>
          <tr>
            <td><?php echo $row["id"] ?></td>
            <td><?php echo $row["name"] ?></td>
            <td><?php echo $row["salary"] ?></td>
            <td><?php echo $row["address"] ?></td>
            <td><?php echo $row["gender"] ?></td>
            <td>
              <a href="delete.php?id=<?php echo $row["id"]; ?>" class="btn btn-sm btn-danger mx-1">delete</a>
              <a href="update.php?update=<?php echo $row["id"]; ?>" class="btn btn-sm btn-success mx-1">update</a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </section>
</body>
</html>