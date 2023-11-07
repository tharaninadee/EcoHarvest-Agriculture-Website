<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <link rel="stylesheet" href="admin.css"> 
    <style>
    section {
        max-width: 900px; 
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
    }
    section h2 {
        font-size: 24px;
        margin-bottom: 10px;
        color: #333;
        text-align: center;
    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    input[type="text"] {
        width: 850px;
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
        background-color: #555;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    table, th, td {
        border: 1px solid #ccc;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #2bab2f;
        color: #fff;
    }
    .no-products {
        margin-top: 20px;
        color: #333;
        font-size: 18px;
    }
    .product-image {
        max-width: 100%; 
        height: 100px; 
    }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to View Products Dashboard</h1>
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
    
    <!-- Product Search Form -->
    <section>
        <h2>Product Search</h2>
        <form method="post" action="">
            <label for="search">Search Product:</label>
            <input type="text" name="search" id="search" placeholder="Enter product name">
            <button type="submit">Search</button>
        </form>
    </section>
    <section>
        <h2>Product List</h2>
        <?php
        include('../db/db_connect.php');
        $search = '';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search = $_POST["search"];
        }
        $sql = "SELECT * FROM products";

        if (!empty($search)) {
            $sql .= " WHERE product_name LIKE '%$search%'";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Product ID</th><th>Product Name</th><th>Product Description</th><th>Product Category</th><th>Product Image</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['product_id']}</td>";
                echo "<td>{$row['product_name']}</td>";
                echo "<td>{$row['product_description']}</td>";
                echo "<td>{$row['product_category']}</td>";
                echo '<td><img class="product-image" src="../' . $row['image_path'] . '" alt="' . $row['product_name'] . '"></td>';
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No products found.";
        }
        mysqli_close($conn);
        ?>
    </section>
</body>
</html>
