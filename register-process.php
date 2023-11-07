<?php
// Include the database connection file
include 'db/db_connect.php';

// Check if the form has been submitted (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve user input data from the form
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $location = $_POST["location"];
    $role = $_POST["role"]; 

    // Check if the username is already taken
    $checkUsernameQuery = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($checkUsernameQuery);

    if ($result->num_rows > 0) {
        // Username is already taken
        echo "Username already taken. Please choose another.";
    } else {
        // Insert a new user into the database
        $insertUserQuery = "INSERT INTO users (name, username, password, email, location, role) VALUES ('$name', '$username', '$password', '$email', '$location', '$role')";
        
        if ($conn->query($insertUserQuery) === TRUE) {
            // Redirect to the login page after successful registration
            header("Location: login.html"); 
            exit();
        } else {
            // Registration failed
            echo "Registration failed. Please try again later.";
        }
    }
}
?>
