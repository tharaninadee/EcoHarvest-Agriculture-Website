<?php
// Include the database connection file
require_once "db/db_connect.php"; 

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"]; 
    
    // SQL query to check user credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password' AND role = '$role'";
    
    // Execute the query
    $result = $conn->query($sql);

    // Check if there's exactly one matching user
    if ($result->num_rows == 1) {
        // Start a session
        session_start();
        
        // Store the username in the session
        $_SESSION["username"] = $username;
        
        // Redirect users based on their roles
        switch ($role) {
            case "admin":
                header("Location: admin/admin_panel.php");
                break;
            case "field-officer":
                header("Location: field-officer/field_officer.php");
                break;
            case "farmer":
                header("Location: farmer/farmer_panel.php");
                break;
        }
    } else {
        // Display an authentication failure message
        echo "Authentication failed. Please try again.";
    }
}
?>
