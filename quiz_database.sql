-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: May 22, 2022 at 10:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dummy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Donald kanuth', 'donald_kanuthteacher@gmail.com', '278524d');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(5) NOT NULL,
  `quizId` int(5) NOT NULL,
  `question` varchar(500) NOT NULL,
  `choices` varchar(500) NOT NULL,
  `correct_choice` varchar(500) NOT NULL,
  `grade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `quizId`, `question`, `choices`, `correct_choice`, `grade`) VALUES
(2, 16, 'q1', 'a1&b1&c1&d1', 'b', 0),
(3, 16, 'q2', 'a2&b2&c2&d2', 'c', 0),
(7, 27, 'what is jpa', 'i dont know&grade&java perstense api&all', 'c', 1),
(8, 27, 'who are you', 'me&you&we&no one', 'd', 1),
(9, 27, 'what is jpa', 'i dont know&grade&java perstense api&all', 'c', 1),
(10, 27, 'who are you', 'me&you&we&no one', 'd', 1),
(17, 31, '1- Which of the following is the default file extension of PHP?\r\n', '.php&.xml&.html&.hphp', 'a', 1),
(18, 31, '2- Which of the following is the use of strlen() function in PHP?\r\n', 'The strlen() function returns the type of string &The strlen() function returns the length of string&The strlen() function returns the value of string&The strlen() function returns both value and type of string', 'b', 1),
(19, 31, '3- Which of the following is used for concatenation in PHP?\r\n\r\n', '+ (plus)&* (Asterisk)&. (dot)&append()', 'c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(5) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subjectId` int(5) NOT NULL,
  `adminId` int(5) NOT NULL,
  `created_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `title`, `subjectId`, `adminId`, `created_time`) VALUES
(10, 'Math Quiz', 1, 1, '2022-05-21'),
(16, 'loop', 2, 1, '2022-05-21'),
(27, 'jpa', 2, 1, '2022-05-21'),
(28, 'Calculus 1', 1, 1, '2022-05-22'),
(31, 'php quiz', 3, 1, '2022-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(9) NOT NULL,
  `name` varchar(55) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gpa` decimal(5,2) NOT NULL,
  `register_date` date DEFAULT current_timestamp(),
  `profile_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `gpa`, `register_date`, `profile_img`) VALUES
(7, 'Abdullah', 'aboodstudent@gmail.com', '123456', '95.00', '2022-05-21', ''),
(8, 'Ahmed Khaled', 'ahmedstudent@gmail.com', '123456', '88.40', '2022-05-22', '628a0f0f80ec8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `student_quiz`
--

CREATE TABLE `student_quiz` (
  `studentId` int(9) NOT NULL,
  `quizId` int(5) NOT NULL,
  `result` int(2) NOT NULL,
  `submissionDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_quiz`
--

INSERT INTO `student_quiz` (`studentId`, `quizId`, `result`, `submissionDate`) VALUES
(8, 31, 3, '2022-05-22 19:53:46'),
(8, 31, 3, '2022-05-22 19:54:43'),
(8, 31, 3, '2022-05-22 19:55:44'),
(8, 31, 3, '2022-05-22 19:55:56'),
(8, 31, 3, '2022-05-22 19:56:30'),
(8, 31, 3, '2022-05-22 20:01:33'),
(8, 31, 2, '2022-05-22 20:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(2, 'Java '),
(1, 'Mathmatics'),
(3, 'PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_name` (`name`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_quiz` (`quizId`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_fk` (`adminId`),
  ADD KEY `quiz_subject` (`subjectId`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniqe_name` (`name`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- Indexes for table `student_quiz`
--
ALTER TABLE `student_quiz`
  ADD KEY `student_fk` (`studentId`),
  ADD KEY `quiz_fk` (`quizId`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_sName` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `subject_quiz` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `admin_fk` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quiz_subject` FOREIGN KEY (`subjectId`) REFERENCES `subject` (`id`) ON UPDATE NO ACTION;

--
-- Constraints for table `student_quiz`
--
ALTER TABLE `student_quiz`
  ADD CONSTRAINT `quiz_fk` FOREIGN KEY (`quizId`) REFERENCES `quiz` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `student_fk` FOREIGN KEY (`studentId`) REFERENCES `student` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
