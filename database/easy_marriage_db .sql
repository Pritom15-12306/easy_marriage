-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 10:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `easy_marriage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=active , 2=Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `tour_location`, `description`, `upload_path`, `status`, `date_created`) VALUES
(8, 'Holud Ceremony of Naimul & Jhumu', 'orchid community centre', '&lt;p&gt;&lt;font color=&quot;#000000&quot; style=&quot;background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px;&quot;&gt;&ldquo;If you live to be a hundred, I want to live to be a hundred minus one day, so I never have to live without yo&lt;/span&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px;&quot;&gt;u.&rdquo;&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&ldquo;&ldquo;The highest happiness on earth is the happiness of marriage.&rdquo;&rdquo;&lt;/font&gt;&lt;/span&gt;&lt;font color=&quot;#000000&quot; style=&quot;background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px;&quot;&gt;&lt;br&gt;&lt;/span&gt;&lt;/font&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;&ldquo; A wedding is a collective name used for all the ceremonies and rituals that take place to give social acceptance to the relationship between two people, whereas marriage is the name of a life long institution, which starts after the wedding.&rdquo;&lt;/font&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/blog_8', 0, '2022-12-28 04:39:14'),
(9, 'Wedding Of Naimul & Jhumu', 'Xinxian Restaurant, Mirpur-2', '&lt;p&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;A wedding is a collective name used for all the ceremonies and rituals that take place to give social acceptance to the relationship between two people, whereas marriage is the name of a lifelong institution, which starts after the wedding.&lt;/font&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/blog_9', 1, '2022-12-28 05:11:20'),
(10, 'Reception Of Naimul & Jhumu ', 'Chowdhury Community Centre, Dhanmondi', '&lt;p&gt;&lt;span style=&quot;font-family: Raleway, sans-serif; font-size: 17px; background-color: rgb(255, 255, 255);&quot;&gt;&lt;font color=&quot;#000000&quot;&gt;A wedding is a collective name used for all the ceremonies and rituals that take place to give social acceptance to the relationship between two people, whereas marriage is the name of a lifelong institution, which starts after the wedding.&lt;/font&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/blog_10', 1, '2022-12-28 05:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `book_list`
--

CREATE TABLE `book_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=confirm, 2=cancelled\r\n',
  `schedule` date DEFAULT NULL,
  `mobile_number` varchar(75) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_list`
--

INSERT INTO `book_list` (`id`, `user_id`, `package_id`, `status`, `schedule`, `mobile_number`, `date_created`) VALUES
(30, 8, 15, 3, '2022-12-25', '', '2022-12-25 17:56:22'),
(35, 10, 15, 2, '2023-01-23', '', '2022-12-27 03:13:41'),
(37, 11, 17, 1, '2023-02-01', '', '2022-12-28 03:58:42'),
(38, 9, 17, 2, '2022-12-30', '', '2022-12-29 17:02:26'),
(40, 9, 19, 3, '2023-01-12', '01778267062', '2022-12-31 09:35:19'),
(43, 11, 17, 1, '2022-12-31', '01787777291', '2022-12-31 10:03:09');

-- --------------------------------------------------------

--
-- Table structure for table `inquiry`
--

CREATE TABLE `inquiry` (
  `id` int(30) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  `message` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiry`
--

INSERT INTO `inquiry` (`id`, `name`, `email`, `subject`, `message`, `status`, `date_created`) VALUES
(31, 'Naimul Huda Walid', 'naimul15-12090@diu.edu.bd', 'shop', NULL, 1, '2022-11-05 15:15:58'),
(32, 'Naimul Huda Walid', 'thuhinwalid1000@gmail.com', 'about your service', NULL, 1, '2022-11-05 15:27:02'),
(35, 'pritom', 'thuhinwalid1000@gmail.com', 'test', 'hello bangladesh.', 1, '2022-12-04 00:08:56'),
(38, 'Naimul Huda Walid', 'naimul15-12090@diu.edu.bd', 'about your service', 'hi i need new car services.', 1, '2022-12-27 22:24:14');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `image`) VALUES
(1, 'Perfume', '6000', 'product1.png'),
(2, 'Jualary', '10000', 'product2.png'),
(3, 'Wedding Dress', '15000', 'product3.png'),
(4, 'Wedding Ring', '5000', 'product4.png'),
(6, 'Man Wedding Dress', '12000', 'product5.png'),
(7, 'Wedding Watch', '4500', 'product6.png'),
(8, 'Couple Watch', '8000', 'product7.png'),
(9, 'Gift Pack', '3000', 'product8.png'),
(10, 'Panjabi', '2500', 'panjabi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `Item_id` varchar(191) NOT NULL,
  `total_price` varchar(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `email`, `phone`, `address`, `Item_id`, `total_price`, `payment_mode`) VALUES
(33, 'walid', 'ash@gmail.com', '01778267062', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '11', '1200', ''),
(34, 'ashvik', 'a@gmail.com', '+8801778267061', ' Mirpur-2 , Dhaka', '4', '5000', ''),
(35, 'zareen', 'z@gmail.com', '01778267062', 'Dhaka', '4,6', '17000', 'cod'),
(47, 'walid', 'naimul15-12090@diu.edu.bd', '01778267062', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '2', '10000', 'CashOnDelivery'),
(48, 'walid', 'thuhinwalid1000@gmail.com', '01778267062', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '11', '1200', 'CashOnDelivery'),
(49, 'zareen', 'thuhinwalid1000@gmail.com', '+8801778267061', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '1,2,3', '17000', 'CashOnDelivery'),
(50, 'zareen', 'thuhinwalid1000@gmail.com', '+8801778267061', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '1,2,3', '17000', 'CashOnDelivery'),
(51, 'ashvik', 'thuhinwalid1000@gmail.com', '+8801778267061', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '3,6,9', '1111111', 'CashOnDelivery'),
(52, 'ashvik', 'thuhinwalid1000@gmail.com', '+8801778267061', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '3,6,9', '1111111', 'CashOnDelivery'),
(53, 'walid', 'kazi.shahed93@gmail.com', '+8801778277061', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '2', '1200', 'CashOnDelivery'),
(54, 'ashvik', 'thuhinwalid1000@gmail.com', '+8801778277061', '667/5/1 , Molla Road , Mirpur-2 , Dhaka', '1', '6000', 'CashOnDelivery');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `Item_Id` int(191) NOT NULL,
  `item_name` varchar(191) NOT NULL,
  `item_price` int(191) NOT NULL,
  `item_quantity` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `cost` double NOT NULL,
  `description` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 =active ,2 = Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `title`, `tour_location`, `cost`, `description`, `upload_path`, `status`, `date_created`) VALUES
(13, 'Social distance wedding  ', 'Dhaka,Bangladesh', 400000, '&lt;p&gt;&lt;a href=&quot;https://www.weddingwire.com/wedding-ideas/coronavirus-wedding-questions&quot; style=&quot;margin: 0px; padding: 0px; color: rgb(34, 34, 34); transition: color 0.15s ease 0s; text-decoration-line: underline; word-break: break-word; font-family: ProximaNova, ProximaNova-fallback-Arial, sans-serif; font-size: 18px; background-color: rgb(255, 255, 255);&quot;&gt;The coronavirus pandemic&lt;/a&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: ProximaNova, ProximaNova-fallback-Arial, sans-serif; font-size: 18px;&quot;&gt;&amp;nbsp;has made it near-impossible for couples to carry out what is considered to be a &ldquo;normal&rdquo; wedding, where guests mingle and are in close proximity to one another. This has given way to the formation of what&rsquo;s being considered a social distance wedding. &ldquo;This is a combination of any of the smaller types of weddings plus a virtual wedding,&rdquo; says Chang. &ldquo;It allows for couples to have more guests in &lsquo;attendance&rsquo; virtually without actually increasing the size of the wedding and number of people in person.&rdquo;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/package_13', 0, '2022-08-31 16:46:46'),
(15, 'Formal/Traditional Wedding ', 'Dhaka,Bangladesh', 500000, '&lt;p&gt;&lt;span style=&quot;background-color: rgb(255, 255, 255);&quot;&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: Georgia, serif; font-size: 18px;&quot;&gt;Considering a black-tie wedding? If you envision you and your guests dressing to the nines, your overall theme will have to match accordingly. For nuptials this grandiose, you\'ll want to pull out all the stops and include complete&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://www.brides.com/story/formal-wedding-reception-table-setting-etiquette&quot; data-component=&quot;link&quot; data-source=&quot;inlineLink&quot; data-type=&quot;internalLink&quot; data-ordinal=&quot;1&quot; rel=&quot;noopener noreferrer&quot; style=&quot;box-sizing: inherit; margin: 0px; padding: 0px; font-size: 18px; vertical-align: baseline; background-image: linear-gradient(rgb(29, 115, 139), rgb(29, 115, 139)); background-position: 0px 100%; background-size: 2px 1px; background-repeat: repeat-x; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34); display: inline; font-family: Georgia, serif;&quot;&gt;table settings&lt;/a&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: Georgia, serif; font-size: 18px;&quot;&gt;&amp;nbsp;(wine glasses and all) with a full sit-down dinner, posh seating, ornate flower arrangements (even on the cake), and an exquisite&amp;nbsp;&lt;/span&gt;&lt;a href=&quot;https://www.brides.com/gallery/fall-wedding-decor-ideas-head-table&quot; data-component=&quot;link&quot; data-source=&quot;inlineLink&quot; data-type=&quot;internalLink&quot; data-ordinal=&quot;2&quot; rel=&quot;noopener noreferrer&quot; style=&quot;box-sizing: inherit; margin: 0px; padding: 0px; font-size: 18px; vertical-align: baseline; background-image: linear-gradient(rgb(29, 115, 139), rgb(29, 115, 139)); background-position: 0px 100%; background-size: 2px 1px; background-repeat: repeat-x; background-attachment: initial; background-origin: initial; background-clip: initial; color: rgb(34, 34, 34); display: inline; font-family: Georgia, serif;&quot;&gt;head table&lt;/a&gt;&lt;span style=&quot;color: rgb(34, 34, 34); font-family: Georgia, serif; font-size: 18px;&quot;&gt;, just to name a few formalities.&lt;/span&gt;&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/package_15', 1, '2022-08-31 17:23:11'),
(17, 'cultural wedding', 'dhaka', 500000, '&lt;p&gt;&lt;span style=&quot;font-size:12.0pt;line-height:150%;\r\nfont-family:&amp;quot;Times New Roman&amp;quot;,serif;mso-fareast-font-family:Calibri;mso-ansi-language:\r\nEN-US;mso-fareast-language:AR-SA;mso-bidi-language:AR-SA&quot;&gt;A wedding is one of\r\nthe most important events in our country. Cultural and ritual diversity makes\r\nit more beautiful. A wedding ceremony seems like a single event but it is a\r\ncombination of multiple services. Maintaining those services according to\r\nbudget and time management is very important. An organized event is pleasing\r\nbut an unorganized event can create chaos. At the traditional wedding, we have\r\nto follow all the rituals according to the culture. As a developing country,&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/package_17', 1, '2022-12-21 03:43:23'),
(19, 'Traditional Pakistani Wedding', 'Inside Dhaka Division ', 514498, '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Package Inclusions&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;Price&lt;/b&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Venue&amp;nbsp;&lt;br&gt;&lt;/td&gt;&lt;td&gt;150,000&amp;nbsp;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Decoration&lt;br&gt;&lt;/td&gt;&lt;td&gt;80,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Catering (cost for 100 people, customizable)&lt;br&gt;&lt;/td&gt;&lt;td&gt;100,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Photography &amp;amp; Cinematography&amp;nbsp;&lt;br&gt;&lt;/td&gt;&lt;td&gt;94,999&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Wedding Card (cost for 100 cards, customizable)&lt;br&gt;&lt;/td&gt;&lt;td&gt;12,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Wedding Car ( Range Rover, Mercedes, BMW)&lt;span style=&quot;white-space:pre&quot;&gt;	&lt;/span&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;30,000&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Lighting and Sound system&lt;br&gt;&lt;/td&gt;&lt;td&gt;21,500&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Cultural Music Events&lt;/td&gt;&lt;td&gt;25,999&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;Marriage Officiant(Kazi)&lt;br&gt;&lt;/td&gt;&lt;td&gt;Depends on your den mohur&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Total&lt;/b&gt;&lt;/td&gt;&lt;td&gt;5,14,498&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;p&gt;&lt;b&gt;***All Package Inclusions are customizable. if you customize any service then the price may change. ***&amp;nbsp;&amp;nbsp;&lt;/b&gt;&lt;br&gt;&lt;/p&gt;', 'uploads/package_19', 0, '2022-12-28 03:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `rate_review`
--

CREATE TABLE `rate_review` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `rate` int(11) NOT NULL,
  `review` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(30) NOT NULL,
  `title` text DEFAULT NULL,
  `tour_location` text DEFAULT NULL,
  `cost` double NOT NULL,
  `description` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 =active ,2 = Inactive',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `tour_location`, `cost`, `description`, `upload_path`, `status`, `date_created`) VALUES
(1, 'Wedding Car Rentals (Luxury)', 'We provide best wedding car rentals with good car decoration themes. we also can decorate according to your requirements.', 150000, '&lt;p&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;table class=&quot;table table-bordered&quot;&gt;&lt;tbody&gt;&lt;tr&gt;&lt;td&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;&lt;span style=&quot;font-size: 18px;&quot;&gt;&lt;font color=&quot;#ce0000&quot;&gt;CAR SERVICE-1&lt;/font&gt;&lt;/span&gt;&lt;/span&gt;&lt;br&gt;&lt;/td&gt;&lt;td&gt;&lt;br&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;wedding Car Name:&amp;nbsp;&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;Mercedes&amp;nbsp;Benz / BMW / Rolls&amp;nbsp;Royal&lt;/b&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;guest car:&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;2&lt;/b&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Costing:&amp;nbsp;&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;BDT 150000&lt;/b&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Timeline:&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;3 Days&lt;/b&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Gas:&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;b&gt;Owner&lt;/b&gt;&lt;/td&gt;&lt;/tr&gt;&lt;tr&gt;&lt;td&gt;&lt;b&gt;Parking:&lt;/b&gt;&lt;/td&gt;&lt;td&gt;&lt;p&gt;&lt;b&gt;Owner&lt;/b&gt;&lt;/p&gt;&lt;/td&gt;&lt;/tr&gt;&lt;/tbody&gt;&lt;/table&gt;&lt;br&gt;&lt;p&gt;&lt;/p&gt;', 'uploads/services_1', 1, '2022-09-13 11:10:14'),
(7, 'Catering 01', 'Be assured of the fact that the food is prepared & served under hygienic conditions and all rates are inclusive of top-class service, crockery & cutlery. If you want your wedding to have a flavour of a lifetime this is the team for you to choose.', 700, '&lt;p&gt;&lt;font color=&quot;#ce0000&quot;&gt;&lt;b&gt;*** Costing is for per person***&lt;/b&gt;&lt;/font&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Wedding: Set Menu 01&amp;nbsp;&lt;/b&gt;&lt;/font&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Mutton Katchi Biryani&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Chicken Roast&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Jali Kebab&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Shahi Jorda(with Baby sweets)&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Sahi Borhani/Soft Drinks&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Alu Bukhara Chatni&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Salad(Mixed/Piece)&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;li&gt;&lt;font color=&quot;#000000&quot;&gt;&lt;b&gt;Mineral Water&lt;/b&gt;&lt;/font&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;font color=&quot;#ce0000&quot;&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;*** we can also make any food items according to your &lt;/span&gt;&lt;b style=&quot;&quot;&gt;requirements&lt;/b&gt;&lt;span style=&quot;font-weight: bolder;&quot;&gt;.***&lt;/span&gt;&lt;/font&gt;&lt;/p&gt;', 'uploads/services_7', 1, '2022-11-09 22:34:18'),
(8, 'Catering 02', 'Be assured of the fact that the food is prepared & served under hygienic conditions and all rates are inclusive of top-class service, crockery & cutlery. If you want your wedding to have a flavour of a lifetime this is the team for you to choose.', 1050, '&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;*** Costing is per person***&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;&lt;br&gt;&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;Wedding: Set Menu 01&amp;nbsp;&lt;/b&gt;&lt;/p&gt;&lt;ol&gt;&lt;li&gt;&lt;b&gt;Katchi&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Chicken Roast&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Porota&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Chicken Grill&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Shahi Jorda(with Baby sweets)&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Sahi Borhani/Soft Drinks&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Fish Fry&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Salad(Mixed/Piece)&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;prawn fry&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;Mineral Water&lt;/b&gt;&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;&lt;b&gt;*** we can also make any food items according to your requirements.***&lt;/b&gt;&lt;/p&gt;', 'uploads/servicese_8', 1, '2022-12-28 03:40:02'),
(9, 'Wedding Card', 'An Invitation Card is a tool to invite people to your special events such as a Birthday party, Anniversary party, Wedding party, etc.', 45, '&lt;p&gt;&lt;b&gt;*** cost is per card.***&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;lowest price of our card is 45.00 taka&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt; and the highest one is 500 taka.&lt;/b&gt;&lt;/p&gt;&lt;p&gt;&lt;b&gt;if you like any card we can customize it for you.&lt;/b&gt;&lt;/p&gt;', 'uploads/servicese_9', 1, '2022-12-28 03:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `services_book`
--

CREATE TABLE `services_book` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `package_id` int(30) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending,1=confirm, 2=cancelled	',
  `schedule` date DEFAULT NULL,
  `mobile_number` varchar(75) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_book`
--

INSERT INTO `services_book` (`id`, `user_id`, `package_id`, `status`, `schedule`, `mobile_number`, `date_created`) VALUES
(23, 8, 1, 3, '2022-12-27', NULL, '2022-12-25 21:30:44'),
(27, 8, 7, 2, '2022-12-26', NULL, '2022-12-25 22:19:35'),
(28, 8, 1, 0, '2022-12-29', NULL, '2022-12-26 21:41:20'),
(30, 9, 1, 1, '2022-12-30', NULL, '2022-12-27 02:59:56'),
(31, 10, 7, 1, '2023-01-23', NULL, '2022-12-27 03:15:06'),
(32, 9, 1, 3, '2023-01-25', NULL, '2022-12-28 03:57:52'),
(33, 11, 9, 0, '2023-02-01', NULL, '2022-12-28 03:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Easy Marriage'),
(6, 'short_name', 'Admin Panel'),
(11, 'logo', 'uploads/1668003540_IMG_39241.jpg'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1661929500_banner5.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1672264680_DSC05710.JPG', NULL, 1, '2021-01-20 14:02:37', '2022-12-29 03:58:08'),
(8, 'naimul huda', 'walid', 'ashvik', '04fe6bc116f014e425c50354cda8af8e', NULL, NULL, 0, '2022-09-24 12:20:19', '2022-12-02 23:26:21'),
(9, 'Pritom', 'Saha', 'Pritom Saha', 'dbb36bc70d65f35a7689757577f54eaf', NULL, NULL, 0, '2022-12-27 00:30:49', NULL),
(10, 'Md Hasan ', 'Ibne Kamal', 'Hasan', 'f690d3b8d4b51c1f189d886b7bab26b7', NULL, NULL, 0, '2022-12-27 03:12:13', NULL),
(11, 'rabib', 'huda', 'rabib', '9cfc123da06f8d67edd09c8fb00d1069', NULL, NULL, 0, '2022-12-27 21:26:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `id` int(30) NOT NULL,
  `husband_name` text DEFAULT NULL,
  `wife_name` text DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `upload_path` text DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`id`, `husband_name`, `wife_name`, `feedback`, `upload_path`, `date_created`) VALUES
(23, 'Kajol', 'Sahanaz', 'I highly recommend hiring a wedding coordinator for the day of. You don&#039;t want to deal with the craziness. You also don&#039;t want a friend or relative helping out as the coordinator because they will not be able to fully enjoy the wedding as a guest.', 'uploads/feedback_23', '2022-12-31 05:43:50'),
(24, 'Naimul', 'Jhumu', '&quot;To accomplish great things, we must not only act, but also dream; not only plan, but also believe.&quot;', 'uploads/feedback_24', '2022-12-31 05:55:05'),
(25, 'Rassul', 'Zafreen', '&quot;Love has nothing to do with what you are expecting to get, only with what you are expecting to give-which is everything.&quot;', 'uploads/feedback_25', '2022-12-31 06:21:09'),
(26, 'Rony', 'Promy', '&quot;But love doesn&#039;t make sense. You can&#039;t logic your way into or out of it. Love is totally nonsensical. But we have to keep doing it or else we&#039;re lost and love is dead and humanity should just pack it in. Because love is the best thing we do.&quot; ', 'uploads/feedback_26', '2022-12-31 06:23:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_list`
--
ALTER TABLE `book_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiry`
--
ALTER TABLE `inquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rate_review`
--
ALTER TABLE `rate_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_book`
--
ALTER TABLE `services_book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_list`
--
ALTER TABLE `book_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `inquiry`
--
ALTER TABLE `inquiry`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `rate_review`
--
ALTER TABLE `rate_review`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `services_book`
--
ALTER TABLE `services_book`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
