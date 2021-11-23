-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 08:16 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_post` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `title_post` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `msg_post` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `f_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `avatar`, `email`, `password`, `status`) VALUES
(1, 'thanat', '', 'https://lh3.googleusercontent.com/a-/AOh14GjQxFZb6xnE7OQa-Zm6zRKVtPoCB7keO4IdLiQLzA=s96-c', 'thanat.chay100@gmail.com', 'ya29.a0ARrdaM9Kno785-bbmlK5RePglpFRCTo4x1dxd7X5Jxt2WEQmRsLdeG_UJdr5Z6ZQ1bObADV_1a214prJ5rd0-7JA8Uaxz3whgB8u7sxzzY20ncFQGiwhskTq1MYGoN7ptE2xZjbTXUlAy0GyfP2s-XNHwr68', 2),
(2, '0388_ธนาตย์', 'จอมใจเอกชน', 'https://lh3.googleusercontent.com/a-/AOh14GhFXRTvTDpN7Uoph55ClmqcrRWKh6JoUG2de-5G=s96-c', '62010388@kmitl.ac.th', 'ya29.a0ARrdaM-9GphdJaak7xzSBtb_SGMZuJ0xb3BjMCaRsGBo_4b42OZcgP13d5-wvGlqlNbuvEv78F2Mv8mY_izsNZ3mye1QlX5crGsxkouMTZnyOBZxqWCpLfIzHfaHe0Kk16fK1--sb7YZnMoHcmp4dKDhsiHSbQ', 1),
(3, 'admin', 'project', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
