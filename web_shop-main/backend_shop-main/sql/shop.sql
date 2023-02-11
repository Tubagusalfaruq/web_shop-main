-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2023 at 05:54 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` varchar(20) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `image`, `name`, `description`) VALUES
('N-001', 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/0347d890-b837-475f-a1eb-850d09e7bd28/air-force-1-07-shoes-x9rqBh.png', 'Nike Air Force 1 \'07 Premium', 'Step into new beginnings with a fresh pair of sneakers. We gave our legendary AF-1 a new look just in time for the Lunar New Year. Soft suede and French terry add rich texture to a smooth leather upper while a subtle, tonal colour adds visual dimension. Vibrant embroidered Swoosh logos draw inspiration from swift and agile rabbits to commemorate the Year of the Rabbit along with woven tongue labels and marbled shoelace beads.'),
('N-002', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/3951434f-4fa7-47e4-97c1-3f2c8b237277/air-more-uptempo-96-mens-shoes-zpkSSs.png', 'Nike Air More Uptempo \'96', 'How do you make an icon even better? Unleash its wild side. A medley of animal prints lends new energy and power to the Nike Air More Uptempo \'96, while Max Air units in the forefoot, midfoot and heel give you unmistakable cushioning. With its distinctive \'90s graffiti-style branding, there\'s no way you\'ll blend into the crowd with these kicks.'),
('N-003', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/0976169b-51e4-44d7-91cd-b3b1bc76e37b/air-max-90-ltr-older-shoes-M0TsXt.png', 'Nike Air Max 90 LTR', 'The Air Max 90 returns with an even better feel for you. Cushioning is softer and more flexible than previous versions, the Max Air unit is tuned for growing feet and the shape gives your toes more wiggle room. With a design and look that are still the same, it brings a \'90s fave to a new generation.'),
('N-004', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/d3466888-3c64-4c14-b608-15633aab04f7/air-force-1-07-womens-shoes-3T7wkL.png', 'Nike Air Force 1 \'07', 'Designed for those who aren\'t afraid to express themselves, this legendary AF1 is all about making a statement. A crisp leather upper and era-echoing \'80s construction give these sneakers a classic feel while vibrant gradient colors add nothing-but-net style. Of course, we kept the Nike Air units underfoot to help keep every step you take comfortable. Are you ready to get creative with your look?'),
('N-005', 'https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/834538c2-bb65-44e7-9186-8d3a42d7d654/sb-zoom-nyjah-3-skate-shoes-wk7V8x.png', 'Nike SB Zoom Nyjah 3', 'Light. Effortless. On point. The Nyjah 3 delivers the next iteration of the skate shoe that\'s as extraordinary as Nyjah. Zoom Air cushioning pairs with a honeycomb outsole that\'s grippy yet featherlight.'),
('test', 'https://cdn3.tstatic.net/jualbeli/img/2022/9/2520388/1-1030764121-Sepatu-Sneakers-Nike-Air-Jordan-1-High-Black-Gym-Red-US-3-5Y---EUR-35-5-VNDS-Fullset---Bogor.jpg', 'adsasd', 'sepatu asal asalan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
