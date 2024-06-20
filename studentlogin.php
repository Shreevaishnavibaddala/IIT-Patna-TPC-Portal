<?php include 'config.php';
session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>IITP TPC</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">IITP Training and Placement Portal Login Page</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

  </div>
</nav>
<div class="container mt-4">
  <form action="" method="post">
    <div class="row g-3">

      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
      </div>
    </div>
    <br>
    <div class="row g-3">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Password</label>
    <input type="password" id="pwd1" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Enter Password" name="pwd1">
  </div>
</div>
<br>
<br>
<hr>
<div class="row g-3 justify-content-center">
  <div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Login</button>
  </div>
</div>
  </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['submit'])){
    $email = $_POST['email'];
    $pass = $_POST['pwd1'];
    if (empty($email)){
      echo "Email is required";
    }
    else if (empty($pass)){
      echo "Password is required";
    }
    else{
      $sql = "SELECT * FROM mainstudenttable WHERE email = '$email' AND password = '$pass'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['cpi'] = $row['cpi'];
        $_SESSION['rollno'] = $row['rollno'];
        echo $row['cpi'];
        if($row['email'] === $email && $row['password'] === $pass){

          header("Location: http://localhost:2009");
        }
      }
      else{
        echo "Enter valid email and password";
      }
    }
  }
} ?>
