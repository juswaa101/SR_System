-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2023 at 03:23 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `strand_recommender`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ann_id` int(11) NOT NULL,
  `posts` longtext NOT NULL,
  `account_id` int(11) NOT NULL,
  `updated_at` datetime DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ann_id`, `posts`, `account_id`, `updated_at`, `created_at`) VALUES
(6, 'Test 1', 20, '2023-02-05 07:42:05', '2023-02-05 07:42:05'),
(7, 'Test 2 lol```', 20, '2023-02-05 09:59:49', '2023-02-05 09:59:49');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `comments` longtext NOT NULL,
  `account_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = Pending\r\n1 = Approved\r\n3 = Declined',
  `ann_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `comments`, `account_id`, `status`, `ann_id`, `created_at`, `updated_at`) VALUES
(1, 'Test', 28, 2, 6, '2023-02-05 16:14:33', '2023-02-05 16:14:33'),
(2, 'estsas', 28, 1, 6, '2023-02-05 16:33:24', '2023-02-05 16:33:24'),
(3, 'Waiting for approval', 28, 2, 6, '2023-02-05 09:33:00', '2023-02-05 09:33:00'),
(4, 'Test Data', 28, 0, 6, '2023-02-05 09:33:50', '2023-02-05 09:33:50'),
(5, 'test 1', 28, 1, 6, '2023-02-05 09:37:01', '2023-02-05 09:37:01'),
(6, 'you', 20, 1, 6, '2023-02-05 09:41:09', '2023-02-05 09:41:09'),
(7, 'test', 20, 1, 6, '2023-02-05 09:58:20', '2023-02-05 09:58:20'),
(8, 'Can i test this data?', 29, 0, 6, '2023-02-05 11:58:38', '2023-02-05 11:58:38'),
(9, 'test 2', 5, 1, 6, '2023-02-05 12:12:22', '2023-02-05 12:12:22');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(255) NOT NULL,
  `question` text NOT NULL,
  `choice_a` varchar(255) NOT NULL,
  `choice_b` varchar(255) NOT NULL,
  `choice_c` varchar(255) NOT NULL,
  `choice_d` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `examcode` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `question`, `choice_a`, `choice_b`, `choice_c`, `choice_d`, `answer`, `examcode`) VALUES
(17, 'What is the value of K if the expression (- 5x3 + 4x2 – 3x + K) is divided by (x-1), and obtains a remainder of 10?', '12', '14', '16', '18', '14', 1),
(18, 'What is the sum of the first 8 terms of an arithmetic sequence whose first term is 37 and the common difference is -4?', '180', '182', '184', '186', '186', 1),
(19, 'Which of the following is a factor of (3a + 1)?', '3a2 + 3a + 1', '3a2 + 3a + 1', '6a2 + 5a + 1', '6a2 + 5a + 3', '6a2 + 5a + 1', 1),
(20, 'What are the roots of the quadratic equation b2 – 5b – 36 = 0?', '(9, 4)', '(9,-4)', '(-9, -4(', '(-9,4)', '(9,-4)', 1),
(21, 'A square with a side of 12 cm and a rectangle with a width of 8 cm have the same area. What is the length of the rectangle?', '16 CM', '17 CM', '18 CM', '20 CM', '18 CM', 1),
(22, 'What is the remainder of the expression ( 5b2+ 15b – 35) is divided by (b + 5)?', '15', '20', '25', '30', '15', 1),
(23, 'What is the remainder of the expression ( 5b2+ 15b – 35) is divided by (b + 5)?', '243 WAYS', '15 WAYS', '225 WAYS', '3 WAYS', '243 WAYS', 1),
(24, 'There are 10 green balls, 8 white balls, and 6 blue balls in a jar.  What is the probability that when a ball is picked from the bag, it is a non-white ball?', '1/4', '2/3', '4/3', '1/3', '2/3', 1),
(25, 'What is the expansion of (2x – 3)3?', '8x3 – 27', '8x3 – 36x2 + 54x – 27', '8x3 + 54x – 27', '8x3 + 36x2 – 54x – 27', '8x3 – 36x2 + 54x – 27', 1),
(26, 'If the set of numbers 3, -12, 48, -192 form a geometric sequence, what is the common ratio between any two consecutive terms?', '– 12', '– 8', '– 8', '-4', '-4', 1),
(27, 'What is the value of the expression C (8, 6)?', '56', '48', '28', '14', '28', 1),
(28, 'What is the value of P(-2) in the expression: P(x) = 7x4 – 5x3 + 2x2 – 3?', '161', '159', '157', '155', '157', 1),
(29, 'What is the value of P (8, 5)?', '336', '356', '56', '6720', '6720', 1),
(30, 'A die is to be thrown and a card is to be drawn in a deck of cards. What is the probability that the card drawn is an ace and an even number will appear on a die?', '4/13', '3/13', '1/13', '1/26', '1/26', 1),
(31, 'In square FATE, the measure of angle F is 4x + 30.  What is the value of x?', '21 degrees', '19 degrees', '15 degrees', '13 degrees', '15 degrees', 1),
(32, 'What is the next term in the arithmetic sequence:  2, 13/4, 9/2. 23/4', '7', '29/4', '15/2', '31/4', '7', 1),
(33, 'Which of the following function will cross the x-axis thrice?', 'P(x) = (x2-1)(x2 – 5x + 6)', 'P(x) = (2x2 – 5x + 2) (x+3)', 'Both A and B', 'Neither A Nor B', 'P(x) = (2x2 – 5x + 2) (x+3)', 1),
(34, 'What is the sum of all even integers from 21 to 51?', '540', '596', '600', '640', '596', 1),
(35, 'The polynomial function P(x) = xn is true when,', 'N is any real number', 'N is an non-negative number', 'N is an integer', 'N is an irrational number', 'N is an non-negative number', 1),
(36, 'Which of the following is NOT an example of a harmonic sequence?', '1/6, 1/7, 1/8, 1/9,...', '4,0,-4,-2', '1/4, 1/12, 1/36,1/108,...', '1/3, 1/12, 1/21, 1/30,...', '1/4, 1/12, 1/36,1/108,...', 1),
(37, 'Which of the following polynomial equation with roots -1, 1, and 4?', 'P(x) = x3 – 4x2 – 2x + 4', 'P(x) = x3 – 4x2 – 4x – 4', 'P(x) = x3 – 4x2 + x + 4', 'P(x) = x3 – 4x2 – x + 4', 'P(x) = x3 – 4x2 – x + 4', 1),
(38, 'What is the equation of the circle whose center is at the point (3,2), and the point (9,10) is on the circle?', '(x + 3)2 + (y + 2)2 = 10', '(x + 3)2 + (y + 2)2 = 10', '(x – 2)2 + (y – 3)2 = 100', '(x – 3)2 + (y – 2)2 = 100', '(x + 3)2 + (y + 2)2 = 10', 1),
(39, 'What is the leading term in a polynomial function P(x) = 5 + 7x4 – 3x + 2x5?', '2', '3', '5', '7', '2', 1),
(40, 'A committee consisting of 4 males and 3 females is to be formed. In how many ways can the committee be formed if there are 8 females and 6 males available?', '840', '820', '780', '780', '820', 1),
(41, 'What quotient shall be obtained when (x+9) divides (x2 – 81)?', 'X+9', 'X-9', 'X-9', 'D 9X-1', 'X-9', 1),
(42, 'According to the World Happiness Report, Philippines Rank to what place?', 'a.)	61st', 'b.)	62nd', 'c.)	59th', 'd.)	60th', 'a.)	61st', 3),
(43, 'EUA in the vaccines stands for?', 'a.)	European Union Allowance', 'b.)	Examination Under Anesthesia', 'c.)	Emergency Use Authorization', 'd.)	End User Agreement', 'c.)	Emergency Use Authorization', 3),
(44, 'The misencounter of PDEA and PNP happens where?', 'a.)	Manila', 'b.)	Tarlac', 'c.)	Commonwealth', 'd.)	Bulacan', 'c.)	Commonwealth', 3),
(45, 'What important event is celebrated EVERY MARCH', 'a.)	International Women’s Day', 'b.)	Earth Day', 'c.)	National Colorectal Cancer Awareness Month', 'd.)	World Civil Defence Day', 'a.)	International Women’s Day', 3),
(46, 'What was the highest recorded number of Covid case ever recorded across this pandemic', 'a.)	8019', 'b.)	2012', 'c.)	3451', 'd.)	2341', 'a.)	8019', 3),
(47, 'How many years does Christianity existed here in the Philippines?', 'a.)	300', 'b.)	600', 'c.)	400', 'd.)	500', 'd.)	500', 3),
(48, 'It is the act of labeling, branding, naming and accusing individuals and/ or organizations of being left-learning, subversives, communists or terrorists (used as) a strategy by States agents, particularly law enforcement agencies and military, against those perceived to the ‘threats’ or ‘enemies of the State.', 'a.)	Red Tagging', 'b.)	Reds Taging', 'c.)	Read Taggeng', 'd.)	Red Taggings', 'a.)	Red Tagging', 3),
(49, 'The Philippines sports around____________ Chinese vessels, believed to be Chinese maritime militia, swarming a reef west of Palawan in the West Philippine Sea.', 'a.)	223', 'b.)	221', 'b.)	221', 'd.)	222', 'b.)	221', 3),
(50, 'Except Metro Manila, give at least ONE province in the Philippines that is part of the “Covid bubble” where cross border travel is restricted and is under GCQ', 'a.)	Pangasinan', 'b.)	Tarlac', 'c.)	Bulacan', 'd.)	Nueva Ecija', 'c.)	Bulacan', 3),
(51, 'Give at least one type of Vaccine that you are familiar with and has given EUA and FDA?', 'a.)	Novavax COVID-19 Vaccine', 'b.)	Pfizer', 'c.)	Moderna', 'd.)	Janssen', 'b.)	Pfizer', 3),
(52, 'What effect does the tilt of the earth have?', 'a.)	It changes the angle that the sun strikes the earth in the different land areas', 'b.)	 When the earth is titled away from the sun, we have night', 'c.)	 It causes the earth to be farther away from the sun at different times of the year', 'd.)	 When the earth is tilted away from the sun, we have day', 'a.)	It changes the angle that the sun strikes the earth in the different land areas', 3),
(53, 'Which of the following best describes the tilt of the Earth when it is summer in the Southern Hemisphere?', 'a.)	The Northern Hemisphere is tilted forward the sun', 'b.)	The Northern Hemisphere is tilted neither toward or away from the sun', 'c.)	 The Northern Hemisphere is tilted away from the sun', 'd.)	 Neither the Northern nor the southern hemisphere is tilted towards the sun.', 'c.)	 The Northern Hemisphere is tilted away from the sun', 3),
(54, 'In summer, the axis of the Earth is pointed__________ the sun?', 'a.)	Towards', 'b.)	Away', 'c.)	In line with', 'd.)	In front with', 'a.)	Towards', 3),
(55, '____________ are the reasons for the seasons.', 'a.)	Earth’s tilt resolution', 'b.)	Earth’s rotation and revolution', 'c.)	Earth’s tilt and rotation', 'd.)	Earth’s tilt and revolution', 'd.)	Earth’s tilt and revolution', 3),
(56, 'Why is it warmer in the summer?', 'a.)	Closer to the Sun', 'b.)	More direct light from Earth’s Tilt', 'c.)	Stronger light from the sun', 'd.)	Earth spins slower', 'b.)	More direct light from Earth’s Tilt', 3),
(57, 'In Position 2, ___________ is the season is taking place in the Northern Hemisphere?', 'a.)	Winter', 'b.)	Summer', 'c.)	Spring', 'd.)	Fall', 'c.)	Spring', 3),
(58, 'The Earth’s Tilt in degrees is', 'a.)	23.5 degrees', 'b.)	32.5 degrees', 'c.)	25.3 degrees', 'd.)	28.5 degrees', 'a.)	23.5 degrees', 3),
(59, 'hat season is letter A?', 'a.)	Spring', 'b.)	Winter', 'c.)	Summer', 'd.)	Fall', 'c.)	Summer', 3),
(60, 'What does a globe represent', 'a.)	 The solar System', 'b.)	 The Earth', 'c.)	 The Moon', 'd.)	 The Sun', 'b.)	 The Earth', 3),
(61, 'Which word means” the study of the Sun, Moon, Stars and Planets?', 'a.)	Astronomy', 'a.)	Astronomy', 'c.)	Globe', 'd.)	Temperature', 'a.)	Astronomy', 3),
(62, 'How long does it take for Earth to rotate one time around its axis?', 'a.)	One day', 'b.)	One month', 'c.)	Two days', 'd.)	One year', 'a.)	One day', 3),
(63, 'Which of the following gases contributes to the 21% of the Earth’s atmosphere?', 'a.)	Argon', 'b.)	Carbon dioxide', 'c.)	Nitrogen', 'd.)	Oxygen', 'd.)	Oxygen', 3),
(64, 'How do the biosphere and the atmosphere interact?', 'a.)	 Air contains water', 'b.)	Living things need air to survive', 'c.)	Volcanic ash can enter the atmosphere', 'd.)	None of the above', 'a.)	 Air contains water', 3),
(65, 'What word refers to the solid Earth?', 'a.)	Atmosphere', 'b.)	Geosphere', 'c.)	Biosphere', 'd.)	Hydrosphere', 'b.)	Geosphere', 3),
(66, 'What is a mineral?', 'a.)	A nonliving, solid material that has a definite chemical make up and is found in Earth’s crust.', 'b.)	The way a mineral shine, reflects light.', 'c.)	A measure of how easily a mineral can be scratched', 'd.)	None of the above', 'a.)	A nonliving, solid material that has a definite chemical make up and is found in Earth’s crust.', 3),
(67, 'What subsystem of the Earth is considered as the thin gaseous layer that envelopes the lithosphere?', 'a.)	Atmosphere', 'b.)	Hydrosphere', 'c.)	Biosphere', 'd.)	Lithosphere', 'a.)	Atmosphere', 3),
(68, 'Which of the following is NOT one of the four major’s geological subsystem of Earth?', 'a.)	Atmosphere', 'b.)	Hemisphere', 'c.)	Biosphere', 'd.)	Geosphere', 'b.)	Hemisphere', 3),
(69, 'Who uses the business plan to assess whether the entrepreneur will be able to meet the debt and interest payments?', 'a.	Lender', 'b.	Investor', 'c.	Trade Creditor', 'd.	None of the option', 'a.	Lender', 2),
(70, 'Which part of the business plan highlights the objectives and strategies developed to attract consumers and make the product known to the public?', 'a.	Marketing Plan', 'b.	Production Plan', 'c.	Management Plan', 'd.	Executive Plan', 'a.	Marketing Plan', 2),
(71, 'This is a business simulation activity wherein the organizational chart is completed.', 'a.	Marketing Aspect', 'b.	Operational Aspect', 'c.	Management Aspect', 'd.	Financial Aspect', 'c.	Management Aspect', 2),
(72, 'This is a type of discount where several discounts are applied to the same product.', 'a.	Trade Discount', 'b.	Discount Series', 'c.	Single Discount', 'd.	Discount Wave', 'b.	Discount Series', 2),
(73, 'If a blue paper is equivalent to 2 wholes, how much blue paper would you need to have 6 holes and a half?', 'a.	4 Blue papers', 'b.	2 ½ Blue papers', 'c.	3 ¼ Blue papers', 'd.	1 ¾ Blue papers', 'c.	3 ¼ Blue papers', 2),
(74, 'This is a marketing mix that refers to the way in which products are being delivered or distributed to customers?', 'a.	Product', 'b.	Promotion', 'c.	Place', 'd.	Price', 'c.	Place', 2),
(75, 'What is this kind of market segmentation wherein the market is based on consumer gender, age, income, occupation, education, and religion?', 'a.	Geographic', 'b.	Behavioral', 'c.	Psychographic', 'd.	Demographic', 'd.	Demographic', 2),
(76, 'What step in the entrepreneurial process pertains to the detection of opportunities that could make money for the entrepreneur?', 'a.	Implementation', 'b.	Concept Development', 'c.	Discovery', 'd.	Reaping the returns', 'c.	Discovery', 2),
(77, 'What is this source of business idea wherein an individual introduces his version of a product he once tasted in a country he visited?', 'a.	Process', 'b.	Person', 'c.	Product', 'd.	Relationship', 'b.	Person', 2),
(78, 'Which form of business organizations has the least ability to raise capital?', 'a.	Partnership', 'b.	Cooperative', 'c.	Sole-proprietorship', 'd.	Corporation', 'c.	Sole-proprietorship', 2),
(79, 'A baker can bake 240 cookies in 300 seconds. At this rate, how long would it take the baker to bake 600 cookies?', 'a.	900 seconds', 'b.	750 seconds', 'c.	850 seconds', 'd.	700 seconds', 'b.	750 seconds', 2),
(80, 'Green apples cost PHP 125 per kg. If a kilogram of green apples would have an average of 8 apples, how much was the % profit if the apples were sold at PHP 20 per piece?', 'a.	31%', 'b.	29%', 'c.	30%', 'd.	28%', 'd.	28%', 2),
(81, 'Which of the following refers to the place where selling and buying activities occurs to trade equity such as bonds and stocks?', 'a.	Financial Markets', 'b.	Market Place', 'c.	Financial Institutions', 'd.	Online shops', 'a.	Financial Markets', 2),
(82, 'Which of the following incorrectly describes the code of right conduct?', 'a.	Preferred behavior', 'b.	Bound to comply with law', 'c.	Ought to be follow by people outside the organization', 'd.	Set of organizational rules', 'c.	Ought to be follow by people outside the organization', 2),
(83, 'What are this thinking skills that involves assessing current situation that can be useful in formulating plans?', 'a.	Strategic thinking', 'b.	Creative thinking', 'c.	Critical thinking', 'd.	Logical thinking', 'a.	Strategic thinking', 2),
(84, 'These are Institutions or organizations that provide financial services in the form of loan, credit, fund administration, depository, and safekeeping.', 'a.	Financial Institutions', 'a.	Financial Institutions', 'c.	Banks', 'd.	 None of the options', 'a.	Financial Institutions', 2),
(85, 'Which is NOT negative?', 'a.	Withdrawal', 'a.	Withdrawal', 'c.	Loss', 'd.	Bonus', 'd.	Bonus', 2),
(86, 'Marina is a fresh graduate, and it is her first time be hired. Which of the following will guide her actions as she fulfills her job responsibilities?', 'a.	Code of right conduct', 'b.	Philosophy', 'c.	Moral Theory', 'd.	None of the options', 'a.	Code of right conduct', 2),
(87, 'Which of the following refers to how many levels of responsibility are in a business?', 'a.	Span of control', 'b.	Levels of hierarchy', 'c.	Delegation', 'd.	Centralization', 'b.	Levels of hierarchy', 2),
(88, 'Which of the following occurs when a manager gives authority for a particular decision but not the responsibility for the outcome of that decision?', 'a.	Delegation', 'b.	Chain of command', 'c.	Span of controls', 'd.	Centralization', 'a.	Delegation', 2),
(89, 'Not employing staff directly but using an outside agency or organization to carry out some business functions.', 'a.	Outsourcing', 'b.	HR planning', 'c.	Offshoring', 'd.	Recruitment', 'a.	Outsourcing', 2),
(90, 'Opposite of 142.', 'a.	-142', '142', 'c.	142', 'd.	-+142', 'a.	-142', 2),
(91, 'Boston has a temperature of -20 degrees. It is colder in New York than in Boston. Select the value that could represent the temperature of New York.', 'a.	0', 'b.	-30', 'c.	30', 'd.	-19', 'b.	-30', 2),
(92, 'Darrel is currently 20 feet below sea level. Which correctly describes the opposite of Darrel s elevation?', 'a.	20 feet below sea level', 'b.	2 feet below sea level', 'c.	20 feet above sea level', 'd.	At sea level', 'c.	20 feet above sea level', 2),
(93, 'What is Integer?', 'a.	A whole number', 'b.	A negative number only', 'c.	A fraction', 'd.	Negative and positive whole number and 0', 'd.	Negative and positive whole number and 0', 2),
(94, 'A variety of culinary preparations based on milk or cream cooked with egg yolk to thicken it.', 'a.	Flour', 'b.	Custard', 'c.	Corn Starch', 'd.	Egg', 'b.	Custard', 4),
(95, 'The most nutritious and balanced foods available to humans.', 'a.	Eggs', 'b.	Fish', 'c.	Chicken', 'd.	Organic Yogurt', 'a.	Eggs', 4),
(96, 'A kind of salad includes salad variants that are very popular nowadays.', 'a.	Thai beef salad', 'b.	Vegetable salad', 'c.	Mixed salad', 'd.	Contemporary salad', 'd.	Contemporary salad', 4),
(97, 'A kind of salad includes salad variants that are very popular nowadays.', 'a.	Thai beef salad', 'b.	Vegetable salad', 'c.	Mixed salad', 'd.	Contemporary salad', 'd.	Contemporary salad', 4),
(98, 'A lot like classical sauces in the sense that they consist of a liquid plus a thickener.', 'a.	Pureed Soups', 'b.	Soup', 'c.	Gravy', 'd.	Vegetable soup', 'a.	Pureed Soups', 4),
(99, 'A simple combination of flour and oil.', 'a.	Roux', 'b.	White Roux', 'c.	Blonde Roux', 'd.	Brown Roux', 'a.	Roux', 4),
(100, 'A great determinant of flavor in food.', 'a.	Beef Stock', 'b.	Stocks', 'c.	Pork Stock', 'd.	Chicken Stock', 'b.	Stocks', 4),
(101, 'It adds color, texture, and form to the salad, and often gives the overall taste of the salad a boost.', 'a.	Floral Garnish', 'b.	Vegetable Garnish', 'c.	Chicken Skin-Garnish', 'd.	Garnish', 'd.	Garnish', 4),
(102, 'dish made from rice mixed with water or milk and other ingredients.', 'a.	Rice pudding', 'b.	Vanilla pudding', 'c.	Chocolate pudding', 'd.	Simple Bread pudding', 'a.	Rice pudding', 4),
(103, 'Promotes the growth of healthy hair and nails.', 'a.	Sulfur tablets', 'b.	Sulfur sticks', 'c.	Sulfur', 'd.	Sulfur powder', 'c.	Sulfur', 4),
(104, 'A liquid food especially with a meat, fish, or vegetable stock as a base and often containing pieces of solid food.', 'a.	Fish Soup', 'b.	Chicken Soup', 'c.	Vegetable Soup', 'd.	Soup', 'd.	Soup', 4),
(105, 'An emulsion of butter and lemon.', 'a.	Holandaise', 'b.	Hollandaise', 'c.	Hollandase', 'd.	hollandise', 'b.	Hollandaise', 4),
(106, 'The second most important contributors of flavor to stocks.', 'a.	Mirepoix', 'b.	Mirpoix', 'c.	Mirepox', 'd.	Merpoix', 'a.	Mirepoix', 4),
(107, 'A dessert made by freezing liquids, semi-solids, and sometimes even solids.', 'a.	Ice Cream', 'b.	Gelato', 'c.	Frozen Dessert', 'd.	Snow Cone', 'c.	Frozen Dessert', 4),
(108, 'An artful arrangement of greens, hard-boiled egg, smoked tofu, beets, and snap peas drizzled with a cool, creamy dill dressing.', 'a. Composed Salad', 'b.  Smoked tofu', 'c. Dressing', 'D. Composed', 'D. Composed', 4),
(109, 'It is made by whisking egg whites and yolks in a bowl together with water or milk.', 'a.	Scrambled tofu', 'b.	Scrambled egg', 'c.	Egg', 'd.	Tofu', 'b.	Scrambled egg', 4),
(110, 'An amber liquid made by first browning or roasting poultry, beef, or veal bones.', 'a.	Brown stocks', 'b.	Roasting poultry', 'c.	Veal bones', 'd.	Browning', 'a.	Brown stocks', 4),
(111, 'A simple milk-based sauce made from butter, flour, and whole milk.', 'a.	White Sauce', 'b.	Sauce', 'c.	Milk', 'd.	Milk-based', 'a.	White Sauce', 4),
(112, 'A smooth, creamy, highly seasoned soup of French origin, classically based on a strained broth of crustaceans.', 'a.	Lobster Bisque', 'b.	Shrimp Bisque', 'c.	Crab Bisque', 'd.	Bisque', 'd.	Bisque', 4),
(113, 'Vital in presentation of the dessert.', 'a.	Vintage', 'b.	Pastel', 'c.	Color', 'd.	Passion', 'c.	Color', 4),
(114, 'A cold dish of various mixtures of raw or cooked vegetables, usually seasoned with oil, vinegar, or other dressing and sometimes accompanied by meat, fish, or', 'a.	Salad', 'b.	Vegetable Salad', 'c.	Salad of pasta', 'd.	Fruit Salad', 'a.	Salad', 4),
(115, 'A dish made by beaten eggs that are cooked in a skillet\r\nwith butter or oil.', 'a.	Hardboiled egg', 'b.	Egg pie', 'c.	Omelet', 'd.	Egg salad', 'c.	Omelet', 4),
(116, 'The sweet course eaten at the end of a meal.', 'a.	Ice cream', 'b.	Dessert', 'c.	Fruit', 'd.	Side dish', 'b.	Dessert', 4),
(117, 'A particular variation on the traditional soup, wherein the temperature when served is kept at or below room temperature.', 'a.	Hot soups', 'b.	Cold Soups', 'c.	Warm soups', 'd.	Egg Drop soups', 'b.	Cold Soups', 4),
(118, 'Most of the flavor and body and the major ingredients of stocks.', 'a.	Bone marrow', 'b.	Pecho Chicken', 'c.	Bones', 'd.	Stocks', 'c.	Bones', 4),
(119, 'A translucent, colorless, flavorless food ingredient, derived from collagen taken from animal body parts.', 'a.	Gelatin', 'b.	Gulaman', 'c.	Collagen', 'c.	Collagen', 'a.	Gelatin', 1),
(121, '1 + 1 = ?', '1', '2', '32', '4', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `youcomment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `username`, `lrn`, `date`, `time`, `youcomment`) VALUES
(2, '', '101729060090', '2023-01-03', '04:35 am', 'Strand Recommender System is the Best!'),
(3, '', '101729060055', '2023-01-03', '02:28 pm', 'Jomelyn menor'),
(4, '', '101729060077', '2023-01-05', '01:24 pm', 'Harold yung chat bot'),
(5, '', '101729060022', '2023-02-05', '02:00 am', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `list_survey`
--

CREATE TABLE `list_survey` (
  `id` int(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `list_survey`
--

INSERT INTO `list_survey` (`id`, `lrn`, `question`, `answer`) VALUES
(133, '101729060071', 'What is important to me?', '1'),
(134, '101729060071', 'What careers seem interesting to me? Why?', '2'),
(135, '101729060071', 'Who has influenced my ideas about my career options?', '3'),
(136, '101729060071', 'What career paths can I cross off my list?', '4'),
(137, '101729060071', 'What impact do I want to make on the world?', '5'),
(138, '101729060071', 'What topics and ideas spark my curiosity?', '6'),
(139, '101729060071', 'What do I “geek” over? What could I talk about for hours?', '7'),
(140, '101729060071', 'What comes naturally to me?', '8'),
(141, '101729060071', 'How do I like to spend my time?', '9'),
(142, '101729060071', 'What are my favorite classes, and why?', '10'),
(143, '101729060071', 'What extracurricular activities do I enjoy? What have I learned about myself from participating in the activities?', '11'),
(144, '101729060071', 'Who do I look up to? What about them inspires or motivates me?', '12'),
(145, '101729060071', 'What personal qualities do I view as my strengths', '13'),
(146, '101729060071', 'What activities make me feel happy or energized?', '14'),
(147, '101729060071', 'When do I feel most comfortable and at ease?', '15'),
(148, '101729060071', 'What are the biggest lessons I’ve learned so far?', '16'),
(149, '101729060071', 'How do I define success?', '17'),
(150, '101729060071', 'If I were guaranteed success, what would I do?', '18'),
(151, '101729060071', 'When have I been most inspired or most motivated?', '19'),
(152, '101729060071', 'What careers seem interesting to me', '20'),
(153, '101729060071', 'How do I like to spend my time', '21');

-- --------------------------------------------------------

--
-- Table structure for table `take_survey`
--

CREATE TABLE `take_survey` (
  `id` int(255) NOT NULL,
  `survey_question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `take_survey`
--

INSERT INTO `take_survey` (`id`, `survey_question`) VALUES
(1, 'What is important to me?'),
(2, 'What careers seem interesting to me? Why?'),
(3, 'Who has influenced my ideas about my career options?'),
(4, 'What career paths can I cross off my list?'),
(5, 'What impact do I want to make on the world?'),
(6, 'What topics and ideas spark my curiosity?'),
(7, 'What do I “geek” over? What could I talk about for hours?'),
(8, 'What comes naturally to me?'),
(9, 'How do I like to spend my time?'),
(10, 'What are my favorite classes, and why?'),
(11, 'What extracurricular activities do I enjoy? What have I learned about myself from participating in the activities?'),
(12, 'Who do I look up to? What about them inspires or motivates me?'),
(13, 'What personal qualities do I view as my strengths'),
(14, 'What activities make me feel happy or energized?'),
(15, 'When do I feel most comfortable and at ease?'),
(16, 'What are the biggest lessons I’ve learned so far?'),
(17, 'How do I define success?'),
(18, 'If I were guaranteed success, what would I do?'),
(19, 'When have I been most inspired or most motivated?'),
(22, 'What careers seem interesting to me'),
(23, 'How do I like to spend my time');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `email_guardian` varchar(128) DEFAULT NULL,
  `lrn` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `math` varchar(255) NOT NULL,
  `science` varchar(255) NOT NULL,
  `abm` int(255) NOT NULL,
  `stem` int(255) NOT NULL,
  `cookery` int(255) NOT NULL,
  `humss` int(255) NOT NULL,
  `take_exam` int(2) NOT NULL,
  `section` varchar(100) NOT NULL,
  `take_survey` int(5) NOT NULL,
  `take_forum` int(50) NOT NULL,
  `examtime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`id`, `fname`, `lname`, `mname`, `email_guardian`, `lrn`, `password`, `usertype`, `math`, `science`, `abm`, `stem`, `cookery`, `humss`, `take_exam`, `section`, `take_survey`, `take_forum`, `examtime`) VALUES
(5, 'Teacher 2', '', '', NULL, '101729060075', 'f5bb0c8de146c67b44babbf4e6584cc0', 'teacher', '', '', 0, 0, 0, 0, 0, 'Rizal', 0, 0, ''),
(20, 'Counselor', '', '', NULL, '101729060099', 'f5bb0c8de146c67b44babbf4e6584cc0', 'counselor', '', '', 0, 0, 0, 0, 0, '', 0, 0, ''),
(26, 'Seveses', 'Angeline', 'Distor', NULL, '101729060022', 'f5bb0c8de146c67b44babbf4e6584cc0', 'student', '', '', 16, 36, 32, 40, 1, 'Quezon', 0, 1, '2023-02-04 / 12 : 26 pm'),
(28, 'Josh', 'Maurice', 'Vino', 'jici@mailinator.com', '123456789123', '5f4dcc3b5aa765d61d8327deb882cf99', 'student', '', '', 0, 0, 0, 0, 0, 'Mabini', 0, 0, ''),
(29, 'Sandra', 'Calvin', 'Olivia', 'juana@example.com', '123456789012', 'f5bb0c8de146c67b44babbf4e6584cc0', 'student', '', '', 0, 0, 0, 0, 0, 'Quezon', 0, 0, ''),
(30, 'Teacher 1', '', '', NULL, '101729060076', 'f5bb0c8de146c67b44babbf4e6584cc0', 'teacher', '', '', 0, 0, 0, 0, 0, 'Quezon', 0, 0, ''),
(32, 'Teacher 3', '', '', NULL, '101729060078', 'f5bb0c8de146c67b44babbf4e6584cc0', 'teacher', '', '', 0, 0, 0, 0, 0, 'Mabini', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ann_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `post_id` (`ann_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_survey`
--
ALTER TABLE `list_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `take_survey`
--
ALTER TABLE `take_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_guardian_unique` (`email_guardian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ann_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `list_survey`
--
ALTER TABLE `list_survey`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `take_survey`
--
ALTER TABLE `take_survey`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcements`
--
ALTER TABLE `announcements`
  ADD CONSTRAINT `announcements_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `userlogin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `userlogin` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`ann_id`) REFERENCES `announcements` (`ann_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
