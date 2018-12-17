-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 17 2018 г., 10:01
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `super_mag`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Джинсы', 0, 1),
(2, 'Брюки', 0, 1),
(3, 'Пальто', 0, 1),
(4, 'Майки', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` float NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `is_new` int(11) NOT NULL DEFAULT '0',
  `is_recomended` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recomended`, `status`) VALUES
(1, 'Майка', 2, 789, 50, 1, 'MF', '/template/uploadImage/d040f6c0b2989b15ff55f566aea94ed3.jpg', 'Это очень классная майка', 0, 1, 1),
(2, 'Просто пальто', 4, 456, 70, 1, 'MF', '/template/uploadImage/8da7b420a4f6705fc6f680ef6829a7d7.jpg', 'Это очень классное пальто', 1, 0, 1),
(3, 'Просто пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/856bbb388d1351f1bb16ed1b93c8ac83.jpg', 'Это очень классное пальто', 0, 0, 1),
(4, 'Просто пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/eea4ea50786fb9485b4f402f44ac92da.jpg', 'Это очень классное пальто', 0, 0, 1),
(5, 'Кожаное пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/72d24b6f9e714d5496413b6a8d6df986.jpg', 'Это очень классное пальто', 0, 1, 1),
(6, 'Просто пальто', 1, 456, 70, 1, 'MF', '/template/uploadImage/abd0f937d0f9ca98caf4b9ad2ae9caf0.jpg', 'Это очень классное пальто', 1, 0, 1),
(7, 'Просто пальто', 2, 456, 70, 1, 'MF', '/template/uploadImage/7ba6cd747b1f3ee9b3a511d04198f170.jpg', 'Это очень классное пальто', 0, 1, 1),
(8, 'Просто пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/856bbb388d1351f1bb16ed1b93c8ac83.jpg', 'Это очень классное пальто', 1, 0, 1),
(9, 'Майка', 4, 456, 89, 1, 'MF', '/template/uploadImage/b10f70d4ee42945ed929a442f4df594c.jpg', 'Это очень классное пальто', 0, 1, 1),
(10, 'Просто пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/f02c0fded15782a6dd8d128a18e92bc1.jpg', 'Это очень классное пальто', 0, 1, 1),
(11, 'Просто пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/856bbb388d1351f1bb16ed1b93c8ac83.jpg', 'Это очень классное пальто', 1, 0, 1),
(12, 'Просто пальто', 3, 456, 70, 1, 'MF', '/template/uploadImage/856bbb388d1351f1bb16ed1b93c8ac83.jpg', 'Это очень классное пальто', 0, 1, 1),
(13, 'Просто пальто', 2, 456, 70, 1, 'MF', '/template/uploadImage/5ae996774ee594c38e994c5cedcc4fc3.jpg', 'Это очень классное пальто', 0, 0, 1),
(15, 'Синие джинсы', 1, 456, 41, 1, 'MF', '/template/uploadImage/019256abae340b7a8e44c5dc1ff530fc.jpg', 'Это очень классное пальто', 1, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `product_order`
--

CREATE TABLE `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(256) NOT NULL,
  `user_phone` varchar(256) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_comment`, `user_id`, `date`, `products`, `status`) VALUES
(2, 'Олег', '15526256151', 'fsafasfsasafsaf', 7, '2018-11-23 07:20:49', '{\"13\":1,\"12\":1}', 0),
(4, 'Олег', '3216549', 'jnkjnjnknjkjhnbj', 7, '2018-11-23 07:25:10', '{\"13\":1,\"12\":1,\"8\":1}', 0),
(5, 'Олег', '1558416513189', 'utrjhgfhgfuthfjtyjyjhgjkukuy', 1, '2018-12-11 12:37:53', '{\"15\":1,\"12\":1,\"10\":1}', 0),
(7, 'Олег', '5498498515', 'sdfsdgfdgfdhgfjhgj', 1, '2018-12-11 12:38:41', '{\"13\":1,\"12\":1}', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Олег', 'OlegLaban@yandex.by', '25f9e794323b453885f5181f1b624d0b', 'admin'),
(5, 'gmsdogfsdf', 'fsdgg@fgsdggs.gfd', '964a7875d1dfa177dc4d578ca7fff64a', NULL),
(6, 'rwqrwqteq', 'gsdmo@fmak.com', '6ebe76c9fb411be97b3b0d48b791a7c9\'\n                   . ', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
