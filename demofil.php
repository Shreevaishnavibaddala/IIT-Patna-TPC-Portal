<!-- http://localhost:8100/ -->

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Company Login Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	body {
		color: #fff;
		background: #e1b382;
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
<?php
    session_start();

    if(isset($_SESSION['addjob'])){
        
        
        echo "<div class='alert alert-success'>Job added successfully.</div>";
        unset($_SESSION['addjob']);
    }
    if(isset($_SESSION['jobdel'])){
        
        echo $_SESSION['jobdel'];
        //echo "<div class='alert alert-danger'>Job deleted successfully.</div>";
        unset($_SESSION['jobdel']);
    }
    if(isset($_SESSION['jobupd'])){
        
        
        echo "<div class='alert alert-success'>Job updated successfully.</div>";
        unset($_SESSION['jobupd']);
    }
    if (isset($_POST["recruit"])) {
        header("Location: http://localhost:8150/");
    }
    if (isset($_POST["update"])) {
        header("Location: http://localhost:8200/");
    }

    ///add for applications received
?>

 <form action="company_homepg.php" method="post">
<body>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 		background = "#e1b382"
 rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
 <body style="background-color: #e1b382;
		font-family: 'Roboto', sans-serif;
	">
  <!-- your page content here -->
</body>
<div><button type="submit" class="btn btn-primary btn-lg" name="recruit">Add a new job</button></div>
<div><button type="submit" class="btn btn-primary btn-lg" name="applications">Applications received</button></div>
<div><button type="submit" class="btn btn-primary btn-lg" name="update">Update posted jobs</button></div>




  <div class="btn-group" role="group">
    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      Dropdown
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#" name="Sector">Dropdown link</a></li>
      <li><a class="dropdown-item" href="#" name="Title">Dropdown link</a></li>
    </ul>
  
</div>
<div style="display: flex;">
  <div style="flex: 1;">
    <label for="sector">Sector:</label><br>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="sectorDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Sector
      </button>
      <div class="dropdown-menu" aria-labelledby="sectorDropdown">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="it" value="IT">
          <label class="form-check-label" for="it">
            IT
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="finance" value="Finance">
          <label class="form-check-label" for="finance">
            Finance
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="mech" value="Mech">
          <label class="form-check-label" for="mech">
            Mech
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="civil" value="Civil">
          <label class="form-check-label" for="civil">
            Civil
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="elec" value="Elec">
          <label class="form-check-label" for="elec">
            Elec
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="chem" value="Chem">
          <label class="form-check-label" for="chem">
            Chem
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="sector" id="met" value="Met">
          <label class="form-check-label" for="met">
            Met
          </label>
        </div>
      </div>
    </div>
  </div>
  
<script>
  const checkboxes = document.querySelectorAll('input[type="radio"]');
  const sectorDropdown = document.getElementById('sectorDropdown');
  
  checkboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function() {
      let selectedValues = [];
      checkboxes.forEach((checkbox) => {
        if (checkbox.checked) {
          selectedValues.push(checkbox.value);
        }
      });
      
      if (selectedValues.length > 0) {
        sectorDropdown.innerHTML = selectedValues.join(', ');
      } else {
        sectorDropdown.innerHTML = 'Select Sector';
      }
    });
  });
</script>


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
    <input type="text" id="titleTextbox" style="display: none;">
  </div>
  <div style="flex: 1;">
    <label for="interviewDate">Interview Date:</label><br>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="submit" id="interviewDateDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Date
      </button>
      <div class="dropdown-menu" aria-labelledby="interviewDateDropdown">
        <input type="date" name="intdatefil" id="intdatefil" onchange="updateDateButton()">
      </div>
    </div>
  </div>
  <script>
  function updateDateButton() {
    var dateInput = document.getElementById("intdatefil");
    var selectedDate = new Date(dateInput.value);
    var formattedDate = selectedDate.toLocaleDateString("en-US", { month: "short", day: "numeric", year: "numeric" });
    document.getElementById("interviewDateDropdown").innerHTML = formattedDate;
  }
</script>

  
  <div style="flex: 1;">
    <label for="joiningDate">Application Date:</label><br>
    <div class="dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="submit" id="joiningDateDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Select Date
      </button>
      <div class="dropdown-menu" aria-labelledby="joiningDateDropdown">
        <input type="date" name="applidatefil" id="applidatefil" onchange="update2()">
      </div>
    </div>
  </div>
  <script>
  function update2() {
    var dateInput = document.getElementById("applidatefil");
    var selectedDate = new Date(dateInput.value);
    var formattedDate = selectedDate.toLocaleDateString("en-US", { month: "short", day: "numeric", year: "numeric" });
    document.getElementById("joiningDateDropdown").innerHTML = formattedDate;
  }
</script>
  <div style="flex: 1;">
    <label for="filter">Filter</label><br>
    <div><button type="submit" class="btn btn-primary " name="filter">Filter</button></div>

    </div>
  </div>
</div>

<script>
  function showTextBox() {
    document.getElementById("titleTextbox").style.display = "block";
  }
</script>
<br><br>
<table class="table table-hover text-center float-right">
  <thead class="table-dark">
    <tr>
      <th scope="col">Sector</th>
      <th scope="col">Title</th>
      <th scope="col">Eligibility</th>
      <th scope="col">Mode</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
      <th scope="col">View all info</th>
      
    </tr>
  </thead>
  <tbody>
    <?php           
        require_once "config.php";
        $id=$_SESSION['id'];
        error_reporting(E_ERROR | E_PARSE);

        

      
            if(isset($_POST['filter'])){
                $sector=$_POST['sector'];
                echo "aaa";
                //$title=$_POST['titfil'] ;
                $interviewDate=$_POST['intdatefil'];
                echo $interviewDate;
                $applicationDate=$_POST['applidatefil'];
                $sql = "SELECT * FROM jobs WHERE id='$id'";

                if (!empty($sector)) {
                $sql .= " AND sector = '$sector'";
                }

                if (!empty($title)) {
                $sql .= " AND title LIKE '%$title%'";
                }

                if (!empty($interviewDate)) {
                $sql .= " AND interdate = '$interviewDate'";
                }

                if (!empty($applicationDate)) {
                $sql .= " AND applidate = '$applicationDate'";
                }

                // Execute the query
                $result = mysqli_query($conn, $sql);
                 while ($row= mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <?php 
                    // $_SESSION['sector']=$row['sector'];
                    $_SESSION['title']=$row['title'];

                    ?>
                    <th><?php echo $row['sector']?></th>
                    <th><?php echo $row['title']?></th>
                    <th><?php echo $row['cpi']?></th>
                    <th><?php echo $row['mode']?></th>
                    
                    <td>
                        <!-- update -->
                        <a href="http://localhost:8200/?title=<?php echo $row['title'] ?> " class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>  
                         <!--delete check out this shit, its not deleting  -->
                        <td>                            
                        <a href="http://localhost:8300/?title=<?php echo $row['title'] ?> " class="link-dark" ><i class="fa-solid fa-trash"></i></a>
                        </td>  
                        <!-- view all info -->
                        <td>
                        <a href=" http://localhost:8250/?title=<?php echo $row['title']?> " class="link-dark"><i class="fa-solid fa-eye"></i></a>
                        </td>  
                    </tr>
                <?php
            }
                                
                

            }
            else{
            $sql="select * from jobs where id='$id' ";
            $result = mysqli_query($conn,$sql);
            while ($row= mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <?php 
                    $_SESSION['sector']=$row['sector'];
                    $_SESSION['title']=$row['title'];

                    ?>
                    <th><?php echo $row['sector']?></th>
                    <th><?php echo $row['title']?></th>
                    <th><?php echo $row['cpi']?></th>
                    <th><?php echo $row['mode']?></th>
                    
                    <td>
                        <!-- update -->
                        <a href="http://localhost:8200/?title=<?php echo $row['title'] ?> " class="link-dark"><i class="fa-solid fa-pen-to-square"></i></a>
                        </td>  
                         <!--delete check out this shit, its not deleting  -->
                        <td>                            
                        <a href="http://localhost:8300/?title=<?php echo $row['title'] ?> " class="link-dark" ><i class="fa-solid fa-trash"></i></a>
                        </td>  
                        <!-- view all info -->
                        <td>
                        <a href=" http://localhost:8250/?title=<?php echo $row['title']?> " class="link-dark"><i class="fa-solid fa-eye"></i></a>
                        </td>  
                    </tr>
                <?php
            }
        }
    ?>
    
    
  </tbody>
</table>
</body>