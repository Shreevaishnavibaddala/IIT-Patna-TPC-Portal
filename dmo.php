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
</head>
<body>
	<div class="container">
		<form action="com_demo.php" method="post">
			<h2>Sign In</h2>
			<p>Please enter your credentials to login</p>
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
					<div class="col-xs-6">
						 <input type="password" class="form-control" name="password" placeholder="Password" required="required">
					</div>
					<div class="col-xs-6">
						<input type="password" class="form-control" name="repeat_password" placeholder="Confirm Password" required="required">
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="checkbox-inline">
					<input type="checkbox" required="required"> I accept the <a href="https://drive.google.com/file/d/1wU9KpTaWG5GwaJ3pPbLCOuUSsFwtK68w/view?usp=share_link">Terms of Use</a>
				</label>
			</div>
			<div class="form-btn">
				<input type="submit" value="Register" name="submit" class="submit-button">
			</div>
		</form>
		<div class="hint-text">Already have an account? <a href="http://localhost:8050/">Login here</a></div>
	</div>
</body>
</html>


