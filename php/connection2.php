<?php
// Connection to MySQL (replace with your actual database credentials)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "james";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $type = $_POST["type"];
    $name = $_POST["name"];
    $date = $_POST["date"];
    $firid = $_POST["firid"];

    // Image1 handling 
    $image1 = $_FILES["image1"]["name"];
    $targetDir = "image/";
    $targetPath = $targetDir . $image1;
    move_uploaded_file($_FILES["image1"]["tmp_name"], $targetPath);

    // Image2 handling 
    $image2 = $_FILES["image2"]["name"];
    $targetPath2 = $targetDir . $image2;
    move_uploaded_file($_FILES["image2"]["tmp_name"], $targetPath2);

    // SQL query to insert data into the database
    $sql = "INSERT INTO regform2 (type, name, date, image1, img_dir, firid, image2)
            VALUES ('$type', '$name', '$date', '$image1', '$targetPath', '$firid', '$image2')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Form Accepted. Press OK to goto Login page');</script>";

        echo "<script type='text/javascript'> document.location = '../user_login.html';</script>";
    } else { 
        echo '<div class="alert alert-danger" role="alert">
        Registeration unsuccessful please try again
      </div>';
    }
}

// Close the MySQL connection
$conn->close();
?>