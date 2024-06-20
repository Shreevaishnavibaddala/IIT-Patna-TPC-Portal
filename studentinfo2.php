<?php session_start();
 include 'config.php';?>

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
        <label>10th Marks</label>
        <input type="text" class="form-control" id="marks10" placeholder="Enter Your 10th marks" aria-label="First name" name="marks10">
      </div>
        <div class="col">
          <label>12th Marks</label>
          <input type="text" class="form-control" id="marks12" placeholder="Enter Your 12th marks" aria-label="First name" name="marks12">
        </div>
      </div>
      <br>
    <div class="row g-3">
      <div class="col">
        <label>Sem1 SPI</label>
        <input type="text" class="form-control" id="sem1_spi" placeholder="Enter Your Sem1 SPI" aria-label="First name" name="sem1_spi">
      </div>
        <div class="col">
          <label>Sem2 SPI</label>
          <input type="text" class="form-control" id="sem2_spi" placeholder="Enter Your Sem2 SPI" aria-label="First name" name="sem2_spi">
        </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col">
        <label>Sem3 SPI</label>
        <input type="text" class="form-control" id="sem3_spi" placeholder="Enter Your Sem3 SPI" aria-label="First name" name="sem3_spi">
      </div>
        <div class="col">
          <label>Sem4 SPI</label>
          <input type="text" class="form-control" id="sem4_spi" placeholder="Enter Your Sem4 SPI" aria-label="First name" name="sem4_spi">
        </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col">
        <label>Sem5 SPI</label>
        <input type="text" class="form-control" id="sem5_spi" placeholder="Enter Your Sem5 SPI" aria-label="First name" name="sem5_spi">
      </div>
        <div class="col">
          <label>Sem6 SPI</label>
          <input type="text" class="form-control" id="sem6_spi" placeholder="Enter Your Sem6 SPI" aria-label="First name" name="sem6_spi">
        </div>
    </div>
    <br>
    <div class="row g-3">
      <div class="col">
        <label>Sem7 SPI</label>
        <input type="text" class="form-control" id="sem7_spi" placeholder="Enter Your Sem7 SPI" aria-label="First name" name="sem7_spi">
      </div>
        <div class="col">
          <label>Sem8 SPI</label>
          <input type="text" class="form-control" id="sem8_spi" placeholder="Enter Your Sem8 SPI" aria-label="First name" name="sem8_spi">
        </div>
    </div>
    <div class="row g-3">
      <div class="col">
        <label>CPI</label>
        <input type="float" class="form-control" id="cpi" placeholder="Enter Your CPI" aria-label="First name" name="cpi">
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
    </div>
  </form>
</div>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['submit'])){
    $marks10 = $_POST['marks10'];
    $marks12 = $_POST['marks12'];
    $sem1 = $_POST['sem1_spi'];
    $sem2 = $_POST['sem2_spi'];
    $sem3 = $_POST['sem3_spi'];
    $sem4 = $_POST['sem4_spi'];
    $sem5 = $_POST['sem5_spi'];
    $sem6 = $_POST['sem6_spi'];
    $sem7 = $_POST['sem7_spi'];
    $sem8 = $_POST['sem8_spi'];
    $cpi = $_POST['cpi'];

    if (empty($marks10) || empty($marks12) || empty($sem1) || empty($sem2) || empty($sem3) || empty($sem4) || empty($sem5) || empty($sem6) || empty($sem7) || empty($sem8)){
      echo "Please fill all the fields";
    }
    else{
      $_SESSION['marks10'] = $marks10;
      $_SESSION['marks12'] = $marks12;
      $_SESSION['sem1'] = $sem1;
      $_SESSION['sem2'] = $sem2;
      $_SESSION['sem3'] = $sem3;
      $_SESSION['sem4'] = $sem4;
      $_SESSION['sem5'] = $sem5;
      $_SESSION['sem6'] = $sem6;
      $_SESSION['sem7'] = $sem7;
      $_SESSION['sem8'] = $sem8;
      $_SESSION['cpi'] = $cpi;
      $query = "INSERT INTO mainstudenttable VALUES ('{$_SESSION['username']}', '{$_SESSION['rollno']}', '{$_SESSION['email']}', '{$_SESSION['phno']}', '{$_SESSION['branch']}', '{$_SESSION['yop']}', '{$_SESSION['degree']}', '{$_SESSION['dob']}', '{$_SESSION['pwd1']}','$marks10','$marks12','$sem1','$sem2','$sem3','$sem4','$sem5','$sem6','$sem7','$sem8','$cpi')";
      $result = mysqli_query($conn,$query);
      if ($result){
        header("Location: http://localhost:2006");
      }
    }
  }
}
?>
