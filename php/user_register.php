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

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO user (username, Email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registered successfully');</script>";

        echo "<script type='text/javascript'> document.location = '../form1.html';</script>";
    } else { 
        echo '<div class="alert alert-danger" role="alert">
        Registeration unsuccessfull please try again
      </div>';
    }
}

// Close the database connection
$conn->close();
?>

