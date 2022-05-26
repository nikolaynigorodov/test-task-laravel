-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 25 2022 г., 21:17
-- Версия сервера: 8.0.19
-- Версия PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user_api_laravel`
--

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2012_05_17_144125_create_positions_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_20_083006_create_tokens_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(11, 'adipisci'),
(12, 'quis'),
(13, 'magni'),
(14, 'dolorum'),
(15, 'unde');

-- --------------------------------------------------------

--
-- Структура таблицы `tokens`
--

CREATE TABLE `tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `token` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finish` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `finish`) VALUES
(1, 'bd4a6d5cb45e5d3f2c82096b8fb46d12f77f99375c166863dde2fe829197b282', '2022-05-23 09:19:17'),
(2, '66a72eb50ddea618a3fdd22602923865a1d93affbf767dc1209249bc7d09fa78', '2022-05-23 09:21:21');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `photo`, `position_id`, `created_at`, `updated_at`) VALUES
(1, 'Saul Heller', 'kkuhn@example.com', '(614) 847-3475', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(2, 'Mrs. Jada Abbott', 'clemens01@example.org', '1-475-762-7680', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(3, 'Prof. Obie Wisoky I', 'cora25@example.net', '+1.651.292.5579', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(4, 'Laurie Gottlieb', 'olson.keith@example.com', '816.798.6348', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(5, 'Mr. Kaley Thompson', 'kbayer@example.org', '(959) 400-2423', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(6, 'Chaya Cremin', 'cgaylord@example.com', '+1.213.435.4354', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(7, 'Margarete Adams', 'vhamill@example.org', '425-352-0028', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(8, 'Aisha Daniel', 'dale81@example.org', '(254) 791-1676', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(9, 'Lawrence Lind', 'stokes.kathryne@example.net', '740.713.5697', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(10, 'Norris Becker', 'koepp.idella@example.org', '309-497-6067', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(11, 'Dr. Sasha Hintz', 'schinner.joelle@example.org', '1-470-654-0066', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(12, 'Lulu Runte Sr.', 'mozelle.hammes@example.org', '321.323.9342', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(13, 'Lydia Dare', 'keira30@example.net', '+1 (754) 744-6888', '/images/default-avatar.jpg', 11, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(14, 'Michele Herman I', 'rosario.smitham@example.net', '283-299-8224', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(15, 'Miss Ruthie Prohaska DDS', 'lindgren.hal@example.com', '(916) 885-2636', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(16, 'Mr. Terrell Conroy', 'felicia03@example.net', '774-353-2287', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(17, 'Leta Littel', 'watsica.maxine@example.net', '+1 (747) 397-6534', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(18, 'Myriam Daugherty', 'ccarroll@example.org', '+1-321-526-9349', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(19, 'Mr. Jabari Kreiger III', 'shermann@example.net', '+1 (757) 997-1909', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(20, 'Prof. Pat Lowe Sr.', 'macejkovic.monserrat@example.org', '+1-854-200-5903', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(21, 'Dr. Loraine Turner DVM', 'kailyn89@example.com', '+1-386-610-0916', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(22, 'Mr. Hester Veum', 'jett44@example.com', '954-885-0084', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(23, 'Hassie Fay', 'scottie81@example.org', '980-953-6716', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(24, 'Vivianne Schmeler', 'loraine30@example.net', '1-760-606-6887', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(25, 'Ms. Anya Dicki DDS', 'delilah17@example.com', '+1-657-950-4192', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(26, 'Ms. Cayla Tromp DVM', 'nhermiston@example.com', '539-528-5798', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(27, 'Prof. Maida Kessler I', 'zkirlin@example.net', '+1 (571) 435-5453', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(28, 'Evelyn Wiza', 'auer.robyn@example.org', '720.381.7121', '/images/default-avatar.jpg', 11, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(29, 'Elwyn Schultz PhD', 'schowalter.milan@example.org', '731-541-8730', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(30, 'Mathilde Rutherford IV', 'roscoe22@example.org', '+1.754.909.6033', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(31, 'Edwardo Veum', 'ethel.gutmann@example.com', '760.338.9001', '/images/default-avatar.jpg', 11, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(32, 'Jermey Treutel', 'smitham.hazle@example.org', '+1 (605) 307-2996', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(33, 'Ethyl Shields', 'brobel@example.net', '+1 (231) 293-4638', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(34, 'Miss Martine Glover MD', 'hipolito57@example.com', '+1-870-516-2357', '/images/default-avatar.jpg', 13, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(35, 'Elvera Boyle', 'javonte92@example.net', '+1.223.647.9479', '/images/default-avatar.jpg', 11, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(36, 'Karolann Murphy', 'hansen.ervin@example.com', '303-950-7047', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(37, 'Elfrieda Wilderman', 'yvonne.koch@example.net', '(781) 550-9463', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(38, 'Dr. Joanne Predovic PhD', 'efren.stiedemann@example.com', '530-681-7882', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(39, 'Dina Schoen', 'madelyn.smitham@example.net', '+19809958282', '/images/default-avatar.jpg', 11, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(40, 'Piper Larson', 'grady.kirstin@example.net', '+1 (601) 366-0249', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(41, 'Prof. Louie Barrows', 'ted.schoen@example.org', '+1.570.205.5135', '/images/default-avatar.jpg', 15, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(42, 'Judah Flatley', 'leffler.enrico@example.com', '1-731-926-9392', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(43, 'Kayli Schroeder V', 'hward@example.net', '234-538-4460', '/images/default-avatar.jpg', 12, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(44, 'Sarai Homenick MD', 'maritza05@example.net', '828.831.2359', '/images/default-avatar.jpg', 14, '2022-05-23 05:31:17', '2022-05-23 05:31:17'),
(45, 'Anne Robel', 'queenie97@example.net', '+1-636-872-5746', '/images/default-avatar.jpg', 11, '2022-05-23 05:31:17', '2022-05-23 05:31:17');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_position_id_foreign` (`position_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
