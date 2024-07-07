-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 12:47 AM
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
-- Database: `running_event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `tickets` int(11) NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Half Marathon', NULL, NULL),
(2, 'Marathon', NULL, NULL),
(3, '5K', NULL, NULL),
(4, 'Cross Country', NULL, NULL),
(5, 'Ultras', NULL, NULL),
(6, 'Triathlons', NULL, NULL),
(7, 'Adventure Races', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dateTime` datetime NOT NULL,
  `duration` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `maximum_tickets` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `dateTime`, `duration`, `location`, `maximum_tickets`, `price`, `title`, `description`, `category_id`, `created_at`, `updated_at`) VALUES
(8, '2024-06-08 00:00:00', 120, 'Motukarara Race Course', 100, 20.00, 'Holloway Memorial Cross Country Races', 'The Holloway Memorial Cross Country Races will be hosted by the Sumner Running Club at Motukarara Race Course on 8 June 2024. With a fast, flat start on the racecourse itself, the course makes its way around the birdcage and past the stables before emerging to skirt the perimeter of the paddock next to Duck Pond Rd. It then curves around the base of the knoll before rising up to a sharp right hairpin and a climb to the top of the hill. The run across the top gives you outstanding 360° views before dropping right and descending through the wood to the flat again to begin your next lap. Each lap is approximately 2km with your last diverting off slightly early to allow your sprint to the finish line in front of the Grandstand. Entry to this event is open to all runners; both those registered with a club, and unregistered runners. The race distance depends on your age grade.', 4, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(9, '2024-06-02 00:00:00', 120, 'Port Ōhope', 150, 25.00, 'Eastern BOP Triathlon Club Monthly Du', 'Eastern BOP Triathlon & Multisport Club\'s event on 2 June 2024 is part of a series of Triathlons and Duathlons held on the first Sunday of every month.<br>\r\n            This month\'s event is a Duathlon with short and long course options for adults and kids 11 yrs+.<br>\r\n            Based at Port Ōhope, the course starts and finishes at the eastern end of Harbour Road in the reserve opposite the Ōhope Golf Club.<br>\r\n            The Triathlon season is held during summer (Nov - April). The Duathlon season is held during winter (May - October)', 6, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(10, '2024-06-01 00:00:00', 90, 'McFetridge Park, Hillcrest, Auckland', 200, 15.00, 'Night Cross', 'The Night Cross on 1 June 2024 is a 5.5km, multi-lap, Cross Country event held under lights at McFetridge Park in Hillcrest, Auckland.<br>\r\n            The course is mostly flat, with some undulations each lap. There will be seeded races throughout the evening to ensure everyone runs with people of their ability.<br>\r\n            Prize money is on offer for the fastest men and women around the course, and spot prizes from sponsors for all races.', 1, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(11, '2024-06-08 00:00:00', 120, 'Martin and Jill Bonny’s farm, Tapawera', 150, 0.00, 'Scarecrow Scamper Cross Country', 'The Scarecrow Scamper Cross Country on 8 June 2024 is at Martin and Jill Bonny’s farm in Tapawera, about 50km/40 minutes drive from Richmond.<br>\r\n            This is a traditional rural X-country experience with 3.5km laps that will take you through private farmland, gentle hills and quite possibly some mud! All ages and abilities of runners and walkers are welcome.<br>\r\n            There is a shorter 1.7km ‘Rascal Romp’ course for the children. Registration is on the farm at the barn from 1pm with the event briefing at 1:45pm. Walkers start at 1:45pm, all Runners start at 2pm.<br>\r\n            This event is free to everyone, but participants are encouraged to join the Waimea Harrier club, as this is a race in their Winter Programme.', 4, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(12, '2024-06-15 00:00:00', 180, 'Wairakei Resort, Taupō', 300, 30.00, 'The Possum Night Trail Run', 'The Possum is a trail night run on the shortest day and darkest night on 15 June 2024 at Wairakei Resort, Taupō.<br>\r\n            Experience the Wairakei Resort, Craters Mountain Bike Park, and Craters of the Moon Geothermal Walkway at night. Running or walking at night is awesome and the trails lined up for you are super fun. The Craters of the Moon geothermal walkway is a real treat where you get to run or walk through a geothermal wonderland. There will be steam from the ground and probably steam from your body as you take on the ups and downs, gulleys, ridges and bridges. <br>\r\n            Reflective course markings will light the path to follow and marshals at key locations will keep you on course and provide lots of encouragement.<br>\r\n            After the big night out, grab some dinner from the menu offered by the Wairakei Resort and soak in a geothermal hot pool to warm up and relax.', 5, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(13, '2024-06-09 00:00:00', 240, 'Hamilton Gardens, Hamilton', 500, 40.00, 'Kirikiriroa Marathon', 'The Kirikiriroa Marathon is back on 9 June 2024 in Hamilton, New Zealand.<br>\r\n            Starting at the Hamilton gardens, runners/walkers proceed along the Te Awa River Ride to Tamahere and then back to the gardens then out along the Te Awa River Ride out to Pukete near the horse farm, then return along the same path back to the gardens to the finish. This is a similar undulating course to previous years.<br>\r\n            Compete the 42.2km distance solo or in a relay team of 3 (Leg 1: 14.5km, Leg 2: 7.8km, Leg 3: 20km).<br>\r\n            Marathon walkers are welcome. The purpose of this event is to encourage everyone to participate and finish, whether walking, running, or a combination of both.', 2, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(15, '2024-06-15 07:00:00', 150, 'Downtown Riverfront', 1500, 45.00, 'City Half Marathon', 'Join us for the annual City Half Marathon, a scenic 21.1 km race through the heart of downtown, taking you past iconic landmarks and along the riverfront. Suitable for runners of all levels, the event promises a day of fun, fitness, and community spirit.', 1, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(16, '2024-07-01 06:00:00', 240, 'City Park', 2000, 60.00, 'Spring Marathon', 'Experience the ultimate marathon challenge with the Spring Marathon. This 42.2 km race takes runners through a mix of urban and natural landscapes, ending with a celebration at the city park. All participants receive a medal and a finisher\'s T-shirt.', 2, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(17, '2024-08-10 09:00:00', 60, 'Beachside Promenade', 800, 25.00, 'Beachside 5K Fun Run', 'A fun and friendly 5K run along the beautiful beachside. Perfect for families, beginners, and seasoned runners looking to enjoy a short, scenic run. Refreshments and entertainment will be provided at the finish line.', 3, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(18, '2024-10-20 05:00:00', 600, 'Mountain Range', 200, 100.00, 'Ultra Mountain Challenge', 'Test your limits with the Ultra Mountain Challenge, an extreme ultra race through rugged mountain terrain. This 100 km race is designed for experienced ultra runners looking for the next big adventure.', 5, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(19, '2024-11-15 07:30:00', 300, 'Lakeside Resort', 600, 75.00, 'Lakeside Triathlon', 'Compete in the Lakeside Triathlon, featuring a swim in the crystal-clear lake, a bike ride through scenic routes, and a run along the lakeshore. This event is perfect for triathletes of all levels.', 6, '2024-06-04 11:23:58', '2024-06-04 11:23:58'),
(20, '2024-12-05 06:00:00', 480, 'National Park', 300, 50.00, 'Winter Adventure Race', 'Join the Winter Adventure Race, a thrilling event that combines running, climbing, and navigation through the snowy wilderness. Teams of two or more will compete to see who can complete the course the fastest.', 7, '2024-06-04 11:23:58', '2024-06-04 11:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_05_21_004807_create_posts_table', 1),
(5, '2024_06_01_005424_create_events_table', 1),
(6, '2024_06_01_010030_create_categories_table', 1),
(8, '2024_06_01_033352_create_bookings_table', 2),
(9, '2016_01_04_173148_create_admin_tables', 3),
(10, '2024_06_07_221242_add_is_admin_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `is_admin`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$.VzmZ7y6Nxd/L8WPA3orE.lj4Fj50B2pSoop3N5Tx4JxYQaooxZaW', 'admin', NULL, '2024-06-04 11:16:41', '2024-06-04 11:16:41', 1),
(16, 'Admin', 'admin@gmail.com', NULL, '$2y$12$H0Z33x1bI7u5Uu6XlQA4WeX0R.2q1yPMHsYVBnnCWXnMk4EDw.BHG', 'admin', NULL, '2024-06-04 18:21:50', '2024-06-04 18:21:50', 0),
(17, 'kat', 'kat@gmail.com', NULL, '$2y$12$U5C4VJw5zdBPCkfTVFTi4uCSUF/sXFkDXkkydPkzJwTb5CaEjOaku', 'user', NULL, '2024-06-07 09:44:38', '2024-06-07 09:44:38', 0),
(18, 'ash', 'ash@gmail.com', NULL, '$2y$12$kAgc4ldCA9SF0EMeibGY1uRsHqQ8sa6N8BO6t351NumsZ0/02EVv.', 'user', NULL, '2024-06-07 10:25:07', '2024-06-07 12:04:21', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_event_id_foreign` (`event_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
