-- phpMyAdmin SQL Dump
-- version 3.4.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 06 2012 г., 07:52
-- Версия сервера: 5.5.15
-- Версия PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- --------------------------------------------------------

--
-- Структура таблицы `bwf_tagcloud`
--

CREATE TABLE IF NOT EXISTS `bwf_tagcloud` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` char(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `bwf_tagcloud`
--

INSERT INTO `bwf_tagcloud` (`id`, `tag`) VALUES
(5, 'extjs'),
(3, 'java'),
(4, 'javascript'),
(6, 'jquery'),
(2, 'json'),
(7, 'mysql'),
(1, 'php');

-- --------------------------------------------------------

--
-- Структура таблицы `bwf_tagcloud_aggregate`
--

CREATE TABLE IF NOT EXISTS `bwf_tagcloud_aggregate` (
  `id_resource` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL,
  KEY `id_resource` (`id_resource`,`id_tag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `bwf_tagcloud_aggregate`
--

INSERT INTO `bwf_tagcloud_aggregate` (`id_resource`, `id_tag`) VALUES
(1, 1),
(2, 1),
(3, 1),
(32, 6),
(33, 6),
(42, 2);
