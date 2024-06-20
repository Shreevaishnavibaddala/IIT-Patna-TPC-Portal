<!-- 3000 -->
<?php
require_once "config.php";

session_start();
$rollno = $_SESSION['rollno'];
    if(isset($_SESSION['jobaccstu'])){


        echo "<div class='alert alert-success'>Congratulations on your new job</div>";
        unset($_SESSION['jobaccstu']);
    }
// change the roll numbers to session rollno
// Check if status is REJECT
$sql = "SELECT rollno, placement_status, sector, location, recent_job, recent_salary FROM sidestudenttable where rollno='$rollno'";


$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // If placement status is not null, print student data
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['placement_status']) {
            echo "<h2>Student Information</h2>";
            echo "Roll No: " . $row['rollno'] . "<br>";
            echo "Placement Status: " . $row['placement_status'] . "<br>";
            echo "Sector: " . $row['sector'] . "<br>";
            echo "Location: " . $row['location'] . "<br>";
            echo "Recent Job: " . $row['recent_job'] . "<br>";
            echo "Recent Salary: " . $row['recent_salary'] . "<br><br>";
        }
    }
} else {
    // If no data is found, print message
    echo "You are not employed currently";
}
$sql = "SELECT s.id, c.name, s.sector, s.title FROM studentapply s
        JOIN company c ON s.id = c.id
        WHERE s.status = 'REJECT' and s.rollno='$rollno'";
$result = mysqli_query($conn, $sql);
echo "COMPANIES REJECTED";
echo "<br>";
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Company Name: " . $row['name'] . "<br>";
        echo "Sector: " . $row['sector'] . "<br>";
        echo "Title: " . $row['title'] . "<br>";
        echo "<button onclick='deleteEntry(" . $row['id'] . ", \"" . '$rollno' . "\", \"" . $row['sector'] . "\", \"" . $row['title'] . "\", \"REJECT\")'>OK</button>";
    }
}

echo "<br>";
// Check if status is ACCEPT
echo "COMPANIES ACCEPTED";
echo "<br>";

$sql = "SELECT s.id, c.name, s.sector, s.title, s.rollno, s.salary, s.location FROM studentapply s
        JOIN company c ON s.id = c.id
        WHERE s.status = 'ACCEPT'and s.rollno='$rollno'";
        
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Company Name: " . $row['name'] . "<br>";
        echo "Sector: " . $row['sector'] . "<br>";
        echo "Title: " . $row['title'] . "<br>";
        echo "Salary: " . $row['salary'] . "<br>";
        echo "Location: " . $row['location'] . "<br>";
        echo "<button onclick='updateEntry(" . $row['id'] . ", \"" . '$rollno' . "\", \"" . $row['sector'] . "\", \"" . $row['title'] . "\",\"" . $row['salary'] . "\",\"" . $row['location'] . "\",\"" . $row['name'] . "\", \"ACCEPT\")'>ACCEPT</button>";
        echo "<button onclick='deleteEntry(" . $row['id'] . ", \"" . '$rollno' . "\", \"" . $row['sector'] . "\", \"" . $row['title'] . "\", \"REJECT\")'>REJECT</button>";
    }
}

mysqli_close($conn);
?>

<script>
function deleteEntry(id,rollno,sector,title,status) {
    if (confirm("Are you sure you want to delete this entry?")) {
        window.location.href = "http://localhost:3001/?id=" + id + "&rollno=" + rollno + "&sector=" + sector + "&title=" + title + "&status=" + status;
    }
}

function updateEntry(id, rollno, sector, title, salary, location, name, status) {
    if (confirm("Are you sure you want to accept this entry?")) {
        window.location.href = "http://localhost:3002/?id=" + id + "&rollno=" + rollno + "&sector=" + sector + "&title=" + title + "&salary=" + salary + "&location=" + location +"&name=" + name + "&status=" + status ;
    }
}
</script>
