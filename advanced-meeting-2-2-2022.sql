-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 02, 2022 at 09:52 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advanced-meeting`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department` varchar(45) NOT NULL COMMENT 'ฝ่าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department`) VALUES
(1, 'กลยุทธ์องค์กร'),
(2, 'บัญชี'),
(3, 'การเงิน'),
(4, 'บริหาร และ เลขานุการ'),
(5, 'บุคคล และ จป.'),
(6, 'ก่อสร้าง'),
(7, 'จัดซื้อ และ สโตร์'),
(8, 'ขาย และ การตลาด'),
(9, 'ซ่อมบำรุง'),
(10, 'เหมืองแร่'),
(11, 'ขนส่ง'),
(12, 'วิจัยและพัฒนา');

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `equipment` varchar(100) NOT NULL COMMENT 'อุปกรณ์',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(100) DEFAULT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`id`, `equipment`, `description`, `photo`) VALUES
(1, 'โน๊ตบุ๊ค', 'โน๊ตบุ๊ค Acer', 'equipment-8b8f03718223c9970579776b1b6507f3.jpg'),
(2, 'ทีวี', 'TV 50 นิ้ว', 'equipment-a929d517f994add56c2a914fdff57acc.jpg'),
(3, 'ไมค์คอนเฟอเรนซ์', 'ไมค์', 'equipment-fd456406745d816a45cae554c788e754.jpg'),
(4, 'ไมค์ลอย', 'ไมค์ลอย', 'equipment-e5e633f8bd2b3ce37d24fe84a60c03bb.jpg'),
(5, 'โปรเจคเตอร์', 'โปรเจคเตอร์', 'equipment-d7bdf611b76c18d68c14f5dff9793191.jpg'),
(6, ' ฉากโปรเจคเตอร์', ' ฉากโปรเจคเตอร์', 'equipment-a883507e77efb2575dd1b4a213a5605d.jpg'),
(7, 'ระบบเสียงในห้องประชุม', 'ระบบเสียงในห้องประชุม', 'equipment-5e87f4f0a202b01c15a6b639ee4fa6c7.jpg'),
(8, 'เครื่องเสียงเคลื่อนที่', 'เครื่องเสียงเคลื่อนที่', 'equipment-d3a3555afd7dd903bc37116aa4ed3d9f.png'),
(9, 'น้ำดื่ม', 'น้ำดื่ม', 'equipment-ed2095673d4fb96cb65c78149643df0f.png'),
(10, 'อาหารว่าง / เบรค', 'อาหารว่าง / เบรค', 'equipment-33a30a00465dbbcdd537eb8025e03a48.jpg'),
(11, 'เครื่องเสียงเวที ชุดใหญ่', 'เครื่องเสียงเวที ชุดใหญ่', 'equipment-d86c39e5b8e51b0c8fb3a5923a3fbfb1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL COMMENT 'หัวข้อการประชุม',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `quantity` int(4) NOT NULL COMMENT 'ผู้เข้าร่วม',
  `date_start` datetime NOT NULL COMMENT 'เริ่ม',
  `date_end` datetime NOT NULL COMMENT 'สิ้นสุด',
  `created_at` datetime DEFAULT NULL COMMENT 'เพิ่มเมื่อ',
  `updated_at` datetime DEFAULT NULL COMMENT 'แก้ไขเมื่อ',
  `room_id` int(11) NOT NULL COMMENT 'ห้องประชุม',
  `user_id` int(11) NOT NULL COMMENT 'ผู้จอง',
  `status_id` int(11) NOT NULL DEFAULT '1' COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `title`, `description`, `quantity`, `date_start`, `date_end`, `created_at`, `updated_at`, `room_id`, `user_id`, `status_id`) VALUES
(14, 'อบรมการใช้ Excel', 'อบรมการใช้ Excel2', 10, '2022-01-24 10:00:00', '2022-01-28 11:00:00', NULL, '2022-02-02 12:55:59', 3, 2, 2),
(15, 'อบรม IT', 'อบรม IT', 5, '2022-01-29 13:00:00', '2022-01-29 14:00:00', NULL, NULL, 4, 1, 2),
(16, 'ทดสอบจองซ้ำ', 'ทดสอบจองซ้ำ', 2, '2022-01-29 14:05:00', '2022-01-29 15:00:00', NULL, '2022-02-02 08:54:29', 3, 2, 2),
(17, 'อบรมบัญชี', 'อบรมบัญชี', 10, '2022-02-01 15:30:00', '2022-02-03 16:00:00', NULL, NULL, 5, 2, 2),
(18, 'อบรม Formula', 'ใช้ห้องบัญชี', 25, '2022-02-01 09:30:00', '2022-02-01 16:00:00', NULL, '2022-02-02 08:47:08', 3, 2, 2),
(19, 'อบรม IT', 'อบรม ITอบรม ITอบรม ITอบรม ITอบรม ITอบรม ITอบรม ITอบรม IT', 99, '2022-02-02 08:00:00', '2022-02-01 10:00:00', NULL, '2022-02-02 08:55:06', 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1643182062),
('m130524_201442_init', 1643182064),
('m190124_110200_add_verification_token_column_to_user_table', 1643182064);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL COMMENT 'ชื่อ',
  `lastname` varchar(100) NOT NULL COMMENT 'นามสกุล',
  `photo` varchar(100) DEFAULT 'nopic.jpg' COMMENT 'รูปภาพ',
  `address` text COMMENT 'ที่อยู่',
  `tel` varchar(45) DEFAULT NULL COMMENT 'เบอร์โทร',
  `department_id` int(11) NOT NULL COMMENT 'ฝ่าย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`user_id`, `firstname`, `lastname`, `photo`, `address`, `tel`, `department_id`) VALUES
(1, 'ชื่อผู้ใช้งาน', 'นามสกุลผู้ใช้งาน', '1-34a698206aa2cb1608fe680abd1505f4.jpg', '319 หมู่ที่ 5 ตำบลท่าสาย, เมืองเชียงราย, เชียงราย 57000', '0812345678', 1),
(2, 'ธีรพงศ์', 'ขันตา', '2-332532dcfaa1cbf61e2a266bd723612c.png', '319 หมู่ที่ 5 ตำบลท่าสาย, เมืองเชียงราย, เชียงราย 57000', '0870873830', 1),
(3, 'วีระพงศ์', 'ปัญญาสิทธิ์', '3-a883507e77efb2575dd1b4a213a5605d.jpg', '', '0899999999', 4);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'ชื่อห้องประชุม',
  `description` text NOT NULL COMMENT 'รายละเอียด',
  `photo` varchar(100) DEFAULT NULL COMMENT 'รูปภาพ',
  `color` varchar(7) DEFAULT NULL COMMENT 'สีประจำห้อง'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `description`, `photo`, `color`) VALUES
(3, 'ห้องไชยนารายณ์', 'ห้องประชุม1', 'room-16f09be77b014aff7cceba42bd23ebd0.jpg', '#ff00ff'),
(4, 'ห้องเวียงชัย', 'ห้องเวียงชัย', 'room-f95c592be11a67f822babc31e30fc5c4.jpg', '#3c78d8'),
(5, 'ห้องเม็งราย', 'เม็งราย', 'room-e20914d7f2e3d374a868d163e5b52e1a.jpg', '#9900ff');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'สถานะ',
  `color` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'สี'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`, `color`) VALUES
(1, 'รออนุมัติ', '#ffc107'),
(2, 'อนุมัติ', '#42ba96'),
(3, 'ยกเลิก', '#df4759'),
(4, 'ต้องแก้ไข', '#467fd0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'username',
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'auth_key',
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'password_hash',
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'password_reset_token',
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมล',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT 'status',
  `created_at` int(11) NOT NULL COMMENT 'วันที่สร้าง',
  `updated_at` int(11) NOT NULL COMMENT 'วันที่แก้ไข',
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'verification_token'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(1, 'user', 'BfVT7NESyAOfmZK0NJTiLCSVyL5fqy3h', '$2y$13$G0zHbEdwaARAzL694Zdoluo3i88GdIm0UjIhGF1cB4Zfcm6w6FaZ6', NULL, 'user@gmail.com', 10, 1643267082, 1643344559, NULL),
(2, 'theerapong', '5TKv5vltCLOoqhKwziJd0Zkza6GebQ_W', '$2y$13$UZGUn79il3lVs1eqCyKBWeB0uVqDELmGIV9A.u3H1y3Cr.6FL82xG', NULL, 'theerapong@crl.co.th', 10, 1643269258, 1643791962, NULL),
(3, 'veerapong', 'eLId5_d7Jm2vayuWK8KbVLdXaxOWGSCL', '$2y$13$/Z15f0g3jhgVq9zKpuEFSeAByLPnVBV6izQcIyhLOSISh4grMlHE2', NULL, 'itchiangrailand@gmail.com', 10, 1643793540, 1643793601, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uses`
--

CREATE TABLE `uses` (
  `meeting_id` int(11) NOT NULL COMMENT 'การจอง',
  `equipment_id` int(11) NOT NULL COMMENT 'อุปกรณ์ที่ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ใช้อุปกรณ์';

--
-- Dumping data for table `uses`
--

INSERT INTO `uses` (`meeting_id`, `equipment_id`) VALUES
(14, 1),
(16, 1),
(17, 1),
(18, 1),
(14, 2),
(15, 2),
(16, 2),
(17, 2),
(18, 2),
(19, 2),
(16, 3),
(17, 3),
(18, 3),
(17, 4),
(19, 4),
(17, 5),
(17, 6),
(18, 7),
(18, 9),
(18, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_meeting_room1_idx` (`room_id`),
  ADD KEY `fk_meeting_person1_idx` (`user_id`),
  ADD KEY `fk_meeting_status1_idx` (`status_id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_person_user_idx` (`user_id`),
  ADD KEY `fk_person_department1_idx` (`department_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `uses`
--
ALTER TABLE `uses`
  ADD PRIMARY KEY (`meeting_id`,`equipment_id`),
  ADD KEY `fk_meeting_has_equipment_equipment1_idx` (`equipment_id`),
  ADD KEY `fk_meeting_has_equipment_meeting1_idx` (`meeting_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `fk_meeting_person1` FOREIGN KEY (`user_id`) REFERENCES `person` (`user_id`),
  ADD CONSTRAINT `fk_meeting_room1` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`),
  ADD CONSTRAINT `fk_meeting_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `person`
--
ALTER TABLE `person`
  ADD CONSTRAINT `fk_person_department1` FOREIGN KEY (`department_id`) REFERENCES `department` (`id`),
  ADD CONSTRAINT `fk_person_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `uses`
--
ALTER TABLE `uses`
  ADD CONSTRAINT `fk_meeting_has_equipment_equipment1` FOREIGN KEY (`equipment_id`) REFERENCES `equipment` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_meeting_has_equipment_meeting1` FOREIGN KEY (`meeting_id`) REFERENCES `meeting` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
