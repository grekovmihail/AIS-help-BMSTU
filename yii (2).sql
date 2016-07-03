-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 11 2016 г., 15:29
-- Версия сервера: 10.1.9-MariaDB
-- Версия PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bd`
--

CREATE TABLE `bd` (
  `id_marshruta` int(5) NOT NULL,
  `id_resursa` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bdresurs`
--

CREATE TABLE `bdresurs` (
  `text` varchar(256) DEFAULT NULL,
  `id_resursa` int(5) NOT NULL,
  `moderator_id_m` int(5) NOT NULL,
  `BD_id_marshruta` int(5) NOT NULL,
  `BD_id_resursa` int(255) NOT NULL,
  `aud` varchar(25) DEFAULT NULL,
  `remont` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bdresurss`
--

CREATE TABLE `bdresurss` (
  `id_resursa` int(5) NOT NULL,
  `aud` varchar(12) DEFAULT NULL,
  `remont` varchar(125) DEFAULT NULL,
  `text` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bdresurss`
--

INSERT INTO `bdresurss` (`id_resursa`, `aud`, `remont`, `text`) VALUES
(1, '431', 'Ремонт', 'с 1-го по 13 мая'),
(2, '422ю', 'Ремонт', 'с 6-го по 18-е февраля'),
(3, '422ю', 'Ремонт', 'с 6-го по 18-е февраля');

-- --------------------------------------------------------

--
-- Структура таблицы `bd_marshrut`
--

CREATE TABLE `bd_marshrut` (
  `id_marshruta` int(5) NOT NULL,
  `username` varchar(125) NOT NULL,
  `name` varchar(125) DEFAULT NULL,
  `A` varchar(125) DEFAULT NULL,
  `B` varchar(125) NOT NULL,
  `text` varchar(125) DEFAULT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bd_marshrut`
--

INSERT INTO `bd_marshrut` (`id_marshruta`, `username`, `name`, `A`, `B`, `text`, `id`) VALUES
(1, '432432', NULL, NULL, '321', NULL, 1),
(2, '432432', NULL, NULL, '412', NULL, 1),
(3, '432432', NULL, NULL, '321', 'Куда путь держишь,путник?', 1),
(4, '432432', NULL, NULL, '321', 'Куда путь держишь,путник?', 1),
(5, '432432', NULL, NULL, '321', 'Куда путь держишь,путник?', 1),
(6, '432432', NULL, NULL, '321', 'Куда путь держишь,путник?', 1),
(7, '432432', NULL, NULL, '311', 'Куда путь держишь,путник?', 1),
(8, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице', 1),
(9, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице', 1),
(10, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpeg'' alt=''Лестница'''' />', 1),
(11, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(12, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''fon.jpg'' alt=''Лестница'''' />', 1),
(13, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''fon.jpg'' alt=''Лестница'''' />', 1),
(14, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''fon2.gif'' alt=''Лестница'''' />', 1),
(15, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(16, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(17, '432432', NULL, NULL, '501ю', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(18, '432432', NULL, NULL, '321', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(19, '432432', NULL, NULL, '321ю', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(20, '432432', NULL, NULL, '422ю', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(21, '432432', NULL, NULL, '922', 'Пройдите до главной лестнице <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(22, '432432', NULL, NULL, '501ю', 'Сложнооо', 1),
(23, '432432', NULL, NULL, '501ю', 'Сложнооо', 1),
(24, '432432', NULL, NULL, 'ывпыпып', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(25, '432432', NULL, NULL, 'gswgsrh', 'нет', 1),
(26, '432432', NULL, NULL, '104', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />', 1),
(27, '432432', NULL, NULL, '456151', 'нет', 1),
(28, '432432', NULL, NULL, '321', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(29, '432432', NULL, NULL, '321', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(30, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(31, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(32, '432432', NULL, NULL, '212', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 2 этажа  и поверните налево', 1),
(33, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(34, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(35, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(36, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(37, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(38, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(39, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(40, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(41, '432432', NULL, NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(42, '432432', NULL, NULL, '415', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 4 этажа  и поверните налево', 1),
(43, '432432', NULL, NULL, '321', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(44, '432432', 'Array432432', NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 1),
(45, '432432', '5432432', NULL, '514', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 5 этажа  и поверните налево', 1),
(46, 'misha', '3misha', NULL, '312', 'Пройдите до главной лестницы <img src=''bmstu_plan.jpg'' alt=''Лестница'''' />Поднимитесь до 3 этажа  и поверните налево', 57);

-- --------------------------------------------------------

--
-- Структура таблицы `moderator`
--

CREATE TABLE `moderator` (
  `username_m` varchar(16) NOT NULL,
  `email_m` varchar(255) DEFAULT NULL,
  `password_m` varchar(32) NOT NULL,
  `id_m` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `username` varchar(16) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`username`, `email`, `password`, `id`) VALUES
('432432', 'admin', 'admin', 1),
('kochka', 'kochka', 'kochka', 3),
('kochka2', 'kochka', 'kochka2', 5),
('demo', 'demo', 'demo', 6),
('jjj', 'admin', 'admin', 7),
('1', 'admin', 'admin', 8),
('23', 'admin', 'admin', 9),
('3123', 'admin', 'admin', 10),
('treyury', 'admin', 'admin', 11),
('rtqrtt4', 'admin', 'admin', 12),
('gdreg', 'admin', 'admin', 14),
('tq4tyg5yte', 'admin', 'admin', 15),
('jyhtrgerfweretgy', 'admin', 'admin', 16),
('rehthf', 'admin', 'admin', 17),
('rwte', 'admin', 'admin', 18),
('rgd', 'admin', 'admin', 19),
('grfc', 'admin', 'admin', 20),
('fvbdf', 'admin', 'admin', 21),
('gdfgfdg', 'admin', 'admin', 22),
('fesgr', 'admin', 'admin', 23),
('grgdr', 'admin', 'admin', 24),
('gdcfgdg', 'admin', 'admin', 25),
('bcgcb', 'admin', 'admin', 26),
('bcgbcgcb', 'admin', 'admin', 27),
('grdgdgrdg', 'admin', 'admin', 28),
('gdcfgdfg', 'admin', 'admin', 29),
('hfghgfhfgh', 'admin', 'admin', 30),
('gdfdgfdg', 'admin', 'admin', 31),
('gdcgdfgfdgd', 'admin', 'admin', 32),
('ertete3tre', 'admin', 'admin', 33),
('terete', 'admin', 'admin', 34),
('ergedge', 'admin', 'admin', 35),
('tertte', 'admin', 'admin', 36),
('tretetet3te3t', 'admin', 'admin', 37),
('gregreger', 'admin', 'admin', 38),
('fesgesgseges', 'admin', 'admin', 39),
('пукпврвкр', 'admin', 'admin', 40),
('rgrdhdrhdr', 'admin', 'admin', 41),
('Grekov', 'grekov@mail.ru', '45091847', 42),
('GR', 'GR@mail.ru', 'GR', 44),
('GR2', 'GR@mail.ru', 'GR2', 46),
('GR3', 'GR@mail.ru', 'GR', 47),
('GR32', 'GR32@mail.ru', 'GR', 48),
('321', 'GR@mail.ru', 'GR', 52),
('great', 'great@mail.ru', 'great', 53),
('grek', 'grek@mail.ru', 'grek', 54),
('efsfdv', 'fesfz@mail.ru', 'faefa', 55),
('faegeg', 'gesgee@mail.ru', 'gseges', 56),
('misha', 'misha@mail.ru', 'misha', 57),
('Mihailo', 'Mihailo@mail.ru', 'Mihailo', 58);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bd`
--
ALTER TABLE `bd`
  ADD PRIMARY KEY (`id_marshruta`,`id_resursa`);

--
-- Индексы таблицы `bdresurs`
--
ALTER TABLE `bdresurs`
  ADD PRIMARY KEY (`id_resursa`,`moderator_id_m`,`BD_id_marshruta`,`BD_id_resursa`),
  ADD KEY `fk_BD resurs_moderator1` (`moderator_id_m`),
  ADD KEY `fk_BD resurs_BD1` (`BD_id_marshruta`,`BD_id_resursa`);

--
-- Индексы таблицы `bdresurss`
--
ALTER TABLE `bdresurss`
  ADD PRIMARY KEY (`id_resursa`),
  ADD UNIQUE KEY `id_resursa` (`id_resursa`);

--
-- Индексы таблицы `bd_marshrut`
--
ALTER TABLE `bd_marshrut`
  ADD PRIMARY KEY (`id_marshruta`),
  ADD UNIQUE KEY `id_marshruta` (`id_marshruta`);

--
-- Индексы таблицы `moderator`
--
ALTER TABLE `moderator`
  ADD PRIMARY KEY (`id_m`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bdresurss`
--
ALTER TABLE `bdresurss`
  MODIFY `id_resursa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `bd_marshrut`
--
ALTER TABLE `bd_marshrut`
  MODIFY `id_marshruta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bdresurs`
--
ALTER TABLE `bdresurs`
  ADD CONSTRAINT `fk_BD resurs_BD1` FOREIGN KEY (`BD_id_marshruta`,`BD_id_resursa`) REFERENCES `bd` (`id_marshruta`, `id_resursa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_BD resurs_moderator1` FOREIGN KEY (`moderator_id_m`) REFERENCES `moderator` (`id_m`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
