<?php
// Connect to MySQL database
$host = 'localhost';
$user = 'root';
$pass = 'Anudeep@2003';
$dbname = 'dblab8';
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Check connection
if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

// Define default sort order
$order = 'ASC';

// Check if a sort order was selected
if (isset($_POST['sort_order'])) {
    $order = $_POST['sort_order'];
}

// Build SQL query
$sql = "SELECT * FROM jobs ORDER BY interdate $order";

// Execute query
$result = mysqli_query($conn, $sql);

// Check if any jobs were found
if (mysqli_num_rows($result) > 0) {
    // Output table of jobs
    echo '<table>';
    echo '<thead><tr><th>Title</th><th>Table</th></tr></thead>';
    echo '<tbody>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['title'] . '</td>';
        echo '<td>' . date('M j, Y', strtotime($row['interdate'])) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo 'No jobs found';
}

// Close database connection
mysqli_close($conn);
?>

<!-- HTML code for the form with the dropdown menu -->
<form method="post">
    <label for="sort_order">Sort by interview date:</label>
    <select name="sort_order" id="sort_order">
        <option value="ASC">Ascending</option>
        <option value="DESC">Descending</option>
    </select>
    <button type="submit">Sort</button>
</form>
