<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Eco Harvest</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/header.css"> 
    <link rel="stylesheet" href="css/index.css"> 
    <link rel="stylesheet" href="css/styles.css"> 
    <style>
        .service-buttons {
            display: flex;
            justify-content: center; 
            align-items: center; 
            flex-wrap: wrap;
            margin-top: 30px; 
            margin-bottom: 50px;
        }
        .service-button {
            text-align: center;
            padding: 50px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 20px;
            text-decoration: none;
            color: #0cb511;
            background-color: #f5f5f5;
            font-size: 18px;
            height: 16rem;
        }
        .service-button img {
            max-width: 100%;
            height: auto;
        }

        .container h1 {
            text-align: center; 
            color: #0cb511; 
            margin-top: 20px; 
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <div class="container">
            <nav class="navbar navbar-light">
                <div class="container">
                    <a class="navbar-brand" href="index.html"><img src="images/EcoHarvestLogo.png" alt="Company Logo"></a>
                </div>
            </nav>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavMobile" aria-controls="navbarNavMobile" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarNavMobile">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blogpage.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html">Contact Us</a>
                    </li>
                </ul>
                <form action="search_process.php" method="GET" class="form-inline my-2 my-lg-0 ml-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                <div class="dropdown ml-3">
                    <button type="button" class="btn btn-success dropdown-toggle" id="extendedMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Menu
                    </button>
                    <div class="dropdown-menu" aria-labelledby="extendedMenu">
                        <a class="dropdown-item" href="login.html">Login</a>
                        <a class="dropdown-item" href="register.html">Be a Member</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="container">
    <h1>Our Services</h1>
    <div class="service-buttons">
        <a href="products.php" class="service-button">
            <img src="images/cropimage.jpg" alt="Crops">
            <br><br>
            Crops
        </a>
        <a href="soil-management.html" class="service-button">
            <img src="images/soilimage.jpg" alt="Soil Management">
            <br><br>
            Soil Management
        </a>
        <a href="ecological.html" class="service-button">
            <img src="images/ecoimage.jpg" alt="Ecological Farming">
            <br><br>
            Ecological Farming
        </a>
    </div>
</div>

<footer>
    <div class= "container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-logo">
                    <img src="images/EcoHarvestLogo.png" alt="Company Logo">
                </div>
                <p>At Eco Harvest, we're dedicated to sustainable farming and a greener future. Join us in nurturing the earth for generations to come.</p>
                <div class="social-media">
                    <a href="#"><img src="images/social1.jpg" alt="Facebook"></a>
                    <a href="#"><img src="images/social2.jpg" alt="Twitter"></a>
                    <a href="#"><img src="images/social3.png" alt="Instagram"></a>
                </div>
            </div>
           
            <div class="col-md-4">
                <h3>Useful Links</h3>
                <ul class="footer-links">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="blogpage.html">Blog</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="contactus.html">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Contact Us</h3>
                <p>Email: info.ecoharvest.lk</p>
                <p>Phone: (777) 456-7890</p><br>
                <p>Address: No 205/1, Jayamawatha, Malabe, Sri Lanka</p>
            </div>
        </div>
    </div>

    <div class="container">
        <p>&copy; 2023 Eco Harvest. All rights reserved.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
