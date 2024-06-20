<!-- 3001 -->
<?php

require_once "config.php";

$id = $_GET['id'];
$rollno=$_GET['rollno'];
$title=$_GET['title'];
$sector=$_GET['sector'];

// Delete entry from studentapply table
$sql = "DELETE FROM studentapply WHERE id = '$id' and rollno='$rollno' and title='$title' and sector = '$sector'";
$result = mysqli_query($conn, $sql);

if ($result) {
  echo "Entry deleted successfully.";

} else {
  echo "Error deleting entry: " . mysqli_error($conn);
}
// header("Location: http://localhost:3000/");

mysqli_close($conn);

?>
