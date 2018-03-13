-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 13 2018 г., 15:12
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
-- Структура таблицы `Auths`
--

DROP TABLE IF EXISTS `Auths`;
CREATE TABLE `Auths` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `secret` varchar(150) NOT NULL,
  `agent` varchar(150) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Auths`
--

INSERT INTO `Auths` (`id`, `u_id`, `secret`, `agent`, `time`) VALUES
(9, 1, '$2y$10$buXushvWXMvYJpr8lI8skuIxzHrbn8y/c0Lxl/8xgfk35FZK3hhsy', '$2y$10$Qo40EncQA35NMW4sCaFthe3ORdyTQSVP9GeO3MXI4Z3kVWUGIzYt.', '2018-03-13 12:04:10');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `role`) VALUES
(1, 'Nikita', '$2y$10$m/gdHw4s8.M.donQMu5y4.PG1Xe1Wm.g.hP0QF.QZOpJXZNMZOgbS', 'Fuchko Nikita', 255),
(5, 'test1', '$2y$10$Si7HMK3HExQmUj0Z2ypNGuyrM2zfTBEgtr8O86Y0EK2FODqV3YBLu', 'Testerov', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Auths`
--
ALTER TABLE `Auths`
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
-- AUTO_INCREMENT для таблицы `Auths`
--
ALTER TABLE `Auths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
