-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2018 г., 11:49
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2l4`
--
CREATE DATABASE IF NOT EXISTS `php2l4` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `php2l4`;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `g_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`g_id`, `title`, `description`, `price`, `img`) VALUES
(1, 'Кролики, пара', 'Описание товара 1', '150.00', '1.jpg'),
(2, 'Крольчиха', 'Описание товара 2', '127.00', '2.jpg'),
(3, 'Букет красных роз', 'Описание товара 1', '135.00', '3.jpg'),
(4, 'Рождественский носок', 'Описание товара 2', '93.00', '4.jpg'),
(5, 'Розовая роза с вазой', 'Описание товара 3', '165.00', '5.jpg'),
(6, 'Кольцо с брилиантом', 'Описание товара 4', '1700.00', '6.jpg'),
(7, 'Весенний букет', 'Описание товара 5', '50.00', '7.jpg'),
(8, 'Большая роза с вазой', 'Описание товара 6', '300.00', '8.jpg'),
(9, 'Кролик', 'Описание товара 7', '322.00', '9.jpg'),
(10, 'Лягушки, пара', 'Описание товара 8', '125.00', '10.jpg'),
(11, 'Кролики и сердце', 'Описание товара 9', '225.00', '11.jpg'),
(12, 'Букет и ваза модерн', 'Описание товара 10', '77.00', '12.jpg'),
(13, 'Букет и ваза нежность', 'Описание товара 11', '123.00', '13.jpg'),
(14, 'Мешок деда мороза', 'Описание товара 12', '586.00', '14.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`g_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
