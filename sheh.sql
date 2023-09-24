-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 23, 2023 at 10:56 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sheh`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(11) NOT NULL,
  `inv_no` varchar(10) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(40) DEFAULT NULL,
  `contact` varchar(10) NOT NULL,
  `mail` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `inv_no`, `name`, `address`, `contact`, `mail`) VALUES
(1, '1', 'Aastha Singh', 'Yashodanagar,Kanpur', '9999999995', 'aasthasparmar31@gmai'),
(2, '2', 'Franz Kafka', 'Berlin,Germany', '3334-5554', 'kafka@gmail.com'),
(3, '3', 'Haruki Murakami', 'Hokkaido,Japan', '22222-0999', 'murakami@gmail.com'),
(4, '5', 'Aastha Singh ', 'Trivenis, pno. 46, Manoharvihar', '4444444444', 'aasthasparmar31@gmai'),
(5, '5', 'kammo', 'Trivenis, pno. 46, Manoharvihar', '4444444444', 'aasthasparmar31@gmai'),
(6, '8', 'Aastha Singh ', 'Trivenis, pno. 46, Manoharvihar', '4444444444', 'aasthasparmar31@gmai'),
(7, '7', 'Aastha Singh ', 'lljhgfyfuc', '4444444444', 'aasthasparmar31@gmai'),
(99, '99', 'santiago', 'b99', '5555555555', 'santiago@gmail.com'),
(405, '405', 'grunt', 'pacific ocean', '6666665342', 'shaun@gmail.com'),
(523, '523', 'Rosa', 'b99', '5545321646', 'rosadiaz@gmail.com'),
(560, '560', 'kammo', 'kaksdncos', '4444444444', 'aasthasparmar31@gmai'),
(562, '562', 'froggy1O1', 'Nottingham,England', '4444444444', 'aasthasparmar31@gmai'),
(586, '586', 'Eloise Bridgerton', 'London,England', '4444-5555', 'eloise@gmail.com'),
(789, '789', 'Terry', 'NYC,US', '444558887', 'terry@gmal.com'),
(1020, '1020', 'Aastha Singh ', 'kakakka', '4444444444', 'aasthasparmar31@gmai'),
(1021, '', 'frogg', 'kakakak', '4444444444', 'aasthasparmar31@gmai'),
(1522, '1522', 'Veena Singh', 'berlin germany', '988999755', 'veena@gmail.com'),
(2010, '2010', 'kammo', 'kammmoland', '5555555555', 'aasthasparmar31@gmai'),
(5000, '5000', 'Jake Peralta', 'NYC,US', '4444444444', 'jakelodean@gmail.com'),
(5001, '5001', 'Aastha Singh ', 'Trivenis, pno. 46, Manoharvihar,Yashodan', '5555555555', 'aasthasparmar31@gmai'),
(5112, '5112', 'Komal Shukla', 'Shuklaganj, Kanpur', '5555555578', 'konsl@gmail.com'),
(5245, '5245', 'aasthasparmar31@gmail.com', 'hahaland', '988999755', 'aasthasparmar31@gmai'),
(5454, '5454', 'Penelope Featherigton', 'London, England', '5555555578', 'pen@gmail.com'),
(5555, '5555', 'Aastha Singh', 'nottingham, england', '9899999999', 'froggo@gmail.com'),
(5558, '5558', 'Simon Waterstones', 'London, England', '4444-5555', 'simon@gmail.com'),
(7777, '7777', 'froggy1O1', 'Trivenis, pno. 46, Manoharvihar', '5545321646', 'aasthasparmar31@gmai'),
(8457, '8457', 'Aastha Singh ', 'cffdghfjgk', '5555555555', 'aasthasparmar31@gmai'),
(24317, '24317', 'kolaa', 'kolaland, greece', '5555555578', 'aasthasparmar31@gmai'),
(31160, '31160', 'Aastha Singh ', 'Trivenis, pno. 46, Manoharvihar,Yashodan', '5454554545', 'aasthasparmar31@gmai'),
(51111, '51111', 'Azeeza ', 'Beirut, Lebanon', '4444-5555', 'az@gmail.com'),
(52456, '52456', 'Kamakshi Khanna', 'Nottingham,England', '988999755', 'kama21@gmail.com'),
(55552, '55552', 'Kamakhya', 'Vatican city,Rome, Italy', '5555555578', 'kama@gmail.com'),
(71519, '71519', 'laila', 'Triveni, pno. 46, Manoharvihar', '4444-5555', 'aasthasparmar31@gmai'),
(555525, '555525', 'Kamakhshi Khanna', 'Colaba,Goa', '5555555578', 'Khanna@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `pid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `cid`, `pid`) VALUES
(330, 555525, 3),
(333, 555525, 1),
(335, 555525, 5),
(337, 555525, 8),
(339, 555525, 10),
(340, 555525, 10),
(344, 555525, 18),
(345, 555525, 17),
(347, 555525, 15),
(348, 555525, 3),
(349, 555525, 5),
(350, 555525, 8),
(351, 555525, 6),
(352, 555525, 7),
(353, 555525, 11),
(354, 555525, 11),
(355, 555525, 2),
(359, 555525, 20),
(360, 555525, 19),
(361, 555525, 22),
(362, 555525, 23),
(363, 555525, 25),
(364, 555525, 26),
(365, 555525, 26),
(368, 555525, 29),
(369, 555525, 31),
(370, 555525, 31),
(371, 555525, 36),
(372, 555525, 36),
(374, 555525, 37),
(375, 555525, 37),
(376, 555525, 37),
(377, 555525, 39),
(378, 555525, 40),
(379, 555525, 40),
(381, 555525, 42),
(382, 555525, 16),
(383, 405, 3),
(384, 405, 6),
(385, 405, 16),
(386, 405, 36),
(387, 405, 36),
(388, 405, 36),
(389, 555525, 3),
(390, 5112, 25),
(391, 5112, 2),
(394, 5112, 17),
(395, 5112, 9),
(396, 5112, 22),
(397, 5112, 23),
(398, 5112, 39),
(399, 555525, 42),
(400, 555525, 29),
(401, 555525, 4),
(402, 555525, 6),
(404, 7777, 29),
(405, 7777, 39),
(406, 7777, 9),
(407, 7777, 9),
(408, 7777, 9),
(409, 5001, 7),
(410, 5001, 2),
(411, 5001, 11),
(412, 5001, 37),
(413, 5001, 40),
(414, 5001, 29),
(415, 5001, 40),
(416, 5245, 39),
(417, 5245, 37),
(418, 5245, 8),
(419, 5245, 11),
(420, 5245, 2),
(421, 5245, 7),
(422, 5245, 15),
(424, 5245, 37),
(425, 5245, 37),
(426, 5245, 37),
(427, 5245, 11),
(428, 5245, 42),
(429, 5245, 39),
(430, 5245, 36),
(431, 5245, 36),
(432, 5245, 10),
(433, 5245, 40),
(434, 5245, 29),
(435, 5245, 23),
(436, 5245, 6),
(437, 5245, 14),
(438, 52456, 5),
(439, 52456, 6),
(440, 52456, 31),
(441, 52456, 36),
(442, 52456, 37),
(443, 52456, 5),
(444, 52456, 8),
(446, 52456, 18),
(448, 52456, 9),
(449, 52456, 26),
(451, 52456, 31),
(452, 52456, 40),
(453, 52456, 42),
(454, 52456, 27),
(455, 52456, 4),
(456, 52456, 10),
(457, 52456, 36),
(458, 52456, 39),
(459, 24317, 29),
(460, 24317, 4),
(461, 71519, 3),
(462, 71519, 25),
(463, 71519, 10),
(464, 71519, 42),
(465, 31160, 8),
(466, 31160, 8),
(467, 31160, 20),
(468, 31160, 40),
(469, 31160, 39),
(470, 31160, 37);

-- --------------------------------------------------------

--
-- Table structure for table `pricing`
--

CREATE TABLE `pricing` (
  `pid` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `cgst` float NOT NULL DEFAULT 2,
  `sgst` float NOT NULL DEFAULT 2,
  `igst` float NOT NULL DEFAULT 2,
  `utgst` float NOT NULL DEFAULT 3.5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pricing`
--

INSERT INTO `pricing` (`pid`, `pname`, `price`, `cgst`, `sgst`, `igst`, `utgst`) VALUES
(2, 'The trial-Franz Kafka', 399.99, 6, 6, 2, 3),
(3, 'The wind up bird chronicle -Haruki Murakami (a summation of all the murakami elments hence the best ', 295, 2.5, 2.5, 2, 3),
(4, 'Siddhartha -Herman Hesse', 99.99, 2.5, 3, 2, 3),
(5, 'On earth we\'re briefly gorgeous -Ocean Voung(first novel of voung is as poetically written as his ot', 299.99, 2, 4, 3, 1),
(6, 'Animal farm- George Orwell(witty analogy artful sattire one of the best war genre writer)', 95, 2.5, 0.3, 2, 3),
(7, 'The Da Vinci code-Dan Brown', 295, 2.5, 3, 2, 3.5),
(8, 'The witch of portobello- Paulo Coelho', 299, 2.5, 3, 2, 3.5),
(9, 'What I talk About when I talk about running- Haruki Murakami', 400, 2, 2, 2, 3.5),
(10, 'Kafka on the shore- Haruki Murakami', 300, 2, 2, 2, 3.5),
(11, 'The catcher in the rye- JD Salinger', 270, 2, 2, 2, 3.5),
(14, 'The great Gatsby- F.Scott Fitzgerald(known for being the great american novella)', 100, 2, 2, 2, 3.5),
(15, 'Moby Dick or The whale- Herman Malville', 200, 2, 2, 2, 3.5),
(16, 'A story that ends happily -Aastha Singh', 199.99, 6, 6, 2, 3),
(17, 'My year of rest and relaxation- Otessa Moshfegh', 400, 2, 2, 2, 3.5),
(18, 'The picture of Dorian Grey- Oscar Wilde(classic proficiently flawless writing)', 200, 2, 2, 2, 3.5),
(19, 'A room of one\'s own- Virginia Woolf', 220, 2, 2, 2, 3.5),
(20, 'To the lighthouse -Virginia Woolf', 100, 2, 2, 2, 3.5),
(22, 'Why I am an Athiest- Bhagat Singh', 100, 2, 2, 2, 3.5),
(23, 'A thousand splendid suns -Kahlil Gibran(3rd book of Kahlil, disappointing as compared to the other 2', 300, 2, 2, 2, 3.5),
(25, 'The Midnight\'s children- Salman Rushdie', 200, 2, 2, 2, 3.5),
(26, 'The myth of Sisyphus- Albert Camus', 300, 2, 2, 2, 3.5),
(27, 'Crime and Punishment- Fyodor Dostoevsky', 200, 2, 2, 2, 3.5),
(29, 'Letters to Milena- Franz Kafka', 300, 2, 2, 2, 3.5),
(31, 'Wild sheep chase- Haruki Murakami(third and final of the rat trilogy,prolly the best too.)', 300, 2, 2, 2, 3.5),
(36, 'The adventures of Huckleberyy Finn- Mark Twain', 300, 2, 2, 2, 3.5),
(37, 'The adventures of Tom Sawyer- Mark Twain', 200, 2, 2, 2, 3.5),
(39, 'Beyond good and evil- Friedrich Nietztsche(the author of God is dead we killed him)', 200, 2, 2, 2, 3.5),
(40, 'A curious case of Benjamin Buttons- F.Scott Fitzgerald(one of the best short classic)', 100, 2, 2, 2, 3.5),
(42, 'Wuthering Heights- Emily Bronte(the only novel of Bronte)', 100, 2, 2, 2, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `sno.` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `pname` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`sno.`, `cid`, `pname`) VALUES
(2, 2, 'The trial'),
(3, 3, 'The trial'),
(4, 1, 'A story with \"The happy ending\"'),
(5, 2, 'A story with \"The happy ending\"'),
(6, 3, 'A story with \"The happy ending\"'),
(7, 1, 'The wind up bird chronicle'),
(9, 2, 'The wind up bird chronicle'),
(10, 3, 'The wind up bird chronicle');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`sno.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=555526;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `pricing`
--
ALTER TABLE `pricing`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `sno.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
