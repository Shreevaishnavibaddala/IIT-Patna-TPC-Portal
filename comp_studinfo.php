<!-- 8301 -->

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

<?php

session_start();
require_once "config.php";
$rollno = $_GET["rollno"];
$mainQuery = "SELECT name, email, phno, branch, yop, degree, dob, 10thmarks, 12thmarks, sem1, sem2, sem3, sem4, sem5, sem6, sem7, sem8, cpi FROM mainstudenttable WHERE rollno='$rollno'";
$sideQuery = "SELECT resumelink FROM sidestudenttable WHERE rollno='$rollno'";

// Execute queries
$mainResult = mysqli_query($conn, $mainQuery);
$sideResult = mysqli_query($conn, $sideQuery);

// Check if queries were successful
if (!$mainResult || !$sideResult) {
    die("Error: " . mysqli_error($conn));
}

// Fetch data from queries
$mainData = mysqli_fetch_assoc($mainResult);
$sideData = mysqli_fetch_assoc($sideResult);

// Display student info and resume link
echo "<h2>Student Info</h2>";
echo "<p><strong>Name:</strong> " . $mainData['name'] . "</p>";
echo "<p><strong>Roll No:</strong> " . $rollno . "</p>";
echo "<p><strong>Email:</strong> " . $mainData['email'] . "</p>";
echo "<p><strong>Phone No:</strong> " . $mainData['phno'] . "</p>";
echo "<p><strong>Branch:</strong> " . $mainData['branch'] . "</p>";
echo "<p><strong>Year of Passing:</strong> " . $mainData['yop'] . "</p>";
echo "<p><strong>Degree:</strong> " . $mainData['degree'] . "</p>";
echo "<p><strong>Date of Birth:</strong> " . $mainData['dob'] . "</p>";
echo "<p><strong>10th Marks:</strong> " . $mainData['10thmarks'] . "</p>";
echo "<p><strong>12th Marks:</strong> " . $mainData['12thmarks'] . "</p>";
echo "<p><strong>Sem 1:</strong> " . $mainData['sem1'] . "</p>";
echo "<p><strong>Sem 2:</strong> " . $mainData['sem2'] . "</p>";
echo "<p><strong>Sem 3:</strong> " . $mainData['sem3'] . "</p>";
echo "<p><strong>Sem 4:</strong> " . $mainData['sem4'] . "</p>";
echo "<p><strong>Sem 5:</strong> " . $mainData['sem5'] . "</p>";
echo "<p><strong>Sem 6:</strong> " . $mainData['sem6'] . "</p>";
echo "<p><strong>Sem 7:</strong> " . $mainData['sem7'] . "</p>";
echo "<p><strong>Sem 8:</strong> " . $mainData['sem8'] . "</p>";
echo "<p><strong>CPI:</strong> " . $mainData['cpi'] . "</p>";
echo "<p><strong>Resume Link:</strong> " . $sideData['resumelink'] . "</p>";





?>