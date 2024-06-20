<?php
// Database configuration
$servername = "localhost";
$username = "root";
$database = "james";
$password = "";

// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function assignCaseToJudge($iid) {
    global $conn;

    // echo "<script>alert('One step success');</script>";


       // Check if the judge has less than 4 active cases
    $judgeLimitQuery = "SELECT j.id FROM judges j
    WHERE j.active_cases < 4
    ORDER BY j.active_cases ASC, j.id ASC
    LIMIT 1";

$judgeLimitResult = $conn->query($judgeLimitQuery);

if ($judgeLimitResult->num_rows > 0) {
$row = $judgeLimitResult->fetch_assoc();
        $judge_id = $row['id'];

        $conn->query("UPDATE judges SET Active_cases=Active_cases+1 WHERE Id=$judge_id");

        // Updated the query to use a parameterized statement
        $stmt = $conn->prepare("UPDATE regform1 SET assigned_judge_id=? WHERE id=?");
        $stmt->bind_param("ii", $judge_id, $iid);
        $stmt->execute();

        // $assigned_judge = $judge_id;
        echo "<script>alert('Case assigned to Judge');</script>";
    } else {
        echo "<script>alert('No judges available');</script>";
    }
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aadhar = $_POST['aadhar'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $number = $_POST['number'];
    $date = $_POST['date'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO regform1(aadhar, fname, mname, lname, mail, number, date, gender, address, address2, city, state, pin)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use a parameterized statement for the insert query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssss", $aadhar, $fname, $mname, $lname, $mail, $number, $date, $gender, $address, $address2, $city, $state, $pin);
    
    if ($stmt->execute()) {
        echo "<script>alert('Form Accepted. Press OK to go to the next page');</script>";

        // Use a parameterized statement to fetch id
        $sql2 = "SELECT id FROM regform1 WHERE aadhar = ?";
        $stmt = $conn->prepare($sql2);
        $stmt->bind_param("s", $aadhar);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            assignCaseToJudge($id);

            echo "<script type='text/javascript'> document.location = '../form2.html';</script>";
        } else {
            echo "<script>alert('Error fetching id');</script>";
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
        Registration unsuccessful please try again
      </div>';
    }
}

// Close the database connection
$conn->close();
?>
