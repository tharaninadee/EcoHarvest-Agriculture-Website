<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Panel</title>
    <link rel="stylesheet" href="farmer.css"> 

    <style>
    /* Styling for the form */
    form {
        max-width: 600px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }
    input[type="text"],
    input[type="email"],
    textarea {
        width: 550px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }
    button[type="submit"] {
        background-color: #2bab2f;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    button[type="submit"]:hover {
        background-color: #25bf14;
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

    <!-- Query Form -->
    <form method="post" action="farmer_panel.php">
        <h2>Send a Query</h2>
        <label for="name">Farmer Name:</label>
        <input type="text" name="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="title">Query Title:</label>
        <input type="text" name="title" required>
        <label for="query_text">Query:</label>
        <textarea name="query_text" rows="4" required></textarea>
        <button type="submit">Submit Query</button>
    </form>

    <?php
    include('../db/db_connect.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $Name = $_POST["name"];
        $Email = $_POST["email"];
        $queryTitle = $_POST["title"];
        $queryText = $_POST["query_text"];
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO farmer_queries (name, email, query_name, query_text) VALUES ('$Name', '$Email', '$queryTitle', '$queryText')";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Execute SQL query
            if (mysqli_query($conn, $sql)) {
                echo '<div class="success-message">Query submitted successfully!</div>';
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
