<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link rel="stylesheet" href="admin.css"> 
    <style>
    /* Styling for the form */
    section {
        margin: 20px auto;
        max-width: 600px; 
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    form input[type="text"],
    form input[type="email"],
    form input[type="date"] {
        width: 550px; 
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }
    form button {
        background-color: #2bab2f;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    form button:hover {
        background-color: #555;
    }
    /* Centered heading */
    h2 {
        text-align: center;
    }
    /* Styling for the radio group */
    .radio-group {
        display: flex;
        flex-direction: column; 
    }
    .radio-group label {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    .radio-group input[type="radio"] {
        margin-right: 5px;
    }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Add User Panel</h1>
    </header>
    <nav>
        <ul>
            <li><div class="left"><a href="../login.html"> Back to Login </a></div></li>
            <li><a href="admin_panel.php">Dashboard</a></li>
            <li><a href="add_user.php">Add Users</a></li>
            <li><a href="delete_user.php">Delete Users</a></li>
            <li><a href="view_products.php">View Services Products</a></li>
            <li><a href="add_product.php">Add Services Products</a></li>
        </ul>
    </nav>
    <!-- Add Users Form -->
    <section>
        <h2>Add User</h2>
        <?php
        include('../db/db_connect.php');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $name = $_POST["name"];
            $email = $_POST["email"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $location = $_POST["location"];
            $role = $_POST["role"];

            // SQL query to insert data into the database
            $sql = "INSERT INTO users (name, email, username, location, role) VALUES ('$name', '$email', '$username', '$location', '$role')";

            if (mysqli_query($conn, $sql)) {
                // User has been added successfully
                header("Location: admin_panel.php"); 
                exit();
            } else {
                // There was an error inserting the user
                echo "Error: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        ?>
        <form method="post" action="add_user.php">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br><br>
            
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required><br><br>
            
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br><br>

            <label for="password">Password:</label>
            <input type="text" name="password" id="password" required><br><br>
            
            <label for="location">Location:</label>
            <input type="text" name="location" id="location"><br><br>
            
            <label for="role">Role:</label>
            <div class="radio-group">
                <label>
                    <input type="radio" name="role" value="Admin"> Admin
                </label>
                <label>
                    <input type="radio" name="role" value="Farmer"> Farmer
                </label>
                <label>
                    <input type="radio" name="role" value="Field-Officer"> Field Officer
                </label>
            </div>
            <button type="submit">Add User</button>
        </form>
    </section>
</body>
</html>
