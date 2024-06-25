<?php
include('config.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $joining = $_POST['joining'];
    $password = $_POST['password'];

    $query = "INSERT INTO judges (Name, Address, Email, Joining_Date, Password) VALUES ('$name', '$description', '$email', '$joining', '$password')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../gov_judges.php');
    } else {
        echo "Failed to add judge.";
    }
}
?>
