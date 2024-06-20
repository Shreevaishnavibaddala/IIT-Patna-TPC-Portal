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
		color: #000000;
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
<div class="form-btn">
                <input type="submit"  value="Home Page" name="home" class="submit-button">
            </div>
	<?php
	if (isset($_POST["home"])) {
		header("Location: http://localhost:8100/");
	}
	?>


<div class="container">
<?php

session_start();

		 
	
		require_once "config.php";
		$id = $_SESSION['id'];
		$id = intval($id);
		
		$c1='0';
		$c2='0';
		$c3='0';
		$c4='0';
		$c5='0';
		$c6='0';
		$c7='0';
		$c8='0';
		$cb='0';
		$cm='0';
        if (isset($_POST["submit"])) {
			$sector = $_POST["sector"];
			$title = $_POST["title"];
			$desc = $_POST["desc"];
			$loc = $_POST["loc"];
			$cpi = $_POST["cpi"];
			$intmode=$_POST["interviewmode"];
			$applidate = $_POST["applidate"];
			$intdate=$_POST["interdate"];
			$rounds = $_POST["rounds"];
			$salary=$_POST["salary"];
			if(isset($_POST['btech'])){
				$cb=1;
			  }
			  if(isset($_POST['mtech'])){
				$cm=1;
			  }
			if(isset($_POST['cse'])){
				$c1=1;
			  }
			  if(isset($_POST['aids'])){
				$c2=1;
			  }
			  if(isset($_POST['mnc'])){
				$c3=1;
			  }
			  if(isset($_POST['eee'])){
				$c4=1;
			  }
			  if(isset($_POST['mech'])){
				$c5=1;
			  }
			  if(isset($_POST['chem'])){
				$c6=1;
			  }
			  if(isset($_POST['civil'])){
				$c7=1;
			  }
			  if(isset($_POST['mme'])){
				$c8=1;
			  }
			  $s = $cb.$cm.$c1.$c2.$c3.$c4.$c5.$c6.$c7.$c8;

			  $bonus=$_POST['bonus'];
			  $sql = "INSERT INTO jobs (id,sector,title,description,locations,elcpi,mode,applidate,interdate,rounds,salary,branches,bonus) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ? )";
			  $stmt = mysqli_stmt_init($conn);
			  $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
			  if ($prepareStmt) {
				  mysqli_stmt_bind_param($stmt,"issssdsssidss",$id,$sector,$title, $desc, $loc,$cpi,$intmode,$applidate,$intdate,$rounds,$salary,$s,$bonus);
				  mysqli_stmt_execute($stmt);
				  $_SESSION['addjob']="f";
				  header("Location: http://localhost:8100/");
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
    	<div class="form-group"><label for="sector">Job Sector</label>
		<select id="sector" name="sector" class="form-control" placeholder="Select sector">
			
			<option value="it">IT</option>
			<option value="finance">Finance</option>
			<option value="mech">Mechanical</option>
			<option value="civil">Civil</option>
			<option value="elec">Electrical</option>
			<option value="chem">Chemical</option>
			<option value="mme">Metallurgy</option>


		</select></div>
        </div>
        <div class="form-group">
		<label>Job Title</label>

        <input type="text" class="form-control" name="title" placeholder="Job Title" required="required">
    	
        </div>
        <div class="form-group">
		<label>Job Description</label>

        <input type="text" class="form-control" name="desc" placeholder="Job Description" required="required">
		</div>

		<div class="form-group">
		<label>Job Locations</label>

        <input type="text" class="form-control" name="loc" placeholder="Enter all the job locations" required="required">
		</div>

		<div class="row g-3">

		<div class="col-xs-6"><label>Eligible CPI</label><input type="number" class="form-control" name="cpi" placeholder="Eligible CPI" min="0" step=".01" required="required"></div>
		<div class="col-xs-6"><label for="interviewmode">Interview Mode</label>
		<select id="intermode" name="interviewmode" class="form-control" placeholder="Select online or offline">
			
			<option value="online">Online</option>
			<option value="offline">Offline</option>
		</select></div>
	</div>
		
		
        <!-- </div> -->
		<!-- <div style = "position:relative; ">
         <label>Application Date</label>
      </div>
	  <div style = "position:relative; left:590px ">
         <label>Application Date</label>
      </div> -->
		<div class="row g-3" >
				
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Application Date</label></div><input type="date" class="form-control" name="applidate" required="required"></div>
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Interview Date</label></div><input type="date" class="form-control" name="interdate" required="required"></div>
		</div>
		<div class="row g-3">
	<div class="col-xs-6">
		 <div style = "position:relative; top:1px"><label>Number of interview rounds</label></div>
		 <input type="number" class="form-control" min="0" step=".0" placeholder="Interview Rounds" name="rounds" required="required"></div>

		<div class="col-xs-6"> <div style = "position:relative; top:1px"><label>Base Salary</label></div><input type="number" class="form-control" min="0" step=".01" placeholder="Base Salary" name="salary" required="required"></div>
	</div>
	<label><div style = "position:relative; top:1px">Degree Eligible</div></label><br>
	<div class="row">
			<div class="col-xs-6"><label><input type="checkbox" name="btech">B.Tech</label>
	</div>
			
	<div class="col-xs-6"><label><input type="checkbox" name="mtech">M.Tech</label>
	</div>		<!-- <label><input type="checkbox" name="mnc">Mathematics and Computing</label> -->
	</div>
		<label><div style = "position:relative; top:1px">Branches Eligible</div></label><br>
		
		
		<div class="checkbox-row">
			<label><input type="checkbox" name="cse">Computer Science and Engineering</label>
			<label><input type="checkbox" name="aids">Artificial Intelligence and Data Science</label>
			<label><input type="checkbox" name="mnc">Mathematics and Computing</label>
			<label><input type="checkbox" name="eee">Electrical and Electronics Engineering</label>
		</div>
		<div class="checkbox-row">
			<label><input type="checkbox" name="mech">Mechanical Engineering</label>
			<label><input type="checkbox" name="chem">Chemical Engineering</label>
			<label><input type="checkbox" name="civil">Civil Engineering</label>
			<label><input type="checkbox" name="mme">Metallurgy</label>
		</div>
	

	
		
	
        <div class="form-group">
			
			<label>Bonus/Perks/Incentives(if applicable)</label>
        	<input type="text" class="form-control" name="bonus" placeholder="Bonus">
        </div>
		
		
		<div class="form-btn">
                <input type="submit"  value="Submit" name="submit" class="submit-button">
            </div>
    </form>
</div>

</body>
</html>