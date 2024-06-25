<?php
include('config.php');

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];

    $query = "INSERT INTO lawyers (Name, Address, Type) VALUES ('$name', '$description', '$type')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../gov_lawyer.php');
    } else {
        echo "Failed to add lawyer.";
    }
}
?>
