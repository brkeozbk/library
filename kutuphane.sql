-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 May 2021, 20:09:38
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kutuphane`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `kitapID` int(11) NOT NULL,
  `kitap` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `yazar` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `basimyili` int(11) NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `stok` int(255) NOT NULL,
  `kitapturID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`kitapID`, `kitap`, `yazar`, `basimyili`, `kategori`, `stok`, `kitapturID`) VALUES
(1, 'Hayvan Mezarlığı', 'Stephen King', 1983, 'Korku', 3, 1),
(2, 'Frankestein', 'Mary Shelley', 1818, 'Korku', 2, 1),
(3, 'Drakula', 'Bram Stoker', 1897, 'Korku', 1, 1),
(4, 'Kafes', 'Josh Malerman', 2014, 'Korku', 0, 1),
(5, 'Suç Ve Ceza', 'Fyodor Dostoyevski', 1866, 'Dünya Klasikleri', 5, 2),
(6, 'Sefiller', 'Victor Hugo', 1862, 'Dünya Klasikleri', 2, 2),
(7, 'Anna Karenina', 'Lev Tolstoy', 1877, 'Dünya Klasikleri', 3, 2),
(8, 'Vadideki Zambak', 'Honoré de Balzac', 1835, 'Dünya Klasikleri', 4, 2),
(9, 'İnsan Olmak', 'Engin Geçtan', 1983, 'Psikoloji', 6, 3),
(10, 'Bir Psikiyatristin Gizli Defteri', 'Gigi Vorgan', 2010, 'Psikoloji', 2, 3),
(11, 'Kitleler Psikolojisi', 'Gustave Le Bon', 1895, 'Psikoloji', 0, 3),
(12, 'Hayata Dön', 'Gülseren Budayıcıoğlu', 2011, 'Psikoloji', 0, 3),
(13, 'Beynine Format At', 'M. Barış Muslu', 2008, 'Kişisel Gelişim', 0, 4),
(14, 'Beden Dili', 'Joe Navarro', 2008, 'Kişisel Gelişim', 0, 4),
(15, 'Bilinçaltının Gücü', 'Joseph Murphy', 1963, 'Kişisel Gelişim', 0, 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_turleri`
--

CREATE TABLE `kitap_turleri` (
  `kitapturID` int(11) NOT NULL,
  `turler` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `kitap_turleri`
--

INSERT INTO `kitap_turleri` (`kitapturID`, `turler`) VALUES
(1, 'Korku Kitaparı'),
(2, 'Dünya Klasikleri Kitapları'),
(3, 'Psikoloji Kitapları\r\n'),
(4, 'Kişisel Gelişim Kitapları'),
(5, 'Aşk Kitapları'),
(6, 'Bilim Kurgu Kitapları'),
(7, 'Biyografi Kitapları'),
(8, 'Halk Edebiyatı Kitapları'),
(9, 'Dini Kitaplar'),
(10, 'Siyasi Kitaplar'),
(11, 'Çocuk Kitapları');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kayitID` int(255) NOT NULL,
  `k_adi` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `k_sifre` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `rol` int(11) NOT NULL,
  `ad` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `soyad` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kayitID`, `k_adi`, `k_sifre`, `email`, `rol`, `ad`, `soyad`) VALUES
(1, 'brkeozbk', '123456', 'brasd@gmail.com', 0, 'breke', 'özbek'),
(2, 'brkeozbss', 's%3A24%3A%22eJzLDvMoN%2FfUDgMADCACgg%3D%3D%22%3B', 'brkeozbksd@gmail.com', 1, 'wasd', 'sad'),
(3, 'brkeozbsk', 's%3A24%3A%22eJzLDvMoN%2FfUDgMADCACgg%3D%3D%22%3B', 'br@gmail.com', 0, 'asd', 'asd');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`kitapID`),
  ADD KEY `kitapturID` (`kitapturID`);

--
-- Tablo için indeksler `kitap_turleri`
--
ALTER TABLE `kitap_turleri`
  ADD PRIMARY KEY (`kitapturID`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kayitID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `kitapID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Tablo için AUTO_INCREMENT değeri `kitap_turleri`
--
ALTER TABLE `kitap_turleri`
  MODIFY `kitapturID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kayitID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD CONSTRAINT `kitaplar_ibfk_1` FOREIGN KEY (`kitapturID`) REFERENCES `kitap_turleri` (`kitapturID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
