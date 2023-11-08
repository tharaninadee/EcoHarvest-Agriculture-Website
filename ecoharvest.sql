-- Create a database to your preference


-- --------------------------------------------------------

-- Table structure for table `farmer_queries`
--

CREATE TABLE `farmer_queries` (
  `query_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `query_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `query_text` text NOT NULL,
  `query_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmer_queries`
--

INSERT INTO `farmer_queries` (`query_id`, `name`, `query_name`, `email`, `query_text`, `query_date`) VALUES
(7, 'Farmer1', 'About Organic farming', 'farmer@gmail.com', 'Which fertilizer is best to use?', '2023-10-10 17:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` text DEFAULT NULL,
  `product_category` enum('Vegetables','Fruits','Condiments','Grains','Flowers') NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_description`, `product_category`, `image_path`) VALUES
(1, 'Narang Plant', 'Sri Lankan Narang Plant. Ideal for your home garden. Grows delicious Narang fruits. This plant is known for its vibrant green leaves and aromatic fruit.', 'Fruits', 'images/products/chinesenarang.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `service_registrations`
--

CREATE TABLE `service_registrations` (
  `registration_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service_type` enum('Crops-Service','Soil-Management','Ecological-Farming') NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_registrations`
--

INSERT INTO `service_registrations` (`registration_id`, `name`, `email`, `service_type`, `registration_date`) VALUES
(1, 'Farmer Colombo', 'farmercolombo@gmail.com', 'Crops-Service', '2023-10-09 10:29:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `role` enum('admin','field-officer','farmer') NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `password`, `location`, `role`, `registration_date`) VALUES
(1, 'Admin Colombo', 'admin.ecoharvest.lk', 'admin1', 'admin1123', 'Colombo', 'admin', '');

--
