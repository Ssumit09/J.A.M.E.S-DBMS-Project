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


if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    // mysqli_real_escape_string  used to escape all special characters for use in an SQL query
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT * FROM judges WHERE Name = '$myusername' and Password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    // The mysqli_fetch_array() function is used to fetch rows from the database and store them as an array.
    
    $row = mysqli_fetch_array($result);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count == 1) {
       header("location: ../judgeLoggedIn.html");
    }else {
        echo '<script>alert("Invalid Credentials");</script>';
        echo'<script>document.write("");
        window.open("../judge_login.html", "_self");</script>';
    }
 }

?>