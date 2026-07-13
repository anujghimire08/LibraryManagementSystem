-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2026 at 04:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `genre` varchar(256) NOT NULL,
  `author` varchar(256) NOT NULL,
  `publisher` varchar(256) NOT NULL,
  `rating` double NOT NULL CHECK (`rating` between 0 and 5),
  `imgpath` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `genre`, `author`, `publisher`, `rating`, `imgpath`) VALUES
(56, 'Jeevan Kada Ki Phool', 'Autobiography', 'Jhamak Ghimire', 'Sangri-La Books', 4.8, 'assets/books/jeevankada.png'),
(57, 'China Harayeko Manchhe', 'Autobiography', 'Hari Bansa Acharya', 'FinePrint', 4.7, 'assets/books/chinaharayeko.jpg'),
(58, 'Binod Chaudhary', 'Autobiography', 'Binod Chaudhary', 'CG Corp Global', 4.5, 'assets/books/binod.jpg'),
(59, 'Rookmangud', 'Biography', 'Rookmangud Katawal', 'Educational Publishing', 4.3, 'assets/books/rookmangud.jpg'),
(60, 'Nepathya', 'Biography', 'Nepathya', 'Nepa~laya', 4.4, 'assets/books/nepathya.jpg'),
(61, 'Mahabir', 'Biography', 'Mahabir Pun', 'FinePrint', 4.9, 'assets/books/mahabir.jpeg'),
(62, 'Atomic Habits', 'Self Help', 'James Clear', 'Avery', 4.8, 'assets/books/atomic.jpg'),
(63, 'Rich Dad Poor Dad', 'Finance', 'Robert T. Kiyosaki', 'Plata Publishing', 4.7, 'assets/books/richdad.jpg'),
(64, 'The Psychology of Money', 'Finance', 'Morgan Housel', 'Harriman House', 4.8, 'assets/books/psychologymoey.jpg'),
(65, 'Deep Work', 'Productivity', 'Cal Newport', 'Grand Central', 4.7, 'assets/books/deepwork.jpg'),
(66, 'Make Your Bed', 'Motivation', 'William H. McRaven', 'Grand Central', 4.7, 'assets/books/makeyourbed.jpg'),
(67, 'Never Finished', 'Motivation', 'David Goggins', 'Lioncrest', 4.8, 'assets/books/neverfinished.jpg'),
(68, 'Beyond Possible', 'Motivation', 'Nimsdai Purja', 'Gallery Books', 4.8, 'assets/books/beyondpossible.jpg'),
(69, 'Think and Grow Rich', 'Self Help', 'Napoleon Hill', 'The Ralston Society', 4.6, 'assets/books/thinkrich.jpg'),
(70, 'Think Like a Monk', 'Self Help', 'Jay Shetty', 'Simon & Schuster', 4.6, 'assets/books/thniklikemonk.jpg'),
(71, 'Clean Code', 'Programming', 'Robert C. Martin', 'Prentice Hall', 4.8, 'assets/books/cleancode.jpg'),
(72, 'Introduction to Algorithms', 'Programming', 'Cormen et al.', 'MIT Press', 4.7, 'assets/books/algorithm.jpg'),
(73, '1984', 'Dystopian', 'George Orwell', 'Secker & Warburg', 4.7, 'assets/books/1984.jpg'),
(74, 'Harry Potter and the Philosopher\'s Stone', 'Fantasy', 'J.K. Rowling', 'Bloomsbury', 4.9, 'assets/books/harrypotter.jpg'),
(75, 'The Da Vinci Code', 'Thriller', 'Dan Brown', 'Doubleday', 4.5, 'assets/books/TheDaVinciCode.jpg'),
(76, 'Shutter Island', 'Thriller', 'Dennis Lehane', 'William Morrow', 4.6, 'assets/books/shutterisland.jpg'),
(77, 'The Girl on the Train', 'Thriller', 'Paula Hawkins', 'Riverhead Books', 4.3, 'assets/books/girlsontrain.jpg'),
(78, 'Brave New World', 'Dystopian', 'Aldous Huxley', 'Chatto & Windus', 4.5, 'assets/books/bravenewworld.jpg'),
(79, 'Pride and Prejudice', 'Classic', 'Jane Austen', 'T. Egerton', 4.8, 'assets/books/PrideandPrejudice.jpg'),
(80, 'Ikigai', 'Self Help', 'Hector Garcia & Francesc Miralles', 'Penguin', 4.6, 'assets/books/ikigai.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `borrowrecords`
--

CREATE TABLE `borrowrecords` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrow_date` date DEFAULT curdate(),
  `due_date` date GENERATED ALWAYS AS (`borrow_date` + interval 14 day) STORED,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowrecords`
--

INSERT INTO `borrowrecords` (`id`, `user_id`, `book_id`, `borrow_date`, `return_date`) VALUES
(50, 6, 68, '2026-07-09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `reviews` varchar(80) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `email`, `reviews`, `created_at`) VALUES
(1, 'nischal', 'nischal@gmail.com', 'best library management system', '2026-07-07 04:36:57'),
(2, 'rohan', 'rohan@gmail.com', 'best in the market&#13;&#10;', '2026-07-07 04:51:06'),
(3, 'ramrai', 'ramrai@gmail.com', 'best in the market', '2026-07-07 04:52:16'),
(4, 'rohan', 'rohan@gmail.com', 'nice', '2026-07-07 15:19:23'),
(5, 'rohan', 'rohan@gmail.com', 'hi its niggachan1, thanks for lms&#13;&#10;', '2026-07-08 03:44:05'),
(6, 'sudin', 'sudin@gmail.com', 'lms test working', '2026-07-09 15:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'user',
  `isApproval` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `isApproval`, `created_at`) VALUES
(2, 'anujghimire', 'ghimireanuj05@gmail.com', '$2y$10$jj3K3ZUbrjv1whKdRQjSjeFe3Vw98dMJHg3IeoZYwmqtSGI0vp9Qu', 'admin', 1, '2026-07-04 10:37:54'),
(5, 'ramrai', 'ramrai@gmail.com', '$2y$10$.06BLPdFi5NpuaaKcp9Neetp54lWx4WZGVH4nhvlLdH2S.XeqtmUG', 'user', 1, '2026-07-04 10:37:54'),
(6, 'rohan', 'rohan@gmail.com', '$2y$10$Vmfm.OrwwcDWLHSv/Fb77.pGX3KvWz1bjwwz.FXL4g09a2aelbN0e', 'user', 1, '2026-07-04 11:43:09'),
(7, 'nischal', 'nischal@gmail.com', '$2y$10$LFEKzIE08X9cpu9IXiAbz.X34.3w8IWK6KBwnOsAHg/bwS8qBrv7G', 'user', 1, '2026-07-05 07:27:03'),
(8, 'pragyan', 'pragyan@gmail.com', '$2y$10$cphHjrR4LRC3NAW4X8fvJucueW6xZMTb/nYmaxAaq1pa7NvihTeLe', 'user', 1, '2026-07-06 02:17:18'),
(9, 'xyz', 'xyz@gmail.com', '$2y$10$jByWCup1W3iEVAyllnjJIOc3oTOLrCwdHx0uREqoKYEFPmGw7wl9i', 'user', 1, '2026-07-08 09:08:20'),
(10, 'abc', 'abc@gmail.com', '$2y$10$eKn4G5BDgTRAdW.Ny/9I7.YzowvC1pgs/vnVObcJyF6WL.lyjT/g6', 'user', 1, '2026-07-08 09:13:57'),
(11, 'pal', 'pal@gmail.com', '$2y$10$1D4lqgHKWrlukuPCC.ELuu1tPb2chKdhsnk50Pae2ZdHdjIHVePPS', 'user', 1, '2026-07-09 04:28:12'),
(12, 'sudin', 'sudin@gmail.com', '$2y$10$w54gAJ1LechCafMvy/x.POIQHuWMgN7ACkPIrY8dM20dSWAsLI1je', 'user', 1, '2026-07-09 15:52:55'),
(13, 'bhupal', 'bhupal@gmail.com', '$2y$10$jjRgTAkY.DDN4p7Kuz/o5.nAv2Q.2HoJcaRgrmdoZSwMlWVaY4ERO', 'user', 1, '2026-07-09 16:15:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowrecords`
--
ALTER TABLE `borrowrecords`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `borrowrecords`
--
ALTER TABLE `borrowrecords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrowrecords`
--
ALTER TABLE `borrowrecords`
  ADD CONSTRAINT `borrowrecords_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `borrowrecords_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
