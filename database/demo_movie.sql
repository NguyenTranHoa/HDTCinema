-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2020 at 07:38 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookings`
--

CREATE TABLE `tbl_bookings` (
  `book_id` int(11) NOT NULL,
  `ticket_id` varchar(30) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theater id',
  `user_id` int(11) NOT NULL,
  `show_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `no_seats` int(3) NOT NULL COMMENT 'number of seats',
  `amount` int(5) NOT NULL,
  `ticket_date` date NOT NULL,
  `date` date NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bookings`
--

INSERT INTO `tbl_bookings` (`book_id`, `ticket_id`, `t_id`, `user_id`, `show_id`, `screen_id`, `no_seats`, `amount`, `ticket_date`, `date`, `status`) VALUES
(18, 'BKID7030446', 0, 4, 29, 5, 1, 70, '2020-07-19', '2020-07-19', 1),
(20, 'BKID4003486', 0, 4, 42, 5, 1, 70, '2020-07-19', '2020-07-19', 1),
(26, 'BKID4605493', 0, 4, 63, 5, 2, 140, '2020-07-21', '2020-07-19', 1),
(27, 'BKID2361839', 0, 5, 36, 5, 1, 70, '2020-07-19', '2020-07-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` int(11) NOT NULL,
  `subject` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL COMMENT 'email',
  `password` varchar(50) NOT NULL,
  `user_type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `user_id`, `username`, `password`, `user_type`) VALUES
(1, 0, 'admin', 'password', 0),
(17, 4, 'nguyenbichngoc@gmail.com', '123456', 2),
(36, 32, 'manager001', '123456', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_movie`
--

CREATE TABLE `tbl_movie` (
  `movie_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `movie_name` varchar(100) NOT NULL,
  `cast` varchar(500) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `desc` varchar(1000) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `release_date` date NOT NULL,
  `image` varchar(200) NOT NULL,
  `video_url` varchar(200) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0 means active ',
  `director` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_movie`
--

INSERT INTO `tbl_movie` (`movie_id`, `t_id`, `movie_name`, `cast`, `desc`, `release_date`, `image`, `video_url`, `status`, `director`, `type`, `time`) VALUES
(18, 5, 'Parasite', 'Song Kang-ho, Lee Sun-kyun, Cho Yeo-jeong, Choi Woo-sik, Park So-dam?', 'Ký Sinh Trùng xoay quanh một gia đình nghèo gồm 4 người ở Hàn Quốc, gồm: bố, mẹ, anh trai và em gái. Tư duy nghèo nàn ăn sâu tới tận xương tủy đã khiến cho họ mãi không thoát ra khỏi cái nghèo, bố mẹ thì ở nhà nhận gấp hộp bánh pizza, cậu con lớn thì thi trượt đại học 4 lần liên tiếp, cô em gái cũng nghỉ học giữa chừng vì không đủ tiền đóng học phí.\r\n\r\nNhững tưởng cuộc sống của gia đình họ sẽ bước sang một trang mới khi cậu con trai lớn được nhận làm gia sư tiếng Anh cho con gái của một nhà vương giả, từng bước đưa gia đình mình vào những vị trí khác nhau trong nhà chủ. Thế nhưng những lối mòn tư duy không thay đổi đã làm cho cuộc sống của họ “đâu lại vào đấy”.', '2020-07-01', 'images/Parasite.jpg', 'https://youtu.be/o3ESQWArU2w', 0, 'Bong Joon-ho', 'Phim hài đen, phim tâm lí', 132),
(19, 5, 'La La Land', 'Ryan Gosling, Emma Stone, Ami?e Conn, Terry Walters, Thom Shelton, Cinda Adams?', 'Lấy chủ đề âm nhạc, La La Land sẽ dẫn dắt khán giả thoát khỏi những bộn bề, lo toan của cuộc sống thường nhận đến với kinh đô điện ảnh Hollywood – nơi có chuyện tình mộng mơ giữa chàng nghệ sĩ piano tài ba Sebastian và cô diễn viên mới nổi Mia.\r\n\r\nHai người họ đều rất bướng bỉnh, có cá tính và nhiều hoài bão. Sau vài lần vô tình gặp gỡ, họ nhận ra tình cảm của đối phương và mặc cho những sai khác về ước mơ, quan điểm sống, họ lao vào nhau như những con thiêu thân.\r\n\r\nLiệu tình cảm đẹp đẽ, trong sáng của đôi bạn trẻ có thể vượt qua những sóng gió nơi Hollywood hoa lệ mà khắc nghiệt? Liệu Mia có thể trở thành một diễn viên nổi tiếng và Seb có mở được hộp đêm cho riêng mình? Hãy tìm xem ngay La La Land để có câu trả lời cho những dấu hỏi còn bỏ ngõ này nhé!', '2020-07-02', 'images/lalaland.jpg', 'https://www.youtube.com/watch?v=0pdqf4P9MB8', 0, 'Damien Chazelle', 'Phim chính kịch hài hước, Phim nhạc kịch lãng mạn', 128),
(21, 0, '12 Years A Slave', 'Chiwetel Ejiofor, Michael K. Williams, Michael Fassbender, Brad Pitt', '12 Years A Slave (12 Năm Nô Lệ) là bộ phim dựa trên cuốn hồi ký cùng tên của Solomon Northup – kể về cuộc đời của người đàn ông Mỹ gốc Phi tên Northup trong những năm tháng bị lừa bắt đi làm nô lệ ở New Orleans.\r\n\r\nThời điểm Northup xuất hiện, ở Mỹ vẫn còn sự phân biệt chủng tộc. Cuộc đời Northup và những người cùng khổ như anh phải chịu số phận nô lệ, bị áp bức bóc lột cả về sức lao động và tinh thần, không được đối xử như một con người, hằng ngày phải chịu sự khổ nhục từ chủ và bị bán đi như một thứ hàng hóa.\r\n\r\n12 Years A Slave (12 Năm Nô Lệ) đã tái hiện lại một cách sinh động lại hiện thực xã hội, đồng thời hình tượng hóa Northup như một anh hùng, không cam chịu, không khuất phục trước số phận của nô lệ. Chính điều đó đã làm cho bộ phim hấp dẫn khán giả và có sức sống bền bỉ qua thời gian.', '2020-07-03', 'images/12yearaslave.jpg', 'https://www.youtube.com/watch?v=G1nFtAr6JOo', 0, 'Steve McQueen', 'Phim hành động, Phim tâm lí', 130),
(22, 0, 'Life Of Pi', 'Suraj Sharma, Irfan Khan, Ayush Tandon, Gautam Belur, Tabu, Adil Hussain, ? ', 'Life Of Pi (Cuộc Đời Của Pi) đúng như tên gọi kể về Pi – cậu bé người Ấn Độ, con trai của một nhà chăm sóc các loài thú ở Ấn Độ. Mạch phim bắt đầu từ khi cha của Pi quyết định đưa cậu và tất cả số thú của mình di cư sang Canada.\r\n\r\nThế nhưng trên đường di cư, chiếc tàu của họ gặp nạn và Pi là người duy nhất sống sót cùng với một số loài thú trên một chiếc xuồng cứu nạn. Tại đây, Pi đã phải đấu tranh sinh tồn, phải học cách hòa hợp và sinh sống với một con hổ Bengal trưởng thành tên là Richard.\r\n\r\n227 ngày lênh đênh trên biển cùng Richard là một hành trình phiêu lưu đầy thú vị nhưng cũng đầy rẫy những hiểm nguy. Pi có sống sót trở về? Khi Pi trở về thì phải làm sao với Richard? Tất cả sẽ được trả lời trong bộ phim Life Of Pi (Cuộc Đời Của Pi).', '2020-07-04', 'images/lifeofpi.jpg', 'https://www.youtube.com/watch?v=j9Hjrs6WQ8M', 0, 'Lý An', 'Phim phiêu lưu', 127),
(23, 0, 'The Artist', 'Jean Dujardin, B?r?nice Bejo, Penelope Ann Miller, James Cromwell,?', 'The Artist lấy bối cảnh những năm cuối thập niên 1920 – thời điểm mà bộ phim có tiếng đầu tiên ra đời, đặt dấu chấm hết cho thời kì vàng son của phim câm và mở ra cánh cửa mới cho ngành điện ảnh.\r\n\r\nBộ phim là câu chuyện về George Valentin – ngôi sao phim câm đang dần bị quên lãng và cô đào Peppy Miller đang lên. Sự tương phản giữa 2 nhân vật chính trong dòng chảy của 2 màu sắc tương phản đen-trắng là một nét nghệ thuật đặc sắc chứa đựng nhiều ẩn ý. Họ đã cùng nhau trải qua một mối quan hệ nhiều cảm xúc và vô cùng lãng mạn.\r\n\r\n100 phút không lời thoại với những diễn biến trong hai màu đen – trắng nhưng không hề kén khán giả bởi có lẽ người ta đã quá mệt mỏi với cuộc sống quá nhiều âm thanh hỗn tạp, quá nhiều màu sắc chói lòa của cuộc sống hiện đại.\r\n\r\nThe Artist đích thị là bộ phim câm gây được nhiều tiếng vang lớn khi liên tục lọt vào đề cử 10 hạng mục tại Oscar 2012, và cuối cùng thắng lớn với 5 giải thưởng: Phim hay nhất, Đạo diễn xuất sắc nhất, Nhạc phim xuất sắc nhất, Phục trang x', '2020-07-05', 'images/theartist.jpg', 'https://www.youtube.com/watch?time_continue=5&v=sPSJYXi7BWA&feature=emb_title', 0, 'Michel Hazanavicius ', 'Phim câm, Phim hài lãng mạn ', 100),
(24, 0, 'Inception', 'Leonardo DiCaprio, Ken Watanabe, Joseph Gordon-Levitt, Ellen Page, Marion Cotillard, Tom Hardy, Cillian Murphy, Tom Berenger, Michael Caine,?', 'Inception là một bộ phim khoa học viễn tưởng kể về những người có năng lực đặc biệt – có khả năng xâm nhập vào giấc mơ của người khác và lấy cắp thông tin. Dom Cobb và những người cộng sự của mình: Eames (Kẻ giả dạng – The Forger), Arthur (Kẻ dẫn đuờng – The Point Man), Yusuf (Kẻ gây mê – The Chemist) và Ariadne (Nguời kiến tạo – The Architect) đã nhận một nhiệm vụ đặc biệt từ tài phiệt Saito.\r\n\r\nKhác với các lần trước là chỉ lấy cắp thông tin, lần này họ phải xâm nhập vào giấc mơ con trai một tập đoàn khổng lồ và thay đổi những suy nghĩ trong tiềm thức của anh ta. Điều quan trọng là người thủ lĩnh tài năng – Dom Cobb dễ bị phân tâm bởi kí ức về người vợ quá cố và nếu mơ quá sâu, anh và những người cộng sự sẽ không thể thoát khỏi những giấc mơ đó.\r\n\r\nCái khó của Inception là làm cho người xem hiểu được ý tưởng của bộ phim, cũng như là những quy luật, những ý niệm về giấc mơ. Và tuy khó nhưng Inception đã làm được, một cách thành công và xuất sắc. Sự khác lạ, độc đáo trong nội dung, cũn', '2020-07-06', 'images/inception.jpg', 'https://www.youtube.com/watch?v=8hP9D6kZseM', 0, 'Christopher Nolan', 'Khoa học viễn tưởng, Phim hành động', 148),
(25, 0, 'Avatar', 'Sam Worthington, Zoe Saldana, Stephen Lang, Michelle Rodriguez, Joel David Moore, Giovanni Ribisi, ?', 'Bộ phim kể về Jake Sully – một “anh hùng bất đắc dĩ” – được chọn làm chỗ thế thân cho người anh song sinh của mình trong hành trình cấy ghép với gen của người ngoài hành tinh Na’vi để tạo ra giống loài mới gọi là Avatar.\r\n\r\nSau khi anh trai Jake bị giết trong một vụ cướp, Jake thế chỗ anh mình và có nhiệm vụ nghiên cứu, tìm hiểu về hành tinh Pandora và cung cấp những thông tin quý giá cho “phe loài người” trong hành trình xâm lăng Pandora.\r\n\r\nBộ phim đã phá vỡ mọi kỉ lục phòng vé và trở thành phim có doanh thu cao nhất mọi thời đại trên toàn thế giới, cho tới năm 2019 mới bị Avenger: End Game đánh bại. Điều này có lẽ là nhờ những tình tiết mới lạ cùng kĩ xảo điện ảnh đặc sắc và Oscar 2010 đã xướng tên Avatar ở 3 hạng mục: Quay phim xuất sắc, Hiệu ứng hình ảnh và Chỉ đạo nghệ thuật xuất sắc.', '2020-07-07', 'images/avatar.jpg', 'https://www.youtube.com/watch?v=M8Mi0elohJw', 0, 'James Cameron', 'Phim hành động, phim khoa học viễn tưởng', 162),
(26, 0, 'Slumdog Millionaire', 'Dev Patel, Freida Pinto, Anil Kapoor, Irrfan Khan,? ', 'Lấy bối cảnh ở Ấn Độ, bộ phim là câu chuyện về chàng trai Jamal từ khi cậu còn ở khu ổ chuột đến khi trở thành một triệu phú. Phim bắt đầu khi Jamal tham gia chương trình Ai Là Triệu Phú? (phiên bản Ấn Độ), anh đã trả lời đúng hết các câu hỏi và đạt được hơn 10 triệu rupees.\r\n\r\nĐiều này đã gây nên những hoài nghi lớn đối với những người làm chương trình và các viên cảnh sát. Họ cho rằng có sự gian lận, họ không tin một chàng trai có vẻ ngoài chân chất và đôi mắt dễ hoảng hốt lại làm được điều phi thường đó.\r\n\r\nLiệu Jamal có gặp rắc rối sau những điều tra của cảnh sát? Liệu kết quả mà cậu đạt được có đúng với năng lực thực sự của cậu? Hãy tìm xem Slumdog Millionaire để có cho mình câu trả lời bạn nhé!', '2020-07-08', 'images/slumdog.jpg', 'https://www.youtube.com/watch?v=AIzbwV7on6Q', 0, 'Danny Boyle, Loveleen Tandan', 'Phim tình cảm lãng mạn', 120),
(27, 0, 'No Country For Old Men', 'Tommy Lee Jones, Javier Bardem, Josh Brolin, Woody Harrelson, Kelly Macdonald, Garret Dillahunt,?.', 'Phim lấy bối cảnh thời hiện đại, khi ma túy vượt qua trộm cắp, trở thành loại tội phạm nguy hiểm bậc nhất và súng được dùng tự do tại một khu thị trấn nọ. No Country For Old Men mở đầu vào thời điểm Llewelyn Moss tình cờ tìm thấy một chiếc xe tải đầy ma túy kèm theo 2 triệu USD tiền mặt.\r\n\r\nThời điểm mà Moss quyết định lấy số tiền cũng chính là lúc anh ấn nút bắt đầu cho một vòng quay tội ác mà ngay cả luật pháp cũng không thể nào ngăn cản nổi.Cũng vì số tiền đó mà Moss trở thành nạn nhân, là mục tiêu của Chigurh – người được thuê tìm lại số ma túy và tiền bị mất. Chigurh là một tên tội phạm độc ác, máu lạnh, việc ra tay sát hại nạn nhân hay không được gã dựa vào một trò hoàn toàn mang tính may rủi – trò tung đồng xu.\r\n\r\nVới những tình tiết li kì, hấp dẫn đã làm khán giả không khỏi hồi hộp mỗi lần “kẻ sát nhân máu lạnh” xuất hiện. Và có lẽ chính những điều đó đã giúp No Country For Old Men giành được 04 giải thưởng quan trọng tại Oscar 2008, trong đó có giải thưởng dành cho Phim hay nh', '2020-07-09', 'images/country.jpg', 'https://www.youtube.com/watch?v=38A__WT3-o0', 0, 'Joel Coen, Ethan Coen', 'Phim hình sự', 122),
(28, 0, 'Brokeback Mountain', 'Heath Ledger, Jake Gyllenhaal, Randy Quaid, Valerie Planche, Michelle Williams, Tom Carey,?', 'Brokeback Mountain (Chuyện Tình Sau Núi) là câu chuyện xoay quanh hai chàng cao bồi Ennis Del Mar và Jack Twist. Mùa hè năm 1963, sau khi cùng được thuê đến vùng núi Wyoming, cả 2 đã gặp nhau và có chung nhiệm vụ là trông nom đàn cừu khổng lồ khỏi thú dữ.\r\n\r\nThời gian đó, Ennis và Jack đã phát hiện nhiều cảm xúc khác lạ mình dành cho đối phương. Và rồi trong một đêm giá lạnh, cả hai đã không kềm chế cảm xúc và cùng nhau trải qua những cảm giác mà họ chưa từng trước đây. Tình cảm thầm kín đó kéo dài đến tận 20 năm sau – lúc mà cả Ennis và Jack đều đã cưới vợ và có một mái ấm riêng.', '2020-07-10', 'images/brokeback.jpg', 'https://www.youtube.com/watch?v=lDz1fmeyHIA&feature=emb_title', 0, 'Ang Lee', 'Phim tâm lý tình cảm', 134),
(30, 0, 'Lord Rings', '?uongz', 'mlem mlem', '2020-08-05', 'images/lordrings.jpg', 'https://www.youtube.com/watch?v=j9Hjrs6WQ8M', 0, 'Bong Joon-ho', 'Cà khịa', 123);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cast` varchar(100) NOT NULL,
  `news_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `attachment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `name`, `cast`, `news_date`, `description`, `attachment`) VALUES
(3, 'The Mummy', 'Tom Cruiz', '2017-06-15', 'Thought safely entombed in a crypt deep beneath the desert, an ancient princess whose destiny was unjustly taken from her is awakened in the modern era', 'news_images/mummy.jpg'),
(5, 'Transformers: The Last Knight', ' Mark Wahlberg , Isabela Moner ', '2017-07-21', 'Humans are at war with the Transformers, and Optimus Prime is gone. The key to saving the future lies buried in the secrets of the past and the hidden history of Transformers on Earth', 'news_images/tra.jpg'),
(6, 'Tiyan', 'Privthi Raj,Indrajith', '2017-10-18', 'Tiyaan is an upcoming Indian Malayalam film written by Murali Gopy and directed by Jiyen Krishnakumar.', 'news_images/tiyan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(12) NOT NULL,
  `age` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`user_id`, `name`, `email`, `phone`, `age`, `gender`) VALUES
(4, 'Nguyễn Bích Ngọc', 'nguyenbichngoc@gmail.com', 984569871, 19, 'gender'),
(5, 'Nguyễn Thùy Linh', 'nguyenthuylinh@gmail.com', 123456789, 20, 'gender');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_screens`
--

CREATE TABLE `tbl_screens` (
  `screen_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL COMMENT 'theatre id',
  `screen_name` varchar(110) NOT NULL,
  `seats` int(11) NOT NULL COMMENT 'number of seats',
  `charge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_screens`
--

INSERT INTO `tbl_screens` (`screen_id`, `t_id`, `screen_name`, `seats`, `charge`) VALUES
(5, 32, 'Screen 01', 100, 70);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shows`
--

CREATE TABLE `tbl_shows` (
  `s_id` int(11) NOT NULL,
  `st_id` int(11) NOT NULL COMMENT 'show time id',
  `theatre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 means show available',
  `r_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shows`
--

INSERT INTO `tbl_shows` (`s_id`, `st_id`, `theatre_id`, `movie_id`, `status`, `r_status`) VALUES
(29, 18, 0, 18, 1, 0),
(32, 19, 0, 18, 1, 0),
(33, 20, 0, 18, 1, 0),
(34, 21, 0, 18, 1, 0),
(35, 23, 0, 18, 1, 0),
(36, 24, 0, 18, 1, 0),
(37, 19, 0, 19, 1, 0),
(38, 20, 0, 19, 1, 0),
(39, 21, 0, 19, 1, 0),
(40, 23, 0, 19, 1, 0),
(41, 21, 0, 21, 1, 0),
(42, 23, 0, 21, 1, 0),
(43, 24, 0, 21, 1, 0),
(44, 18, 0, 22, 1, 0),
(45, 19, 0, 22, 1, 0),
(46, 23, 0, 22, 1, 0),
(47, 24, 0, 22, 1, 0),
(48, 18, 0, 23, 1, 0),
(51, 19, 0, 23, 1, 0),
(52, 21, 0, 24, 1, 0),
(53, 23, 0, 24, 1, 0),
(54, 24, 0, 24, 1, 0),
(55, 19, 0, 25, 1, 0),
(56, 21, 0, 25, 1, 0),
(57, 24, 0, 25, 1, 0),
(58, 18, 0, 27, 1, 0),
(59, 19, 0, 27, 1, 0),
(60, 21, 0, 27, 1, 0),
(61, 24, 0, 26, 1, 0),
(62, 23, 0, 28, 1, 0),
(63, 24, 0, 28, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_show_time`
--

CREATE TABLE `tbl_show_time` (
  `st_id` int(11) NOT NULL,
  `screen_id` int(11) NOT NULL,
  `start_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_show_time`
--

INSERT INTO `tbl_show_time` (`st_id`, `screen_id`, `start_time`) VALUES
(18, 5, '11:30:00'),
(19, 5, '13:30:00'),
(20, 5, '15:30:00'),
(21, 5, '17:30:00'),
(23, 5, '19:30:00'),
(24, 5, '21:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_theatre`
--

CREATE TABLE `tbl_theatre` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_theatre`
--

INSERT INTO `tbl_theatre` (`id`, `name`) VALUES
(32, 'Nguyễn Phương Đông');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  ADD PRIMARY KEY (`screen_id`);

--
-- Indexes for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_bookings`
--
ALTER TABLE `tbl_bookings`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_movie`
--
ALTER TABLE `tbl_movie`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_screens`
--
ALTER TABLE `tbl_screens`
  MODIFY `screen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_shows`
--
ALTER TABLE `tbl_shows`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_show_time`
--
ALTER TABLE `tbl_show_time`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_theatre`
--
ALTER TABLE `tbl_theatre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
