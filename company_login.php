
<!--host this page on http://localhost:8050/ -->

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
	
    .submit-button {
			background-color: black;
			color: white;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
		}
        .float-right {
  float: right;
}

.left-side {
  width: 50%;
  padding: 20px;
  box-sizing: border-box;
  float: left;
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


<?php
session_start();
    if(isset($_SESSION['regsucc'])){

        

        echo "<div class='alert alert-success'>You are registered successfully.</div>";
        
        
        
        unset($_SESSION['regsucc']);
    }
    if(isset($_SESSION['del'])){
        
        
        echo $_SESSION['del'];
        unset($_SESSION['del']);
    }
    if(isset($_SESSION['passerr'])){
        
        
        echo $_SESSION['passerr'];
        unset($_SESSION['passerr']);
    }
    
?>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "config.php";
            $sql = "SELECT * FROM company WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    
                    $_SESSION["user"] = "yes";
                    $_SESSION["email"] = $email;
                    $sql = "SELECT id FROM company where email='$email' ";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['id']=$row['id'];

                    echo $_SESSION['id'];
                    //index.php where welcome msg is displayed
                    header("Location: http://localhost:8100/");
                     die();
                }else{
                    //debug
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }
        ?>
        
      <form action="company_login.php" method="post">
      <h2>Sign Up</h2>
		<p>Please enter your credentials to login</p>
		<hr>
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control" >
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>


        <div class="form-btn1">
            <input type="submit" value="Login" name="login" class="submit-button">
        </div>
       
    
      </form>
     <div><p>Not registered yet <a href="http://localhost:8000/">Register Here</a></p></div>
    </div>
</body>
</html>