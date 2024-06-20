<?php session_start();
include 'config.php';
 ?>
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST"){
   if (isset($_POST['submit'])){
     $username = $_POST['username'];
     $email = $_POST['email'];
     $rollno = $_POST['rollno'];
     $phno = $_POST['phno'];
     $yop = $_POST['yop'];
     $degree = $_POST['degree'];
     $branch = $_POST['branch'];
     $dob = $_POST['dob'];
     $pwd1 = $_POST['pwd1'];
     $pwd2 = $_POST['pwd2'];

     if (empty($username) || empty($email) || empty($rollno) || empty($phno) || empty($yop) || empty($degree) || empty($branch) || empty($dob) || empty($pwd1) || empty($pwd2)){
       echo "Please fill all the fields";
     }
     else if ($pwd1 != $pwd2){
       echo "Passwords do not match";
     }
     else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
       echo "Invalid Email Address";
     }
     $uppercase    = preg_match('@[A-Z]@', $pwd1);
     $lowercase    = preg_match('@[a-z]@', $pwd1);
     $number       = preg_match('@[0-9]@', $pwd1);
     $specialchars = preg_match('@[^\w]@', $pwd1);
     if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($pwd1) < 8){
       echo "Password is not strong";
     }
     else{
       $_SESSION['username'] = $username;
       $_SESSION['email'] = $email;
       $_SESSION['rollno'] = $rollno;
       $_SESSION['phno'] = $phno;
       $_SESSION['yop'] = $yop;
       $_SESSION['degree'] = $degree;
       $_SESSION['branch'] = $branch;
       $_SESSION['dob'] = $dob;
       $_SESSION['pwd1'] = $pwd1;
       header("Location: http://localhost:2005");
     }
   }
 }
 ?>
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
  <a class="navbar-brand" href="#">IITP Training and Placement Portal</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

  </div>
</nav>
<div class="container mt-4">
  <form action="" method="post">
    <div class="row g-3">
      <div class="col">
        <label>UserName</label>
        <input type="text" class="form-control" id="username" placeholder="Enter Your Name" aria-label="First name" name="username">
      </div>

      <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter Your Email" name="email">
      </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col">
        <label>RollNo</label>
        <input type="text" class="form-control" id="rollno" placeholder="Enter Your IITP RollNo" aria-label="First name" name="rollno">
      </div>
      <div class="col">
        <label>Phone Number</label>
        <input type="text" class="form-control" id="phno" placeholder="Enter Your Phone Number" aria-label="First name" name="phno">
      </div>
      <div class="col">
        <label>Year of Passing</label>
        <input type="text" class="form-control" id="yop" placeholder="Enter Your Year of Passing" aria-label="First name" name="yop">
      </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col">
  <label>Degree</label>
  <br>
  <select class="form-select" aria-label="Default select example" name="degree" style = "height: 32px;">
    <option selected>Select your degree</option>
    <option value="BTech">BTech</option>
    <option value="MTech">MTech</option>
  </select>
</div>
      <div class="col">
        <label>Branch</label>
        <br>
        <select class="form-select" aria-label="Default select example" name="branch" style = "height: 32px;">
          <option selected>Select your branch</option>
          <option value="CS">CS</option>
          <option value="AI">AI</option>
          <option value="ME">ME</option>
          <option value="EE">EE</option>
          <option value="MNC">MNC</option>
          <option value="CB">CB</option>
          <option value="CE">CE</option>
          <option value="MME">MME</option>
        </select>

      </div>
      <div class="col">
        <label for="birthdate">Birthdate:</label>
        <div class="input-group">
          <input type="date" id="dob" class="form-control" name="dob">
          <div class="input-group-append">
            <span class="input-group-text">
              <i class="fa fa-calendar"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
    <br>
    <div class="row g-3 justify-content-center">
  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Password</label>
    <input type="password" id="pwd1" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Enter Password" name="pwd1">
  </div>

  <div class="col-auto">
    <label for="inputPassword6" class="col-form-label">Confirm Password</label>
    <input type="password" id="pwd2" class="form-control" aria-labelledby="passwordHelpInline" placeholder="Confirm Password" name="pwd2">
  </div>
</div>
<br>
<br>
<hr>
<div class="row g-3 justify-content-center">
  <div class="col-auto">
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Continue</button>
  </div>
</div>
  </form>
</div>
<div class="hint-text">Already have an account? <a href="http://localhost:2010/">Login here</a></div>
