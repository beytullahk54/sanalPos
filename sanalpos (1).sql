-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 17 May 2020, 01:32:52
-- Sunucu sürümü: 10.1.39-MariaDB
-- PHP Sürümü: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sanalpos`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `educations`
--

CREATE TABLE `educations` (
  `id` int(11) NOT NULL,
  `education_name` varchar(255) NOT NULL,
  `education_price` varchar(255) NOT NULL,
  `education_url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `educations`
--

INSERT INTO `educations` (`id`, `education_name`, `education_price`, `education_url`, `created_at`, `updated_at`) VALUES
(1, 'Deneme', '500', 'testodeme', '2020-05-15 10:03:24', '2020-05-14 22:21:04'),
(3, 'Deneme', '50', 'dpuodeme', '2020-05-15 10:03:17', '2020-05-14 22:23:25'),
(4, 'Matematik', '325', 'matematik', '2020-05-15 08:37:10', '2020-05-15 08:37:10'),
(5, 'bikurus', '0.01', 'bikurus', '2020-05-15 15:26:18', '2020-05-15 10:10:44'),
(6, 'ERKEN ÇOCUKLUK PSİKOLOJİSİ SEMİNERİ CANLI ETKİLEŞİMLİ', '60', '29mayisseminer', '2020-05-15 12:33:44', '2020-05-15 12:33:44'),
(7, 'DPÜSEM İNSAN KAYNAKLARI', '1500', 'ik1500', '2020-05-15 12:35:00', '2020-05-15 12:35:00'),
(8, 'Geliştir Kendini Eğitim Programı', '220', 'GLK220', '2020-05-15 12:42:32', '2020-05-15 12:42:32');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'ogrenci-ekle', 'ogrenci ekleyebilir', 'oğrenci ekleyebilir', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(2, 'ogrenci-sil', 'ogrenci silebilir', 'Öğrenci silme yetkisine sahip', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(3, 'ogrenci-duzenle', 'ogrenci duzenle', 'Öğrenci bilgilerini düzenleyebilir', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(4, 'ogrenci-gor', 'ogrencileri gorme', 'Öğrenci bilgilerini görme yetkisine sahip', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(5, 'ders-ekle', 'Ders Ekle', 'Ders Ekleyebilir', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(6, 'ders-sil', 'Ders Silebilir', 'Ders Silebilir', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(7, 'ders-duzenle', 'Ders Duzenle', 'Ders Bilgilerini düzenleyebilir', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(8, 'role', 'Role yetkisi', 'Role ile ilgili tüm yetkilere sahip', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(9, 'kullanici-rol', 'Rol verebilir', 'Kullanıcılara rol verebilir', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(10, 'ogrenci', 'Öğrenci', 'Öğrenci', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(11, 'kullanici-analiz', 'kullanici-analiz', 'kullanici-analiz', NULL, NULL),
(12, 'sinav', 'sinav', 'Sınav Sonuçları Listeleme', NULL, NULL),
(13, 'odev_yonetim', 'odev_yonetim', 'Ödev Yönetimi haklarına sahip olur.', '2019-01-09 13:27:15', '2019-01-09 13:27:15'),
(14, 'admin_kullanim', 'admin_kullanim', 'Admin panel kullanım', NULL, NULL),
(15, 'ogretmen_yetkisi', 'ogretmen_yetkisi', 'Öğretmen Yetkisi\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 5),
(2, 1),
(2, 5),
(3, 1),
(3, 5),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 2),
(11, 1),
(12, 1),
(12, 5),
(13, 1),
(14, 1),
(15, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(2, 'ogrenci', 'ogrenci', 'ogrenci', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(3, 'guncel', 'guncel', 'guncel', '2017-12-18 07:39:17', '2017-12-18 07:39:17'),
(4, 'Sinav', 'Sinav', 'Sinav', '2018-03-20 17:32:52', '2018-03-20 17:32:52'),
(5, 'selcukyetkili', 'SelcukSem Yetkili', NULL, '2018-04-26 09:14:33', '2018-04-26 09:14:33'),
(6, 'ogretmen_yetkisi', 'Öğretmen Yetkisi', 'Öğretmen Yetkisi', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(11, 2),
(11, 3),
(12, 2),
(12, 3),
(14, 2),
(14, 3),
(15, 2),
(15, 3),
(16, 2),
(16, 3),
(17, 2),
(17, 3),
(18, 2),
(18, 3),
(19, 2),
(19, 3),
(20, 2),
(20, 3),
(21, 2),
(21, 3),
(22, 2),
(22, 3),
(23, 2),
(25, 2),
(26, 2),
(26, 3),
(27, 2),
(27, 3),
(28, 2),
(28, 3),
(29, 2),
(29, 3),
(30, 2),
(30, 3),
(31, 2),
(31, 3),
(32, 2),
(32, 3),
(33, 2),
(33, 3),
(34, 2),
(35, 2),
(36, 2),
(36, 3),
(37, 2),
(37, 3),
(38, 2),
(38, 3),
(39, 2),
(39, 3),
(40, 2),
(41, 2),
(41, 3),
(42, 2),
(42, 3),
(43, 2),
(43, 3),
(44, 2),
(44, 3),
(45, 2),
(46, 2),
(46, 3),
(47, 2),
(48, 2),
(48, 3),
(49, 2),
(50, 2),
(50, 3),
(51, 2),
(52, 2),
(52, 3),
(53, 2),
(53, 3),
(54, 2),
(54, 3),
(55, 2),
(55, 3),
(56, 2),
(56, 3),
(57, 2),
(57, 3),
(58, 2),
(58, 3),
(59, 2),
(59, 3),
(60, 2),
(60, 3),
(61, 2),
(61, 3),
(62, 2),
(62, 3),
(63, 2),
(64, 2),
(64, 3),
(65, 2),
(65, 3),
(66, 2),
(66, 3),
(67, 2),
(67, 3),
(68, 2),
(68, 3),
(69, 2),
(69, 3),
(70, 2),
(70, 3),
(71, 2),
(72, 2),
(72, 3),
(73, 2),
(73, 3),
(74, 2),
(74, 3),
(75, 2),
(75, 3),
(76, 2),
(77, 2),
(77, 3),
(78, 2),
(78, 3),
(79, 2),
(80, 2),
(81, 2),
(82, 2),
(82, 3),
(83, 2),
(83, 3),
(84, 2),
(84, 3),
(85, 2),
(85, 3),
(86, 2),
(86, 3),
(87, 2),
(87, 3),
(88, 2),
(88, 3),
(89, 2),
(89, 3),
(90, 2),
(90, 3),
(91, 2),
(91, 3),
(92, 2),
(92, 3),
(93, 2),
(93, 3),
(94, 2),
(94, 3),
(95, 2),
(95, 3),
(96, 2),
(96, 3),
(97, 2),
(97, 3),
(98, 2),
(98, 3),
(99, 2),
(99, 3),
(100, 2),
(100, 3),
(101, 2),
(101, 3),
(102, 2),
(102, 3),
(103, 2),
(103, 3),
(104, 2),
(104, 3),
(105, 2),
(105, 3),
(106, 2),
(106, 3),
(107, 2),
(107, 3),
(108, 2),
(108, 3),
(109, 2),
(109, 3),
(110, 2),
(111, 2),
(111, 3),
(112, 2),
(112, 3),
(113, 2),
(113, 3),
(114, 2),
(114, 3),
(115, 2),
(115, 3),
(116, 2),
(116, 3),
(117, 2),
(117, 3),
(118, 2),
(118, 3),
(119, 2),
(120, 2),
(120, 3),
(121, 2),
(122, 2),
(123, 2),
(123, 3),
(124, 2),
(124, 3),
(125, 2),
(125, 3),
(126, 2),
(126, 3),
(129, 6),
(130, 2),
(131, 2),
(132, 2),
(133, 2),
(134, 2),
(135, 2),
(136, 2),
(137, 2),
(138, 2),
(138, 3),
(139, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `site_ayarlar`
--

CREATE TABLE `site_ayarlar` (
  `id` int(10) UNSIGNED NOT NULL,
  `SiteAdi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiteLogo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiteTemelRenk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiteAltLogo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiteIcLogo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SiteFavicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Sinav` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Demo` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_analytics` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_mail` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_olcme_araci` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `site_ayarlar`
--

INSERT INTO `site_ayarlar` (`id`, `SiteAdi`, `SiteLogo`, `SiteTemelRenk`, `SiteAltLogo`, `SiteIcLogo`, `SiteFavicon`, `Sinav`, `Demo`, `login_background`, `site_analytics`, `site_mail`, `site_olcme_araci`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dumplupınar Üniversitesi Sanal Pos', 'uploads/site/logo.jpeg', '#4b96b3', 'uploads/site/logo.jpeg', 'uploads/site/logo.jpeg', 'panelFile/site/dpusem.png', 'aktif', 'kapali', 'panelFile/site/1.png', NULL, NULL, 'ders', NULL, NULL, '2019-03-15 08:48:15');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'rodosadmin', '$2y$10$tuGh2oW4abS2X23727XDO.8S6uAeVZlB.DtnyUoXtCfym5hkOlNIe', 'tF11GeWUmYhcWAvqfm0dn86eBZnvsMNLIMkSLc7DrJ0qXpbp7oYITWVF3mug', NULL, NULL),
(11, 'Test', '19720252334', '$2y$10$ctdlMxf6bLzmbox3a53/.elhBrRfUHsxEQEWje54o4LpobU2R7xuy', NULL, '2019-12-31 10:26:16', '2020-04-11 11:16:59'),
(12, 'Özden', '15878446580', '$2y$10$9GXLCga20xSlvbc8nf0x/.mR7JjGhXIlcTOA7l8fFOHCskgY2q.aa', NULL, '2019-12-31 10:26:59', '2020-01-27 04:34:29'),
(14, 'Barış', '16992081035', '$2y$10$juD5wUEDqLXYzSQEv2vAWeLWvFA.u.PX2vQNdWFix/pWXFMGMHMO2', NULL, '2019-12-31 12:07:10', '2019-12-31 12:08:15'),
(15, 'Esmanur', '14745651314', '$2y$10$X0xuY9cmdFpc9EqI94/AHOoQcXIcyxtDn/.tYysNzYrwBGGtcz4tu', NULL, '2019-12-31 12:21:30', '2020-01-02 05:34:39'),
(16, 'Nihal saniye', '12955694135', '$2y$10$ytp/0/LCwhTfDexxSagyfO5lSgmC5jUAb1/qfGpRKKl3.Y9eYBY2a', NULL, '2019-12-31 12:22:22', '2020-01-04 17:54:05'),
(17, 'Mehmet Akif', '10908980168', '$2y$10$7qSXY.iYgynv4CqckKo5VuXPfE3pCaY/sjAfYbi1Tak6M5zeOFnXe', NULL, '2019-12-31 12:23:03', '2019-12-31 18:51:09'),
(18, 'Umut Zafer', '11571352197', '$2y$10$wnslDMU4zWG3YxgDoKD/q.sssFR5US.iszVH/65NXKhJ9eQew5VTS', NULL, '2019-12-31 12:23:52', '2020-01-01 16:33:26'),
(19, 'Dilek', '14640039792', '$2y$10$iTK7PqYTgRjddojTfqwuduM5WWxGv/ntEN3soDJUwmsk6BXMvgEei', NULL, '2019-12-31 12:24:28', '2020-01-01 08:22:17'),
(20, 'Elif', '19998549932', '$2y$10$W2S5lfwJmo3lw.5sWAPO2ejwFRnAeLGC56RfFnxrou0lHC7sWKLm2', NULL, '2019-12-31 12:25:08', '2020-01-01 13:19:19'),
(21, 'Selda', '18496395872', '$2y$10$lOQt2vkpeCPsZL2zbg/eluYgD8nRALgaNt8i0OYccWsB/Hq15AqrC', NULL, '2019-12-31 12:25:41', '2020-01-01 09:36:10'),
(22, 'Kamil', '10404791999', '$2y$10$o3Cz9JoSElfFd90plJ9vb.8GUaTY8BA0bVrwLdUtGXtvn7fyKlFl.', NULL, '2019-12-31 12:26:28', '2019-12-31 12:31:22'),
(23, 'oğuz YENİCE', '16836410093', '$2y$10$WklYp8hlHCfwFzN1nW3ELeDjkKbMjtQhvIr4Vk7vkJBMuhyEVLCtC', NULL, '2020-03-27 09:17:08', '2020-03-27 09:17:08'),
(24, 'oğuz YENİCE', '21833443154', '$2y$10$WSV0bQNd4HPQ.yZwmCUzduW5awR.T.rBFWmLkGFFe/vz9M2ZcLVx.', NULL, '2020-03-27 09:27:35', '2020-03-27 09:27:35'),
(25, 'oğuz YENİCE', '15456917759', '$2y$10$bYeWDx0pAFiNrrqWPu9Hu.5/8biuDqMVpTRS0SgZyw9NL1aO6j8Ey', NULL, '2020-03-27 09:28:13', '2020-03-27 09:28:13'),
(26, 'AYŞE', '10061462808', '$2y$10$hwajD/pMxozgsNb0LViR7etM5VEQtAaacgE3qwExgSe/LdamXyFqm', NULL, '2020-03-27 14:43:42', '2020-03-27 14:46:08'),
(27, 'Ayşe', '13349112782', '$2y$10$qyOzHxpr2gGRMG9COwzP7OpbHZaKJTUWSdI413omu6h7ZAgmVKUYS', NULL, '2020-03-30 04:23:39', '2020-03-30 04:24:57'),
(28, 'Mehmet', '11587474248', '$2y$10$iG8H5Luc4.w9n3x2KnTPfu4K1YDN8/G8TBjTfQmzr8rIcQDSUnPBW', NULL, '2020-03-30 04:30:01', '2020-03-30 04:32:14'),
(29, 'Ahmet', '14312071525', '$2y$10$0sRLXdK1lgEfCP7xzSj4Q.j9MJY/0.Y9yuDL50fVBkY8TFtreaHUa', NULL, '2020-03-30 04:30:33', '2020-03-30 04:33:15'),
(30, 'Fatma', '11960705262', '$2y$10$f/6FvtwrJIveamYv/4OlSutTLyuttkEwJbelwAYllGOOt66cu8G9q', NULL, '2020-03-30 04:30:54', '2020-03-30 04:34:23'),
(31, 'ALIREZA', '16001311103', '$2y$10$ZeCnE..dQrs0pmud.BuD5eb/7ilDRH8FlLXvltK0W7anwgvviibpC', NULL, '2020-03-30 08:16:24', '2020-04-03 05:13:22'),
(32, 'MUSTAF IBRAHIM', '16322307344', '$2y$10$PpPJyzVROqZWrgF4HgMEPOYjGAGNxU2pez.dFexnSn7DRYKIzXM9u', NULL, '2020-03-30 08:19:09', '2020-04-13 06:14:26'),
(33, 'ASEM ABDULATEF GARALLAH', '12468739255', '$2y$10$t.Mn5LnKYJCIZSbfvJV1GOxHDscDTUMCCR5iAg7F9zNYa71LERXXG', NULL, '2020-03-30 08:19:44', '2020-04-15 15:35:04'),
(34, 'MOHAMMED MUTHANNA SAHIB', '13791917317', '$2y$10$YFkow7R1STVXfdqfUgDeXuM.C8gcfV.qGCB4XYzHCGAvkautnBj7y', NULL, '2020-03-30 08:20:15', '2020-03-30 08:20:15'),
(35, 'NAZIM', '19707968932', '$2y$10$PjQnQUl9wclpOmFjbnQU5efBI7ZBw.eMngcAWwenmPO/kOODCaKYS', NULL, '2020-03-30 08:21:05', '2020-03-30 08:21:05'),
(36, 'MUSAAB ADIL IBRAHIM', '13469007452', '$2y$10$PLJvnOVaU3y.lb46OtJcJ.t/u26yfvjrY1NpWzAb2HbYTkyhroucS', NULL, '2020-03-30 08:21:27', '2020-03-30 09:02:58'),
(37, 'AWF ABDULRAHMAN SAEED', '12429377911', '$2y$10$NN0Rk5CKC3RqTWfUzbCBJ.xKsVOiNBsSU36pNJaEGdFfaaFEy/Sce', NULL, '2020-03-30 08:21:54', '2020-03-31 19:16:24'),
(38, 'MAJDİ HAMAD SALAH', '14159829979', '$2y$10$vaNjdqPrVHIF8lnB.qjXZeXfJDs7GeQt9NGlwk9hlS0q.w1PUzGGq', NULL, '2020-03-30 08:22:24', '2020-03-30 16:04:16'),
(39, 'FAHD ASHRAF ABDULKAREM', '18193955913', '$2y$10$al9oXsDn52IhxtSpAeCKrex8AWlfSHyUjQuKPM4T.XzJ3E0kHCUKu', NULL, '2020-03-30 08:22:47', '2020-03-30 08:40:25'),
(40, 'DIANE KWE', '11039082901', '$2y$10$KwIleq/aAVERUnSzw4I7WOHBDGUWzY5IWnUkaHMqmNhgmZqBhWBBe', NULL, '2020-03-30 08:23:16', '2020-03-30 08:23:16'),
(41, 'ABDEL MONEM', '12700276907', '$2y$10$2ElduxZLVxX5hzYAH7L.FOuR.OQ.5hwzeXC31peVVdPLrW59qovM.', NULL, '2020-03-30 08:23:40', '2020-03-31 15:10:38'),
(42, 'KAMRAN', '17840160462', '$2y$10$ww/TsJJJ9VeTk13qpKW5q.zSyFf8YsvSfYevovjd.owQl/2yp5X4S', NULL, '2020-03-30 08:24:00', '2020-03-31 15:52:46'),
(43, 'BARAKAT', '18613644985', '$2y$10$UMy8Nv6ZuhyhWfclEQiDFuQ32B1Jc/PgdeI2rOOA7IBHQAWmRr776', NULL, '2020-03-30 08:24:20', '2020-03-30 08:27:45'),
(44, 'ASMAA', '14102341240', '$2y$10$3St1B2jF1YURBgPCtGbKvO/.yo4j5b2pFStqqPhSSiuefrN7q8lju', NULL, '2020-03-30 08:24:37', '2020-03-31 06:01:45'),
(45, 'ABDULRAHMAN MAHMOOD A.', '10982638799', '$2y$10$3JF1xmruDYA/d.KCkWj0CufhouM89YIX84DxrlwwJmqndzaZvX7ne', NULL, '2020-03-30 08:25:01', '2020-03-30 08:25:01'),
(46, 'MOHAMED FARHAN', '14459860350', '$2y$10$q5ALo0pyZLxk9/E5IvTdh.FZ69QHakVcc8qVS4hIDoN4aMVy0M5KK', NULL, '2020-03-30 08:25:26', '2020-03-30 08:49:09'),
(47, 'ABDULAZIZ ABDULLAH  AHMED AL - JAAIDI', '11613055891', '$2y$10$XRFbz4TvKVF5ipeHwTQYnuoQml9x8/LLKkSTXaNo0Q8Fqj4KLSIiC', NULL, '2020-03-30 08:25:55', '2020-03-30 08:25:55'),
(48, 'UMNİYAH', '16457071476', '$2y$10$wRydBeuscdHb27wYjfRYNONp3dcO8M2dXxFt4GvzQq2Xp64n1DKD6', NULL, '2020-03-30 08:50:30', '2020-03-30 12:52:41'),
(49, 'AMR SHAABAN NOUR', '16095565438', '$2y$10$GOzs3UFijTdtbB25n3q5mOJwsiy3iEHxsRUGcnGMEFOW/b1y4wCZ6', NULL, '2020-03-30 09:11:13', '2020-03-30 09:11:13'),
(50, 'AL YASIN PRASETYO', '13301651074', '$2y$10$RWxBGyEnN8y6qVcpnVbyrerlXuTEzGsjkzWUPdwPA1gxTvAOsKWw2', NULL, '2020-03-30 09:11:36', '2020-03-30 09:18:12'),
(51, 'HAMZAH SAAD ABDULSALAM', '17786486614', '$2y$10$Zp4PMwu1DkF2Pmj2OuXVs.6sMrZo1BRinlU3Z9lZDZR1oIu7b.8Le', NULL, '2020-03-30 09:12:00', '2020-03-30 09:12:00'),
(52, 'ABDULHADI', '19226966234', '$2y$10$qxJ2aZBmkeSM/hsLWU8UteIF/vizvtyfscbZH9FA1i.HYbh5yjcDO', NULL, '2020-03-30 09:12:18', '2020-03-30 09:47:28'),
(53, 'HUZAIFA MAMMAN', '10042137109', '$2y$10$sNvSP0onJntyzi7W7VFrKeuBFhyphqrZrcTUlB7Gz1PllqGxltcMe', NULL, '2020-03-30 09:12:38', '2020-04-07 16:46:40'),
(54, 'ANDI DZAKY MUFADDAL', '18181035131', '$2y$10$ElTavyHEOVS8josjEIs9kOKzz.cM.hJNY6h2NLEQ06oza3RGWUGrS', NULL, '2020-03-30 09:13:03', '2020-03-30 09:22:14'),
(55, 'AHMED YASEEN SAEED', '10260654314', '$2y$10$TW2aGdD.jCNcqhrka/mXo./dmZaqJktpYU9MVCfVDNnbbEE/5Suz2', NULL, '2020-03-30 09:13:25', '2020-03-30 09:26:37'),
(56, 'ALBDULRAHMAN ALI SALEH', '19270850221', '$2y$10$FPhsVbf3.RPTEkZWg8nCL.WRzGPIwlVp0UsFy4E1QW/lfdf5hmogG', NULL, '2020-03-30 09:13:45', '2020-04-01 09:02:22'),
(57, 'TAMANA', '15472357949', '$2y$10$fMPnXm9DZpu3r.V9CNYWvum/t7IYe5TKQWvrAfaFbQlqD85toFdw2', NULL, '2020-03-30 09:27:23', '2020-03-30 10:01:40'),
(58, 'YOUSSEF', '19075579896', '$2y$10$I.83DroGj1tFghcYGFEr8.VgGBH0CZy7gRVrp6.M5PidLvx0kUd3i', NULL, '2020-03-30 09:28:09', '2020-04-13 00:54:41'),
(59, 'SOUAD', '11708069257', '$2y$10$FM1IUpWVZYOkPRnMYF5dUuLwdQ64wmfl4k7Irh5tuCTWGRVqj4BGq', NULL, '2020-03-30 09:28:35', '2020-03-30 10:12:58'),
(60, 'SYADZA NATHISAH', '10534471870', '$2y$10$J8JMqcxMaWUAcB4S6qrj8.qzQDdWiL2fvb73goaYnvlpjlhmrEmTe', NULL, '2020-03-30 09:28:56', '2020-03-30 16:35:14'),
(61, 'HASEEB', '15194238739', '$2y$10$40MBUteH0WBQcjx3SOwlL.JgcYzyuhub9WZf4XaxXpMUeBvJvr0SO', NULL, '2020-03-30 09:29:18', '2020-04-02 08:11:30'),
(62, 'AHMED MAGED OMAR', '19053675225', '$2y$10$/IrgIusSwuwDo8OICVYFaebd.M1qLARyOchoQMCoL8yAwaExT7fD.', NULL, '2020-03-30 09:30:51', '2020-03-30 13:03:56'),
(63, 'MUHAMMAD ALFIAN ADI', '11406334038', '$2y$10$gKtzh8TFVCpczlDWqeQdQOFFDcw/yNtCZC1fGk1WEy/TRa0Gkrl0S', NULL, '2020-03-30 09:31:15', '2020-03-30 09:31:15'),
(64, 'SÜNDÜS', '15187204658', '$2y$10$LelUVOUui0IsR54juXnck.6j6D4yTOAyoOyauxPNT6JeZE3UuemuW', NULL, '2020-03-30 09:31:42', '2020-03-30 09:57:21'),
(65, 'ALDY GUSTI', '13968396050', '$2y$10$Pxgd5Rpd1dhQB7cVI06GReoBMYqbv./gHEVo2gxuLYWpi1zHFPC1e', NULL, '2020-03-30 09:32:07', '2020-03-30 10:20:35'),
(66, 'S M TANVIR HASSAN', '13811663093', '$2y$10$WI4JBuK0f9C.DCqszFubYeXMe2T9Z1yT20/3SYrqYnNmm6IhpOr7W', NULL, '2020-03-30 09:33:09', '2020-03-30 16:02:25'),
(67, 'MUHAMMAD ISMAIL', '18148701534', '$2y$10$NvpDAshrNYi6ycxpuYgzaO/0AXt1LVn.0R.oOuwy.PB9dg8KNqSOS', NULL, '2020-03-30 10:01:03', '2020-03-30 10:07:51'),
(68, 'RIHAM', '18239079577', '$2y$10$41DB5GaJWAGV68YMbZHQnuWSACwGH4ARQ8MQeD4eV6g3mRMc4tXli', NULL, '2020-03-30 10:01:55', '2020-03-31 12:43:22'),
(69, 'MOHAMMAD MAHDİ', '11514627740', '$2y$10$zrZX7XwJhxasyTm9EQKkn.oVJ.aSNDb325/WbDHZg/Nu2LFK6B1cy', NULL, '2020-03-30 10:02:15', '2020-03-30 10:53:48'),
(70, 'NAZRY', '16574571295', '$2y$10$mZa16.Ia8m8KXZ53nRC.2.zyFbRKA.OlzgtOp1DdMDkfmfkdFIBuu', NULL, '2020-03-30 10:02:44', '2020-03-30 12:14:59'),
(71, 'MAHA', '12523465294', '$2y$10$0SO03sRYKzfJryN.iw4LyeVC3FVCx46yD6M.Ajti42bzmA2OUlS4S', NULL, '2020-03-30 10:03:07', '2020-03-30 10:03:07'),
(72, 'MAHADİERA ARTAMEVİA', '17539294093', '$2y$10$sF2acehXcf.YCyAdkKtgme55Nbiq36lcFYujcNARa5fRlauA474KG', NULL, '2020-03-30 10:03:28', '2020-03-30 10:12:05'),
(73, 'ROUAA MOHAMED NAZMI', '19854761611', '$2y$10$14Yxm5UB7RKpPy8CzT.XA.MwatcfmPN4ZC8KrHhbJFSTzAVj58OPa', NULL, '2020-03-30 10:03:49', '2020-03-30 10:39:44'),
(74, 'SAYYID RAMADHAN ASH', '18375589105', '$2y$10$xAcLdv4RBWxxoZ1ggsyF5.ywORo60L32J9l8mxL15WZ14Br8.2JJa', NULL, '2020-03-30 10:04:08', '2020-03-31 07:01:34'),
(75, 'GRISELDA', '10719552214', '$2y$10$cqFyqseXHk7gABIBG9USo.lBlw0rl10znXIxRmkrtAEmTjlITXvCq', NULL, '2020-03-30 10:04:26', '2020-03-30 10:20:04'),
(76, 'BAHAR', '14730160153', '$2y$10$UCevDA7bUMOh3/ehybdtgeiLfs2u/eaMLJCb.IN9wccaD7Wo.g8T.', NULL, '2020-03-30 10:04:48', '2020-04-16 11:41:35'),
(77, 'EL HASSEN', '10894063427', '$2y$10$xuDwEW6gnlHQ5fEq1lU5hOFWMkAI19Ue3ZvkQ1DlwnZ85DMTGVXxi', NULL, '2020-03-30 10:07:59', '2020-04-16 11:41:42'),
(78, 'MUHAMMAD KHALID', '16145534337', '$2y$10$nMP7iamXTkP6fptbQjWiEOTqm2N.i/GqveyY4n1YU.it/rz6eC.Cu', NULL, '2020-03-30 10:08:27', '2020-04-16 11:41:48'),
(79, 'MOUNİNA', '19371345314', '$2y$10$lclvwibBg6WE6rdZ7054oOqCRALGpdSi7sSRr31K/ASBKpmFdhaCW', NULL, '2020-03-30 10:08:48', '2020-04-16 11:41:56'),
(80, 'ABDULRAHMAN', '17095672619', '$2y$10$ivohiKQnER5tRNmvLa0YIuhIwsPpjde7VI2zqlxnfu.VledwKUnym', NULL, '2020-03-30 10:09:15', '2020-04-16 11:42:02'),
(81, 'GHAZWAN THAMER HANBAS', '17176220526', '$2y$10$gkhHscvzOPyFCkHqurW3zuH2wbf7gklfAS8b9gNsKCLDN8ShbFxs2', NULL, '2020-03-30 10:09:34', '2020-04-16 11:42:09'),
(82, 'BADRELDIN', '17149269146', '$2y$10$3D6h778eJbkM2/SeXrC0cuw5D4BTS9nYdcAjcIz2p8rW5/kLkxNeW', NULL, '2020-03-30 10:10:04', '2020-04-16 11:42:52'),
(83, 'MOHAMMED', '13956223696', '$2y$10$ZqrzAe.onAdGxIuJ/loDW.CxwrggUavkHb6XrytNHvsCva6SI6D/i', NULL, '2020-03-30 10:10:30', '2020-04-16 11:42:58'),
(84, 'HELMA', '16895293804', '$2y$10$WFGhWk01GIpXUAt5VwMQyeP31jWOPujUnkIVHEqQUZAChR1m508rC', NULL, '2020-03-30 10:10:51', '2020-04-16 11:43:05'),
(85, 'ZIN WIA', '18098419256', '$2y$10$NJMHFDT2zP1t9JJd2e6dNOdx7/s55Dc9Gj2/2jWp6mNZSZwYhho3G', NULL, '2020-03-30 10:11:09', '2020-04-16 11:43:12'),
(86, 'PATRICK', '13711406639', '$2y$10$swiWn6pF1.VKliDF5DwPYut4zdVZ0jqV1ATSljpfJjBFraa6WFWV6', NULL, '2020-03-30 10:11:27', '2020-04-16 11:43:18'),
(87, 'MUHAMMAD', '13238181024', '$2y$10$T8k9eqTWZks2WtRhmopYqeDIjMiyZ/zOjbyZEthH7Dgnb/e4v.t/u', NULL, '2020-03-30 10:14:53', '2020-04-16 11:43:24'),
(88, 'PUTRI ASHILAH NUR', '18310394351', '$2y$10$/qShlaGXfgw9GGFqDG9BMeK5cFkdEwSdb40b95tAzUfKrBjnULQQq', NULL, '2020-03-30 10:15:13', '2020-04-16 11:43:31'),
(89, 'SHAFIRA SYAHDA', '16495416496', '$2y$10$S3RXIkCqb2pMEDPWxQB82O.AFydi2N2AJNsZRaGIkiPiraP1HRTI2', NULL, '2020-03-30 10:15:51', '2020-04-16 11:43:38'),
(90, 'FAHRA AFIFAH', '13056379938', '$2y$10$4Ysw0sNQ9Y1Gbnz8vBdit.9jO9Yw4eJtlJVVeHiibMRlWs469ap5e', NULL, '2020-03-30 10:18:35', '2020-04-16 11:43:45'),
(91, 'IBRAHIM M.', '17147565657', '$2y$10$25fzfr4q8K7rI4IWVDjo2OPo2OkIeDZr7i4634BEYDUIoc6HkfnD2', NULL, '2020-03-30 10:19:25', '2020-04-16 11:43:51'),
(92, 'MAVLIUT', '18524051243', '$2y$10$jDEl9W1GU4Mdm1PEE6mMSuqp2RmhLehG3kRwZI5ad/ESyj2CxgtMW', NULL, '2020-03-30 10:19:57', '2020-04-16 11:43:58'),
(93, 'OMAR', '19532161038', '$2y$10$LD.oc8V1.T01ob4UOynEsufMQs21ppkBo2lH1rL4Qpjs.MGu1P6jy', NULL, '2020-03-30 10:20:21', '2020-04-16 11:44:04'),
(94, 'RUSTAM', '12088784844', '$2y$10$sSrqLEsjCqDGP1673/fU4.y0MYpTpZ2XAV9xBx20FNtFhjGiY1BiG', NULL, '2020-03-30 10:21:31', '2020-04-16 11:47:48'),
(95, 'HASSAN', '14163296594', '$2y$10$fmMEZ4ZRRB/PDAOG/Qtdlu0.5RamUQd6T1bVSlu7aCm8Uckq1yezW', NULL, '2020-03-30 10:21:55', '2020-04-16 11:35:51'),
(96, 'FARIZA', '11370575044', '$2y$10$f4.PWXnMRZLOPl13k.kX5egiUGSjm4TKeXBq/v2tMSn3o08gS5wXq', NULL, '2020-03-30 10:22:19', '2020-04-16 11:36:00'),
(97, 'ABDULLAH AHMED ABDULLAH', '10180229839', '$2y$10$ghRGy.0ost4flX5Qoxqk0ucn.ZdeWIJpPqkkZLVTGpVW2792wxPJa', NULL, '2020-03-30 10:28:56', '2020-04-16 11:36:08'),
(98, 'DANIAH', '14692502865', '$2y$10$.Hn5SgAiUtQc3d4oE34LROgs0EM3dPk6pB1x0nbKakzdcU5uUoPxi', NULL, '2020-03-30 10:29:19', '2020-04-16 11:36:16'),
(99, 'IHEB', '14617926131', '$2y$10$pXHo/OXt9PEwjzi4oQ2/EeqApsWZkE8qkX4FL.g3k2/srcDbQSQYO', NULL, '2020-03-30 10:29:51', '2020-04-20 06:46:58'),
(100, 'PATERNE', '18808969662', '$2y$10$.xJ62axIih9hd7v0ugw2/.kAjots8NsvwYny7vnvVupDBgPtcKYua', NULL, '2020-03-30 10:30:24', '2020-04-16 11:36:31'),
(101, 'AHLAM H.M.', '19973037676', '$2y$10$6LOxHHA5lRbKFoQCaegUh.WlcVJw1YiglbMk8K2lcbiCvvkpqgMte', NULL, '2020-03-30 10:31:08', '2020-04-16 11:36:38'),
(102, 'MUHAJ SATTAR', '18832176772', '$2y$10$EsgPvO1SRugbcN/vo/Pd5eLnaRlMKg0240GuNgLypFyDP3EimsTFS', NULL, '2020-03-30 10:31:32', '2020-04-16 11:36:46'),
(103, 'ZAINAB SUFYAN', '11191666105', '$2y$10$UWEmAe3Mxs8H9KQJoEbizuejgZbld5WWpYsftvGXMAlzHIwRt.hXO', NULL, '2020-03-30 10:31:56', '2020-04-16 11:36:55'),
(104, 'ZEINEBOU', '10748737463', '$2y$10$q8V3W7wPCWcpC1kypEubT.p/TrcMkvbC6rY2DLEmVPkgDhhinPcBi', NULL, '2020-03-30 10:32:12', '2020-04-16 11:37:09'),
(105, 'KANIA', '16267895541', '$2y$10$fENSZYPPzXqziSiHtnCQJ.MTkwciO4.qp6LWamkWGwd/2DvjAea9y', NULL, '2020-03-30 10:32:30', '2020-04-16 11:37:16'),
(106, 'IBROHIM MUHAMMAD', '11896582138', '$2y$10$UZau975ldu5Z2oUqezS8MucfZuAAEqqSqTByGd1YJXxtgarK5sGfq', NULL, '2020-03-30 10:33:09', '2020-05-07 12:00:12'),
(107, 'NADHER MOHAMMED SAEED', '12978065810', '$2y$10$OntbNOp3M3tilr2BMc2.iOkZufkAg/s66ZvnC9z8wiL/0DRkC7A.y', NULL, '2020-03-30 10:38:09', '2020-04-16 11:37:32'),
(108, 'LAYTH TURKI ISSA', '19859324630', '$2y$10$tJNl541wxaAkZ5YE/4MB7uFTPSc4A9LpSSAPSWy4Hs6aGStxTZyXa', NULL, '2020-03-30 10:38:43', '2020-04-16 11:37:38'),
(109, 'MUHAMMAD SALMAN ABDULLAH', '17396868080', '$2y$10$g30i06dRCM0IpGFMSVt8dOYfxDx/PEulO/DyhtPy.y5rShk4KRBpS', NULL, '2020-03-30 10:39:04', '2020-03-31 06:14:23'),
(110, 'MUHAMMAD RAMA ADJIE', '10079707348', '$2y$10$A6TNMR8CVEBX1ovSUBo.i.PMF/SJn/3Aq2oZQ23EbXldqLkGFfbYi', NULL, '2020-03-30 10:39:22', '2020-03-30 10:39:22'),
(111, 'LUQMAN HANIF', '12251251708', '$2y$10$/oAG41PKH7lGuPe171PZJuL9BIca7szm.8d71et9xZJm87F/G15Em', NULL, '2020-03-30 10:39:43', '2020-03-30 10:49:34'),
(112, 'MUHAMMAD BAHIR', '13600317854', '$2y$10$SaVvoQf0gvKLlNRMTBRWZOaKeC5R2rw4FXqubgmvc3en8hiRoduXa', NULL, '2020-03-30 10:40:00', '2020-04-16 11:37:46'),
(113, 'GUNCHA', '16011024433', '$2y$10$vwhc30L.Lm9uNOu583GPtexLnjOruQgBM.CCaRjtU/0kejBfT0dRa', NULL, '2020-03-30 10:40:18', '2020-04-22 23:39:08'),
(114, 'MAKSAT', '11420306080', '$2y$10$XCXQsLVUluE9D1m9FxOil.kzfWe3U9VPma7zq1f01MexPEUJ7UwsG', NULL, '2020-03-30 10:40:50', '2020-04-16 11:38:00'),
(115, 'MOHAMMED', '17945702694', '$2y$10$oWOYoZbYXle4GglabG.E.OO9OyX/2R2PVzRW4aO1KOjs0d3CPKYbK', NULL, '2020-03-30 11:05:39', '2020-03-30 13:56:54'),
(116, 'REJHAN', '10940534745', '$2y$10$KfzZ4jbEvjEsxXpxCBQboulTD9iJk/zc2ZMO7ZPRZgSSCCsz1bWym', NULL, '2020-03-30 11:06:18', '2020-03-30 13:19:50'),
(117, 'KHALIL WAHB ALLAH HAIIDAR', '13447077379', '$2y$10$U4AfqJVblm98EIpJxoqYn.kEIGDoQCr.WkDTEx4/e.xdV.PMk8vHW', NULL, '2020-03-30 11:06:44', '2020-03-30 16:43:10'),
(118, 'ZAHIDAH NUR', '12615744550', '$2y$10$v29xQA2P2iZOgY1m8FpFCu7HjZj9AuZLLva7mQvwe7cqofdVSim6W', NULL, '2020-03-30 11:07:16', '2020-03-30 11:34:28'),
(119, 'MOKHAMMAD', '19757615924', '$2y$10$IQU1UZriP9qlr8XSDgRf6.6lkpIxS.1qLQYnnqPJHtFCdfC/GWUEu', NULL, '2020-03-30 11:08:09', '2020-03-30 11:08:09'),
(120, 'MUHAMMAD GALIH', '14106263801', '$2y$10$qugPy7bYVeMYxni5aeBtPecgj3x5w1TcUa6iIgjH5zDs97BJFyali', NULL, '2020-03-30 11:08:31', '2020-03-30 12:15:46'),
(121, 'ŞERAFEDDİN', '16617125536', '$2y$10$MFl2EYh5tLHpkIVo9Ij99OS8Du33YYzlu5xGZQFU8k8ANkIqQYY8e', NULL, '2020-03-30 11:08:57', '2020-03-30 11:08:57'),
(122, 'RIZKY AHMAD', '11550064237', '$2y$10$xeCETgjrx8UgrcGlchzMTuzvbcPm6bd9d2QXORof9uz33ByL10LYK', NULL, '2020-03-30 11:09:28', '2020-03-30 11:09:28'),
(123, 'AQSHALKHANH BARRAQ', '11284812342', '$2y$10$ziyLsMEauJ7HAAVUoy/DNufPARqxVu226L6SwjxqyJD2FgDje/10S', NULL, '2020-03-30 11:09:48', '2020-03-30 14:08:27'),
(124, 'KHALED YASEEN SAEED', '14383159031', '$2y$10$QdrKsZg3mE88u/9yj7aBz.iEd9twiqjtZSs1o0cr5f02BaTySjASa', NULL, '2020-03-30 11:10:09', '2020-03-31 00:30:24'),
(125, 'RAIED', '18947039119', '$2y$10$dtKQCztYBKNSYB7MGrlxseAKxkzkwgk5PbHadiw4hfLqUhCdzSL4u', NULL, '2020-04-06 13:03:50', '2020-04-06 14:35:58'),
(126, 'AMAR', '10129214435', '$2y$10$/YQW99asJc5PjX/x8p975eoO9kPomkmDsF9K7U3COVG07sGKmvW2G', NULL, '2020-04-06 13:04:36', '2020-04-06 14:07:56'),
(129, 'fatih', 'fatih', '$2y$10$7pGV7YwfauuJ101dUP14EOLPgheTnt1alMz1/zDptNiePklO9dbqu', NULL, '2020-04-27 08:45:29', '2020-04-27 08:45:29'),
(130, 'beytullah', '19126129726', '$2y$10$XjEsCI9krvTJQkLYukIlvuVQUVHszvuU8BUwCpc2UhdB6Rfdbkwri', NULL, '2020-04-27 09:17:59', '2020-04-27 09:17:59'),
(131, 'beytullah', '13483313930', '$2y$10$0N8J0KtiruJfWEUEmHNXEeohfu/c8jpIBgw9nHitHHMVGGJZkmW2C', NULL, '2020-04-27 09:53:02', '2020-04-27 09:53:02'),
(132, 'beytullah', '11437101548', '$2y$10$ytfwBaiWjjNUOXMs1Zqqyeq9u/z4321IqQq5LLngakXEmLBuX.knC', NULL, '2020-04-27 09:54:48', '2020-04-27 09:54:48'),
(133, 'YARA', '19060436778', '$2y$10$jkhUzsyaFnig/AJWowAvoeBA3hTlkpx7nzlxVZ/xuPB05UoOpMt5q', NULL, '2020-05-02 06:11:19', '2020-05-02 06:11:19'),
(134, 'BEKZOD', '13590877866', '$2y$10$VV/V4Sn2ZnOCMk2hspTPFO15qfdnJ/M3Tushlan6JNOI.guSi51pq', NULL, '2020-05-02 06:12:43', '2020-05-02 06:12:43'),
(135, 'AMİRSHAKH', '14930812595', '$2y$10$fC6IaKXPJIEbhUcuNoG2RevlwB/z2u3XvzHAzZ93.8oRMq70Zxxv2', NULL, '2020-05-02 06:13:50', '2020-05-02 06:13:50'),
(136, 'AHMED RIYADH KHALAF', '15211607836', '$2y$10$C5UGRj1QWUyC0QjIIToeCefiYQr3CuCl9k853Jwx12juDq3oY6dY.', NULL, '2020-05-04 06:55:40', '2020-05-04 06:55:40'),
(137, 'MUSTAFA MOHAMMED KHALEEL', '10825790943', '$2y$10$VrupupcPr7n0vEPDuwJQKew5EfGrBKHPqDtmowERSJTx0siCHm4mi', NULL, '2020-05-04 06:56:19', '2020-05-04 06:56:19'),
(138, 'MAHMOOD IBRAHIM HUSSEIN', '13644379414', '$2y$10$SWboM5dcoBXW8qKJhXiHyuO8q.tVOQ293VAZAtRz/zsUcMn9GO4/O', NULL, '2020-05-04 07:08:40', '2020-05-04 07:16:08'),
(139, 'BEKZOD', '15656526188', '$2y$10$ft1bZ9VJACwHJV1Gh8s68OilcHFWwBvHsRY7PKhs3ObTwLVKNKKAC', NULL, '2020-05-04 08:29:36', '2020-05-04 08:29:36');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Tablo için indeksler `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Tablo için indeksler `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Tablo için indeksler `site_ayarlar`
--
ALTER TABLE `site_ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `educations`
--
ALTER TABLE `educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `site_ayarlar`
--
ALTER TABLE `site_ayarlar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
