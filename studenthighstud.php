<?php
include 'config.php';
session_start();
if (isset($_POST['update'])) {
    $college_name = $_POST['college_name'];
    $degree = $_POST['degree'];
    $subject = $_POST['subject'];
    $rollno = "$_SESSION['rollno']"; // example , replace with your own variable or input field

    // prepare and execute update query
    $sql = "UPDATE sidestudenttable SET college_name=?, degree=?, subject=? WHERE rollno =?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $college_name, $degree, $subject, $rollno);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "Values updated successfully.";
    } else {
        echo "No values were updated.";
    }

    mysqli_stmt_close($stmt);
}

// $sql = "UPDATE studentjobs SET sjcompname=?, sjsectoe=?, title=? WHERE rollno =?";
// $stmt = mysqli_prepare($conn, $sql);
// mysqli_stmt_bind_param($stmt, "ssss", $college_name, $degree, $subject, $rollno);
// mysqli_stmt_execute($stmt);
//
// if (mysqli_stmt_affected_rows($stmt) > 0) {
//     echo "Values updated successfully.";
// } else {
//     echo "No values were updated.";
// }

mysqli_stmt_close($stmt);
}

?>

<!-- HTML form to accept input values -->
<form method="post">
    <label for="college_name">College Name:</label>
    <input type="text" id="college_name" name="college_name"><br>

    <label for="degree">Degree:</label>
    <select id="degree" name="degree">
        <option value="MTECH">MTECH</option>
        <option value="MSC">MSC</option>
        <option value="PHD">PHD</option>
        <option value="MBA">MBA</option>
    </select><br>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject"><br>

    <input type="submit" name="update" value="Update">
</form>
