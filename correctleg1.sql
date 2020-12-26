-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2020 at 02:33 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `correctleg1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `activebalance` varchar(500) NOT NULL,
  `pendingbalance` varchar(500) NOT NULL,
  `clearancesale` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `uniqueid`, `activebalance`, `pendingbalance`, `clearancesale`) VALUES
(1, '5ee5d1397026a', '4200', '15400', 'On');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `is_super_admin` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `is_super_admin`) VALUES
(1, 'Admin', '$2y$10$rkWc0iANWuMznT1PUkN7meOLPp2NiuneTWbckIFYdk2G.u2AXd40a', 'yes'),
(3, 'Admin1', '$2y$10$IlF3/B.dtQxGXTIXJyX1N.hhWjOAQfn7jJsdy5LnHK1Rvkjtt1zoG', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `id` int(11) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `bank` varchar(500) NOT NULL,
  `accountname` varchar(500) NOT NULL,
  `accountnumber` varchar(500) NOT NULL,
  `accounttype` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`id`, `sellerid`, `bank`, `accountname`, `accountnumber`, `accounttype`) VALUES
(1, '5edb8099d21a7', 'Guarantee Trust Bank', 'Emmanuel Danjumbo', '0237680867', 'Savings'),
(2, '5f06ede19846e', 'Guarantee Trust Bank', '65688877', '8885558', 'Savings'),
(3, '5f06f4fd3f05d', 'United Bank of Africa', '1111111', '111111', 'Savings'),
(4, '5f0704df77864', 'First Bank', 'Glory', '0802898162', 'Savings'),
(5, '5f07280510ed8', 'First Bank', '082085085', '085052085', 'Savings'),
(6, '5f075c166c995', 'United Bank of Africa', '0805623', '0845755768', 'Savings'),
(7, '5f08427d6e1e3', 'Guarantee Trust Bank', '452536', '0159830375', 'Savings'),
(8, '5f119b1587441', 'First Bank', '65688877', '8885558', 'Savings'),
(9, '5f20733bbfc2e', 'United Bank of Africa', 'Mat Mathew', '09320122301', 'Savings'),
(10, '5f8d588e8c934', 'Citibank Nigeria Limited', 'Oke John', '3765378937', 'Savings'),
(11, '5fd1abfb3fd59', 'United Bank for Africa', 'DAN-JUMBO EMMANUEL IYOWUNA', '2111665752', 'Savings'),
(12, '5fddafa0abef3', 'GTBank Plc', 'DAN-JUMBO  EMMANUEL IYOWUNA', '0237680867', 'Savings'),
(13, '5fddeb4a339e1', 'GTBank Plc', 'DAN-JUMBO  EMMANUEL IYOWUNA', '0237680867', 'Savings');

-- --------------------------------------------------------

--
-- Table structure for table `businessdetails`
--

CREATE TABLE `businessdetails` (
  `id` int(11) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `companyname` varchar(500) NOT NULL,
  `country` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `website_url` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businessdetails`
--

INSERT INTO `businessdetails` (`id`, `sellerid`, `logo`, `companyname`, `country`, `region`, `gender`, `website_url`) VALUES
(3, '5edb8099d21a7', 'businesslogos/footbanner2.jpg', 'Emmy Accessories', 'Nigeria', 'Bauchi', 'Female', 'empty'),
(4, '5f06ede19846e', 'businesslogos/Screenshot_20200713-123632.png', 'Stewart', 'Nigeria', 'Rivers', 'Male', 'empty'),
(5, '5f06f4fd3f05d', 'businesslogos/Screenshot_20200709-025350.png', 'Emmashoe', 'Algeria', 'Adamawa', 'Male', 'empty'),
(6, '5f0704df77864', 'businesslogos/default-business-logo.jpg', 'Glory shop', 'Nigeria', 'Cross River', 'Female', 'empty'),
(7, '5f07280510ed8', 'businesslogos/TIK81.jpg', 'TikWears', 'Nigeria', 'Rivers', 'Male', 'empty'),
(8, '5f075c166c995', 'businesslogos/default-business-logo.jpg', 'Kedi wears', 'Nigeria', 'Rivers', 'Female', 'empty'),
(9, '5f08427d6e1e3', 'businesslogos/IMG_20200618_135905.jpg', 'Drax leg', 'Nigeria', 'Rivers', 'Male', 'empty'),
(10, '5f0867313270e', 'businesslogos/default-business-logo.jpg', 'Chiluv shoe designs', 'Nigeria', 'Delta', 'Female', 'empty'),
(11, '5f119b1587441', 'businesslogos/default-business-logo.jpg', 'Jhhjj', 'Nigeria', 'Rivers', 'Male', 'empty'),
(12, '5f119b1587441', 'businesslogos/default-business-logo.jpg', 'Jhhjj', 'Nigeria', 'Rivers', 'Male', 'empty'),
(13, '5f20733bbfc2e', 'businesslogos/airadventurelevel4.png', 'Mat stores', 'Nigeria', 'Delta', 'Male', 'empty'),
(14, '5f8d588e8c934', 'businesslogos/default-business-logo.jpg', 'Oke Stores', 'Nigeria', 'Cross River', 'Male', 'empty'),
(15, '5fd1abfb3fd59', 'businesslogos/barca1.png', 'Naoh stores', 'Nigeria', 'Ebonyi', 'Male', 'https://Noahstores.com'),
(16, '5fddafa0abef3', 'businesslogos/default-business-logo.jpg', 'Fav stores', 'Nigeria', 'Rivers', 'Female', 'empty'),
(17, '5fddeb4a339e1', 'businesslogos/default-business-logo.jpg', 'Mercy stores', 'Nigeria', 'Rivers', 'Female', 'empty'),
(18, '5fdfc65bb549f', 'businesslogos/default-business-logo.jpg', 'Prep stores', 'Nigeria', 'Rivers', 'Male', 'empty');

-- --------------------------------------------------------

--
-- Table structure for table `clearancesale`
--

CREATE TABLE `clearancesale` (
  `id` int(11) NOT NULL,
  `productid` varchar(500) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `howmany` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contactform`
--

CREATE TABLE `contactform` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactform`
--

INSERT INTO `contactform` (`id`, `name`, `phone`, `email`, `message`, `status`) VALUES
(1, 'Emmanuel Danjumbo', '08162383712', 'emmydanjumbo4@gmail.com', 'Pls how can i place an Order', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(11) NOT NULL,
  `userid` varchar(500) NOT NULL,
  `coupon_code` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `userid`, `coupon_code`, `amount`, `status`) VALUES
(2, '5edb7549a261a', 'U72T49H3ZW', '500', 'used'),
(8, 'eghwuhjwheu', 'dhwkje6347', '700', 'unused'),
(9, 'eghwuhjwheu', 'dhwkje6347', '100', 'unused');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `timeview` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `new` varchar(500) NOT NULL,
  `cwallet` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `uniqueid`, `firstname`, `lastname`, `image`, `email`, `phone`, `password`, `time`, `date`, `timeview`, `status`, `new`, `cwallet`) VALUES
(2, '5edb7549a261a', 'John', 'Johnny', '../customerimages/defaultimage.png', 'john@gmail.com', '080238476327', '$2y$10$J7DCSdKOsSeYLJGBYTB7/uzk3agAhUmIMPDMhbyWA/TIaDcGHLi5W', '1591440713', '06-06-20', '11:51 PM', 'inactive', 'yes', '0'),
(3, '5f09d44068690', 'Aminigbo', 'Paul', '../customerimages/defaultimage.png', 'aminigbopaul@gmail.com', '07017545023', '$2y$10$3E3QgFYthklKY7/bb/bZMeg4CHZvm5726tnkLwmHndv/ywSHfGk1i', '1594479680', '11-07-20', '2:01 PM', 'inactive', 'yes', '0'),
(4, '5f0babcacf77f', 'Bbsbsbsbs', 'jwjssnsnwne', '../customerimages/defaultimage.png', 'emmanueljonah235@yahoo.com', '09032558166', '$2y$10$ILbu0EqGo8ugMzCodFx8I.nAaAQh3aPzYNATBYcpxva04GfQDXoZq', '1594600394', '13-07-20', '11:33 AM', 'inactive', 'yes', '0'),
(5, '5f301ed234a78', 'esther', 'ed', '../customerimages/defaultimage.png', 'esther@gmail.com', '08014897124891', '$2y$10$UAkP0KZaE/FF3WVXlbIjX.w9vQWR.E/5FyoQuWuKeov0zKtduJ7s2', '1596989138', '09-08-20', '5:05 PM', 'inactive', 'yes', '0'),
(8, '5fcefe3c69267', 'Blessing', 'Lap', '../customerimages/defaultimage.png', 'blessing@gmail.com', '8076859483', '$2y$10$A1iXytgd2mADAP.kqY8zL.gm.dvCZZ/1XVdOAwVO2Aem3KvpwIp3S', '1607401020', '08-12-20', '4:17 AM', 'inactive', 'yes', '0'),
(9, '5fcefe9b433e8', 'Philips', 'Jhin', '../customerimages/defaultimage.png', 'philips@gmail.com', '8026547389', '$2y$10$Q7xO84U4.WO7wU7mqLfaiuDq2QlpQO/YzpaGICaUqMVDNBBdX5uD2', '1607401115', '08-12-20', '4:18 AM', 'inactive', 'yes', '0'),
(10, '5fceffe79f53d', 'Blob', 'Lo', '../customerimages/defaultimage.png', 'blob@gmail.com', '8013647364', '$2y$10$9KllNOyyZjLccqqAgaDHJ.8d7Jd6MnBTvC5sh1XydaOUxOZln4WIi', '1607401447', '08-12-20', '4:24 AM', 'inactive', 'yes', '0'),
(11, '5fe1063da3941', 'ogene', 'teo', '../customerimages/defaultimage.png', 'ogene@gmail.com', '8098899890', '$2y$10$gHWms2ZLBF.G8lcKEaNBxewJVLwc/Wc1xxFiigyLYI44XuulFN6Ai', '1608582717', '21-12-20', '8:31 PM', 'inactive', 'yes', '0');

-- --------------------------------------------------------

--
-- Table structure for table `footwear_size`
--

CREATE TABLE `footwear_size` (
  `id` int(11) NOT NULL,
  `item_is_for` varchar(500) NOT NULL,
  `item_size` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footwear_size`
--

INSERT INTO `footwear_size` (`id`, `item_is_for`, `item_size`) VALUES
(7, 'Men', '42'),
(8, 'Men', '43'),
(9, 'Men', '44'),
(10, 'Men', '45'),
(11, 'Men', '46'),
(12, 'Men', '47'),
(13, 'Men', '48'),
(14, 'Women', '37'),
(15, 'Women', '38'),
(16, 'Women', '39'),
(17, 'Women', '40'),
(18, 'Women', '41'),
(19, 'Women', '42'),
(20, 'Women', '43'),
(21, 'Kids', '20.5'),
(22, 'Kids', '21.5'),
(23, 'Kids', '23'),
(24, 'Kids', '24'),
(25, 'Kids', '25'),
(26, 'Kids', '27'),
(27, 'Kids', '28'),
(28, 'Kids', '29'),
(29, 'Kids', '31'),
(30, 'Kids', '32'),
(31, 'Kids', '33'),
(32, 'Kids', '35'),
(33, 'Kids', '36'),
(34, 'Kids', '37');

-- --------------------------------------------------------

--
-- Table structure for table `footwear_type`
--

CREATE TABLE `footwear_type` (
  `id` int(11) NOT NULL,
  `item_is_for` varchar(500) NOT NULL,
  `item_type` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footwear_type`
--

INSERT INTO `footwear_type` (`id`, `item_is_for`, `item_type`) VALUES
(6, 'Men', 'Sandals'),
(8, 'Men', 'Pam slippers'),
(9, 'Men', 'Trainers'),
(10, 'Men', 'Sneakers'),
(11, 'Men', 'Gym Sneakers'),
(12, 'Men', 'Oxfords'),
(13, 'Men', 'Wingtips'),
(14, 'Men', 'Loafers'),
(15, 'Men', 'Moccasins'),
(16, 'Men', 'Boat Shoes'),
(17, 'Men', 'Boots'),
(18, 'Men', 'Combat'),
(19, 'Men', 'Hiking  boots'),
(20, 'Men', 'Hybrid Boots'),
(21, 'Men', 'Slippers'),
(22, 'Men', 'Canvas'),
(23, 'Men', 'Athlete Shoes'),
(24, 'Men', 'Football boots'),
(25, 'Men', 'Work boots'),
(26, 'Men', 'Western boots'),
(27, 'Men', 'Flip-flops'),
(28, 'Men', 'Security boots'),
(29, 'Men', 'Dress boots'),
(30, 'Women', 'Wedge heels'),
(31, 'Women', 'Ballerinas'),
(32, 'Women', 'Lace ups'),
(33, 'Women', 'Canvas'),
(34, 'Women', 'Wellington Shoes'),
(35, 'Women', 'Flip flops'),
(36, 'Women', 'Mules'),
(37, 'Women', 'Loafers'),
(38, 'Women', 'Gladiators sandals'),
(39, 'Women', 'Trainers'),
(40, 'Women', 'Sandals'),
(41, 'Women', 'Heels'),
(42, 'Women', 'Brogues'),
(43, 'Women', 'Ankle boots'),
(44, 'Women', 'Calf Boots'),
(45, 'Women', 'Chelsea boots'),
(46, 'Women', 'Pumps'),
(47, 'Women', 'Stilettos'),
(48, 'Women', 'Ankle booties'),
(49, 'Women', 'Gladiator boots'),
(50, 'Women', 'Sling back heels'),
(51, 'Women', 'Open toe sandals'),
(52, 'Women', 'Oxfords'),
(53, 'Women', 'Fantasy'),
(54, 'Women', 'Ram boots'),
(55, 'Kids', 'Shoes'),
(56, 'Kids', 'Sandals'),
(57, 'Kids', 'Canvas'),
(58, 'Kids', 'Boots'),
(59, 'Kids', 'Athletic Boots'),
(60, 'Kids', 'Heels'),
(61, 'Kids', 'Ballerinas'),
(62, 'Kids', 'Gladiator sandals'),
(63, 'Kids', 'Ram boots'),
(64, 'Kids', 'Gladiator boots');

-- --------------------------------------------------------

--
-- Table structure for table `ordercustomerdetails`
--

CREATE TABLE `ordercustomerdetails` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordercustomerdetails`
--

INSERT INTO `ordercustomerdetails` (`id`, `orderid`, `firstname`, `lastname`, `email`, `phone`, `address1`, `address2`, `region`) VALUES
(83, 'cl-41840675', 'Okorokwo', 'Ezekiel', 'emmy@gmail.com', '8167407120', 'Rivers State University ', 'Ikenga\'s compound', 'Rivers'),
(84, 'cl-79731538', 'Okorokwo', 'Ezekiel', 'emmy@gmail.com', '8167407120', 'Rivers State University ', 'Ikenga\'s compound', 'Rivers'),
(85, 'cl-83104896', 'Okorokwo', 'Ezekiel', 'emmy@gmail.com', '8167407120', 'Rivers State University ', 'Ikenga\'s compound', 'Rivers');

-- --------------------------------------------------------

--
-- Table structure for table `orderpickupstation`
--

CREATE TABLE `orderpickupstation` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `stationid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orderproducts`
--

CREATE TABLE `orderproducts` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `productid` varchar(500) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `customerid` varchar(500) NOT NULL,
  `howmany` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `promotion_id` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderproducts`
--

INSERT INTO `orderproducts` (`id`, `orderid`, `productid`, `sellerid`, `customerid`, `howmany`, `price`, `size`, `promotion_id`, `status`) VALUES
(237, 'cl-83104896', '5edbff73de66f', '5edb748676d36', '5edb7549a261a', '2', '7000', '45', 'empty', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `customerid` varchar(500) NOT NULL,
  `deliverymethod` varchar(500) NOT NULL,
  `paymentmethod` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `shipping_fee` varchar(500) NOT NULL,
  `coupon_amount` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `timeview` varchar(500) NOT NULL,
  `time_created` varchar(500) NOT NULL,
  `adminnew` varchar(500) NOT NULL,
  `new` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `orderid`, `customerid`, `deliverymethod`, `paymentmethod`, `status`, `shipping_fee`, `coupon_amount`, `time`, `date`, `timeview`, `time_created`, `adminnew`, `new`) VALUES
(159, 'cl-83104896', '5edb7549a261a', 'Door step delivery', 'pay on delivery', 'Active', '0', '0', '1608980429', '26/12/20', '11:00 PM', 'Saturday, December 26, 2020', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ordershippingaddress`
--

CREATE TABLE `ordershippingaddress` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `additionalphone` varchar(500) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordershippingaddress`
--

INSERT INTO `ordershippingaddress` (`id`, `orderid`, `firstname`, `lastname`, `email`, `phone`, `additionalphone`, `address1`, `region`, `address2`) VALUES
(88, 'cl-41840675', 'Okorokwo', 'Ezekiel', 'emmy@gmail.com', '8167407120', '09024145808', 'Rivers State University ', 'Rivers', 'Ikenga\'s compound'),
(89, 'cl-79731538', 'Okorokwo', 'Ezekiel', 'emmy@gmail.com', '8167407120', '09024145808', 'Rivers State University ', 'Rivers', 'Ikenga\'s compound'),
(90, 'cl-83104896', 'Okorokwo', 'Ezekiel', 'emmy@gmail.com', '8167407120', '09024145808', 'Rivers State University ', 'Rivers', 'Ikenga\'s compound');

-- --------------------------------------------------------

--
-- Table structure for table `order_tracking_details`
--

CREATE TABLE `order_tracking_details` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `new` varchar(500) NOT NULL,
  `timeview` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_tracking_details`
--

INSERT INTO `order_tracking_details` (`id`, `orderid`, `title`, `content`, `time`, `date`, `status`, `new`, `timeview`) VALUES
(5, 'cl-27366593', 'Order shipped', 'Your order has been shipped!', '1607272715', '06-12-20', '0', 'yes', '4:38 PM');

-- --------------------------------------------------------

--
-- Table structure for table `pickupstation`
--

CREATE TABLE `pickupstation` (
  `id` int(11) NOT NULL,
  `state` varchar(500) NOT NULL,
  `station` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pickupstation`
--

INSERT INTO `pickupstation` (`id`, `state`, `station`) VALUES
(1, 'Rivers', 'NO.33 Trans Amadi layout');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `image4` varchar(500) NOT NULL,
  `image5` varchar(500) NOT NULL,
  `itemisfor` varchar(500) NOT NULL,
  `itemtype` varchar(500) NOT NULL,
  `color` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `brandname` varchar(500) NOT NULL,
  `howmany` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `old_price` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `productcode` varchar(500) NOT NULL,
  `exclusive` varchar(500) NOT NULL,
  `views` varchar(500) NOT NULL,
  `stars` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `uniqueid`, `sellerid`, `name`, `description`, `image1`, `image2`, `image3`, `image4`, `image5`, `itemisfor`, `itemtype`, `color`, `size`, `brandname`, `howmany`, `price`, `old_price`, `time`, `date`, `status`, `productcode`, `exclusive`, `views`, `stars`) VALUES
(5, '5edbff73de66f', '5edb748676d36', 'Nice Shoe', 'Nice shoe, buy it now!.....', 'productimages/foot6.jpg', 'productimages/footbanner1.jpg', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'Blue', '45', 'Shoe dealer', '8', '7000', '2000', '1591476083', '06-06-20', 'active', '8OL5', 'no', '172', '3'),
(6, '5edbffe41ecfa', '5edb748676d36', 'Cool slippers', 'This is a cool slippers you will love', 'productimages/foot10.jpg', 'productimages/foot9.jpg', 'empty', 'empty', 'empty', 'Women', 'Slippers', 'Grey', '3.3', 'Slippers Dealer', '10', '3000', '2000', '1591476196', '06-06-20', 'active', '68ER', 'no', '15994', '3'),
(7, '5edc04c1a6e89', '5edb748676d36', 'Ultra shoe', 'This is an ultra shoe', 'productimages/foot3.jpg', 'productimages/foot8.jpg', 'empty', 'empty', 'empty', 'Men', 'Shoes', 'Red', '3.2', 'Shoe dealer', '10', '17000', '2000', '1591477441', '06-06-20', 'active', 'B6E7', 'yes', '44', '3'),
(8, '5ee20b9f768f1', '5edb8099d21a7', 'High heel shoe', 'This is a very nice high heeled shoe', 'productimages/foot4.jpg', 'productimages/foot7.jpg', 'productimages/footbanner1.jpg', 'empty', 'empty', 'Women', 'Heels', 'Black', '35', 'High Heel Dealers', '10', '4000', '2000', '1591872415', '11-06-20', 'active', '23NA', 'no', '67', '3'),
(9, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(10, '5ef5f1287e34e', '5edb748676d36', 'Nike shoe', 'This is the description', 'productimages/foot2.jpg', 'productimages/foot4.jpg', 'empty', 'empty', 'empty', 'Men', 'Snickers', 'Red', '39', 'Nike', '10', '4500', '6000', '1593176360', '26-06-20', 'active', '8D0F', 'no', '35', '3'),
(15, '5edbff73de66f', '5edb748676d36', 'Nice Shoe', 'Nice shoe, buy it now!.....', 'productimages/foot6.jpg', 'productimages/footbanner1.jpg', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'Blue', '45', 'Shoe dealer', '8', '7000', '2000', '1591476083', '06-06-20', 'active', '8OL5', 'no', '172', '3'),
(16, '5edbffe41ecfa', '5edb748676d36', 'Cool slippers', 'This is a cool slippers you will love', 'productimages/foot10.jpg', 'productimages/foot9.jpg', 'empty', 'empty', 'empty', 'Women', 'Slippers', 'Grey', '3.3', 'Slippers Dealer', '10', '3000', '2000', '1591476196', '06-06-20', 'active', '68ER', 'no', '15994', '3'),
(17, '5edc04c1a6e89', '5edb748676d36', 'Ultra shoe', 'This is an ultra shoe', 'productimages/foot3.jpg', 'productimages/foot8.jpg', 'empty', 'empty', 'empty', 'Men', 'Shoes', 'Red', '3.2', 'Shoe dealer', '10', '17000', '2000', '1591477441', '06-06-20', 'active', 'B6E7', 'yes', '44', '3'),
(18, '5ee20b9f768f1', '5edb8099d21a7', 'High heel shoe', 'This is a very nice high heeled shoe', 'productimages/foot4.jpg', 'productimages/foot7.jpg', 'productimages/footbanner1.jpg', 'empty', 'empty', 'Women', 'Heels', 'Black', '35', 'High Heel Dealers', '10', '4000', '2000', '1591872415', '11-06-20', 'active', '23NA', 'no', '67', '3'),
(19, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(20, '5ef5f1287e34e', '5edb748676d36', 'Nike shoe', 'This is the description', 'productimages/foot2.jpg', 'productimages/foot4.jpg', 'empty', 'empty', 'empty', 'Men', 'Snickers', 'Red', '39', 'Nike', '10', '4500', '6000', '1593176360', '26-06-20', 'active', '8D0F', 'no', '35', '3'),
(22, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(23, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(24, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(25, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(26, '5eebe41f69634', '5edb748676d36', 'Kids shoes', 'This is a fancy shoes for you kids to wear and look georgeous', 'productimages/foot8.jpg', 'productimages/footbanner6.jpg', 'empty', 'empty', 'empty', 'Kids', 'Snickers', 'Blue', '35', 'Kids Master', '10', '3500', '2000', '1592517663', '19-06-20', 'active', '72XG', 'no', '84', '3'),
(27, '5fd1b46116e84', '5fd1abfb3fd59', 'Home made shoe', 'This is the description of this home made shoe', 'productimages/banner1.jpg', 'productimages/breadcrumb.jpg', 'empty', 'empty', 'empty', 'Men', 'Pam slippers', 'Black', '42', 'Homemades', '10', '4500', '5000', '1607578721', '10-12-20', 'active', 'R42B', 'no', '18', ''),
(29, '5fd87038af2e3', '5edb748676d36', 'Classic shoe', 'This is the description', 'productimages/5fdd23514e20bfoot6.jpg', 'empty', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'Black', '42', 'Mr. Classic', '10', '2500', '4500', '1608020024', '15-12-20', 'active', '2RS5', 'no', '38', '3'),
(30, '5fddb0b480067', '5fddafa0abef3', 'Fav item1', 'This is the description of my fave item', 'productimages/5fddb0b480067footbanner6.jpg', 'productimages/5fddb0b480067cat-1.jpg', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'Black', '42', 'Fav stores', '10', '2000', '5000', '1608364212', '19-12-20', 'active', '76NQ', 'no', '55', '3'),
(31, '5fddebf3525ca', '5fddeb4a339e1', 'Correctleg Yakata', 'This is the description', 'productimages/5fddebf3525cacart-1.jpg', 'productimages/5fddebf3525cacart-3.jpg', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'Black', '42', 'Correctleg', '10', '1000', '3000', '1608379379', '19-12-20', 'active', '8FX6', 'no', '36', '3'),
(32, '5fe07ec5d6700', '5fddeb4a339e1', 'Good shoe', 'This is the description', 'productimages/5fe07ec5d6700footbanner6.jpg', 'empty', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'Black', '42', 'Brand', '10', '8000', '12000', '1608548037', '21-12-20', 'inactive', 'X6D5', 'no', '31', '3'),
(33, '5fe19810ddf9f', '5edb748676d36', 'Better shoe', '<p>This is the <strong>description&nbsp;</strong>of this item, so please just take it as you see it cause i dont have strength to start typing long things abeg abeg.. thanks for you co-operation and support</p><ol><li>Strong and reliable</li><li>Fast and secure</li><li>Aweomely beautiful</li></ol><p>These are just but a few things to mention about this item</p><p>Pusrchase this shoe today before 25th December 2020 and get a 10% discount on all orders!</p>', 'productimages/5fe19810ddf9f1 (1).jpg', 'productimages/5fe19810ddf9f5.jpg', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'White', '42', 'empty', '10', '5000', '7000', '1608620048', '22-12-20', 'active', 'IU82', 'no', '54', '3'),
(35, '5fe226aab5627', '5edb748676d36', 'Aminigbo Pauls shoe', '<p>This is the description</p>', 'productimages/5fe226aab5627banner4.jpg', 'productimages/5fe226aab5627Clearance-img.jpg', 'empty', 'empty', 'empty', 'Men', 'Sandals', 'White', '42', 'empty', '10', '3000', '7000', '1608656554', '22-12-20', 'active', '4G4D', 'no', '96', '3');

-- --------------------------------------------------------

--
-- Table structure for table `product_brands`
--

CREATE TABLE `product_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(500) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `order_id` varchar(500) NOT NULL,
  `number_of_stars` varchar(500) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_reviews`
--

INSERT INTO `product_reviews` (`id`, `customer_id`, `product_id`, `order_id`, `number_of_stars`, `comment`, `status`, `time`, `date`) VALUES
(1, '5edb7549a261a', '5eebe41f69634', 'cl-84837444', '3', 'I like this item', 'Active', '1608563284', '21/12/20');

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(11) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `size`, `price`, `quantity`) VALUES
(2, '5fe22635c5fe8', '4.1', '3000', '10'),
(3, '5fe22635c5fe8', '4.2', '4000', '6'),
(4, '5fe22635c5fe8', '4.3', '5000', '9'),
(5, '5fe226aab5627', '4.1', '3000', '10'),
(7, '5fe22d598132e', '4.5', '7000', '10'),
(8, '5fe226aab5627', '4.2', '4500', '3'),
(9, '5fe226aab5627', '4.3', '6000', '1'),
(10, '5fe226aab5627', '4.4', '6000', '10');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `min_discount` varchar(500) NOT NULL,
  `max_discount` varchar(500) NOT NULL,
  `registration_end` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`id`, `uniqueid`, `name`, `image`, `description`, `min_discount`, `max_discount`, `registration_end`, `status`) VALUES
(5, '5fdb35876d204', 'Clearance Sale promotion!', 'promotion_images/5fdb35876d204Clearance-img.jpg', 'Make huge sales on our clearance sales promotion ', '20', '80', '27th December 2020', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_products`
--

CREATE TABLE `promotion_products` (
  `id` int(11) NOT NULL,
  `promotion_id` varchar(500) NOT NULL,
  `product_id` varchar(500) NOT NULL,
  `discount` varchar(500) NOT NULL,
  `quantity` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotion_products`
--

INSERT INTO `promotion_products` (`id`, `promotion_id`, `product_id`, `discount`, `quantity`) VALUES
(13, '5fdb35876d204', '5edbffe41ecfa', '0.3', '3'),
(14, '5fdb35876d204', '5eebe41f69634', '0.6', '3'),
(15, '5fdb35876d204', '5ef5f1287e34e', '0.8', '3'),
(16, '5fdb35876d204', '5f099945430e4', '0.3', '3'),
(18, '5fdb35876d204', '5fd87038af2e3', '0.2', '3'),
(19, '5fdb35876d204', '5edbff73de66f', '0.2', '3'),
(20, '5fdb35876d204', '5fddb0b480067', '0.2', '0');

-- --------------------------------------------------------

--
-- Table structure for table `recentlyviewed`
--

CREATE TABLE `recentlyviewed` (
  `id` int(11) NOT NULL,
  `customerid` varchar(500) NOT NULL,
  `productid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recentlyviewed`
--

INSERT INTO `recentlyviewed` (`id`, `customerid`, `productid`) VALUES
(8, '5f0babcacf77f', '5ee20b9f768f1'),
(9, '5edb7549a261a', '5ee20b9f768f1'),
(10, '5edb7549a261a', '5f099945430e4'),
(11, '5edb7549a261a', '5eebe41f69634'),
(12, '5edb7549a261a', '5edbffe41ecfa'),
(14, '5edb7549a261a', '5edbff73de66f'),
(17, '5edb748676d36', '5edc04c1a6e89'),
(18, '5edb7549a261a', '5fddebf3525ca'),
(19, '5edb7549a261a', '5ef5f1287e34e'),
(20, '5edb7549a261a', '5fd87038af2e3'),
(21, '5edb7549a261a', '5fe226aab5627'),
(22, '5edb7549a261a', '5edc04c1a6e89');

-- --------------------------------------------------------

--
-- Table structure for table `recoverpasswordkey`
--

CREATE TABLE `recoverpasswordkey` (
  `id` int(11) NOT NULL,
  `secret_key` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recoverpasswordkey`
--

INSERT INTO `recoverpasswordkey` (`id`, `secret_key`, `email`, `status`) VALUES
(2, '5f2a56e8d91b1', 'emmy@gmail.com', 'unused'),
(3, '5f2a591022a1a', 'mary@gmail.com', 'unused'),
(4, '5f2a5ba6db94f', 'john@gmail.com', 'unused');

-- --------------------------------------------------------

--
-- Table structure for table `savedproducts`
--

CREATE TABLE `savedproducts` (
  `id` int(11) NOT NULL,
  `customerid` varchar(500) NOT NULL,
  `productid` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `savedproducts`
--

INSERT INTO `savedproducts` (`id`, `customerid`, `productid`) VALUES
(8, '5edb7549a261a', '5edc04c1a6e89'),
(9, '5f0babcacf77f', '5ee20b9f768f1'),
(18, '5edb7549a261a', '5edbff73de66f'),
(21, '5edb7549a261a', '5fe226aab5627');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `activebalance` varchar(500) NOT NULL,
  `pendingbalance` varchar(500) NOT NULL,
  `pendingwithdrawals` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `timeview` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `new` varchar(500) NOT NULL,
  `cid` varchar(500) NOT NULL,
  `subscribed` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `uniqueid`, `firstname`, `lastname`, `image`, `email`, `phone`, `password`, `activebalance`, `pendingbalance`, `pendingwithdrawals`, `time`, `date`, `timeview`, `status`, `new`, `cid`, `subscribed`) VALUES
(4, '5edb748676d36', 'Emmanuel', 'Danjumbo', '../sellerimages/defaultimage.png', 'emmy@gmail.com', '8162383733', '$2y$10$ITmoumn3hVxZ0FAXa.VjUO/w0rFL61cACgkhAzBAoSs0y1tT0Wq8W', '60050', '326500', '0', '1591440518', '06-06-20', '11:48 PM', 'active', 'yes', 'H48N', 'no'),
(5, '5edb8099d21a7', 'Mary', 'brian', '../sellerimages/defaultimage.png', 'mary@gmail.com', '8756656790', '$2y$10$QugPrXFWJoRmUCG8ZCiZeOpVzd6BPbbkNdpuTnFbi2p.TnD9Zpz52', '7600', '-3800', '0', '1591443609', '06-06-20', '0:40 PM', 'inactive', 'yes', 'FR86', 'no'),
(6, '5ef1d65fb8fb0', 'James', 'Ja', 'sellerimages/defaultimage.png', 'james@gmail.com', '8014897124891', '$2y$10$qPZS416pIEKkoi8.okbjW.Jhel9HIOjaPdTtL0JMy3e7UoMqbnGf6', '0', '0', '0', '1592907359', '23-06-20', '11:15 PM', 'inactive', 'yes', '3PG5', 'no'),
(7, '5f06ede19846e', 'Stewart', 'Ezekiel ', 'sellerimages/defaultimage.png', 'ellaswart900@gmail.com', '9030643105', '$2y$10$5I6FkSpc.WtnSKg4IdBgEuV6rvqp0C1zW0TytkUd3YpzpCxK0oSai', '0', '0', '0', '1594289633', '09-07-20', '9:13 AM', 'inactive', 'yes', '0YE9', ''),
(8, '5f06f4fd3f05d', 'EMMANUEL', 'JONAH', 'sellerimages/defaultimage.png', 'emmanueljonah235@yahoo.com', '9032558166', '$2y$10$iiaNYI5Y3S2vfHY4asB0PeA3xO8tT3jAycjYJmSaAgG6p6w2FeG4i', '0', '0', '0', '1594291453', '09-07-20', '9:44 AM', 'inactive', 'yes', '5U9O', ''),
(9, '5f06ff977405e', 'Ogechi', 'Larry', 'sellerimages/defaultimage.png', 'ogechi@gmail.com', '8016184849', '$2y$10$69JyX5pYtv8FOs.Mdh2laerPb3cOUkNBcNc9Q6o5EX5H1xzn6dCRa', '0', '0', '0', '1594294167', '09-07-20', '10:29 AM', 'inactive', 'yes', '7XV5', ''),
(10, '5f0704df77864', 'Glory', 'Staphen', 'sellerimages/defaultimage.png', 'glory@gmail.com', '8927868162', '$2y$10$5fRe4Paw2nL2C2zbeYTXBeVBHOxC3KM45ow08wrYU/1FzQYbt/l9K', '0', '0', '0', '1594295519', '09-07-20', '10:51 AM', 'inactive', 'yes', 'H39R', ''),
(11, '5f07280510ed8', 'Aminigbo', 'Aminigbo', 'sellerimages/defaultimage.png', 'aminigbopaul@gmail.com', '7017545023', '$2y$10$nnJKmFNA6UiPxdlj9LSVSO4rA5k7ICreTi40vSMOzm/JTpDSx537e', '0', '56500', '0', '1594304517', '09-07-20', '1:21 PM', 'inactive', 'yes', 'CO07', ''),
(12, '5f075c166c995', 'Gbemisola', 'Falola', 'sellerimages/defaultimage.png', 'Falzgbemi19@gmail.com', '7086355332', '$2y$10$RpoHGLyodoLn0SqUHwGAmehuN9HleR3h4qvsT1AOI4/Gt.r1/CKcO', '0', '0', '0', '1594317846', '09-07-20', '5:04 PM', 'inactive', 'yes', 'X56Q', ''),
(13, '5f08427d6e1e3', 'Friday', 'Isen', 'sellerimages/defaultimage.png', 'okwori.friday@yahoo.com', '08167861468', '$2y$10$RwBomI6ShPuO1DH.u6QQ7OUI1iBj162K9DXOdvrjoMJYAnuhG.ysq', '0', '0', '0', '1594376829', '10-07-20', '9:27 AM', 'inactive', 'yes', '89FO', ''),
(14, '5f0867313270e', 'Austin', 'Chiluv', 'sellerimages/defaultimage.png', 'chiswart@gmail.com', '8162202656', '$2y$10$A9uyaGrJTar7VAfXwi/6femhO791EIEhc15o./aeSQIN4uQUC4V46', '0', '0', '0', '1594386225', '10-07-20', '0:03 PM', 'inactive', 'yes', '56RV', ''),
(15, '5f119a7f6d9af', 'Tony', 'Bright', 'sellerimages/defaultimage.png', 'info.stewartofficial@gmail.com', '9034123537', '$2y$10$xoWm6ykBUxYpjGXa7o4AsuwdN6/jrK8f5SEuRQ7/fFmLemMByylt6', '0', '0', '0', '1594989183', '17-07-20', '11:33 PM', 'inactive', 'yes', 'OJ85', ''),
(16, '5f119b1587441', 'Tony', 'Bright', 'sellerimages/defaultimage.png', 'stewartofficial@gmail.com', '9034123537', '$2y$10$hCOpMgFD5GkYRxgTJ7cfPubKFymbIEmRnihV8XRWi6FsVVmRJJAhC', '0', '0', '0', '1594989333', '17-07-20', '11:35 PM', 'inactive', 'yes', '2S7T', ''),
(17, '5f20733bbfc2e', 'mat', 'mat', 'sellerimages/defaultimage.png', 'mat@gmail.com', '901278182', '$2y$10$LmK59F1h30l8UgW4hYoJ5eivi4LNNPU2pKfDJ35U4cMTm.haMP4RO', '0', '0', '0', '1595962171', '28-07-20', '7:49 PM', 'inactive', 'yes', '80UE', ''),
(18, '5f301d083c163', 'Kengi', 'joe', 'sellerimages/defaultimage.png', 'kengi@gmail.com', '8087566567', '$2y$10$eryJa2W0HLzgPzt8qbPO6uPK1TpmPiJClsB3JPg.uHoBMUGmc4.qS', '0', '0', '0', '1596988680', '09-08-20', '4:58 PM', 'inactive', 'yes', '7V4R', ''),
(24, '5f8d588e8c934', 'Oke', 'John', 'sellerimages/defaultimage.png', 'oke@gmail.com', '8162383778', '$2y$10$4OhnWR7FhdEGERcEkSxlLeSj8CkUh1HdGqVqOjlPvifcP6J/ukP86', '0', '0', '0', '1603098766', '19-10-20', '10:12 AM', 'inactive', 'yes', 'M15R', 'no'),
(27, '5fcfefd5df94e', 'Bolly', 'Joe', 'sellerimages/defaultimage.png', 'bolly@gmail.com', '8162383744', '$2y$10$PC.6OWIYB98qQds07RXxi.yCrJPtuRwHa4xPUsDuPFftKUuSxgKr.', '0', '0', '0', '1607462869', '08-12-20', '9:27 PM', 'inactive', 'yes', 'C6L5', 'no'),
(28, '5fcffd5895e65', 'Algo', 'Expert', 'sellerimages/defaultimage.png', 'algo@gmail.com', '8162383712', '$2y$10$Jhe8fjXwRo9VG/ExRrO1s.hgMCEDHAXenD8.QHZH7VGGUVV9KuRXe', '0', '0', '0', '1607466328', '08-12-20', '10:25 PM', 'inactive', 'yes', '41YP', 'no'),
(29, '5fd10e9c07392', 'Jane', 'Ken', 'sellerimages/defaultimage.png', 'jane@gmail.com', '8162383712', '$2y$10$uU.AxQ4CUna9Jhta1sJgJOPF5HxMO9fYSIhyv9JIWJmy6bnWOsbcW', '0', '0', '0', '1607536284', '09-12-20', '5:51 PM', 'inactive', 'yes', '3W6H', 'no'),
(30, '5fd11e82851d8', 'Benny', 'Obj', 'sellerimages/defaultimage.png', 'benny@gmail.com', '8162383712', '$2y$10$wmjxg8XovIkUS6sRsUGMDenGvQ9R342ZUhQSUtO9qVWT0iWndwlL6', '0', '0', '0', '1607540354', '09-12-20', '6:59 PM', 'inactive', 'yes', '48ZB', 'no'),
(31, '5fd1abfb3fd59', 'Noah', 'Kin', 'sellerimages/defaultimage.png', 'naoh@gmail.com', '8162383712', '$2y$10$VYOkUsF0iljZ6MckOJUD1uz6aEgl4T1m0lywgexx.YJuGrP8utbdy', '0', '0', '0', '1607576571', '10-12-20', '5:02 AM', 'inactive', 'yes', '6T4N', 'no'),
(33, '5fd7571c3d194', 'Okoro', 'Kin', 'sellerimages/defaultimage.png', 'okoro@gmail.com', '8162383712', '$2y$10$P1TAPlOYH3t6NbJXeRrsku/pjBbM8oNYN7/nGmU0mAtX1OGPCNXcG', '0', '0', '0', '1607948060', '14-12-20', '0:14 PM', 'inactive', 'yes', 'N8K7', 'no'),
(34, '5fddafa0abef3', 'Favour', 'James', 'sellerimages/defaultimage.png', 'favour@gmail.com', '8162383712', '$2y$10$w48i19LziAuSt7xlFXQEyOiITj3.44mL1cRhMQBeh501LmnK2gZ7W', '3800', '14700', '0', '1608363936', '19-12-20', '7:45 AM', 'inactive', 'yes', 'L6Q0', 'no'),
(35, '5fddeb4a339e1', 'Mercy', 'Jones', 'sellerimages/defaultimage.png', 'mercy@gmail.com', '9012182129', '$2y$10$kllPAHWtqUM9r7QSHGgaWuhOfzX2X8Wk9IzshF7f6vpbl4nWslZ6S', '1700', '0', '0', '1608379210', '19-12-20', '0:00 PM', 'inactive', 'yes', 'A75N', 'no'),
(36, '5fdfc65bb549f', 'Prep', 'Kin', 'sellerimages/defaultimage.png', 'prep@gmail.com', '9037635353', '$2y$10$JNPMzDHlHj7hew8z6Ml4Ne5DdG2cnyELiwAnKmZtLXapLdzigtf2m', '0', '0', '0', '1608500827', '20-12-20', '9:47 PM', 'inactive', 'yes', '5A5H', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `shippingaddress`
--

CREATE TABLE `shippingaddress` (
  `id` int(11) NOT NULL,
  `customerid` varchar(500) NOT NULL,
  `firstname` varchar(500) NOT NULL,
  `lastname` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `additionalphone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `address2` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shippingaddress`
--

INSERT INTO `shippingaddress` (`id`, `customerid`, `firstname`, `lastname`, `phone`, `additionalphone`, `email`, `address1`, `region`, `address2`, `status`) VALUES
(2, '1234', 'John', 'Doe', '0807899', '0998967', 'johndoe@gmail.com', 'Ikenga', 'Rivers', 'Igwuruta', 'default'),
(19, '5edb7549a261a', 'Okorokwo', 'Ezekiel', '8167407120', '09024145808', 'emmy@gmail.com', 'Rivers State University ', 'Rivers', 'Ikenga\'s compound', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `tourvideo`
--

CREATE TABLE `tourvideo` (
  `id` int(11) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `video` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tourvideo`
--

INSERT INTO `tourvideo` (`id`, `sellerid`, `video`) VALUES
(3, '5edb748676d36', 'tourvideos/'),
(4, '5edb8099d21a7', 'tourvideos/tourvideo.mp4'),
(5, '5f07280510ed8', 'tourvideos/');

-- --------------------------------------------------------

--
-- Table structure for table `wholesaleorders`
--

CREATE TABLE `wholesaleorders` (
  `id` int(11) NOT NULL,
  `orderid` varchar(500) NOT NULL,
  `productid` varchar(500) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `fullname` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `additionalphone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address1` varchar(500) NOT NULL,
  `region` varchar(500) NOT NULL,
  `pricing_type` varchar(500) NOT NULL,
  `howmany` varchar(500) NOT NULL,
  `price` varchar(500) NOT NULL,
  `total_price` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `timeview` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wholesaleproduct`
--

CREATE TABLE `wholesaleproduct` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(500) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `name` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image1` varchar(500) NOT NULL,
  `image2` varchar(500) NOT NULL,
  `image3` varchar(500) NOT NULL,
  `itemisfor` varchar(500) NOT NULL,
  `itemtype` varchar(500) NOT NULL,
  `size` varchar(500) NOT NULL,
  `brandname` varchar(500) NOT NULL,
  `price_per_dozen` varchar(500) NOT NULL,
  `price_per_set` varchar(500) NOT NULL,
  `howmany_per_set` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `productcode` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wholesaleproduct`
--

INSERT INTO `wholesaleproduct` (`id`, `uniqueid`, `sellerid`, `name`, `description`, `image1`, `image2`, `image3`, `itemisfor`, `itemtype`, `size`, `brandname`, `price_per_dozen`, `price_per_set`, `howmany_per_set`, `time`, `date`, `status`, `productcode`) VALUES
(1, '5ee7744d7e484', '5edb748676d36', 'Nice snickers', 'This are very nice snickers on a very cheap wholesale price', 'productimages/foot9.jpg', 'productimages/foot10.jpg', 'empty', 'Women', 'Snickers', '35', 'Snickers lords', 'empty', '7000', '5', '1592226893', '15-06-20', 'active', 'E20F'),
(2, '5ee775810a13d', '5edb748676d36', 'Slippers interior', 'These are slippers used inside the house for a wholesale price', 'productimages/foot7.jpg', 'productimages/foot9.jpg', 'empty', 'Men', 'Slippers', '36', 'Slippers Dealer', '15000', 'empty', 'empty', '1592227201', '15-06-20', 'active', 'F4H8');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `id` int(11) NOT NULL,
  `sellerid` varchar(500) NOT NULL,
  `amount` varchar(500) NOT NULL,
  `status` varchar(500) NOT NULL,
  `date` varchar(500) NOT NULL,
  `time` varchar(500) NOT NULL,
  `timeview` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`id`, `sellerid`, `amount`, `status`, `date`, `time`, `timeview`) VALUES
(7, '5fddeb4a339e1', '1000', 'settled', '19-12-20', '1608387598', '2:19 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `businessdetails`
--
ALTER TABLE `businessdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clearancesale`
--
ALTER TABLE `clearancesale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactform`
--
ALTER TABLE `contactform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footwear_size`
--
ALTER TABLE `footwear_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footwear_type`
--
ALTER TABLE `footwear_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordercustomerdetails`
--
ALTER TABLE `ordercustomerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderpickupstation`
--
ALTER TABLE `orderpickupstation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderproducts`
--
ALTER TABLE `orderproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordershippingaddress`
--
ALTER TABLE `ordershippingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_tracking_details`
--
ALTER TABLE `order_tracking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pickupstation`
--
ALTER TABLE `pickupstation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_brands`
--
ALTER TABLE `product_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotion_products`
--
ALTER TABLE `promotion_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recentlyviewed`
--
ALTER TABLE `recentlyviewed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recoverpasswordkey`
--
ALTER TABLE `recoverpasswordkey`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `savedproducts`
--
ALTER TABLE `savedproducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourvideo`
--
ALTER TABLE `tourvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholesaleorders`
--
ALTER TABLE `wholesaleorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wholesaleproduct`
--
ALTER TABLE `wholesaleproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `businessdetails`
--
ALTER TABLE `businessdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `clearancesale`
--
ALTER TABLE `clearancesale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactform`
--
ALTER TABLE `contactform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `footwear_size`
--
ALTER TABLE `footwear_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `footwear_type`
--
ALTER TABLE `footwear_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `ordercustomerdetails`
--
ALTER TABLE `ordercustomerdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `orderpickupstation`
--
ALTER TABLE `orderpickupstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `orderproducts`
--
ALTER TABLE `orderproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `ordershippingaddress`
--
ALTER TABLE `ordershippingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `order_tracking_details`
--
ALTER TABLE `order_tracking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pickupstation`
--
ALTER TABLE `pickupstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_brands`
--
ALTER TABLE `product_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `promotion_products`
--
ALTER TABLE `promotion_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recentlyviewed`
--
ALTER TABLE `recentlyviewed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recoverpasswordkey`
--
ALTER TABLE `recoverpasswordkey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `savedproducts`
--
ALTER TABLE `savedproducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shippingaddress`
--
ALTER TABLE `shippingaddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tourvideo`
--
ALTER TABLE `tourvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wholesaleorders`
--
ALTER TABLE `wholesaleorders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wholesaleproduct`
--
ALTER TABLE `wholesaleproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
