-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 02 2018 г., 16:44
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
(49, 1, '$2y$10$NtaoG7IxGE/5FJSNxroq5eBulWAcHtjJWrrWAx0oXuDLC9kXRyuxO', '2018-03-02 13:40:49', '$2y$10$3xZkY1ISoJeK74XfeawGoOj5hF7AT/xV8.fOhcSGTJHz2aP9dEqwe');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `price`, `img`) VALUES
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
(7, 'Testerov', 'test2', '$2y$10$kFRZj/qTE8bDjBFxU577vuoqxVKHQONcF64DhKtQiijqU6lYEnAjm', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
