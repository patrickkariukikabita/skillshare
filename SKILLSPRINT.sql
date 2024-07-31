-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2024 at 09:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11
CREATE DATABASE IF NOT EXISTS SKILLSPRINT;
USE SKILLSPRINT;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `CATEGORIES` (
  `ID` int(11) NOT NULL,
  `NAME` varchar(255) NOT NULL,
  `DESCRIPTION` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CATEGORIES`
--

INSERT INTO `CATEGORIES` (`ID`, `NAME`, `DESCRIPTION`) VALUES
(1, 'SCIENCE', 'All information involving Science'),
(2, 'TECHNOLOGY', 'All Information on Technology and Innovation'),
(6, 'PROGRAMMING', 'All Information On Programming');

-- --------------------------------------------------------

--
-- Table structure for table `CONTENT`
--

CREATE TABLE `CONTENT` (
  `CONTENTID` int(11) NOT NULL,
  `TITLE` text DEFAULT NULL,
  `CONTENT` text NOT NULL,
  `USERID` int(11) DEFAULT NULL,
  `POSTED_DATE` timestamp NULL DEFAULT current_timestamp(),
  `SKILLID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CONTENT`
--

INSERT INTO `CONTENT` (`CONTENTID`, `TITLE`, `CONTENT`, `USERID`, `POSTED_DATE`, `SKILLID`) VALUES
(2, 'Python Best Practices', '&lt;p&gt;Python Best Practices: A Guide to Clean and Efficient Coding&lt;/p&gt;&lt;p&gt;Python\'s readability and simplicity have made it one of the most beloved programming languages. However, writing clean, efficient, and maintainable code requires following best practices. Here are some key principles to keep in mind:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;strong&gt;PEP 8 Compliance:&lt;/strong&gt; Adhering to the guidelines outlined in Python Enhancement Proposal 8 (PEP 8) is crucial. PEP 8 provides conventions for code layout, naming conventions, and style recommendations. Consistent adherence to these standards enhances code readability and fosters a uniform coding style across projects.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Virtual Environments:&lt;/strong&gt; Always use virtual environments to manage project dependencies. This practice ensures that your project remains isolated from the global Python environment, preventing conflicts between package versions and facilitating reproducibility.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Clear and Descriptive Naming:&lt;/strong&gt; Choose meaningful names for variables, functions, classes, and modules. Clear and descriptive naming enhances code readability, making it easier for collaborators to understand your code and for future maintenance.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Modularization:&lt;/strong&gt; Break down your code into modular components, with each module serving a specific purpose. This modular approach promotes code reuse, simplifies testing, and facilitates better organization of your project.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Error Handling:&lt;/strong&gt; Implement robust error handling to anticipate and gracefully manage unexpected situations. Avoid using generic exceptions and be specific about the errors you catch. This helps in identifying and addressing issues effectively.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Docstring Documentation:&lt;/strong&gt; Include docstrings for functions, classes, and modules to provide clear and concise documentation. Well-written docstrings serve as a valuable resource for developers using or contributing to your code.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Use List Comprehensions:&lt;/strong&gt; Take advantage of Python\'s list comprehensions to create concise and readable code when working with lists. List comprehensions are a powerful and expressive feature that simplifies operations on iterable data structures.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Context Managers:&lt;/strong&gt; Embrace context managers, especially when dealing with external resources like files or database connections. The &lt;code&gt;with&lt;/code&gt; statement ensures proper resource management and eliminates the need for explicit cleanup code.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Avoid Global Variables:&lt;/strong&gt; Minimize the use of global variables as they can lead to unexpected side effects and make code harder to understand. Favor passing parameters and returning values over relying on global state.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Unit Testing:&lt;/strong&gt; Integrate unit tests into your development workflow to validate the functionality of individual components. Adopting test-driven development (TDD) principles ensures that your code remains reliable and resilient to changes.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Version Control:&lt;/strong&gt; Use version control systems like Git to track changes in your codebase. Regularly commit your code and provide meaningful commit messages. This practice facilitates collaboration, allows for easy rollbacks, and ensures a well-documented development history.&lt;/li&gt;&lt;li&gt;&lt;strong&gt;Keep It Simple (KISS):&lt;/strong&gt; Follow the principle of &quot;Keep It Simple, Stupid.&quot; Avoid unnecessary complexity and aim for simplicity in your code. Simple code is easier to understand, maintain, and less prone to errors.&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;By incorporating these best practices into your Python development workflow, you can create clean, efficient, and maintainable code. Consistency and attention to detail contribute to a positive coding experience for both yourself and your collaborators.&lt;/p&gt;', 2, '2024-02-28 08:08:47', 17);

-- --------------------------------------------------------

--
-- Table structure for table `SKILLS`
--

CREATE TABLE `SKILLS` (
  `ID` int(11) NOT NULL,
  `SKILLNAME` varchar(255) NOT NULL,
  `CATEGORYID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `SKILLS`
--

INSERT INTO `SKILLS` (`ID`, `SKILLNAME`, `CATEGORYID`) VALUES
(7, 'Debugging', 5),
(16, 'Computer Repair', 1),
(17, 'Python Programming', 6);

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `ID` int(11) NOT NULL,
  `FIRST_NAME` varchar(255) NOT NULL,
  `LAST_NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`ID`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `PASSWORD`) VALUES
(2, 'Rajeet', 'Kumar', 'skillsprint@email.com', 'b59c67bf196a4758191e42f76670ceba'),
(3, 'Magdha', 'Rajeet', 'dreadnaught@gmail.com', 'b59c67bf196a4758191e42f76670ceba');

-- --------------------------------------------------------

--
-- Table structure for table `USERSKILLS`
--

CREATE TABLE `USERSKILLS` (
  `USERSKILLID` int(11) NOT NULL,
  `USERID` int(11) DEFAULT NULL,
  `SKILL_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `USERSKILLS`
--

INSERT INTO `USERSKILLS` (`USERSKILLID`, `USERID`, `SKILL_ID`) VALUES
(4, 3, 7),
(16, 2, 16),
(21, 2, 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `CONTENT`
--
ALTER TABLE `CONTENT`
  ADD PRIMARY KEY (`CONTENTID`);

--
-- Indexes for table `SKILLS`
--
ALTER TABLE `SKILLS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `USERSKILLS`
--
ALTER TABLE `USERSKILLS`
  ADD PRIMARY KEY (`USERSKILLID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CATEGORIES`
--
ALTER TABLE `CATEGORIES`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `CONTENT`
--
ALTER TABLE `CONTENT`
  MODIFY `CONTENTID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `SKILLS`
--
ALTER TABLE `SKILLS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `USERSKILLS`
--
ALTER TABLE `USERSKILLS`
  MODIFY `USERSKILLID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
