<?php
$username = "root"; // Replace with your MySQL username
$password = "root"; // Replace with your MySQL password
$dbname = "jobseekers";
$servername = "mysql_db";  // Use the hostname set in the docker-compose.yml
$port = 3306;  // MySQL port number

// Create a connection to the MySQL server without specifying a database
$conn = new mysqli($servername, $username, $password, '', $port);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the "jobseekers" database
$conn->select_db($dbname);

// Query to retrieve data from the "personal_info" table
$query = "SELECT title, name, gender, dateofbirth FROM personal_info";

$result = $conn->query($query);

if ($result->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; border: 1px solid black;'>";
    echo "<tr><th colspan='4'><h1>Job Seekers</h1></th></tr>";
    echo "<tr><th>Title</th><th>Name</th><th>Gender</th><th>Date of Birth</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["title"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["dateofbirth"] . "</td>";
        echo "</tr>";
    }
    echo "</tr>";
} else {
    echo "No records found.";
}

// Close the database connection
$conn->close();
?>
