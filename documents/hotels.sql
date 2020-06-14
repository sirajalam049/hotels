-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2018 at 11:08 PM
-- Server version: 8.0.11
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_rooms` smallint(3) NOT NULL DEFAULT '1',
  `days` int(3) NOT NULL DEFAULT '1',
  `booking_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `drafts`
--

CREATE TABLE `drafts` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `total_rooms` smallint(3) DEFAULT NULL,
  `days` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `drafts`
--

INSERT INTO `drafts` (`id`, `date`, `hotel_id`, `user_id`, `total_rooms`, `days`) VALUES
(17, NULL, 1, 3, NULL, NULL),
(18, NULL, 10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `location` varchar(150) NOT NULL,
  `address` varchar(256) NOT NULL,
  `about` text NOT NULL,
  `price` varchar(15) NOT NULL,
  `keywords` text NOT NULL,
  `visitors` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `phone`, `location`, `address`, `about`, `price`, `keywords`, `visitors`) VALUES
(1, 'The Leela Palace', '011-3933-1234', 'New Delhi', 'Diplomatic Enclave, Africa Avenue, Chanakyapuri, New Delhi, Delhi 110023', 'The Leela Palaces, Hotels and Resorts, commonly known as The Leela, is an Indian luxury hotel chain, founded in 1986 by C. P. Krishnan Nair, and owned by The Leela Group. Currently, The Leela is a group of nine luxury palaces and hotels.', '15000', 'leela palaces hotels resorts commonly known indian luxury hotel chain founded 1986 krishnan nair owned group currently nine', 5),
(2, 'Trident', '0124-245-0505', 'Gurgaon', ' 443, Gurgoan-Delhi Expy, Udyog Vihar Phase V, Sector 19, Gurugram, Haryana 122016', 'Trident Hotels falls under the aegis of The Oberoi Group. The Oberoi Group has presence in six countries under the luxury \'Oberoi\' and five-star \'Trident\' brand. Founded in 1934, it operates 30 hotels, a Nile Cruiser and a Motor Vessel in the backwaters of Kerala. The Group is also engaged in flight catering, airport restaurants, travel and tour services, car rentals, project management and corporate air charters.', '12000', 'trident hotels falls under aegis oberoi group presence countries luxury fivestar brand founded 1934 operates nile cruiser motor vessel backwaters kerala also engaged flight catering airport restaurants travel tour services rentals project management corporate charters', 1),
(3, 'Radisson', '98160-64333', 'Shimla', 'Goodwood Estate, Lower Bharari Rd, Shimla, Himachal Pradesh 171001', 'Situated in the Himalaya Mountains, Radisson Jass Shimla offers scenic vistas that are sure to inspire. Stay just minutes from popular area attractions like the Gaiety Heritage Cultural Complex, Jakhu Temple and Christ Church. Tour the historical Viceregal Lodge at the Indian Institute of Advanced Study, or shop for souvenirs at Shimla’s popular Mall. As an added convenience, Shimla Airport (SLV) is only 26 kilometres away.', '11520', 'situated himalaya mountains radisson jass shimla offers scenic vistas that sure inspire stay just minutes from popular area attractions like gaiety heritage cultural complex jakhu temple christ church tour historical viceregal lodge indian institute advanced study shop souvenirs shimlas mall added convenience airport only kilometres away', 2),
(4, 'Park Hyatt', '0177-265-1010', 'Goa', 'Arossim Beach, Cansaulim, Goa 403712', 'Park Hyatt Goa is one of the best 5-star luxury beach resorts in Goa. Set within 45 acres of landscaped gardens with glimmering waterways and lagoons, the resort showcases charming Indo-Portuguese style room and suites, combining elegance with distinctive regional character. True to the Park Hyatt brand, Park Hyatt Goa Resort and Spa epitomises understated luxury and gracious service in an intimate sanctuary, offering guests an experience that is distinctively inspiring.', '8960', 'park hyatt best 5star luxury beach resorts within acres landscaped gardens with glimmering waterways lagoons resort showcases charming indoportuguese style room suites combining elegance distinctive regional character true brand epitomises understated gracious service intimate sanctuary offering guests experience that distinctively inspiring', 1),
(5, 'Hard Rock', '832-674-5555', 'Goa', '370/14, Near KFC, Porba Vaddo, Calangute, Bardez, Goa 403516', 'Have a rocking holiday at Hard Rock Hotel Goa, the first resort of its kind in India. Located in the heart of Calangute just minutes from a number of famed beaches, our Goa resort is a complete entertainment destination, offering world-class accommodations, stylish design and unparalleled service that will refine lifestyle hotel living.', '5291', 'have rocking holiday hard rock hotel first resort kind india located heart calangute just minutes from number famed beaches complete entertainment destination offering worldclass accommodations stylish design unparalleled service that will refine lifestyle living', 1),
(6, 'Sheraton', '011-4266-1122', 'New Delhi', 'District Centre, Saket, New Delhi, Delhi 110017', 'Featuring 4 dining options, an outdoor swimming pool and a spa and wellness centre, Sheraton New Delhi Hotel is located in Saket. Each room here will provide you with air conditioning and a minibar. Featuring a bath or shower, private bathroom also comes with a hairdryer and free toiletries. Extras include a safety deposit box, bed linen and ironing facilities. At Sheraton New Delhi Hotel you will find a fitness centre. Other facilities offered at the property include a tour desk and luggage storage.', '12172', 'featuring dining options outdoor swimming pool wellness centre sheraton delhi hotel located saket each room here will provide with conditioning minibar bath shower private bathroom also comes hairdryer free toiletries extras include safety deposit linen ironing facilities find fitness other offered property tour desk luggage storage', 1),
(7, 'The Taj Mahal Palace', '022-6665-3366', 'Mumbai', 'Apollo Bandar, Colaba, Mumbai, Maharashtra 400001', 'Experience true grandeur at The Taj Mahal Palace, the iconic sea-facing landmark in Colaba, South Mumbai.This flagship Taj hotel offers you splendid views of the Arabian Sea and Gateway of India, alongside refined century-old hospitality.', '38438', 'experience true grandeur mahal palace iconic seafacing landmark colaba south mumbaithis flagship hotel offers splendid views arabian gateway india alongside refined centuryold hospitality', 1),
(8, 'Clarkes Hotel', '0177-265-1010', 'Shimla', ' The Mall Road, Shimla, Himachal Pradesh 171001', 'Located on Shimla’s Mall Road, Clarkes Hotel is an oasis of calm on the bustling promenade. Built in 1898, Clarkes is classed as a Grand Heritage Hotel and is one of the oldest hotels in Shimla. Clarkes Hotel embodies the elegance and charm of yesteryear, with all modern conveniences and world class service. Clarkes Hotel is just 10 minutes by car from Shimla Railway Station and is within walking distance of Shimla attractions - Gaiety Theatre, Gorton Castle, Rothney Castle, many churches and other colonial era buildings.', '8320', 'located shimlas mall road clarkes hotel oasis calm bustling promenade built 1898 classed grand heritage oldest hotels shimla embodies elegance charm yesteryear with modern conveniences world class service just minutes from railway station within walking distance attractions gaiety theatre gorton castle rothney many churches other colonial buildings', 1),
(9, 'Ginger Hotel', '022-6666-6333', 'Mumbai', 'Mahakali Caves Road, Near Holy Spirit Hospital, Andheri East, Mumbai, Maharashtra 400093', 'Ginger Hotel Andheri East is located off the Western Express Highway and is in close proximity to the railway station, the international airport and the Bombay Exhibition Centre. The hotel also provides convenient access to the city\'s thriving corporate hub on the Andheri Kurla Road. It offers guests 142 smartly furnished rooms equipped with a multitude of modern facilities and amenities.', '4282', 'ginger hotel andheri east located western express highway close proximity railway station international airport bombay exhibition centre also provides convenient access citys thriving corporate kurla road offers guests smartly furnished rooms equipped with multitude modern facilities amenities', 1),
(10, 'The Hans', '011 6615 0000', 'New Delhi', 'No. 15, Barakhamba Rd, Connaught Place, New Delhi, Delhi 110001', 'Hans Hotels is a reputed name in the hospitality industry since its inception. Experience a timeless connection to nature and serenity at Hans Hotels. We make a special effort to make you feel at home and away from the humdrum of regular life.', '5049', 'hans hotels reputed name hospitality industry since inception experience timeless connection nature serenity make special effort feel home away from humdrum regular life', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `pswd` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pswd`) VALUES
(2, 'Mohd Seraj Alam', 'sirajalam049@gmail.com', '38e2dc3041691de1fa97674cef81dae5f4532efa86a911e30d77d9cf161611a2'),
(3, 'Azad Ansaru', 'azadansari35@gmail.com', '87c937cdb88329343d56c40a946a380cfcf5cc0cbf54e335ef645d392244c2d0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `drafts`
--
ALTER TABLE `drafts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_id` (`hotel_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drafts`
--
ALTER TABLE `drafts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `drafts`
--
ALTER TABLE `drafts`
  ADD CONSTRAINT `drafts_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `drafts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
