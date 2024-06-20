
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
      if (!isset($_SESSION['id'])) {
          header("Location: login.php");
          exit();
      }

      $title = $_GET['title'];
      $id = $_SESSION['id'];

      // Get job data from database
      $sql = "SELECT * FROM alumnistatus WHERE title = '$title' AND id = '$id'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);

      // Handle form submission
      if (isset($_POST["submit"])) {
          $loc = $_POST["loc"];
          $desc = $_POST["desc"];
          $enddate = $_POST["enddate"];


          if (!empty($loc)) {
              $sql = "UPDATE alumnistatus SET location = '$loc' WHERE id = '$id' AND title = '$title'";
              $result = mysqli_query($conn, $sql);
          }

          if (!empty($enddate)) {
              $sql = "UPDATE alumnistatus SET enddate = '$enddate' WHERE id = '$id' AND title = '$title'";
              $result = mysqli_query($conn, $sql);
          }

          if (!empty($desc)) {
              $sql = "UPDATE alumnistatus SET description = '$desc' WHERE id = '$id' AND title = '$title'";
              $result = mysqli_query($conn, $sql);
          }

          header("Location: http://localhost:2011/");
          exit();
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
              <label>Job Sector</label>
              <input type="text" class="form-control" name="sector" value="<?php echo $row['sector']; ?>" readonly disabled>
          </div>
          <div class="form-group">
              <label>Profession Title</label>
              <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" readonly disabled>
          </div>
          <div class="form-group">
              <label>Job Location</label>
              <input type="text" class="form-control" name="loc" value="<?php echo $row['location']; ?>">
          </div>
          <div class="form-group">
            <label>Start date</label>
            <input type="text" class="form-control" name="startdate" value="<?php echo $row['startdate']; ?>" readonly disabled>
          </div>
          <div class="form-group">
            <label>End date</label>
            <input type="text" class="form-control" name="enddate" value="<?php echo $row['enddate']; ?>">
          </div>
          <div class="form-group">
              <label>Description</label>
              <input type="text" class="form-control" name="desc" value="<?php echo $row['description']; ?>">
          </div>
          <div class="row g-3 justify-content-center">
            <div class="col-auto">
              <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
            </div>
          </div>
