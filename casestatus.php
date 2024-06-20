<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>User Login: View Status</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>James</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="contact.html">About</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->



    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="page-header d-flex align-items-center" style="background-image: url('assets/img/page-header.jpg');">
        <div class="container position-relative">
          <div class="row d-flex justify-content-center">
            <div class="col-lg-6 text-center"><br><br><br>
              <h2>View Case Status</h2>
              <p>Dear Client, here you can see all your case updates, including court arguments for each hearing and the date for the next court hearing. Also, the final verdict of your case will be displayed here.<br>Note: The verdict will be only displayed after the final hearing. </p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>User Dashboard: View Case Status</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->



    


    
    
    <?php
          session_start(); // Start the session (should be at the top of your PHP script)

          if (isset($_SESSION['username'])) {
              $username = $_SESSION['username'];
              // Now $username contains the logged-in user's username
          } else {
              // Redirect or handle the case where the user is not logged in
          }
          
        //   echo $username;
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





// Query to get the last entry based on the primary key
$query = "SELECT email FROM user ORDER BY id DESC LIMIT 1";

// Execute the query
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the row
    $row = $result->fetch_assoc();
    // Now $row contains the last entry in the table


    // print_r($row);

    // Close the result set
    $result->close();
} else {
    // Handle the case where the query failed
    echo "Error: " . $conn->error;
}

// mysqli_free_result($result);






// -- Get the last value from table1
$query = "SELECT email FROM user ORDER BY id DESC LIMIT 1";
$result = $conn->query($query);

// Check if the query was successful
if ($result) {
    // Fetch the result into an associative array
    $row = $result->fetch_assoc();

    // Check if there is a result
    if ($row) {
        // Access the email value and store it in the $mail variable
        $mail = $row['email'];

        // Output the result
        // echo "Last email: " . $mail;
    } else {
        echo "No result found.";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

//print hello user
$query1 = "SELECT tw.aadhar, tw.fname, tw.mname, tw.lname, tw.date1, tw.date2, tw.descript, tw.verdict
          FROM typewriter tw, regform1
          WHERE '$mail' = regform1.mail AND regform1.aadhar = tw.aadhar";

// Execute the query
$result1 = mysqli_query($conn, $query1);

// Check if the query was successful
if ($result1) {

    // Fetch data from the result set
    while ($row = mysqli_fetch_assoc($result1)) {
        // Concatenate the first name, middle name, and last name
        $fullName = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];

        // Print the full name
        
    }

    // Free the result set
    mysqli_free_result($result1);
}

?>
 
 <div style="width:70%; margin: 0 auto;"><br>

    <h2><?php echo "Hello, $fullName";?></h2><br><hr>

    <h1 align="center">Case Status</h1><hr>
    <table class="table" id="myTable">
      <tr>
        <th>S.No</th>
        <th>Aadhar No.</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Current Hearing Date</th>
        <th>Next Hearing Date</th>
        <th>Case Update</th>
        <th>Final Verdict</th>
      </tr>
 <?php






// $query2 = "select tw.id, tw.aadhar, tw.fname, tw.mname, tw.lname, tw.date1, tw.date2, tw.descript, tw.verdict from typewriter tw, regform1 rf, user u where u.Email = '$lastValue

$id=1;

      $query="select tw.aadhar, tw.fname, tw.mname, tw.lname, tw.date1, tw.date2, tw.descript, tw.verdict from typewriter tw,regform1 where '$mail'=regform1.mail && regform1.aadhar= tw.aadhar";
      $result=mysqli_query($conn, $query);
      while($row=mysqli_fetch_assoc($result))
      {
        ?>
        <tr>
          <td><b><?php echo $id?></b></td>
          <td><?php echo $row['aadhar']?></td>
          <td><?php echo $row['fname']?></td>
          <td><?php echo $row['mname']?></td>
          <td><?php echo $row['lname']?></td>
          <td><?php echo $row['date1']?></td>
          <td><?php echo $row['date2']?></td>
          <td><?php echo $row['descript']?></td>
          <td><?php echo $row['verdict']?></td>
          
      </tr>
      

      <?php
      $id++;

      }
      $conn->close();


      ?>
      </table >
    </div>









<br>
   <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span>James</span>
          </a>
          <p>J.A.M.E.S stands as a comprehensive and technologically advanced web application designed to serve the diverse needs of three key stakeholders: clients, judges, and government administrators.</p>
          <div class="social-links d-flex mt-4">
            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>Amrita Hostel<br><br>
            <strong>Phone:</strong> +91 1234567890<br>
            <strong>Email:</strong> info@example.com<br>
          </p>

        </div>

      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>James</span></strong>. All Rights Reserved
      </div>
    </div>

  </footer><!-- End Footer -->
  <!-- End Footer -->

  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  

</body>

</html>
