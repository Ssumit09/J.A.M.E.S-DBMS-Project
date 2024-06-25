<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Typewriter Section</title>
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
              <h2>Update Case Hearings & Enter Public Updates</h2>
              <p>Here, you can see all the Client Lists, Update Case Hearing Description and Hearing Date for all cases and also add General Case Info for public</p>
            </div>
          </div>
        </div>
      </div>
      <nav>
        <div class="container">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Typewriter Section: See Client List, Update Case Info & enter Public Updates</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Breadcrumbs -->


    <div style="width:70%; margin: 0 auto;"><br><hr>
    <h1 align="center">Client List</h1><hr>
    <table class="table" id="myTable">
      <tr>
        <th>S.No</th>
        <th>Aadhar No.</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>Last Name</th>
        <th>Photo</th>
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

      $query="select rf1.id, rf1.aadhar, rf1.fname, rf1.mname, rf1.lname, rf2.img_dir from regform1 rf1, regform2 rf2 where rf1.id=rf2.id";
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
          <td><?php echo "<img src='{$row['img_dir']}' height='75px' width='75px'>"?></td>
      </tr>
      

      <?php

      }
      ?>
      </table >
    </div>

   <!-- update case details -->
   <section class="container1">
      <header>
         Enter Case Update

      </header><hr>

      <form action="connection3.php" method="POST" class="form">
        <div class="input-box">
            <label>Client's lAadhar Card Number</label>
            <input class="validity" type="text" placeholder="Enter client's Aadhar number (12 digits)" name="aadhar" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" title="Please enter in this format: 1234-1234-1234" required />
            <div><label class="label1">format: XXXX-XXXX-XXXX</label></div>
          </div>
        
        <div class="column">
            <div class="input-box">
              <label>Client's Full Name</label>
                <div class="a"><input class="validity" type="text" placeholder="Enter first name" name="fname" required /></div>
                <div><label class="label1">first name</label></div>
            </div>

            <div class="input-box">
              <label></label>
                <div class="a"><input type="text" class="validity1" placeholder="Enter middle name" name="mname" /></div>
                <div><label class="label1">middle name</label></div>
            </div>

            <div class="input-box">
              <label></label>
                <div class="a"><input class="validity" type="text" placeholder="Enter last name" name="lname" required /></div>
                <div><label class="label1">last name</label></div>
              </div>
          </div>
          <div class="column"">
            <div class="input-box">
              <label>Current Hearing Case</label>
              <input class="validity1" type="date" name="date1" title="Please select a date" max=""/>
              <div><label class="label1">cannot be a future date</label></div>
            </div>
            <div class="input-box">
              <label>Next Hearing Date</label>
              <input class="validity1" type="date" name="date2" title="Please select a date"/>
              <div><label class="label1">cannot be a past date</label></div>
            </div>
          </div>
          
        
        <div class="input-box">
          <label>Update On Case(Description)</label>
          <textarea style="border-radius:5px;" name="descript" cols="81" rows="4" placeholder="   Add description on court arguments" required></textarea>
        </div>
        <div class="input-box">
          <label>Final Verdict</label>
          <input type="text" class="validity1" placeholder="Final Verdict (optional)" name="verdict"/>
        </div>

        <button type="submit">Update </button> 

      </form>
    </section>



      <!-- Connection for public updates -->
  <?php
// Connection to MySQL 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "james";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $Title = $_POST["Title"];
    $Description = $_POST["Description"];
    // $Pdf = $_POST["pdf"];

    // PDF handling 
    $Pdf = $_FILES["Pdff"]["name"];
    $targetDir = "PDF/";
    $targetPath = $targetDir . $Pdf;
    move_uploaded_file($_FILES["Pdff"]["tmp_name"], $targetPath);
    
    

    // SQL query to insert data into the database
    $sql = "INSERT INTO search (Title, Description, Pdf, pdf_dir)
            VALUES ('$Title', '$Description', '$Pdf', '$targetPath')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Public updates Form Accepted. Press OK to Continue!');</script>";

        // echo "<script type='text/javascript'> document.location = 'user_login.html';</script>";
    } else { 
        echo '<div class="alert alert-danger" role="alert">
       Data Upload Unsuccessful please try again
      </div>';
    }
}

// Close the MySQL connection
$conn->close();
?>


    
      

    <section class="container1">
      <header>
         Enter Updates for Public

      </header><hr>

      <form action="typewriter.php" method="POST" class="form" enctype="multipart/form-data">
            <div class="input-box">
              <label>Enter Case Title</label>
                <div class="a"><input class="validity" type="text" placeholder="Enter Suitable Title" name="Title" required /></div>
                <!-- <div><label class="label1">first nam</label></div> -->
            </div>

            <div class="input-box">
              <label>Enter Case Description</label>
                <div class="a"><input type="text" class="validity" placeholder="Enter Short Description" name="Description" required/></div>
                <!-- <div><label class="label1">middle name</label></div> -->
            </div>

            <br><label><h5>Upload PDF: &nbsp &nbsp &nbsp</h5></label>
          <input name="Pdff" type="file" class="validity" required>

            
        <button type="submit">Add Case Details</button> 

      </form>
    </section>
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
  <script>
    var today = new Date().toISOString().split('T')[0];
    document.getElementById("date-input").setAttribute("max",today);
  </script>

</body>

</html>
