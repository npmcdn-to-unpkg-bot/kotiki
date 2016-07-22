-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 23 2016 г., 00:03
-- Версия сервера: 5.5.48
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `phone`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` int(11) NOT NULL,
  `hdr_card` text,
  `desc_card` text
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cards`
--

INSERT INTO `cards` (`id`, `hdr_card`, `desc_card`) VALUES
(1, 'Веб-разработка', 'Текст карты123'),
(2, 'Моб-разработка', 'Текст карты'),
(3, 'Десктоп-разраб', 'Текст карты'),
(4, 'Seo', 'Текст карты'),
(5, 'Поддержка', 'Текст карты'),
(6, 'Заголовок карты6', 'Текст карты'),
(7, 'Заголовок карты7', 'Текст карты'),
(8, 'Заголовок карты8', 'Текст карты'),
(9, 'Заголовок карты9', 'Текст карты'),
(10, 'Заголовок карты10', 'Текст карты');

-- --------------------------------------------------------

--
-- Структура таблицы `fils`
--

CREATE TABLE IF NOT EXISTS `fils` (
  `id` int(11) NOT NULL,
  `id_proj` int(11) DEFAULT NULL,
  `fpath` text,
  `ftitle` text,
  `fhref` text,
  `whtuse` int(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `fils`
--

INSERT INTO `fils` (`id`, `id_proj`, `fpath`, `ftitle`, `fhref`, `whtuse`) VALUES
(1, 1, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(2, 2, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(3, 3, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(4, 3, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(5, 4, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(6, 5, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(7, 5, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(8, 2, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(9, 3, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(10, 1, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(11, 2, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(12, 6, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(13, 4, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(14, 7, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(15, 4, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(16, 2, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(17, 1, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(18, 6, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(19, 8, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0),
(20, 9, 'files/code.zip', 'Скачать файл', 'http://img1.liveinternet.ru/images/attach/c/4//3925/3925523_example.zip', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `imgs`
--

CREATE TABLE IF NOT EXISTS `imgs` (
  `id` int(11) NOT NULL,
  `id_proj` int(11) DEFAULT NULL,
  `fpath` text,
  `ftitle` text,
  `url` text,
  `whtuse` int(2) DEFAULT NULL,
  `thumbUrl` text
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `imgs`
--

INSERT INTO `imgs` (`id`, `id_proj`, `fpath`, `ftitle`, `url`, `whtuse`, `thumbUrl`) VALUES
(1, 1, 'files/img.jpg', 'картинка 1', 'http://img0.joyreactor.cc/pics/post/full/%D0%BA%D0%BE%D1%82%D1%8D-%D0%9A%D0%BB%D0%B8%D0%BA%D0%B0%D0%B1%D0%B5%D0%BB%D1%8C%D0%BD%D0%BE-%D0%BE%D0%B1%D0%BE%D0%B8-%D0%BA%D1%80%D0%B0%D1%81%D0%B8%D0%B2%D1%8B%D0%B5-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-2629498.jpeg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(2, 2, 'files/img.jpg', 'картинка 2', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(3, 3, 'files/img.jpg', 'картинка 3', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(4, 3, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(5, 2, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(6, 2, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(7, 4, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(8, 4, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(9, 5, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(10, 6, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(11, 6, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(12, 7, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(13, 7, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(14, 8, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(15, 8, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(16, 9, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(17, 1, 'files/img.jpg', 'картинка 1', 'http://img0.joyreactor.cc/pics/post/full/%D0%BA%D0%BE%D1%82%D1%8D-%D0%9A%D0%BB%D0%B8%D0%BA%D0%B0%D0%B1%D0%B5%D0%BB%D1%8C%D0%BD%D0%BE-%D0%BE%D0%B1%D0%BE%D0%B8-%D0%BA%D1%80%D0%B0%D1%81%D0%B8%D0%B2%D1%8B%D0%B5-%D0%BA%D0%B0%D1%80%D1%82%D0%B8%D0%BD%D0%BA%D0%B8-2629498.jpeg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(18, 1, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(19, 1, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg'),
(20, 1, 'files/img.jpg', 'картинка 1', 'http://fonday.ru/images/tmp/12/3/original/12319YnxFGTIAzedShbOtklUEyJ.jpg', 0, 'http://www.nokiaplanet.com/uploads/posts/2015-11/1448881894_cute-kitty-360x640.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `proj`
--

CREATE TABLE IF NOT EXISTS `proj` (
  `id` int(11) NOT NULL,
  `hdr_shrt` text,
  `desc_shrt` text,
  `hdr_ful` text,
  `desc_ful` text
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proj`
--

INSERT INTO `proj` (`id`, `hdr_shrt`, `desc_shrt`, `hdr_ful`, `desc_ful`) VALUES
(1, 'Arcona', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне1', 'Полное описание проекта в отдельном окне'),
(2, 'Короткий заголовок проекта2', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне2', 'Полное описание проекта в отдельном окне'),
(4, 'Короткий заголовок проекта4', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне3', 'Полное описание проекта в отдельном окне'),
(5, 'Короткий заголовок проекта5', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне4', 'Полное описание проекта в отдельном окне'),
(6, 'Короткий заголовок проекта6', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне5', 'Полное описание проекта в отдельном окне'),
(7, 'Короткий заголовок проекта71', 'Короткое описание проекта', 'Полный заголовок проекта в отдельном окне6', 'Полное описание проекта в отдельном окне'),
(26, '111', '222', '333', '444'),
(32, '11111', '1', '11', '1'),
(33, '2', '2', '2', '2'),
(34, '3', '3', '3', '3'),
(35, '4', '4', '4', '4'),
(36, '1', '1', '1', '1'),
(37, '1', '1', '1', '1'),
(38, '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Структура таблицы `proj_cards`
--

CREATE TABLE IF NOT EXISTS `proj_cards` (
  `id` int(11) NOT NULL,
  `id_proj` int(11) DEFAULT NULL,
  `id_card` int(11) DEFAULT NULL,
  `num` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proj_cards`
--

INSERT INTO `proj_cards` (`id`, `id_proj`, `id_card`, `num`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 4),
(4, 4, 1, 2),
(5, 5, 3, 1),
(6, 6, 3, 2),
(7, 7, 5, 1),
(14, 26, 1, 5),
(20, 32, 2, 1),
(21, 33, 2, 1),
(22, 34, 2, 1),
(23, 35, 2, 1),
(24, 36, 4, 1),
(25, 37, 6, 1),
(26, 38, 6, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `proj_tags`
--

CREATE TABLE IF NOT EXISTS `proj_tags` (
  `id` int(11) NOT NULL,
  `id_proj` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proj_tags`
--

INSERT INTO `proj_tags` (`id`, `id_proj`, `id_tag`) VALUES
(1, 1, 1),
(2, 1, 1),
(3, 1, 1),
(4, 1, 1),
(5, 1, 1),
(6, 1, 1),
(7, 1, 1),
(8, 1, 1),
(9, 1, 1),
(10, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `proj_id` int(11) DEFAULT NULL,
  `tag` text,
  `tag_pri` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tags`
--

INSERT INTO `tags` (`id`, `proj_id`, `tag`, `tag_pri`) VALUES
(1, 1, 'javascript', 0),
(2, 1, 'javascript', 0),
(3, 1, 'javascript', 0),
(4, 1, 'javascript', 0),
(5, 1, 'javascript', 0),
(6, 1, 'javascript', 0),
(7, 1, 'javascript', 0),
(8, 1, 'javascript', 0),
(9, 1, 'javascript', 0),
(10, 1, 'javascript', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `usr_admin`
--

CREATE TABLE IF NOT EXISTS `usr_admin` (
  `id` int(11) NOT NULL,
  `email` text,
  `pass` text
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `usr_admin`
--

INSERT INTO `usr_admin` (`id`, `email`, `pass`) VALUES
(1, 'email@gmail.com', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fils`
--
ALTER TABLE `fils`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proj`
--
ALTER TABLE `proj`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proj_cards`
--
ALTER TABLE `proj_cards`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proj_tags`
--
ALTER TABLE `proj_tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `usr_admin`
--
ALTER TABLE `usr_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `fils`
--
ALTER TABLE `fils`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT для таблицы `proj`
--
ALTER TABLE `proj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT для таблицы `proj_cards`
--
ALTER TABLE `proj_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT для таблицы `proj_tags`
--
ALTER TABLE `proj_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `usr_admin`
--
ALTER TABLE `usr_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
