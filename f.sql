-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 15 2018 г., 11:55
-- Версия сервера: 10.1.29-MariaDB
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
-- База данных: `f`
--

-- --------------------------------------------------------

--
-- Структура таблицы `moder`
--

CREATE TABLE `moder` (
  `ID_Moder` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_thema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `moder`
--

INSERT INTO `moder` (`ID_Moder`, `ID_user`, `ID_thema`) VALUES
(1, 3, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `note`
--

CREATE TABLE `note` (
  `ID_note` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `ID_Theme` int(11) NOT NULL,
  `TextOfNote` text NOT NULL,
  `DateOfNote` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `note`
--

INSERT INTO `note` (`ID_note`, `ID_User`, `ID_Theme`, `TextOfNote`, `DateOfNote`) VALUES
(1, 1, 5, 'ÐŸÐµÑ€Ð²Ð°Ñ Ð·Ð°Ð¿Ð¸ÑÑŒ Ð² ÑÑ‚Ð¾Ð¼ Ð¾Ð±ÑÑƒÐ¶Ð´ÐµÐ½Ð¸Ð¸', '2018-04-01 19:23:32'),
(2, 1, 5, 'Ð’Ñ‚Ð¾Ñ€Ð°Ñ Ð·Ð°Ð¿Ð¸ÑÑŒ Ð·Ð´ÐµÑÑŒ', '2018-04-01 19:25:04'),
(3, 3, 5, 'njkashjkldfhjsdl;h', '2018-04-02 01:39:37');

-- --------------------------------------------------------

--
-- Структура таблицы `obsujd`
--

CREATE TABLE `obsujd` (
  `ID_ob` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `Nazvanie` varchar(50) NOT NULL,
  `Opisanie` text NOT NULL,
  `ID_Thema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `obsujd`
--

INSERT INTO `obsujd` (`ID_ob`, `ID_user`, `Nazvanie`, `Opisanie`, `ID_Thema`) VALUES
(5, 1, 'Ð˜Ð³Ñ€Ñ‹', 'sdgwgsdgxgxg', 2),
(9, 2, 'User1', 'Find a friend', 2),
(10, 1, 'Ð‘Ñ€Ð¸Ð³Ð°Ð´Ð°', 'Ð¾Ð±ÑÑƒÐ¶Ð´ÐµÐ½Ð¸Ðµ Ð½Ð° ÑÑ‡ÐµÑ‚ Ð±Ñ€Ð¸Ð³Ð°Ð´Ñ‹', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `razdel`
--

CREATE TABLE `razdel` (
  `ID_Razdel` int(11) NOT NULL,
  `Nazvanie` varchar(50) NOT NULL,
  `Opisanie` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `razdel`
--

INSERT INTO `razdel` (`ID_Razdel`, `Nazvanie`, `Opisanie`) VALUES
(26, 'Ð¤Ð¸Ð»ÑŒÐ¼Ñ‹', 'Ð Ð°Ð·Ð´ÐµÐ» Ð¿Ñ€Ð¾ Ñ„Ð¸Ð»ÑŒÐ¼Ñ‹ Ñ€Ð°Ð·Ð»Ð¸Ñ‡Ð½Ñ‹Ñ… Ð¶Ð°Ð½Ñ€Ð¾Ð²'),
(27, 'Ð˜Ð³Ñ€Ñ‹', 'Ð Ð°Ð·Ð´ÐµÐ» Ð¿Ð¾ÑÐ²ÑÑ‰ÐµÐ½ Ð¸Ð³Ñ€Ð¾Ð²Ð¾Ð¹ Ñ‚ÐµÐ¼Ð°Ñ‚Ð¸ÐºÐµ'),
(28, 'ÐœÑƒÐ»ÑŒÑ‚Ð¸Ð¿Ð»Ð¸ÐºÐ°Ñ†Ð¸Ñ', 'Ð Ð°Ð·Ð´ÐµÐ» Ð¾ Ñ€Ð°Ð·Ð»Ð¸Ñ‡Ð½Ñ‹Ñ… Ð²Ð¸Ð´Ð°Ñ… Ð¼ÑƒÐ»ÑŒÑ‚Ð¸Ð¿Ð»Ð¸ÐºÐ°Ñ†Ð¸Ð¸'),
(29, 'ÐœÑƒÐ·Ñ‹ÐºÐ°', 'Ð Ð°Ð·Ð´ÐµÐ» Ð¿Ñ€Ð¾ Ð¼ÑƒÐ·Ñ‹ÐºÑƒ Ñ€Ð°Ð·Ð»Ð¸Ñ‡Ð½Ñ‹Ñ… Ð¶Ð°Ð½Ñ€Ð¾Ð²');

-- --------------------------------------------------------

--
-- Структура таблицы `tech`
--

CREATE TABLE `tech` (
  `enabl` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tech`
--

INSERT INTO `tech` (`enabl`, `id`) VALUES
(0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `ID_Thema` int(11) NOT NULL,
  `Nazvanie` varchar(50) NOT NULL,
  `Opisanie` text NOT NULL,
  `ID_Razdel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`ID_Thema`, `Nazvanie`, `Opisanie`, `ID_Razdel`) VALUES
(2, 'WOW', 'WOW MMORPG', 27),
(7, 'Ñ€Ñ‹Ð²Ð°Ð²Ñ€Ð²Ð°Ñ€', 'Ñ‹Ð²Ð°Ñ€Ñ‹Ð²Ð°Ñ€Ñ‹Ð²Ð°Ñ€Ð²Ð°Ñ€', 27),
(8, 'RussianFilms', 'Ñ€ÑƒÑÑÐºÐ¾Ðµ ÐºÐ¸Ð½Ð¾', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID_User` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `priv` int(11) NOT NULL,
  `block` tinyint(1) NOT NULL,
  `sQuestion` text NOT NULL,
  `sAnswer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID_User`, `login`, `password`, `mail`, `priv`, `block`, `sQuestion`, `sAnswer`) VALUES
(1, 'adm', '6116afedcb0bc31083935c1c262ff4c9', 'adm@ad.ru', 1, 0, '', ''),
(2, 'us1', '6116afedcb0bc31083935c1c262ff4c9', 'us@u.ru', 2, 0, '', ''),
(3, 'us2', '6116afedcb0bc31083935c1c262ff4c9', 'us2@u.ru', 2, 0, '', ''),
(4, 'us3', '6116afedcb0bc31083935c1c262ff4c9', 'us3@u.ru', 0, 1, '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `moder`
--
ALTER TABLE `moder`
  ADD PRIMARY KEY (`ID_Moder`);

--
-- Индексы таблицы `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`ID_note`);

--
-- Индексы таблицы `obsujd`
--
ALTER TABLE `obsujd`
  ADD PRIMARY KEY (`ID_ob`);

--
-- Индексы таблицы `razdel`
--
ALTER TABLE `razdel`
  ADD PRIMARY KEY (`ID_Razdel`);

--
-- Индексы таблицы `tech`
--
ALTER TABLE `tech`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`ID_Thema`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_User`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `moder`
--
ALTER TABLE `moder`
  MODIFY `ID_Moder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `note`
--
ALTER TABLE `note`
  MODIFY `ID_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `obsujd`
--
ALTER TABLE `obsujd`
  MODIFY `ID_ob` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `razdel`
--
ALTER TABLE `razdel`
  MODIFY `ID_Razdel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `tech`
--
ALTER TABLE `tech`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `ID_Thema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
