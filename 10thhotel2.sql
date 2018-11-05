-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2018 at 01:29 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `10thhotel3`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(50) NOT NULL,
  `bill_date` date NOT NULL,
  `bill_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate`
--

CREATE TABLE `candidate` (
  `cand_id` int(11) NOT NULL,
  `vac_id` int(50) NOT NULL,
  `cand_name` varchar(100) NOT NULL,
  `cand_email` varchar(100) NOT NULL,
  `cand_cv` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`cand_id`, `vac_id`, `cand_name`, `cand_email`, `cand_cv`) VALUES
(20, 2, 'ashan', 'ashan@gmail.com', 'upload_cv/Final Report.docx');

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

CREATE TABLE `chatbox` (
  `chat_id` int(100) NOT NULL,
  `cus_id` int(100) NOT NULL,
  `chat_date` date NOT NULL,
  `chat_time` time NOT NULL,
  `chat_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `cuisine_id` varchar(20) NOT NULL,
  `c_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`cuisine_id`, `c_name`) VALUES
('a', 'Asian'),
('i', 'International'),
('l', 'Local');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(100) NOT NULL,
  `cus_fname` varchar(100) NOT NULL,
  `cus_lname` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `country` varchar(50) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `cus_username` varchar(100) NOT NULL,
  `cus_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_fname`, `cus_lname`, `dob`, `country`, `cus_email`, `mobile`, `cus_username`, `cus_password`) VALUES
(1, 'nimal', 'jayaweera', '2018-03-14', 'Sri Lanka', 'nimal@gmail.com', 777777777, 'nimal', '123');

-- --------------------------------------------------------

--
-- Table structure for table `establishment_type`
--

CREATE TABLE `establishment_type` (
  `e_id` varchar(2) NOT NULL,
  `e_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `establishment_type`
--

INSERT INTO `establishment_type` (`e_id`, `e_type`) VALUES
('c', 'Coffee and Tea'),
('d', 'Dessert'),
('m', 'Main');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fd_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `fd_msg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fd_id`, `cus_id`, `fd_msg`) VALUES
(4, 1, 'good one');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotel_id` varchar(10) NOT NULL,
  `hotel_name` varchar(50) NOT NULL,
  `h_location` varchar(50) NOT NULL,
  `h_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotel_id`, `hotel_name`, `h_location`, `h_desc`) VALUES
('01', 'Tenth Hotel ', 'Ella', 'dgh');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `minimum_stock` int(50) NOT NULL,
  `total_stock` int(50) NOT NULL,
  `unitprice` int(11) NOT NULL,
  `current_stock` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_vacancy`
--

CREATE TABLE `job_vacancy` (
  `vac_id` int(50) NOT NULL,
  `position` varchar(100) NOT NULL,
  `salary` int(8) NOT NULL,
  `contract` varchar(10) NOT NULL,
  `job_availability` varchar(15) NOT NULL,
  `job_description` varchar(900) NOT NULL,
  `job_image` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_vacancy`
--

INSERT INTO `job_vacancy` (`vac_id`, `position`, `salary`, `contract`, `job_availability`, `job_description`, `job_image`) VALUES
(1, 'Waiter', 20000, 'Full time', 'Available', 'If you\'re a Waiter looking to step up, we need you for a very Cool Concept.As Waiter, you can work with fantastic ingredients from around the world! \r\nMy client is looking for a Waiters that can be an inspirational leader. Working with the best operators in....', 'assets/img/vacancies/waiter.jpg'),
(2, 'Chef', 30000, 'Full time', 'Available', 'If you\'re a Chef looking to step up, we need you for a very Cool Concept. \r\n                                        As Waiter, you can work with fantastic ingredients from around the world! My client is looking for a Waiters that can be an inspirational leader. Working with the best operators in....', 'assets/img/vacancies/chef.png'),
(3, 'Receptionist', 35000, 'Part time', 'Not Available', 'As a Receptionist, you will be the ambassador of our company’s first impressions on the guests and visitors.It will be your foremost responsibility to compassionately greet all incoming guests, visitors, and members,help them with directions...', 'assets/img/vacancies/receptionist.jpg'),
(4, 'Manager', 50000, 'Full time', 'Available', 'Our Client is looking for a GM with proven experience in Hotels.Applicants should have at least 5 years experience in the similar role .Pre opening experience will be preferred.....', 'assets/img/vacancies/manager.jpg'),
(659859, 'kknj', 95, 'nj', 'bhbh', 'hbhb', 'assets/img/vacancies/23550203_1416176648494691_7197531292097524711_o.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `meal_id` varchar(11) NOT NULL,
  `meal_name` varchar(100) NOT NULL,
  `meal_desc` varchar(500) NOT NULL,
  `meal_image` varchar(500) NOT NULL,
  `e_id` varchar(100) NOT NULL,
  `price_per_meal` varchar(100) NOT NULL,
  `cuisine_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`meal_id`, `meal_name`, `meal_desc`, `meal_image`, `e_id`, `price_per_meal`, `cuisine_id`) VALUES
('4', 'fff', 'bnhj', 'uploads/dinning9.jpg', 'c', '67', 'i'),
('meal1', 'Indian Rice', 'Fried rice has a Chinese flavour while biryani has sweet aroma of Indian spices. Though both uses pepper, green chillies, ginger, garlic and coriander leaves, all other ingredients are entirely different. ', 'uploads/rice.jpg', 'm', '200', 'a'),
('meal2', 'Stringhoppers', 'his is specially eaten with coconut gravy/ Kiri hodhi and with Pol Sambol. String Hopper press and hoppers mats might available from Indian and Sri Lankan food store. This String Hoppers can be made with wheat flour also, but you have to steam the flour first before to make string hoppers.', 'uploads/stringhoppers.jpeg', 'm', '300', 'l'),
('meal3', 'Cocount Roti', 'This coconut Roti (flat bread) is eaten almost every day for breakfast in central of Sri Lanka. This is the place known for produces much of the famous Ceylon tea, planted by the British in 1980\'s. This is also a busy tourist spot due to its cool climate. These roti\'s are made with freshly grated coconut, white flour, water and salt.', 'uploads/coconutRoti.jpg', 'm', '50', 'l'),
('meal4', 'Noodles', 'Noodles are a staple food in many cultures. They are made from unleavened dough which is stretched, extruded, or rolled flat and cut into one of a variety of shapes. While long, thin strips may be the most common, many varieties of noodles are cut into waves, helices, tubes, strings, or shells, or folded over, or cut into other ...', 'uploads/noodles.jpg', 'm', '250', 'i');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_type` int(11) NOT NULL,
  `msg_desc` int(11) NOT NULL,
  `msg_date` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_meal`
--

CREATE TABLE `order_meal` (
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `cus_id` int(100) NOT NULL,
  `meal_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(50) NOT NULL,
  `bill_id` int(50) NOT NULL,
  `cus_id` int(100) NOT NULL,
  `payment_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pre_planed_tours`
--

CREATE TABLE `pre_planed_tours` (
  `tour_id` int(100) NOT NULL,
  `tour_name` varchar(100) NOT NULL,
  `places_to_visit` varchar(500) NOT NULL,
  `price` int(100) NOT NULL,
  `no_of_participant` int(50) NOT NULL,
  `no_of_days` int(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `tp_image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pre_planed_tours`
--

INSERT INTO `pre_planed_tours` (`tour_id`, `tour_name`, `places_to_visit`, `price`, `no_of_participant`, `no_of_days`, `description`, `tp_image`) VALUES
(2, 'Around Ella', 'Ella Rock, Ella Black Pool, Ravana Falls, Little Adams Peak', 900, 8, 1, 'breakfast, lunch included. Bath in Ella Black pool ', 'upload/ellarock.jpg'),
(4, 'Around Badulla', 'Muthiyangana Temple,Black pool, Bogoda wooden bridge', 800, 8, 1, 'Lunch included', 'upload/B1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pre_planed_tour_reservation`
--

CREATE TABLE `pre_planed_tour_reservation` (
  `tour_no` int(50) NOT NULL,
  `tour_check_in` date NOT NULL,
  `tour_check_out` date NOT NULL,
  `date` date NOT NULL,
  `cus_id` int(100) NOT NULL,
  `tour_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `promotion_no` int(11) NOT NULL,
  `prm_caption` varchar(200) DEFAULT NULL,
  `prm_desc` varchar(700) NOT NULL,
  `promotion_cat_id` varchar(10) NOT NULL,
  `promotion_name` varchar(100) NOT NULL,
  `promotion_img` varchar(500) NOT NULL,
  `package _details` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion`
--

INSERT INTO `promotion` (`promotion_no`, `prm_caption`, `prm_desc`, `promotion_cat_id`, `promotion_name`, `promotion_img`, `package _details`) VALUES
(1, '', 'The Tenth Hotel aspires to exceed customer expectation in offering the very best in service, be it in the excellence of ingredients for cuisine, to the very best of individual comforts from the luxurious indulging of BVLGARI cosmetics to the richness of Frette linen.\r\n						Guestrooms are decorated in soothing shades of beige with white marble bathrooms and furniture in relaxing ivory tones, embracing you with modern warmth and classic design elements.\r\n						', '2', 'BEST RATE GUARANTEED - 22% OFF', 'uploads/promotions/p4.jpg', 'Buffet Breakfast at Harbour Court Restaurant,\r\n  Free Wi-Fi - Unlimited Devices,\r\n  Free Gym Access,\r\n  Executive Lounge Access [Only for Executive Rooms Suites],\r\nriority Early Check In Late Check Out [ Subject to Availability.]'),
(2, 'A buffet that is grand, elegant &amp; outrageously scrumptious', 'A buffet that is grand, elegant &amp; outrageously scrumptiousA buffet that is grand, elegant &amp; outrageously scrumptiousA buffet that is grand, elegant &amp; outrageously scrumptious', '1', 'Restaurant Lunch Buffet', 'uploads/promotions/p5.jpg', 'a\r\ns\r\nc\r\nv\r\n\r\n'),
(3, 'This Avurudu season, avoid the long drives and enjoy cosmopolitan luxury at The Tenth hotel Residences', 'THE PERFECT ‘AVURUDU’ ESCAPE IN THE CITYTHE PERFECT ‘AVURUDU’ ESCAPE IN THE CITYTHE PERFECT ‘AVURUDU’ ESCAPE IN THE CITY', '1', 'THE PERFECT \'AVURUDU\' ESCAPE IN THE CITY', 'uploads/promotions/p6.jpg', 'v\r\nv\r\nxf\r\n\r\nb\r\n cg');

-- --------------------------------------------------------

--
-- Table structure for table `promotion_category`
--

CREATE TABLE `promotion_category` (
  `promotion_cat_id` varchar(10) NOT NULL,
  `cat_name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promotion_category`
--

INSERT INTO `promotion_category` (`promotion_cat_id`, `cat_name`) VALUES
('1', 'g'),
('2', 'b');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_no` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `room_no` int(10) NOT NULL,
  `cus_id` int(100) NOT NULL,
  `reservation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_no`, `checkin`, `checkout`, `room_no`, `cus_id`, `reservation_date`) VALUES
(113, '2018-05-25', '2018-05-30', 2, 2, '2018-05-14'),
(114, '2018-05-30', '2018-05-31', 1, 2, '2018-05-14'),
(115, '2018-05-18', '2018-05-19', 3, 2, '2018-05-14'),
(116, '2018-05-16', '2018-05-17', 1, 2, '2018-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_no` int(10) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `hotel_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_no`, `cat_id`, `hotel_id`) VALUES
(1, 1, '01'),
(2, 1, '01'),
(3, 2, '01'),
(4, 2, '01'),
(5, 2, '01'),
(6, 3, '01'),
(7, 3, '01'),
(8, 3, '01'),
(9, 3, '01'),
(10, 3, '01');

-- --------------------------------------------------------

--
-- Table structure for table `room_category`
--

CREATE TABLE `room_category` (
  `cat_id` int(5) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `approximate_size` int(100) NOT NULL,
  `maximum_adults` int(5) NOT NULL,
  `bed_type` varchar(10) NOT NULL,
  `connecting_rooms` varchar(30) NOT NULL,
  `room_price` int(50) NOT NULL,
  `cat_desc` varchar(700) NOT NULL,
  `room_image` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_category`
--

INSERT INTO `room_category` (`cat_id`, `cat_name`, `approximate_size`, `maximum_adults`, `bed_type`, `connecting_rooms`, `room_price`, `cat_desc`, `room_image`) VALUES
(1, 'Master Bedroom', 54, 3, 'King', 'Not available', 50000, 'Separate living and dining areas |\r\nBlack-out curtains |\r\nQuality bed with pillow top mattress |\r\nWork desk ', 'assets/img/bedRooms/masterBedroom.jpg'),
(2, 'Deluxe Double Room', 27, 3, 'King,Twin', 'Limited availability', 25000, '40 inch LED TV |\r\nBlack-out curtains |\r\nQuality bed with pillow top mattress |', 'assets/img/bedRooms/Bedroom1.jpg'),
(3, 'Deluxe Twin Room', 24, 2, 'Twin', 'Limited availability', 15000, '40 inch LED TV |\r\nBlack-out curtains |\r\nQuality bed with pillow top mattress |', 'assets/img/bedRooms/Bedroom2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `staff_member`
--

CREATE TABLE `staff_member` (
  `user_id` int(100) NOT NULL,
  `added_date` date NOT NULL,
  `admin_id` int(100) NOT NULL,
  `staff_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemadmin_candidate`
--

CREATE TABLE `systemadmin_candidate` (
  `cand_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemadmin_job_vacancy`
--

CREATE TABLE `systemadmin_job_vacancy` (
  `vac_id` int(50) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser`
--

CREATE TABLE `systemuser` (
  `user_id` int(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `mobile` int(10) NOT NULL,
  `user_type` varchar(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `salary` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_bill`
--

CREATE TABLE `systemuser_bill` (
  `bill_id` int(50) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_chatbox`
--

CREATE TABLE `systemuser_chatbox` (
  `chat_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_feedback`
--

CREATE TABLE `systemuser_feedback` (
  `fd_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_inventory`
--

CREATE TABLE `systemuser_inventory` (
  `item_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_meal`
--

CREATE TABLE `systemuser_meal` (
  `meal_id` varchar(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_pre_planned_tours`
--

CREATE TABLE `systemuser_pre_planned_tours` (
  `tour-id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_promotion`
--

CREATE TABLE `systemuser_promotion` (
  `promotion_no` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_rooms`
--

CREATE TABLE `systemuser_rooms` (
  `room_no` int(10) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_tour_guide`
--

CREATE TABLE `systemuser_tour_guide` (
  `tg_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_tour_plan`
--

CREATE TABLE `systemuser_tour_plan` (
  `tp_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `systemuser_transport_services`
--

CREATE TABLE `systemuser_transport_services` (
  `vehical_id` int(11) NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `system_admin`
--

CREATE TABLE `system_admin` (
  `user_id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide`
--

CREATE TABLE `tour_guide` (
  `tg_id` int(11) NOT NULL,
  `tg_name` varchar(100) NOT NULL,
  `NIC` varchar(10) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `experience` varchar(1000) NOT NULL,
  `language` varchar(700) NOT NULL,
  `tg_image` varchar(500) NOT NULL,
  `price_per_hour` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tour_guide`
--

INSERT INTO `tour_guide` (`tg_id`, `tg_name`, `NIC`, `contact_no`, `experience`, `language`, `tg_image`, `price_per_hour`) VALUES
(1, 'Nimal', '111111111v', 777777777, 'Worked as a tour guide for 2 years', 'Sinhala, Tamil, English, Japanese, Hindi, Bengali, Chinies ', 'upload/p1.jpg', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tour_guide_reservation`
--

CREATE TABLE `tour_guide_reservation` (
  `tour_guide_no` int(15) NOT NULL,
  `tg_checkin` date NOT NULL,
  `tg_checkout` date NOT NULL,
  `places_to_visit` varchar(100) NOT NULL,
  `tg_checkin_time` time NOT NULL,
  `date` date NOT NULL,
  `cus_id` int(100) NOT NULL,
  `tg_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tour_plan`
--

CREATE TABLE `tour_plan` (
  `tp_id` int(11) NOT NULL,
  `checkin` date NOT NULL,
  `checkout` date NOT NULL,
  `date` date NOT NULL,
  `other` varchar(500) NOT NULL,
  `no_of_participant` int(10) NOT NULL,
  `pick_up_time` date NOT NULL,
  `places` varchar(200) NOT NULL,
  `cus_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transport_services`
--

CREATE TABLE `transport_services` (
  `vehical_id` int(11) NOT NULL,
  `no_of_passangers` int(50) NOT NULL,
  `price_per_km` int(11) NOT NULL,
  `vehical_image` varchar(500) NOT NULL,
  `vehical_type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transport_services`
--

INSERT INTO `transport_services` (`vehical_id`, `no_of_passangers`, `price_per_km`, `vehical_image`, `vehical_type`) VALUES
(1, 4, 40, 'upload/c1.jpg', 'Standard'),
(2, 8, 45, 'upload/c2.jpg', 'Standard');

-- --------------------------------------------------------

--
-- Table structure for table `transport_services_reservation`
--

CREATE TABLE `transport_services_reservation` (
  `transport_no` int(11) NOT NULL,
  `ts_checkin` date NOT NULL,
  `ts_checkin_time` time NOT NULL,
  `ts_checkout` date NOT NULL,
  `places_to_visit` varchar(400) NOT NULL,
  `date` date NOT NULL,
  `cus_id` int(100) NOT NULL,
  `vehical_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`cand_id`),
  ADD KEY `vac_id` (`vac_id`);

--
-- Indexes for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD PRIMARY KEY (`chat_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`cuisine_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `establishment_type`
--
ALTER TABLE `establishment_type`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fd_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `job_vacancy`
--
ALTER TABLE `job_vacancy`
  ADD PRIMARY KEY (`vac_id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`meal_id`),
  ADD KEY `e_id` (`e_id`),
  ADD KEY `cuisine_id` (`cuisine_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_meal`
--
ALTER TABLE `order_meal`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `meal_id` (`meal_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `bill_id` (`bill_id`);

--
-- Indexes for table `pre_planed_tours`
--
ALTER TABLE `pre_planed_tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `pre_planed_tour_reservation`
--
ALTER TABLE `pre_planed_tour_reservation`
  ADD PRIMARY KEY (`tour_no`),
  ADD KEY `cus_id` (`cus_id`),
  ADD KEY `tour_id` (`tour_id`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`promotion_no`),
  ADD KEY `promotion_cat_id` (`promotion_cat_id`);

--
-- Indexes for table `promotion_category`
--
ALTER TABLE `promotion_category`
  ADD PRIMARY KEY (`promotion_cat_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_no`),
  ADD KEY `room_no` (`room_no`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_no`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `room_type` (`cat_id`);

--
-- Indexes for table `room_category`
--
ALTER TABLE `room_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `staff_member`
--
ALTER TABLE `staff_member`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `systemadmin_candidate`
--
ALTER TABLE `systemadmin_candidate`
  ADD PRIMARY KEY (`cand_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemadmin_job_vacancy`
--
ALTER TABLE `systemadmin_job_vacancy`
  ADD PRIMARY KEY (`vac_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser`
--
ALTER TABLE `systemuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `systemuser_bill`
--
ALTER TABLE `systemuser_bill`
  ADD PRIMARY KEY (`bill_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_chatbox`
--
ALTER TABLE `systemuser_chatbox`
  ADD PRIMARY KEY (`chat_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_feedback`
--
ALTER TABLE `systemuser_feedback`
  ADD PRIMARY KEY (`fd_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_inventory`
--
ALTER TABLE `systemuser_inventory`
  ADD PRIMARY KEY (`item_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_meal`
--
ALTER TABLE `systemuser_meal`
  ADD PRIMARY KEY (`meal_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_pre_planned_tours`
--
ALTER TABLE `systemuser_pre_planned_tours`
  ADD PRIMARY KEY (`tour-id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_promotion`
--
ALTER TABLE `systemuser_promotion`
  ADD PRIMARY KEY (`promotion_no`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_rooms`
--
ALTER TABLE `systemuser_rooms`
  ADD PRIMARY KEY (`user_id`,`room_no`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `systemuser_tour_guide`
--
ALTER TABLE `systemuser_tour_guide`
  ADD PRIMARY KEY (`tg_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_tour_plan`
--
ALTER TABLE `systemuser_tour_plan`
  ADD PRIMARY KEY (`tp_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `systemuser_transport_services`
--
ALTER TABLE `systemuser_transport_services`
  ADD PRIMARY KEY (`vehical_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `system_admin`
--
ALTER TABLE `system_admin`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tour_guide`
--
ALTER TABLE `tour_guide`
  ADD PRIMARY KEY (`tg_id`);

--
-- Indexes for table `tour_guide_reservation`
--
ALTER TABLE `tour_guide_reservation`
  ADD PRIMARY KEY (`tour_guide_no`),
  ADD KEY `tg_id` (`tg_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `tour_plan`
--
ALTER TABLE `tour_plan`
  ADD PRIMARY KEY (`tp_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `transport_services`
--
ALTER TABLE `transport_services`
  ADD PRIMARY KEY (`vehical_id`);

--
-- Indexes for table `transport_services_reservation`
--
ALTER TABLE `transport_services_reservation`
  ADD PRIMARY KEY (`transport_no`),
  ADD KEY `vehical_id` (`vehical_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `cand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `chatbox`
--
ALTER TABLE `chatbox`
  MODIFY `chat_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_meal`
--
ALTER TABLE `order_meal`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pre_planed_tours`
--
ALTER TABLE `pre_planed_tours`
  MODIFY `tour_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pre_planed_tour_reservation`
--
ALTER TABLE `pre_planed_tour_reservation`
  MODIFY `tour_no` int(50) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promotion`
--
ALTER TABLE `promotion`
  MODIFY `promotion_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `systemuser`
--
ALTER TABLE `systemuser`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour_guide`
--
ALTER TABLE `tour_guide`
  MODIFY `tg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tour_guide_reservation`
--
ALTER TABLE `tour_guide_reservation`
  MODIFY `tour_guide_no` int(15) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tour_plan`
--
ALTER TABLE `tour_plan`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transport_services`
--
ALTER TABLE `transport_services`
  MODIFY `vehical_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transport_services_reservation`
--
ALTER TABLE `transport_services_reservation`
  MODIFY `transport_no` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_job_vacancy_fk` FOREIGN KEY (`vac_id`) REFERENCES `job_vacancy` (`vac_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chatbox`
--
ALTER TABLE `chatbox`
  ADD CONSTRAINT `chatbox_customer_fk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_custmer_fk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_cuisine_fk` FOREIGN KEY (`cuisine_id`) REFERENCES `cuisine` (`cuisine_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meal_establishment_type_fk` FOREIGN KEY (`e_id`) REFERENCES `establishment_type` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_system_user_fk` FOREIGN KEY (`user_id`) REFERENCES `systemuser` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `order_meal`
--
ALTER TABLE `order_meal`
  ADD CONSTRAINT `order_meal_customer_fk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_meal_meal_fk` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`meal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_bill_fk` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`),
  ADD CONSTRAINT `payment_customer_fk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pre_planed_tour_reservation`
--
ALTER TABLE `pre_planed_tour_reservation`
  ADD CONSTRAINT `pre_planed_tour_fk ` FOREIGN KEY (`tour_id`) REFERENCES `pre_planed_tours` (`tour_id`),
  ADD CONSTRAINT `pre_planed_tourcustomer_fk` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
