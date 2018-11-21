-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2018 at 06:05 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tubes1-wbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `bookID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `bookPicture` varchar(255) NOT NULL,
  `synopsis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`bookID`, `title`, `author`, `bookPicture`, `synopsis`) VALUES
(1, 'LennoNYC', 'Vita Setterfield', 'http://dummyimage.com/106x121.png/5fa2dd/ffffff', 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.'),
(2, 'Butterflies Have No Memories', 'Madison Astles', 'http://dummyimage.com/192x134.bmp/cc0000/ffffff', 'Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.'),
(3, 'Sierra, La', 'Clio Fessler', 'http://dummyimage.com/207x149.jpg/5fa2dd/ffffff', 'Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis.'),
(4, 'Coco Chanel & Igor Stravinsky', 'Elke Wagen', 'http://dummyimage.com/181x185.png/dddddd/000000', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh.'),
(5, 'All American Chump', 'Kassi Cyson', 'http://dummyimage.com/217x155.jpg/ff4444/ffffff', 'Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.'),
(6, 'Even the Rain (También la lluvia)', 'Sasha Stanman', 'http://dummyimage.com/190x219.png/ff4444/ffffff', 'Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum.'),
(7, 'Jeremy', 'Kippy Longea', 'http://dummyimage.com/110x184.png/ff4444/ffffff', 'In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti.'),
(8, 'McQ', 'Hayward Durtnall', 'http://dummyimage.com/132x220.jpg/5fa2dd/ffffff', 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.'),
(9, 'Michael Shayne: Private Detective', 'Martha Saladino', 'http://dummyimage.com/159x196.jpg/cc0000/ffffff', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo.'),
(10, 'Detroit 9000', 'Beatrix Benning', 'http://dummyimage.com/183x242.png/cc0000/ffffff', 'Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis.'),
(11, 'Fire Down Below', 'Reynolds Howorth', 'http://dummyimage.com/101x134.jpg/5fa2dd/ffffff', 'Pellentesque at nulla. Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien.'),
(12, 'Potiche', 'Terrence Pryor', 'http://dummyimage.com/246x222.png/dddddd/000000', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.'),
(13, 'Grudge 3, The', 'Siobhan Colicot', 'http://dummyimage.com/147x144.png/ff4444/ffffff', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.'),
(14, 'Jails, Hospitals & Hip-Hop', 'Dewain Ackerman', 'http://dummyimage.com/183x208.png/5fa2dd/ffffff', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat.'),
(15, 'Snakes and Earrings (Hebi ni piasu)', 'Jacinda Dranfield', 'http://dummyimage.com/142x163.bmp/cc0000/ffffff', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.'),
(16, 'Dying Young', 'Emery Sabattier', 'http://dummyimage.com/212x214.png/dddddd/000000', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula.'),
(17, 'Prêt à tout', 'Conrade MacSween', 'http://dummyimage.com/210x244.bmp/ff4444/ffffff', 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.'),
(18, 'Shadows of Liberty ', 'Naoma O\'Hearn', 'http://dummyimage.com/230x220.bmp/ff4444/ffffff', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.'),
(19, 'Pan Tadeusz: The Last Foray in Lithuania (Pan Tadeusz)', 'Barthel Pidon', 'http://dummyimage.com/130x225.png/ff4444/ffffff', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum.'),
(20, 'Rare Exports: A Christmas Tale (Rare Exports)', 'Adey Egginton', 'http://dummyimage.com/152x155.png/ff4444/ffffff', 'Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.'),
(21, 'Halloween', 'Elise Chomicz', 'http://dummyimage.com/114x160.bmp/cc0000/ffffff', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.'),
(22, '23 Paces to Baker Street', 'Kali Worsnop', 'http://dummyimage.com/192x187.bmp/ff4444/ffffff', 'Suspendisse potenti. Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.'),
(23, 'Trick', 'Maynord Oliva', 'http://dummyimage.com/136x175.bmp/ff4444/ffffff', 'Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem.'),
(24, 'Cat\'s-Paw, The', 'Annie Lerohan', 'http://dummyimage.com/110x241.jpg/cc0000/ffffff', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.'),
(25, 'Darkness', 'Imojean Lancett', 'http://dummyimage.com/179x187.bmp/ff4444/ffffff', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat.'),
(26, 'The Wind in the Willows', 'Kim Lyenyng', 'http://dummyimage.com/162x116.jpg/dddddd/000000', 'Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.'),
(27, 'Stephanie Daley', 'Mikel MacCarrick', 'http://dummyimage.com/219x106.jpg/dddddd/000000', 'Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.'),
(28, 'Burial Ground (a.k.a. Zombie Horror) (a.k.a. Zombie 3) (Notti del Terrore, Le)', 'Shaine Gormley', 'http://dummyimage.com/127x249.png/ff4444/ffffff', 'Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis. Donec semper sapien a libero.'),
(29, 'Helsinki Napoli All Night Long', 'Ruthe Hayhow', 'http://dummyimage.com/169x128.bmp/cc0000/ffffff', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.'),
(30, 'Watch the Birdie', 'Gwenora Vigours', 'http://dummyimage.com/106x158.png/dddddd/000000', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.'),
(31, 'Abbott and Costello Meet Frankenstein', 'Meredith Dorrington', 'http://dummyimage.com/191x231.bmp/5fa2dd/ffffff', 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem.'),
(32, 'Chosin ', 'Stesha Kitter', 'http://dummyimage.com/158x127.png/dddddd/000000', 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.'),
(33, 'Get Carter', 'Lavinia Prichet', 'http://dummyimage.com/233x171.jpg/ff4444/ffffff', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.'),
(34, 'Nobody Walks', 'Adelaide Bottrell', 'http://dummyimage.com/105x245.jpg/ff4444/ffffff', 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat.'),
(35, 'Ladder 49', 'Bartlet Kerbler', 'http://dummyimage.com/159x146.png/dddddd/000000', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.'),
(36, 'Adventures of Arsène Lupin, The (Aventures d\'Arsène Lupin, Les)', 'Brooke Gaiter', 'http://dummyimage.com/192x127.png/cc0000/ffffff', 'In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst. Etiam faucibus cursus urna.'),
(37, 'Company Man', 'Nathanael Cordelle', 'http://dummyimage.com/228x103.jpg/dddddd/000000', 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec pharetra, magna vestibulum aliquet ultrices, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi. Integer ac neque. Duis bibendum.'),
(38, 'White Christmas', 'Leonhard Barthelet', 'http://dummyimage.com/192x218.png/dddddd/000000', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla.'),
(39, 'School Daze', 'Patrice Hambrick', 'http://dummyimage.com/100x181.png/5fa2dd/ffffff', 'Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.'),
(40, 'I Don\'t Want to Be a Man (Ich möchte kein Mann sein)', 'Reeta Caves', 'http://dummyimage.com/168x126.png/cc0000/ffffff', 'Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue.'),
(41, 'Allnighter, The', 'Sisile Le Blanc', 'http://dummyimage.com/110x141.png/dddddd/000000', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque.'),
(42, 'Jungle Fighters', 'Neale Francesch', 'http://dummyimage.com/111x246.bmp/5fa2dd/ffffff', 'Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst.'),
(43, 'Aral, Fishing in an Invisible Sea', 'Naoma Pendock', 'http://dummyimage.com/222x181.jpg/dddddd/000000', 'Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.'),
(44, 'Innocence', 'Josy Mackley', 'http://dummyimage.com/139x138.png/cc0000/ffffff', 'Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum.'),
(45, 'Crime Spree', 'Mickey Caldow', 'http://dummyimage.com/116x104.png/5fa2dd/ffffff', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat.'),
(46, 'Nine Queens (Nueve reinas)', 'Emelyne MacLeese', 'http://dummyimage.com/168x100.png/cc0000/ffffff', 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.'),
(47, 'Täynnä Tarmoa', 'Nolana Goering', 'http://dummyimage.com/151x129.jpg/cc0000/ffffff', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat.'),
(48, 'Not Suitable for Children', 'Lonee Kildale', 'http://dummyimage.com/236x157.jpg/5fa2dd/ffffff', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.'),
(49, 'Lion of the Desert', 'Nicol Sainteau', 'http://dummyimage.com/202x130.bmp/cc0000/ffffff', 'Sed ante. Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis.'),
(50, 'Enemy at the Gates', 'Valida Rumsby', 'http://dummyimage.com/192x204.bmp/ff4444/ffffff', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `bookID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `bookID`, `userID`, `quantity`, `date`) VALUES
(1, 5, 1, 14, '2018-05-30 00:00:00'),
(2, 4, 2, 11, '2018-05-28 00:00:00'),
(3, 3, 3, 12, '2018-04-27 00:00:00'),
(4, 2, 4, 20, '2017-12-16 00:00:00'),
(5, 1, 5, 16, '2017-12-14 00:00:00'),
(6, 6, 6, 17, '2018-04-08 00:00:00'),
(7, 7, 7, 17, '2018-09-02 00:00:00'),
(8, 8, 8, 12, '2018-08-17 00:00:00'),
(9, 9, 9, 4, '2018-05-08 00:00:00'),
(10, 10, 10, 6, '2018-01-14 00:00:00'),
(11, 11, 11, 14, '2018-09-03 00:00:00'),
(12, 12, 12, 9, '2018-03-02 00:00:00'),
(13, 13, 13, 19, '2018-05-28 00:00:00'),
(14, 14, 14, 18, '2018-02-12 00:00:00'),
(15, 15, 15, 13, '2017-12-08 00:00:00'),
(16, 16, 16, 11, '2018-02-21 00:00:00'),
(17, 17, 17, 19, '2018-10-02 00:00:00'),
(18, 18, 18, 9, '2017-12-28 00:00:00'),
(19, 19, 19, 13, '2018-07-22 00:00:00'),
(20, 20, 20, 19, '2018-04-01 00:00:00'),
(21, 21, 1, 14, '2017-12-23 00:00:00'),
(22, 22, 2, 18, '2018-10-10 00:00:00'),
(23, 23, 3, 19, '2018-06-07 00:00:00'),
(24, 24, 4, 20, '2017-12-22 00:00:00'),
(25, 25, 5, 7, '2018-03-16 00:00:00'),
(26, 26, 6, 5, '2017-12-24 00:00:00'),
(27, 27, 7, 20, '2018-07-24 00:00:00'),
(28, 28, 8, 11, '2018-09-18 00:00:00'),
(29, 29, 9, 9, '2018-07-03 00:00:00'),
(30, 30, 10, 6, '2018-04-17 00:00:00'),
(31, 31, 11, 2, '2018-05-18 00:00:00'),
(32, 32, 12, 20, '2018-09-03 00:00:00'),
(33, 33, 13, 16, '2017-12-29 00:00:00'),
(34, 34, 14, 13, '2017-11-13 00:00:00'),
(35, 35, 15, 3, '2018-03-18 00:00:00'),
(36, 36, 16, 3, '2018-06-09 00:00:00'),
(37, 37, 17, 19, '2017-12-04 00:00:00'),
(38, 38, 18, 1, '2017-10-23 00:00:00'),
(39, 39, 19, 14, '2018-07-29 00:00:00'),
(40, 40, 20, 11, '2018-06-24 00:00:00'),
(41, 41, 1, 17, '2018-08-20 00:00:00'),
(42, 42, 2, 6, '2018-09-26 00:00:00'),
(43, 43, 3, 6, '2017-11-10 00:00:00'),
(44, 44, 4, 11, '2018-10-10 00:00:00'),
(45, 45, 5, 19, '2018-04-13 00:00:00'),
(46, 46, 6, 8, '2018-01-09 00:00:00'),
(47, 47, 7, 1, '2018-01-17 00:00:00'),
(48, 48, 8, 12, '2017-12-11 00:00:00'),
(49, 49, 9, 20, '2018-08-26 00:00:00'),
(50, 50, 10, 19, '2018-04-12 00:00:00'),
(51, 5, 11, 13, '2018-07-09 00:00:00'),
(52, 4, 12, 16, '2018-01-21 00:00:00'),
(53, 3, 13, 15, '2018-03-27 00:00:00'),
(54, 2, 14, 11, '2018-04-20 00:00:00'),
(55, 1, 15, 18, '2017-11-17 00:00:00'),
(56, 6, 16, 20, '2018-03-22 00:00:00'),
(57, 7, 17, 20, '2018-04-06 00:00:00'),
(58, 8, 18, 2, '2018-01-16 00:00:00'),
(59, 9, 19, 10, '2018-01-14 00:00:00'),
(60, 10, 20, 5, '2017-11-05 00:00:00'),
(61, 11, 1, 1, '2017-10-19 00:00:00'),
(62, 12, 2, 19, '2018-04-26 00:00:00'),
(63, 13, 3, 2, '2017-12-27 00:00:00'),
(64, 14, 4, 16, '2018-05-30 00:00:00'),
(65, 15, 5, 1, '2018-06-21 00:00:00'),
(66, 16, 6, 10, '2017-11-12 00:00:00'),
(67, 17, 7, 13, '2018-04-14 00:00:00'),
(68, 18, 8, 11, '2018-10-03 00:00:00'),
(69, 19, 9, 4, '2018-08-01 00:00:00'),
(70, 20, 10, 12, '2018-08-25 00:00:00'),
(71, 21, 11, 14, '2018-03-11 00:00:00'),
(72, 22, 12, 6, '2018-02-27 00:00:00'),
(73, 23, 13, 18, '2018-06-25 00:00:00'),
(74, 24, 14, 14, '2018-06-03 00:00:00'),
(75, 25, 15, 19, '2018-04-27 00:00:00'),
(76, 26, 16, 6, '2018-05-07 00:00:00'),
(77, 27, 17, 8, '2018-06-01 00:00:00'),
(78, 28, 18, 3, '2018-03-27 00:00:00'),
(79, 29, 19, 5, '2018-07-09 00:00:00'),
(80, 30, 20, 14, '2017-10-20 00:00:00'),
(81, 31, 1, 14, '2018-01-30 00:00:00'),
(82, 32, 2, 15, '2018-04-10 00:00:00'),
(83, 33, 3, 1, '2018-01-06 00:00:00'),
(84, 34, 4, 6, '2018-03-25 00:00:00'),
(85, 35, 5, 14, '2018-10-13 00:00:00'),
(86, 36, 6, 15, '2018-03-26 00:00:00'),
(87, 37, 7, 14, '2018-09-07 00:00:00'),
(88, 38, 8, 6, '2018-02-07 00:00:00'),
(89, 39, 9, 10, '2018-09-25 00:00:00'),
(90, 40, 10, 15, '2018-08-05 00:00:00'),
(91, 41, 11, 16, '2017-12-30 00:00:00'),
(92, 42, 12, 10, '2018-10-06 00:00:00'),
(93, 43, 13, 16, '2017-10-24 00:00:00'),
(94, 44, 14, 14, '2018-04-10 00:00:00'),
(95, 45, 15, 4, '2018-03-07 00:00:00'),
(96, 46, 16, 5, '2018-01-25 00:00:00'),
(97, 47, 17, 2, '2018-05-17 00:00:00'),
(98, 48, 18, 1, '2018-09-24 00:00:00'),
(99, 49, 19, 5, '2018-06-18 00:00:00'),
(100, 50, 20, 4, '2017-12-08 00:00:00'),
(102, 2, 27, 4, '2018-10-25 00:00:00'),
(103, 2, 27, 3, '2018-10-25 00:00:00'),
(104, 2, 27, 6, '2018-10-25 00:00:00'),
(105, 7, 27, 8, '2018-10-26 00:00:00'),
(106, 14, 27, 1, '2018-10-26 00:00:00'),
(107, 2, 28, 6, '2018-10-26 00:00:00'),
(108, 2, 27, 10, '2018-10-26 00:00:00'),
(109, 3, 27, 1, '2018-10-26 00:00:00'),
(110, 49, 27, 5, '2018-10-26 17:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `comment` varchar(255) DEFAULT NULL,
  `rating` int(5) DEFAULT NULL,
  `orderID` int(11) NOT NULL,
  `reviewID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`comment`, `rating`, `orderID`, `reviewID`) VALUES
('Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh.', 3, 1, 1),
('Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 2, 2, 2),
('Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo.', 3, 2, 3),
('Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', 2, 2, 4),
('Curabitur gravida nisi at nibh. In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.', 3, 3, 5),
('Fusce consequat. Nulla nisl. Nunc nisl.', 5, 3, 6),
('Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus.', 5, 4, 7),
('Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum.', 1, 5, 8),
('Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', 5, 6, 9),
('Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', 1, 7, 10),
('Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', 1, 8, 11),
('Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 4, 9, 12),
('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin risus. Praesent lectus.', 2, 9, 13),
('Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', 4, 9, 14),
('Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', 2, 10, 15),
('Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh.', 2, 11, 16),
('Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis.', 4, 12, 17),
('Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 1, 13, 18),
('Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 3, 14, 20),
('Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat.', 1, 15, 21),
('Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.', 4, 16, 22),
('Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy.', 3, 17, 23),
('Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus.', 2, 0, 26),
(NULL, NULL, 0, 27),
(NULL, NULL, 0, 28),
('Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue.', 5, 0, 29),
('Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus.', 3, 0, 30),
('Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst.', 2, 0, 31),
('Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 3, 0, 32),
('Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', 1, 0, 33),
('Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue. Vestibulum rutrum rutrum neque.', 5, 0, 34),
('Vestibulum ac est lacinia nisi venenatis tristique.', 3, 0, 35),
(NULL, NULL, 0, 36),
('Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis.', 4, 0, 37),
('Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante.', 1, 0, 38),
('Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum.', 5, 0, 39),
('Orci luctus et ultrices posuere cubilia Curae; Donec pharetra, erat tortor sollicitudin mi, sit amet lobortis sapien sapien non mi.', 1, 0, 40),
(NULL, NULL, 0, 41),
('Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 2, 0, 42),
('Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend.', 4, 0, 43),
('Sed ante. Vivamus tortor. Duis mattis egestas metus.', 4, 0, 44),
('Phasellus in felis. Donec semper sapien a libero. Nam dui.', 2, 0, 45),
(NULL, NULL, 0, 46),
(NULL, NULL, 0, 47),
('In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl.', 1, 0, 48),
('Duis bibendum. Morbi non quam nec dui luctus rutrum. Nulla tellus.', 4, 0, 49),
(NULL, NULL, 0, 50),
('Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque.', 5, 0, 51),
('Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum.', 5, 0, 52),
('Nullam varius. Nulla facilisi. Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit.', 1, 0, 53),
('Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 5, 0, 54),
(NULL, NULL, 0, 55),
('Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 5, 0, 56),
('Etiam vel augue. Vestibulum rutrum rutrum neque. Aenean auctor gravida sem.', 1, 0, 57),
('Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus.', 4, 0, 58),
('Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 3, 0, 59),
(NULL, NULL, 0, 60),
(NULL, NULL, 0, 61),
('Etiam faucibus cursus urna. Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius.', 2, 0, 62),
(NULL, NULL, 0, 63),
('Posuere cubilia Curae; Nulla dapibus dolor vel est.', 3, 0, 64),
(NULL, NULL, 0, 65),
(NULL, NULL, 0, 66),
('Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', 3, 0, 67),
('Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', 2, 0, 68),
('In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', 2, 0, 69),
(NULL, NULL, 0, 70),
('Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', 2, 0, 71),
('Suspendisse accumsan tortor quis turpis. Sed ante. Vivamus tortor. Duis mattis egestas metus.', 3, 0, 72),
('Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 3, 0, 73),
('Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 5, 0, 74),
('Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', 1, 0, 75),
('Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla.', 5, 0, 76),
('Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.', 4, 0, 77),
('Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus.', 2, 0, 78),
('Aenean lectus. Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum.', 1, 0, 79),
(NULL, NULL, 0, 80),
('Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris.', 4, 0, 81),
(NULL, NULL, 0, 82),
('Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus. In est risus, auctor sed, tristique in, tempus sit amet, sem.', 2, 0, 83),
(NULL, NULL, 0, 84),
('Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa.', 4, 0, 85),
(NULL, NULL, 0, 86),
('Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', 3, 0, 87),
('Ae Mauris viverra diam vitae quam.', 5, 0, 88),
('Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.', 4, 0, 89),
('Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum. Integer a nibh.', 4, 0, 90),
('asdasd', 4, 105, 91),
('mantap gan', 3, 106, 92),
('test', 4, 102, 93),
('bagus gan', 5, 110, 94);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `userPicture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `name`, `username`, `address`, `password`, `email`, `phone`, `userPicture`) VALUES
(1, 'Amberly Sandiland', 'asandiland0', '603 Hintze Pass', 'byAqRIsdHg', 'asandiland0@godaddy.com', '(688) 7366244', 'http://dummyimage.com/144x193.jpg/ff4444/ffffff'),
(2, 'Sapphire Akred', 'sakred1', '048 Kingsford Crossing', 'tXiCeN', 'sakred1@archive.org', '(245) 2946688', 'http://dummyimage.com/178x197.png/5fa2dd/ffffff'),
(3, 'Tadeas Simonutti', 'tsimonutti2', '85 Sherman Court', 'jaVnglguhPld', 'tsimonutti2@europa.eu', '(422) 7543260', 'http://dummyimage.com/225x109.png/5fa2dd/ffffff'),
(4, 'Judon Waycot', 'jwaycot3', '744 Briar Crest Way', 'azsZP2', 'jwaycot3@deliciousdays.com', '(621) 6554440', 'http://dummyimage.com/235x194.jpg/cc0000/ffffff'),
(5, 'Stormie Wiffen', 'swiffen4', '8123 Birchwood Plaza', '4coXBrH', 'swiffen4@washington.edu', '(203) 5803114', 'http://dummyimage.com/135x187.bmp/ff4444/ffffff'),
(6, 'Craggie Clamo', 'cclamo5', '7367 Maywood Trail', 'Nktephp', 'cclamo5@omniture.com', '(444) 5085922', 'http://dummyimage.com/179x117.png/ff4444/ffffff'),
(7, 'Corabella Gethen', 'cgethen6', '70021 Londonderry Avenue', 'u8P2DPw', 'cgethen6@list-manage.com', '(111) 3851271', 'http://dummyimage.com/146x165.png/cc0000/ffffff'),
(8, 'Myrvyn Pierucci', 'mpierucci7', '74658 Algoma Point', 'JBs2QDhMAx', 'mpierucci7@aol.com', '(267) 9770184', 'http://dummyimage.com/210x217.png/5fa2dd/ffffff'),
(9, 'Babette Persian', 'bpersian8', '9916 Dwight Crossing', 'oNYUsn', 'bpersian8@hexun.com', '(569) 4499979', 'http://dummyimage.com/136x128.png/ff4444/ffffff'),
(10, 'Kelley Milvarnie', 'kmilvarnie9', '838 Nova Hill', 'ZYgktjO4', 'kmilvarnie9@t-online.de', '(538) 1984737', 'http://dummyimage.com/186x117.bmp/5fa2dd/ffffff'),
(11, 'Reggie Jahndel', 'rjahndela', '4 Gateway Parkway', 'BZW42FlDy93u', 'rjahndela@hc360.com', '(221) 4963436', 'http://dummyimage.com/131x146.png/5fa2dd/ffffff'),
(12, 'Guinna O\'Hallagan', 'gohallaganb', '8 Ohio Circle', '8SComJN2w', 'gohallaganb@constantcontact.com', '(326) 6095731', 'http://dummyimage.com/132x199.png/ff4444/ffffff'),
(13, 'Nerte Franzewitch', 'nfranzewitchc', '83258 Knutson Trail', 'OdIQVeQQHU', 'nfranzewitchc@parallels.com', '(431) 7577865', 'http://dummyimage.com/141x211.bmp/ff4444/ffffff'),
(14, 'Kerwin Pyke', 'kpyked', '74 Marquette Pass', '9bYLI03E', 'kpyked@simplemachines.org', '(725) 5387808', 'http://dummyimage.com/226x249.bmp/5fa2dd/ffffff'),
(15, 'Cristian McCarthy', 'cmccarthye', '2376 Corscot Park', 'qNp3v1I', 'cmccarthye@stumbleupon.com', '(514) 9765412', 'http://dummyimage.com/172x108.png/dddddd/000000'),
(16, 'Lauree Stailey', 'lstaileyf', '58346 Rutledge Parkway', 'tNVHAfsSB1', 'lstaileyf@github.com', '(313) 4215075', 'http://dummyimage.com/107x102.png/dddddd/000000'),
(17, 'Linda Steel', 'lsteelg', '432 Scoville Pass', 'zQIbolKXjnf', 'lsteelg@instagram.com', '(393) 3451576', 'http://dummyimage.com/106x221.png/cc0000/ffffff'),
(18, 'Dorree Birrell', 'dbirrellh', '33 Golf View Pass', 'e9dhAGCNMb', 'dbirrellh@qq.com', '(452) 1156701', 'http://dummyimage.com/202x154.bmp/dddddd/000000'),
(19, 'Mariel Skelington', 'mskelingtoni', '76409 Shopko Center', 'YIQZlL', 'mskelingtoni@biglobe.ne.jp', '(544) 1919212', 'http://dummyimage.com/204x141.jpg/5fa2dd/ffffff'),
(20, 'Lilla Gerding', 'lgerdingj', '30095 Dryden Lane', '0KXI0Df9', 'lgerdingj@google.es', '(102) 1977720', 'http://dummyimage.com/109x235.bmp/5fa2dd/ffffff'),
(21, 'priagung', 'priagung', 'askdlfjdj', '', 'priagungs@gmail.com', '8675758283', NULL),
(23, 'mamat', 'mamat', 'mmamammama', '$2y$10$NaZ6WCGqhsrmXo3VGW7IQOGTlyfaO94giPCqosHkpzQm/M4ROX8A2', 'mamat@mm.tma', '081029381082', NULL),
(24, 'priagung', 'priagungs', 'asdfasdfasdf', '$2y$10$ODyFDHRC8hE0SnvKVEEnVeK/MHinRSFWckchZoZmjhfMJp8osvF2m', 'priagung@ndfasdf.cvadf', '08123182312', NULL),
(25, 'Priagung Satyagama', 'priagungsatyagama', 'bandung', '$2y$10$TGjOp7zK8Q73epvgKXiocOmU/9LAf.4wgZcjrM7u6jV4vpeaFPfk2', 'priagungsatyagama@gmail.com', '08561229561', NULL),
(26, 'Priagung Satyagama', 'gungmaster', 'bandung', '$2y$10$saBsfR8XrRjnPHy6F3.9iepoGedvrqndd5D7bGn6MJCdri34irPP.', 'priagungsatyagama@gmai.co', '08561229561', NULL),
(27, 'Priagung Satyagama', 'agung', 'bandung', '$2y$10$vGkH88F0m2IELcUcbtyn9uNcRtcSeyM6T.aZxt8DI6azYao0mn8mO', 'asd@asdf.co', '0812381281', '../../public/images/profile/27'),
(28, 'bambang', 'dadang', 'dadang', '$2y$10$A29UVvywvNTayNp.VLFtCu0mPwo1edVFYCfBR5xhrSXh7K9072Xpe', 'dadang@gmai.lcom', '0812381238', '../../public/images/profile/28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`bookID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `fk_orders_bookID_book_bookID` (`bookID`),
  ADD KEY `fk_orders_userID_user_userID` (`userID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`reviewID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`bookID`) REFERENCES `book` (`bookID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
