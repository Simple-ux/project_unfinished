-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Фев 19 2021 г., 12:08
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `sneakershop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `article_id` int(11) NOT NULL,
  `article_name` varchar(11) NOT NULL COMMENT 'Артикул товара'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `article`
--

INSERT INTO `article` (`article_id`, `article_name`) VALUES
(0, '321232'),
(1, '433323'),
(2, '412756'),
(3, '215545'),
(4, '235477'),
(5, '234312'),
(6, '327698'),
(7, '975423'),
(8, '247322'),
(9, '432333'),
(10, '223443'),
(37, '333333'),
(38, '275456'),
(40, '234967');

-- --------------------------------------------------------

--
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `brand_name` varchar(15) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `country` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`brand_name`, `brand_id`, `country`) VALUES
('Adidas', 1, 'Германия'),
('Reebook', 2, 'США'),
('Puma', 3, 'Германия'),
('DC', 4, 'США');

-- --------------------------------------------------------

--
-- Структура таблицы `connects`
--

CREATE TABLE `connects` (
  `connect_id` int(11) NOT NULL,
  `session_id` varchar(32) NOT NULL,
  `connect_token` varchar(255) NOT NULL,
  `connect_user_id` int(11) NOT NULL,
  `connect_token_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `genders`
--

CREATE TABLE `genders` (
  `gender_name` varchar(11) NOT NULL,
  `gender_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `genders`
--

INSERT INTO `genders` (`gender_name`, `gender_id`) VALUES
('female', 1),
('male', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `good_id` int(11) NOT NULL,
  `good_article_id` int(11) NOT NULL,
  `good_size_id` int(11) NOT NULL,
  `good_gender_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`good_id`, `good_article_id`, `good_size_id`, `good_gender_id`) VALUES
(2, 4, 3, 2),
(23, 10, 10, 2),
(34, 10, 2, 1),
(35, 7, 5, 1),
(36, 1, 8, 1),
(37, 10, 3, 1),
(38, 0, 5, 1),
(39, 5, 2, 2),
(40, 1, 8, 1),
(41, 1, 1, 1),
(42, 2, 3, 2),
(43, 7, 8, 1),
(44, 4, 3, 2),
(45, 6, 3, 1),
(46, 6, 5, 1),
(47, 3, 8, 2),
(48, 4, 1, 2),
(49, 7, 6, 2),
(50, 5, 1, 2),
(51, 2, 4, 2),
(52, 8, 5, 2),
(53, 0, 4, 1),
(54, 7, 3, 2),
(55, 2, 6, 2),
(56, 3, 9, 2),
(57, 1, 9, 1),
(58, 3, 5, 1),
(59, 0, 8, 2),
(60, 10, 7, 1),
(61, 9, 3, 1),
(62, 6, 7, 2),
(63, 1, 8, 1),
(64, 7, 1, 2),
(65, 1, 1, 2),
(66, 10, 7, 1),
(67, 3, 7, 1),
(68, 1, 5, 2),
(69, 8, 1, 2),
(70, 1, 5, 1),
(71, 10, 2, 1),
(72, 7, 3, 1),
(73, 4, 10, 2),
(74, 1, 8, 1),
(75, 0, 8, 1),
(76, 6, 5, 1),
(77, 4, 1, 2),
(78, 7, 7, 2),
(79, 8, 4, 1),
(80, 3, 3, 1),
(81, 5, 2, 1),
(82, 5, 1, 2),
(83, 6, 1, 2),
(84, 3, 4, 1),
(85, 7, 3, 1),
(86, 2, 8, 1),
(87, 2, 3, 2),
(88, 4, 4, 2),
(89, 1, 4, 1),
(90, 9, 5, 2),
(91, 0, 5, 1),
(92, 5, 1, 2),
(93, 6, 10, 1),
(94, 7, 1, 1),
(95, 8, 5, 1),
(96, 3, 1, 1),
(97, 5, 2, 1),
(98, 6, 5, 1),
(99, 0, 2, 1),
(100, 1, 7, 2),
(101, 6, 1, 2),
(102, 6, 1, 1),
(103, 8, 3, 2),
(104, 5, 7, 2),
(105, 4, 9, 1),
(106, 9, 2, 1),
(107, 6, 8, 1),
(108, 3, 3, 1),
(109, 0, 9, 1),
(110, 10, 5, 2),
(111, 3, 8, 2),
(112, 4, 3, 1),
(113, 7, 4, 2),
(114, 7, 2, 2),
(115, 4, 5, 1),
(116, 5, 2, 2),
(117, 7, 5, 2),
(118, 8, 9, 1),
(119, 0, 1, 2),
(120, 10, 5, 2),
(121, 9, 6, 1),
(122, 7, 1, 2),
(123, 10, 9, 1),
(124, 10, 2, 1),
(125, 0, 4, 2),
(126, 4, 4, 1),
(127, 2, 4, 1),
(128, 5, 5, 1),
(129, 6, 10, 2),
(130, 4, 9, 1),
(131, 2, 9, 1),
(132, 0, 6, 2),
(133, 5, 4, 2),
(134, 37, 2, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `newitems`
--

CREATE TABLE `newitems` (
  `new_item_id` int(11) NOT NULL,
  `new_item` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `newitems`
--

INSERT INTO `newitems` (`new_item_id`, `new_item`) VALUES
(0, 'Старая коллекция'),
(1, 'Новинка');

-- --------------------------------------------------------

--
-- Структура таблицы `sizes`
--

CREATE TABLE `sizes` (
  `size_id` int(11) NOT NULL,
  `size_number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sizes`
--

INSERT INTO `sizes` (`size_id`, `size_number`) VALUES
(1, '37'),
(2, '38'),
(3, '39'),
(4, '40'),
(5, '41'),
(6, '42'),
(7, '43'),
(8, '44'),
(9, '45'),
(10, '46');

-- --------------------------------------------------------

--
-- Структура таблицы `sneakers`
--

CREATE TABLE `sneakers` (
  `sneakers_id` int(11) NOT NULL,
  `sneakers_name` varchar(255) NOT NULL COMMENT 'Название обуви',
  `sneakers_article_id` int(11) NOT NULL,
  `sneakers_brand_id` int(11) NOT NULL COMMENT 'Бренд обуви',
  `sneakers_gender_id` int(1) NOT NULL COMMENT 'Пол',
  `sneakers_price` int(255) NOT NULL COMMENT 'Цена',
  `sneakers_new` int(11) NOT NULL COMMENT 'Новинка/старая коллекция',
  `sneakers_img` text NOT NULL COMMENT 'Название изображения обуви'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sneakers`
--

INSERT INTO `sneakers` (`sneakers_id`, `sneakers_name`, `sneakers_article_id`, `sneakers_brand_id`, `sneakers_gender_id`, `sneakers_price`, `sneakers_new`, `sneakers_img`) VALUES
(2, 'REEBOK CLASSIC LEATHER', 0, 2, 2, 5500, 1, 'adidas_yeezy'),
(13, 'adidas Originals Handball Spezial', 1, 1, 1, 3700, 0, 'air_jordan_b'),
(14, 'adidas Originals Ozweego', 2, 1, 1, 6350, 1, 'air_jordan_d'),
(20, 'Nike ACG Mountain Fly Low', 3, 2, 2, 7240, 0, 'air_jordan_lb'),
(21, 'PUMA Suede VTG', 4, 3, 2, 3675, 1, 'air_jordan_rb'),
(22, 'PUMA Mirage Mox Michael Lau', 5, 3, 1, 4674, 1, 'air_jordan_w'),
(23, 'DC SHOES Legacy OG', 6, 4, 2, 3290, 1, 'air_jordan_y'),
(24, 'DC SHOES Navigator', 7, 4, 2, 4900, 1, 'air_jordan'),
(25, 'adidas Originals Lxcon W ', 8, 1, 1, 4100, 1, 'nike_air'),
(26, 'Reebok Dmx6 MMXX', 9, 2, 1, 3300, 1, 'puma_s'),
(39, 'DC SHOES E.Tribeka SE', 37, 4, 2, 3600, 0, 'fila'),
(40, 'PUMA Suede Classic XXI', 38, 3, 2, 7000, 0, 'PUMA_Suede_Classic_XXI'),
(42, 'adidas Originals Broomfield', 40, 1, 2, 5800, 0, 'adidas Originals Broomfield');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_login` varchar(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_email`, `user_password`, `admin`) VALUES
(18, 'error', 'aaa@mail.ru', 'cffbad68bb97a6c3f943538f119c992c', 0),
(19, 'ew', 'ew@mail.ru', 'a8f5f167f44f4964e6c998dee827110c', 0),
(20, 'qqq', 'qqq@ee.ru', 'eced110fa1737081f2ea67d875118c62', 0),
(21, 'MoodHood', 'kirill_99-99@mail.ru', 'e05f96828f0cd394514ae36d5101349a', 1),
(69, 'admin123', 'kirillproper@gmail.com', '0192023a7bbd73250516f069df18b500', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD KEY `brend_id` (`brand_id`);

--
-- Индексы таблицы `connects`
--
ALTER TABLE `connects`
  ADD PRIMARY KEY (`connect_id`),
  ADD KEY `connect_user_id` (`connect_user_id`);

--
-- Индексы таблицы `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`gender_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`good_id`),
  ADD KEY `good_article_id` (`good_article_id`,`good_size_id`),
  ADD KEY `good_size_id` (`good_size_id`),
  ADD KEY `good_gender_id` (`good_gender_id`);

--
-- Индексы таблицы `newitems`
--
ALTER TABLE `newitems`
  ADD PRIMARY KEY (`new_item_id`),
  ADD KEY `new_item_id` (`new_item_id`);

--
-- Индексы таблицы `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`size_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Индексы таблицы `sneakers`
--
ALTER TABLE `sneakers`
  ADD PRIMARY KEY (`sneakers_id`),
  ADD KEY `sneakers_brend` (`sneakers_brand_id`),
  ADD KEY `sneakers_gender_id` (`sneakers_gender_id`),
  ADD KEY `snkeakers_new` (`sneakers_new`),
  ADD KEY `sneakers_article_id` (`sneakers_article_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `connects`
--
ALTER TABLE `connects`
  MODIFY `connect_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT для таблицы `genders`
--
ALTER TABLE `genders`
  MODIFY `gender_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `good_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT для таблицы `newitems`
--
ALTER TABLE `newitems`
  MODIFY `new_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `sizes`
--
ALTER TABLE `sizes`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `sneakers`
--
ALTER TABLE `sneakers`
  MODIFY `sneakers_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `connects`
--
ALTER TABLE `connects`
  ADD CONSTRAINT `connects_ibfk_1` FOREIGN KEY (`connect_user_id`) REFERENCES `users` (`user_id`);

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_ibfk_1` FOREIGN KEY (`good_article_id`) REFERENCES `article` (`article_id`),
  ADD CONSTRAINT `goods_ibfk_2` FOREIGN KEY (`good_size_id`) REFERENCES `sizes` (`size_id`),
  ADD CONSTRAINT `goods_ibfk_3` FOREIGN KEY (`good_gender_id`) REFERENCES `genders` (`gender_id`);

--
-- Ограничения внешнего ключа таблицы `sneakers`
--
ALTER TABLE `sneakers`
  ADD CONSTRAINT `sneakers_ibfk_1` FOREIGN KEY (`sneakers_brand_id`) REFERENCES `brands` (`brand_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sneakers_ibfk_2` FOREIGN KEY (`sneakers_gender_id`) REFERENCES `genders` (`gender_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sneakers_ibfk_3` FOREIGN KEY (`sneakers_new`) REFERENCES `newitems` (`new_item_id`),
  ADD CONSTRAINT `sneakers_ibfk_4` FOREIGN KEY (`sneakers_article_id`) REFERENCES `article` (`article_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
