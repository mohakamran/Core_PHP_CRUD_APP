-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 11:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadidates`
--

CREATE TABLE `cadidates` (
  `ID` int(11) NOT NULL,
  `Name` varchar(256) NOT NULL,
  `Age` int(11) NOT NULL,
  `Experience` int(11) NOT NULL,
  `Location` varchar(255) NOT NULL,
  `Expected_Salary` varchar(255) NOT NULL,
  `Resume` varchar(255) NOT NULL,
  `Status` varchar(300) NOT NULL,
  `Job_ID` int(11) NOT NULL,
  `candidate_phone` varchar(300) NOT NULL,
  `candidate_email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `id` int(11) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `Age` int(11) NOT NULL,
  `Designation` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Description` varchar(500) DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp`
--

INSERT INTO `emp` (`id`, `Full_Name`, `Age`, `Designation`, `Gender`, `Description`, `image_path`, `created_at`, `updated_at`) VALUES
(8, 'Syeda Kazmi', 23, 'Senior Software Engineer', 'female', '5 years of experience in web development, specializing in front-end technologies', 'uploads/photo-1573496359142-b8d87734a5a2.avif', '2023-08-19 14:41:38', '2023-08-19 14:41:38'),
(9, 'Sumaira Waheed', 27, 'Front End Engineer', 'female', '2 years of experience in web development, specializing in front-end technologies', 'uploads/premium_photo-1672691611576-1a914d4de610.avif', '2023-08-19 14:42:12', '2023-08-19 14:42:12'),
(10, 'Tania Basheer', 28, 'Laravel Developer', 'female', '1 year of experience in web development, specializing in laravel technologies', 'uploads/photo-1484863137850-59afcfe05386.avif', '2023-08-19 14:42:48', '2023-08-19 14:42:48'),
(11, 'Syed Haroon Shah', 33, 'MERN Stack Developer', 'male', '15 years of experience in web development, specializing in front-end technologies and back end technologies', 'uploads/photo-1560250097-0b93528c311a.avif', '2023-08-19 14:43:33', '2023-08-19 14:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `ID` int(11) NOT NULL,
  `Title` varchar(256) NOT NULL,
  `Age` int(11) NOT NULL,
  `Experience` int(11) NOT NULL,
  `Last_Date` date NOT NULL,
  `Job_Type` varchar(256) NOT NULL,
  `Job_Time` varchar(256) NOT NULL,
  `Job_Desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`ID`, `Title`, `Age`, `Experience`, `Last_Date`, `Job_Type`, `Job_Time`, `Job_Desc`) VALUES
(2, 'React JS Developer', 24, 1, '2023-09-15', 'Remote', '8PM-5AM (Night Shift)', 'Candidate must have BS degree and also must have 1 years minimum experience.'),
(3, 'Laravel Developer', 30, 3, '2023-09-21', 'On Site', '9AM-6PM (Morning Shift)', 'PHP Laravel developer must have 2 years of experience building PHP based Web Applications.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cadidates`
--
ALTER TABLE `cadidates`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Description` (`Description`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cadidates`
--
ALTER TABLE `cadidates`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
