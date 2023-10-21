-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 02:48 PM
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
-- Database: `passreset`
--

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `user_id`, `token`, `expiration_date`) VALUES
(6, 1, 'aa23a788ca2a9d966fbcb591065b1cb8fa00588b3a7cf4066ddcd011c027aea4', '2023-07-25 12:03:08'),
(7, 1, '34500bf1ce6574bd2ccd980bcb89ee2f794829211013d0b843cd60ec024f172f', '2023-07-25 12:06:00'),
(8, 1, '18e84519bb594b727e8ebbb5cd891a11', '2023-07-25 12:15:43'),
(9, 1, '47e0cd8bf8178a9f28de1349532aeedd', '2023-07-25 12:21:35'),
(10, 1, '6defc94faddd196356eaa31c35fe8630', '2023-07-25 12:22:22'),
(11, 1, '55391075207b55a577881cdfd8d176e1', '2023-07-25 12:24:00'),
(12, 1, '1c322cd23d762a6431509a0cf98c2db9', '2023-07-25 12:24:36'),
(13, 1, '0235332846b413e437e0b2253f05e0c5', '2023-07-25 12:31:51'),
(14, 1, '1f7381bc16f7fe49b9c845911e22fe35', '2023-07-25 12:32:09'),
(15, 1, 'a8c0adf3b1268504cf22927195fcb219', '2023-07-25 12:32:57'),
(16, 1, '60433a697ea271001afd2b4f601e6abe', '2023-07-25 12:35:44'),
(17, 1, 'c41a21c9dd7e3e36209b284701b76498', '2023-07-25 12:37:21'),
(18, 1, '3f22cd325f13452a5fb6371978a4cb94', '2023-07-25 12:38:42'),
(19, 1, '4ca21f3657ecf6403877501b36cf108e', '2023-07-25 12:39:29'),
(20, 1, 'b4102643466b4ad058e3db0a718a2a79', '2023-07-25 12:51:35'),
(21, 1, 'bd47f537191bbe95ff4cba3db9551593', '2023-07-25 12:52:55'),
(22, 1, 'a07d72978fa713089d95ec49a4dfe5a4', '2023-07-25 12:54:20'),
(23, 1, 'cddf23e239d713c5102d0c207923fe4f', '2023-07-25 12:55:08'),
(24, 1, '129c9153858a2e8b00fd6fc171e78988', '2023-07-25 12:57:53'),
(25, 1, 'ca4ccefe85def35f26ad0cf7adbd48f4', '2023-07-25 13:02:36'),
(26, 1, 'e7d233740b5926e3949f7eddfd067cd4', '2023-07-25 13:04:36'),
(27, 1, 'e3ee539280374ee07e9fb6ca8ae65b40', '2023-07-25 13:08:25'),
(28, 1, 'ce3d007f9cd21634185db7da6f0ff9c2', '2023-07-25 13:08:33'),
(29, 1, '23c18e41e2c461de7f3bbac197b3443f', '2023-07-25 13:15:37'),
(30, 1, '06bb467473f52254d4aca93e2ebe1f7c', '2023-07-25 13:19:23'),
(31, 1, '3749ec68ce7f54d061686282c81647e2', '2023-07-25 13:25:43'),
(32, 1, '331b10fafcacba46ded1a4ad44c70c24', '2023-07-25 13:29:31'),
(33, 1, '1034bbbe6ec1d4b598c4630d7034d326', '2023-07-25 13:31:07'),
(34, 1, '980a08b7b0f92ca6d80e5f5b998a6960', '2023-07-25 13:31:15'),
(35, 1, 'eeee9904e5163847aca857082b58bf7a', '2023-07-25 13:34:50'),
(36, 1, '383d3f0bbb072cdbb344ad1fecda3374', '2023-07-25 13:35:08'),
(37, 1, '3cecda2f02c1783f18dc2db9fea24d2e', '2023-07-25 13:36:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'devkevin', 'bruno.odwuor19@gmail.com', '$2y$10$Y3VGL5/J8vsqnl3JV6aQW..CD2rt7j3DddV7/EipSZzonEBHhE6.q');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
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
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
