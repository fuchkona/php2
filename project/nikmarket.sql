-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2018 г., 17:58
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
-- База данных: `nikmarket`
--
CREATE DATABASE IF NOT EXISTS `nikmarket` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nikmarket`;

-- --------------------------------------------------------

--
-- Структура таблицы `auth`
--

DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `a_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auth`
--

INSERT INTO `auth` (`a_id`, `u_id`, `secret`, `time`, `agent`) VALUES
(32, 1, '$2y$10$Yl4yZgPkk2/wcfPc.hOw5eYfsqIeHw6Lue9zZdkYj/oGLT3sTqHyy', '2018-02-12 04:40:20', '$2y$10$a.Fo32/aT3jPdLgdS88XC.fogc3PMWm0cUhoaHlO9LTdKUYUjjlsC');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `c_id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`c_id`, `title`, `parent`) VALUES
(1, 'Men', NULL),
(2, 'Women', NULL),
(3, 'Child', NULL),
(4, 'Apparel', NULL),
(5, 'Accesories', NULL),
(12, 'Accessories', 1),
(13, 'Bags', 1),
(14, 'Denim', 1),
(15, 'Hoodies & Sweatshirts', 1),
(16, 'Jackets & Coats', 1),
(17, 'Pants', 1),
(18, 'Polos', 1),
(19, 'Shirts', 1),
(20, 'Shoes', 1),
(21, 'Shorts', 1),
(22, 'Sweaters & Knits', 1),
(23, 'T-Shirts', 1),
(24, 'Tanks', 1),
(25, 'Accessories', 2),
(26, 'Bags', 2),
(27, 'Denim', 2),
(28, 'Hoodies & Sweatshirts', 2),
(29, 'Jackets & Coats', 2),
(30, 'Shoes', 2),
(31, 'Sweaters & Knits', 2),
(32, 'T-Shirts', 2),
(33, 'Dresses', 2),
(34, 'Accessories', 3),
(35, 'Bags', 3),
(36, 'Hoodies & Sweatshirts', 3),
(37, 'Jackets & Coats', 3),
(38, 'Pants', 3),
(39, 'Dresses', 3),
(40, 'Polos', 3),
(41, 'Shirts', 3),
(42, 'Shoes', 3),
(43, 'Shorts', 3),
(44, 'Sweaters & Knits', 3),
(45, 'T-Shirts', 3),
(46, 'Big', 13),
(47, 'Small', 13);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `g_id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text,
  `price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `visits` int(11) UNSIGNED DEFAULT '0',
  `photo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`g_id`, `title`, `description`, `price`, `visits`, `photo`) VALUES
(9, 'Black coat', 'Some text', '118.00', 0, '15184456526c94bdbbb92cd609b724b0cd7c639a5d.jpg'),
(10, 'Brown coat', 'NULL', '120.00', 0, '15184457081da6fc1a0015bbb2186fefca37d54da4.jpg'),
(11, 'Blue jacket', 'NULL', '202.37', 0, '1518445732c5dc367dda4b02a2d8101108d163dd5a.jpg'),
(12, 'Gray T-shirt', 'NULL', '30.00', 0, '1518445750982fc684ddfbc90f3097470c23740bba.jpg'),
(13, 'Blue jacket', 'NULL', '41.00', 0, '1518445766550a9afd93e9638b631a09f6e9c4f635.jpg'),
(14, 'Autumn set', 'NULL', '177.77', 0, '1518445795408509e2eba3987e94dd2dc47fa76668.jpg'),
(15, 'Light blue suit', 'NULL', '111.00', 0, '1518445830fa2c13d9d71c9f526c31344b15fcd2e4.jpg'),
(16, 'Light brown coat', 'NULL', '120.00', 0, '1518445849ba6a8abdff041b3ba1313798fc5afe24.jpg'),
(17, 'Blue T-shirt', 'NULL', '51.00', 0, '151844586803307e5e0c66ceee30ffcb8781322296.jpg'),
(18, 'Black women\'s suit', 'NULL', '114.75', 0, '15184459279424dec6725359a47f972f6e90057eb2.jpg'),
(19, 'Brown black dress', 'NULL', '69.00', 0, '15184459430b402eecb154b57523c23885cb20e551.jpg'),
(20, 'Summer set', 'NULL', '211.30', 0, '1518445963dedf9b778fbccdce63369142ae290dbd.jpg'),
(21, 'DG set', 'NULL', '117.00', 0, '1518445978654df82b8a29939162a780e4ca0920f0.jpg'),
(22, 'Orange dress', 'NULL', '112.00', 0, '15184460274d3c716934fb6d501cd6134f30beecbd.jpg'),
(23, 'Flowered dress', 'NULL', '71.00', 0, '15184460413f7e4fe7498b490f1bc3dadc9067fbaf.jpg'),
(24, 'Zizi dress', 'NULL', '40.00', 0, '1518446056c6b4bd5bd21ea2366a9e5a40f81450ab.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `goodsCategory`
--

DROP TABLE IF EXISTS `goodsCategory`;
CREATE TABLE `goodsCategory` (
  `gc_id` int(11) NOT NULL,
  `g_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goodsCategory`
--

INSERT INTO `goodsCategory` (`gc_id`, `g_id`, `c_id`) VALUES
(41, 9, 16),
(42, 10, 16),
(43, 11, 16),
(44, 12, 23),
(45, 13, 16),
(46, 14, 16),
(47, 15, 16),
(48, 16, 16),
(49, 17, 23),
(50, 18, 33),
(51, 19, 33),
(52, 20, 33),
(53, 21, 33),
(54, 22, 33),
(55, 23, 33),
(56, 24, 33);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`u_id`, `name`, `login`, `pass`, `role`) VALUES
(1, 'Fuchko Nikita', 'nikita', '$2y$10$VsjG5mseWsy78F4K3UO6tOcWWZVMsQpWFpTQ4SjDyxa5tEeR08SrS', 255),
(2, 'Testerov', 'test1', '$2y$10$j0OA1FOJESbN5cZDygGDhOSsxqDrvw1Vkh3oRdg9qM3izAUyXCQrW', 0),
(3, 'Testerov', 'test2', '$2y$10$VTbaGjMPQRspGWPLMFSZAunOuB.3ozWnhRKS7vblN5IheNHCXlavi', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`c_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`g_id`);

--
-- Индексы таблицы `goodsCategory`
--
ALTER TABLE `goodsCategory`
  ADD PRIMARY KEY (`gc_id`),
  ADD KEY `g_id` (`g_id`),
  ADD KEY `c_id` (`c_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auth`
--
ALTER TABLE `auth`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `goodsCategory`
--
ALTER TABLE `goodsCategory`
  MODIFY `gc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `auth`
--
ALTER TABLE `auth`
  ADD CONSTRAINT `u_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`);

--
-- Ограничения внешнего ключа таблицы `goodsCategory`
--
ALTER TABLE `goodsCategory`
  ADD CONSTRAINT `c_id` FOREIGN KEY (`c_id`) REFERENCES `categories` (`c_id`),
  ADD CONSTRAINT `g_id` FOREIGN KEY (`g_id`) REFERENCES `goods` (`g_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
