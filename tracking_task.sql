-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20250825.8f1adbf5cb
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 26, 2025 at 04:29 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tracking_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `pembaruan_status`
--

CREATE TABLE `pembaruan_status` (
  `id` int NOT NULL,
  `id_task` int NOT NULL,
  `status_baru` enum('baru','dikerjakan','selesai') NOT NULL,
  `status_lama` enum('baru','dikerjakan','selesai') NOT NULL,
  `changed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembaruan_status`
--

INSERT INTO `pembaruan_status` (`id`, `id_task`, `status_baru`, `status_lama`, `changed_at`) VALUES
(7, 5, 'dikerjakan', 'baru', '2025-12-26 10:08:14'),
(8, 4, 'selesai', 'baru', '2025-12-26 10:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int NOT NULL,
  `id_user` int NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status_terkini` enum('baru','dikerjakan','selesai') NOT NULL DEFAULT 'baru',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `id_user`, `judul`, `deskripsi`, `status_terkini`, `created_at`, `update_at`) VALUES
(2, 1, 'artikel b indo', 'membuat seribu 1000 artikel untuk nantinya di upload di blog masing masing\r\n- jangan salin artikel orang yang sudah di publish\r\n- AI masih diperbolehkan', 'baru', '2025-12-24 19:26:03', '2025-12-24 19:26:03'),
(4, 1, 'mtk', 'hsjhgj', 'selesai', '2025-12-26 09:44:28', '2025-12-26 09:44:28'),
(5, 1, 'pai', 'sdsad', 'dikerjakan', '2025-12-26 09:44:47', '2025-12-26 09:44:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`) VALUES
(1, 'hanifa', 'hani14@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pembaruan_status`
--
ALTER TABLE `pembaruan_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_task` (`id_task`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pembaruan_status`
--
ALTER TABLE `pembaruan_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pembaruan_status`
--
ALTER TABLE `pembaruan_status`
  ADD CONSTRAINT `fk_pembaruan_status_task` FOREIGN KEY (`id_task`) REFERENCES `tasks` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_tasks_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
