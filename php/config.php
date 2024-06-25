<?php

// Database Configuration
define('DB_HOST', 'localhost');       // Database host (usually 'localhost' or '127.0.0.1')
define('DB_USER', 'root');       // Database username
define('DB_PASS', 'ojas123@mysql');       // Database password
define('DB_NAME', 'james');  // Database name

// Site Configuration
define('SITE_NAME', 'JAMES System'); // Name of the application or site
define('BASE_URL', 'http://localhost/james/'); // Base URL of the site

// Error Reporting (set to 0 for production)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Establish database connection
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
