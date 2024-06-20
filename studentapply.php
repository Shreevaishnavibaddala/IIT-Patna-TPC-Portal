<?php include 'config.php';
session_start();
$title = $_GET['title'];
$id = $_GET['id'];
echo $title;
echo $id;

$sql = "SELECT * FROM company
INNER JOIN jobs ON company.id = jobs.id
WHERE jobs.title = '$title' AND jobs.id = $id";
$cpi = $_SESSION['cpi'];

$result = mysqli_query($conn,$sql);
while ($row= mysqli_fetch_assoc($result)){
	$elcpi = $row['elcpi'];


	if ($cpi >= $elcpi){

		$sector = $row['sector'];
		$rollno = $_SESSION['rollno'];
		$salary = $row['salary'];
		$sql2 = "INSERT INTO studentapply (rollno,id,sector,title,salary) VALUES ('$rollno',$id,'$sector','$title','$salary')";
		$result2 = mysqli_query($conn,$sql2);
		echo $sql2;
		if ($result2){
			echo $sql2;
			$_SESSION['sucjobapply']='f';
			header ("Location: http://localhost:2009");
		}
	}
	else{
		$_SESSION['sucjobreject']='f';
		header ("Location: http://localhost:2009");
	}
}
 ?>
