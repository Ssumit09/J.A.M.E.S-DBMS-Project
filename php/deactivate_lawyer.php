<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "UPDATE lawyers SET Status = '0' WHERE Id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../gov_lawyer.php');
    } else {
        echo "Failed to deactivate lawyer.";
    }
}
?>
