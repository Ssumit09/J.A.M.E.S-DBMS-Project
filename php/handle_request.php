<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $request_id = $_POST['request_id'];
  $action = $_POST['action'];

  if ($action == 'accept') {
    // Move the request to active cases
    $query = "INSERT INTO active_cases (lawyer_id, case_type, client_email, next_date)
              SELECT lawyer_id, case_type, client_email, NOW() + INTERVAL 1 MONTH
              FROM client_requests WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $request_id);
    $stmt->execute();
  }

  // Delete the request regardless of the action
  $query = "DELETE FROM client_requests WHERE id = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("i", $request_id);
  $stmt->execute();
  
  $stmt->close();
  $conn->close();

  header("Location: ../lawyer_dashboard.html");
  exit();
}
?>
