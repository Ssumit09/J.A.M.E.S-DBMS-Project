<?php

  // Database connection parameters
  $servername = "localhost"; // Replace with your database server name
  $dbname = "James"; // Replace with your database name
  $username = "root"; // Replace with your database username
  $password = ""; // Replace with your database password

//   // Create a connection to the MySQL database
  $conn = new mysqli($servername, $username, $password, $dbname);

if($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form 
    // mysqli_real_escape_string  used to escape all special characters for use in an SQL query
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    
    $sql = "SELECT * FROM user WHERE username = '$myusername' and password = '$mypassword'";
    $result = mysqli_query($conn,$sql);
    // The mysqli_fetch_array() function is used to fetch rows from the database and store them as an array.
    
    $row = mysqli_fetch_array($result);
    // $active = $row['active'];
    
    $count = mysqli_num_rows($result);
    
    // If result matched $myusername and $mypassword, table row must be 1 row
      
    if($count >= 1) {
      $query = "SELECT Email FROM user WHERE username = '$myusername' AND password = '$mypassword'";
      $result = mysqli_query($conn, $query);
      
      if ($result) {
          // Query was successful
          $row = mysqli_fetch_assoc($result);
          if ($row) {
              // Fetched a row (email)
              $Email= $row['Email'];
          } else {
              // No rows were found
              echo "No results found";
          }
          // Free the result set
          mysqli_free_result($result);
      } else {
          // Query failed, print the error
          echo "Error: " . mysqli_error($conn);
      }
      
      


     
  
      // SQL query to insert data into the database
      $sql = "INSERT INTO user (username, Email, password) VALUES ('$myusername', '$Email', '$mypassword')";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Rentered');</script>";

        // echo "<script type='text/javascript'> document.location = '../form1.html';</script>";
    } else { 
        echo '<div class="alert alert-danger" role="alert">
        not entered
      </div>';
    }
      

       
       
       header("location: ../casestatus.php");
    }else {
        echo '<script>alert("Invalid Credentials");</script>';
        echo'<script>document.write("");
        window.open("../user_login.html", "_self");</script>';
    }
 }
 mysqli_close($conn);
?>