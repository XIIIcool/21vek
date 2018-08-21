-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 21 2018 г., 23:56
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `journal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `surname` char(255) DEFAULT NULL,
  `name` char(255) DEFAULT NULL,
  `patronymic` char(255) DEFAULT NULL,
  `birthday` date NOT NULL,
  `status` varchar(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `surname`, `name`, `patronymic`, `birthday`, `status`) VALUES
(31, 'Иванов', 'Иван', 'Иванович', '2000-02-01', '1'),
(32, 'Сидоров', 'Виталий', 'Андреевич', '1989-05-25', '1'),
(33, 'Андреева', 'Света', 'Петровна', '1985-05-05', '1'),
(34, 'Яглейко', 'Дмитрий', 'Петров', '2001-08-07', '1'),
(36, 'Иванов', 'Иван', 'Иванович', '2000-02-01', '1'),
(37, 'Сидоров', 'Виталий', 'Андреевич', '1989-05-25', '1'),
(38, 'Андреева', 'Света', 'Петровна', '1985-05-05', '1'),
(39, 'Яглейко', 'Дмитрий', 'Петров', '2001-08-07', '1'),
(41, 'Иванов', 'Иван', 'Иванович', '2000-02-01', '1'),
(42, 'Сидоров', 'Виталий', 'Андреевич', '1989-05-25', '1'),
(43, 'Андреева', 'Света', 'Петровна', '1985-05-05', '1'),
(44, 'Яглейко', 'Дмитрий', 'Петров', '2001-08-07', '1'),
(45, '121312', '213123', '123213', '1111-11-11', '0'),
(46, 'Иванов', 'Иван', 'Иванович', '2000-02-01', '1'),
(47, 'Сидоров', 'Виталий', 'Андреевич', '1989-05-25', '1'),
(48, 'Андреева', 'Света', 'Петровна', '1985-05-05', '1'),
(49, 'Яглейко', 'Дмитрий', 'Петров', '2001-08-07', '1'),
(50, '121312', '213123', '123213', '1111-11-11', '1');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
