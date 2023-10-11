<?php
$username = "root"; 
$password = "root"; 
$dbname = "jobseekers";
$servername = "mysql_db";  
$port = 3306;  
$conn = new mysqli($servername, $username, $password, '', $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully.<br>";

$query = "CREATE DATABASE IF NOT EXISTS jobseekers";
if ($conn->query($query) === TRUE) {
    echo "Database 'jobseekers' created successfully.<br>";
} else {
    echo "Error creating database: " . $conn->error . "<br>";
}

$conn->select_db($dbname);

$query = "CREATE TABLE IF NOT EXISTS personal_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    dateofbirth DATE
)";

if ($conn->query($query) === TRUE) {
    echo "Table 'personal_info' created successfully.<br>";
} else {
    echo "Error creating table: " . $conn->error . "<br>";
}

$insertData = [
    ['Ms', 'K. Sedara', 'F', '1980-11-02'],
    ['Mr.', 'S. Alwis', 'M', '1969-03-03'],
    ['Prof.', 'A. Perera', 'F', '1982-04-14']
];

foreach ($insertData as $data) {
    $title = $data[0];
    $name = $data[1];
    $gender = $data[2];
    $dateofbirth = $data[3];

    $query = "INSERT INTO personal_info (title, name, gender, dateofbirth) VALUES ('$title', '$name','$gender', '$dateofbirth')";
    if ($conn->query($query) === TRUE) {
        echo "Data inserted successfully.<br>";
    } else {
        echo "Error inserting data: " . $conn->error . "<br>";
    }
}


$conn->close();
?>
<a href="display.php">View Job Seekers</a>

