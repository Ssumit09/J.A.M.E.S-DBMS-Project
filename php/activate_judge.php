<?php
include('config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "UPDATE judges SET Status = '1' WHERE Id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../gov_judges.php');
    } else {
        echo "Failed to activate judge.";
    }
}
?>
