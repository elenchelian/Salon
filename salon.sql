-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 01:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `salon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `email`, `password`, `username`) VALUES
(1, 'admin@gmail.com', '4d78f1e1daad4cb92c832d39a150403d', 'Elen Admin'),
(4, 'admin2@gmail.com', '4d78f1e1daad4cb92c832d39a150403d', 'Admin2');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `booking_email` varchar(255) NOT NULL,
  `booking_service` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_time` varchar(255) NOT NULL,
  `booking_phone_num` varchar(255) NOT NULL,
  `booking_bank` varchar(255) NOT NULL,
  `booking_card_num` varchar(255) NOT NULL,
  `booking_card_date` varchar(255) NOT NULL,
  `booking_card_year` varchar(255) NOT NULL,
  `booking_card_code` varchar(255) NOT NULL,
  `booking_deposit` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `firstname`, `booking_email`, `booking_service`, `booking_date`, `booking_time`, `booking_phone_num`, `booking_bank`, `booking_card_num`, `booking_card_date`, `booking_card_year`, `booking_card_code`, `booking_deposit`, `booking_status`, `reason`) VALUES
(1, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Wash & Blow', '2022-08-27', '06:50', '123123123', 'Maybank', '1231231231', 'March', '2022', '232', '200', 'canceled', ''),
(4, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-08-27', '23:04', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '10', 'canceled', ''),
(5, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-08-27', '23:22', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '10', 'canceled', 'testing'),
(6, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-08-27', '23:22', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '10', 'canceled', ' Need to postpone to another day'),
(7, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Manicure', '2022-08-31', '14:30', '0188724426', 'Cimb', '1234567890123456', 'January', '2022', '123', '30', 'canceled', 'reason woribnf'),
(8, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-09-06', '17:56', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '15', 'canceled', ' i got work'),
(9, 'Kartiga', 'kartiga@gmail.com', 'Hair Wash & Blow', '2022-09-16', '01:57', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '134', '25', 'completed', ''),
(10, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-09-17', '14:20', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '23', 'canceled', ' dsdf'),
(11, 'ELENCHELIAN', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-09-24', '06:24', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '23', 'canceled', ' chumma'),
(12, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Facial spa', '2022-09-02', '03:38', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '79', 'completed', ''),
(13, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Facial spa', '2022-09-16', '03:43', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '24', 'canceled', ' gg'),
(14, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Hair Cut', '2022-09-30', '22:41', '0188724426', 'Cimb', '1234567890123456', 'January', '2022', '123', '19', 'completed', ''),
(15, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Hair treatment', '2022-09-16', '14:25', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '15', 'accepted', ''),
(16, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Bleaching', '2022-09-23', '14:28', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '15', 'accepted', ''),
(17, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Bleaching', '2022-09-24', '14:30', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '10', 'accepted', ''),
(18, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Hair colouring', '2022-09-15', '14:39', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '10', 'pending', ''),
(19, 'ELENCHELIAN ', 'elenchelianelen@gmail.com', 'Nail Extension', '2022-09-10', '14:40', '0188724426', 'Maybank', '1234567890123456', 'January', '2022', '123', '20', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `reward_item`
--

CREATE TABLE `reward_item` (
  `id` int(11) NOT NULL,
  `reward_item` varchar(255) NOT NULL,
  `reward_point` int(255) NOT NULL,
  `reward_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reward_item`
--

INSERT INTO `reward_item` (`id`, `reward_item`, `reward_point`, `reward_path`) VALUES
(1, 'Herbel Essance Shampoo', 150, 'assets/reward_item/shampoo.jpg'),
(2, 'Herbal Essance Conditioner', 250, 'assets/reward_item/conditioner.jpg'),
(3, '50% OFF Discount', 50, 'assets/reward_item/50off.jpg'),
(15, 'Latest_icon', 120, 'assets/reward_item/favicon.png');

-- --------------------------------------------------------

--
-- Table structure for table `reward_point`
--

CREATE TABLE `reward_point` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `redeem_item` varchar(255) NOT NULL,
  `points` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reward_point`
--

INSERT INTO `reward_point` (`id`, `email`, `service`, `redeem_item`, `points`, `date`) VALUES
(20, 'kartiga@gmail.com', '', '50% OFF Discount', '150', ''),
(21, 'elenchelianelen@gmail.com', '', '50% OFF Discount', '150', ''),
(22, 'elenchelianelen@gmail.com', '', '50% OFF Discount', '150', ''),
(23, 'kartiga@gmail.com', '', '50% OFF Discount', '150', ''),
(24, 'elenchelianelen@gmail.com', '', 'Herbal Essance Conditioner', '250', ''),
(39, 'elenchelianelen@gmail.com', '', '50% OFF Discount', '50', ''),
(40, 'elenchelianelen@gmail.com', '', '50% OFF Discount', '50', ''),
(41, 'kartiga@gmail.com', '', 'Herbal Essance Conditioner', '250', ''),
(42, 'kartiga@gmail.com', '', 'Herbal Essance Conditioner', '250', ''),
(43, 'kartiga@gmail.com', '', 'Herbal Essance Conditioner', '250', ''),
(44, 'kartiga@gmail.com', '', 'Herbal Essance Conditioner', '250', ''),
(45, 'kartiga@gmail.com', '', '50% OFF Discount', '50', ''),
(48, 'kartiga@gmail.com', 'Hair Wash ', '', '75', ''),
(49, 'elenchelianelen@gmail.com', 'Facial spa', '', '75', ''),
(50, 'elenchelianelen@gmail.com', '', 'Herbal Essance Conditioner', '250', ''),
(51, 'elenchelianelen@gmail.com', 'Hair Cut', '', '75', ''),
(52, 'elenchelianelen@gmail.com', '', 'Latest_icon', '120', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(255) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_price` varchar(255) NOT NULL,
  `service_cat` varchar(255) NOT NULL,
  `service_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `service_name`, `service_price`, `service_cat`, `service_desc`) VALUES
(1, 'Hair Cut', '19', 'Hair_Care', 'The technique of shaping hair by cutting, tapering, texturizing, and thinning it with any hair-cutting equipment'),
(2, 'Hair Wash & Blow', '25', 'Hair_Care', 'The technique of blow-drying hair to the desired style after a wash to achieve curly, straight, or subtle waves without the use of a flat iron or curling iron'),
(3, 'Hair treatment', '49', 'Hair_Care', 'Treating typical hair issues include hair loss, dryness, dandruff, frizzy hair, thinning hair, and other associated issues'),
(4, 'Keratin treatment', '79', 'Hair_Care', 'A method for smoothing and frequently straightening hair'),
(5, 'Rebonding', '139', 'Hair_Care', 'A chemical process that modifies the hair\'s natural structure and aids in giving it a smooth, silky, straight appearance'),
(6, 'Relaxing', '139', 'Hair_Care', 'A chemical treatment that straightens curly hair by breaking down the bonds in the hair shaft'),
(7, 'Hair colouring', '129', 'Hair_Care', 'The process of changing the hair color'),
(8, 'Bleaching', '79', 'Hair_Care', 'A chemical process that results in lighter hair colour by removing the pigment (colour) from hair strands'),
(9, 'Balayage', '129', 'Hair_Care', 'This hair colouring method involves hand-painting or \"sweeping\" highlights over the surface of haphazard hair parts'),
(10, 'Facial spa', '79', 'Skin_Care', 'A skin-beautifying procedure that exfoliates dead skin cells, cleans pores, hydrates, and moisturises skin while treating common skin problems with a personalised regimen'),
(11, 'Makeup', '89', 'Skin_Care', 'A visual transformation of people\'s\' appearance via make-up, paint, wigs, and other accessories'),
(12, 'Manicure', '69', 'Nail_Care', 'The curation and care of a client\'s hands by using special tools, creams, waxes and massage techniques'),
(13, 'Pedicure', '69', 'Nail_Care', 'The curation and care of a client\'s feet by using special tools, creams, waxes and massage techniques'),
(14, 'Nail Extension', '129', 'Nail_Care', 'The addition of an artificial tip to the tip of the nail to increase the length as fashion accessories');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reward_points` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `gender`, `address`, `password`, `reward_points`) VALUES
(1, 'ELENCHELIAN   ', 'SELVAN', 'Elenchelian Z ', 'elenchelianelen@gmail.com', 'Male', 'No 14,jalan bukit lentang 5, taman bukit lentang ,gemas ,negeri sembilan   ', '4d78f1e1daad4cb92c832d39a150403d', '505'),
(2, 'Kartiga', 'kann', 'kartiga ', 'kartiga@gmail.com', 'Female', 'No 14,jalan bukit lentang 5, taman bukit lentang ,gemas ,negeri sembilan', '4d78f1e1daad4cb92c832d39a150403d', '700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_item`
--
ALTER TABLE `reward_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward_point`
--
ALTER TABLE `reward_point`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reward_item`
--
ALTER TABLE `reward_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reward_point`
--
ALTER TABLE `reward_point`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
