<?php 


// Database configuration
$servername = "localhost";
$username = "root";
$database = "James";
$password = "";
// Create a connection to the MySQL database
$conn = new mysqli($servername, $username, $password, $database);

	if (isset($_GET['id'])){ 

		// Store the value from get to a 
		// local variable "course_id" 
		$lawyer_id=$_GET['id']; 

		// SQL query that sets the status 
		// to 1 to indicate activation. 
		$sql="UPDATE `laywer` SET 
			`Status`=1 WHERE Id='$lawyer_id'"; 

		// Execute the query 
		mysqli_query($conn,$sql); 
	} 

	// Go back to course-page.php 
	header('location: ../gov_lawyer.php'); 
?>
