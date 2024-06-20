<!-- http://localhost:8200/ -->
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
        $sql = "SELECT * FROM jobs where title='$title' and id='$id' ";
        
        
        
        // var_dump($_SESSION);
        $result = mysqli_query($conn, $sql);
        
        //$result2 = mysqli_query($conn, $name1);
        
        //$user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //echo mysqli_num_rows($result);
        
          // Display user data in form
          $row = mysqli_fetch_assoc($result);
          //echo var_dump($row);
          $errors = array();
        
          $user_id = $_SESSION['email'];
          if (isset($_POST["submit"])){
                   $sector = $_POST["sector"];
                   $title = $_POST["title"];
                   $desc = $_POST["desc"];
                   $loc = $_POST["loc"];
                   $cpi = $_POST["cpi"];
                   $intermode = $_POST["interviewmode"];
                    $applidate=$_POST["applidate"];
                    $interdate = $_POST["interdate"];
                    $rounds = $_POST["rounds"];
                    $salary=$_POST['salary'];
                    $s=$row['branches'];
                    $a="1";
                    $bctech=$mctech=$cchem=$ccivil=$ccse=$cai=$cmnc=$ceee=$cmech=$cmme=false;
                    
		
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

                  
                    $bonus=$_POST['bonus'];

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



                      $sql = "UPDATE jobs SET branches='$s' where id = '$id' and sector='$sector'and title='$title'";
                      $result = mysqli_query($conn,$sql);   
                   



          if(!empty($desc)){
            $sql = "UPDATE jobs SET desc='$desc' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }if(!empty($loc)){
            $sql = "UPDATE jobs SET loc='$loc' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($cpi)){
            $sql = "UPDATE jobs SET elcpi='$cpi' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($intermode)){
            $sql = "UPDATE jobs SET mode='$intermode' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($applidate)){
            $sql = "UPDATE jobs SET applidate='$applidate' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($interdate)){
            $sql = "UPDATE jobs SET interdate='$interdate' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($rounds)){
            $sql = "UPDATE jobs SET rounds='$rounds' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($salary)){
            $sql = "UPDATE jobs SET salary='$salary' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }
          if(!empty($bonus)){
            $sql = "UPDATE jobs SET bonus='$bonus' where id = '$id' and sector='$sector'and title='$title'";
            $result = mysqli_query($conn,$sql);
          }

          $_SESSION['jobupd']='f';
          header("Location: http://localhost:8100/ ");

        }
?>


<form action="update_job.php" method="post">
	<form>
		<h2>Edit existing job details</h2>
		<!-- <p>We are glad to have you on board</p> -->
		<hr>
        <div class="form-group">
		<label>Job Sector</label>
        <input type="text" class="form-control" name="sector" value=<?php echo $row['sector'] ?> readonly disabled>
        
    	
        </div>
        <div class="form-group">
		<label>Job Title</label>

        <input type="text" class="form-control" name="title" value=<?php echo $row['title'] ?> readonly disabled>
    	
        </div>
        <div class="form-group">
		<label>Job Description</label>

        <input type="text" class="form-control" name="desc" placeholder=<?php echo $row['description'] ?> >
		</div>

		<div class="form-group">
		<label>Job Locations</label>

        <input type="text" class="form-control" name="loc" placeholder=<?php echo $row['locations'] ?> >
		</div>

		<div class="row g-3">

		<div class="col-xs-6"><label>Eligible CPI</label><input type="number" class="form-control" name="cpi" placeholder=<?php echo $row['elcpi'] ?> min="0" step=".01" ></div>
		<div class="col-xs-6"><label for="interviewmode">Interview Mode</label>
		<select id="intermode" name="interviewmode" class="form-control" placeholder=<?php echo $row['mode'] ?>>
			
			<option value="Online">Online</option>
			<option value="Offline">Offline</option>
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
				
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Application Date</label></div><input type="date" class="form-control" value=<?php echo $row['applidate'] ?> name="applidate" ></div>
		<div class="col-xs-6"><div style = "position:relative; top:1px"><label>Interview Date</label></div><input type="date" class="form-control" value=<?php echo $row['interdate'] ?> name="interdate" ></div>
		</div>
		<div class="row g-3">
	<div class="col-xs-6">
		 <div style = "position:relative; top:1px"><label>Number of interview rounds</label></div>
		 <input type="number" class="form-control" min="0" step=".0" placeholder=<?php echo $row['rounds'] ?> name="rounds" ></div>

		<div class="col-xs-6"> <div style = "position:relative; top:1px"><label>Base Salary</label></div><input type="number" class="form-control" min="0" step=".01" placeholder=<?php echo $row['salary'] ?> name="salary" ></div>
	</div>
	<label><div style = "position:relative; top:1px">Degree Eligible</div></label><br>
	<div class="row">
	<div class="col-xs-6"><label><input type="checkbox" name="btech" value="1" <?php if(substr($row['branches'],0,1)==="1"){echo 'checked';} ?> >B.Tech</label>
	</div>
			
	<div class="col-xs-6"><label><input type="checkbox" name="mtech" value="1" <?php if(substr($row['branches'],1,1)==="1"){echo 'checked';}?> >M.Tech</label>
	</div>		<!-- <label><input type="checkbox" name="mnc">Mathematics and Computing</label> -->
	</div>
		<label><div style = "position:relative; top:1px">Branches Eligible</div></label><br>
		
		
		<div class="checkbox-row">
			<label><input type="checkbox" name="cse" value="1" <?php if(substr($row['branches'],2,1)==="1"){echo 'checked';}?> >Computer Science and Engineering</label>
			<label><input type="checkbox" name="aids" value="1" <?php if(substr($row['branches'],3,1)==="1"){echo 'checked';}?>>Artificial Intelligence and Data Science</label>
			<label><input type="checkbox" name="mnc" value="1" <?php if(substr($row['branches'],4,1)==="1"){echo 'checked';}?>>Mathematics and Computing</label>
			<label><input type="checkbox" name="eee" value="1" <?php if(substr($row['branches'],5,1)==="1"){echo 'checked';}?>>Electrical and Electronics Engineering</label>
		</div>
		<div class="checkbox-row">
			<label><input type="checkbox" name="mech" value="1" <?php if(substr($row['branches'],6,1)==="1"){echo 'checked';}?>>Mechanical Engineering</label>
			<label><input type="checkbox" name="chem" value="1" <?php if(substr($row['branches'],7,1)==="1"){echo 'checked';}?>>Chemical Engineering</label>
			<label><input type="checkbox" name="civil" value="1" <?php if(substr($row['branches'],8,1)==="1"){echo 'checked';}?>>Civil Engineering</label>
			<label><input type="checkbox" name="mme" value="1" <?php if(substr($row['branches'],9,1)==="1"){echo 'checked';}?>>Metallurgy</label>
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