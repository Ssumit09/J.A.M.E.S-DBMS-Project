<?php
include('config.php');

// Assume the judge is logged in and their ID is stored in the session
session_start();
$judge_id = $_SESSION['judge_id'];

// Fetch cases allocated to the judge
$query = "SELECT * FROM cases WHERE judge_id = '$judge_id'";
$result = mysqli_query($conn, $query);

$allocated_cases = [];
while ($row = mysqli_fetch_assoc($result)) {
    $allocated_cases[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- Include the above HTML code here -->
</html>
