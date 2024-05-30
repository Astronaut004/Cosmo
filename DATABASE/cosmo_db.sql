-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 29, 2024 at 07:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cosmo_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `astro_tb`
--

CREATE TABLE `astro_tb` (
  `user_id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `astro_tb`
--

INSERT INTO `astro_tb` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'Kaju', '123', 'kaju@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `document_tb`
--

CREATE TABLE `document_tb` (
  `document_id` int(3) NOT NULL,
  `document_name` varchar(50) NOT NULL,
  `author_name` varchar(50) NOT NULL,
  `image_name` varchar(80) NOT NULL,
  `document_desc` varchar(1500) NOT NULL,
  `document_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document_tb`
--

INSERT INTO `document_tb` (`document_id`, `document_name`, `author_name`, `image_name`, `document_desc`, `document_type`) VALUES
(1, 'Albert Einstein', 'Aryan Chauhan', '../image/albert.jpg', 'Albert Einstein, the preeminent physicist of the 20th century, revolutionized our understanding of the universe. Born in Ulm, Germany, in 1879, Einstein\'s groundbreaking work in theoretical physics reshaped the way we perceive space, time, and gravity. His theory of relativity, introduced in 1905, challenged Newtonian mechanics and laid the foundation for modern physics.\r\n\r\nBeyond his scientific contributions, Einstein was a passionate advocate for peace, human rights, and social justice. He spoke out against war, fascism, and discrimination, using his platform to promote global cooperation and understanding.\r\n\r\nEinstein\'s legacy extends far beyond academia; his name has become synonymous with genius and intellectual curiosity. He received the Nobel Prize in Physics in 1921 for his discovery of the photoelectric effect, yet his influence transcends any single achievement. Einstein\'s insatiable curiosity and relentless pursuit of truth continue to inspire scientists, thinkers, and dreamers worldwide, reminding us that with imagination and perseverance, we can unlock the mysteries of the universe.', 'Biography'),
(2, 'Big Bang', 'Alex', '../image/string.jpeg', 'String theory, a theoretical framework in physics, suggests that fundamental particles are not point-like but instead tiny, vibrating strings. These strings can vibrate at different frequencies, giving rise to various particles and forces observed in the universe. String theory attempts to unify all fundamental forces of nature, including gravity, electromagnetism, and the strong and weak nuclear forces, into a single theoretical framework. It offers a promising avenue for reconciling quantum mechanics with general relativity, addressing some of the deepest mysteries in physics, such as the nature of black holes and the beginning of the universe. Despite its mathematical elegance and potential, string theory remains speculative and has yet to make testable predictions, leading to ongoing debates within the scientific community about its validity and significance in understanding the fundamental nature of reality.', 'Theory'),
(3, 'Mars Colonization', 'Kaju', '../image/mars22.webp', 'Mars colonization represents humanity\'s ambitious endeavor to establish a sustainable presence on the Red Planet. Propelled by scientific curiosity, the quest for extraterrestrial life, and the pursuit of interplanetary exploration, various space agencies and private entities have set their sights on Mars. This monumental endeavor involves overcoming immense challenges, including long-duration space travel, radiation exposure, and the development of life-support systems. Potential benefits include expanding the boundaries of human civilization, conducting groundbreaking scientific research, and safeguarding against existential risks to humanity. However, Mars colonization also poses ethical, environmental, and socio-political considerations, such as planetary protection, resource allocation, and international cooperation. Despite the formidable obstacles ahead, the prospect of humans setting foot on Mars symbolizes our unwavering spirit of exploration and our collective ambition to reach beyond the confines of Earth, expanding our horizons and inspiring future generations to push the boundaries of what is possible.', 'Mission');

-- --------------------------------------------------------

--
-- Table structure for table `mission_tb`
--

CREATE TABLE `mission_tb` (
  `mission_id` int(11) NOT NULL,
  `mission_name` varchar(30) NOT NULL,
  `mission_description` varchar(1500) NOT NULL,
  `mission_img` varchar(150) NOT NULL,
  `mission_timeStamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mission_tb`
--

INSERT INTO `mission_tb` (`mission_id`, `mission_name`, `mission_description`, `mission_img`, `mission_timeStamp`) VALUES
(1, 'Mars Science Laboratory', 'The Mars Science Laboratory (MSL) is a NASA mission that landed the Curiosity rover on Mars on August 6, 2012. Curiosity\'s primary goal is to investigate the planet\'s climate and geology and assess whether Mars ever had conditions suitable for microbial life. The rover, equipped with a suite of scientific instruments, analyzes soil and rock samples, measures atmospheric conditions, and captures high-resolution images. Key discoveries include evidence of ancient riverbeds, organic molecules, and fluctuating methane levels, suggesting past environmental conditions that could have supported life. Curiosity\'s landing in Gale Crater, with its central Aeolis Mons (Mount Sharp), was chosen for its rich geological history, providing insights into Mars\' transition from a wetter to a drier environment. The mission, part of NASA\'s Mars Exploration Program, continues to enhance our understanding of the Red Planet\'s habitability and prepare for future human exploration.', './image/mars1.jpg', '2024-05-29 17:33:56'),
(2, 'Voyager 1', 'Voyager 1 is a NASA space probe launched on September 5, 1977, as part of the Voyager program to study the outer Solar System and beyond. It is the most distant human-made object from Earth. Initially, Voyager 1 conducted detailed surveys of Jupiter and Saturn, capturing unprecedented images and data of their moons, rings, and magnetic fields. Its mission was extended to explore the heliosphere and interstellar space. On August 25, 2012, Voyager 1 entered interstellar space, providing the first direct measurements of the density of interstellar plasma. Equipped with a Golden Record containing sounds and images of Earth, Voyager 1 serves as a time capsule intended to communicate the story of our world to potential extraterrestrial life. Powered by radioisotope thermoelectric generators, Voyager 1 continues to send valuable scientific information back to Earth, contributing to our understanding of the universe\'s boundary regions.', './image/voy.jpg', '2024-05-29 17:41:16'),
(3, 'Cassini-Huygens', 'Cassini-Huygens was a collaborative mission between NASA, the European Space Agency (ESA), and the Italian Space Agency (ASI), launched in 1997. Its primary goal was to study Saturn and its complex system, including its rings and moons. Cassini orbited Saturn for 13 years, providing unprecedented data on the planet\'s atmosphere, magnetic field, and ring dynamics. The mission\'s highlight was the deployment of the Huygens probe, which landed on Titan, Saturn\'s largest moon, in 2005. Huygens transmitted detailed images and data from Titan\'s surface, revealing its lakes, rivers, and complex organic chemistry. Cassini discovered water-ice plumes on Enceladus, suggesting subsurface oceans and potential habitability. The mission ended in 2017 with a deliberate plunge into Saturn\'s atmosphere to avoid contaminating its moons. Cassini-Huygens significantly advanced our understanding of the Saturnian system and paved the way for future exploration.', './image/saturn.jpg', '2024-05-29 17:46:32'),
(4, 'Parker Solar Probe', 'The Parker Solar Probe, launched by NASA in August 2018, is a groundbreaking mission designed to study the Sun\'s outer corona. It aims to uncover the mysteries of the solar wind and the Sun\'s magnetic fields by getting closer to the Sun than any previous spacecraft. The probe is equipped with a robust heat shield to withstand temperatures exceeding 1,377 degrees Celsius (2,500 degrees Fahrenheit). Its suite of instruments measures electric and magnetic fields, plasma waves, and energetic particles. By sampling the solar corona directly, Parker Solar Probe seeks to understand why the corona is significantly hotter than the Sun\'s surface and how solar wind particles are accelerated. The data collected by the probe is expected to improve our ability to forecast space weather, which can affect satellite operations, communications, and power grids on Earth. The mission marks humanity\'s first close encounter with a star, pushing the boundaries of space exploration and solar science.\r\n\r\n\r\n\r\n\r\n\r\n', './image/sun.jpg', '2024-05-29 17:47:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `astro_tb`
--
ALTER TABLE `astro_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `document_tb`
--
ALTER TABLE `document_tb`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `mission_tb`
--
ALTER TABLE `mission_tb`
  ADD PRIMARY KEY (`mission_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `astro_tb`
--
ALTER TABLE `astro_tb`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document_tb`
--
ALTER TABLE `document_tb`
  MODIFY `document_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mission_tb`
--
ALTER TABLE `mission_tb`
  MODIFY `mission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
