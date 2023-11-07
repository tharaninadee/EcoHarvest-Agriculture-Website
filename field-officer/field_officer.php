<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Field Officer Panel</title>
    <link rel="stylesheet" href="field_officer.css">
    <style>
        body, h1, h2, table {
            margin: 0;
            padding: 0;
        }

        .queries {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }

        .queries h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
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
            background-color: #333;
            color: #fff;
        }

        .delete-link {
            color: #f00;
            text-decoration: none;
            font-weight: bold;
            margin-right: 10px;
        }

        .delete-link:hover {
            text-decoration: underline;
            color: #d00;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to Field Officer Panel</h1>
    </header>
    <nav>
        <ul>
            <li>
                <div class="left"><a href="../login.html">Back to Login</a></div>
            </li>
            <li><a href="field_officer.php">View Queries</a></li>
        </ul>
    </nav>

    <section class="queries">
        <?php
        include('../db/db_connect.php');
        session_start();

        // Delete a query if the 'query_id' is set in the URL
        if (isset($_GET['query_id'])) {
            $queryId = $_GET['query_id'];

            $queryId = mysqli_real_escape_string($conn, $queryId);

            $sql = "DELETE FROM farmer_queries WHERE query_id = '$queryId'";

            if (mysqli_query($conn, $sql)) {
                echo '<div class="success-message">Query Deleted successfully!</div>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }

        // Retrieve and display farmer queries
        $sql = "SELECT * FROM farmer_queries";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Farmers' Queries</h2>";
            echo "<table>";
            echo "<tr><th>Query ID</th><th>Farmer Name</th><th>Query Title</th><th>Email</th><th>Query Text</th><th>Query Submit Date</th><th>Action</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>{$row['query_id']}</td>";
                echo "<td>{$row['name']}</td>";
                echo "<td>{$row['query_name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['query_text']}</td>";
                echo "<td>{$row['query_date']}</td>";
                echo '<td><a class="delete-link" href="?query_id=' . $row['query_id'] . '">Delete</a></td>';
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h2>No queries found.</h2>";
        }

        mysqli_close($conn);
        ?>
    </section>
</body>
</html>
