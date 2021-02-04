-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2017 at 12:00 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@mail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `email` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`email`, `name`, `image_name`) VALUES
('admin@mail.com', 'Muhammad Harun-Or-Roshid', '148657806026211589b618c422ae9041123456.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `title` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `title`, `message`) VALUES
(4, 'md.parvez28@gmail.com', 'Good very Good', 'This is Very Good Gym.');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image_list`
--

CREATE TABLE `gallery_image_list` (
  `id` int(32) NOT NULL,
  `image_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_image_list`
--

INSERT INTO `gallery_image_list` (`id`, `image_name`) VALUES
(8, '14859664932786858920c9d31c652258.jpg'),
(9, '1485966493530658920c9d32a0b4334.jpg'),
(6, '1485966493964858920c9d2e4637480.jpg'),
(11, '1485967722140295892116a1386d9684.jpg'),
(12, '1485967722252355892116a1540b9072.jpg'),
(13, '1485968523170305892148b84fa07136.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `to_email` varchar(32) NOT NULL,
  `from` varchar(32) NOT NULL,
  `message` varchar(512) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `fk_id` int(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `date`, `to_email`, `from`, `message`, `status`, `fk_id`) VALUES
(1, '2017-02-08', 'md.parvez28@gmail.com', 'admin@mail.com', 'Hi!', 1, 0),
(4, '2017-02-08', 'admin@mail.com', 'md.parvez28@gmail.com', 'Hi! from user', 1, 0),
(5, '2017-02-08', 'admin@mail.com', 'md.parvez28@gmail.com', 'THis is from user', 1, 0),
(6, '2017-02-08', 'md.parvez28@gmail.com', 'md.parvez28@gmail.com', 'hi', 1, 0),
(8, '2017-02-08', 'md.parvez28@gmail.com', 'admin@mail.com', 'This is from admin reply', 1, 0),
(9, '2017-02-08', 'admin@mail.com', 'md.parvez28@gmail.com', 'This is from user reply', 1, 0),
(10, '2017-02-08', 'md.parvez28@gmail.com', 'tuni@gmail.com', 'Hi! I am Tuni.', 1, 0),
(11, '2017-02-08', 'admin@mail.com', 'tuni@gmail.com', 'Hi! I am Tuni. I am new here.', 1, 0),
(12, '2017-02-08', 'tuni@gmail.com', 'admin@mail.com', 'welcome', 0, 0),
(13, '2017-02-08', 'tuni@gmail.com', 'md.parvez28@gmail.com', 'nice to meeting you', 0, 0),
(14, '2017-02-12', 'sojib@live.com', 'admin@mail.com', 'Hi', 0, 0),
(15, '2017-02-12', 'md.sojib@live.com', 'admin@mail.com', 'Hi!', 1, 0),
(16, '2017-02-12', 'admin@mail.com', 'md.sojib@live.com', 'Hi! Admin', 1, 0),
(18, '2017-02-13', 'admin@mail.com', 'parvez28@gmail.com', 'This message is  from contact content.', 1, 0),
(19, '2017-02-13', 'admin@mail.com', 'parvez28@gmail.com', 'This message is  from contact content.Anonymous:<br>Name: ABC', 1, 0),
(20, '2017-02-13', 'admin@mail.com', 'parvez28@gmail.com', 'This is testing msg.Anonymous:<br>Name: Parvez', 1, 0),
(21, '2017-02-13', 'admin@mail.com', 'parvez28@gmail.com', 'This is testing msg.Anonymous:<br>Name: Parvez', 1, 0),
(22, '2017-02-13', 'admin@mail.com', 'parvez28@gmail.com', 'hi{Anonymous->Name: Parvez}', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `email` varchar(32) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_month` date NOT NULL,
  `plan` varchar(20) NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `email`, `payment_date`, `payment_month`, `plan`, `amount`) VALUES
(77, 'jashim@yahoo.com', '2017-02-13', '2017-02-01', 'pro', 74),
(78, 'firoj@hotmail.com', '2017-02-13', '2017-02-01', 'basic', 27),
(79, 'nila@live.com', '2017-02-13', '2017-01-01', 'unlimited', 140),
(80, 'jashim@yahoo.com', '2017-02-13', '2017-03-01', 'basic', 27),
(81, 'md.parvez28@gmail.com', '2017-02-14', '2017-02-01', 'pro', 74);

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `details` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `email`, `name`, `category`, `image_name`, `details`) VALUES
(8, 'john@mail.com', 'Body Trainer', 'John Doe', '14869962391143258a1c30f0dc4f8013trainer-1.jpg', 'Body Trainer'),
(9, 'jamessmith@mail.com', 'Swimming Trainer', 'James Smith', '14869963043056658a1c350831612873trainer-2.jpg', 'Swimming Trainer'),
(10, 'kaprelianhue@mail.com', 'Certified Personal Trainer', 'Kaprelian Hue', '1486996360752158a1c388371da5536trainer-3.jpg', 'Certified Personal Trainer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(11, 'jashim@yahoo.com', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855'),
(12, 'firoj@hotmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(14, 'nila@live.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(19, 'sudip@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(34, 'tuni@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(35, 'md.parvez28@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(36, 'md.sobuj@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92');

-- --------------------------------------------------------

--
-- Table structure for table `users_information`
--

CREATE TABLE `users_information` (
  `email` varchar(32) NOT NULL,
  `name` varchar(32) NOT NULL,
  `contact_number` varchar(14) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `image_name` varchar(100) NOT NULL DEFAULT 'default.png',
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_information`
--

INSERT INTO `users_information` (`email`, `name`, `contact_number`, `date_of_birth`, `gender`, `image_name`, `address`) VALUES
('firoj@hotmail.com', 'Firoj Khan', '01749999444', '1990-01-01', 'Male', 'person_3.jpg', 'House 543, Road 12, Rome, Italy'),
('jashim@yahoo.com', 'Jashim Uddin', '01821666333', '1971-01-01', 'Other', 'person_2.jpg', 'House 3, Road 34, Berlin, Germany'),
('md.parvez28@gmail.com', 'Muhammad Harun-Or-Roshid', '01670129830', '1994-04-28', 'Male', '1486456972271455899888c52d6d24102016.jpg', 'House 12, Road 5, Block J, Section 7, Mirpur, Dhaka'),
('md.sojib@live.com', 'Sojib Ahamed', '01821666321', '1994-04-28', 'Male', '148692039174558a09ac7845108553123456.jpg', 'House- 5, Road 12, Mirpur, Dhaka, Bangladesh'),
('nila@live.com', 'Nilanjona Nila', '01991144888', '1996-01-01', 'Female', 'person_5.jpg', 'House 35, Road 1, Rangpur, Bangladesh'),
('sudip@gmail.com', 'Sudip Sarker', '01771155999', '1992-01-01', 'Male', 'person_4.jpg', 'House 32, Road 5, London, UK'),
('tuni@gmail.com', 'Tun Tuni', '01711122211', '1994-01-01', 'Female', 'person_1.jpg', 'House 5, Road 2, Washington, D.C., USA');

-- --------------------------------------------------------

--
-- Table structure for table `users_plan`
--

CREATE TABLE `users_plan` (
  `id` int(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `plan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_plan`
--

INSERT INTO `users_plan` (`id`, `email`, `plan`) VALUES
(1, 'md.parvez28@gmail.com', 'pro'),
(2, 'md.sobuj@gmail.com', 'pro'),
(3, 'md.sojib@live.com', 'basic'),
(5, 'firoj@hotmail.com', 'basic'),
(6, 'nila@live.com', 'unlimited'),
(7, 'sudip@gmail.com', 'starter'),
(10, 'jashim@yahoo.com', 'basic');

-- --------------------------------------------------------

--
-- Table structure for table `user_activities`
--

CREATE TABLE `user_activities` (
  `id` int(32) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(32) NOT NULL,
  `height` int(32) NOT NULL,
  `weight` int(11) NOT NULL,
  `heart_rate` int(32) NOT NULL,
  `workout` time NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activities`
--

INSERT INTO `user_activities` (`id`, `date`, `email`, `height`, `weight`, `heart_rate`, `workout`, `age`) VALUES
(4, '2017-02-07', 'md.parvez28@gmail.com', 173, 81, 198, '02:30:00', 22),
(5, '2017-02-07', 'md.parvez28@gmail.com', 173, 80, 198, '02:00:00', 22),
(7, '2017-02-07', 'md.parvez28@gmail.com', 173, 80, 198, '02:50:00', 22),
(8, '2017-02-08', 'md.parvez28@gmail.com', 173, 80, 198, '03:00:00', 22),
(9, '2017-02-08', 'md.parvez28@gmail.com', 173, 79, 198, '02:00:00', 22),
(12, '2017-02-08', 'md.parvez28@gmail.com', 173, 79, 198, '00:30:00', 22),
(13, '2017-02-08', 'tuni@gmail.com', 160, 55, 197, '01:03:00', 23),
(14, '2017-02-08', 'tuni@gmail.com', 160, 54, 197, '02:30:00', 23),
(15, '2017-02-10', 'md.parvez28@gmail.com', 173, 78, 198, '02:00:00', 22),
(16, '2017-02-10', 'md.parvez28@gmail.com', 173, 78, 147, '02:30:00', 22),
(17, '2017-02-12', 'md.sojib@live.com', 173, 75, 150, '02:00:00', 22),
(18, '2017-02-12', 'md.sojib@live.com', 173, 74, 198, '02:30:00', 22),
(19, '2017-02-12', 'md.sojib@live.com', 174, 74, 198, '02:30:00', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `image_name` (`image_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gallery_image_list`
--
ALTER TABLE `gallery_image_list`
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `image_name` (`image_name`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image_name` (`image_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email` (`email`);

--
-- Indexes for table `users_information`
--
ALTER TABLE `users_information`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `image_path` (`image_name`);

--
-- Indexes for table `users_plan`
--
ALTER TABLE `users_plan`
  ADD PRIMARY KEY (`id`,`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_activities`
--
ALTER TABLE `user_activities`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gallery_image_list`
--
ALTER TABLE `gallery_image_list`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users_plan`
--
ALTER TABLE `users_plan`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user_activities`
--
ALTER TABLE `user_activities`
  MODIFY `id` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
