-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 26 2015 г., 09:14
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `nsi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE IF NOT EXISTS `accounts` (
  `id` int(10) unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `skype_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odesk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `odesk_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `has_work` enum('free','busy') COLLATE utf8_unicode_ci NOT NULL,
  `project_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `email`, `email_password`, `skype`, `skype_password`, `odesk`, `odesk_password`, `has_work`, `project_id`, `created_at`, `updated_at`) VALUES
(8, 'sssargsyan1987@gmail.com', '19872212dfsafgh', 'sedrak_skype1', 'skype_password1', 'odesk_login1', 'odesk_password123', 'free', 9, '2015-10-15 01:12:40', '2015-10-15 03:56:02'),
(10, 'email@mail.com', 'password_for_email', 'skype_account', 'skype_account_password', 'odesk_account', 'odesk_account_password', 'busy', 11, '2015-10-15 04:29:02', '2015-10-15 04:29:02');

-- --------------------------------------------------------

--
-- Структура таблицы `charges`
--

CREATE TABLE IF NOT EXISTS `charges` (
  `id` int(10) unsigned NOT NULL,
  `amount` double(8,2) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('income','spending') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `income_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `charges`
--

INSERT INTO `charges` (`id`, `amount`, `reason`, `status`, `created_at`, `updated_at`, `income_date`) VALUES
(1, 45000.00, 'fdg', 'income', '2015-10-21 01:39:20', '2015-10-21 01:39:20', '2015-09-06 20:00:00'),
(2, 56000.00, 'ertyey', 'income', '2015-10-21 01:41:59', '2015-10-21 01:41:59', '2015-08-18 20:00:00'),
(3, 27000.00, 'iop[io', 'spending', '2015-10-21 01:42:42', '2015-10-21 01:42:42', '2015-09-09 20:00:00'),
(4, 12500.00, 'iodfsgsdf', 'spending', '2015-10-21 01:43:08', '2015-10-21 01:43:08', '2015-09-26 20:00:00'),
(5, 17800.00, 'rty', 'spending', '2015-10-21 01:44:38', '2015-10-21 01:44:38', '2015-08-18 20:00:00'),
(6, 86000.00, 'rttyert', 'income', '2015-10-21 01:45:14', '2015-10-21 01:45:14', '2015-10-07 20:00:00'),
(7, 65000.00, 'dfssdty', 'income', '2015-10-21 01:47:02', '2015-10-21 01:47:02', '2015-07-09 20:00:00'),
(8, 54000.00, 'dfsgfsd', 'income', '2015-10-21 01:47:47', '2015-10-21 01:47:47', '2015-06-09 20:00:00'),
(9, 19800.00, 'df', 'spending', '2015-10-21 01:48:15', '2015-10-21 01:48:15', '2015-06-16 20:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_10_14_084127_create_projects_table', 1),
('2015_10_14_084457_create_accounts_table', 2),
('2015_10_15_085847_create_charges_table', 3),
('2015_10_19_103544_add_date_to_charges_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(10) unsigned NOT NULL,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('current','new','finished') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Project1', 'current', '2015-10-14 06:35:03', '2015-10-14 06:35:03'),
(5, 'Project2', 'finished', '2015-10-14 06:35:19', '2015-10-14 06:35:19'),
(8, 'Project3', 'current', '2015-10-14 08:24:33', '2015-10-14 08:24:33'),
(9, 'Project5', 'finished', '2015-10-14 08:24:42', '2015-10-14 08:24:42'),
(10, 'Project8', 'new', '2015-10-15 02:49:28', '2015-10-15 02:49:28'),
(11, 'Project12', 'finished', '2015-10-15 02:49:44', '2015-10-15 02:49:44'),
(12, 'Project 15', 'new', '2015-10-15 03:46:25', '2015-10-15 03:46:38');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sedrak', 'sssargsyan1987@gmail.com', '$2a$10$7OVG.QZlHe2sHybzKFUAMe5gVxf2g.H4MDglQ5iqp9GbC96zdywhS', 'pHGjsjVdmjbYDS8JiKQ7A9nWA7hrbkFOIyQDuLkc5uB5x1Jr3OECqBOSJfUS', '2015-10-15 05:37:49', '2015-10-21 02:15:07');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_unique` (`email`),
  ADD UNIQUE KEY `accounts_skype_unique` (`skype`),
  ADD UNIQUE KEY `accounts_odesk_unique` (`odesk`),
  ADD KEY `accounts_project_id_foreign` (`project_id`);

--
-- Индексы таблицы `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `charges`
--
ALTER TABLE `charges`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
