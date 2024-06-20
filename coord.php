<!-- 1000 -->
<?php
// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get year input from form
    $year = $_POST['year'];

    // Create connection to database
    require_once "config.php";
    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Select entries from mainstudenttable with yop as year input
    $query = "SELECT name, rollno, degree, branch, email, phno, yop, dob, password FROM mainstudenttable WHERE yop='$year'";

    // Execute query
    $result = mysqli_query($conn, $query);

    // Check if query was successful
    if (!$result) {
        die("Error: " . mysqli_error($conn));
    }

    // Insert selected entries into alumni table
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['name'];
        $rollno = $row['rollno'];
        $degree = $row['degree'];
        $branch = $row['branch'];
        $email = $row['email'];
        $phno = $row['phno'];
        $yop = $row['yop'];
        $dob = $row['dob'];
        $password = $row['password'];

         $insertQuery = "INSERT INTO alumni (name, rollno, degree, branch, email, phno, yop, dob, password) VALUES ('$name', '$rollno', '$degree', '$branch', '$email', '$phno', '$yop', '$dob', '$password')";
         $insertResult = mysqli_query($conn, $insertQuery);
        $rollsel="select id from alumni where rollno = '$rollno'";
        $sqres=mysqli_query($conn,$rollsel);
        $row2 = mysqli_fetch_assoc($sqres);
        $id = $row2['id'];
        
        $finsql = "select * from studentjobs where sjroll = '$rollno'";
        $sqres2=mysqli_query($conn,$finsql);
        $row22 = mysqli_fetch_assoc($sqres2);
        $year = date('Y');
        if(mysqli_num_rows($sqres2)>0){
            $sec=$row22['sjsector'];
            $tit=$row22['sjtitle'];
            $loc=$row22['sjloc'];
            $comp=$row22['sjcompname'];

            $fin = "insert into alumnistatus(id,sector,title,location,startdate,enddate,company) values('$id','$sec','$tit','$loc','$year','PRESENT','$comp')";
            $sqres2=mysqli_query($conn,$fin);
            // Check if insert query was successful
            if (!$sqres2) {
                die("Error: " . mysqli_error($conn));
            }
        }
    }

    // Close database connection
    mysqli_close($conn);
}

if(isset($_POST["clear"])){
    require_once "config.php";
    // Create new connection to database
    $conn = mysqli_connect("localhost", "root", "Anudeep@2003", "dblab8");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $fin = "delete from jobs";
    $sqres2=mysqli_query($conn,$fin);

    $fin = "delete from studentapply";
    $sqres2=mysqli_query($conn,$fin);

    $fin = "delete from company";
    $sqres2=mysqli_query($conn,$fin);
    
    // Close database connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>

	<title>Alumni Form</title>
</head>
<body>
	<form method="post">
		<label for="year">Enter year to pass as alumni:</label>
		<input type="text" id="year" name="year">
		<input type="submit" value="Submit">
        <br>
        <label for="clear">Click here to start a new placement drive:</label>
		<input type="submit" value="Start" name="clear" id="clear">
	</form>
</body>
</html>
