<?php
//Database configuration
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
    //$id = $_POST["id"];
    $name = $_POST["name"];
    $address = $_POST["description"];
    $type = $_POST["type"];

    // SQL query to insert data into the database
    $sql = "INSERT INTO laywer (Name, Address, Type) VALUES ('$name', '$address', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Lawyer Added successfully');</script>";

       echo "<script type='text/javascript'> document.location = '../gov_lawyer.php';</script>";
    } else { 
        echo '<div class="alert alert-danger" role="alert">
        Registeration unsuccessfull please try again
      </div>';
    }
}

// Close the database connection
$conn->close();
?>

