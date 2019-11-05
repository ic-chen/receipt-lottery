-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.6-MariaDB
-- PHP 版本： 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `receipt_lot`
--

-- --------------------------------------------------------

--
-- 資料表結構 `lottery`
--

CREATE TABLE `lottery` (
  `id` int(10) NOT NULL,
  `year` int(5) NOT NULL,
  `month` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `special` int(8) NOT NULL,
  `grand` int(8) NOT NULL,
  `first1` int(8) NOT NULL,
  `first2` int(8) NOT NULL,
  `first3` int(8) NOT NULL,
  `extra1` int(8) NOT NULL,
  `extra2` int(8) NOT NULL,
  `extra3` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `receipt`
--

CREATE TABLE `receipt` (
  `id` int(10) NOT NULL,
  `year` int(5) NOT NULL COMMENT '年',
  `month` int(4) NOT NULL COMMENT '期數',
  `r_en` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'EN號碼 ',
  `r_num` int(8) NOT NULL COMMENT '數字號碼',
  `amount` int(5) NOT NULL COMMENT '金額'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `lottery`
--
ALTER TABLE `lottery`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `lottery`
--
ALTER TABLE `lottery`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `receipt`
--
ALTER TABLE `receipt`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
