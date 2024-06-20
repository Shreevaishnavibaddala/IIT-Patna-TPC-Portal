<!-- 8550 -->
<div class="form-btn">
                <input type="home"  value="Home Page" name="home" class="submit-button">
            </div>
	<?php
		 if (isset($_POST["home"])) {
			header("Location: http://localhost:8100/");
		}
	?>
<?php
require_once "config.php";
session_start();
$title = $_GET["title"];
$sector = $_GET["sector"];
$rollno = $_GET["rollno"];


$id = $_SESSION['id'];
$id=intval($id);

$sql = "SELECT locations, salary FROM jobs WHERE id = '$id' AND title = '$title' AND sector = '$sector'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$location = $row['locations'];
$salary = $row['salary'];

?>

<form method="post" action="">
    <label for="location">Location:</label>
    <input type="text" name="location" id="location"><br>
    <label for="salary">Salary:</label>
    <input type="number" name="salary" id="salary" min="0" step=".01"><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if(isset($_POST["submit"])) {
    $location_input = $_POST["location"];
    $salary_input = $_POST["salary"];
    $sql2 = "SELECT name FROM company WHERE id = '$id' ";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$name = $row2['name'];

if (!(preg_match("/$location_input/i", $location))) {
    echo "Location does not match the locations given";
}
else if( $salary_input<$salary){
    echo "Salary should be greater than base salary";
}
else{
$sql2 = "update studentapply set   location = '$location_input', status='ACCEPT', salary = '$salary_input' where rollno='$rollno' and id=$id and sector='$sector' and title='$title'";
$result2 = mysqli_query($conn, $sql2);
header("Location: http://localhost:8500/");

if ($result2) {
    echo " inserted ";
} else {
    echo "Error: " ;
}
}}

mysqli_close($conn);
?>
<p>Locations registered: <?php echo $location; ?></p>
<p>Base Salary: <?php echo $salary; ?></p>
