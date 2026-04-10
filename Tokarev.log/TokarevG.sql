-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 10 2026 г., 09:03
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `TokarevG`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Articles`
--

CREATE TABLE `Articles` (
  `ID` int UNSIGNED NOT NULL,
  `AutorID` int UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Text` text NOT NULL,
  `Created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Articles`
--

INSERT INTO `Articles` (`ID`, `AutorID`, `Name`, `Text`, `Created_at`, `Img`) VALUES
(1, 1, 'Статья пользователя', 'ТЕКСТ. ВАЖНЫЙ ТЕКСТ', '2026-03-20 09:09:24', NULL),
(2, 2, 'Отредактированная статья', 'TextText', '2026-03-20 09:09:24', NULL),
(3, 1, 'rename', 'retext', '2026-03-20 09:09:38', NULL),
(5, 2, 'Новая статья22', 'Новый текст22', '2026-03-27 12:28:22', NULL),
(7, 2, 'Новая статья', 'Новый текст', '2026-03-27 12:28:25', NULL),
(8, 1, 'Новая статья', 'Текст новой статьи', '2026-04-03 09:20:43', NULL),
(9, 1, 'Новая статья', 'Текст новой статьи', '2026-04-03 09:20:50', NULL),
(11, 1, 'Новая статья11', 'Текст новой статьи11', '2026-04-06 11:06:47', NULL),
(13, 7, '111', ' 111', '2026-04-08 09:35:45', 'uploads/котэ.jpg'),
(15, 7, '22222', ' 22222', '2026-04-08 09:46:38', NULL),
(16, 7, 'Пёс', ' Пёс', '2026-04-08 09:48:38', 'uploads/Пёсэ.jpg'),
(17, 7, '123123123', ' 123123123', '2026-04-08 09:59:46', NULL),
(19, 6, '11122', ' 12312', '2026-04-08 11:11:21', 'uploads/Пёсэ.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `ID` int UNSIGNED NOT NULL,
  `Nickname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `IsConfirmed` tinyint(1) NOT NULL DEFAULT '0',
  `Role` enum('user','admin') NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `auth_token` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`ID`, `Nickname`, `email`, `IsConfirmed`, `Role`, `password_hash`, `auth_token`, `created_at`) VALUES
(1, 'Ronald', 'poipoipoi@mail.ru', 1, 'user', 'qwertyuio', 'aSr3werq3', '2026-03-18 11:13:11'),
(2, 'Chertyara', 'hellhound2017@mail.ru', 1, 'admin', 'qqqwerdsjh', 'gtgtrdfc56', '2026-03-18 11:15:15'),
(3, 'YYDyY', 'dsdsdcscs@vvv.ru', 1, 'user', '$2y$10$qcW1v4v/6w/mXb87Dlok2On1X4ty5duNBp.IypfeQ8VZqSwV3ept2', '800e406a0cf0f7381febf0e7e6661dee8fe88e50b3ebffaf0756b0b1d1264f93e0689ebb19fc8927', '2026-04-03 09:31:13'),
(4, '1122112', 'dsdsdcscs@vvvr.ru', 1, 'user', '$2y$10$c5ZxZzaJyW4OQnFL0BScsuQ.WcFZuqt1laW8qr/zVFirBwSUMdf2u', 'b3ca0aa129b04d2552783224446201250d8a8de32c705baff6b73d98b548e8380c0af198b6a0ea5c', '2026-04-03 09:40:02'),
(5, '00009', '1231@sds.ru', 1, 'user', '$2y$10$VUOwcoGVfbcSWx5b21qQC.Dng2gHx/kcplBDFeyco.hX5l9qGTgBO', '3827f872ac585bb7aff461af235bc2aca5f7f26078b2b2710b0025bed73e49a782a8f46bbe1d05df', '2026-04-03 10:56:21'),
(6, '123', '123@e.ru', 1, 'user', '$2y$10$ZOxKOUxkEya3oYq8Yge/nu92r3mWYs3m4HNhanWMLnUeaTNP/0TIG', '86675626050838f5a05bae8afa2739d6f9e3fa2f8de524e9707101c6833e11bfb3fed6a016b24cd2', '2026-04-06 11:08:58'),
(7, '321', '321@ru.ru', 1, 'user', '$2y$10$D/zP0ViHXKw00ApUskLtiOGvAou.UZ6ftwcDvAVNlZKpgRhmXSRxq', 'ed724d3d65ba7047c441b2f706c1178bbd9ad64d5d615d4b7729b22b9466bf8386b9e6e4ba5d09bd', '2026-04-08 09:10:57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Articles`
--
ALTER TABLE `Articles`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ArticlesUser` (`AutorID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nickname` (`Nickname`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Articles`
--
ALTER TABLE `Articles`
  MODIFY `ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `ID` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Articles`
--
ALTER TABLE `Articles`
  ADD CONSTRAINT `ArticlesUser` FOREIGN KEY (`AutorID`) REFERENCES `users` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
