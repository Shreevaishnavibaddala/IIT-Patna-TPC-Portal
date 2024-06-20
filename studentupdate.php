
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Alumni Update</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body {
		color: #fff;
		background: #0000;
		font-family: 'Roboto', sans-serif;
	}
    .submit-button {
			background-color: black;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
    .form-control{
		height: 50px;
		background: #f2f2f2;
		box-shadow: none !important;
		border: none;
	}
	.form-control:focus{
		background: #e2e2e2;
	}
    .form-control, .btn{
        border-radius: 3px;
    }
	.signup-form{
		width: 390px;
		margin: 30px auto;
	}
	.signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}
    .signup-form .btn{
        font-size: 16px;
        font-weight: bold;
		background: #3598dc;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus{
		background: #2389cd !important;
        outline: none;
	}
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
	.signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #3598dc;
		text-decoration: none;
	}
	.signup-form form a:hover{
		text-decoration: underline;
	}
    .signup-form .hint-text {
		padding-bottom: 15px;
		text-align: center;
    }
</style>
</head>
<body>



  <?php
      session_start();

      require_once "config.php";

			// Check if user is logged in
      if (!isset($_SESSION['rollno'])) {
          header("Location: http://localhost:2009");
          exit();
      }

      $rollno = $_SESSION['rollno'];

      // Get job data from database
      $sql = "SELECT * FROM mainstudenttable inner join sidestudenttable on mainstudenttable.rollno = sidestudenttable.rollno WHERE mainstudenttable.rollno = '$rollno'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      // Handle form submission
      if (isset($_POST["submit"])) {
          $name = $_POST["name"];
          $phno = $_POST["phno"];
          $branch = $_POST["branch"];
					$yop = $_POST["yop"];
					$degree = $_POST["degree"];
					$dob = $_POST["dob"];
					$password = $_POST["password"];
					$marks10th = $_POST["10thmarks"];
					$marks12th = $_POST["12thmarks"];
					$sem1 = $_POST["sem1"];
					$sem2 = $_POST["sem2"];
					$sem3 = $_POST["sem3"];
					$sem4 = $_POST["sem4"];
					$sem5 = $_POST["sem5"];
					$sem6 = $_POST["sem6"];
					$sem7 = $_POST["sem7"];
					$sem8 = $_POST["sem8"];
					$cpi = $_POST["cpi"];
					$link = $_POST['link'];


          if(empty($name) or empty($phno) or empty($branch) or empty($yop) or empty($degree) or empty($dob) or empty($password) or empty($marks10th) or empty($marks12th) or empty($sem1) or empty($sem2) or empty($sem3) or empty($sem4) or empty($sem5) or empty($sem6) or empty($sem7) or empty($sem8) or empty($cpi)){
						echo "Fill all fields";
					}
          else{
						$sql = "UPDATE mainstudenttable SET name = '$name', phno = '$phno', branch = '$branch', yop = '$yop', degree = '$degree', dob ='$dob', password = '$password', 10thmarks = '$marks10th', 12thmarks = '$marks12th', sem1 = '$sem1', sem2 = '$sem2', sem3 = '$sem3', sem4 ='$sem4', sem5 = '$sem5', sem6 = '$sem6', sem7 = '$sem7', sem8 = '$sem8', cpi = $cpi WHERE rollno = '$rollno'";
            $result = mysqli_query($conn,$sql);
						$sql1 = "UPDATE sidestudenttable SET resumelink = '$link' WHERE rollno = '$rollno'";
						$result1 = mysqli_query($conn,$sql1);
						if($result and $result1){
							header("Location: http://localhost:2009/");
		          exit();
						}

					}
      }
  ?>

  <!DOCTYPE html>
  <html>
  <head>
      <title>Edit Job Details</title>
  </head>
  <body>
      <h2>Edit existing job details</h2>
      <form action="" method="post">
          <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>" >
          </div>
          <div class="form-group">
              <label>RollNo</label>
              <input type="text" class="form-control" name="rollno" value="<?php echo $row['rollno']; ?>" readonly disabled>
          </div>
          <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>" readonly disabled>
          </div>
          <div class="form-group">
            <label>PhNo</label>
            <input type="text" class="form-control" name="phno" value="<?php echo $row['phno']; ?>" >
          </div>
          <div class="form-group">
            <label>Branch</label>
            <input type="text" class="form-control" name="branch" value="<?php echo $row['branch']; ?>">
          </div>
          <div class="form-group">
              <label>Yop</label>
              <input type="text" class="form-control" name="yop" value="<?php echo $row['yop']; ?>">
          </div>
					<div class="form-group">
              <label>Degree</label>
              <input type="text" class="form-control" name="degree" value="<?php echo $row['degree']; ?>">
          </div>
					<div class="form-group">
              <label>Dob</label>
              <input type="text" class="form-control" name="dob" value="<?php echo $row['dob']; ?>">
          </div>
					<div class="form-group">
              <label>Password</label>
              <input type="text" class="form-control" name="password" value="<?php echo $row['password']; ?>">
          </div>
					<div class="form-group">
              <label>10th Marks</label>
              <input type="text" class="form-control" name="10thmarks" value="<?php echo $row['10thmarks']; ?>">
          </div>
					<div class="form-group">
              <label>12th Marks</label>
              <input type="text" class="form-control" name="12thmarks" value="<?php echo $row['12thmarks']; ?>">
          </div>
					<div class="form-group">
              <label>Sem1 SPI</label>
              <input type="text" class="form-control" name="sem1" value="<?php echo $row['sem1']; ?>">
          </div>
					<div class="form-group">
              <label>Sem2 SPI</label>
              <input type="text" class="form-control" name="sem2" value="<?php echo $row['sem2']; ?>">
          </div>
					<div class="form-group">
              <label>Sem3 SPI</label>
              <input type="text" class="form-control" name="sem3" value="<?php echo $row['sem3']; ?>">
          </div>
					<div class="form-group">
              <label>Sem4 SPI</label>
              <input type="text" class="form-control" name="sem4" value="<?php echo $row['sem4']; ?>">
          </div>
					<div class="form-group">
              <label>Sem5 SPI</label>
              <input type="text" class="form-control" name="sem5" value="<?php echo $row['sem5']; ?>">
          </div>
					<div class="form-group">
              <label>Sem6 SPI</label>
              <input type="text" class="form-control" name="sem6" value="<?php echo $row['sem6']; ?>">
          </div>
					<div class="form-group">
              <label>Sem7 SPI</label>
              <input type="text" class="form-control" name="sem7" value="<?php echo $row['sem7']; ?>">
          </div>
					<div class="form-group">
              <label>Sem8 SPI</label>
              <input type="text" class="form-control" name="sem8" value="<?php echo $row['sem8']; ?>">
          </div>
					<div class="form-group">
              <label>CPI</label>
              <input type="text" class="form-control" name="cpi" value="<?php echo $row['cpi']; ?>">
          </div>
					<div class="form-group">
              <label>Resume link</label>
              <input type="text" class="form-control" name="link" value="<?php echo $row['resumelink']; ?>">
          </div>
          <div class="row g-3 justify-content-center">
            <div class="col-auto">
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
          </div>
