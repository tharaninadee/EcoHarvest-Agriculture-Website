<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products</title>
    <link rel="stylesheet" href="admin.css"> 
    <style>
    /* Styling for the form */
    form {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    form h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
    }
    form label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    form input[type="text"],
    form textarea {
        width: 750px;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        font-size: 16px;
    }
    form button[type="submit"] {
        background-color: #2bab2f;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    form button[type="submit"]:hover {
        background-color: #555;
    }
    .success-message {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #4CAF50; 
        color: white;
        text-align: center;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Add Services Products Dashboard</h1>
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
    <!-- Product Addition Form -->
    <form method="post" action="add_product.php">
        <h2>Add Crops</h2>
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>
        <label for="product_description">Product Description:</label>
        <textarea name="product_description" rows="4" required></textarea>
        <label for="product_category">Product Category:</label>
        <input type="text" name="product_category" required>
        <label for="image_path">Product Image (URL or file upload):</label>
        <input type="text" name="image_path" required>
        <button type="submit">Add Product</button>
    </form>

    <?php
    include('../db/db_connect.php');
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $productName = $_POST["product_name"];
        $productDescription = $_POST["product_description"];
        $productCategory = $_POST["product_category"];
        $imagePath = $_POST["image_path"];
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO products (product_name, product_description, product_category, image_path) VALUES ('$productName', '$productDescription', '$productCategory', '$imagePath')";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Execute SQL query
            if (mysqli_query($conn, $sql)) {
                echo '<div class="success-message">Product Successfully Added!</div>';
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
