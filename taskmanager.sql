-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 21, 2019 lúc 09:44 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `taskmanager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id`, `user`, `pass`, `user_id`) VALUES
(1, 'tunt@adsplus.vn', 'tunt', 1),
(2, 'linhbidao@occho.vn', 'linhchimbe', 2),
(3, 'dinhhoai18101998@gmail.com', 'tunt', 3),
(4, 'manmo@manmo.vn', 'manmo', 4),
(5, 'tontumo123@gmail.com', 'tunt', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permisstions`
--

CREATE TABLE `permisstions` (
  `id` int(11) NOT NULL,
  `permiss` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `permisstions`
--

INSERT INTO `permisstions` (`id`, `permiss`) VALUES
(1, 'ADMIN'),
(2, 'BOSS'),
(3, 'vice_boss'),
(4, 'manager_production'),
(5, 'manager_technical'),
(6, 'manager_develop'),
(7, 'manager_sale'),
(8, 'manager_admin'),
(9, 'marketing'),
(10, 'sale'),
(11, 'hr'),
(12, 'teachnical'),
(13, 'dev'),
(14, 'finance'),
(15, 'production'),
(16, 'none');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `headline` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `body` text COLLATE utf8_vietnamese_ci NOT NULL,
  `duedate` datetime NOT NULL,
  `parent` int(11) NOT NULL,
  `state` int(2) NOT NULL,
  `level` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tasks`
--

INSERT INTO `tasks` (`id`, `headline`, `body`, `duedate`, `parent`, `state`, `level`) VALUES
(1, 'Tạo hệ thống task manager', 'Tạo hệ thống task manager cho công  ty dược', '2019-11-30 12:00:00', 0, 0, 5),
(2, 'Tạo chức năng tính KIP', 'Chức năng tính KIP cho từng nhân viên theo thời gian và số lượng công việc và hệ phân quyền', '2019-12-07 12:00:00', 0, 2, 3),
(3, 'Tạo database cho hệ thống taskmanager', 'db cho hệ thống gồm 6 bảng\r\nhệ thống có chức năng tính KPI và lương theo KPI đã đạt được', '2019-11-26 12:00:00', 0, 2, 2),
(4, 'thiết kế giao diện cho hệ thống', 'hệ thống cần truy suất được với từng phòng ban và từ người quản trị hệ thôngs và từng nhân viên', '2019-11-27 19:00:00', 0, 2, 1),
(5, 'Thử nghiệm UI tù vcl', 'UI sinh ra đã tù thì nhìn nó vẫn tù', '2019-11-26 23:00:00', 1, 2, 0),
(6, 'Không thể nhìn được ra task to hay con', 'ui tù', '2019-11-26 23:00:00', 1, 1, 0),
(18, 'thử nghiệm', 'thưr nghiệm giao task 001fhgh', '2019-12-07 00:00:00', 1, 1, 0),
(19, 'thử nghiệm', 'thưr nghiệm', '2019-12-07 00:00:00', 2, 2, 0),
(20, 'n', 'n', '2019-12-04 00:00:00', 0, 1, 3),
(21, 'n', 'nnnnnnn', '2019-12-04 00:00:00', 0, 1, 4),
(22, 'n', 'nnnnnnnad', '2019-12-04 00:00:00', 0, 2, 2),
(23, 'n', 'nnnnnnnadkkk', '2019-12-04 00:00:00', 0, 1, 3),
(24, 'thử nghiệm tổng quan', 'test', '2019-12-20 00:00:00', 0, 1, 2),
(25, 'thử gnhiee', 'thử ngiada', '2019-12-05 00:00:00', 0, 1, 1),
(26, 'thử gnhiee', 'thử ngiadasssss', '2019-12-05 00:00:00', 0, 1, 4),
(27, 'thử gnhiee', 'thử ngiadasssssjnnjnj', '2019-12-05 00:00:00', 0, 1, 3),
(28, 'b  b  b', 'cgg v g v h ', '2019-12-04 00:00:00', 0, 1, 2),
(29, 'tests close modal', 'test modela', '2019-12-04 00:00:00', 0, 1, 1),
(30, '', 'thừ nheiejm 1', '2019-12-04 00:00:00', 3, 2, 0),
(31, 'Tạo database cho hệ thống taskmanager', 'test lần cuối thêm task con', '2019-11-26 12:00:00', 3, 2, 0),
(32, 'Tạo database cho hệ thống taskmanager', 'tedt lần 2', '2019-11-26 12:00:00', 3, 2, 0),
(33, 'Tạo database cho hệ thống taskmanager', 'test them mới', '2019-11-26 12:00:00', 3, 2, 0),
(34, 'Tạo database cho hệ thống taskmanager', '', '2019-11-26 12:00:00', 3, 2, 0),
(35, 'test dei', 'dấhd', '2019-12-05 00:00:00', 0, 1, 4),
(36, 'tesst test test', 't chỉ test thôi', '2019-12-25 00:00:00', 0, 1, 5),
(37, 'test cong việc có KPI', 'KPI cho công việc mới', '2019-12-28 00:00:00', 0, 1, 3),
(38, 'thiết kế giao diện cho hệ thống', 'test fiao diẹn cho hek thonafs', '2019-11-27 19:00:00', 4, 2, 0),
(39, 'n', 'test  1 phát cho nó tính dc kpi đoognj không ào', '2019-12-04 00:00:00', 22, 2, 0),
(40, 'n', 'lần 2 xem nó có chuyền task + fix động k nào', '2019-12-04 00:00:00', 22, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `zone` int(11) NOT NULL,
  `position` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `kpi` int(11) NOT NULL,
  `money` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `permission`, `phone`, `zone`, `position`, `kpi`, `money`) VALUES
(1, 'Nguyễn Tôn Tú', 1, '035547997', 3, 'adminsysterm', 50, '50000000'),
(2, 'Đào Mạnh Linh', 9, '0921171170', 1, 'nhân viên lau dọn', 10, '700000'),
(3, 'Đinh Thị Thu Hoài', 10, '0337030033', 2, 'Nhân thông tắc cống', 10, '600000'),
(4, 'Hoàng Thị Mận Mơ', 7, '0327430707', 2, 'Quản lý lau dọn', 15, '1400000'),
(6, 'Nguyên cute', 12, '0987654321', 4, 'BA-support', 20, '1700000'),
(8, 'tunt', 3, '0903893823', 1, 'Phó giám đốc', 20, '20000000'),
(9, 'tu test', 3, '0128378782', 3, 'Phó giám đốc', 20, '1800000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_task`
--

CREATE TABLE `user_task` (
  `userId` int(11) NOT NULL,
  `taskId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `user_task`
--

INSERT INTO `user_task` (`userId`, `taskId`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(4, 6),
(4, 5),
(1, 22),
(3, 23),
(4, 24),
(2, 25),
(2, 26),
(2, 27),
(1, 28),
(1, 29),
(2, 35),
(1, 36),
(2, 37);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `namezone` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `zones`
--

INSERT INTO `zones` (`id`, `namezone`) VALUES
(1, 'sale_zone'),
(2, 'dev_zone'),
(3, 'admin_zone'),
(4, 'technical_zone'),
(5, 'production_zone'),
(6, 'no_zone');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_user` (`user_id`);

--
-- Chỉ mục cho bảng `permisstions`
--
ALTER TABLE `permisstions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user` (`permission`),
  ADD KEY `zone_user` (`zone`);

--
-- Chỉ mục cho bảng `user_task`
--
ALTER TABLE `user_task`
  ADD KEY `task` (`taskId`),
  ADD KEY `user` (`userId`);

--
-- Chỉ mục cho bảng `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `permisstions`
--
ALTER TABLE `permisstions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `permission_user` FOREIGN KEY (`permission`) REFERENCES `permisstions` (`id`),
  ADD CONSTRAINT `zone_user` FOREIGN KEY (`zone`) REFERENCES `zones` (`id`);

--
-- Các ràng buộc cho bảng `user_task`
--
ALTER TABLE `user_task`
  ADD CONSTRAINT `task` FOREIGN KEY (`taskId`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
