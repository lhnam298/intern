-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 12, 2014 at 03:44 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `ex_answer`
--

CREATE TABLE IF NOT EXISTS `ex_answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `choice_1` text COLLATE utf8_unicode_ci,
  `choice_2` text COLLATE utf8_unicode_ci,
  `choice_3` text COLLATE utf8_unicode_ci,
  `choice_4` text COLLATE utf8_unicode_ci,
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`answer_id`),
  KEY `fk` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Dumping data for table `ex_answer`
--

INSERT INTO `ex_answer` (`answer_id`, `question_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 3, 'Vitamin B1', 'Vitamin B2', 'Vitamin A', 'Viatmin D', 0, '2014-06-18 10:16:17', '2014-08-03 17:04:11'),
(2, 19, 'Cần thiết cho chuyển hoá\r\n', 'Tổ chức bảo vệ cơ thể', 'Cấu trúc và tạo hình', 'Giúp acid mật tham gia vào quá trình nhũ tương hoá thức ăn ở ruột', 0, '2014-06-22 11:38:02', '0000-00-00 00:00:00'),
(5, 23, '&nbsp;&nbsp;&nbsp;', 'Ti&ecirc;u hao năng lượng cho đứng n&oacute;i chuyện cao hơn cho nấu ăn', 'Ti&ecirc;u hao năng lượng cho rửa b&aacute;t cao hơn nấu ăn', 'Ti&ecirc;u hao năng lượng cho giặt tay thấp hơn đi bộ 4km/h', 0, '2014-06-30 10:50:53', '2014-08-02 19:19:34'),
(6, 24, 'ăn thức ăn giàu đạm với tỉ lệ cân đối giữa nguồn động vật và thực vật, nên tăng cường ăn cá\r\n', 'Lựa chọn và sử dụng thức ăn, đồ uống đảm bảo vệ sinh an toàn. Dùng nguồn nước sạch để chế biến thức ăn\r\n', 'Không nên dùng các chất kích thích như rượu, bia, cà phê, thuốc lá\r\n', 'Cho trẻ ăn các thức ăn bổ sung giàu chất dinh dưỡng. Thực hiện tô màu bát bột\r\n', 0, '2014-06-30 10:52:43', '0000-00-00 00:00:00'),
(7, 25, 'Sữa và các sản phẩm của sữa\r\n', 'Thịt, cá\r\n', 'Ngũ cốc và các loại bột\r\n', 'Trứng\r\n', 0, '2014-06-30 10:54:00', '0000-00-00 00:00:00'),
(9, 40, 'Phòng chống suy dinh dưỡng protein - năng lượng ở trẻ em và bà mẹ\r\n', 'Phòng chống béo phì và thừa cân\r\n', 'Theo dõi, đánh giá, giám sát các mục tiêu dinh dưỡng\r\n', 'Phổ biến 10 lời khuyên dinh dưỡng\r\n', 0, '2014-07-01 09:43:18', '0000-00-00 00:00:00'),
(10, 41, 'Thịt có thể là nguồn lây của bệnh lao\r\n', 'Cá có thể là nguồn lây các loại sán\r\n', 'Lớp vỏ trong của sắn có chứa chất Solamin\r\n', 'Nguy cơ nấm mốc trong quá trình làm tương có khả năng sinh độc tố Mycotoxin\r\n', 0, '2014-07-01 09:43:47', '0000-00-00 00:00:00'),
(11, 42, 'ăn thức ăn giàu đạm với tỉ lệ cân đối giữa nguồn động vật và thực vật, nên tăng cường ăn cá\r\n', 'Lựa chọn và sử dụng thức ăn, đồ uống đảm bảo vệ sinh an toàn. Dùng nguồn nước sạch để chế biến thức ăn\r\n', 'Không nên dùng các chất kích thích như rượu, bia, cà phê, thuốc lá\r\n', 'Cho trẻ ăn các thức ăn bổ sung giàu chất dinh dưỡng. Thực hiện tô màu bát bột\r\n', 0, '2014-07-01 09:44:16', '0000-00-00 00:00:00'),
(12, 43, 'Cho trẻ ăn thức ăn không có mỡ\r\n', 'Cho trẻ uống nước ngọt càng nhiều càng tốt\r\n', 'Cho trẻ ăn đủ chất và uống nhiều nước hơn bình thưòng\r\n', 'Cho trẻ uống ít hơn bình thường\r\n', 0, '2014-07-01 09:45:00', '0000-00-00 00:00:00'),
(13, 44, 'Thịt nhiều mỡ\r\n', 'Các loại phủ tạng\r\n', 'Hạt sen, lá vông\r\n', 'Đường, bánh, kẹo\r\n', 0, '2014-07-01 09:45:27', '0000-00-00 00:00:00'),
(14, 45, 'Người bệnh trong giai đoạn ổn định của bệnh\r\n', 'Người bệnh trong giai đoạn phục hồi của bệnh\r\n', 'Người bệnh sốt nhiễm trùng\r\n', 'Người bệnh đái tháo đường\r\n', 0, '2014-07-01 09:45:56', '0000-00-00 00:00:00'),
(25, 58, '発言', '手品', '手間', '手話', 0, '2014-07-31 13:59:10', '0000-00-00 00:00:00'),
(26, 59, '大家', '画家', '読書家', '作家', 0, '2014-07-31 14:06:52', '0000-00-00 00:00:00'),
(27, 60, '中心', '中間', '年中', '集中', 0, '2014-07-31 14:48:43', '0000-00-00 00:00:00'),
(28, 61, '都合', '合同', '会合', '合計', 0, '2014-07-31 14:52:08', '0000-00-00 00:00:00'),
(29, 62, '発見', '発生', '発明', '発行', 0, '2014-07-31 15:00:53', '0000-00-00 00:00:00'),
(30, 56, '<p>C&aacute;c nghề lao động tr&iacute; &oacute;c được xếp v&agrave;o nh&oacute;m lao động vừa</p>\r\n', '<p>Nghề c&aacute; được xếp v&agrave;o nh&oacute;m lao động nặng</p>\r\n', '<p>Gi&aacute;o vi&ecirc;n được xếp v&agrave;o nh&oacute;m lao động nhẹ</p>\r\n', '<p>Qu&acirc;n nh&acirc;n thời kỳ luyện tập được xếp v&agrave;o nh&oacute;m lao động nặng.</p>\r\n', 0, '2014-07-31 15:34:19', '0000-00-00 00:00:00'),
(39, 71, 'はがす', 'ねじる', 'ふさぐ', '閉じる', 0, '2014-08-11 03:00:27', '0000-00-00 00:00:00'),
(40, 72, 'つかむ', 'かつぐ', 'またぐ', 'しゃがむ', 0, '2014-08-11 03:05:52', '0000-00-00 00:00:00'),
(41, 81, '幸復', '広復', '幸福', '広福', 0, '2014-08-11 03:34:28', '0000-00-00 00:00:00'),
(42, 82, 'いそがしい', 'はずかしい', 'おかしい', 'たのしい', 0, '2014-08-11 03:38:00', '0000-00-00 00:00:00'),
(43, 83, 'ぞうしゃけん', 'じょしゃげん', 'じょうしゃけん', 'じょしゃげん', 0, '2014-08-11 03:40:49', '0000-00-00 00:00:00'),
(44, 84, 'にぎやかな', 'こうかな', 'たしかな', 'しずかな', 0, '2014-08-11 03:43:12', '0000-00-00 00:00:00'),
(45, 85, 'もとめ', 'みとめ', 'つとめ', 'まとめ', 0, '2014-08-11 03:45:29', '0000-00-00 00:00:00'),
(46, 86, '有賞', '優賞', '優勝', '有勝', 0, '2014-08-11 03:49:10', '0000-00-00 00:00:00'),
(47, 87, '悲しい', '寂しい', '欲しい', '楽しい', 0, '2014-08-11 03:51:17', '0000-00-00 00:00:00'),
(48, 88, '指して', '押して', '貸して', '通して', 0, '2014-08-11 03:54:02', '0000-00-00 00:00:00'),
(49, 89, '欠ける', '化ける', '盛る', '掛ける', 0, '2014-08-11 15:45:00', '0000-00-00 00:00:00'),
(50, 90, '下げる', '上げる', '挙げる', '投げる', 0, '2014-08-11 15:46:19', '0000-00-00 00:00:00'),
(51, 91, '開ける', '明ける', '避ける', '泣ける', 0, '2014-08-11 15:50:15', '0000-00-00 00:00:00'),
(52, 92, '優しい', '悲しい', '易しい', '厳しい', 0, '2014-08-11 15:55:42', '0000-00-00 00:00:00'),
(53, 93, '友達', '同士', '上の人', '上司', 0, '2014-08-11 15:58:17', '0000-00-00 00:00:00'),
(54, 94, '状況', '上級', '状態', '上京', 0, '2014-08-11 16:02:14', '0000-00-00 00:00:00'),
(55, 95, '退院', '隊員', '台風', '態度', 0, '2014-08-11 16:04:07', '0000-00-00 00:00:00'),
(56, 102, 'Đ&atilde; c&oacute; giấy ăn để lau rồi', 'Tốn thời gian kh&ocirc;ng cần thiết', 'N&oacute; chỉ c&oacute; t&aacute;c dụng lau kh&ocirc;, kh&ocirc;ng c&oacute; &yacute; nghĩa lau sạch', 'Kh&ocirc;ng những chỉ c&oacute; t&aacute;c dụng lau kh&ocirc; m&agrave; c&ograve;n c&oacute; khả năng l&agrave;m bẩn dụng cụ, b&aacute;t, đĩa&hellip;', 0, '2014-08-11 16:11:10', '0000-00-00 00:00:00'),
(57, 103, '4 giờ', '6 giờ', '8 giờ', '12 giờ', 0, '2014-08-11 16:11:51', '0000-00-00 00:00:00'),
(58, 104, 'Từ 0,5 - 1,0m', 'Từ 1,0 - 1,5 m', 'Từ 1,5 - 2,0 m', 'Từ 2,0 - 2,5m', 0, '2014-08-11 16:12:45', '0000-00-00 00:00:00'),
(59, 105, 'Để x&eacute;t nghiệm h&agrave;ng ng&agrave;y xem c&oacute; tốt kh&ocirc;ng', 'Để x&eacute;t nghiệm khi cần như c&oacute; vụ ngộ độc&hellip;', 'Để tiện kiểm tra chất lượng một suất ăn thiếu hay đủ', 'Để kiểm tra nguồn gốc thực phẩm', 0, '2014-08-11 16:13:30', '0000-00-00 00:00:00'),
(60, 106, '50 độ C', '55 độ C', '60 độ C', '65 độ C', 0, '2014-08-11 16:14:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ex_question`
--

CREATE TABLE IF NOT EXISTS `ex_question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `question_type_id` int(11) DEFAULT NULL,
  `question` text COLLATE utf8_unicode_ci,
  `answer` varchar(10) CHARACTER SET ascii DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`question_id`),
  KEY `fk1` (`subject_id`),
  KEY `fk2` (`question_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=107 ;

--
-- Dumping data for table `ex_question`
--

INSERT INTO `ex_question` (`question_id`, `subject_id`, `question_type_id`, `question`, `answer`, `del_flg`, `created_at`, `updated_at`) VALUES
(2, 9, 1, 'Treonin l&agrave; 1 trong 8 acid amin cần thiết m&agrave; cơ thể kh&ocirc;ng tự tổng hợp được', '1', 0, '2014-06-18 10:14:47', '2014-08-10 18:13:56'),
(3, 9, 3, 'Vitamin c&oacute; vai tr&ograve; ảnh hưởng tới sự cảm thụ &aacute;nh s&aacute;ng của mắt, nhất l&agrave; đối với sự nh&igrave;n m&agrave;u l&agrave; vai tr&ograve; của', '2', 0, '2014-06-18 10:15:24', '2014-08-03 17:04:10'),
(6, 9, 1, 'BMI = 25 là thừa cân và béo phì', '1', 1, '2014-06-22 09:40:18', '2014-07-25 02:46:55'),
(8, 9, 1, 'Tỉ lệ năng lượng do protein - lipid - glucid cân đối trong khẩu phần ăn cần phấn đấu đạt được trong thời gian tới là 12% - 18% - 70%', '0', 1, '2014-06-22 10:00:12', '2014-07-01 09:11:20'),
(10, 9, 1, 'Tỉ lệ năng lượng do protein - lipid - glucid cân đối trong khẩu phần ăn cần phấn đấu đạt được trong thời gian tới là 14% - 20% - 66%', '1', 1, '2014-06-22 10:23:29', '2014-07-01 09:11:20'),
(19, 9, 2, 'Trong các vai trò sau, vai trò nào là vai trò dinh dưỡng của protein đối với cơ thể', '1&3', 1, '2014-06-22 11:38:02', '2014-07-01 09:11:20'),
(21, 9, 1, 'Chế độ ăn cho người cao tuổi cần tăng đường và giảm muối', '0', 1, '2014-06-30 10:48:01', '2014-07-01 09:11:20'),
(22, 9, 1, 'Chế độ ăn cho người lao động trí óc cần hạn chế glucid và lipid trong khẩu phần', '1', 1, '2014-06-30 10:49:55', '2014-07-01 09:11:20'),
(23, 9, 2, 'Trong c&aacute;c ph&aacute;t biểu sau, ph&aacute;t biểu n&agrave;o chưa đ&uacute;ng', '1&3', 0, '2014-06-30 10:50:53', '2014-08-02 19:19:34'),
(24, 9, 2, 'Trong các lời khuyên sau, lời khuyên nào không thuộc 10 lời khuyên dinh dưỡng hợp lý', '1&2', 0, '2014-06-30 10:52:43', '2014-06-30 12:03:18'),
(25, 9, 3, 'Nguồn các yếu tố kiềm của thực phẩm có nhiều trong', '1', 0, '2014-06-30 10:54:00', '2014-07-25 02:45:13'),
(27, 9, 1, 'Trong CLQG về dinh dưỡng giai đoạn 2001 - 2010, mục ti&ecirc;u phấn đấu giảm tỉ lệ trẻ em dưới 5 tuổi thừa c&acirc;n xuống dưới 3%&nbsp;&nbsp;', '0', 0, '2014-07-01 09:40:54', '2014-08-02 18:25:35'),
(28, 9, 1, 'Trong CLQG về dinh dưỡng giai đoạn 2001 - 2010, mục ti&ecirc;u phấn đấu giảm tỉ lệ trẻ em dưới 5 tuổi SDD chiều cao theo tuổi mỗi năm 1,5%', '1', 0, '2014-07-01 09:41:04', '2014-07-30 04:01:17'),
(29, 9, 1, 'Một trong giải pháp và chính sách chủ yếu trong CLQG về dinh dưỡng giai đoạn 2001 - 2010 là tiến hành xây dựng mô hình điểm để rút kinh nghiệm chỉ đạo', '1', 0, '2014-07-01 09:41:11', '0000-00-00 00:00:00'),
(30, 9, 1, 'Phòng chống các bệnh mãn tính liên quan đến dinh dưỡng là một trong 9 giải pháp và chính sách chủ yếu của CLQG về dinh dưỡng', '0', 0, '2014-07-01 09:41:20', '0000-00-00 00:00:00'),
(31, 9, 1, 'Xã hội hoá công tác dinh dưỡng là một trong 9 giải pháp và chính sách chủ yếu của CLQG về dinh dưỡng', '0', 0, '2014-07-01 09:41:27', '0000-00-00 00:00:00'),
(32, 9, 1, 'Một trong những hoạt động phòng chống SDD ở xã phường là cho trẻ trên 36 tháng tuổi uống đủ 2 lần vitamin A mỗi năm', '0', 0, '2014-07-01 09:41:35', '0000-00-00 00:00:00'),
(33, 9, 1, 'Để theo dõi tăng trưởng của trẻ dưới 2 tuổi cần cân trẻ 3 tháng 1 lần', '0', 0, '2014-07-01 09:41:43', '0000-00-00 00:00:00'),
(34, 9, 1, 'Để phòng thiếu máu dinh dưỡng, cần cho phụ nữ có thai uống viên sắt từ tháng thứ 7 cho đến 1 tháng sau đẻ', '0', 0, '2014-07-01 09:41:50', '0000-00-00 00:00:00'),
(35, 9, 1, 'Hướng dẫn các gia đình tăng nguồn thực phẩm tại chỗ là một trong các hoạt động dinh dưỡng ở cơ sở', '1', 0, '2014-07-01 09:41:58', '0000-00-00 00:00:00'),
(36, 9, 1, 'Hoạt động giáo dục, tư vấn và hướng dẫn ăn uống là biện pháp dự phòng béo phì một cách thụ động', '0', 0, '2014-07-01 09:42:06', '0000-00-00 00:00:00'),
(37, 9, 1, 'Một trẻ sinh ngày 15/ 2/ 2008, đến ngày 10/3/2008 được cộng tác viên dinh dưỡng cân lần đầu và ghi  trẻ được 2 tháng tuổi trong sổ', '1', 0, '2014-07-01 09:42:13', '0000-00-00 00:00:00'),
(38, 9, 1, 'Không đưa số trẻ bị khuyết tật vào số liệu để tính tỉ lệ SDD cho trẻ dưới 5 tuổi', '1', 0, '2014-07-01 09:42:19', '0000-00-00 00:00:00'),
(39, 9, 1, 'Hướng dẫn ăn bổ sung hợp lý từ tháng thứ 5 cho trẻ là một trong 8 hoạt động thiết yếu phòng chống SDD trẻ em ở xã phường', '0', 0, '2014-07-01 09:42:25', '0000-00-00 00:00:00'),
(40, 9, 2, 'Trong các nội dung sau, nội dung nào là một trong các giải pháp và chính sách chủ yếu của CLQG về dinh dưỡng giai đoạn 2001 - 2010', '1&3', 0, '2014-07-01 09:43:18', '0000-00-00 00:00:00'),
(41, 9, 2, 'Tronmg các phát biểu sau, phát biểu nào chưa chính xác', '3&4', 0, '2014-07-01 09:43:47', '0000-00-00 00:00:00'),
(42, 9, 2, 'Trong các lời khuyên sau, lời khuyên nào không thuộc 10 lời khuyên dinh dưỡng hợp lý', '1&2', 0, '2014-07-01 09:44:16', '0000-00-00 00:00:00'),
(43, 9, 3, 'Khi trẻ mắc tiêu chảy, người mẹ cần', '3', 0, '2014-07-01 09:45:00', '0000-00-00 00:00:00'),
(44, 9, 3, 'Người bệnh cao huyết áp không nên ăn, uống những loại thức ăn sau, trừ:', '3', 0, '2014-07-01 09:45:27', '0000-00-00 00:00:00'),
(45, 9, 3, 'Chế độ ăn bồi dưỡng dùng cho', '2', 0, '2014-07-01 09:45:56', '0000-00-00 00:00:00'),
(50, 10, 1, 'はじまして。', '1', 1, '2014-07-28 02:18:53', '2014-07-31 13:54:15'),
(55, 9, 1, 'Nếu s&aacute;t muối v&agrave;o c&aacute; trước khi ướp lạnh c&oacute; thể l&agrave;m mất độc tố vi khuẩn tiết ra', '1', 0, '2014-07-30 03:56:52', '2014-08-10 17:39:58'),
(56, 9, 2, 'Trong c&aacute;c ph&aacute;t biểu sau, ph&aacute;t biểu n&agrave;o l&agrave; đ&uacute;ng', '3&4', 0, '2014-07-30 03:59:41', '2014-07-31 15:34:19'),
(58, 10, 3, '耳の聞こえない人のための会話方法。', '4', 0, '2014-07-31 13:59:10', '0000-00-00 00:00:00'),
(59, 10, 3, '小説などを書く人。', '4', 0, '2014-07-31 14:06:52', '0000-00-00 00:00:00'),
(60, 10, 3, '真ん中', '1', 0, '2014-07-31 14:48:43', '0000-00-00 00:00:00'),
(61, 10, 3, '別々の二つ以上のグループなどが一つにまとまること、また一つにもとめること。', '2', 0, '2014-07-31 14:52:08', '0000-00-00 00:00:00'),
(62, 10, 3, '世の中にない物を初めて作り出すこと。', '3', 0, '2014-07-31 15:00:53', '0000-00-00 00:00:00'),
(71, 10, 3, 'いらないポスターを　（　　　　）', '1', 0, '2014-08-11 03:00:27', '0000-00-00 00:00:00'),
(72, 10, 3, '大きいな荷物を肩に　（　　　　）', '2', 0, '2014-08-11 03:05:52', '0000-00-00 00:00:00'),
(73, 10, 1, '「並んでいる」の読み方は「ならんでいる」です。', '1', 0, '2014-08-11 03:11:17', '2014-08-11 03:13:13'),
(74, 10, 1, '「無事」の読む方は「むじ」です。', '0', 0, '2014-08-11 03:12:59', '0000-00-00 00:00:00'),
(75, 10, 1, '「同時」の読む方は「どうき」です。', '0', 0, '2014-08-11 03:14:19', '0000-00-00 00:00:00'),
(76, 10, 1, '「机」の読み方は「つくえ」です。', '1', 0, '2014-08-11 03:15:35', '0000-00-00 00:00:00'),
(77, 10, 1, '「営業」の読み方は「そうぎょう」です。', '0', 0, '2014-08-11 03:17:32', '0000-00-00 00:00:00'),
(78, 10, 1, '「素直」の読み方は「しょうじき」です。', '0', 0, '2014-08-11 03:18:43', '0000-00-00 00:00:00'),
(79, 10, 1, '「似ている」の読み方は「にている」です。', '1', 0, '2014-08-11 03:20:28', '0000-00-00 00:00:00'),
(80, 10, 1, '「券」の読み方は「げん」です。', '0', 0, '2014-08-11 03:21:25', '0000-00-00 00:00:00'),
(81, 10, 3, '彼女は、<strong>こうふく</strong>に生活していた。', '3', 0, '2014-08-11 03:34:28', '0000-00-00 00:00:00'),
(82, 10, 3, '毎日<strong>忙しい</strong>ので、デートもできません。', '1', 0, '2014-08-11 03:38:00', '0000-00-00 00:00:00'),
(83, 10, 3, '1か月前から、<strong>乗車券</strong>を買うことができます。', '3', 0, '2014-08-11 03:40:49', '0000-00-00 00:00:00'),
(84, 10, 3, 'どこか、人があまりいなくて<strong>静かな</strong>所へ行きたいです。', '4', 0, '2014-08-11 03:43:12', '0000-00-00 00:00:00'),
(85, 10, 3, '正社員がアルバイトをすることは、会社の規則で<strong>認め</strong>られていない。', '2', 0, '2014-08-11 03:45:29', '0000-00-00 00:00:00'),
(86, 10, 3, 'まだ新しいチームですが、なんとか<strong>優勝</strong>することができました。', '3', 0, '2014-08-11 03:49:10', '0000-00-00 00:00:00'),
(87, 10, 3, '<strong>かなしい</strong>とき、大きいな声で歌うと元気になります。<br />\r\n&nbsp;', '1', 0, '2014-08-11 03:51:17', '0000-00-00 00:00:00'),
(88, 10, 3, '注文が決まったら、このボタンを<strong>おして</strong>ください。', '2', 0, '2014-08-11 03:54:02', '0000-00-00 00:00:00'),
(89, 10, 2, 'かける', '1&4', 0, '2014-08-11 15:45:00', '0000-00-00 00:00:00'),
(90, 10, 2, 'あげる', '2&3', 0, '2014-08-11 15:46:19', '0000-00-00 00:00:00'),
(91, 10, 2, 'あける', '1&2', 0, '2014-08-11 15:50:15', '0000-00-00 00:00:00'),
(92, 10, 2, 'やさしい', '1&3', 0, '2014-08-11 15:55:42', '0000-00-00 00:00:00'),
(93, 10, 2, 'だれと「尊敬語」を使いますか。', '3&4', 0, '2014-08-11 15:58:17', '0000-00-00 00:00:00'),
(94, 10, 2, 'じょうきょう', '1&4', 0, '2014-08-11 16:02:14', '0000-00-00 00:00:00'),
(95, 10, 2, 'たいいん', '1&2', 0, '2014-08-11 16:04:07', '0000-00-00 00:00:00'),
(96, 9, 1, 'C&aacute;c loại rau quả tươi dễ bị nhiễm thuốc bảo vệ thưc vật g&acirc;y ng&ocirc; độc thức ăn', '1', 0, '2014-08-11 16:06:39', '0000-00-00 00:00:00'),
(97, 9, 1, 'Độc tố vi nấm Aflatoxin c&oacute; thể g&acirc;y ung thư', '1', 0, '2014-08-11 16:06:55', '0000-00-00 00:00:00'),
(98, 9, 1, 'C&aacute;c thực phẩm dễ nhiễm VSV g&acirc;y ngộ độc phần lớn c&oacute; nguồn gốc động vật, c&oacute; gi&aacute; trị dinh dưỡng cao', '1', 0, '2014-08-11 16:07:06', '0000-00-00 00:00:00'),
(99, 9, 1, 'Một trong những đường l&acirc;y nhiễm VSV v&agrave;o thực phẩm l&agrave; m&ocirc;i trường bị &ocirc; nhiễm', '1', 0, '2014-08-11 16:07:18', '0000-00-00 00:00:00'),
(100, 9, 1, 'Ngộ độc thực phẩm do VSV thường bị v&agrave;o m&ugrave;a lạnh', '0', 0, '2014-08-11 16:07:32', '0000-00-00 00:00:00'),
(101, 9, 1, 'Hội chứng ti&ecirc;u ho&aacute; ( đau bụng, ti&ecirc;u chảy, buồn n&ocirc;n) l&agrave; triệu chứng chủ yếu trong c&aacute;c trường hợp ngộ độc thực phẩm do ăn phải thức ăn c&oacute; độc tố tự nhi&ecirc;n&nbsp;', '0', 0, '2014-08-11 16:07:44', '0000-00-00 00:00:00'),
(102, 9, 3, 'Kh&ocirc;ng n&ecirc;n d&ugrave;ng một khăn để lau mọi dụng cụ b&aacute;t đĩa, th&igrave;a v&igrave;', '4', 0, '2014-08-11 16:11:10', '0000-00-00 00:00:00'),
(103, 9, 3, 'Thức ăn lưu nghiệm cần được giữ lại tối thiểu trong', '2', 0, '2014-08-11 16:11:51', '0000-00-00 00:00:00'),
(104, 9, 3, 'Một trong những ti&ecirc;u chuẩn vệ sinh của cơ sở phục vụ ăn uống l&agrave; b&agrave;n chế biến thức ăn phải c&aacute;ch bếp', '3', 0, '2014-08-11 16:12:45', '0000-00-00 00:00:00'),
(105, 9, 3, 'Mục đ&iacute;ch của thức ăn lưu nghiệm l&agrave;', '2', 0, '2014-08-11 16:13:30', '0000-00-00 00:00:00'),
(106, 9, 3, 'Thức ăn phải chuẩn bị trước hoặc chờ đợi sau hơn 2 giờ th&igrave; cần giữ n&oacute;ng ở nhiệt độ', '3', 0, '2014-08-11 16:14:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ex_question_type`
--

CREATE TABLE IF NOT EXISTS `ex_question_type` (
  `question_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `mark` int(11) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`question_type_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ex_question_type`
--

INSERT INTO `ex_question_type` (`question_type_id`, `name`, `description`, `mark`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Câu hỏi đúng sai', 'Có hai lựa chọn là đúng hoặc sai, học sinh chọn câu trả lời', 1, 0, '2014-06-15 14:12:39', '0000-00-00 00:00:00'),
(2, 'Câu hỏi lựa chọn đáp án đúng', 'Có bốn phương án trong đó có nhiều phương án đúng, học sinh lựa chọn các phương án mình cho là đúng', 2, 0, '2014-06-15 14:14:08', '0000-00-00 00:00:00'),
(3, 'Câu hỏi lựa chọn đáp án đúng nhất', 'Có bốn phương án trong đó có duy nhất một phương án đúng, học sinh chọn phương án mình cho là đúng nhất', 2, 0, '2014-06-15 14:15:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ex_student`
--

CREATE TABLE IF NOT EXISTS `ex_student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `password` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `average_mark` float DEFAULT '0',
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `ex_student`
--

INSERT INTO `ex_student` (`student_id`, `username`, `password`, `name`, `birthday`, `average_mark`, `del_flg`, `created_at`) VALUES
(11, 'hedspi01', '25f9e794323b453885f5181f1b624d0b', 'student01', '0000-00-00', 0, 0, '2014-08-10 15:53:13'),
(12, 'hedspi02', '25f9e794323b453885f5181f1b624d0b', 'student02', '0000-00-00', 0, 0, '2014-08-10 16:07:18'),
(13, 'hedspi03', '25f9e794323b453885f5181f1b624d0b', 'student03', '0000-00-00', 0, 0, '2014-08-10 16:16:06');

-- --------------------------------------------------------

--
-- Table structure for table `ex_subject`
--

CREATE TABLE IF NOT EXISTS `ex_subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `test_time` int(11) DEFAULT '20',
  `question_num` int(11) DEFAULT '50',
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Dumping data for table `ex_subject`
--

INSERT INTO `ex_subject` (`subject_id`, `subject_name`, `description`, `test_time`, `question_num`, `del_flg`, `created_at`, `updated_at`) VALUES
(9, 'Test dinh dưỡng', '...', 10, 10, 0, '2014-07-01 09:38:39', '2014-08-11 02:24:52'),
(10, '日本語', '日本語を勉強しましょう。', 10, 20, 0, '2014-07-28 02:16:47', '0000-00-00 00:00:00'),
(15, 'Toán rời rạc', 'M&ocirc;n học bao gồm nhiều chủ đề kh&aacute;c nhau nhằm mục đ&iacute;ch cung cấp cho sinh vi&ecirc;n một nền tảng vững chắc để ph&aacute;t triển c&aacute;c kỹ năng chứng minh to&aacute;n học v&agrave; để hiểu r&otilde; được nhiều vấn đề / b&agrave;i to&aacute;n nảy sinh trong khoa học m&aacute;y t&iacute;nh. M&ocirc;n học sẽ bao gồm c&aacute;c yếu tố cơ bản của logic với c&aacute;c phương ph&aacute;p lập luận cơ bản v&agrave; c&aacute;c &aacute;p dụng để từ đ&oacute;, sinh vi&ecirc;n c&oacute; thể sử dụng trong nhiều kiểu chứng minh kh&aacute;c nhau. Sinh vi&ecirc;n cung sẽ được học c&aacute;c nguy&ecirc;n l&yacute; đếm, c&aacute;c loại quan hệ hai ng&ocirc;i kh&aacute;c nhau: quan hệ thứ tự bộ phận, quan hệ tương đương; l&yacute; thuyết đồ thị v&agrave; việc t&iacute;nh to&aacute;n với c&aacute;c m&ocirc; h&igrave;nh.', 20, 20, 0, '2014-08-10 17:21:50', '0000-00-00 00:00:00'),
(16, 'Kỹ thuật điện tử số', 'M&ocirc;n học n&agrave;y được thiết kế nhằm gi&uacute;p c&aacute;c sinh vi&ecirc;n ng&agrave;nh kỹ thuật m&aacute;y t&iacute;nh c&oacute; một số kiến thức cơ bản về kỹ thuật điện tử số t&iacute;nh to&aacute;n tr&ecirc;n hệ thống số, c&aacute;c cổng logic cơ bản, r&uacute;t gọn biểu thức logic bằng giản đồ Karnaught, ứng dụng c&aacute;c mạch logic tổ hợp, mạch chốt v&agrave; flipflop, c&aacute;c loại mạch đếm l&ecirc;n xuống, đồng bộ, bất đồng bộ, ph&acirc;n t&iacute;ch v&agrave; thiết kế mạch đếm, mạch thanh ghi dịch v&agrave; c&aacute;c ứng dụng, cấu tạo của RAM, ROM v&agrave; c&aacute;c thiết bị lưu trữ, ứng dụng của c&aacute;c loại IC số th&ocirc;ng dụng&hellip;.Sau mỗi b&agrave;i học, sinh vi&ecirc;n sẽ được ph&acirc;n t&iacute;ch những mạch điện thực tế c&oacute; li&ecirc;n quan đến những kiến thức vừa học. Phần thực h&agrave;nh sẽ gi&uacute;p sinh vi&ecirc;n c&oacute; cơ hội l&agrave;m quen với việc thiết kế v&agrave; m&ocirc; phỏng mạch điện bằng phần mềm m&ocirc; phỏng, sử dụng c&aacute;c dụng cụ đo đạc về điện, nhận dạng c&aacute;c linh kiện điện tử v&agrave; sử dụng ch&uacute;ng để thiết kế c&aacute;c mạch điện ứng dụng.', 20, 20, 0, '2014-08-10 17:22:46', '0000-00-00 00:00:00'),
(17, 'Nhập môn lập trình', 'M&ocirc;n học nhằm trang bị cho sinh vi&ecirc;n c&aacute;c kỹ năng lập tr&igrave;nh được minh hoạ cụ thể bằng ng&ocirc;n ngữ lập tr&igrave;nh C/C++. M&ocirc;n học n&agrave;y bao gồm c&aacute;c kỹ thuật lập tr&igrave;nh tr&ecirc;n c&aacute;c kiểu dữ liệu cơ bản, c&aacute;c ph&aacute;t biểu lựa chọn, lặp, mảng, con trỏ, kiểu cấu tr&uacute;c. B&ecirc;n cạnh đ&oacute; m&ocirc;n học cũng trang bị cho sinh vi&ecirc;n kiến thức xử l&yacute; tập tin, c&aacute;ch viết chương tr&igrave;nh theo kiểu lập tr&igrave;nh h&agrave;m.', 20, 20, 0, '2014-08-10 17:23:35', '0000-00-00 00:00:00'),
(18, 'Giải tích 1', 'M&ocirc;n học n&agrave;y cung cấp cho sinh vi&ecirc;n những kh&aacute;i niệm cơ bản v&agrave; những kỹ thuật t&iacute;nh to&aacute;n tr&ecirc;n h&agrave;m một biến số, bao gồm giới hạn v&agrave; li&ecirc;n tục, vi ph&acirc;n v&agrave; t&iacute;ch ph&acirc;n. Sinh vi&ecirc;n sẽ được học một trong những kh&aacute;m ph&aacute; khoa học lớn: Định l&yacute; cơ bản của ph&eacute;p t&iacute;nh vi t&iacute;ch ph&acirc;n. Nhiều &aacute;p dụng của ph&eacute;p t&iacute;nh vi ph&acirc;n v&agrave; t&iacute;ch ph&acirc;n được cung cấp cho sinh vi&ecirc;n: t&iacute;nh diện t&iacute;ch (t&iacute;ch ph&acirc;n), tốc dộ biến thi&ecirc;n, c&aacute;c b&agrave;i to&aacute;n li&ecirc;n quan đến tốc dộ biến thi&ecirc;n,...C&aacute;c v&iacute; dụ &aacute;p dụng của kiến thức cơ bản được giới thiệu trong suốt gi&aacute;o tr&igrave;nh, chứng tỏ m&ocirc;n học c&oacute; phạm vi &aacute;p dụng rộng lớn, bao gồm vật l&yacute;, kỹ thuật, kinh tế, sinh học...', 40, 10, 0, '2014-08-10 17:24:26', '0000-00-00 00:00:00'),
(19, 'Mạng máy tính', 'M&ocirc;n học cung cấp kiến thức tổng qu&aacute;t về mạng m&aacute;y t&iacute;nh như m&ocirc; h&igrave;nh OSI v&agrave; m&ocirc; h&igrave;nh TCP/IP. M&ocirc;n học c&ograve;n cung cấp kiến thức cơ bản về c&aacute;c thiết bị mạng như Router, Switch, Hub, c&ugrave;ng với c&aacute;ch bấm c&aacute;p để nối giữa c&aacute;c thiết bị. Ngo&agrave;i ra, m&ocirc;n học c&ograve;n trang bị kiến thức về mạng ngang h&agrave;ng, mạng Client/Server, LAN, MAN, WAN, giao thức IP v&agrave; c&aacute;ch chia subnet tr&ecirc;n địa chỉ logic (IP). Đặc biệt, m&ocirc;n học cung cấp kiến thức giao thức định tuyến RIP v&agrave; OSPF, giới thiệu c&ocirc;ng nghệ WAN để l&agrave;m tiền đề cho c&aacute;c m&ocirc;n học sau.', 20, 20, 0, '2014-08-10 17:25:07', '0000-00-00 00:00:00'),
(20, 'Lập trình hướng đối tượng', 'M&ocirc;n học n&agrave;y nhằm mục đ&iacute;ch cung cấp cho sinh vi&ecirc;n kiến thức về phương ph&aacute;p lập tr&igrave;nh hướng đối tượng, một phương ph&aacute;p lập tr&igrave;nh rất th&ocirc;ng dụng hiện nay. Định hướng cho sinh vi&ecirc;n trong việc ph&acirc;n t&iacute;ch, thiết kế v&agrave; thực hiện một chương tr&igrave;nh theo phương ph&aacute;p hướng đối tượng, sử dụng c&aacute;c kh&aacute;i niệm về kiểu dữ liệu trừu tượng (abstract data type), t&iacute;nh bao đ&oacute;ng (encapsulation), t&iacute;nh tương ứng bội (polymorphism), nguy&ecirc;n tắc kế thừa (inheritance) trong việc ph&aacute;t triển c&aacute;c kiểu dữ liệu.', 20, 10, 0, '2014-08-10 17:25:48', '0000-00-00 00:00:00'),
(21, 'Giải tích 2', 'M&ocirc;n học cung cấp cho sinh vi&ecirc;n c&aacute;c kh&aacute;i niệm v&agrave; kỹ thuật cơ bản về c&aacute;c ph&eacute;p t&iacute;nh tr&ecirc;n c&aacute;c h&agrave;m nhiều biến số, cơ bản l&agrave; ph&eacute;p t&iacute;nh vi ph&acirc;n v&agrave; t&iacute;ch ph&acirc;n (t&iacute;ch ph&acirc;n nhiều lớp), h&igrave;nh học trong kh&ocirc;ng gian v&agrave; c&aacute;c kỹ năng t&iacute;nh to&aacute;n tổng c&aacute;c chuỗi số.', 40, 10, 0, '2014-08-10 17:26:20', '0000-00-00 00:00:00'),
(22, 'Lý thuyết hệ điều hành', 'Cung cấp kiến thức tổng quan về hệ điều h&agrave;nh, c&aacute;c th&agrave;nh phần b&ecirc;n trong một hệ điều h&agrave;nh, chức năng của mỗi th&agrave;nh phần. C&aacute;ch li&ecirc;n lạc giao tiếp giữa c&aacute;c tiến tr&igrave;nh, cơ chế định thời CPU. Cung cấp l&yacute; thuyết về c&aacute;c cơ chế quản l&yacute; bộ nhớ, quản l&yacute; hệ thống file, quản l&yacute; I/O. C&aacute;c kỹ thuật lập tr&igrave;nh giao tiếp giữa c&aacute;c tiến tr&igrave;nh (Shared Memory, IPC, Socket..). L&yacute; thuyết về giải quyết tranh t&agrave;i nguy&ecirc;n của c&aacute;c tiến tr&igrave;nh(Semaphore, Banker Algorithm&hellip;) v&agrave; giải quyết Deadlock. Cơ chế bảo mật hệ thống của hệ điều h&agrave;nh.', 40, 20, 0, '2014-08-10 17:26:56', '0000-00-00 00:00:00'),
(23, 'Xác suất thống kê', 'M&ocirc;n học cung cấp c&aacute;c kiến thức cơ bản về x&aacute;c xuất thống k&ecirc; v&agrave; c&aacute;c nguy&ecirc;n l&yacute; thống k&ecirc;. C&aacute;c chủ đề trong m&ocirc;n học bao gồm kiến thức cơ bản về x&aacute;c xuất, c&aacute;c t&iacute;nh chất của biến ngẫu nhi&ecirc;n, h&agrave;m ph&acirc;n phối, kỳ vọng to&aacute;n học, ph&acirc;n phối của thống k&ecirc; mẫu, ước lượng tham số, kiểm định giả thiết v&agrave; hồi quy.', 60, 20, 0, '2014-08-10 17:27:50', '0000-00-00 00:00:00'),
(24, 'Cấu trúc dữ liệu và giải thuật', 'M&ocirc;n học n&agrave;y cung cấp cho sinh vi&ecirc;n kiến thức về c&aacute;c cấu tr&uacute;c dữ liệu cơ bản trong lập tr&igrave;nh c&ugrave;ng c&aacute;c giải thuật lập tr&igrave;nh tương ứng với mỗi cấu tr&uacute;c dữ liệu, đồng thời r&egrave;n luyện cho sinh vi&ecirc;n khả năng tư duy logic, biết &aacute;p dụng c&aacute;c cấu tr&uacute;c dữ liệu th&iacute;ch hợp v&agrave;o c&aacute;c b&agrave;i tập lập tr&igrave;nh cụ thể. Sinh vi&ecirc;n c&oacute; khả năng vận dụng kiến thức đ&atilde; học để giải quyết b&agrave;i to&aacute;n bằng bất kỳ ng&ocirc;n ngữ n&agrave;o. M&ocirc;n học l&agrave; kiến thức nền tảng để sinh vi&ecirc;n n&acirc;ng cao kỹ năng thiết kế giải thuật v&agrave; kỹ năng lập tr&igrave;nh.', 30, 20, 0, '2014-08-10 17:28:26', '0000-00-00 00:00:00'),
(25, 'Vi xử lý', 'M&ocirc;n học n&agrave;y đưa ra kiến thức tổng qu&aacute;t về một chip vi điều khiển, cụ thể l&agrave; họ MCS51.\r\nCấu tr&uacute;c về phần cứng, c&aacute;c IO port, v&agrave; c&aacute;c port chức năng cũng như sự giao tiếp với c&aacute;c bộ nhớ v&agrave; c&aacute;c ngoại vi.\r\nM&ocirc;n học gi&uacute;p sinh vi&ecirc;n hiểu v&agrave; sử dụng tập lệnh của chip vi điều khiển thuộc họ MCS51.', 20, 10, 0, '2014-08-10 17:29:06', '0000-00-00 00:00:00'),
(26, 'Đại số tuyến tính', 'M&ocirc;n học giới thiệu c&aacute;c kiến thức cơ bản của đại số tuyến t&iacute;nh sẽ được sử dụng như trong c&aacute;c m&ocirc;n học kh&aacute;c: Vận tr&ugrave; học, To&aacute;n cho kỹ sư, Phương tr&igrave;nh vi ph&acirc;n,... Nội dung cơ bản của m&ocirc;n n&agrave;y gồm: giới thiệu về hệ phương tr&igrave;nh v&agrave; ma trận, định thức, vector ri&ecirc;ng, gi&aacute; trị ri&ecirc;ng, ...', 90, 40, 0, '2014-08-10 17:29:58', '0000-00-00 00:00:00'),
(27, 'Các hệ cơ sở dữ liệu', 'M&ocirc;n học n&agrave;y trang bị c&aacute;c kiến thức cơ bản về c&aacute;c hệ thống cơ sở dữ liệu quan hệ. Sinh vi&ecirc;n t&igrave;m hiểu c&aacute;c ng&ocirc;n ngữ v&agrave; c&ocirc;ng cụ được sử dụng trong c&aacute;c hệ thống cơ sở dữ liệu thường gặp. Từ đ&oacute; gi&uacute;p sinh vi&ecirc;n c&oacute; thể ứng dụng c&aacute;c hệ thống cơ sở dữ liệu v&agrave;o c&aacute;c hệ thống cụ thể kh&aacute;c.', 30, 15, 0, '2014-08-10 17:30:30', '0000-00-00 00:00:00'),
(28, 'Lập trình mạng', 'M&ocirc;n học n&agrave;y được giảng dạy cho sinh vi&ecirc;n c&aacute;c ng&agrave;nh khoa học m&aacute;y t&iacute;nh, kỹ thuật điện tử, viễn th&ocirc;ng, hệ thống th&ocirc;ng tin&hellip; về những vấn đề lập tr&igrave;nh cho việc trao đổi dữ liệu qua mạng Internet. Sinh vi&ecirc;n được cung cấp nền tảng về kiến thức lập tr&igrave;nh trao đổi dữ liệu với m&ocirc; h&igrave;nh TCP/IP client-server, kiểm so&aacute;t nhiều luồng dữ liệu đồng thời, quản l&yacute; bộ nhớ v&agrave; viết h&agrave;m thư viện cho ph&eacute;p ph&aacute;p triển c&aacute;c ứng dụng về mạng dựa tr&ecirc;n c&aacute;c h&agrave;m n&agrave;y.', 40, 20, 0, '2014-08-10 17:31:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ex_teacher`
--

CREATE TABLE IF NOT EXISTS `ex_teacher` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `password` varchar(100) CHARACTER SET ascii DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `level` tinyint(4) DEFAULT '0',
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ex_teacher`
--

INSERT INTO `ex_teacher` (`teacher_id`, `username`, `password`, `name`, `birthday`, `level`, `del_flg`, `created_at`) VALUES
(1, 'moshimoshi', '25f9e794323b453885f5181f1b624d0b', 'moshi', '0000-00-00', 0, 0, '2014-06-17 14:43:10'),
(2, 'dhbkhn', '25f9e794323b453885f5181f1b624d0b', 'bkhn', '0000-00-00', 0, 0, '2014-07-01 02:05:49'),
(5, 'ashita', '25f9e794323b453885f5181f1b624d0b', 'asakura', '1992-05-15', 0, 0, '2014-08-01 02:14:03'),
(10, 'admin01', '25f9e794323b453885f5181f1b624d0b', 'manager01', '0000-00-00', 1, 0, '2014-08-10 16:45:54'),
(11, 'admin02', '25f9e794323b453885f5181f1b624d0b', 'manager02', '0000-00-00', 1, 0, '2014-08-10 16:47:04'),
(12, 'admin03', '25f9e794323b453885f5181f1b624d0b', 'manager03', '0000-00-00', 1, 0, '2014-08-10 16:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `ex_test_info`
--

CREATE TABLE IF NOT EXISTS `ex_test_info` (
  `test_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `test_again` tinyint(4) DEFAULT '0',
  `mark` float DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`test_info_id`),
  KEY `fk3` (`student_id`),
  KEY `fk4` (`subject_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=46 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ex_answer`
--
ALTER TABLE `ex_answer`
  ADD CONSTRAINT `fk` FOREIGN KEY (`question_id`) REFERENCES `ex_question` (`question_id`);

--
-- Constraints for table `ex_question`
--
ALTER TABLE `ex_question`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`subject_id`) REFERENCES `ex_subject` (`subject_id`),
  ADD CONSTRAINT `fk2` FOREIGN KEY (`question_type_id`) REFERENCES `ex_question_type` (`question_type_id`);

--
-- Constraints for table `ex_test_info`
--
ALTER TABLE `ex_test_info`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`student_id`) REFERENCES `ex_student` (`student_id`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`subject_id`) REFERENCES `ex_subject` (`subject_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
