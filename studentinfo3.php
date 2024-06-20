<?php session_start();
include 'config.php'; ?>
<?php

$c1='0';
$c2='0';
$c3='0';
$c4='0';
$c5='0';
$c6='0';
$c7='0';
if ($_SERVER["REQUEST_METHOD"] == "POST"){
  if (isset($_POST['submit'])){
    $link = $_POST['link'];
    if(isset($_POST['it'])){
      $c1=1;
    }
    if(isset($_POST['fin'])){
      $c2=1;
    }
    if(isset($_POST['mech'])){
      $c3=1;
    }
    if(isset($_POST['civil'])){
      $c4=1;
    }
    if(isset($_POST['elec'])){
      $c5=1;
    }
    if(isset($_POST['chem'])){
      $c6=1;
    }
    if(isset($_POST['met'])){
      $c7=1;
    }
    $s = $c1.$c2.$c3.$c4.$c5.$c6.$c7;
    $city = $_POST['city'];
    $query = "INSERT INTO sidestudenttable (rollno,resumelink,sector,location) VALUES ('{$_SESSION['rollno']}','$link','$s','$city')";
    $result = mysqli_query($conn,$query);
    if ($result){
      header("Location: http://localhost:2009");
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
    <div class="form-group">
          <label for="linkInput">Resume Link:</label>
          <input type="text" class="form-control" id="link" name="link" placeholder="Upload the resume to your Googel drive and provide the link or create a shorturl link and provide here">
          </div>
    <br>
    <div class="form-group">
                    <label for="checkboxGroup">Select Sectors you are interested in:</label>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="it" id="it" value="option1">
                                <label class="form-check-label" for="option1">
                                    IT
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="fin" id="fin" value="option2">
                                <label class="form-check-label" for="option2">
                                    Finance
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="mech" id="mech" value="option3">
                                <label class="form-check-label" for="option3">
                                    Mechanical
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="civil" id="civil" value="option3">
                                <label class="form-check-label" for="option3">
                                    Civil
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="elec" id="elec" value="option3">
                                <label class="form-check-label" for="option3">
                                    Electrical
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="chem" id="chem" value="option3">
                                <label class="form-check-label" for="option3">
                                    Chemical
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="met" id="met" value="option3">
                                <label class="form-check-label" for="option3">
                                    Metallurgy
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
        <br>
        <div class="row g-3">
          <div class="col">
            <label>Location</label>
            <input type="text" class="form-control" id="city" placeholder="Enter Your Desired Job Location" aria-label="First name" name="city">
          </div>
        </div>
        <br>
        <br>
        <hr>
        <div class="row g-3 justify-content-center">
          <div class="col-auto">
            <button type="submit" name="submit" class="btn btn-primary btn-lg">Register</button>
          </div>
        </div>
</form>
</div>
