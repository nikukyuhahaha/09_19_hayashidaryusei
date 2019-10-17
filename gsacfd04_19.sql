-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2019 年 10 月 17 日 15:49
-- サーバのバージョン： 10.4.6-MariaDB
-- PHP のバージョン: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacfd04_19`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` char(64) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL,
  `genre` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child1` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `child2` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `url`, `comment`, `indate`, `genre`, `parent`, `child1`, `child2`) VALUES
(2, 'かぐや様は告らせたい', 'kaguya', 'yokatta\r\n', '2019-10-07 19:54:06', '冒険', '殿堂入り', '実物買いたい', NULL),
(3, 'a', 'a', 'a', '2019-10-07 20:54:52', 'a', '殿堂入り', '実物買いたい', 'a'),
(5, 'a', 'a', 'a', '2019-10-09 21:38:40', 'a', '完結済み', 'また読む', 'a'),
(6, 'a', 'a', 'a', '2019-10-09 21:39:04', 'a', '殿堂入り', 'ホラー', 'a'),
(9, '寄宿舎のジュリエット', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'めっちゃよかった', '2019-10-10 22:37:15', '学園', '連載中', '実物買いたいかも', NULL),
(10, 'a', 'a', 'a', '2019-10-10 22:37:35', 'a', '連載中', '実物買いたいかも', 'a'),
(11, '僕のヒーローアカデミア', 'ｗｗｗ', 'あああああ', '2019-10-10 22:46:17', 'ラブコメ', '殿堂入り', '買ってもいいかな', NULL),
(12, 'a', 'a', 'a', '2019-10-15 23:21:27', 'a', '完結済み', '買ってもいいかな', 'a'),
(13, '五等分の花嫁', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'よかったのです', '2019-10-15 23:40:26', '学園', '完結済み', '買ってもいいかな', NULL),
(14, 'キングダム', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'かっこええ', '2019-10-15 23:49:39', '冒険', '殿堂入り', '実物買いたい', NULL),
(15, 'ネウロ', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'こわい', '2019-10-15 23:51:49', 'ホラー', '完結済み', '買ってもいいかな', NULL),
(16, 'days', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'サッカー', '2019-10-15 23:52:58', 'ラブコメ', '連載中', '実物買いたいかも', NULL),
(17, 'BLEACH', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', '厨二', '2019-10-15 23:55:34', 'ヒーロー', '完結済み', 'また読む', NULL),
(18, 'メジャー', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'いいよい', '2019-10-15 23:59:49', '学園', '完結済み', 'また読む', NULL),
(19, 'あいうえお', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'ネタギッレ', '2019-10-16 00:01:34', 'ラブコメ', '完結済み', 'また読む', NULL),
(20, '僕のヒーローアカデミア', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'おいおいおい', '2019-10-16 00:16:29', 'ヒーロー', '完結済み', '買ってもいいかな', NULL),
(21, 'gs', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'いいものできた？', '2019-10-16 00:23:32', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(22, 'gsa', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'そろそろ', '2019-10-16 00:24:11', 'ヒーロー', '殿堂入り', 'ホラー', NULL),
(23, 'gsac', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'くうう', '2019-10-16 00:24:54', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(24, 'gsacade', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'くううううううう', '2019-10-16 00:28:14', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(25, 'くおおおおおお', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'びみょ', '2019-10-16 00:30:32', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(26, 'できへん', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'ああああああああああああ', '2019-10-16 00:39:54', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(27, 'gsacade', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'わから', '2019-10-16 00:51:35', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(28, 'やけくそ', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'あああああ', '2019-10-16 00:56:09', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(29, 'こんどこそ', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', '学園', '2019-10-16 00:56:50', 'ホラー', '完結済み', NULL, NULL),
(30, 'できたけどphpでは？', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'ああああ', '2019-10-16 00:59:01', 'ラブコメ', '殿堂入り', 'ホラー', NULL),
(31, 'かんけｔ', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'ああああああくそそ', '2019-10-16 01:00:17', 'ラブコメ', '完結済み', '買ってもいいかな', NULL),
(33, '柿木　優希', 'https://www.youtube.com/watch?v=Id2a2gbW1Zs', 'ｋｐｊっｐ', '2019-10-16 01:15:25', 'ラブコメ', '完結済み', '買ってもいいかな', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `task` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `php02_table`
--

INSERT INTO `php02_table` (`id`, `task`, `deadline`, `comment`, `indate`) VALUES
(1, 'gs', '2019-10-05', 'aiu', '2019-10-05 16:00:19'),
(2, 'gs2', '2019-10-05', 'aiu', '2019-10-05 16:13:11'),
(3, 'yoyoyo', '2019-10-05', 'aiu', '2019-10-05 16:13:34'),
(4, 'guuuuuuuus', '2019-10-05', 'aiu', '2019-10-05 16:13:47'),
(5, 'かいもの', '2019-08-08', 'なんｄねやねん', '2019-10-05 16:17:51'),
(6, 'かいもの', '2019-12-08', 'なんｄねやねん', '2019-10-05 16:18:16'),
(7, 'aaaaaaa', '2019-10-24', 'aaaa', '2019-10-05 17:01:40'),
(8, 'いいいいいいい', '2019-12-31', 'aiue\r\n\r\n', '2019-10-07 14:41:01');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, '林田　隆成', 'nikukyuhahaha', 'oshiemasen', 1, 1),
(2, 'にくきゅうははは', 'nikukyuhahaha111', 'oshiemasenyo', 1, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- テーブルのAUTO_INCREMENT `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルのAUTO_INCREMENT `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
