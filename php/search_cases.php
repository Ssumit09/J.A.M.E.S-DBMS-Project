<?php
// Database configuration
$servername = "localhost";
$username = "root";
$database = "James";
$password = "";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the database
$sql = "SELECT ID, Title, Description, pdf_dir FROM `search`";
$result = mysqli_query($conn, $sql);

// Fetch the data and store it in an array
$cases = [];
while ($row = mysqli_fetch_assoc($result)) {
    $cases[] = $row;
}

// Close the database connection
$conn->close();

// Return the data as JSON
echo json_encode($cases);
?>
