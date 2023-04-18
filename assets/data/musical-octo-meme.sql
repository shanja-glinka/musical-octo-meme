-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 18 2023 г., 15:55
-- Версия сервера: 5.5.62-log
-- Версия PHP: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `musical-octo-meme`
--
CREATE DATABASE IF NOT EXISTS `musical-octo-meme` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `musical-octo-meme`;

-- --------------------------------------------------------

--
-- Структура таблицы `Todo`
--

CREATE TABLE `Todo` (
  `ID` int(11) NOT NULL,
  `State` int(1) NOT NULL DEFAULT '0',
  `Text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `Todo`
--

INSERT INTO `Todo` (`ID`, `State`, `Text`) VALUES
(3, 0, 'TODO: example TODOS 2'),
(4, 0, 'TODO: 4'),
(5, 1, 'Example text 5');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Todo`
--
ALTER TABLE `Todo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Todo`
--
ALTER TABLE `Todo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
