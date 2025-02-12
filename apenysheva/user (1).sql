-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Окт 01 2024 г., 13:31
-- Версия сервера: 8.0.17
-- Версия PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `F` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `I` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `O` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birth` date NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `registration` datetime NOT NULL,
  `id_city` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `role` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `F`, `I`, `O`, `email`, `birth`, `login`, `password`, `registration`, `id_city`, `status`, `role`) VALUES
(1, 'Оськина', 'Ксения', 'Юрьевна', 'osk@mail.ru', '2012-01-20', 'ksi111', 'osk222', '2024-09-17 07:27:38', 56, 1, 1),
(2, 'Ткачев', 'Андрей', 'Андреевич', 'and@mail.ru', '2026-02-20', 'jdhfjk', '46578vjvf', '2024-07-22 18:08:05', 56, 1, 1),
(3, 'Апёнышева', 'Александра', 'Игоревна', 'fdhd@gmail.com', '2019-03-20', 'firfjr', '65758ff', '2024-03-19 09:51:00', 38, 1, 1),
(4, 'Шубин', 'Владимир', 'Олегович', 'dfsgdh@mail.ru', '2012-12-20', 'fjfjfede', '75920csks', '2024-09-25 07:00:00', 78, 1, 1),
(5, 'Нежурко', 'Игорь', 'Андреевич', 'gdfjf@mail.ru', '2014-05-20', 'hswoeur', '22mjfk33', '2024-08-13 09:59:29', 14, 1, 1),
(6, 'Иванов', 'Петр', 'Олегович', 'rrrf@mail.ru', '0000-00-00', 'fhfrfjdke', '5566ddd', '2024-06-19 16:24:36', 52, 1, 1),
(7, 'Смирнова', 'Анна', 'Артуровна', 'g88@mail.ru', '2027-02-20', 'jfjkjg', 'rww77', '2024-09-22 06:00:00', 38, 1, 1),
(8, 'Смирнов', 'Геннадий', 'Игоревич', 'ddd44@mail.ru', '0000-00-00', 'jg9999', 'DDD56574', '2024-06-18 00:00:00', 52, 1, 1),
(9, 'Сидоров', 'Виталий', 'Игоревич', 'FFF6@mail.ru', '0000-00-00', 'hrfbekrhfe44', 'njdjnxsj5555', '2024-02-20 05:27:35', 78, 1, 1),
(10, 'Аленкина', 'Ольга', 'Викторовна', 'gggg777@mail.ru', '0000-00-00', 'gdgh888', 'alen666', '2024-06-12 09:23:30', 78, 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
