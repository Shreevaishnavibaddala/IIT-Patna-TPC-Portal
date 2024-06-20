<?php include 'config.php';
session_start();
$id = $_GET['id'];
 ?>
 <?php
 if(isset($_POST['recruit'])){
 	header ("Location: http://localhost:2018");
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

 <body>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 		background = "#e1b382"
 rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <body style="background-color: #e1b382;
    font-family: 'Roboto', sans-serif;
  ">
  <!-- your page content here -->
 </body>
 <form action="" method="post">
   <div><button type="submit" class="btn btn-primary btn-lg" name="recruit">Go back to HomePage</button></div>
 </form>
 <br>
 <table class="table table-hover text-center float-right">
   <thead class="table-dark">
     <tr>
       <th scope="col">Company</th>
       <th scope="col">Sector</th>
       <th scope="col">Profession</th>
       <th scope="col">Location</th>
       <th scope="col">Start Date</th>
       <th scope="col">End Date</th>
       <th scope="col">Description</th>
     </tr>
   </thead>
<?php
$sql = "SELECT * FROM alumnistatus WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
?>
    <tr>
      <th><?php echo $row['company']?></th>
      <th><?php echo $row['sector']?></th>
      <th><?php echo $row['title']?></th>
      <th><?php echo $row['location']?></th>
      <th><?php echo $row['startdate']?></th>
      <th><?php echo $row['enddate']?></th>
      <th><?php echo $row['description']?></th>
    </tr>
<?php
} ?>
