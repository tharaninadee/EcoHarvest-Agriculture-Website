<?php
include('../db/db_connect.php');
session_start();

// Query to retrieve user data (excluding the password)
$sql = "SELECT user_id, name, email, username, location, role, registration_date FROM users";

// Execute the query
$result = mysqli_query($conn, $sql);

// Fetch user data into an array
$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="admin.css"> 

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Admin Panel</h1>
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
    <section id="dashboard">
        <h2>User Table</h2>
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Location</th>
                    <th>Role</th>
                    <th>Registration Date</th>
                </tr>
            </thead>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['user_id']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['location']; ?></td>
                    <td><?php echo $user['role']; ?></td>
                    <td><?php echo $user['registration_date']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</body>
</html>
