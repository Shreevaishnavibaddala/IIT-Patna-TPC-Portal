<!-- http://localhost:8250/ -->
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

        $title=$_GET['title'];


        // Get user data from database
        //$user_id = $_SESSION['user_id'];
        $id = $_SESSION['id'];
        $id=intval($id);

        // $sector=$_SESSION['sector'];
        // $title = $_SESSION['title'];
        $sql = "SELECT * FROM alumnistatus where title='$title' and id='$id' ";



        // var_dump($_SESSION);
        $result = mysqli_query($conn, $sql);

        //$result2 = mysqli_query($conn, $name1);

        //$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //echo mysqli_num_rows($result);

          // Display user data in form
          $row = mysqli_fetch_assoc($result);
          //echo var_dump($row);
        if(isset($_POST["submit"])){
            header("Location:  http://localhost:2011/");

        }

?>


<form action="" method="post">
	<form>
		<h2>View existing job details</h2>
		<!-- <p>We are glad to have you on board</p> -->
		<hr>
        <div class="form-group">
		<label>Job Sector</label>
        <input type="text" class="form-control" name="sector" value=<?php echo $row['sector'] ?> readonly >

        </div>
        <div class="form-group">
		<label>Job Title</label>

        <input type="text" class="form-control" name="title" value=<?php echo $row['title'] ?> readonly >

        </div>
        <div class="form-group">
    <label>Job Description</label>
    <input type="text" class="form-control" name="desc" value="<?php echo $row['description'] ?>" readonly>
</div>


		<div class="form-group">
		<label>Job Locations</label>

        <input type="text" class="form-control" name="loc" value=<?php echo $row['location'] ?> readonly >
		</div>




		<div class="row g-3" >

		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Start Date</label></div><input type="text" readonly class="form-control" value=<?php echo $row['startdate'] ?> name="applidate" ></div>
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>End Date</label></div><input type="text" readonly class="form-control" value=<?php echo $row['enddate'] ?> name="interdate" ></div>
		</div>



		<div class="form-btn">
                <input type="submit"  value="BACK" name="submit" class="submit-button">
            </div>
    </form>
</div>
</body>
</html>
