-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2020-07-30 20:38:11
-- 伺服器版本： 10.4.11-MariaDB
-- PHP 版本： 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `catknitting`
--

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `imgID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `productID` tinyint(2) UNSIGNED NOT NULL,
  `imgname` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `image`
--

INSERT INTO `image` (`imgID`, `productID`, `imgname`) VALUES
(01, 1, 'shoes1-1'),
(02, 1, 'shoes1-2'),
(03, 1, 'shoes1-3'),
(04, 6, 'shoes2-1'),
(05, 6, 'shoes2-2'),
(06, 6, 'shoes2-3'),
(07, 2, 'pendant1-1'),
(08, 2, 'pendant1-2'),
(09, 2, 'pendant1-3'),
(10, 2, 'pendant1-4'),
(11, 7, 'pendant2-1'),
(12, 7, 'pendant2-2'),
(13, 7, 'pendant2-3'),
(14, 8, 'pendant3-1'),
(15, 8, 'pendant3-2'),
(16, 8, 'pendant3-3'),
(17, 9, 'pendant4-1'),
(18, 9, 'pendant4-2'),
(19, 10, 'pendant5-1'),
(20, 10, 'pendant5-2'),
(21, 3, 'hairband1-1'),
(22, 3, 'hairband1-2'),
(23, 3, 'hairband1-3'),
(24, 3, 'hairband1-4'),
(25, 3, 'hairband1-5'),
(26, 4, 'bag1-1'),
(27, 4, 'bag1-2'),
(28, 4, 'bag1-3'),
(29, 4, 'bag1-4'),
(30, 5, 'doll2-1'),
(31, 5, 'doll2-2'),
(32, 5, 'doll2-3'),
(33, 5, 'doll2-4'),
(34, 11, 'doll1-1'),
(35, 11, 'doll1-2'),
(36, 11, 'doll1-3'),
(37, 11, 'doll1-4'),
(38, 12, 'collar1-1'),
(39, 12, 'collar1-2'),
(40, 12, 'collar1-3'),
(41, 12, 'collar1-4'),
(42, 12, 'collar1-5'),
(43, 13, 'collar2-1'),
(44, 13, 'collar2-2'),
(45, 13, 'collar2-3'),
(46, 13, 'collar2-4'),
(47, 14, 'collar3-1'),
(48, 14, 'collar3-2'),
(49, 14, 'collar3-3'),
(50, 14, 'collar3-4'),
(51, 15, 'shoes4-1'),
(52, 15, 'shoes4-2'),
(53, 15, 'shoes4-3'),
(54, 15, 'shoes4-4'),
(55, 16, 'shoes3-1'),
(56, 16, 'shoes3-2'),
(57, 16, 'shoes3-3');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `mID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `Name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userId` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `userPwd` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(300) COLLATE utf8_unicode_ci DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`mID`, `Name`, `userId`, `userPwd`, `Email`, `img`) VALUES
(01, 'chichi', 'aaa', 'aaa', 'chi@gmail.com', 'user.jpg'),
(02, 'yoru', 'qqq', 'qqq', 'yoru@gmail.com', 'user.jpg'),
(03, 'kopa', 'www', 'www', 'kopa@gmail.com', 'user.jpg'),
(04, 'tiger', 'ss', 'ss', 'tiger@gmail.com', 'user.jpg'),
(05, 'woody', 'ee', 'ee', 'woody@gmail.com', 'user.jpg'),
(11, 'unsia', 'ms0244942', 'idjc3333', 'joe79101@gmail.com', 'user.jpg'),
(15, 'ale', 'ale', 'ale', 'ale@gmail.com', 'user.jpg'),
(20, 'be', 'be', '0000', 'jskfj@sdfs.com', '637272301661805000.jpg'),
(30, 'catmeow', 'cattest123', '123123', 'cattest123@gmail.com', 'S__24797205.jpg'),
(31, 'tiger', 'tigerTest', 'tigerTest', 'rwerwerlwjelr', 'user.jpg');

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `ID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `Name` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(20) NOT NULL,
  `content` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`ID`, `Name`, `price`, `content`) VALUES
(01, '嬰兒針織鞋-蝴蝶結', 290, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>實物規格：鞋底長11厘米 一般適合3-10個月左右嬰兒'),
(02, '小吊飾-海豹', 40, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>'),
(03, '可愛造型髮圈', 30, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br><br>髮圈 1個30 2個50'),
(04, '針織綿羊束口袋側背包', 490, '毛線針織面料有彈性，放置東西會撐大出來，<br>\r\n大小會有變化，不宜放置太重物品，包包容納日常出行物品是沒有問題的 。<br>'),
(05, '娃娃-熊貓', 490, '娃娃約10-13公分，每個手工製作高度略有不同，娃娃顏色可以訂製<br>\r\n（出貨時間依情況而定） 手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>\r\n填充物：棉花'),
(06, '嬰兒針織鞋-小花', 290, '實物規格：鞋底長11厘米 一般適合3-10個月左右嬰兒'),
(07, '小吊飾-鯨魚', 40, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>'),
(08, '小吊飾-草莓(圓)', 40, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>'),
(09, '小吊飾-草莓(扁)', 40, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>'),
(10, '小吊飾-章魚', 40, '每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>'),
(11, '娃娃-狐狸', 490, '娃娃約10-13公分，每個手工製作高度略有不同，娃娃顏色可以訂製\r\n（出貨時間依情況而定） 手工製作商品要求完美者，請三思後下單\r\n（可傳照片確認）\r\n填充物：棉花'),
(12, '毛線寵物項圈-小花', 290, '讓家裡的寶寶佩戴最好的手工項圈<br>\r\n每個毛孩子都是我們捧在手心上的公主<br>\r\n<br>\r\n*純手工製作，需等待10天左右<br>\r\n*請備註或跟我聊聊寶貝的脖圍呦<br>\r\n<br>\r\nS號：頸圍18cm~25cm #幼貓 #兔兔<br>\r\nM號：頸圍22cm~29cm適用 大部分#貓咪 和 #小型犬 都很適合唷~<br>\r\nL號：頸圍28cm~35cm適用#中大型犬<br>\r\n<br>\r\n若有疑慮或想要客製化不同尺寸，都歡迎討論呦'),
(13, '毛線寵物項圈-蝴蝶結', 290, '讓家裡的寶寶佩戴最好的手工項圈<br>\r\n每個毛孩子都是我們捧在手心上的公主<br>\r\n<br>\r\n*純手工製作，需等待10天左右<br>\r\n*請備註或跟我聊聊寶貝的脖圍呦<br>\r\n<br>\r\nS號：頸圍18cm~25cm #幼貓 #兔兔<br>\r\nM號：頸圍22cm~29cm適用 大部分#貓咪 和 #小型犬 都很適合唷~<br>\r\nL號：頸圍28cm~35cm適用#中大型犬<br>\r\n<br>\r\n若有疑慮或想要客製化不同尺寸，都歡迎討論呦'),
(14, '毛線寵物項圈-蝴蝶結', 290, '讓家裡的寶寶佩戴最好的手工項圈<br>\r\n每個毛孩子都是我們捧在手心上的公主<br>\r\n<br>\r\n*純手工製作，需等待10天左右<br>\r\n*請備註或跟我聊聊寶貝的脖圍呦<br>\r\n<br>\r\nS號：頸圍18cm~25cm #幼貓 #兔兔<br>\r\nM號：頸圍22cm~29cm適用 大部分#貓咪 和 #小型犬 都很適合唷~<br>\r\nL號：頸圍28cm~35cm適用#中大型犬<br>\r\n<br>\r\n若有疑慮或想要客製化不同尺寸，都歡迎討論呦'),
(15, '嬰兒針織鞋-兔子', 290, '實物規格：鞋底長11厘米<br>\r\n一般適合3-10個月左右嬰兒<br>\r\n每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>'),
(16, '嬰兒針織鞋-短靴', 290, '實物規格：鞋底長11厘米<br>\r\n一般適合3-10個月左右嬰兒<br>\r\n每件商品皆手工製作，略有不同為正常現象<br>\r\n手工製作商品要求完美者，請三思後下單<br>\r\n（可傳照片確認）<br>');

-- --------------------------------------------------------

--
-- 資料表結構 `record`
--

CREATE TABLE `record` (
  `recordID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `productID` tinyint(2) UNSIGNED NOT NULL,
  `memberID` tinyint(2) UNSIGNED NOT NULL,
  `num` tinyint(2) UNSIGNED NOT NULL DEFAULT 1,
  `styleID` tinyint(2) UNSIGNED DEFAULT NULL,
  `sizeID` tinyint(2) UNSIGNED DEFAULT NULL,
  `done` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `record`
--

INSERT INTO `record` (`recordID`, `productID`, `memberID`, `num`, `styleID`, `sizeID`, `done`) VALUES
(116, 12, 30, 3, NULL, NULL, 'yes'),
(117, 4, 30, 3, NULL, NULL, 'yes'),
(119, 12, 30, 1, NULL, NULL, NULL),
(120, 1, 2, 1, NULL, NULL, NULL),
(121, 11, 2, 3, NULL, NULL, NULL),
(122, 16, 2, 2, NULL, NULL, NULL),
(123, 13, 2, 1, NULL, NULL, NULL),
(124, 4, 2, 2, NULL, NULL, NULL),
(125, 11, 31, 4, NULL, NULL, NULL),
(126, 2, 31, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `size`
--

CREATE TABLE `size` (
  `sizeID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `productID` tinyint(2) UNSIGNED NOT NULL,
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `style`
--

CREATE TABLE `style` (
  `styleID` tinyint(2) UNSIGNED ZEROFILL NOT NULL,
  `productID` tinyint(2) UNSIGNED NOT NULL,
  `style` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`imgID`),
  ADD KEY `productID` (`productID`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mID`);

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `record`
--
ALTER TABLE `record`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `memberID` (`memberID`),
  ADD KEY `styleID` (`styleID`),
  ADD KEY `sizeID` (`sizeID`);

--
-- 資料表索引 `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`sizeID`),
  ADD KEY `productID` (`productID`);

--
-- 資料表索引 `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`styleID`),
  ADD KEY `productID` (`productID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `image`
--
ALTER TABLE `image`
  MODIFY `imgID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `mID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `ID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `record`
--
ALTER TABLE `record`
  MODIFY `recordID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `size`
--
ALTER TABLE `size`
  MODIFY `sizeID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `style`
--
ALTER TABLE `style`
  MODIFY `styleID` tinyint(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`);

--
-- 資料表的限制式 `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`),
  ADD CONSTRAINT `record_ibfk_2` FOREIGN KEY (`memberID`) REFERENCES `member` (`mID`),
  ADD CONSTRAINT `record_ibfk_3` FOREIGN KEY (`styleID`) REFERENCES `style` (`styleID`),
  ADD CONSTRAINT `record_ibfk_4` FOREIGN KEY (`sizeID`) REFERENCES `size` (`sizeID`);

--
-- 資料表的限制式 `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`);

--
-- 資料表的限制式 `style`
--
ALTER TABLE `style`
  ADD CONSTRAINT `style_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
