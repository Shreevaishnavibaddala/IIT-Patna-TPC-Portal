<!-- 8050 -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Company Login Page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	
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
        if (isset($_POST["submit"])) {
           $cname = $_POST["cname"];
           //echo $cname;
           $cmission = $_POST["cmission"];
           $cweb=$_POST["cweb"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordRepeat = $_POST["repeat_password"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = array();
           
           if (empty($cname) OR empty($cmission) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           
  
            // Validate password strength
            $uppercase    = preg_match('@[A-Z]@', $password);
            $lowercase    = preg_match('@[a-z]@', $password);
            $number       = preg_match('@[0-9]@', $password);
            $specialchars = preg_match('@[^\w]@', $password);
            
            if (!$uppercase || !$lowercase || !$number || !$specialchars || strlen($password) < 8) {
               
            array_push($errors,"Password is not strong. Password should have at least one upper case, special character, number and have a minimum length of 8");
           }
           if ($password!==$passwordRepeat) {
            array_push($errors,"Password does not match");
           }
           require_once "config.php";
           $sql = "SELECT * FROM company WHERE email = '$email'";
           echo $sql;
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO company (name, mission, website, email, password) VALUES ( ?, ?, ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sssss",$cname,$cmission,$cweb, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                $_SESSION['regsucc']= "You are registered successfully";

                header("Location: http://localhost:8050/");
                // echo "<div class='alert alert-success'>You are registered successfully.</div>";

            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
    <form action="com_demo.php" method="post">
		<h2>Sign In</h2>
		<p>Please fill in this form to collaborate with IIT Patna</p>
		<hr>
        <div class="form-group">
        <input type="text" class="form-control" name="cname" placeholder="Company Name" required="required">
    	
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="cmission" placeholder="Mission" required="required">
    	
        </div>
        <div class="form-group">
        <input type="text" class="form-control" name="cweb" placeholder="Website" required="required">
    	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
        <div class="row">
        <div class="col-xs-6"><input type="password" class="form-control" name="password" placeholder="Password" required="required"></div>
        
		
        <div class="col-xs-6"> <input type="password" class="form-control" name="repeat_password" placeholder="Confirm Password" required="required"></div>
        </div>        
        </div>
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="https://drive.google.com/file/d/1wU9KpTaWG5GwaJ3pPbLCOuUSsFwtK68w/view?usp=share_link">Terms of Use</a> </label>
		</div>
		<div class="form-btn">
                <input type="submit"  value="Register" name="submit" class="submit-button">
            </div>
    </form>
	<div class="hint-text">Already have an account? <a href="http://localhost:8050/">Login here</a></div>
</div>
</body>
</html>