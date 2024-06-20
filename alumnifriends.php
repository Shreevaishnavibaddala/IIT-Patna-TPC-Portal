<?php
if(isset($_POST['recruit'])){
	header ("Location: http://localhost:2011");
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Alumni Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
</head>

<?php include 'config.php';
session_start();
?>
<form action="" method="post">
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 		background = "#e1b382"
rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<body style="background-color: #e1b382;
   font-family: 'Roboto', sans-serif;
 ">
 <!-- your page content here -->
</body>
<div><button type="submit" class="btn btn-primary btn-lg" name="recruit">Go back to HomePage</button></div>
<div style="display: flex;">
  <div style="flex: 1;">
    <label for="sort_order">Sort by Sector</label><br>

      <select name="sort_order" id="sort_order">
        <option value="">Sort by</option>
        <option value="IT">IT</option>
        <option value="Finance">Finance</option>
				<option value="Mechanical">Mechanical</option>
				<option value="Civil">Civil</option>
				<option value="Electrical">Electrical</option>
				<option value="Chemical">Chemical</option>
				<option value="Metallurgy">Metallurgy</option>
    </select>
</div>
</div>
<div style="flex: 1;">
	<label for="title">Title:</label><br>
	<div class="dropdown">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="titleDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Enter Title
		</button>
		<div class="dropdown-menu" aria-labelledby="titleDropdown" onclick="showTextBox()">
			<!-- <a class="dropdown-item" href="#" onclick="showTextBox()"> -->

	<!-- </a> -->
		</div>
	</div>
	<input type="text" id="titleTextbox" name="titleTextbox" style="display: none;">
</div>
<script>

  function showTextBox() {
    document.getElementById("titleTextbox").style.display = "block";
  }
</script>
<br><br><br>
<div style="flex: 1;">
	<label for="title">Title:</label><br>
	<div class="dropdown">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="titleDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			Enter Yop
		</button>
		<div class="dropdown-menu" aria-labelledby="titleDropdown" onclick="showTextBox1()">
			<!-- <a class="dropdown-item" href="#" onclick="showTextBox()"> -->

	<!-- </a> -->
		</div>
	</div>
	<input type="text" id="titleTextbox1" name="titleTextbox1" style="display: none;">
</div>
<script>

  function showTextBox1() {
    document.getElementById("titleTextbox1").style.display = "block";
  }
</script>
<div style="flex: 1;">
  <div><button type="submit" class="btn btn-primary " name="filter">Filter</button></div>

  </div>

  <br><br>
  <table class="table table-hover text-center float-right">
    <thead class="table-dark">
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
				<th scope="col">Yop</th>
        <th scope="col">Phno</th>
				<th scope="col">View Professional Details</th>
      </tr>
    </thead>
		<?php
		if(isset($_POST['filter'])){
		
		    if(isset($_POST['sort_order'])){
		        $sec=$_POST['sort_order'];
		        $sql = "SELECT * FROM alumnistatus inner join alumni on alumnistatus.id = alumni.id WHERE title = '$sec' and enddate = 'PRESENT'";
		        $result = mysqli_query($conn,$sql);
		        while($row=mysqli_fetch_assoc($result)){
		?>
		            <tr>
		              <th><?php echo $row['name']?></th>
                  <th><?php echo $row['email']?></th>
									<th><?php echo $row['yop']?></th>
                  <th><?php echo $row['phno']?></th>
									<td>
										 <!-- update -->
										 <a href="http://localhost:2023/?title=<?php echo urlencode($row['title']); ?>&id=<?php echo urlencode($row['id']); ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>

										 </td>
		            </tr>
		<?php
		        }
		    }
		    else if(isset($_POST['titleTextbox'])){
		        $title = $_POST['titleTextbox'];
		        $sql = "SELECT * FROM alumnistatus inner join alumni on alumnistatus.id = alumni.id title = '$title' WHERE enddate = 'PRESENT'";
		        $result = mysqli_query($conn,$sql);
		        while($row=mysqli_fetch_assoc($result)){
		?>
		            <tr>
		              <th><?php echo $row['name']?></th>
                  <th><?php echo $row['email']?></th>
									<th><?php echo $row['yop']?></th>
                  <th><?php echo $row['phno']?></th>
									<td>
										 <!-- update -->
										 <a href="http://localhost:2023/?title=<?php echo urlencode($row['title']); ?>&id=<?php echo urlencode($row['id']); ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>

										 </td>
		            </tr>
		<?php
		        }
		    }
		}
		else{
		  $sql = "SELECT * FROM alumnistatus inner join alumni on alumnistatus.id = alumni.id WHERE enddate = 'PRESENT'";
		  $result = mysqli_query($conn,$sql);
		  while($row=mysqli_fetch_assoc($result)){
		?>
		    <tr>
		      <th><?php echo $row['name']?></th>
          <th><?php echo $row['email']?></th>
					<th><?php echo $row['yop']?></th>
          <th><?php echo $row['phno']?></th>
					<td>
						 <!-- update -->
						 <a href="http://localhost:2023/?title=<?php echo urlencode($row['title']); ?>&id=<?php echo urlencode($row['id']); ?>" class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>

						 </td>
				</tr>
<?php
		}
}?>
