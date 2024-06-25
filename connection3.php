<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Typewriter: See Case Updates</title>
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
              <h2>See Case Hearings Update </h2>
              <p>Here, you can see the all the updates that you've entered for the client.</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Typewriter Section: Updated Case Status</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->

    <div style="width:70%; margin: 0 auto;"><br><hr>
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

      // Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $aadhar=$_POST['aadhar'];
  $fname=$_POST['fname'];
  $mname=$_POST['mname'];
  $lname=$_POST['lname'];
  $date1=$_POST['date1'];
  $date2=$_POST['date2'];
  $descript=$_POST['descript'];
  $verdict=$_POST['verdict'];

  // SQL query to insert data into the database
  $sql = "insert into typewriter(aadhar, fname, mname, lname, date1, date2, descript, verdict) VALUES ('$aadhar', '$fname', '$mname', '$lname', '$date1', '$date2', '$descript', '$verdict')";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Form Accepted. Press OK to goto Client Case Status page');</script>";

      // echo "<script type='text/javascript'> document.location = 'connection3.php';</script>";
  } else { 
      echo '<div class="alert alert-danger" role="alert">
      Registeration unsuccessful please try again
    </div>';
  }
}

// Close the database connection
// $conn->close();

      $query="select * from typewriter";
      $result=mysqli_query($conn, $query);
      while($row=mysqli_fetch_assoc($result))
      {
        ?>
        <tr>
          <td><b><?php echo $row['id']?></b></td>
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

      }
      $conn->close();


      ?>
      </table >
    </div>

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
