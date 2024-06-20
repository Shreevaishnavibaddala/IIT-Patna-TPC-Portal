<!-- host this page on Location: http://localhost:8200/ -->

<?php
session_start();
if (!isset($_SESSION["user"])) {
   header("Location: http://localhost:8050/");
}


?>

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
		background: #e1b382;
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
<body>
<div class="container">
    <?php
    require_once "config.php";
    $title = $_GET["title"];
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM jobs where title='$title' and id='$id' ";
        
        
        
    // var_dump($_SESSION);
    $result = mysqli_query($conn, $sql);
    
    //$result2 = mysqli_query($conn, $name1);
    
    //$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //echo mysqli_num_rows($result);
    
      // Display user data in form
      $row = mysqli_fetch_assoc($result);
    $id = $_SESSION['id'];
    $id=intval($id);

    if (isset($_POST['submit'])) {
        // check if the user clicked "yes"
        if ($_POST['confirm'] == 'yes') {
          // delete the entry from the database
          $sql2 = "DELETE FROM jobs WHERE id='$id' and title='$title'";
          if ($conn->query($sql2) === TRUE) {
            // redirect to home page
            header("Location: http://localhost:8100/");
            exit();
          } else {
            echo "Error deleting record: " . $conn->error;
          }
        } else {
          // redirect to home page without deleting
          header("Location: http://localhost:8100/");
          exit();
        }
      }
      
      // close the database connection
      $conn->close();
      ?>
      
      <!DOCTYPE html>
      <html>
      <head>
        <title>Delete Entry</title>
      </head>
      <body>
        <h1>Are you sure you want to delete this entry?</h1>
        <form method="post">
          <input type="radio" id="yes" name="confirm" value="yes">
          <label for="yes">Yes</label>
          <div style = "left:180px;"><input type="radio" id="no" name="confirm" value="no" >
          <label for="no">No</label></div>
          <br><br>
          <input type="submit" name="submit" value="Submit" class="submit-button">

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

        <input type="text" class="form-control" name="desc" placeholder=<?php echo $row['description'] ?> readonly >
		</div>

		<div class="form-group">
		<label>Job Locations</label>

        <input type="text" class="form-control" name="loc" placeholder=<?php echo $row['locations'] ?> readonly >
		</div>

		<div class="row g-3">

		<div class="col-xs-6"><label>Eligible CPI</label><input type="number" class="form-control" name="cpi" placeholder=<?php echo $row['elcpi'] ?> min="0" step=".01" readonly ></div>
		<!-- <div class="col-xs-6"><label for="interviewmode">Interview Mode</label>
		<select id="intermode" name="interviewmode" class="form-control" readonly placeholder=<?php echo $row['mode'] ?>>
			
			<option value="Online">Online</option>
			<option value="Offline">Offline</option>
		</select></div> -->
        <div class="col-xs-6"><label>Interview Mode</label><input type="text" class="form-control" name="intermode" placeholder=<?php echo $row['mode'] ?>  readonly ></div>

	</div>
		
		
        <!-- </div> -->
		<!-- <div style = "position:relative; ">
         <label>Application Date</label>
      </div>
	  <div style = "position:relative; left:590px ">
         <label>Application Date</label>
      </div> -->
		<div class="row g-3" >
				
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Application Date</label></div><input type="text" readonly class="form-control" placeholder=<?php echo $row['applidate'] ?> name="applidate" ></div>
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Interview Date</label></div><input type="text" readonly class="form-control" placeholder=<?php echo $row['interdate'] ?> name="interdate" ></div>
		</div>
		<div class="row g-3">
	<div class="col-xs-6">
		 <div style = "position:relative; top:1px"><label>Number of interview rounds</label></div>
		 <input type="number" class="form-control" min="0" step=".0" readonly placeholder=<?php echo $row['rounds'] ?> name="rounds" ></div>

		<div class="col-xs-6"> <div style = "position:relative; top:1px"><label>Base Salary</label></div><input type="number" readonly class="form-control" min="0" step=".01" placeholder=<?php echo $row['salary'] ?> name="salary" ></div>
	</div>
	<label><div style = "position:relative; top:1px">Degree Eligible</div></label><br>
	<div class="row">
	<div class="col-xs-6"><label><input type="checkbox" disabled name="btech" value="1" <?php if(substr($row['branches'],0,1)==="1"){echo 'checked';} ?> >B.Tech</label>
	</div>
			
	<div class="col-xs-6"><label><input type="checkbox" disabled name="mtech" value="1" <?php if(substr($row['branches'],1,1)==="1"){echo 'checked';}?> >M.Tech</label>
	</div>		<!-- <label><input type="checkbox" name="mnc">Mathematics and Computing</label> -->
	</div>
		<label><div style = "position:relative; top:1px">Branches Eligible</div></label><br>
		
		
		<div class="checkbox-row">
			<label><input type="checkbox" name="cse" disabled value="1" <?php if(substr($row['branches'],2,1)==="1"){echo 'checked';}?> >Computer Science and Engineering</label>
			<label><input type="checkbox" name="aids" disabled value="1" <?php if(substr($row['branches'],3,1)==="1"){echo 'checked';}?>>Artificial Intelligence and Data Science</label>
			<label><input type="checkbox" name="mnc" disabled value="1" <?php if(substr($row['branches'],4,1)==="1"){echo 'checked';}?>>Mathematics and Computing</label>
			<label><input type="checkbox" name="eee" disabled value="1" <?php if(substr($row['branches'],5,1)==="1"){echo 'checked';}?>>Electrical and Electronics Engineering</label>
		</div>
		<div class="checkbox-row">
			<label><input type="checkbox" name="mech" disabled value="1" <?php if(substr($row['branches'],6,1)==="1"){echo 'checked';}?>>Mechanical Engineering</label>
			<label><input type="checkbox" name="chem" disabled value="1" <?php if(substr($row['branches'],7,1)==="1"){echo 'checked';}?>>Chemical Engineering</label>
			<label><input type="checkbox" name="civil" disabled value="1" <?php if(substr($row['branches'],8,1)==="1"){echo 'checked';}?>>Civil Engineering</label>
			<label><input type="checkbox" name="mme" disabled value="1" <?php if(substr($row['branches'],9,1)==="1"){echo 'checked';}?>>Metallurgy</label>
		</div>
	

	
		
	
        <div class="form-group">
			
			<label>Bonus/Perks/Incentives(if applicable)</label>
        	<input type="text" class="form-control" readonly name="bonus" placeholder=<?php echo $row['bonus'] ?> >
        </div>
		


        </form>
      </body>
      </html>