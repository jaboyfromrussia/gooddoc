-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 21 2020 г., 05:20
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `usreg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `spec`
--

CREATE TABLE `spec` (
  `id` int(11) NOT NULL,
  `spec-doc` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `spec`
--

INSERT INTO `spec` (`id`, `spec-doc`) VALUES
(1, 'Врач общ. практики'),
(2, 'Терапевт'),
(3, 'Хирург'),
(4, 'Дерматолог'),
(5, 'Гинеколог'),
(6, 'Гастроэнтеролог'),
(7, 'Логопед'),
(9, 'Неролог'),
(11, 'Окулист'),
(13, 'Дерматолог'),
(14, 'Травматолог');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(30) CHARACTER SET utf8 NOT NULL,
  `pass` varchar(30) CHARACTER SET utf8 NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `name`) VALUES
(1, 'test', '123456789', 'tester');

-- --------------------------------------------------------

--
-- Структура таблицы `visit`
--

CREATE TABLE `visit` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(16) CHARACTER SET utf8 NOT NULL,
  `spec-id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `visit`
--

INSERT INTO `visit` (`id`, `name`, `phone`, `spec-id`, `date`) VALUES
(9, 'test vrop', '132', 'Врач общ. практики', '2020-12-30 19:00:00'),
(11, 'test surgeon', '1335623', 'Хирург', '2020-12-23 12:00:00'),
(17, 'Name One', '123456789', 'Врач общ. практики', '2020-12-23 19:00:00'),
(18, 'Name Two', '123456789', 'Терапевт', '2020-12-24 18:00:00'),
(19, 'Name Three', '123456789', 'Хирург', '2020-12-22 10:00:00'),
(20, 'Name Four', '123456789', 'Дерматолог', '2020-12-25 15:00:00'),
(23, 'test', '+79999999999', 'Врач общ. практики', '2020-12-22 19:00:00'),
(25, 'Имя', '+79999999999', 'Логопед', '2020-12-22 17:00:00'),
(26, 'Студент', '+79999999999', 'Логопед', '2020-12-29 11:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `spec`
--
ALTER TABLE `spec`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `visit`
--
ALTER TABLE `visit`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `spec`
--
ALTER TABLE `spec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `visit`
--
ALTER TABLE `visit`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
