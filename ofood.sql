-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2022 at 07:44 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofood`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `created`) VALUES
(1, 'Javascript', 'javascript', '2022-03-16 11:23:03'),
(2, 'PHP', 'php', '2022-03-16 11:23:03'),
(3, 'Database', 'database', '2022-03-16 11:23:03'),
(4, 'ReactJS', 'reactjs', '2022-03-16 11:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `price` varchar(11) NOT NULL,
  `description` text NOT NULL,
  `img` text DEFAULT NULL,
  `category` int(11) NOT NULL,
  `instructor` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `slug`, `price`, `description`, `img`, `category`, `instructor`, `created`, `modified`) VALUES
(1, 'Learn JS: The Complete Javascript Programming Course', 'javascript-programming-course', '14500', 'Learn A-Z everything about Python, from the basics, to advanced topics like Python GUI, Python Data Analysis, and more!\r\nThis course includes:\r\n14 hours on-demand video\r\n1 article\r\n3 downloadable resources\r\nFull lifetime access\r\nAccess on mobile and TV\r\nCertificate of completion', 'javascript.jpg', 1, 1, '2022-03-16 11:33:57', '2022-03-16 11:37:31'),
(2, 'Learn MYSQL: The Complete Database Programming Course', 'database-programming', '8500', 'Learn A-Z everything about Python, from the basics, to advanced topics like Python GUI, Python Data Analysis, and more!\r\nThis course includes:\r\n14 hours on-demand video\r\n1 article\r\n3 downloadable resources\r\nFull lifetime access\r\nAccess on mobile and TV\r\nCertificate of completion', 'jsme.png', 2, 2, '2022-03-16 11:33:57', '2022-03-16 11:44:08'),
(3, 'Learn PHP: The Complete PHP Programming Course', 'learning-php', '14500', 'This is another description', 'javascript.jpg', 1, 2, '2022-03-16 11:49:28', '2022-03-16 11:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `role` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `role`, `created`) VALUES
(1, 'Clinton Eyituoyo', 'JavaScript Developer', '2022-03-16 11:36:39'),
(2, 'Emiko Tuoyo', 'PHP/Database Developer', '2022-03-16 11:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_paid` varchar(255) NOT NULL,
  `invoice` varchar(10) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `statuses_id` int(11) NOT NULL DEFAULT 1,
  `course_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `date_paid`, `invoice`, `amount`, `statuses_id`, `course_id`, `created`, `modified`) VALUES
(2, 1, '16-03-2022', 'ovrEIEBR', '8500', 1, 2, '2022-03-16 18:51:49', '2022-03-16 18:51:49'),
(3, 1, '16-03-2022', '66A57xy2', '8500', 1, 2, '2022-03-16 18:52:32', '2022-03-16 18:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `status`) VALUES
(1, 'Pending'),
(2, 'Approved'),
(3, 'shipped'),
(4, 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(16) NOT NULL,
  `password` text NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `forgetpasswordcode` text DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `mobile`, `password`, `city`, `state`, `address`, `forgetpasswordcode`, `created`, `modified`) VALUES
(1, 'Clinton Eyituoyo', 'clintoneyituoyos@gmail.com', '07061967265', '$2y$10$4Pgr8xdCRfON2TyE7v/2KO6i/ZdUiWk5xaEIJMGaAm3yV.kOSufMa', '', '', '', '', '2020-02-25 12:47:27', '2022-03-17 06:38:52'),
(2, 'Abiodun Okocha', 'abiodun@gmail.com', '08099052219', '$2y$10$AGu7V2e0Yo7DtRACd18pS.uIL3z9f3daprt17y8koViWqoLPM9o9a', 'Ajah', 'Lagos', '14 saliu street awoyaya', NULL, '2020-02-28 18:45:14', '2020-03-30 11:50:14'),
(3, 'Emiko clinton', 'clinton.e@agrorite.com', '08099052219', '$2y$10$ITambsoyxw.zuFVm.C554OE28hoKzBLoKx6jcEcaDBD65lfPVCJtu', 'Ikoyi', 'Lagos', '14 saliu street awoyaya', NULL, '2020-02-28 18:47:58', '2020-03-30 11:50:19'),
(5, 'Clinton Eyituoyo', 'clintoneyituoyo@gmail.org', '07061967265', '', 'Ibeju-lekki', 'Lagos', '14 saliu street awoyaya', NULL, '2020-07-23 11:04:37', '2020-07-23 11:04:37'),
(6, 'Clinton Eyituoyo', 'cetechclub@gmail.com', '07061967265', '', 'Ibeju-lekki', 'Lagos', '14 saliu street awoyaya', NULL, '2020-07-23 21:24:28', '2020-07-23 21:24:28'),
(8, 'Clinton Eyituoyo', 'clintoneyituoyo@gmail.com', '07061967265', '$2y$10$G.igWLpmVCcdzbx.WrTC/.UFwYGnD2I/7.VP5pFK04PJSXwzUHdQW', '', '', '', NULL, '2022-03-17 06:42:06', '2022-03-17 06:42:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
