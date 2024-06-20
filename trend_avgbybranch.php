<!-- 7002 -->
<style>
input[type="submit"] {
  background-color: #000000;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 25px;
  box-shadow: 0px 3px 3px #888888;
  transition: background-color 0.3s ease-in-out;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}
</style>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get year input from form
    $year = $_POST['year'];
// Database connection details
require_once 'config.php';

// Create a connection to the database

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query the database to get the count of unique company names
$sql = "SELECT sjbranch, AVG(sjsalary) as avg_salary FROM studentjobs GROUP BY sjbranch";


// Execute the query and get the results
$result = $conn->query($sql);

// Create an array to store the company names and counts
$companies = array();
while ($row = $result->fetch_assoc()) {
  $companies[$row["sjbranch"]] = $row["avg_salary"];
}

// Close the database connection
$conn->close();

// Convert the company names and counts to arrays for Chart.js
$labels = array_keys($companies);
$data = array_values($companies);
}
// Plot the graph using Chart.js
// Include the Chart.js library in your HTML file
// (You can download it from https://www.chartjs.org/)
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="myChart"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?php echo json_encode($labels); ?>,
        datasets: [{
            label: 'Average CTC',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

</script>
<body>
<form method="post">
		<label for="year">Enter year to look for trends:</label>
		<input type="text" id="year" name="year">
		<input type="submit" value="Submit">
</body>