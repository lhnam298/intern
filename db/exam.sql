-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2014 at 04:36 AM
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
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`answer_id`),
  KEY `fk` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ex_answer`
--

INSERT INTO `ex_answer` (`answer_id`, `question_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `del_flg`, `created_at`, `update_at`) VALUES
(1, 3, 'Vitamin B1\r\n', 'Vitamin B2\r\n', 'Vitamin A\r\n', 'Viatmin D\r\n', 0, '2014-06-18 10:16:17', '0000-00-00 00:00:00'),
(2, 19, 'Cần thiết cho chuyển hoá\r\n', 'Tổ chức bảo vệ cơ thể', 'Cấu trúc và tạo hình', 'Giúp acid mật tham gia vào quá trình nhũ tương hoá thức ăn ở ruột', 0, '2014-06-22 11:38:02', '0000-00-00 00:00:00'),
(3, 3, 'Vitamin B1\r\n', 'Vitamin B2\r\n', 'Vitamin A\r\n', 'Viatmin D\r\n', NULL, '2014-06-24 23:56:16', '0000-00-00 00:00:00'),
(4, 3, 'Vitamin B1\r\n', 'Vitamin B2\r\n', 'Vitamin A\r\n', 'Viatmin D\r\n', 0, '2014-06-25 09:55:31', '0000-00-00 00:00:00'),
(5, 23, 'Tiêu hoa năng lượng cho rửa bát cao hơn quét nhà\r\n', 'Tiêu hao năng lượng cho đứng nói chuyện cao hơn cho nấu ăn\r\n', 'Tiêu hao năng lượng cho rửa bát cao hơn nấu ăn\r\n', 'Tiêu hao năng lượng cho giặt tay thấp hơn đi bộ 4km/h\r\n', 0, '2014-06-30 10:50:53', '0000-00-00 00:00:00'),
(6, 24, 'ăn thức ăn giàu đạm với tỉ lệ cân đối giữa nguồn động vật và thực vật, nên tăng cường ăn cá\r\n', 'Lựa chọn và sử dụng thức ăn, đồ uống đảm bảo vệ sinh an toàn. Dùng nguồn nước sạch để chế biến thức ăn\r\n', 'Không nên dùng các chất kích thích như rượu, bia, cà phê, thuốc lá\r\n', 'Cho trẻ ăn các thức ăn bổ sung giàu chất dinh dưỡng. Thực hiện tô màu bát bột\r\n', 0, '2014-06-30 10:52:43', '0000-00-00 00:00:00'),
(7, 25, 'Sữa và các sản phẩm của sữa\r\n', 'Thịt, cá\r\n', 'Ngũ cốc và các loại bột\r\n', 'Trứng\r\n', 0, '2014-06-30 10:54:00', '0000-00-00 00:00:00'),
(9, 40, 'Phòng chống suy dinh dưỡng protein - năng lượng ở trẻ em và bà mẹ\r\n', 'Phòng chống béo phì và thừa cân\r\n', 'Theo dõi, đánh giá, giám sát các mục tiêu dinh dưỡng\r\n', 'Phổ biến 10 lời khuyên dinh dưỡng\r\n', 0, '2014-07-01 09:43:18', '0000-00-00 00:00:00'),
(10, 41, 'Thịt có thể là nguồn lây của bệnh lao\r\n', 'Cá có thể là nguồn lây các loại sán\r\n', 'Lớp vỏ trong của sắn có chứa chất Solamin\r\n', 'Nguy cơ nấm mốc trong quá trình làm tương có khả năng sinh độc tố Mycotoxin\r\n', 0, '2014-07-01 09:43:47', '0000-00-00 00:00:00'),
(11, 42, 'ăn thức ăn giàu đạm với tỉ lệ cân đối giữa nguồn động vật và thực vật, nên tăng cường ăn cá\r\n', 'Lựa chọn và sử dụng thức ăn, đồ uống đảm bảo vệ sinh an toàn. Dùng nguồn nước sạch để chế biến thức ăn\r\n', 'Không nên dùng các chất kích thích như rượu, bia, cà phê, thuốc lá\r\n', 'Cho trẻ ăn các thức ăn bổ sung giàu chất dinh dưỡng. Thực hiện tô màu bát bột\r\n', 0, '2014-07-01 09:44:16', '0000-00-00 00:00:00'),
(12, 43, 'Cho trẻ ăn thức ăn không có mỡ\r\n', 'Cho trẻ uống nước ngọt càng nhiều càng tốt\r\n', 'Cho trẻ ăn đủ chất và uống nhiều nước hơn bình thưòng\r\n', 'Cho trẻ uống ít hơn bình thường\r\n', 0, '2014-07-01 09:45:00', '0000-00-00 00:00:00'),
(13, 44, 'Thịt nhiều mỡ\r\n', 'Các loại phủ tạng\r\n', 'Hạt sen, lá vông\r\n', 'Đường, bánh, kẹo\r\n', 0, '2014-07-01 09:45:27', '0000-00-00 00:00:00'),
(14, 45, 'Người bệnh trong giai đoạn ổn định của bệnh\r\n', 'Người bệnh trong giai đoạn phục hồi của bệnh\r\n', 'Người bệnh sốt nhiễm trùng\r\n', 'Người bệnh đái tháo đường\r\n', 0, '2014-07-01 09:45:56', '0000-00-00 00:00:00'),
(15, 47, 'df', 'dfd', 'fd', 'dfd', 0, '2014-07-06 22:54:54', '0000-00-00 00:00:00'),
(16, 49, '1', '2', '3', '4', 0, '2014-07-26 02:00:54', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51 ;

--
-- Dumping data for table `ex_question`
--

INSERT INTO `ex_question` (`question_id`, `subject_id`, `question_type_id`, `question`, `answer`, `del_flg`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Treonin là 1 trong 8 acid amin cần thiết mà cơ thể không tự tổng hợp được', '1', 1, '2014-06-18 10:14:47', '2014-07-01 09:11:20'),
(3, 2, 3, 'Vitamin có vai trò ảnh hưởng tới sự cảm thụ ánh sáng của mắt, nhất là đối với sự nhìn màu là vai trò của', '2', 0, '2014-06-18 10:15:24', '2014-06-30 13:35:24'),
(6, 2, 1, 'BMI = 25 là thừa cân và béo phì', '1', 1, '2014-06-22 09:40:18', '2014-07-25 02:46:55'),
(7, 2, 1, 'Nhu cầu vitamin C ở người trưởng thành là 300 mg/ ngày', '0', 0, '2014-06-22 09:44:43', '0000-00-00 00:00:00'),
(8, 1, 1, 'Tỉ lệ năng lượng do protein - lipid - glucid cân đối trong khẩu phần ăn cần phấn đấu đạt được trong thời gian tới là 12% - 18% - 70%', '0', 1, '2014-06-22 10:00:12', '2014-07-01 09:11:20'),
(10, 1, 1, 'Tỉ lệ năng lượng do protein - lipid - glucid cân đối trong khẩu phần ăn cần phấn đấu đạt được trong thời gian tới là 14% - 20% - 66%', '1', 1, '2014-06-22 10:23:29', '2014-07-01 09:11:20'),
(11, 2, 1, 'Chế độ ăn cho người cao tuổi cần tăng đường và giảm muối', '0', 0, '2014-06-22 10:29:44', '0000-00-00 00:00:00'),
(19, 1, 2, 'Trong các vai trò sau, vai trò nào là vai trò dinh dưỡng của protein đối với cơ thể', '1&3', 1, '2014-06-22 11:38:02', '2014-07-01 09:11:20'),
(20, 2, 1, 'sdfdfdf', '1', 1, '2014-06-23 05:49:19', '2014-07-25 02:25:03'),
(21, 1, 1, 'Chế độ ăn cho người cao tuổi cần tăng đường và giảm muối', '0', 1, '2014-06-30 10:48:01', '2014-07-01 09:11:20'),
(22, 1, 1, 'Chế độ ăn cho người lao động trí óc cần hạn chế glucid và lipid trong khẩu phần', '1', 1, '2014-06-30 10:49:55', '2014-07-01 09:11:20'),
(23, 2, 2, 'Trong các phát biểu sau, phát biểu nào chưa đúng', '1&3', 0, '2014-06-30 10:50:53', '0000-00-00 00:00:00'),
(24, 4, 2, 'Trong các lời khuyên sau, lời khuyên nào không thuộc 10 lời khuyên dinh dưỡng hợp lý', '1&2', 0, '2014-06-30 10:52:43', '2014-06-30 12:03:18'),
(25, 4, 3, 'Nguồn các yếu tố kiềm của thực phẩm có nhiều trong', '1', 1, '2014-06-30 10:54:00', '2014-07-25 02:45:13'),
(27, 9, 1, 'Trong CLQG về dinh dưỡng giai đoạn 2001 - 2010, mục tiêu phấn đấu giảm tỉ lệ trẻ em dưới 5 tuổi thừa cân xuống dưới 3%', '0', 0, '2014-07-01 09:40:54', '0000-00-00 00:00:00'),
(28, 9, 1, 'Trong CLQG về dinh dưỡng giai đoạn 2001 - 2010, mục tiêu phấn đấu giảm tỉ lệ trẻ em dưới 5 tuổi SDD chiều cao theo tuổimỗi năm 1,5%', '1', 0, '2014-07-01 09:41:04', '0000-00-00 00:00:00'),
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
(47, 2, 2, 'jhhghghgh', '1&4', 0, '2014-07-06 22:54:54', '0000-00-00 00:00:00'),
(48, 2, 1, 'demo', '1', 0, '2014-07-26 01:50:06', '0000-00-00 00:00:00'),
(49, 2, 3, '1+1=?', '2', 0, '2014-07-26 02:00:54', '0000-00-00 00:00:00'),
(50, 10, 1, 'はじまして。', '1', 0, '2014-07-28 02:18:53', '0000-00-00 00:00:00');

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
(1, 'câu hỏi đúng sai', 'có hai lựa chọn là đúng hoặc sai, học sinh chọn câu trả lời', 1, 0, '2014-06-15 14:12:39', '0000-00-00 00:00:00'),
(2, 'câu hỏi lựa chọn đáp án đúng', 'có bốn phương án trong đó có nhiều phương án đúng, học sinh lựa chọn các phương án mình cho là đúng', 2, 0, '2014-06-15 14:14:08', '0000-00-00 00:00:00'),
(3, 'câu hỏi lựa chọn đáp án đúng nhất', 'có bốn phương án trong đó có duy nhất một phương án đúng, học sinh chọn phương án mình cho là đúng nhất', 2, 0, '2014-06-15 14:15:06', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ex_student`
--

INSERT INTO `ex_student` (`student_id`, `username`, `password`, `name`, `birthday`, `average_mark`, `del_flg`, `created_at`) VALUES
(1, 'namlh298', '123456', 'namlh', '2014-01-01', 0, 0, '2014-06-11 10:39:07'),
(2, 'namlh_298', '123456789', 'lê hoài nam', '2014-06-12', 5.16667, 0, '2014-06-11 17:00:00'),
(3, 'namlh123', '123456789', 'nam    lh', '0000-00-00', 6, 0, '2014-06-12 11:10:12'),
(4, 'nam1992', '123456789', 'lh nam', '0000-00-00', 0, 0, '2014-06-12 11:14:20'),
(5, 'nam123465', '123456789', 'ashita', '0000-00-00', 0, 0, '2014-06-12 11:17:06'),
(6, 'namabc', '123456789', 'lê hoài nam', '0000-00-00', 0, 1, '2014-06-12 16:19:38'),
(7, 'benkyo', 'lhnam298', 'lê hoài nam', '0000-00-00', 0, 0, '2014-06-12 11:24:03'),
(8, 'nam_ninja', '123456123', 'nam    lh', '0000-00-00', 5, 0, '2014-06-12 16:51:23'),
(9, 'nam_ninja1', '123456789', 'nam    lh', '0000-00-00', 8, 0, '2014-06-12 16:53:52'),
(10, 'nam123', '123456789', 'namlh1', '0000-00-00', 4, 0, '2014-07-01 14:31:17');

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
  PRIMARY KEY (`subject_id`),
  UNIQUE KEY `subject_name` (`subject_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ex_subject`
--

INSERT INTO `ex_subject` (`subject_id`, `subject_name`, `description`, `test_time`, `question_num`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Toan', 'toan I', 20, 50, 1, '2014-06-18 01:55:01', '2014-07-19 11:21:25'),
(2, 'Van', 'van hoc viet nam', 1, 5, 0, '2014-06-18 01:55:15', '2014-06-28 10:11:07'),
(3, 'Vat ly', 'Vat ly dai cuong', 20, 50, 0, '2014-06-27 22:25:06', '0000-00-00 00:00:00'),
(4, 'Hoa hoc', 'Hoa hoc dai cuong', 10, 20, 0, '2014-06-27 22:27:15', '2014-06-30 12:03:18'),
(5, 'Tri tue nhan tao', 'AI', 10, 20, 1, '2014-06-27 22:31:44', '2014-06-28 09:24:28'),
(6, 'Giao dien', 'human interface', 15, 30, 0, '2014-06-27 22:39:43', '0000-00-00 00:00:00'),
(7, 'Vat ly 1', 'vat ly 1', 30, 50, 0, '2014-06-28 02:05:01', '2014-06-28 02:18:30'),
(8, 'Vat ly 2', 'vat ly 2', 25, 25, 0, '2014-06-28 02:06:38', '0000-00-00 00:00:00'),
(9, 'Dinh duong', 'cau hoi', 1, 10, 0, '2014-07-01 09:38:39', '2014-07-22 21:14:49'),
(10, '日本語', '日本語を勉強しましょう。', 10, 20, 0, '2014-07-28 02:16:47', '0000-00-00 00:00:00');

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
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ex_teacher`
--

INSERT INTO `ex_teacher` (`teacher_id`, `username`, `password`, `name`, `birthday`, `level`, `del_flg`, `created_at`) VALUES
(1, 'moshimoshi', '123456789', 'moshi', '0000-00-00', 0, 0, '2014-06-17 14:43:10'),
(2, 'dhbkhn', '123456789', 'bkhn', '0000-00-00', 1, 0, '2014-07-01 02:05:49'),
(3, 'taolaadmin', '123456789', 'abcdef', '0000-00-00', 0, 0, '2014-07-01 01:39:09'),
(4, 'saddestday', '123456789', 'sakura', '0000-00-00', 0, 0, '2014-07-23 02:18:40');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `ex_test_info`
--

INSERT INTO `ex_test_info` (`test_info_id`, `student_id`, `subject_id`, `test_again`, `mark`, `del_flg`, `created_at`, `updated_at`) VALUES
(2, 3, 9, 0, 6, 0, '2014-07-10 03:01:04', '2014-07-19 12:35:09'),
(3, 10, 9, 2, 4, 0, '2014-07-10 06:06:55', '2014-07-19 12:35:13'),
(7, 2, 9, 2, 5.33333, 0, '2014-07-25 02:00:16', '2014-07-26 01:49:46'),
(8, 2, 2, 0, 5, 0, '2014-07-26 02:01:18', '2014-07-26 02:02:21'),
(9, 9, 9, 0, 6, 0, '2014-07-26 02:09:37', '2014-07-26 02:10:40'),
(10, 9, 2, 0, 10, 0, '2014-07-26 02:21:47', '2014-07-26 02:23:45'),
(11, 7, 2, 0, 0, 0, '2014-07-28 01:52:33', '2014-07-28 02:10:45'),
(12, 7, 9, 0, 0, 0, '2014-07-28 02:32:59', '0000-00-00 00:00:00');

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
