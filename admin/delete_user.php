<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <link rel="stylesheet" href="admin.css"> 
    <style>
    section {
        margin: 20px auto;
        max-width: 400px;
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
    form input[type="text"] {
        width: 350px;
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
    h2 {
        margin-bottom: 20px;
        text-align: center;
    }
    </style>
</head>
<body>
<header>
    <h1>Welcome to Delete User Panel</h1>
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

<section>
    <h2>Delete User</h2>
    <?php
    include('../db/db_connect.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $user_id = $_POST["user_id"];

        $sql = "DELETE FROM users WHERE user_id = '$user_id'";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (mysqli_query($conn, $sql)) {
                echo '<div class="success-message">User Deleted successfully!</div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }
    ?>

    <form method="post" action="delete_user.php">
        <label for="user_id">User ID:</label>
        <input type="text" name="user_id" id="user_id" required><br><br>
            
        <button type="submit">Delete User</button>
    </form>
</section>

</body>
</html>
