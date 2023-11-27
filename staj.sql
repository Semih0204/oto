-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 Tem 2023, 14:35:22
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `staj`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `branches`
--

CREATE TABLE `branches` (
  `id` int(11) UNSIGNED NOT NULL,
  `image_url` varchar(255) DEFAULT NULL COMMENT 'Şube resmi',
  `name` varchar(100) DEFAULT NULL COMMENT 'Şube ismi',
  `email` varchar(30) NOT NULL,
  `adress` varchar(255) DEFAULT NULL COMMENT 'Şube adresi',
  `phone1` varchar(30) DEFAULT NULL COMMENT 'Şube sabit telefon-1',
  `phone2` varchar(30) DEFAULT NULL COMMENT 'Şube sabit telefon-2',
  `gsm1` varchar(30) DEFAULT NULL COMMENT 'Şube Gsm-1',
  `gsm2` varchar(30) DEFAULT NULL COMMENT 'Şube Gsm-2',
  `province` varchar(50) DEFAULT NULL COMMENT 'Şube İl',
  `district` varchar(50) DEFAULT NULL COMMENT 'Şube İlçe',
  `instagram` varchar(255) DEFAULT NULL COMMENT 'Şube instagram ',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'Şube facebook',
  `twitter` varchar(255) DEFAULT NULL COMMENT 'Şube twitter',
  `pinterest` varchar(255) DEFAULT NULL COMMENT 'Şube pinterest',
  `linkedin` varchar(255) DEFAULT NULL COMMENT 'Şube linkedin',
  `mapCode` varchar(255) DEFAULT NULL COMMENT 'Şube Google Map kodu',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `branches`
--

INSERT INTO `branches` (`id`, `image_url`, `name`, `email`, `adress`, `phone1`, `phone2`, `gsm1`, `gsm2`, `province`, `district`, `instagram`, `facebook`, `twitter`, `pinterest`, `linkedin`, `mapCode`, `isActive`, `createdAt`) VALUES
(12, 'sube1.jpg', 'Merkez', '', 'Kurtuluş Mah. Adnan Menderes Bul. , 2015. Sk. Erdem Apt D:No:8 Kat:1', '0(532) 203-35-31', '', '', '', 'Aydın', 'Efeler', '', '', '', '', '', '', 1, '2021-05-27 17:41:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) DEFAULT NULL COMMENT 'Müşteri resmi',
  `name` varchar(30) DEFAULT NULL COMMENT 'Müşteri ismi ',
  `surname` varchar(30) DEFAULT NULL COMMENT 'Müşterinin soyismi',
  `birthday` date DEFAULT NULL COMMENT 'Müşterinin doğum tarihi',
  `gender` tinyint(4) DEFAULT NULL COMMENT '1-Kadın    /     2- Erkek',
  `description` varchar(255) NOT NULL,
  `jobID` varchar(20) DEFAULT NULL COMMENT 'Müşterinin mesleği',
  `email` varchar(30) DEFAULT NULL COMMENT 'Müşteri email adresi',
  `gsm1` varchar(30) DEFAULT NULL COMMENT 'Müşterinin cep telefonu numarası',
  `gsm2` varchar(30) DEFAULT NULL COMMENT 'Müşterinin cep telefonu numarası yedek',
  `password` varchar(255) DEFAULT NULL COMMENT 'Müşteri giriş şifresi',
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `report_dashboard`
--

CREATE TABLE `report_dashboard` (
  `id` int(11) NOT NULL,
  `service_number` int(3) NOT NULL,
  `branch_number` int(3) NOT NULL,
  `customer_number` int(3) NOT NULL,
  `personel_number` int(3) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `this_week_bookings` int(4) NOT NULL,
  `today_bookings` int(4) NOT NULL,
  `tomorrow_bookings` int(4) NOT NULL,
  `this_month_bookings` int(11) NOT NULL,
  `completed_bookings` int(11) NOT NULL,
  `be_completed_bookings` int(5) NOT NULL,
  `be_confirm_bookings` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `report_dashboard`
--

INSERT INTO `report_dashboard` (`id`, `service_number`, `branch_number`, `customer_number`, `personel_number`, `company_name`, `this_week_bookings`, `today_bookings`, `tomorrow_bookings`, `this_month_bookings`, `completed_bookings`, `be_completed_bookings`, `be_confirm_bookings`) VALUES
(1, 8, 1, 205, 3, 'Masal Kılıç Güzellik Merkezi', 0, 0, 0, 0, 20, 0, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_url` varchar(255) DEFAULT NULL COMMENT 'Hizmet ile ilgili görsel',
  `name` varchar(100) DEFAULT NULL COMMENT 'Hizmet İsmi',
  `time` int(11) DEFAULT NULL COMMENT 'Hizmet süresi',
  `primPuan` varchar(255) DEFAULT NULL COMMENT 'Servis prim puanı',
  `price` double(10,2) DEFAULT NULL COMMENT 'Hizmet fiyatı',
  `description` varchar(255) DEFAULT NULL COMMENT 'Açıklama',
  `rank` int(11) NOT NULL COMMENT 'Sıralama',
  `isActive` tinyint(4) DEFAULT NULL COMMENT 'Hizmet aktif mi_?',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'Oluşturulma tarihi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `services`
--

INSERT INTO `services` (`id`, `image_url`, `name`, `time`, `primPuan`, `price`, `description`, `rank`, `isActive`, `createdAt`) VALUES
(65, 'newvolume-1.jpg', 'Lazer Epilasyon', 45, '100', 250.00, 'Lazer Epilasyon', 0, 1, '2021-05-27 16:45:52'),
(66, 'default.jpg', 'Protez Tırnak', 60, '100', 100.00, 'Açıklama', 0, 1, '2021-05-29 10:56:04'),
(67, 'default.jpg', 'Microblading', 60, '100', 100.00, 'Açıklama', 0, 1, '2021-05-29 10:56:39'),
(68, 'default.jpg', 'İpek Kirpik', 60, '100', 11.00, 'a', 0, 1, '2021-05-29 10:57:00'),
(69, 'default.jpg', 'Cilt Bakımı', 60, '100', 11.00, 'a', 0, 1, '2021-05-29 10:57:18'),
(70, 'default.jpg', 'Medikal Manikür', 60, '100', 11.00, 'a', 0, 1, '2021-05-29 10:57:41'),
(71, 'default.jpg', 'Medikal Pedikür', 60, '100', 12.00, 'aa', 0, 1, '2021-05-29 10:58:04'),
(72, 'default.jpg', 'Kirpik Lifting', 60, '100', 2.00, 'aa', 0, 1, '2021-05-29 10:58:25');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `settings_general`
--

CREATE TABLE `settings_general` (
  `id` int(10) UNSIGNED NOT NULL,
  `companyName` varchar(250) NOT NULL,
  `logo_url` varchar(255) DEFAULT NULL COMMENT 'Site Logosu',
  `email` varchar(100) NOT NULL,
  `slogan` text DEFAULT NULL COMMENT 'Slogan',
  `mission` text DEFAULT NULL COMMENT 'Misyon',
  `vision` text DEFAULT NULL COMMENT 'Vizyon',
  `phone1` varchar(30) DEFAULT NULL COMMENT 'Sabit Telefon',
  `phone2` varchar(30) DEFAULT NULL COMMENT 'Sabit Telefon',
  `fax1` varchar(30) DEFAULT NULL COMMENT 'Fax Numarası',
  `fax2` varchar(30) DEFAULT NULL COMMENT 'Fax Numarası',
  `gsm1` varchar(30) DEFAULT NULL COMMENT 'Gsm Numarası',
  `gsm2` varchar(30) DEFAULT NULL COMMENT 'Gsm Numarası',
  `adress` varchar(255) DEFAULT NULL COMMENT 'Adres',
  `province` varchar(50) DEFAULT NULL COMMENT 'İl',
  `district` varchar(50) DEFAULT NULL COMMENT 'İlçe',
  `workingHours` varchar(255) DEFAULT NULL COMMENT 'Mesai saatleri ile ilgili genel bilgilendirme',
  `instagram` varchar(255) DEFAULT NULL COMMENT 'İşletmenin Resmi İnstagram Sayfası',
  `facebook` varchar(255) DEFAULT NULL COMMENT 'İşletmenin Resmi Facebook Sayfası',
  `twitter` varchar(255) DEFAULT NULL COMMENT 'İşletmenin Resmi Twitter Sayfası',
  `pinterest` varchar(255) DEFAULT NULL COMMENT 'İşletmenin Resmi Pinterest Sayfası',
  `linkedin` varchar(255) DEFAULT NULL COMMENT 'İşletmenin Resmi Linkedin Sayfası',
  `title` varchar(255) DEFAULT NULL COMMENT 'Başlık',
  `url` varchar(255) DEFAULT NULL COMMENT 'Site Adresi',
  `description` text DEFAULT NULL COMMENT 'Açıklama',
  `author` varchar(255) DEFAULT NULL COMMENT 'Yazar',
  `keywords` text DEFAULT NULL COMMENT 'Amahtar Kelimeler',
  `googleAnalystic` varchar(255) DEFAULT NULL COMMENT 'Google Analiystic Kodu',
  `googleMap` text NOT NULL,
  `createdAt` datetime DEFAULT current_timestamp() COMMENT 'Oluşturulma Tarihi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `settings_general`
--

INSERT INTO `settings_general` (`id`, `companyName`, `logo_url`, `email`, `slogan`, `mission`, `vision`, `phone1`, `phone2`, `fax1`, `fax2`, `gsm1`, `gsm2`, `adress`, `province`, `district`, `workingHours`, `instagram`, `facebook`, `twitter`, `pinterest`, `linkedin`, `title`, `url`, `description`, `author`, `keywords`, `googleAnalystic`, `googleMap`, `createdAt`) VALUES
(1, 'Masal Kılıç Güzellik Merkezi', 'masal-1.png', 'parskod@gmail.com', '', '', '', '0(532) 203-35-31', '', '', '', '', '', 'Kurtuluş Mah. Adnan Menderes Bul. , 2015. Sk. Erdem Apt D:No:8 Kat:1', 'Aydın', 'Efeler', 'Hafta İçi 08:00-18:00 - Cumartesi-Pazar 10:00-23:00', 'https://instagram.com/', 'https://www.facebook.com/', 'http://twitter.com', 'http://pinterest.com', 'http://linkedin.com', 'Uzman Personel, Kaliteli Hizmet', 'http://masalkilicguzellikmerkezi.com/', 'Randevu Yönetim Sistemi', 'ParsKod', 'Randevu', 'Ua-009900', 'Code', '2020-08-15 09:34:04');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL COMMENT 'Personel Resmi',
  `name` varchar(30) DEFAULT NULL,
  `surname` varchar(30) DEFAULT NULL,
  `gsm1` varchar(50) NOT NULL,
  `gsm2` varchar(50) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `isActive` tinyint(4) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `image_url`, `name`, `surname`, `gsm1`, `gsm2`, `email`, `password`, `isActive`, `createdAt`, `updatedAt`) VALUES
(1, 'referans.png', 'Trend', 'Asist', '0(534) 202-68-07', '', 'parskod@gmail.com', '59dc2c3921372dd78bc538c65a4b8b70', 1, '2020-08-15 05:20:49', '2022-11-14 19:01:29'),
(6, 'default.jpg', 'Masal', 'Kılıç', '0(532) 203-35-31', '', 'masalkilicsalon@gmail.com', '3bb2ac7f186c555af9b65fe96d45aa12', 0, '2021-05-29 04:32:39', '0000-00-00 00:00:00'),
(7, 'default.jpg', 'Volkan', 'Kılıç', '0(541) 660-16-54', '', 'volkan@masal.com', '69ef0c89d8bc3463240a0f10f2cdac44', 0, '2021-06-02 01:44:50', '2021-06-02 06:45:23');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `report_dashboard`
--
ALTER TABLE `report_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `settings_general`
--
ALTER TABLE `settings_general`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- Tablo için AUTO_INCREMENT değeri `report_dashboard`
--
ALTER TABLE `report_dashboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Tablo için AUTO_INCREMENT değeri `settings_general`
--
ALTER TABLE `settings_general`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
