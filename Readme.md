# JAMES (Judicial Administrative Management and Execution System)

JAMES is a comprehensive system designed to streamline the management and execution of judicial administrative tasks. The system enables easy management of judges, lawyers, and case details, facilitating efficient and transparent judicial processes.

## Table of Contents

- [Features](#features)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Usage](#usage)
- [Technology Stack](#technology-stack)
- [Contributing](#contributing)
- [License](#license)

## Features

- **User Management**: Add, update, and manage judges and lawyers.
- **Case Management**: Add, search, and manage case details.
- **Secure Login**: Authentication system for secure access.
- **Responsive Design**: User-friendly interface that works across devices.
- **Automated Alerts**: Notifications for important updates and deadlines.

## Project Structure

```
JAMES/
├── db.php                    # Database connection file
├── fetch_judges.php          # PHP script to fetch judges' data
├── gov_judges.php            # Judges management page
├── gov_lawyer.php            # Lawyers management page
├── index.html                # Home page
├── login.php                 # Login page
├── signup.php                # Signup page
├── search_cases.php          # Case search functionality
├── style.css                 # Stylesheet for the project
└── js/
    ├── main.js               # Main JavaScript file
    ├── jquery.min.js         # jQuery library
    └── datatables.min.js     # DataTables library
```

## Installation

### Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) or any other local server setup
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/)

### Steps

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/JAMES.git
   ```

2. **Start the Local Server**

   Ensure your XAMPP or any other local server is running.

3. **Import Database**

   - Open phpMyAdmin.
   - Create a new database named `James`.
   - Import the `James.sql` file into the database.

4. **Configure Database**

   Update the `db.php` file with your database credentials.

   ```php
   <?php
   $servername = "localhost";
   $username = "root";
   $database = "James";
   $password = "";

   $conn = new mysqli($servername, $username, $password, $database);

   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }
   ?>
   ```

5. **Run the Project**

   Open your browser and navigate to `http://localhost/JAMES`.

## Usage

- **Login**: Access the system by logging in with your credentials.
- **Dashboard**: View and manage judges, lawyers, and cases.
- **Add New Judge/Lawyer**: Use the respective forms to add new judges and lawyers.
- **Search Cases**: Search for cases using various filters.
- **View Details**: View detailed information about judges, lawyers, and cases.

## Technology Stack

- **Front-End**: HTML, CSS, JavaScript, Bootstrap, JSP
- **Back-End**: PHP, Java Spring Boot
- **Database**: MySQL
- **Tools**: Eclipse IDE, XAMPP

## Contributing

We welcome contributions to improve JAMES. To contribute, please follow these steps:

1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -m 'Add some feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Author

- **Ojas** - [LinkedIn](https://www.linkedin.com/in/ojas)