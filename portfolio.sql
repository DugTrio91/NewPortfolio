-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2017 at 12:35 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `markportfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(2) NOT NULL,
  `image` varchar(500) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `image`, `title`, `description`, `link`) VALUES
(1, 'images/portfolio/absolute.png', 'Absolute', 'Absolute are a design agency who were looking to move away from their current theme based website. I created a design that reflected their identity and also incorporated dynamic content and easy to use CMS.', 'http://marksandbox.esy.es/Absolute-Agency/'),
(2, 'images/portfolio/clean_by_nature.png', 'Clean by nature', 'Clean by nature are an independent cleaning startup. For their website I created a series of illustrations to advertise the services they offer. It also features integration with a CMS to manage contact requests and testimonials. ', 'http://cleanbynature.uk'),
(3, 'images/portfolio/go_training.png', 'Go Training Academy', 'This website for a fitness instruction course provider was the result of an ongoing collaboration between me and Thomas Hockaday. This site combines powerful, dynamic features with a clean and simple design, which reflects the business. See more of Thomas\'s work at github.com/fyrebite.', 'http://testbite.freeiz.com/go_training/'),
(4, 'images/portfolio/st_sushi.png', 'St Sushi', 'A college project to rebrand a Newcastle based restaurant. This website is responsive and shows a more artistic side to web design, rather than using conventional, linear sections.', 'http://marksandbox.esy.es/St-Sushi%20Website%201/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;