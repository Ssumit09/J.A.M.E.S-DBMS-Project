<?php
include('config.php');

if (isset($_POST['case_id']) && isset($_POST['first_hearing_date'])) {
    $case_id = $_POST['case_id'];
    $first_hearing_date = $_POST['first_hearing_date'];

    $query = "UPDATE cases SET first_hearing_date = '$first_hearing_date' WHERE case_id = '$case_id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header('Location: ../judge_cases.php');
    } else {
        echo "Failed to set hearing date.";
    }
}
?>
