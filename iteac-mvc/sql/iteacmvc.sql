-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2023 at 02:12 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iteacmvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `aptitude_answers`
--

CREATE TABLE `aptitude_answers` (
  `answer_id` int(11) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_selected` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aptitude_questions`
--

CREATE TABLE `aptitude_questions` (
  `question_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aptitude_questions`
--

INSERT INTO `aptitude_questions` (`question_id`, `question_text`, `option_a`, `option_b`, `option_c`, `correct_option`) VALUES
(1, 'If a computer on the network shares resources for others to use, it is called?', 'Server', 'Client', 'Mainframe', 'A'),
(2, 'What is 15% of 120?', '18', '15', '20', 'A'),
(3, 'If it takes 6 hours for 5 workers to complete a project, how many hours will it take for 8 workers to complete the same project?', '3.75', '3', '4.8', 'B'),
(4, 'A train travels 120 miles in 2 hours. What is its speed in miles per hour?', '60', '30', '40', 'A'),
(5, 'If the price of a book is $15, and you have a 10% discount coupon, how much will you pay?', '$13.50', '$14', '$16.50', 'A'),
(6, 'If the pattern is 5, 10, 15, 20, what is the next number in the sequence?', '25', '30', '35', 'B'),
(7, 'What is the least common multiple (LCM) of 6 and 8?', '12', '24', '48', 'B'),
(8, 'If x + 3 = 8, what is the value of x?', '5', '11', '3', 'A'),
(9, 'How many degrees are there in a right angle?', '90', '45', '180', 'A'),
(10, 'If you flip a fair coin twice, what is the probability of getting heads both times?', '0.25', '0.5', '0.75', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answers`
--

CREATE TABLE `quiz_answers` (
  `answer_id` int(11) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_selected` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_questions`
--

CREATE TABLE `quiz_questions` (
  `question_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_questions`
--

INSERT INTO `quiz_questions` (`question_id`, `question_text`, `option_a`, `option_b`, `option_c`, `correct_option`) VALUES
(1, 'What is SQL?', 'Structured Query Language', 'Simple Query Language', 'Sequential Query Language', 'A'),
(2, 'What does HTML stand for?', 'Hyper Text Markup Language', 'Highly Text Markup Language', 'Hyperlink and Text Markup Language', 'A'),
(3, 'What is the primary function of an operating system?', 'To manage hardware resources', 'To run applications', 'To create websites', 'A'),
(4, 'Which programming language is often used for web development?', 'Java', 'Python', 'JavaScript', 'C'),
(5, 'What is the full form of CPU?', 'Central Processing Unit', 'Computer Personal Unit', 'Central Process Unit', 'A'),
(6, 'Which of the following is a popular version control system?', 'Subversion (SVN)', 'Java Virtual Machine (JVM)', 'Random Access Memory (RAM)', 'A'),
(7, 'What is the binary equivalent of the decimal number 10?', '1010', '1101', '1110', 'A'),
(8, 'Which technology is used for wireless communication in most smartphones?', 'Bluetooth', 'NFC', 'Wi-Fi', 'C'),
(9, 'What does \"IT\" stand for?', 'Information Technology', 'Internet Technology', 'Innovative Technology', 'A'),
(10, 'What is the purpose of a firewall in network security?', 'To protect against unauthorized access', 'To boost network speed', 'To install software updates', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `reasoning_answers`
--

CREATE TABLE `reasoning_answers` (
  `answer_id` int(11) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `question_id` int(11) NOT NULL,
  `option_selected` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reasoning_questions`
--

CREATE TABLE `reasoning_questions` (
  `question_id` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `option_a` text NOT NULL,
  `option_b` text NOT NULL,
  `option_c` text NOT NULL,
  `correct_option` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reasoning_questions`
--

INSERT INTO `reasoning_questions` (`question_id`, `question_text`, `option_a`, `option_b`, `option_c`, `correct_option`) VALUES
(1, 'If \"APPLE\" is coded as \"XQQAE,\" how is \"ORANGE\" coded?', 'ZLARIM', 'TLARIM', 'TLXATL', 'B'),
(2, 'Arrange the following words in alphabetical order: Apple, Banana, Cherry, Grape', 'Apple, Banana, Cherry, Grape', 'Banana, Apple, Cherry, Grape', 'Cherry, Apple, Banana, Grape', 'B'),
(3, 'If all roses are flowers and some flowers fade quickly, can we conclude that some roses fade quickly?', 'Yes', 'No', 'Not enough information', 'B'),
(4, 'If every student in the class has a laptop, and Sarah is a student in the class, can we conclude that Sarah has a laptop?', 'Yes', 'No', 'Not enough information', 'A'),
(5, 'If A is taller than B, and B is taller than C, can we conclude that A is taller than C?', 'Yes', 'No', 'Not enough information', 'A'),
(6, 'Which number comes next in the sequence: 2, 4, 8, 16, ?', '32', '24', '64', 'A'),
(7, 'If the day after tomorrow is two days before Thursday, what day is it today?', 'Monday', 'Tuesday', 'Wednesday', 'C'),
(8, 'How many triangles are in the following figure?', '4', '5', '6', 'A'),
(9, 'If all cats have tails, and Mittens is a cat, can we conclude that Mittens has a tail?', 'Yes', 'No', 'Not enough information', 'A'),
(10, 'If 5 + 3 = 28, 9 + 1 = 810, and 8 + 6 = 214, what is 7 + 5?', '712', '611', '912', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `rollno` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`rollno`, `username`, `gender`, `email`, `password`) VALUES
('2021pecit001', 'roja', 'female', 'roja0618@gmail.com', '$2y$10$4iFXI2oCr8gcOpJN2g/99uF2cIZBHPMsKGds35zJgFU1Ut6OqiJKS'),
('2021pecit177', 'Harish', 'male', '2021pecit177@gmail.com', '$2y$10$1USyVPBeX49182RF5Z7VMOPoyFBN38uqVu4v/BhkZfhQM05qMvf62'),
('2021pecit223', 'vinoth s', 'male', 'vinothg0618@gmail.com', '$2y$10$bgnW7qE.COHMe8ZZZyhMpOwbduc2WkQmBIXhYwFwehky9O/OeFIvK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aptitude_answers`
--
ALTER TABLE `aptitude_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `aptitude_questions`
--
ALTER TABLE `aptitude_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `reasoning_answers`
--
ALTER TABLE `reasoning_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `reasoning_questions`
--
ALTER TABLE `reasoning_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`rollno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aptitude_answers`
--
ALTER TABLE `aptitude_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aptitude_questions`
--
ALTER TABLE `aptitude_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `quiz_answers`
--
ALTER TABLE `quiz_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quiz_questions`
--
ALTER TABLE `quiz_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reasoning_answers`
--
ALTER TABLE `reasoning_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reasoning_questions`
--
ALTER TABLE `reasoning_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
