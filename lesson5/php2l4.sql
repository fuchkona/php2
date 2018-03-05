-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 05 2018 г., 11:34
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

-- --------------------------------------------------------

--
-- Структура таблицы `auths`
--

CREATE TABLE `auths` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `secret` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `agent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `auths`
--

INSERT INTO `auths` (`id`, `u_id`, `secret`, `time`, `agent`) VALUES
(52, 1, '$2y$10$nyuBXVj/ixL.Cu0AOvL5.e/dWcc6VObrdQUaicowhOAM/Dkw/hdme', '2018-03-03 06:36:16', '$2y$10$7ajchhKTOSeecA2TExZ3TOWbzr8SKFsF9gwGEtv/SOXPan6LjNe2m'),
(55, 1, '$2y$10$YxDApFv8gRQR/9nsvyrpO.FG4nkAFH71mSlmuJpuPnec6Za7zSm7K', '2018-03-03 10:47:41', '$2y$10$1e/NcunHIJDPUi8VFxg14OUqB8P7a4J/.dXZsZZ1PcPOdbVOzMzAq'),
(56, 1, '$2y$10$ezvdsIOeYhoV9nVebY2o5u9GjzchBEg5efKXs5QaFHcBFp4iEdEna', '2018-03-04 07:32:47', '$2y$10$9YX.4B9.GArnbjQcoz2QP.X3vt61JODpvLeDcgOs61.uhNYrz6PC2'),
(57, 1, '$2y$10$mckJs/6BYHPkSqNy.hGhleBohPySajFSoPitpVR/v61yba9AZ/Wt6', '2018-03-04 13:06:14', '$2y$10$MRA8kA2d09IUDKL8jZcCHuaGs0RQv75qF9Lplt5uCA..kUpp91Fn2'),
(61, 1, '$2y$10$mvmjHm8n3tjkxIQmcYPepeuBqERZXz9fMC4Wcp3Qtwfw8vPfnQqEm', '2018-03-05 06:05:09', '$2y$10$24NJU/ievLZWwDrWI3vIyeVjv.jzoz8ILclMEyxxjqgaHwhiVrv72');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  `visits` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `price`, `img`, `visits`) VALUES
(15, 'Black coat', 'Some text', '118.00', '15184456526c94bdbbb92cd609b724b0cd7c639a5d.jpg', 1),
(16, 'Brown coat', '', '120.00', '15184457081da6fc1a0015bbb2186fefca37d54da4.jpg', 0),
(17, 'Blue jacket', '', '202.37', '1518445732c5dc367dda4b02a2d8101108d163dd5a.jpg', 0),
(18, 'Gray T-shirt', '', '30.00', '1518445750982fc684ddfbc90f3097470c23740bba.jpg', 0),
(19, 'Blue jacket', '', '41.00', '1518445766550a9afd93e9638b631a09f6e9c4f635.jpg', 0),
(20, 'Autumn set', '', '177.77', '1518445795408509e2eba3987e94dd2dc47fa76668.jpg', 0),
(21, 'Light blue suit', '', '111.00', '1518445830fa2c13d9d71c9f526c31344b15fcd2e4.jpg', 0),
(22, 'Light brown coat', '', '120.00', '1518445849ba6a8abdff041b3ba1313798fc5afe24.jpg', 0),
(23, 'Blue T-shirt', '', '51.00', '151844586803307e5e0c66ceee30ffcb8781322296.jpg', 0),
(24, 'Black women\'s suit', '', '114.75', '15184459279424dec6725359a47f972f6e90057eb2.jpg', 0),
(25, 'Brown black dress', '', '69.00', '15184459430b402eecb154b57523c23885cb20e551.jpg', 0),
(26, 'Summer set', '', '211.30', '1518445963dedf9b778fbccdce63369142ae290dbd.jpg', 0),
(27, 'DG set', '', '117.00', '1518445978654df82b8a29939162a780e4ca0920f0.jpg', 0),
(28, 'Orange dress', '', '112.00', '15184460274d3c716934fb6d501cd6134f30beecbd.jpg', 1),
(29, 'Flowered dress', '', '71.00', '15184460413f7e4fe7498b490f1bc3dadc9067fbaf.jpg', 0),
(30, 'Zizi dress', '', '40.00', '1518446056c6b4bd5bd21ea2366a9e5a40f81450ab.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`, `role`) VALUES
(1, 'Fuchko Nikita', 'nikita', '$2y$10$VsjG5mseWsy78F4K3UO6tOcWWZVMsQpWFpTQ4SjDyxa5tEeR08SrS', 255),
(6, 'Testerov', 'test1', '$2y$10$DU0xgAbNi9WY4zSspll7jOpVfG/ZLVTM1lL7j9rjYheQBtp5ql2TG', 0),
(7, 'Testerov', 'test2', '$2y$10$kFRZj/qTE8bDjBFxU577vuoqxVKHQONcF64DhKtQiijqU6lYEnAjm', 0),
(8, 'Testerov', 'test6', '$2y$10$mK2Zpdz4e37QZmLDw2KXsuLDFsWKb6CqL3hSVdTaZDlMyMFcCLqTe', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `u_id` (`u_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `auths`
--
ALTER TABLE `auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
