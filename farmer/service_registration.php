<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Registration</title>
    <link rel="stylesheet" href="farmer.css"> 

    <style>
    /* Styling for the form */
    form {
        margin: 20px auto;
        max-width: 600px;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    form h2 {
        font-size: 24px;
        margin-bottom: 20px;
        color: #333;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #333;
    }
    input[type="text"],
    input[type="email"],
    .radio-group label {
        display: block;
        width: 550px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }
    .radio-group label {
        display: inline-block;
        margin-right: 10px;
    }
    button[type="submit"] {
        background-color: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    button[type="submit"]:hover {
        background-color: #555;
    }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Farmer Panel</h1>
    </header>
    <nav>
        <ul>
            <li><div class="left"><a href="../login.html"> Back to Login </a></div></li>
            <li><a href="farmer_panel.php">Dashboard</a></li>
            <li><a href="service_registration.php">Service Registration</a></li>
        </ul>
    </nav>
    
    <!-- Service Registration Form -->
    <form method="post" action="service_registration.php">
        <h2>Service Registration</h2>
        <label for="name">Farmer Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="role">Services:</label>
        <div class="radio-group">
            <label>
                <input type="radio" name="service_type" value="Crops-Service" required> Crops-Service
            </label>
            <label>
                <input type="radio" name="service_type" value="Soil-Management" required> Soil-Management
            </label>
            <label>
                <input type="radio" name="service_type" value="Ecological-Farming" required> Ecological-Farming
            </label>
        </div>
        <button type="submit">Submit Registration</button>
    </form>

    <?php
    include('../db/db_connect.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $farmerName = $_POST["name"];
        $farmerEmail = $_POST["email"];
        $serviceType = $_POST["service_type"];

        // SQL query to insert data into the database
        $sql = "INSERT INTO service_registrations (name, email, service_type) VALUES ('$farmerName', '$farmerEmail', '$serviceType')";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Execute SQL query
            if (mysqli_query($conn, $sql)) {
                echo '<div class="success-message">Service Registration submitted successfully!</div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        // Close the database connection
        mysqli_close($conn);
    }
    ?>

</body>
</html>
