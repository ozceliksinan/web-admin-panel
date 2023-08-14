-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 09 Mar 2021, 12:42:59
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `panel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `admins_id` int(11) NOT NULL,
  `admins_namesurname` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `admins_file` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `admins_username` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `admins_pass` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `admins_status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `admins_must` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`admins_id`, `admins_namesurname`, `admins_file`, `admins_username`, `admins_pass`, `admins_status`, `admins_must`) VALUES
(15, 'Sinan Özçelik', '60476b5dc08c9.png', 'sinanozcelik', '0eaacd9865973977783490995dc412bc', '1', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `settings_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `settings_key` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `settings_value` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `settings_type` varchar(50) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `settings_must` int(3) NOT NULL,
  `settings_delete` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `settings_status` enum('0','1') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `settings`
--

INSERT INTO `settings` (`settings_id`, `settings_description`, `settings_key`, `settings_value`, `settings_type`, `settings_must`, `settings_delete`, `settings_status`) VALUES
(1, 'Site Başlığı', 'title', 'Sinan Özçelik - sinanozcelik.com', 'text', 2, '0', '1'),
(2, 'Site Açıklama', 'description', 'Sinan Özçelik - sinanozcelik.com', 'text', 0, '0', '1'),
(3, 'Site Logo', 'logo', '60476a3e38b54.png', 'file', 3, '0', '1'),
(4, 'Fav Icon', 'icon', '60476a49d9f8a.png', 'file', 5, '0', '1'),
(5, 'Site Anahtar Kelimeleri', 'keywords', 'Sinan Özçelik - sinanozcelik.com', 'text', 6, '0', '1'),
(7, 'Mail Adresi', 'email', 'info@sinanozcelik.com', 'text', 13, '0', '1'),
(18, 'Site Yazarı', 'author', 'Sinan Özçelik - sinanozcelik.com', 'text', 14, '0', '1'),
(19, 'Copyright', 'copyright', 'Copyright ©sinanozcelik.com 2020 | Tüm Hakları Saklıdır.', 'text', 15, '0', '1'),
(25, 'Site Publisher', 'publisher', 'VS 2020', 'text', 1, '0', '1'),
(26, 'Ana Sayfa Banner Açıklaması', 'banner', 'Sinan Özçelik - sinanozcelik.com', 'text', 4, '0', '1'),
(27, 'twitter:card', 'twitter:card', 'twitter:card', 'text', 7, '0', '1'),
(28, 'twitter:site', 'twitter:site', 'twitter:site', 'text', 8, '0', '1'),
(29, 'twitter:title', 'twitter:title', 'twitter:title', 'text', 10, '0', '1'),
(30, 'twitter:description', 'twitter:description', 'twitter:description', 'text', 11, '0', '1'),
(31, 'twitter:creator', 'twitter:creator', 'twitter:creator', 'text', 12, '0', '1'),
(32, 'twitter:domain', 'twitter:domain', 'twitter:domain', 'text', 9, '0', '1'),
(33, 'og:title', 'og:title', 'og:title', 'text', 16, '0', '1'),
(34, 'og:description', 'og:description', 'Sinan Özçelik - sinanozcelik.com', 'text', 17, '0', '1'),
(35, 'og:url', 'og:url', 'sinanozcelik.com', 'text', 18, '0', '1'),
(36, 'og:image', 'og:image', 'og:imageurl', 'text', 19, '0', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sliders`
--

CREATE TABLE `sliders` (
  `sliders_id` int(11) NOT NULL,
  `sliders_onyazi` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sliders_content` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sliders_button` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sliders_buttonlink` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sliders_file` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `sliders_must` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `teknoloji`
--

CREATE TABLE `teknoloji` (
  `teknoloji_id` int(11) NOT NULL,
  `teknoloji_metadesc` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_metakeyword` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_recent` enum('Aktif','Pasif') CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_tags` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_title` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_file` varchar(250) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_onyazi` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_content` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `teknoloji_must` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorumlar_id` int(11) NOT NULL,
  `yorumlar_content` text CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `yorumlar_must` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admins_id`);

--
-- Tablo için indeksler `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Tablo için indeksler `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`sliders_id`);

--
-- Tablo için indeksler `teknoloji`
--
ALTER TABLE `teknoloji`
  ADD PRIMARY KEY (`teknoloji_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorumlar_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `admins_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `sliders`
--
ALTER TABLE `sliders`
  MODIFY `sliders_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `teknoloji`
--
ALTER TABLE `teknoloji`
  MODIFY `teknoloji_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorumlar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
