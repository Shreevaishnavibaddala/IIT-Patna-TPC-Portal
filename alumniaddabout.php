<!-- http://localhost:8150/ -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Company Job Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
	body {
		color: #fff;
		background: #0000;
		font-family: 'Roboto', sans-serif;
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
<style>
		.checkbox-row {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			margin-bottom: 10px;
		}
		.checkbox-row label {
			flex-basis: calc(25% - 10px);
		}
		.submit-button {
			background-color: black;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
	</style>
</head>
<body>


<div class="container">
<?php
        session_start();
		require_once "config.php";
		$id = $_SESSION['id'];
		$id = intval($id);


        if (isset($_POST["submit"])) {
			$sector = $_POST["sector"];
			$title = $_POST["title"];
			$loc = $_POST["loc"];
			$startdate = $_POST["startdate"];
			$enddate=$_POST["enddate"];
      $desc=$_POST["desc"];
      $company=$_POST["company"];
			  $sql = "INSERT INTO alumnistatus VALUES ('$id','$sector','$title','$loc','$startdate','$enddate','$desc','$company')";
			  $result = mysqli_query($conn,$sql);
			  if ($result) {

				  header("Location: http://localhost:2011");
			  }
			  else{
				echo "Something went wrong";
			  }



		}

?>

<form action="company_addjob.php" method="post">
	<form>
		<h2>We are glad to have you on board</h2>
		<!-- <p>We are glad to have you on board</p> -->
		<hr>
        <div class="form-group">
        <!-- <input type="text" class="form-control" name="sector" placeholder="Job Sector" required="required"> -->
    	<div class="form-group"><label for="sector">Job Sector/Higher Degrees</label>
		<select id="sector" name="sector" class="form-control" placeholder="Select sector">

			<option value="IT">IT</option>
			<option value="Finance">Finance</option>
			<option value="Mechanical">Mechanical</option>
			<option value="Civil">Civil</option>
			<option value="Electrical">Electrical</option>
			<option value="Chemical">Chemical</option>
			<option value="Metallurgy">Metallurgy</option>
			<option value="Phd">Phd</option>
			<option value="MTech">MTech</option>
			<option value="MSC">MSC</option>
      <option value="MBA">MBA</option>

		</select></div>
        </div>
				<div class="form-group">
		<label>Company/College</label>

        <input type="text" class="form-control" name="company" placeholder="Enter name of company/College" required="required">

        </div>
        <div class="form-group">
		<label>Profession Title/Course</label>

        <input type="text" class="form-control" name="title" placeholder="Job Title/Course" required="required">

        </div>


		<div class="form-group">
		<label>Location</label>

        <input type="text" class="form-control" name="loc" placeholder="Enter the location of job" required="required">
		</div>
    <div class="col"><div style = "position:relative; top:1px"><label>Joining Year</label></div><input type="text" class="form-control" name="startdate" required="required" placeholder="Enter the joining year"></div>
    <div class="col"><div style = "position:relative; top:1px"><label>Resignation Year</label></div><input type="text" class="form-control" name="enddate" required="required" placeholder="Enter the resigning year, if you are working in it enter present/Enter the passout year or enter present if still studying"></div>
    <div class="form-group">
    <label>Description</label>

    <input type="text" class="form-control" name="desc" placeholder="Describe your job/Describe your Higher Studies" required="required" >

    </div>
	</div>

  <div class="row g-3 justify-content-center">
    <div class="col-auto">
      <button type="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
    </div>
  </div>

    </form>
</div>
</body>
</html>
