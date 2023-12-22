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
    //$id = $_POST["id"];
    $name = $_POST["username"];
    $pass= $_POST["password"];
    if($name=="admin" && $pass=="admin"){
        // header("gov_judges.php");
        echo '<script>alert("Login Successfully");</script>';
        echo'<script>document.write("");
        window.open("../gov_lawyer.php", "_self");</script>';
    }
    else{
        echo '<script>alert("Invalid Credentials");</script>';
        echo'<script>document.write("");
        window.open("../gov_login.html", "_self");</script>';
    }
}
?>