-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 03:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `climber`
--

-- --------------------------------------------------------

--
-- Table structure for table `filemanager_mediafile`
--

CREATE TABLE `filemanager_mediafile` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `alt` text COLLATE utf8_unicode_ci,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `thumbs` text COLLATE utf8_unicode_ci,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filemanager_mediafile_tag`
--

CREATE TABLE `filemanager_mediafile_tag` (
  `mediafile_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filemanager_owners`
--

CREATE TABLE `filemanager_owners` (
  `mediafile_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `owner_attribute` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `filemanager_tag`
--

CREATE TABLE `filemanager_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_admin_email`
--

CREATE TABLE `jl2_admin_email` (
  `id` int(11) NOT NULL,
  `email_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '属性',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名前',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `desc` text COLLATE utf8_unicode_ci COMMENT '説明',
  `is_stop` smallint(6) DEFAULT '0' COMMENT '一時停止フラグ',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_auth_assignment`
--

CREATE TABLE `jl2_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_auth_assignment`
--

INSERT INTO `jl2_auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('master', '1', 1495520329),
('master', '10', 1501212194);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_auth_item`
--

CREATE TABLE `jl2_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_auth_item`
--

INSERT INTO `jl2_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('master', 1, NULL, NULL, NULL, 1495520186, 1495520186),
('staff', 1, NULL, NULL, NULL, 1495520186, 1495520186);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_auth_item_child`
--

CREATE TABLE `jl2_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_auth_item_child`
--

INSERT INTO `jl2_auth_item_child` (`parent`, `child`) VALUES
('master', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `jl2_auth_rule`
--

CREATE TABLE `jl2_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_books`
--

CREATE TABLE `jl2_books` (
  `id` int(11) NOT NULL,
  `book_sid` int(11) DEFAULT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_genre` int(11) NOT NULL,
  `book_year` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_price1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_price2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `book_memo` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_books`
--

INSERT INTO `jl2_books` (`id`, `book_sid`, `book_name`, `book_genre`, `book_year`, `book_price1`, `book_price2`, `book_memo`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(19, 1, 'kaakshdkjahk', 9, '2014', '10000', '9000', 'kjdahskjdhakjsd', 1, 2147483647, 1503391947, 1503391947),
(20, 100, 'Đắc Nhân Tâm', 7, '2017', '111111', '222222', 'ádasdasdas', 1, 2147483647, 1503391947, 1503391947),
(24, 12, 'aaaa', 7, '2014', 'aa', 'xxxxxxxxx', 'xxxxxxxxx', 1, 2147483647, 1503391947, 1503389307),
(25, 1, 'Life', 10, '2017', '2000', '3000', '', 0, 1504065273, 1504065273, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_book_genre`
--

CREATE TABLE `jl2_book_genre` (
  `id` int(11) NOT NULL,
  `genre_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `genre_order` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_book_genre`
--

INSERT INTO `jl2_book_genre` (`id`, `genre_name`, `genre_order`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'abc', 5, 0, 2147483647, 1503391947, 1503389307),
(8, 'Sách Mới', 6, 0, 2147483647, 2147483647, NULL),
(9, 'loai sach', 2, 0, 2147483647, 2147483647, NULL),
(10, 'test', 1, 0, 1504065202, 1504065202, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_calendar`
--

CREATE TABLE `jl2_calendar` (
  `id` int(11) NOT NULL,
  `event_date` date DEFAULT NULL COMMENT '開催日(システム用)',
  `event_date_string` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '開催日（表示用）',
  `color` smallint(6) DEFAULT '0' COMMENT '背景色',
  `content1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '内容1',
  `content_url1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'リンク1',
  `content2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '内容2',
  `content_url2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'リンク2',
  `sub1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主催',
  `sub_url1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '主催リンク',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_calendar`
--

INSERT INTO `jl2_calendar` (`id`, `event_date`, `event_date_string`, `color`, `content1`, `content_url1`, `content2`, `content_url2`, `sub1`, `sub_url1`, `created_at`, `updated_at`) VALUES
(1, '0000-00-00', 'sdasdas', 1, 'ádasda', 'sdasda', 'sdasd', 'ádas', 'đá', 'ádasd', 1497426489, 1497426489);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_cms_category`
--

CREATE TABLE `jl2_cms_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'カテゴリー名',
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '経路',
  `root` smallint(6) DEFAULT '0' COMMENT 'ルートカテゴリ',
  `del_flg` smallint(6) DEFAULT '0' COMMENT '削除フラグ',
  `view_order` smallint(6) DEFAULT '0' COMMENT '表示順',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `is_no_visible` smallint(6) DEFAULT '0' COMMENT '表示・非表示',
  `cms_content_id` int(11) DEFAULT NULL COMMENT 'コンテンツID',
  `category_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'カテゴリキー',
  `redirect_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'URL',
  `system_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'システムID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_cms_content`
--

CREATE TABLE `jl2_cms_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ページタイトル',
  `desc` text COLLATE utf8_unicode_ci COMMENT 'ディスクリプション',
  `content` text COLLATE utf8_unicode_ci COMMENT 'コンテンツ',
  `del_flg` smallint(6) DEFAULT '0' COMMENT '削除フラグ',
  `is_no_visible` smallint(6) DEFAULT '0' COMMENT '表示・非表示',
  `view_order` smallint(6) DEFAULT '0' COMMENT '表示順',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `page_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ページID',
  `content_sp` text COLLATE utf8_unicode_ci COMMENT 'コンテンツ(スマホ用）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_contact`
--

CREATE TABLE `jl2_contact` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0' COMMENT 'ユーザID',
  `site_id` smallint(6) DEFAULT '0' COMMENT 'サイトID',
  `site_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'サイト名',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名前',
  `kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'かな',
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属名',
  `sex` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '性別',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '電話番号',
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '郵便番号',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '住所',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'タイトル',
  `message` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'メッセージ',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_convention_cate_data`
--

CREATE TABLE `jl2_convention_cate_data` (
  `id` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_convention_cate_data`
--

INSERT INTO `jl2_convention_cate_data` (`id`, `type`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）', 0, 2147483647, 0),
(2, 'B', '粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）', 0, 2147483647, 0),
(3, 'C', '組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）', 0, 2147483647, 0),
(4, 'D', '力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）', 0, 2147483647, 0),
(5, 'E', '変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）', 0, 2147483647, 0),
(6, 'F', '形状付与加工（切削加工,研削加工,接合,接着）', 0, 2147483647, 0),
(7, 'G', '腐食＆表面改質（腐食,防食,表面改質）', 0, 2147483647, 0),
(8, 'H', 'マグネシウム', 0, 2147483647, 0),
(9, 'I', 'チタン', 0, 2147483647, 0),
(10, 'J', '複合材料・発泡材料（複合材料・発泡材料,金属間化合物）', 0, 2147483647, 0),
(11, 'K', '分析・測定', 0, 2147483647, 0),
(12, 'L', 'aaaaaaaaaaaaa', 0, 2147483647, 0),
(13, 'M', '', 0, 2147483647, 0),
(14, 'N', '', 0, 2147483647, 0),
(15, 'O', '', 0, 2147483647, 0),
(16, 'P', 'ポスターセッション', 0, 2147483647, 0),
(17, 'Q', '', 0, 2147483647, 0),
(18, 'R', '', 0, 2147483647, 0),
(19, 'S', '', 0, 2147483647, 0),
(20, 'T1', 'KAkakaka', 0, 2147483647, 1498209031),
(21, 'T2', '', 0, 2147483647, 0),
(22, 'T3', '', 0, 2147483647, 0),
(23, 'T4', '', 0, 2147483647, 0),
(24, 'T5', '', 0, 2147483647, 0),
(25, 'T6', '', 0, 2147483647, 0),
(26, 'T7', '', 0, 2147483647, 0),
(27, 'T8', 'abc', 0, 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_convention_data`
--

CREATE TABLE `jl2_convention_data` (
  `id` int(11) NOT NULL,
  `conv_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_open` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_open` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_close` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `participation_open` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `participation_close` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_text` text COLLATE utf8_unicode_ci,
  `body_text` text COLLATE utf8_unicode_ci,
  `price01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price03` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_status` int(11) DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `link_page_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '詳細ページのリンクID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_convention_data`
--

INSERT INTO `jl2_convention_data` (`id`, `conv_name`, `conv_open`, `conv_place`, `speech_open`, `speech_close`, `participation_open`, `participation_close`, `type_text`, `body_text`, `price01`, `price02`, `price03`, `view_status`, `status`, `created_at`, `updated_at`, `deleted_at`, `link_page_id`) VALUES
(1, 'Testing', '', '', '2017-08-18', '2017-08-26', '2017-08-18', '2017-08-31', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '1', 1502677442, 1503649965, 1503648525, NULL),
(2, 'Tes convention', 'sa', '', '2017-08-23', '2017-08-28', '2017-08-23', '2017-08-26', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '1', 1503473174, 1503649961, 1503648521, NULL),
(3, 'Test final Climber', 'hahahahaha', '', '2017-08-25', '2017-08-29', '2017-08-25', '2017-08-30', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '1', 1503649952, 1503651983, 1503652103, NULL),
(4, 'Test Speaker', 'hahahaha', '', '2017-09-28', '2017-09-30', '2017-09-28', '2017-09-30', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1503888650, 1506581532, NULL, ''),
(5, 'Test payment bank transfer', '', '', '2017-08-30', '2017-08-31', '2017-08-30', '2017-08-31', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1504059925, 1504060375, NULL, NULL),
(6, 'Test credit payment late', '', '', '2017-08-30', '2017-08-31', '2017-08-30', '2017-08-31', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1504059962, 1504060302, NULL, NULL),
(7, 'Test payment create card', '', '', '2017-09-20', '2017-10-13', '2017-09-20', '2017-10-27', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1504060336, 1506930504, NULL, ''),
(8, 'check again again', '', '', '2017-09-29', '2017-10-06', '2017-09-29', '2017-10-06', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1506659816, 1507027014, NULL, ''),
(9, 'Test history', '', '', '2017-10-03', '2017-10-20', '2017-10-03', '2017-10-27', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1506998375, 1507000651, NULL, ''),
(10, 'test load data', 'test load data', 'test load data', '2017-10-03', '2017-10-20', '2017-10-03', '2017-10-28', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '1', 1507045570, 1507260938, 1507259438, '230895'),
(11, 'Test convention participant', 'Test convention participant', 'Test convention participant', '2017-10-08', '2017-10-21', '2017-10-08', '2017-10-21', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '1', 1507448970, 1507450861, 1507450201, ''),
(12, 'check condition in not-paid page', 'check condition in not-paid page', 'check condition in not-paid page', '2017-10-09', '2017-10-20', '2017-10-09', '2017-10-14', 'A	B	C	D	E	F	G	H	I	J	K	L	M	N	O	P	Q	R	S	T1	T2	T3	T4	T5	T6	T7	T8', '溶解・凝固・鋳造（凝固,急冷凝固,砂型・金型鋳造,ダイカスト,半凝固・半溶融加工,精製・液相リサイクル）	粉末冶金（メカニカルアロイング，急冷粉末，固化成形，固相リサイクル）	組織制御（状態図,拡散,加工熱処理，回復，再結晶，集合組織,相分離，時効析出，拡散）	力学特性 （強度，硬さ，延性，じん性，ぜい性,疲労，破壊，応力腐食）	変形および塑性加工プロセス（変形能,高温変形,クリープ,粒界すべり,超塑性,各種塑性加工プロセス）	形状付与加工（切削加工,研削加工,接合,接着）	腐食＆表面改質（腐食,防食,表面改質）	マグネシウム	チタン	複合材料・発泡材料（複合材料・発泡材料,金属間化合物）	分析・測定	aaaaaaaaaaaaa				ポスターセッション				KAkakaka							abc', '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 1, '0', 1507515787, 1507516904, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `jl2_convention_price_data`
--

CREATE TABLE `jl2_convention_price_data` (
  `id` int(11) NOT NULL,
  `price01` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price02` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price03` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_convention_price_data`
--

INSERT INTO `jl2_convention_price_data` (`id`, `price01`, `price02`, `price03`, `status`, `created_at`, `updated_at`) VALUES
(1, '1-5400,3-0,4-5400,2-2400,99-10000,5-5400', '1-8000,3-0,4-8000,2-1000,99-10000,5-8000', '1-500,3-500,4-500,2-500,99-500,5-500', 0, 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_info`
--

CREATE TABLE `jl2_info` (
  `id` int(11) NOT NULL,
  `info_date` date DEFAULT NULL COMMENT '公開日',
  `info_body` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `is_no_visible` smallint(6) DEFAULT '0' COMMENT '表示・非表示',
  `del_flg` smallint(6) DEFAULT '0' COMMENT '削除フラグ',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `category_id` smallint(6) DEFAULT NULL COMMENT 'カテゴリID',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'タイトル'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_log_book_sell`
--

CREATE TABLE `jl2_log_book_sell` (
  `id` int(11) NOT NULL,
  `book_id` int(5) NOT NULL,
  `book_cnt` int(5) NOT NULL,
  `login_flg` int(2) NOT NULL DEFAULT '0',
  `member_userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_category01` int(2) DEFAULT NULL,
  `member_mail` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_info01` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_info02` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_zip1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_zip2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(20) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `pay_way` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_status` int(11) DEFAULT '0',
  `pay_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `credit_response_json` text COLLATE utf8_unicode_ci COMMENT 'credit response',
  `credit_response_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'credit response'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_log_book_sell`
--

INSERT INTO `jl2_log_book_sell` (`id`, `book_id`, `book_cnt`, `login_flg`, `member_userid`, `member_name`, `member_category01`, `member_mail`, `member_tel`, `member_fax`, `member_info01`, `member_info02`, `member_zip1`, `member_zip2`, `member_address`, `status`, `created_at`, `updated_at`, `pay_way`, `pay_status`, `pay_date`, `credit_response_json`, `credit_response_id`) VALUES
(38, 20, 1, 0, NULL, 'Tạ Quang Trung', 1, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '4325', 'Hà Nội', 0, 1502953203, 1502953203, NULL, 0, NULL, NULL, NULL),
(39, 20, 1, 0, NULL, 'Tạ Quang Trung', 1, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '4325', 'Hà Nội', 0, 1502953385, 1502953385, NULL, 0, NULL, NULL, NULL),
(40, 20, 1, 0, NULL, 'Tạ Quang Trung', 1, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '4325', 'Hà Nội', 0, 1502953463, 1502953463, NULL, 0, NULL, NULL, NULL),
(41, 20, 1, 0, NULL, 'Tạ Quang Trung', 1, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '4325', 'Hà Nội', 0, 1502953469, 1502953469, NULL, 0, NULL, NULL, NULL),
(42, 20, 1, 0, NULL, 'Tạ Quang Trung', 1, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '4325', 'Hà Nội', 0, 1502953479, 1503393821, NULL, 1, '2017-08-31', NULL, NULL),
(43, 20, 1, 0, NULL, 'Tạ Quang Trung', 1, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '4325', 'Hà Nội', 0, 1502953518, 1507001612, '1', 1, '2017-10-03', NULL, NULL),
(44, 19, 1, 0, NULL, 'Tạ Quang Trung', 99, 'quanghieuit.hubt@gmail.com', '03-3538-0232', NULL, 'thông tin 1', 'Thông tin 2', '123', '5555', 'Hà Nội', 0, 1502953927, 1503038420, '', 1, '2017-08-18', NULL, NULL),
(45, 20, 3, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1503025757, 1503035972, '2', 1, '2017-08-18', NULL, NULL),
(46, 20, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1503050125, 1503393741, '2', 1, '2017-08-31', NULL, NULL),
(47, 20, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1503050140, 1503393711, '1', 1, '2017-08-22', NULL, NULL),
(48, 19, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1503052088, 1503393830, '1', 1, '2017-08-30', NULL, NULL),
(49, 20, 2, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1503284729, 1503284865, '1', 1, '2017-08-21', NULL, NULL),
(50, 25, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1504065395, 1504065395, '2', 1, '2017-08-30', NULL, NULL),
(51, 25, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1504065511, 1504065536, '1', 1, '2017-08-30', NULL, NULL),
(52, 25, 1, 0, NULL, 'ádasdasd', 99, 'hieutq@scuti.asia', '0968706683', NULL, 'ádasd', 'ádasd', '12', '123', 'ádasdas', 0, 1504082747, 1504082747, '1', 0, NULL, NULL, NULL),
(53, 25, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1504082809, 1504082809, '1', 0, NULL, NULL, NULL),
(54, 25, 1, 0, NULL, 'Tạ Quang Trung', 99, 'hieutq@scuti.asia', '0968706683', NULL, 'Harvard', 'Harvard', '213', '2312', 'sdasa', 0, 1504583226, 1504583226, '1', 0, NULL, NULL, NULL),
(55, 25, 1, 0, NULL, 'Tạ Quang Trung', 1, 'hieutq@scuti.asia', '0968706683', NULL, 'Harvard', 'Thông tin 2', '213', '2312', 'sdasa', 0, 1504583414, 1504583414, '1', 0, NULL, NULL, NULL),
(56, 25, 1, 0, NULL, 'Tạ Quang Trung', 99, 'hieutq@scuti.asia', '0968706683', NULL, 'Harvard', 'Thông tin 2', '213', '2312', 'sdasa', 0, 1504583568, 1504583568, '1', 0, NULL, NULL, NULL),
(57, 25, 1, 0, NULL, 'Tạ Quang Trung', 1, 'hieutq@scuti.asia', '0968706683', NULL, 'Harvard', 'Harvard', '213', '213', 'sdasa', 0, 1504584471, 1504584471, '2', 1, '2017-09-05', NULL, NULL),
(58, 25, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1507025782, 1507025881, '1', 1, '2017-10-03', NULL, NULL),
(59, 25, 2, 0, NULL, 'Tạ Quang Trung', 99, 'hieutq@scuti.asia', '0968706683', NULL, 'Harvard', 'Thông tin 2', '213', '2312', 'sdasa', 0, 1507177576, 1507177576, '2', 1, '2017-10-05', '{\n    "id": "ch_8e907659cbf2fb54153a8a5c62d85",\n    "amount": 4000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507177576,\n    "card": {\n        "id": "car_4b5846a6e1e9bb5c8c0345f1fc3e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507177574,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507177576,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_8e907659cbf2fb54153a8a5c62d85'),
(60, 25, 1, 1, '230895', 'Tạ Quang Hiếu', 2, 'hieutq@scuti.asia', '03-3538-0232 ', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', '231', '4567', 'Vĩnh Phúc', 0, 1507259636, 1507259637, '1', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_magazine`
--

CREATE TABLE `jl2_magazine` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'タイトル',
  `message` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'メッセージ',
  `dest_type` smallint(6) DEFAULT '0' COMMENT '"送信先区分ID',
  `is_send` smallint(6) DEFAULT '0' COMMENT '"送信したか',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `sended_at` int(11) DEFAULT NULL COMMENT '送信日時',
  `target_id` int(11) DEFAULT NULL COMMENT 'ターゲットID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_mail_queue`
--

CREATE TABLE `jl2_mail_queue` (
  `id` int(11) NOT NULL,
  `magazine_id` int(11) NOT NULL COMMENT 'メルマガID',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '名前',
  `send_status` smallint(6) DEFAULT '0' COMMENT '送信ステータス',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `sended_at` int(11) DEFAULT NULL COMMENT '送信日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_member`
--

CREATE TABLE `jl2_member` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名前',
  `kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'カナ',
  `info01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属1',
  `info02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '所属2',
  `kubun_id` smallint(6) DEFAULT NULL COMMENT '会員区分',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'メールアドレス',
  `zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '郵便番号',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '住所',
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '電話番号',
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'FAX',
  `member_status` smallint(6) DEFAULT '0' COMMENT '会員状態',
  `memo` text COLLATE utf8_unicode_ci COMMENT 'メモ',
  `del_flg` smallint(6) DEFAULT '0' COMMENT '削除フラグ',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ユーザID',
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_member`
--

INSERT INTO `jl2_member` (`id`, `user_id`, `name`, `kana`, `info01`, `info02`, `kubun_id`, `email`, `zip`, `address`, `tel`, `fax`, `member_status`, `memo`, `del_flg`, `created_at`, `updated_at`, `username`, `deleted_at`) VALUES
(1, 1, 'Tạ Quang Hiếu', 'Kana', 'infor01', 'infor 02', 5, 'quanghieuit@gmail.com', '123 - 4557', 'Vĩnh Phức', '0968706683', '1111-2222', 0, 'kjashdkajshkdjahkjdhakjsd', 0, NULL, 1499423270, '222222', NULL),
(2, 2, 'Hiếu', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', 'ấdsdas', 'Hà Nội', '0968706683', '03-3538-0226 ', 0, NULL, 0, 1498018141, 1499744494, '888888', NULL),
(3, 3, 'Hiếu', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', '123-6789', 'Hà Nội', '0968706683', '03-3538-0226 ', 0, '', 0, 1498018334, 1499423257, '123456', NULL),
(4, 4, 'Hiếu', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', 'ấdsdas', 'Hà Nội', '0968706683', '03-3538-0226 ', 1, NULL, 0, 1498018382, 1498018382, '123567', NULL),
(5, 5, 'Hiếu', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', 'ấdsdas', 'Hà Nội', '0968706683', '03-3538-0226 ', 1, NULL, 0, 1498018429, 1498018429, '090909', NULL),
(6, 6, 'Hiếu', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', 'ấdsdas', 'Hà Nội', '0968706683', '03-3538-0226 ', 0, NULL, 0, 1498018551, 1500371893, '696969', NULL),
(7, 7, 'Hiếu', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', 'ấdsdas', 'Hà Nội', '0968706683', '03-3538-0226 ', 0, NULL, 0, 1498018640, 1498018710, '898989', NULL),
(8, 8, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231-4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 0, '', 0, 1499102666, 1502418732, '230895', NULL),
(9, 9, 'ạkshdkaakjsd', 'カケヤ　トモヒデ', 'kaskjdahkj', 'kjdahkjshdkj', 2, 'quanghieuit.hubt@gmail.com', '123-4567', '1234', '03-3538-0232', '03-3538-0232', 0, '', 0, 1499228001, 1499423239, '686868', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_migration`
--

CREATE TABLE `jl2_migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_migration`
--

INSERT INTO `jl2_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1495520181),
('m160123_081119_create_user', 1497847590),
('m160123_081150_create_auth', 1495520186),
('m160123_081221_create_role', 1495520186),
('m170509_014251_create_cms_category', 1495520186),
('m170515_074622_add_cms_category', 1495520188),
('m170515_081705_create_cms_content', 1495520188),
('m170515_132357_add_cms_content', 1495520189),
('m170520_013756_create_admin_email', 1497425932),
('m170522_022546_create_member', 1495520189),
('m170523_064126_create_Book_genre', 1496032436),
('m170523_064145_create_Books', 1496032436),
('m170524_120804_add_member', 1495779035),
('m170524_135904_create_token', 1495779035),
('m170525_022437_add_user', 1495779036),
('m170525_092040_create_symposium_data_table', 1497425932),
('m170525_100001_create_filemanager_mediafile_table', 1495779036),
('m170525_100002_create_filemanager_owners_table', 1495779037),
('m170525_100003_add_filemanager_owners_ref_mediafile_fk', 1495779037),
('m170525_100004_add_filemanager_tags', 1495779039),
('m170526_090244_create_news_convention_data', 1497515073),
('m170529_063721_create_convention_cate_data', 1496161873),
('m170529_082831_create_convention_price_data', 1496046701),
('m170531_081749_create_kouensya_data', 1497581469),
('m170531_092846_create_contact', 1497425932),
('m170601_085123_create_info', 1497425933),
('m170602_023525_create_topic', 1497425933),
('m170602_024348_add_position_book_sid_to_book_data_table', 1496371554),
('m170605_033049_create_kouensya_member_mast', 1496634156),
('m170605_040939_create_symposium_participants_table', 1497425934),
('m170605_041121_create_symposium_participants_member_master_table', 1497425934),
('m170605_184351_create_convention_participants_table', 1498115670),
('m170605_184359_create_convention_participants_member_master_table', 1498115670),
('m170608_054217_alter_convention_category', 1497425936),
('m170608_054852_alter_convention_price', 1497425937),
('m170614_060550_create_calendar', 1497425938),
('m170615_063222_rename_convention_data_table', 1497515073),
('m170615_064958_rename_column_symposium_data_table', 1497864401),
('m170615_074627_rename_column_Books_Table', 1497512913),
('m170615_093751_rename_speaker_table', 1497581469),
('m170615_153305_rename_column_speaker_table', 1497581470),
('m170616_043400_rename_kouensya_member_mast_table', 1497588044),
('m170616_043825_rename_column_speaker_member_mast_table', 1497588045),
('m170619_092326_alter_column_book_genre_table', 1497864401),
('m170623_083932_alter_column_convention_member_mast_table', 1498207398),
('m170628_052056_create_magazine', 1498791160),
('m170628_052535_create_mailque', 1498791161),
('m170628_074239_add_magazine', 1498791161),
('m170628_092702_create_participants', 1498791162),
('m170703_145500_create_log_book_sell_table', 1499094616),
('m170705_074904_add_more_column_symposium_participant_table', 1499242783),
('m170728_064953_create_payment_logs', 1501468543),
('m170804_034942_add_more_cloumn_log_book_sell_table', 1501818948),
('m170804_061352_add_more_cloumn_log_book_sell_table', 1501827774),
('m170808_042040_alter_column_speaker_table', 1502361461),
('m170810_034507_add_pay_date_column_to_log_book_sell_table', 1502361462),
('m170810_102619_alter_column_convention_table', 1502361464),
('m170810_103109_alter_column_speaker_table', 1502361466),
('m170810_103208_alter_column_speaker_member_master_table', 1502361468),
('m170810_103507_alter_column_symposium_table', 1502361470),
('m170810_103703_alter_column_symposium_participant_table', 1502361473),
('m170814_034302_add_deleted_flag_column_deleted_at_column_to_book_table', 1503021582),
('m170814_034539_add_deleted_flag_column_deleted_at_column_to_book_genre_table', 1503021582),
('m170814_034818_add_deleted_flag_column_deleted_at_column_to_convention_data_table', 1503021583),
('m170814_040408_add_deleted_flag_column_deleted_at_column_to_speaker_data_table', 1503021584),
('m170814_040443_add_deleted_flag_column_deleted_at_column_to_symposium_data_table', 1503021584),
('m170814_040519_add_deleted_flag_column_deleted_at_column_to_symposium_participants_table', 1503021585),
('m170814_040543_add_deleted_flag_column_deleted_at_column_to_participant_table', 1503021586),
('m170814_041756_add_deleted_flag_column_deleted_at_column_to_member_table', 1503021587),
('m170816_065345_add_cms_content', 1505877130),
('m170816_072814_drop_deleted_flag_column_from_book_table', 1503021587),
('m170816_072846_drop_deleted_flag_column_from_book_genre_table', 1503021884),
('m170816_072900_drop_deleted_flag_column_from_convention_table', 1503021884),
('m170816_072916_drop_deleted_flag_column_from_speaker_table', 1503021885),
('m170816_072941_drop_deleted_flag_column_from_symposium_table', 1503021885),
('m170816_073006_drop_deleted_flag_column_from_symposium_participant_table', 1503021885),
('m170816_073041_drop_deleted_flag_column_from_participant_table', 1503021886),
('m170816_073055_drop_deleted_flag_column_from_member_table', 1503021886),
('m170816_080959_alter_column_books_table', 1502871040),
('m170816_090921_add_cms_category', 1505877131),
('m170817_075435_alter_column_book_genre_table', 1502956566),
('m170817_095751_drop_convention_participant_member_master_table', 1503021887),
('m170817_095809_drop_symposium_participant_member_master_table', 1503021887),
('m170817_100144_drop_convention_participant_table', 1503021888),
('m170821_015606_add_cms_category', 1505877133),
('m170828_080526_add_info', 1505877134),
('m170920_055723_create_withdraw', 1506567608),
('m170921_120255_add_convention_data', 1506567609),
('m170922_014553_add_symposium_participant', 1506567609),
('m170927_230105_add_speaker_data', 1506567610),
('m170927_234822_add_payment_log', 1506567611),
('m170929_114804_add_symposium_participant', 1506915161),
('m170930_041414_add_participants', 1506915162),
('m170930_231022_add_log_book_sel', 1506915163);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_participant`
--

CREATE TABLE `jl2_participant` (
  `id` int(11) NOT NULL,
  `convention_id` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_category` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_status` int(11) DEFAULT '1',
  `pay_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_date_plan` text COLLATE utf8_unicode_ci,
  `pay_way` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_way_text` text COLLATE utf8_unicode_ci,
  `pay_money` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `participant_menu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_bill` int(11) DEFAULT NULL,
  `memo1` text COLLATE utf8_unicode_ci,
  `intro_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_info01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_info02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_zip1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_zip2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時',
  `deleted_at` int(11) DEFAULT NULL,
  `credit_response_json` text COLLATE utf8_unicode_ci COMMENT 'credit response',
  `credit_response_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'credit response'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_participant`
--

INSERT INTO `jl2_participant` (`id`, `convention_id`, `uid`, `username`, `name`, `kana`, `info01`, `info02`, `member_category`, `email`, `zip1`, `zip2`, `address`, `tel`, `fax`, `pay_status`, `pay_date`, `pay_date_plan`, `pay_way`, `pay_way_text`, `pay_money`, `participant_menu`, `pay_bill`, `memo1`, `intro_name`, `intro_info01`, `intro_info02`, `intro_zip1`, `intro_zip2`, `intro_address`, `intro_tel`, `status`, `created_at`, `updated_at`, `deleted_at`, `credit_response_json`, `credit_response_id`) VALUES
(2, 1, 2, NULL, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'Harvard', 'infor 02', 99, 'hieutq@scuti.asia', '123', '4567', 'Hà Nội', '0968706683', '', 1, NULL, '2017-08-18', '5', NULL, '20500', '1,2,3', NULL, 'hhhhh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1503044928, 1503375056, 1503374936, NULL, NULL),
(3, 1, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, NULL, '2017-08-21', '5', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1503286965, 1503375056, 1503374936, NULL, NULL),
(4, 4, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 1, '2017-08-25', '2017-08-23', '5', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1503471605, 1503653034, 1503648525, NULL, NULL),
(5, 2, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 1, NULL, '2017-08-25', '1', NULL, '3400', '1,2', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1503648588, 1503649961, 1503648521, NULL, NULL),
(8, 3, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-08-25', '2017-08-25', '4', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1503651564, 1503653084, 1503652103, NULL, NULL),
(9, 4, 1, NULL, 'asdasdas', 'dasdasd', 'カケヤ　トモヒデ', 'Harvard', 5, 'hieutq@scuti.asia', '123', '123', 'Hà Nội', '2312312312', '', 2, '2017-08-28', '2017-08-28', '4', NULL, '13900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503894680, 1503894681, NULL, NULL, NULL),
(10, 4, 2, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'đâsdas', 'Harvard', 5, 'hieutq@scuti.asia', '12', '23', 'dsad', '0968706683', '', 2, '2017-09-28', '2017-08-28', '4', NULL, '13900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503902054, 1506582107, NULL, NULL, NULL),
(12, 4, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-08-28', '2017-08-28', '', NULL, '3900', '1,2,3', NULL, 'sdasdass', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503902289, 1503911015, NULL, NULL, NULL),
(13, 4, 4, NULL, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'phần mềm', 'カケヤ　トモヒデ', 5, 'hieutq@scuti.asia', '12', '323', 'sdassd', '0968706683', '', 1, NULL, '2017-08-28', '', NULL, '13900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503902492, 1503902492, NULL, NULL, NULL),
(14, 4, 5, '090909', 'Hiếu', 'カケヤ　トモヒデ', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', '123', '343', 'Hà Nội', '0968706683', '03-3538-0226 ', 2, '2017-08-28', '2017-08-28', '1', '', '8500', '2,3', 1, '', '', '', '', '', '', '', '', 0, 1503902602, 1503902785, NULL, NULL, NULL),
(15, 4, 6, NULL, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'IT', 99, 'hieutq@scuti.asia', '231', '4567', 'Hà Nội', '0968706683', '', 2, '2017-08-28', '2017-08-28', '4', NULL, '20000', '1,2', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503903398, 1503903400, NULL, NULL, NULL),
(16, 4, 7, NULL, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'Harvard', 5, 'hieutq@scuti.asia', '123', '4567', 'Hà Nội', '0968706683', '', 1, NULL, '2017-08-29', '4', NULL, NULL, '1,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503999860, 1503999860, NULL, NULL, NULL),
(17, 4, 8, NULL, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'Harvard', 5, 'hieutq@scuti.asia', '123', '4567', 'Hà Nội', '0968706683', '', 1, NULL, '2017-08-29', '4', NULL, NULL, '1,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1503999980, 1503999980, NULL, NULL, NULL),
(18, 4, 9, NULL, 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'Harvard', 5, 'hieutq@scuti.asia', '123', '4567', 'Hà Nội', '0968706683', '', 2, '2017-08-29', '2017-08-29', '4', NULL, '8500', '2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1504000748, 1504000748, NULL, NULL, NULL),
(19, 5, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-08-30', '2017-08-30', '2', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1504061685, 1504061909, NULL, NULL, NULL),
(20, 6, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-08-30', '2017-08-30', '4', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1504061976, 1504062035, NULL, NULL, NULL),
(24, 7, 2, NULL, 'Ta Quang Hieu', 'kana', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 5, 'hieutq@scuti.asia', '123', '2312', 'Hà Nội', '03-3538-0232 ', '', 2, '2017-09-21', '2017-09-21', '4', NULL, '8500', '2,3', NULL, 'adadadadada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1505970252, 1505970252, NULL, NULL, NULL),
(26, 7, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '123', '12', '42342dasdasda', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-09-28', '2017-09-28', '4', NULL, '3900', '1,2,3', NULL, 'sadsasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1506593852, 1506593895, NULL, NULL, NULL),
(27, 8, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '223', '1231', 'dasdasdasdasd', '03-3538-0232 ', '03-3538-0226 ', 1, '', '2017-09-29', '4', NULL, '3900', '1,2,3', NULL, 'sdasasdas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1506660037, 1506666396, NULL, NULL, NULL),
(28, 8, 2, NULL, 'Ta Quang Hieu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'Harvard', 5, 'hieutq@scuti.asia', '123', '342', 'Hà Nội', '0968706683', '', 1, NULL, '2017-09-29', '2', NULL, '13900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1506669950, 1506669950, NULL, NULL, NULL),
(29, 9, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-10-03', '2017-10-03', '3', NULL, '1500', '2,3', NULL, 'dasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1506999730, 1507000651, 1507000231, NULL, NULL),
(30, 10, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 2, '2017-10-07', '2017-10-05', '4', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1507087496, 1507392031, 1507259438, '{\n    "id": "ch_07eef598d2c957387f60e132d81c1",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507392030,\n    "card": {\n        "id": "car_3139492b11abf50cc667be752332",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507392029,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507392030,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_07eef598d2c957387f60e132d81c1'),
(31, 10, 2, NULL, 'Tạ Quang Hiếu', 'カケヤ トモヒデ', 'カケヤ　トモヒデ', 'Harvard', 5, 'hieutq@scuti.asia', '123', '2312', 'đâsda', '0968706683', '', 2, '2017-10-05', '2017-10-05', '4', NULL, '13900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1507177107, 1507260938, 1507259438, '{\n    "id": "ch_e34fb272f7268c29cef66853bb98c",\n    "amount": 13900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507177106,\n    "card": {\n        "id": "car_c3e58134b570e9d26f2f9315e174",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507176420,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507177106,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_e34fb272f7268c29cef66853bb98c'),
(32, 10, 3, NULL, 'Ta Quang Hieu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 5, 'hieutq@scuti.asia', '12', '34', 'adadada', '0968706683', '', 1, NULL, '2017-10-06', '5', NULL, '13900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1507259837, 1507260938, 1507259438, NULL, NULL),
(33, 11, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 1, NULL, '2017-10-08', '5', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1507449018, 1507450861, 1507450201, NULL, NULL),
(34, 12, 1, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 1, NULL, '2017-10-09', '2', NULL, '3900', '1,2,3', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1507516587, 1507516743, 1507515003, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_payment_logs`
--

CREATE TABLE `jl2_payment_logs` (
  `id` int(11) NOT NULL,
  `succesfull` int(11) DEFAULT NULL,
  `request_datetime` datetime DEFAULT NULL,
  `request` text COLLATE utf8_unicode_ci,
  `response` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `response_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'response id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_payment_logs`
--

INSERT INTO `jl2_payment_logs` (`id`, `succesfull`, `request_datetime`, `request`, `response`, `created_at`, `updated_at`, `response_id`) VALUES
(1, 1, '2017-08-04 08:37:09', '{"amount":1232,"currency":"jpy","card":"tok_f5f067c8f22a2f4838c6e9109bd2"}', '{\n    "id": "ch_3702aafaf1fa211c6a0eb5a77d855",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1501828665,\n    "card": {\n        "id": "car_5e69462ca73b633588837ccca340",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1501828525,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "d\\u00e2sdasasdas",\n        "object": "card"\n    },\n    "created": 1501828665,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1501828630, 1501828630, NULL),
(2, 1, '2017-08-07 09:28:04', '{"amount":3696,"currency":"jpy","card":"tok_69b5e175e4c6313358749276dd9e"}', '{\n    "id": "ch_8950566afb35aad804d83ce9b0b0b",\n    "amount": 3696,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502090925,\n    "card": {\n        "id": "car_aee550515d493b90c1026be009e5",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502090923,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasdas",\n        "object": "card"\n    },\n    "created": 1502090925,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502090887, 1502090887, NULL),
(3, 0, '2017-08-07 09:28:49', '{"amount":3696,"currency":"jpy","card":"tok_69b5e175e4c6313358749276dd9e"}', '{\n  "error": {\n    "charge": "ch_5056c16bd57b503e79283055671a0",\n    "code": "token_already_used",\n    "message": "Token \\"tok_69b5e175e4c6313358749276dd9e\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1502090930, 1502090930, NULL),
(4, 1, '2017-08-07 09:56:34', '{"amount":3696,"currency":"jpy","card":"tok_2931671b0e82999f0b9ff789ad77"}', '{\n    "id": "ch_eed65b1aaeeeb6d65da4ab2b103a8",\n    "amount": 3696,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502092634,\n    "card": {\n        "id": "car_0d0e59b6f294b1410477b8c9fe67",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502092633,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "23423423asdasdas",\n        "object": "card"\n    },\n    "created": 1502092634,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502092595, 1502092595, NULL),
(5, 1, '2017-08-07 12:36:07', '{"amount":3696,"currency":"jpy","card":"tok_95418dfde7472d29291ce5cc76bd"}', '{\n    "id": "ch_8d264af62623082901e8f1fe79ea8",\n    "amount": 3696,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502102207,\n    "card": {\n        "id": "car_0a77a29b013b568e7b01e2b0b319",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502100376,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "asdasdasda",\n        "object": "card"\n    },\n    "created": 1502102207,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502102168, 1502102168, NULL),
(6, 1, '2017-08-07 12:40:12', '{"amount":2000,"currency":"jpy","card":"tok_0e5e1e201885f1bdd3f47e58bb69"}', '{\n    "id": "ch_ac38ab401918b2ec26843b0333fa3",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502102452,\n    "card": {\n        "id": "car_172c587051c0acbc5cf5ae62d732",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502102451,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "21312312sdasdasdads",\n        "object": "card"\n    },\n    "created": 1502102452,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502102413, 1502102413, NULL),
(7, 0, '2017-08-07 12:40:27', '{"amount":2000,"currency":"jpy","card":"tok_0e5e1e201885f1bdd3f47e58bb69"}', '{\n  "error": {\n    "charge": "ch_7234ca3150c5fc161c766d4c30347",\n    "code": "token_already_used",\n    "message": "Token \\"tok_0e5e1e201885f1bdd3f47e58bb69\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1502102428, 1502102428, NULL),
(8, 1, '2017-08-07 12:41:33', '{"amount":2000,"currency":"jpy","card":"tok_5355fb73d64cb30849764b06ab0e"}', '{\n    "id": "ch_933da72e69c9f3e3824f4177fcb87",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502102533,\n    "card": {\n        "id": "car_c5dec68275ca3780bf0779b62e47",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502102532,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasadsdasdas",\n        "object": "card"\n    },\n    "created": 1502102533,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502102494, 1502102494, NULL),
(9, 1, '2017-08-07 12:43:58', '{"amount":2000,"currency":"jpy","card":"tok_2ff67af1b6ffa0106d11931356f5"}', '{\n    "id": "ch_5f8e28c0b60656954602dfd9bd660",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502102678,\n    "card": {\n        "id": "car_f4aeab2156c4d868aa74e37012cb",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502102677,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasasdasdas",\n        "object": "card"\n    },\n    "created": 1502102678,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502102639, 1502102639, NULL),
(10, 1, '2017-08-07 17:38:25', '{"amount":3900,"currency":"jpy","card":"tok_08a0f858e7e94b9e04e2816e36f7"}', '{\n    "id": "ch_da1bd0afed79f34cece2722609b45",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120346,\n    "card": {\n        "id": "car_7eb9c022b5f4d43b2adeeba623f4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120318,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdas",\n        "object": "card"\n    },\n    "created": 1502120346,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120307, 1502120307, NULL),
(11, 1, '2017-08-07 17:38:48', '{"amount":3900,"currency":"jpy","card":"tok_c7ebb37f6fae08dc310a91afa186"}', '{\n    "id": "ch_90b91a6d0502a744eb799064d8916",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120368,\n    "card": {\n        "id": "car_0bead74933687acfba1f590119ef",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120367,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsasdasdasd",\n        "object": "card"\n    },\n    "created": 1502120368,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120328, 1502120328, NULL),
(12, 0, '2017-08-07 17:40:08', '{"amount":3900,"currency":"jpy","card":"tok_c7ebb37f6fae08dc310a91afa186"}', '{\n  "error": {\n    "charge": "ch_d70b84f3c6a16ba7a0e05f38154d8",\n    "code": "token_already_used",\n    "message": "Token \\"tok_c7ebb37f6fae08dc310a91afa186\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1502120409, 1502120409, NULL),
(13, 1, '2017-08-07 17:41:50', '{"amount":3900,"currency":"jpy","card":"tok_c63f698118e7648309098cb5b183"}', '{\n    "id": "ch_8db873968ba39ee29300a55ac7d90",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120551,\n    "card": {\n        "id": "car_f3e6a38828d83c9c569e96f44e54",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120550,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdas",\n        "object": "card"\n    },\n    "created": 1502120551,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120511, 1502120511, NULL),
(14, 0, '2017-08-07 17:42:11', '{"amount":3900,"currency":"jpy","card":"tok_c63f698118e7648309098cb5b183"}', '{\n  "error": {\n    "charge": "ch_45bbe2e047af3629ba51809905cda",\n    "code": "token_already_used",\n    "message": "Token \\"tok_c63f698118e7648309098cb5b183\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1502120532, 1502120532, NULL),
(15, 1, '2017-08-07 17:42:42', '{"amount":3900,"currency":"jpy","card":"tok_af5167b8aafa627a5692b05bf33f"}', '{\n    "id": "ch_4a9b8374459db66a440f0a5de8dea",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120603,\n    "card": {\n        "id": "car_5673ab8177c93af8d86862e7cf0b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120602,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 11,\n        "exp_year": 2314,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsasdasds",\n        "object": "card"\n    },\n    "created": 1502120603,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120563, 1502120563, NULL),
(16, 1, '2017-08-07 17:44:24', '{"amount":3900,"currency":"jpy","card":"tok_afdbe29a0aa9d04f4726053bfb95"}', '{\n    "id": "ch_59eb1afdd2f611491c839fa1f3c79",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120705,\n    "card": {\n        "id": "car_6143c86284fe0ec33556bc374b8d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120703,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2311,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "ssfsdfsdfs",\n        "object": "card"\n    },\n    "created": 1502120705,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120665, 1502120665, NULL),
(17, 1, '2017-08-07 17:46:21', '{"amount":3900,"currency":"jpy","card":"tok_aa0643042266604b843b3c596214"}', '{\n    "id": "ch_05e085ddeb186c9861222ed21f758",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120822,\n    "card": {\n        "id": "car_7a0a6577c31b5c0b44a9d18ef739",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120821,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdsasdasd",\n        "object": "card"\n    },\n    "created": 1502120822,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120784, 1502120784, NULL),
(18, 1, '2017-08-07 17:47:24', '{"amount":3900,"currency":"jpy","card":"tok_c15aa789cd5b8bfcc8ec5c31e687"}', '{\n    "id": "ch_9cedc1938fd4a17d9a679b9209eed",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502120885,\n    "card": {\n        "id": "car_f2e7ee12a55aba92dca5ff759046",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502120884,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "asdasdasdas",\n        "object": "card"\n    },\n    "created": 1502120885,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120845, 1502120845, NULL),
(19, 1, '2017-08-07 17:49:36', '{"amount":2900,"currency":"jpy","card":"tok_c3dcc51500fe74b82f8041957bf0"}', '{\n    "id": "ch_0e85d863f3ff85d39ba6b742d8f2d",\n    "amount": 2900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502121017,\n    "card": {\n        "id": "car_3cc534920ad600f7e533a4bd4f54",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502121016,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasd",\n        "object": "card"\n    },\n    "created": 1502121017,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502120977, 1502120977, NULL),
(20, 1, '2017-08-07 17:55:08', '{"amount":3900,"currency":"jpy","card":"tok_2e7e13356fd69e2bf3300bcc0278"}', '{\n    "id": "ch_c3aa2f20951be2b6b14cf4f40c7c9",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502121348,\n    "card": {\n        "id": "car_82fe5e9a2b42b8a592e7a36f54e7",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502121347,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasadsadassdas",\n        "object": "card"\n    },\n    "created": 1502121348,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502121308, 1502121308, NULL),
(21, 1, '2017-08-07 19:15:35', '{"amount":"4444","currency":"jpy","card":"tok_eab4b427946290c9e9138421c653"}', '{\n    "id": "ch_b78b2c5e9584609bc425849f361fe",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502126176,\n    "card": {\n        "id": "car_84f2fc791df280be78546b4e296e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502126174,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasdasd",\n        "object": "card"\n    },\n    "created": 1502126176,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502126136, 1502126136, NULL),
(22, 1, '2017-08-07 19:19:23', '{"amount":"4444","currency":"jpy","card":"tok_f999fe1e0ee16273324953ad6102"}', '{\n    "id": "ch_24c3d98e76a197cbc6b0228a36b05",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502126404,\n    "card": {\n        "id": "car_972c44206fbc435ffa2a62839399",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502126403,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "sfsdfsdfsd",\n        "object": "card"\n    },\n    "created": 1502126404,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502126364, 1502126364, NULL),
(23, 1, '2017-08-07 19:22:35', '{"amount":"4444","currency":"jpy","card":"tok_2ffa63207d8aad36668847db20e3"}', '{\n    "id": "ch_359028394651856a0a489da376818",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502126596,\n    "card": {\n        "id": "car_25ed2486dc973932cbfe9cf88725",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502126595,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasd",\n        "object": "card"\n    },\n    "created": 1502126596,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502126556, 1502126556, NULL),
(24, 1, '2017-08-07 19:23:34', '{"amount":"4444","currency":"jpy","card":"tok_0fe41cda38f691cd5552114b5da3"}', '{\n    "id": "ch_4467294c2daa75ea6ff4655b37a13",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502126655,\n    "card": {\n        "id": "car_8e23f063dd4306fcd122275a49f8",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502126654,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsadsasdas",\n        "object": "card"\n    },\n    "created": 1502126655,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502126615, 1502126615, NULL),
(25, 1, '2017-08-07 19:24:53', '{"amount":"4444","currency":"jpy","card":"tok_ebf4d244f8ae40c49bec899a6ec4"}', '{\n    "id": "ch_eaea26d650887104ab17354cf74f0",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502126734,\n    "card": {\n        "id": "car_999bbefac771e9e4e4270b67685a",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502126733,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasdasd",\n        "object": "card"\n    },\n    "created": 1502126734,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502126694, 1502126694, NULL),
(26, 1, '2017-08-07 19:27:18', '{"amount":"4444","currency":"jpy","card":"tok_a40b0550740e405925659e0e3a33"}', '{\n    "id": "ch_b72871facae898bafcc12219cdda7",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502126879,\n    "card": {\n        "id": "car_5d83b591eb3378e77ad68fa3b92b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502126878,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsadasdasdas",\n        "object": "card"\n    },\n    "created": 1502126879,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502126839, 1502126839, NULL),
(27, 1, '2017-08-08 04:46:18', '{"amount":"4444","currency":"jpy","card":"tok_0c46c728e855c00827e145d4c57e"}', '{\n    "id": "ch_36226a8d008099cf19a020e318318",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502160419,\n    "card": {\n        "id": "car_b259567358e72b914f0a87d07537",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502160417,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasdasdasd",\n        "object": "card"\n    },\n    "created": 1502160419,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502160379, 1502160379, NULL),
(28, 0, '2017-08-08 04:58:09', '{"amount":"4444","currency":"jpy","card":"tok_0c46c728e855c00827e145d4c57e"}', '{\n  "error": {\n    "charge": "ch_199146a03fdf6adcb811e41b80aae",\n    "code": "token_already_used",\n    "message": "Token \\"tok_0c46c728e855c00827e145d4c57e\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1502161090, 1502161090, NULL),
(29, 1, '2017-08-08 05:08:41', '{"amount":"4444","currency":"jpy","card":"tok_8dbdc9c68334563e56bdd3b30538"}', '{\n    "id": "ch_a26ec95246d8e04d33d8fdbe4ce22",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502161761,\n    "card": {\n        "id": "car_e12b2c2f581a61faa7c06a39d7ab",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502161760,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasd",\n        "object": "card"\n    },\n    "created": 1502161761,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502161722, 1502161722, NULL),
(30, 1, '2017-08-08 06:14:04', '{"amount":1232,"currency":"jpy","card":"tok_5398066ecad6309beb7c2cc46fc4"}', '{\n    "id": "ch_a9ae05d75d6304781a4922ca72c82",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502165685,\n    "card": {\n        "id": "car_b62fdbc3952449f79afec22e8765",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502165671,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "asdasdasda",\n        "object": "card"\n    },\n    "created": 1502165685,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502165645, 1502165645, NULL),
(31, 1, '2017-08-09 10:21:17', '{"amount":1232,"currency":"jpy","card":"tok_dd997974235611ae4fc3cd5e160d"}', '{\n    "id": "ch_34455fb3b79d67b083cad31c93b31",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502266920,\n    "card": {\n        "id": "car_fea2c8c4ac412b363c4249f5d085",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502266919,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adsdasd",\n        "object": "card"\n    },\n    "created": 1502266920,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502266879, 1502266879, NULL),
(32, 1, '2017-08-09 10:23:59', '{"amount":2000,"currency":"jpy","card":"tok_a3ef947191e2b694a16375ffce5d"}', '{\n    "id": "ch_c9b3140a8a9c672fc98e88a14d2e2",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502267082,\n    "card": {\n        "id": "car_9faffcabb243e9685819a335de2e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502267080,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2344,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "asdasdasdas",\n        "object": "card"\n    },\n    "created": 1502267082,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502267040, 1502267040, NULL),
(33, 1, '2017-08-09 10:25:52', '{"amount":2000,"currency":"jpy","card":"tok_7597e28919796baecb143748bcf0"}', '{\n    "id": "ch_6296dc934e6ea0aa69bc906ed24e7",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502267194,\n    "card": {\n        "id": "car_9d23b4cba13e77838fc5f27939ca",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502267193,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adasdasdasdsads",\n        "object": "card"\n    },\n    "created": 1502267194,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502267153, 1502267153, NULL),
(34, 1, '2017-08-09 12:54:58', '{"amount":2000,"currency":"jpy","card":"tok_0ea8077123dc0a34fb97ac3e0980"}', '{\n    "id": "ch_d635816cbb8020d1655c3544e2b70",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502276141,\n    "card": {\n        "id": "car_1757410675d7bf5018e850a5f24d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502276139,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "asdasdasdasda",\n        "object": "card"\n    },\n    "created": 1502276141,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502276099, 1502276099, NULL),
(35, 1, '2017-08-09 12:57:19', '{"amount":2000,"currency":"jpy","card":"tok_2645eb0c8ab96170d3f7f924df07"}', '{\n    "id": "ch_8297eb4e8549cc8cf87d7fb292aaa",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502276282,\n    "card": {\n        "id": "car_aa9e2467080635a8645a67df8cb9",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502276281,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasd",\n        "object": "card"\n    },\n    "created": 1502276282,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502276240, 1502276240, NULL),
(36, 1, '2017-08-10 08:40:37', '{"amount":"4444","currency":"jpy","card":"tok_6c7bc263dca46769cb777e897707"}', '{\n    "id": "ch_7cf69b7f024e1b84bbd781721641a",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502347281,\n    "card": {\n        "id": "car_88c18c9cf858a62c93940f09dc9e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502347279,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "qweqweqweqw",\n        "object": "card"\n    },\n    "created": 1502347281,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502347239, 1502347239, NULL),
(37, 1, '2017-08-10 08:45:20', '{"amount":"4444","currency":"jpy","card":"tok_3328a405cef7ee929043175cb3b6"}', '{\n    "id": "ch_fb824a0d57daef19ae2ae51653ef5",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502347563,\n    "card": {\n        "id": "car_bacfbefb2d0a65bb749e01bfb7df",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502347562,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dwdasdasd",\n        "object": "card"\n    },\n    "created": 1502347563,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502347521, 1502347521, NULL),
(38, 1, '2017-08-10 08:47:08', '{"amount":"4444","currency":"jpy","card":"tok_4470d0bf7a4da4ed0f7bc3d81632"}', '{\n    "id": "ch_3f076b67854805f6271a4791fecf1",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502347671,\n    "card": {\n        "id": "car_1fa49a193f2843a7fca15a229114",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502347670,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdas",\n        "object": "card"\n    },\n    "created": 1502347671,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502347629, 1502347629, NULL),
(39, 1, '2017-08-10 08:48:49', '{"amount":"4444","currency":"jpy","card":"tok_c2c0703d07bc67f5830c6d8f5570"}', '{\n    "id": "ch_b2dc1130059c8b34628c82d9a82ce",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502347773,\n    "card": {\n        "id": "car_eef1ee353d00fb69b3502a867584",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502347771,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "asdasdasd",\n        "object": "card"\n    },\n    "created": 1502347773,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502347730, 1502347730, NULL),
(40, 1, '2017-08-10 08:49:42', '{"amount":"4444","currency":"jpy","card":"tok_3d3d441234c7573c7be597823f0f"}', '{\n    "id": "ch_9bf4306d77605aa0460b735cddf2a",\n    "amount": 4444,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502347826,\n    "card": {\n        "id": "car_aac3d4c0add5f7cb5795d7b7fbe5",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502347824,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdas",\n        "object": "card"\n    },\n    "created": 1502347826,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502347785, 1502347785, NULL),
(41, 1, '2017-08-10 10:51:14', '{"amount":1232,"currency":"jpy","card":"tok_3143831eed9d6bc35e5d00fea146"}', '{\n    "id": "ch_c8173b67c2c1d71beff9a9b52b07b",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502355118,\n    "card": {\n        "id": "car_6d619c7ec675db0cb3070c15fd07",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502355117,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "sdasdasdas",\n        "object": "card"\n    },\n    "created": 1502355118,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502355075, 1502355075, NULL);
INSERT INTO `jl2_payment_logs` (`id`, `succesfull`, `request_datetime`, `request`, `response`, `created_at`, `updated_at`, `response_id`) VALUES
(42, 1, '2017-08-10 10:51:51', '{"amount":1232,"currency":"jpy","card":"tok_4b048cff1fed4c1f94aa1d709de1"}', '{\n    "id": "ch_3e0994c7dfc60a0fd1057a0687b18",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502355154,\n    "card": {\n        "id": "car_63a112e55ddef4b172b8dd1c52ca",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502355153,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "wqeweqweqweq",\n        "object": "card"\n    },\n    "created": 1502355154,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502355112, 1502355112, NULL),
(43, 0, '2017-08-10 10:52:40', '{"amount":1232,"currency":"jpy","card":"tok_4b048cff1fed4c1f94aa1d709de1"}', '{\n  "error": {\n    "charge": "ch_42486bc719afa426b9b4d9651f90e",\n    "code": "token_already_used",\n    "message": "Token \\"tok_4b048cff1fed4c1f94aa1d709de1\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1502355161, 1502355161, NULL),
(44, 1, '2017-08-10 11:33:09', '{"amount":500,"currency":"jpy","card":"tok_003bbf8de833b40686c84427f0c9"}', '{\n    "id": "ch_1becf138ccf043924a0b462c9b858",\n    "amount": 500,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502357634,\n    "card": {\n        "id": "car_6853bae0fbc025ffb6b63bce65b8",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502357631,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasda",\n        "object": "card"\n    },\n    "created": 1502357634,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502357592, 1502357592, NULL),
(45, 1, '2017-08-10 11:42:19', '{"amount":1232,"currency":"jpy","card":"tok_375996869a73bc709c666abc5bb4"}', '{\n    "id": "ch_f1b7a32664b2577fd06b1b1b653bd",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502358182,\n    "card": {\n        "id": "car_1ededaaa6b20a270d86974e7f0a4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502358181,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdas",\n        "object": "card"\n    },\n    "created": 1502358182,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502358139, 1502358139, NULL),
(46, 1, '2017-08-10 11:43:02', '{"amount":1232,"currency":"jpy","card":"tok_8d85955caa40ff7bdb8579647394"}', '{\n    "id": "ch_d7c73ed131382df2920eea615f49c",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502358226,\n    "card": {\n        "id": "car_98c5d944031b4c257dc19cc243b0",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502358225,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasd",\n        "object": "card"\n    },\n    "created": 1502358226,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502358183, 1502358183, NULL),
(47, 1, '2017-08-10 12:10:06', '{"amount":23456,"currency":"jpy","card":"tok_ac958150b8621a4142edcf5381e3"}', '{\n    "id": "ch_020a0447dd30fe91e27160ab7d8cd",\n    "amount": 23456,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502359850,\n    "card": {\n        "id": "car_15561ecce5d7e0c36773c77e4039",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502359848,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2312,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasd",\n        "object": "card"\n    },\n    "created": 1502359850,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502359808, 1502359808, NULL),
(48, 1, '2017-08-10 12:14:58', '{"amount":2000,"currency":"jpy","card":"tok_f5fc3956df340b3394500f2bcf71"}', '{\n    "id": "ch_98cee1a03d801ba38dc3e6d0c0aba",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502360142,\n    "card": {\n        "id": "car_b2ce087af77321abc28baccca6bc",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502360141,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdas",\n        "object": "card"\n    },\n    "created": 1502360142,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502360099, 1502360099, NULL),
(49, 1, '2017-08-10 12:15:52', '{"amount":2000,"currency":"jpy","card":"tok_b8d30d00579eb3fbf3f6e59d430c"}', '{\n    "id": "ch_346d2c602fd68d3e79a1ab5251618",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502360196,\n    "card": {\n        "id": "car_c650c311e51c32eb2915a7f3490e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502360195,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasd",\n        "object": "card"\n    },\n    "created": 1502360196,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502360154, 1502360154, NULL),
(50, 1, '2017-08-10 12:16:37', '{"amount":2000,"currency":"jpy","card":"tok_030869c61d69995aae196d9b8a63"}', '{\n    "id": "ch_bb8a987afb32011e98aa64cf00415",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502360241,\n    "card": {\n        "id": "car_bfb7acad84580d914b00dbe13d73",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502360240,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdadsdassd",\n        "object": "card"\n    },\n    "created": 1502360241,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502360200, 1502360200, NULL),
(51, 1, '2017-08-11 04:38:57', '{"amount":1232,"currency":"jpy","card":"tok_c6d6b66016cce970bfcccf22c791"}', '{\n    "id": "ch_beae4ecffecc672b4a53847148dec",\n    "amount": 1232,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502419181,\n    "card": {\n        "id": "car_4c0cb6538220e0b8c3ac56b41c94",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502419180,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u01b0asdasdasdasdasdasdas",\n        "object": "card"\n    },\n    "created": 1502419181,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502419138, 1502419138, NULL),
(52, 1, '2017-08-11 04:39:54', '{"amount":222222,"currency":"jpy","card":"tok_e088521bbfa2866f453aec886693"}', '{\n    "id": "ch_2caca94cd2094d16aab223c57aadf",\n    "amount": 222222,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502419237,\n    "card": {\n        "id": "car_5a6859cc73ad8f3cdb365a15dc36",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502419234,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u00e1dasdasdasdasdasasd",\n        "object": "card"\n    },\n    "created": 1502419237,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502419194, 1502419194, NULL),
(53, 1, '2017-08-14 13:57:30', '{"amount":111111,"currency":"jpy","card":"tok_0412677488fba946d2fc980a0090"}', '{\n    "id": "ch_188170534a33756be0211bd3543f0",\n    "amount": 111111,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502711899,\n    "card": {\n        "id": "car_dd1339453be558adbc9d38c3d212",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502711897,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u00e1dasdasdasdasd",\n        "object": "card"\n    },\n    "created": 1502711899,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502711852, 1502711852, NULL),
(54, 1, '2017-08-14 14:05:28', '{"amount":111111,"currency":"jpy","card":"tok_d1b77ef44e9b69a139dc6f43f5a3"}', '{\n    "id": "ch_0328c53f1e2fc15bb25d1a3835d46",\n    "amount": 111111,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502712376,\n    "card": {\n        "id": "car_27fba4acaec2ca3d91a87e52e252",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502712375,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasdasd",\n        "object": "card"\n    },\n    "created": 1502712376,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502712328, 1502712328, NULL),
(55, 1, '2017-08-15 05:06:36', '{"amount":2000,"currency":"jpy","card":"tok_911246caea161d30bbce1eff5737"}', '{\n    "id": "ch_cd7dbc0409749751d541ad265d265",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502766397,\n    "card": {\n        "id": "car_6c35bcb1c817edba575cbe200ab4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502766395,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u00e1dasdasdasdasasdasd",\n        "object": "card"\n    },\n    "created": 1502766397,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502766397, 1502766397, NULL),
(56, 1, '2017-08-16 10:41:06', '{"amount":23456,"currency":"jpy","card":"tok_fddf038c79d0d284111cb579e9e6"}', '{\n    "id": "ch_d020a63ad87aa0630c63cde088bb1",\n    "amount": 23456,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1502872869,\n    "card": {\n        "id": "car_0519a277e8adf179aa113b349524",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1502872868,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "wdsdasdasd",\n        "object": "card"\n    },\n    "created": 1502872869,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1502872868, 1502872868, NULL),
(57, 1, '2017-08-18 07:59:29', '{"amount":666666,"currency":"jpy","card":"tok_d74a870a406960a97e726a93a9bf"}', '{\n    "id": "ch_fba251dab6521c6c9c16bb9c57e3e",\n    "amount": 666666,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503035971,\n    "card": {\n        "id": "car_f8951025444e5c609b50c2a89514",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503035969,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdadsdasd",\n        "object": "card"\n    },\n    "created": 1503035971,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503035971, 1503035971, NULL),
(58, 1, '2017-08-18 11:47:56', '{"amount":2000,"currency":"jpy","card":"tok_02784bfd19fb0faf8d006c2b0c02"}', '{\n    "id": "ch_ebcc549140b660d69ed12678f4445",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503049678,\n    "card": {\n        "id": "car_50d3d0b1601bf0e4d910856bb39b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503049677,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u01b0qeweqweqweq",\n        "object": "card"\n    },\n    "created": 1503049678,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503049678, 1503049678, NULL),
(59, 1, '2017-08-18 11:49:15', '{"amount":2000,"currency":"jpy","card":"tok_c0245cafd4022a7af4bf9ab48171"}', '{\n    "id": "ch_bb6b46c8800f72e3f83a9ee24343c",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503049756,\n    "card": {\n        "id": "car_281613093d2eee555ef9696b8607",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503049756,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2343,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111\\u00e2sdasdasd",\n        "object": "card"\n    },\n    "created": 1503049756,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503049756, 1503049756, NULL),
(60, 1, '2017-08-18 11:50:48', '{"amount":"1111","currency":"jpy","card":"tok_c32f2f41c20a237af45e1dd2aeb9"}', '{\n    "id": "ch_028d322dafa144e34820c1ff83e28",\n    "amount": 1111,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503049849,\n    "card": {\n        "id": "car_6d82ebad0375acdc2ffad4c8a3a4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503049848,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasds",\n        "object": "card"\n    },\n    "created": 1503049849,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503049849, 1503049849, NULL),
(61, 1, '2017-08-18 12:27:15', '{"amount":2000,"currency":"jpy","card":"tok_9f3dc62f641be1a03dcc1c475300"}', '{\n    "id": "ch_0b4b23e7d26ccdc6ea3888aa1765a",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503052037,\n    "card": {\n        "id": "car_29bb5205a2470093f2582aef4ecf",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503052036,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2131,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasdasd",\n        "object": "card"\n    },\n    "created": 1503052037,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503052037, 1503052037, NULL),
(62, 1, '2017-08-18 12:31:18', '{"amount":500,"currency":"jpy","card":"tok_bb929624a3d21755564152a6e7e9"}', '{\n    "id": "ch_58475cc107f0d1acfe39eb334de81",\n    "amount": 500,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503052279,\n    "card": {\n        "id": "car_b840b9ceef0357faff48f9e7fd67",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503052278,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasdas",\n        "object": "card"\n    },\n    "created": 1503052279,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503052279, 1503052279, NULL),
(63, 1, '2017-08-18 12:42:18', '{"amount":222222,"currency":"jpy","card":"tok_3c535fd8e858a99c49dc7458f0d4"}', '{\n    "id": "ch_80c3f0507a71145d347a609dd9828",\n    "amount": 222222,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503052940,\n    "card": {\n        "id": "car_dda56fd6b54ce80a5d406b6fed34",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503052939,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdadasdasdasasda",\n        "object": "card"\n    },\n    "created": 1503052940,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503052939, 1503052939, NULL),
(64, 0, '2017-08-21 06:40:05', '{"amount":0,"currency":"jpy","card":"tok_3a1c2d334e7122e36bf70821b502"}', '{\n  "error": {\n    "code": "invalid_amount",\n    "message": "The amount must be between 50 and 9,999,999 JPY.",\n    "param": "amount",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1503290406, 1503290406, NULL),
(65, 1, '2017-08-25 10:38:27', '{"amount":3900,"currency":"jpy","card":"tok_83b44b3c1f704b7df89829d1ae04"}', '{\n    "id": "ch_d3f1346036b798a5310237df6342a",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503650309,\n    "card": {\n        "id": "car_54cf8db1436390ab01e763968a79",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503650308,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "",\n        "object": "card"\n    },\n    "created": 1503650309,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503650309, 1503650309, NULL),
(66, 1, '2017-08-25 10:42:06', '{"amount":3900,"currency":"jpy","card":"tok_eedbf867ed42bc7f22cbcc645a7a"}', '{\n    "id": "ch_fefffa1daf8eafc1846163236ac91",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503650527,\n    "card": {\n        "id": "car_6e206408dce8c5b99137dd0ca74d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503650527,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4233,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\u0111asdasd",\n        "object": "card"\n    },\n    "created": 1503650527,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503650527, 1503650527, NULL),
(67, 1, '2017-08-25 10:45:24', '{"amount":2000,"currency":"jpy","card":"tok_1c4517c62210062b6522c62be33e"}', '{\n    "id": "ch_abbac5aa87a79403ca5f0227b0c63",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503650726,\n    "card": {\n        "id": "car_11001dbb89022a6657d0c086f774",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503650725,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "sdasdasdad",\n        "object": "card"\n    },\n    "created": 1503650726,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503650725, 1503650725, NULL),
(68, 1, '2017-08-25 11:10:36', '{"amount":2000,"currency":"jpy","card":"tok_89e83e69a49b2cfb220f3a83a414"}', '{\n    "id": "ch_51f7a319387f32dc7c361a3ace3b1",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503652238,\n    "card": {\n        "id": "car_55188990e97e3610e589432e4bf5",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503652237,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3432,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasd",\n        "object": "card"\n    },\n    "created": 1503652238,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503652237, 1503652237, NULL),
(69, 1, '2017-08-25 11:20:07', '{"amount":2000,"currency":"jpy","card":"tok_69c970507d09dce7bd3033ac712e"}', '{\n    "id": "ch_9325f78f689a2eacf464b6babf4ac",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503652809,\n    "card": {\n        "id": "car_d9f66f694f4507088444137ee876",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503652808,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdasdasdasda",\n        "object": "card"\n    },\n    "created": 1503652809,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503652808, 1503652808, NULL),
(70, 1, '2017-08-25 11:23:13', '{"amount":3900,"currency":"jpy","card":"tok_c1f25d63173c2b5187c8423e33ea"}', '{\n    "id": "ch_4462991d08b69e0f18a8b659f8e87",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503652995,\n    "card": {\n        "id": "car_2cab8c2a65b81b3233dcf9866039",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503652845,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adsasdsdads",\n        "object": "card"\n    },\n    "created": 1503652995,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503652994, 1503652994, NULL),
(71, 0, '2017-08-25 11:23:37', '{"amount":3900,"currency":"jpy","card":"tok_c1f25d63173c2b5187c8423e33ea"}', '{\n  "error": {\n    "charge": "ch_eac673d4c160f952248d3112df903",\n    "code": "token_already_used",\n    "message": "Token \\"tok_c1f25d63173c2b5187c8423e33ea\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1503653018, 1503653018, NULL),
(72, 1, '2017-08-25 11:23:54', '{"amount":3900,"currency":"jpy","card":"tok_59a2c2a8531c7c3fe49e28971377"}', '{\n    "id": "ch_f3fe4b609eb011a8b780df4020e1e",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503653035,\n    "card": {\n        "id": "car_74a313e623c23ecbf2cf68097be3",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503653034,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adsasdadsads",\n        "object": "card"\n    },\n    "created": 1503653035,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503653034, 1503653034, NULL),
(73, 0, '2017-08-25 11:24:28', '{"amount":3900,"currency":"jpy","card":"tok_59a2c2a8531c7c3fe49e28971377"}', '{\n  "error": {\n    "charge": "ch_3bab603171ea090064ecc743a2744",\n    "code": "token_already_used",\n    "message": "Token \\"tok_59a2c2a8531c7c3fe49e28971377\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1503653069, 1503653069, NULL),
(74, 1, '2017-08-25 11:24:43', '{"amount":3900,"currency":"jpy","card":"tok_3de63ac4412f72a6ce2b089fabf3"}', '{\n    "id": "ch_f6c0a796ed209893d5af58ddc1e51",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503653084,\n    "card": {\n        "id": "car_0cb335c2511adbab86f6b5e69234",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503653083,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adasdsaadsdsa",\n        "object": "card"\n    },\n    "created": 1503653084,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503653083, 1503653083, NULL),
(75, 1, '2017-08-25 11:26:11', '{"amount":"2000","currency":"jpy","card":"tok_bd08b3f5a372c7888bae8190492e"}', '{\n    "id": "ch_7cc4ae4b2f1a051c2f7ac0112f9a5",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503653173,\n    "card": {\n        "id": "car_e305e6241494b3acc06e1498df4c",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503653101,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsadasdsadsa",\n        "object": "card"\n    },\n    "created": 1503653173,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503653172, 1503653172, NULL),
(76, 0, '2017-08-25 11:26:33', '{"amount":"2000","currency":"jpy","card":"tok_bd08b3f5a372c7888bae8190492e"}', '{\n  "error": {\n    "charge": "ch_0920113dad676371d8ba60cf37209",\n    "code": "token_already_used",\n    "message": "Token \\"tok_bd08b3f5a372c7888bae8190492e\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1503653194, 1503653194, NULL),
(77, 1, '2017-08-25 11:26:52', '{"amount":"2000","currency":"jpy","card":"tok_f9e0627b419ff9fae33e034574c3"}', '{\n    "id": "ch_3aa53e2b706300cea5287bb59a59a",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503653214,\n    "card": {\n        "id": "car_aad942ace5701ee145a31a3729fb",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503653213,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasasdsda",\n        "object": "card"\n    },\n    "created": 1503653214,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503653213, 1503653213, NULL),
(78, 1, '2017-08-28 06:14:24', '{"amount":2000,"currency":"jpy","card":"tok_d7734e1aa1d66b3deb4796e8b03e"}', '{\n    "id": "ch_e62fc93ab93a9da2e11e0fff489a8",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503893669,\n    "card": {\n        "id": "car_eab76ea5514e80d64b678a7dcbe8",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503893667,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsadsads",\n        "object": "card"\n    },\n    "created": 1503893669,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503893665, 1503893665, NULL),
(79, 1, '2017-08-28 06:15:31', '{"amount":2000,"currency":"jpy","card":"tok_a419e48685d61e0d3e5596759d48"}', '{\n    "id": "ch_7bd061fda966bf7cc206e875db9c0",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503893735,\n    "card": {\n        "id": "car_ee2a65caa4d5b3ec18a38e470c17",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503893734,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "sdasdasdas",\n        "object": "card"\n    },\n    "created": 1503893735,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503893731, 1503893731, NULL),
(80, 1, '2017-08-28 06:31:20', '{"amount":13900,"currency":"jpy","card":"tok_6621c54a14cebf9ddaac9b11db91"}', '{\n    "id": "ch_b5155219eba92bf2ac1ed3f04c841",\n    "amount": 13900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503894685,\n    "card": {\n        "id": "car_e5a20d8f5dca45b7e28773f7b6fa",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503894684,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dasdassddsa",\n        "object": "card"\n    },\n    "created": 1503894685,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503894681, 1503894681, NULL),
(81, 1, '2017-08-28 08:56:38', '{"amount":20000,"currency":"jpy","card":"tok_6173a863c47f426e4cd3cf520f0a"}', '{\n    "id": "ch_55a29d11a3aa2c3dc046b1a74ae4b",\n    "amount": 20000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503903404,\n    "card": {\n        "id": "car_2b3e9bd6c1a28e35d0a3f10d7201",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503903402,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1503903404,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503903400, 1503903400, NULL),
(82, 1, '2017-08-28 08:57:51', '{"amount":3000,"currency":"jpy","card":"tok_15cfdbc921fc7109beb7eec472f4"}', '{\n    "id": "ch_35f86e966c3fdd34a550aa80369ed",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503903475,\n    "card": {\n        "id": "car_e08e12d09bafc3bf5ba4b7b63c53",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503903474,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3424,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "sadsddassa",\n        "object": "card"\n    },\n    "created": 1503903475,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503903472, 1503903472, NULL);
INSERT INTO `jl2_payment_logs` (`id`, `succesfull`, `request_datetime`, `request`, `response`, `created_at`, `updated_at`, `response_id`) VALUES
(83, 1, '2017-08-28 09:06:00', '{"amount":3900,"currency":"jpy","card":"tok_f10fa60266dedd18280f8e2ca481"}', '{\n    "id": "ch_46b7ac6cbc0b6c86dc0298e33ce46",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1503903964,\n    "card": {\n        "id": "car_af23203bd4e97b08e1060571186b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1503903963,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3243,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsdasddadss",\n        "object": "card"\n    },\n    "created": 1503903964,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1503903960, 1503903960, NULL),
(84, 0, '2017-08-29 11:44:20', '{"amount":5900,"currency":"jpy","card":"tok_ce24452bae7cc850865619682af1"}', '{\n  "error": {\n    "charge": "ch_b06b66be168c16d5773de7984efd6",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1503999862, 1503999862, NULL),
(85, 0, '2017-08-29 11:46:20', '{"amount":5900,"currency":"jpy","card":"tok_ce24452bae7cc850865619682af1"}', '{\n  "error": {\n    "charge": "ch_2432070e5b094c1501cb606e49b4d",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1503999981, 1503999981, NULL),
(86, 0, '2017-08-29 11:56:30', '{"amount":8500,"currency":"jpy","card":"tok_c0eff63489288491cc01ba564051"}', '{\n  "error": {\n    "charge": "ch_25e8fdb3d99cbbead74c3913acd29",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504000591, 1504000591, NULL),
(87, 1, '2017-08-29 11:59:07', '{"amount":8500,"currency":"jpy","card":"tok_3a153fe3659a6b31d51dd5a470f9"}', '{\n    "id": "ch_2bc8cd5dd36dccff33df13f1c21db",\n    "amount": 8500,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504000753,\n    "card": {\n        "id": "car_4067609577e27c3a38d5f6ecd025",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504000753,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "addaddadadadad",\n        "object": "card"\n    },\n    "created": 1504000753,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504000748, 1504000748, NULL),
(88, 0, '2017-08-29 12:06:12', '{"amount":2000,"currency":"jpy","card":"tok_26f147bba262b2b892e9b303d5a2"}', '{\n  "error": {\n    "charge": "ch_945021a1f143442c2a6fbaec27dba",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504001173, 1504001173, NULL),
(89, 0, '2017-08-29 12:07:28', '{"amount":2000,"currency":"jpy","card":"tok_d3bd80db4f192eb5392836442b95"}', '{\n  "error": {\n    "charge": "ch_c44789cf13d15043c683d7d3e2a7b",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504001249, 1504001249, NULL),
(90, 1, '2017-08-29 12:09:15', '{"amount":2000,"currency":"jpy","card":"tok_e93f2a29499a62918d6aaf83e16c"}', '{\n    "id": "ch_9d4469ab9711d888a93f7a83ec824",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504001361,\n    "card": {\n        "id": "car_32b781c6834b6037dbc74a435f0e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504001360,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "daadadada",\n        "object": "card"\n    },\n    "created": 1504001361,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504001356, 1504001356, NULL),
(91, 1, '2017-08-29 12:12:23', '{"amount":2000,"currency":"jpy","card":"tok_b5d67e75d8e8184053ac6af1d53c"}', '{\n    "id": "ch_0dd3d981fdd8c704ea5286cde107f",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504001549,\n    "card": {\n        "id": "car_90a90fc70feb7da7ccbd784cd795",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504001548,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dadadadd",\n        "object": "card"\n    },\n    "created": 1504001549,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504001543, 1504001543, NULL),
(92, 0, '2017-08-29 12:23:42', '{"amount":2000,"currency":"jpy","card":"tok_521c65b82bc7b3679aa5760a6050"}', '{\n  "error": {\n    "charge": "ch_f0083f0b84c4ad62060e2ba4c5558",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504002223, 1504002223, NULL),
(93, 1, '2017-08-29 12:24:02', '{"amount":2000,"currency":"jpy","card":"tok_9b70fca86f208ca3f682e14ed5e3"}', '{\n    "id": "ch_e33e157ecb3eaa22c6f9d5b283e51",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504002248,\n    "card": {\n        "id": "car_e610fb36d7f739b12b6f9c42d9fb",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504002247,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3424,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dadaadda",\n        "object": "card"\n    },\n    "created": 1504002248,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504002243, 1504002243, NULL),
(94, 1, '2017-08-29 12:25:43', '{"amount":2000,"currency":"jpy","card":"tok_168d727da329211c9b5e7bdcc447"}', '{\n    "id": "ch_49433c4e3a7c7c12c3401ed9cb461",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504002350,\n    "card": {\n        "id": "car_4e15139d1f605939d9b479de22e8",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504002349,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dadada",\n        "object": "card"\n    },\n    "created": 1504002350,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504002344, 1504002344, NULL),
(95, 0, '2017-08-30 04:41:41', '{"amount":2000,"currency":"jpy","card":"tok_ccdf79fe5f64ccb4912ce8f49bfc"}', '{\n  "error": {\n    "charge": "ch_acf990af8ff847817e36c1ffcc112",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504060902, 1504060902, NULL),
(96, 1, '2017-08-30 05:00:34', '{"amount":3900,"currency":"jpy","card":"tok_e5db2d008068759dadfe6642ef0a"}', '{\n    "id": "ch_3488760d2eaf12b8890e8dc5f320e",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504062040,\n    "card": {\n        "id": "car_c00da707785536767f740c5cc4ad",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504062039,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2434,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1504062040,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504062035, 1504062035, NULL),
(97, 1, '2017-08-30 05:05:42', '{"amount":2000,"currency":"jpy","card":"tok_e1877bd81bc167507245aa0f2d85"}', '{\n    "id": "ch_510b9154cf129aba2cf05d8dcdc5a",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504062348,\n    "card": {\n        "id": "car_57398607f002708cf3d4c77ba80d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504062347,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dadada",\n        "object": "card"\n    },\n    "created": 1504062348,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504062343, 1504062343, NULL),
(98, 0, '2017-08-30 05:09:32', '{"amount":3900,"currency":"jpy","card":"tok_6c3b5a4eefa34511d2282489694f"}', '{\n  "error": {\n    "charge": "ch_961abef8c1266710d271323c55d61",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504062573, 1504062573, NULL),
(99, 1, '2017-08-30 05:10:02', '{"amount":3900,"currency":"jpy","card":"tok_f4453f89af70f89033decd61f2a7"}', '{\n    "id": "ch_dc645499838dd3a7455ee1c26ad65",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504062608,\n    "card": {\n        "id": "car_d80c2dfeb0b891521a0228962d15",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504062608,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2434,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "\\\\scuti",\n        "object": "card"\n    },\n    "created": 1504062608,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504062603, 1504062603, NULL),
(100, 0, '2017-08-30 05:13:11', '{"amount":2000,"currency":"jpy","card":"tok_ee73c775f0ff8886676d3bdf40c1"}', '{\n  "error": {\n    "charge": "ch_859f03a9a2abc4b13bba41f98bd31",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504062792, 1504062792, NULL),
(101, 1, '2017-08-30 05:20:52', '{"amount":2000,"currency":"jpy","card":"tok_19832921355020b5bb430862fa12"}', '{\n    "id": "ch_a72698af2500348bbacab1dd4e43b",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504063259,\n    "card": {\n        "id": "car_a959b195a65a6eb1f2c717f1f11e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504063258,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dadadada",\n        "object": "card"\n    },\n    "created": 1504063259,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504063253, 1504063253, NULL),
(102, 0, '2017-08-30 05:44:26', '{"amount":1000,"currency":"jpy","card":"tok_a0e6f8e47738ed5dcfb41564e65c"}', '{\n  "error": {\n    "charge": "ch_d0cb5c397b07d396bc1e63d4c0610",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504064667, 1504064667, NULL),
(103, 1, '2017-08-30 05:44:50', '{"amount":1000,"currency":"jpy","card":"tok_ead7799ef49c9d5262f6e17a4171"}', '{\n    "id": "ch_ea5fcfce95734c552e3f607e23133",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504064697,\n    "card": {\n        "id": "car_b95d3455bfacf5a4ede05d2fff1c",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504064696,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dadadada",\n        "object": "card"\n    },\n    "created": 1504064697,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504064691, 1504064691, NULL),
(104, 1, '2017-08-30 05:51:51', '{"amount":"1000","currency":"jpy","card":"tok_940429f486660cf07e3509fcf2e6"}', '{\n    "id": "ch_e1ae7174fb2d94f47bcce3d1592fc",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504065118,\n    "card": {\n        "id": "car_be0375905fb2803c92203eeaaed0",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504065117,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adadada",\n        "object": "card"\n    },\n    "created": 1504065118,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504065112, 1504065112, NULL),
(105, 0, '2017-08-30 05:55:51', '{"amount":3000,"currency":"jpy","card":"tok_37bc5bcd8514485ee60b288336b9"}', '{\n  "error": {\n    "charge": "ch_67b8a1cc1edc9b3b74ed8b3efd775",\n    "code": "card_declined",\n    "message": "Card declined",\n    "status": 402,\n    "type": "card_error"\n  }\n}', 1504065352, 1504065352, NULL),
(106, 1, '2017-08-30 05:56:34', '{"amount":3000,"currency":"jpy","card":"tok_788b7ed2b4d5f16a5f8f8082c80d"}', '{\n    "id": "ch_f1f7b46e68c49f00e3f4e48ad47fa",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504065401,\n    "card": {\n        "id": "car_a6d0b67f6c00801715941b1e2a5f",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504065400,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "d\\u00e2daddaadadda",\n        "object": "card"\n    },\n    "created": 1504065401,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504065395, 1504065395, NULL),
(107, 1, '2017-08-30 06:17:21', '{"amount":1000,"currency":"jpy","card":"tok_5f824060e64ed42a5baa4deff07f"}', '{\n    "id": "ch_55d20b3838c988342470a433310b4",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504066649,\n    "card": {\n        "id": "car_485477888b50f0a2bc24b9a3ae03",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504066647,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "daddaddadadaadadadadad",\n        "object": "card"\n    },\n    "created": 1504066649,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504066644, 1504066644, NULL),
(108, 1, '2017-08-31 07:08:29', '{"amount":"2000","currency":"jpy","card":"tok_2af8b2807bdb931b97682ce174d2"}', '{\n    "id": "ch_33cd229ebbc5dd12616c1f46d9680",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504156118,\n    "card": {\n        "id": "car_b611c2fff9f16bb105f50aedad40",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504156117,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "d\\u00e2dadadada",\n        "object": "card"\n    },\n    "created": 1504156118,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504156111, 1504156111, NULL),
(109, 1, '2017-09-05 06:07:49', '{"amount":3000,"currency":"jpy","card":"tok_22f7ce073b4da2d0b19772fe88a8"}', '{\n    "id": "ch_500e21e5e7088ce633b9d2bde8229",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1504584483,\n    "card": {\n        "id": "car_90c1b49cf6f957f381b42cc559cb",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1504584481,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2018,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1504584483,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1504584471, 1504584471, NULL),
(110, 1, '2017-09-20 07:46:46', '{"amount":2000,"currency":"jpy","card":"tok_8c98d7b508e7ee158d7cb440e7c5"}', '{\n    "id": "ch_e050cf00350c35c949e8ae47fd50d",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505886407,\n    "card": {\n        "id": "car_93b3e30a579ce3e82b5c7219840b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505885310,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "TA QUANG HIEU",\n        "object": "card"\n    },\n    "created": 1505886407,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505886407, 1505886407, NULL),
(111, 1, '2017-09-20 07:51:43', '{"amount":2000,"currency":"jpy","card":"tok_8bc14d2fd42f262d3e94f15af434"}', '{\n    "id": "ch_ca971c5a9546818854989b618e061",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505886704,\n    "card": {\n        "id": "car_da22bb5cf83bac4f52b2a984f05d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505886696,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "TA QUANG HIEU",\n        "object": "card"\n    },\n    "created": 1505886704,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505886704, 1505886704, NULL),
(112, 1, '2017-09-20 09:44:05', '{"amount":2000,"currency":"jpy","card":"tok_2c1f2b9ea63aa566f40a0fcad04a"}', '{\n    "id": "ch_8e0143449e88e8cab973c0fbf7dfc",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505893447,\n    "card": {\n        "id": "car_248ce91e61d4226adb4567e88bbf",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505893418,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adaddaadda",\n        "object": "card"\n    },\n    "created": 1505893447,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505893446, 1505893446, NULL),
(113, 1, '2017-09-21 06:46:02', '{"amount":3900,"currency":"jpy","card":"tok_f212f7f85db13c0c21100350a924"}', '{\n    "id": "ch_c5591b8e555daecb024c70f71ca87",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505969165,\n    "card": {\n        "id": "car_ce17c8d6787e575ddf40bf595012",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505969164,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3424,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adadadad",\n        "object": "card"\n    },\n    "created": 1505969165,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505969164, 1505969164, NULL),
(114, 1, '2017-09-21 07:04:11', '{"amount":8500,"currency":"jpy","card":"tok_2dc5e932d3a6b3bb723be65f00c1"}', '{\n    "id": "ch_4392f9b0cc48bae3afe1b3b2922d5",\n    "amount": 8500,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505970253,\n    "card": {\n        "id": "car_f68708d2d87444f5c14ce4b0b77e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505970252,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 2131,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "ta quang hieu",\n        "object": "card"\n    },\n    "created": 1505970253,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505970252, 1505970252, NULL),
(115, 1, '2017-09-21 07:17:21', '{"amount":1000,"currency":"jpy","card":"tok_e4a332891b0ad96a821a7b245999"}', '{\n    "id": "ch_1326dbb54843cbe1c4d481d1d6b7f",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505971043,\n    "card": {\n        "id": "car_1a22560aed641ece0a662dc2a64b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505971042,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3213,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adadadaadda",\n        "object": "card"\n    },\n    "created": 1505971043,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505971042, 1505971042, NULL),
(116, 1, '2017-09-21 08:39:09', '{"amount":2000,"currency":"jpy","card":"tok_081da3780ff2d8c8760f5f0b3fd1"}', '{\n    "id": "ch_dec0d236b8654540802d08bf3bcb9",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505975951,\n    "card": {\n        "id": "car_8ec7a8117fddf055dc950319497b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505975923,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "ta quang hieu",\n        "object": "card"\n    },\n    "created": 1505975951,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505975950, 1505975950, NULL),
(117, 1, '2017-09-21 11:46:27', '{"amount":2000,"currency":"jpy","card":"tok_745cf3276282158e768bbdd1f8b2"}', '{\n    "id": "ch_a216b85f1d6b16cc34bab650e1deb",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505987190,\n    "card": {\n        "id": "car_25e1b169b2451ffb3285e6866c14",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505987159,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "dsadsdasdas",\n        "object": "card"\n    },\n    "created": 1505987190,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505987189, 1505987189, NULL),
(118, 1, '2017-09-21 12:23:41', '{"amount":3900,"currency":"jpy","card":"tok_c2afb8ba224f324746a4a9c4d2ae"}', '{\n    "id": "ch_b20942958c497a1080e3913252a56",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1505989424,\n    "card": {\n        "id": "car_3a0880765f82111630e8a59ec622",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1505989423,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "adadadadadadadad",\n        "object": "card"\n    },\n    "created": 1505989424,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1505989422, 1505989422, NULL),
(119, 1, '2017-09-28 08:53:12', '{"amount":2000,"currency":"jpy","card":"tok_c575b39bc5e2f62302f56a1d4307"}', '{\n    "id": "ch_7ba591bfeb459e3f0a10b6d1ba784",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506581593,\n    "card": {\n        "id": "car_cbaa9a08faf48f793832fcfa0e77",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506581592,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506581593,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506581594, 1506581594, 'ch_7ba591bfeb459e3f0a10b6d1ba784'),
(120, 1, '2017-09-28 09:01:46', '{"amount":13900,"currency":"jpy","card":"tok_7c7e9380eb15164d39b8f1616ccf"}', '{\n    "id": "ch_aae88010184b02c34ac30ded9f38d",\n    "amount": 13900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506582107,\n    "card": {\n        "id": "car_3276cadf7f82d9f1a38ce281ddb0",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506582106,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506582107,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506582107, 1506582107, 'ch_aae88010184b02c34ac30ded9f38d'),
(121, 1, '2017-09-28 09:51:14', '{"amount":"2000","currency":"jpy","card":"tok_bd760eb2d831942fcda24276c093"}', '{\n    "id": "ch_5695d19bf79832a2126ee0492efe2",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506585075,\n    "card": {\n        "id": "car_68888879ada63ede363ded4f9fac",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506585074,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506585075,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506585075, 1506585075, 'ch_5695d19bf79832a2126ee0492efe2'),
(122, 1, '2017-09-28 10:45:09', '{"amount":2000,"currency":"jpy","card":"tok_beb3d1df50c7bfb687ca64706e47"}', '{\n    "id": "ch_182f5cc15905772c4c9e6c3ad7bb9",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506588310,\n    "card": {\n        "id": "car_7199ead92f204cc069eb71aa9cae",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506588309,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506588310,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506588311, 1506588311, 'ch_182f5cc15905772c4c9e6c3ad7bb9'),
(123, 1, '2017-09-28 11:06:29', '{"amount":"1000","currency":"jpy","card":"tok_3355252c6f7c0f6788b3839a66f3"}', '{\n    "id": "ch_057c3234df758a2cc7ef681558fed",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506589591,\n    "card": {\n        "id": "car_c6ac8a12267f602d90ad82b308c3",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506589589,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506589591,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506589591, 1506589591, 'ch_057c3234df758a2cc7ef681558fed'),
(124, 1, '2017-09-28 12:17:31', '{"amount":3900,"currency":"jpy","card":"tok_db239558d6805343fec747889950"}', '{\n    "id": "ch_f8a8212b4ad77ca0904dda109790d",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506593852,\n    "card": {\n        "id": "car_0474d822e40ee5685c7949d161c0",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506593851,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scutia",\n        "object": "card"\n    },\n    "created": 1506593852,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506593852, 1506593852, 'ch_f8a8212b4ad77ca0904dda109790d'),
(125, 1, '2017-09-28 12:32:56', '{"amount":1000,"currency":"jpy","card":"tok_71cfacd8dede2ef76e23c77872b6"}', '{\n    "id": "ch_75da3d7491a64fe170a214aa749b8",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506594777,\n    "card": {\n        "id": "car_12947cc6618d03a764291ca072f4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506594776,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506594777,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506594777, 1506594777, 'ch_75da3d7491a64fe170a214aa749b8'),
(126, 1, '2017-09-29 06:42:09', '{"amount":3900,"currency":"jpy","card":"tok_b862cb2173d9c63742c430934c74"}', '{\n    "id": "ch_aad793111b6bb745a4b2e250e3426",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506660132,\n    "card": {\n        "id": "car_03a7d3f9454bfa81d02097199893",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506660131,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506660132,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506660131, 1506660131, 'ch_aad793111b6bb745a4b2e250e3426'),
(127, 1, '2017-09-29 09:24:00', '{"amount":1000,"currency":"jpy","card":"tok_bdefd1bf08b4916d4affeb421fb6"}', '{\n    "id": "ch_7da973e24ddfd9b4ab89b7109a9b6",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506669843,\n    "card": {\n        "id": "car_dfd6e98289d2a2cc4a85913293a2",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506669842,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506669843,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506669841, 1506669841, 'ch_7da973e24ddfd9b4ab89b7109a9b6');
INSERT INTO `jl2_payment_logs` (`id`, `succesfull`, `request_datetime`, `request`, `response`, `created_at`, `updated_at`, `response_id`) VALUES
(128, 1, '2017-10-03 04:56:32', '{"amount":1500,"currency":"jpy","card":"tok_7f11e81af5d13d28bb111007340d"}', '{\n    "id": "ch_4ead7bdd436cbea04901159f2a73e",\n    "amount": 1500,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506999394,\n    "card": {\n        "id": "car_e349726af48ef792fd9fe4cfac5d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506999392,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3424,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506999394,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506999393, 1506999393, 'ch_4ead7bdd436cbea04901159f2a73e'),
(129, 1, '2017-10-03 04:56:55', '{"amount":1500,"currency":"jpy","card":"tok_b9ccffdc87593805aa2234eb9ff9"}', '{\n    "id": "ch_c94dc10ac242c1c990308b455302a",\n    "amount": 1500,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506999416,\n    "card": {\n        "id": "car_ba2e103822f2b055c52feca8f6a2",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506999416,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506999416,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1506999415, 1506999415, 'ch_c94dc10ac242c1c990308b455302a'),
(130, 1, '2017-10-03 05:27:29', '{"amount":1000,"currency":"jpy","card":"tok_6f2527c85366faf4efb966a2c568"}', '{\n    "id": "ch_998154f3d34d722474510dba82038",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507001251,\n    "card": {\n        "id": "car_7f90eb1d333356b51d5d2111e79f",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507001250,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 11,\n        "exp_year": 3234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507001251,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507001250, 1507001250, 'ch_998154f3d34d722474510dba82038'),
(131, 1, '2017-10-05 06:06:23', '{"amount":13900,"currency":"jpy","card":"tok_62c7ff20131ebc9f9143c5b138d1"}', '{\n    "id": "ch_49b3285f94e5739ef1593d8785d11",\n    "amount": 13900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507176385,\n    "card": {\n        "id": "car_d275461182b7a42336f811e1ae30",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507176383,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507176385,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507176385, 1507176385, 'ch_49b3285f94e5739ef1593d8785d11'),
(132, 1, '2017-10-05 06:18:26', '{"amount":13900,"currency":"jpy","card":"tok_0c58ed3eb647fb5232775b275342"}', '{\n    "id": "ch_e34fb272f7268c29cef66853bb98c",\n    "amount": 13900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507177106,\n    "card": {\n        "id": "car_c3e58134b570e9d26f2f9315e174",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507176420,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4342,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507177106,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507177107, 1507177107, 'ch_e34fb272f7268c29cef66853bb98c'),
(133, 1, '2017-10-05 06:26:15', '{"amount":4000,"currency":"jpy","card":"tok_69fafe600bc720b5b1812dba39f3"}', '{\n    "id": "ch_8e907659cbf2fb54153a8a5c62d85",\n    "amount": 4000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507177576,\n    "card": {\n        "id": "car_4b5846a6e1e9bb5c8c0345f1fc3e",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507177574,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507177576,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507177576, 1507177576, 'ch_8e907659cbf2fb54153a8a5c62d85'),
(134, 1, '2017-10-05 06:29:33', '{"amount":1000,"currency":"jpy","card":"tok_26b644817a921c9e614994de95d9"}', '{\n    "id": "ch_81bef8fb1b8015f5ef6b06cd242fb",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507177774,\n    "card": {\n        "id": "car_5a2af8466465cb51393d045d4287",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507177773,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507177774,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507177774, 1507177774, 'ch_81bef8fb1b8015f5ef6b06cd242fb'),
(135, 0, '2017-10-05 06:29:58', '{"amount":1000,"currency":"jpy","card":"tok_26b644817a921c9e614994de95d9"}', '{\n  "error": {\n    "charge": "ch_6521b71d8a9a571c8b193a5e48178",\n    "code": "token_already_used",\n    "message": "Token \\"tok_26b644817a921c9e614994de95d9\\" has already been used.",\n    "param": "card",\n    "status": 400,\n    "type": "client_error"\n  }\n}', 1507177799, 1507177799, NULL),
(136, 1, '2017-10-05 11:40:59', '{"amount":1000,"currency":"jpy","card":"tok_a569ae78f4d86da9beefa8ec68cb"}', '{\n    "id": "ch_228e1f95df916a1845c7eb4f33482",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507196461,\n    "card": {\n        "id": "car_edafe29d4839e9f14a4dc4b0744b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507196459,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507196461,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507196461, 1507196461, 'ch_228e1f95df916a1845c7eb4f33482'),
(137, 1, '2017-10-06 05:28:45', '{"amount":1000,"currency":"jpy","card":"tok_7f066d70954cc4ec80e03758b687"}', '{\n    "id": "ch_798cf2139d479221e6c6a8fb36693",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507260527,\n    "card": {\n        "id": "car_7b19b92a55cce668fbf0fd9fe910",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507260526,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507260527,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507260526, 1507260526, 'ch_798cf2139d479221e6c6a8fb36693'),
(138, 1, '2017-10-07 17:59:18', '{"amount":2000,"currency":"jpy","card":"tok_bc3e6f570ca60764120245df458f"}', '{\n    "id": "ch_88c763df5314ea7139ed9252d84c7",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507391960,\n    "card": {\n        "id": "car_ea23803833f139b21aca217fed39",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507391958,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507391960,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507391960, 1507391960, 'ch_88c763df5314ea7139ed9252d84c7'),
(139, 1, '2017-10-07 18:00:04', '{"amount":"1000","currency":"jpy","card":"tok_7724ca76393cab5039d9557030bf"}', '{\n    "id": "ch_201cc823c142a0a28cc2ca48574bd",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507392005,\n    "card": {\n        "id": "car_88b1481b413e413de1025987060d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507392004,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507392005,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507392005, 1507392005, 'ch_201cc823c142a0a28cc2ca48574bd'),
(140, 1, '2017-10-07 18:00:29', '{"amount":3900,"currency":"jpy","card":"tok_203e9d12d497c0eebfe45dec4aa9"}', '{\n    "id": "ch_07eef598d2c957387f60e132d81c1",\n    "amount": 3900,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507392030,\n    "card": {\n        "id": "car_3139492b11abf50cc667be752332",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507392029,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3423,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507392030,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507392031, 1507392031, 'ch_07eef598d2c957387f60e132d81c1'),
(141, 1, '2017-10-09 05:25:04', '{"amount":"2000","currency":"jpy","card":"tok_7518f40b4415c78cac9d66a9ace1"}', '{\n    "id": "ch_fa190054def5663bf6174873dafbc",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507519506,\n    "card": {\n        "id": "car_5767b524678169a382179353efa8",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507519505,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4233,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507519506,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507519505, 1507519505, 'ch_fa190054def5663bf6174873dafbc'),
(142, 1, '2017-10-09 09:15:56', '{"amount":3000,"currency":"jpy","card":"tok_f389ad65d3b2846df4d398648718"}', '{\n    "id": "ch_4f4156f570808929cf1ff1b98231e",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507533360,\n    "card": {\n        "id": "car_0b095fac820a547a1b51e85a686c",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507533358,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507533360,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507533358, 1507533358, 'ch_4f4156f570808929cf1ff1b98231e'),
(143, 1, '2017-10-09 09:18:03', '{"amount":3000,"currency":"jpy","card":"tok_b9c7e5cfceb0c33ec0e4b232fa70"}', '{\n    "id": "ch_36102d38fd35caf2f4a7afd59556f",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507533485,\n    "card": {\n        "id": "car_7f3e253e1a4b8f4f02044ce8baea",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507533484,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4233,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507533485,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507533484, 1507533484, 'ch_36102d38fd35caf2f4a7afd59556f'),
(144, 1, '2017-10-09 09:20:45', '{"amount":1000,"currency":"jpy","card":"tok_b99bb77b15cde255924a8deffce6"}', '{\n    "id": "ch_ffc50ebf3e9846821418143eb77ae",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507533648,\n    "card": {\n        "id": "car_0250ec19401bf8e1347f3afd87b4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507533647,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507533648,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 1507533646, 1507533646, 'ch_ffc50ebf3e9846821418143eb77ae');

-- --------------------------------------------------------

--
-- Table structure for table `jl2_speaker_data`
--

CREATE TABLE `jl2_speaker_data` (
  `id` int(11) NOT NULL,
  `convention_id` int(5) DEFAULT NULL,
  `speech_uid` int(7) DEFAULT NULL,
  `speech_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_style` int(2) DEFAULT NULL,
  `speech_head` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_section_head` smallint(4) NOT NULL DEFAULT '0',
  `speech_section_head_1` smallint(4) NOT NULL DEFAULT '0',
  `speech_section_head_2` smallint(4) NOT NULL DEFAULT '0',
  `speech_section_head_3` smallint(4) NOT NULL DEFAULT '0',
  `speech_section_head_4` smallint(4) NOT NULL DEFAULT '0',
  `speech_section_head_5` smallint(4) NOT NULL DEFAULT '0',
  `speech_presentation_uid` int(2) DEFAULT NULL,
  `speech_userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_info01` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_title_eng` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_cmnt1` text COLLATE utf8_unicode_ci,
  `speech_mail` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_tel` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_fax` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_zip1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_zip2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_category01` int(3) DEFAULT NULL,
  `speech_send_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_status` int(11) DEFAULT '1',
  `pay_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_way` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speech_note1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `credit_response_json` text COLLATE utf8_unicode_ci COMMENT 'credit response',
  `credit_response_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'credit response'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_speaker_data`
--

INSERT INTO `jl2_speaker_data` (`id`, `convention_id`, `speech_uid`, `speech_type`, `speech_style`, `speech_head`, `speech_section_head`, `speech_section_head_1`, `speech_section_head_2`, `speech_section_head_3`, `speech_section_head_4`, `speech_section_head_5`, `speech_presentation_uid`, `speech_userid`, `speech_name`, `speech_info01`, `speech_title`, `speech_title_eng`, `speech_cmnt1`, `speech_mail`, `speech_tel`, `speech_fax`, `speech_zip1`, `speech_zip2`, `speech_address`, `speech_category01`, `speech_send_name`, `pay_status`, `pay_date`, `pay_way`, `speech_note1`, `status`, `created_at`, `updated_at`, `deleted_at`, `credit_response_json`, `credit_response_id`) VALUES
(1, 1, 1, NULL, NULL, '3', 4, 4, 9, 5, 3, 4, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'asDasda', 'asdada', 'asdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1502787125, 1503375056, 1503374936, NULL, NULL),
(2, 1, 2, NULL, NULL, '3', 4, 6, 11, 5, 2, 2, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'Be All You Can Be', 'asdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1502787342, 1503375056, 1503374936, NULL, NULL),
(3, 1, 3, 'A', NULL, '3', 1, 7, 7, 6, 6, 3, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'asDasda', 'asdas', 'asdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, '', '1', '', 1, 1502788568, 1503375056, 1503374936, NULL, NULL),
(4, 1, 4, NULL, NULL, '3', 2, 5, 7, 6, 5, 3, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'asdasd', 'asdas', 'asda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1502794036, 1503375056, 1503374936, NULL, NULL),
(5, 1, 5, NULL, NULL, 'T1', 0, 0, 0, 0, 0, 0, 2, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'ádsdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', '', 1, 1502865002, 1503375056, 1503374936, NULL, NULL),
(6, 1, 6, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 2, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'Tạ Quang Hiếu', '飾り文字', 'aaaaaaaaaaaaaaaa', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', '', 1, 1502866976, 1503375056, 1503374936, NULL, NULL),
(7, 1, 7, NULL, NULL, '3', 2, 2, 2, 2, 2, 2, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'asdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-18', '2', '', 1, 1502867026, 1503375056, 1503374936, NULL, NULL),
(8, 1, 8, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'sadasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-25', '4', 'ádasdasd', 1, 1503049654, 1503652238, 1503374936, NULL, NULL),
(9, 1, 9, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 6, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'ádasdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-18', '4', '', 1, 1503049734, 1503375056, 1503374936, NULL, NULL),
(10, 1, 10, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 7, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'ÁDASdađá', 'Ádasdasd', 'asdasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-25', '4', '', 1, 1503049956, 1503652808, 1503374936, NULL, NULL),
(11, 1, 11, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'asDasd', 'asdasd', 'asdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', '', 1, 1503311816, 1503375056, 1503374936, NULL, NULL),
(12, 1, 12, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'Tạ Quang Hiếu', '飾り文字', 'sadasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503368874, 1503375055, 1503374935, NULL, NULL),
(13, 1, 13, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'asDasd', 'asdas', 'asdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503370429, 1503375055, 1503374935, NULL, NULL),
(14, 1, 14, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'ASDASda', 'asdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503371165, 1503375055, 1503374935, NULL, NULL),
(15, 1, 15, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'ASDASda', 'asdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503371183, 1503375055, 1503374935, NULL, NULL),
(16, 1, 16, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'ASDASda', 'asdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503371275, 1503375055, 1503374935, NULL, NULL),
(17, 1, NULL, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'Ádasd', 'ádasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503371971, 1503375055, 1503374935, NULL, NULL),
(18, 1, NULL, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'Ádasd', 'ádasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '1', '', 1, 1503372214, 1503375055, 1503374935, NULL, NULL),
(19, 1, NULL, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'aádas', 'ádasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', '', 1, 1503372352, 1503375055, 1503374935, NULL, NULL),
(20, 1, NULL, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'aádas', 'ádasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', '', 1, 1503372362, 1503649965, 1503648525, NULL, NULL),
(46, 2, 1, NULL, NULL, '3', 3, 5, 6, 4, 5, 3, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'Tạ Quang Hiếu', 'Ádasdasd', 'ádasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', '', 1, 1503473295, 1503642832, 1503641332, NULL, NULL),
(47, 2, 2, 'B', 2, '3', 2, 2, 2, 2, 2, 2, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'ÁDASdasd', 'Ádasdasd', 'ádasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, '2017-08-23', '2', 'ádasdasdas', 1, 1503473675, 1503642832, 1503641332, NULL, NULL),
(48, 2, 3, 'C', 2, '2', 0, 0, 0, 0, 0, 0, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'ÁDASdas', 'aádasd', 'ádasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, '2017-08-23', '1', '', 1, 1503473782, 1503642832, 1503641332, NULL, NULL),
(49, 2, 4, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdas', 'Ádasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, NULL, '1', '', 1, 1503473814, 1503649961, 1503648521, NULL, NULL),
(50, 3, 1, NULL, NULL, '1', 2, 2, 2, 2, 2, 2, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'kakakakaka', 'blabla', 'ádasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-25', '4', '', 1, 1503650189, 1503651983, 1503652103, NULL, NULL),
(51, 3, 2, NULL, NULL, '3', 4, 8, 11, 8, 6, 5, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'sdasdasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', '', 1, 1503651526, 1503651983, 1503652103, NULL, NULL),
(52, 4, 1, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdasd', 'ádasdasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-28', '4', '', 0, 1503888697, 1506581594, NULL, '{\n    "id": "ch_7ba591bfeb459e3f0a10b6d1ba784",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506581593,\n    "card": {\n        "id": "car_cbaa9a08faf48f793832fcfa0e77",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506581592,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506581593,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_7ba591bfeb459e3f0a10b6d1ba784'),
(53, 4, 2, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdasd', 'ádasdasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '', '', 0, 1503888794, 1503888794, NULL, NULL, NULL),
(54, 4, 3, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdasd', 'ádasdasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '', '', 0, 1503888819, 1503888819, NULL, NULL, NULL),
(55, 4, 4, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdasd', 'ádasdasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '', '', 0, 1503888836, 1503888837, NULL, NULL, NULL),
(56, 4, 5, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdasd', 'ádasdasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '', '', 0, 1503888856, 1503888856, NULL, NULL, NULL),
(57, 4, 6, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'sdasdasd', 'ádasdasd', 'ádasdas', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-28', '', '', 0, 1503888897, 1503889156, NULL, NULL, NULL),
(58, 4, 7, 'A', 3, '3', 3, 7, 5, 3, 1, 2, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'ÁDASD', 'asdasdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, '', '1', '', 0, 1503889218, 1503904069, NULL, NULL, NULL),
(59, 4, 8, 'A', 2, '2', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'Ádasdasd', 'kjhk', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, '', '1', '', 0, 1503889857, 1503903918, NULL, NULL, NULL),
(60, 4, NULL, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'sdasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '4', '', 0, 1504001172, 1504001172, NULL, NULL, NULL),
(61, 4, 9, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'sdasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-29', '4', '', 0, 1504001356, 1504001356, NULL, NULL, NULL),
(62, 4, 10, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'adadad', 'adadad', 'adadad', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-29', '4', '', 0, 1504001543, 1504001543, NULL, NULL, NULL),
(63, 5, 1, NULL, NULL, '3', 4, 4, 7, 5, 4, 5, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', 'Ádasdasd', 'adadadaaddaadadad', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-30', '2', '', 0, 1504061202, 1504061598, NULL, NULL, NULL),
(64, 6, 1, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'ÁDASdađá', 'asdas', 'adadad', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-30', '4', '', 0, 1504062146, 1504062343, NULL, NULL, NULL),
(65, 7, 1, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 6, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'adadada', 'adadad', 'adadada', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-08-30', '4', '', 1, 1504063253, 1507048326, 1507003806, NULL, NULL),
(66, 7, NULL, NULL, NULL, '3', 2, 2, 6, 7, 4, 3, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'ZCZCZCZ', 'ZCZCZCZ', 'CZCZCZCZ', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-20', '4', '', 0, 1505886407, 1505886407, NULL, NULL, NULL),
(67, 7, NULL, NULL, NULL, '3', 1, 2, 6, 7, 2, 2, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'Tạ Quang Hiếu', 'zczczc', 'zczczczc', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-20', '', 'adadad', 0, 1505886704, 1505889293, NULL, NULL, NULL),
(68, 7, 2, NULL, NULL, '3', 2, 2, 1, 2, 1, 3, 2, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'xxxxxxxxxxxxxx', 'xxxxxxxxxxxxx', 'xxxxxxxxxxxxxxxxxxx', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-28', '4', 'adadadada', 0, 1505889447, 1506588311, NULL, '{\n    "id": "ch_182f5cc15905772c4c9e6c3ad7bb9",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1506588310,\n    "card": {\n        "id": "car_7199ead92f204cc069eb71aa9cae",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1506588309,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1506588310,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_182f5cc15905772c4c9e6c3ad7bb9'),
(69, 7, 3, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 2, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'adadA', 'ADADA', 'ADAD', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-20', '4', 'DADADA', 0, 1505893447, 1505893447, NULL, NULL, NULL),
(70, 7, 4, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字123', '飾り文字12312', 'adada12312', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', 'adadada12312', 0, 1505965336, 1505965685, NULL, NULL, NULL),
(71, 7, 5, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 6, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'addadadad', 'adadad', 'adadad', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', 'ZCZZCZ', 0, 1505965963, 1505966029, NULL, NULL, NULL),
(72, 7, 6, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 6, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'adada', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-21', '4', 'adaad', 0, 1505975950, 1505976011, NULL, NULL, NULL),
(73, 7, 7, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'dâd', 'adsdasdas', 'đâsdasdasda', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '2', 'hieutq', 0, 1505985921, 1505985921, NULL, NULL, NULL),
(74, 7, 8, NULL, NULL, '2', 0, 0, 0, 0, 0, 0, 6, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'addada', 'adada', 'adadada', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-09-21', '4', 'ádasdasdas', 0, 1505987189, 1505987803, NULL, NULL, NULL),
(75, 7, 9, '1', NULL, '1', 2, 2, 1, 2, 2, 2, 4, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'asdasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-10-02', '1', 'asdasdas', 0, 1506585631, 1507048852, NULL, NULL, NULL),
(76, 9, 1, NULL, NULL, '3', 1, 1, 11, 2, 1, 1, 5, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'history', 'history', 'history', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', 'asdasd', 0, 1506998490, 1507084538, NULL, NULL, NULL),
(77, 9, 2, NULL, NULL, '3', 4, 9, 11, 8, 6, 6, 7, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'climber', 'climber', 'climber', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', 'new climber', 0, 1507084616, 1507084616, NULL, NULL, NULL),
(78, 10, 1, '1', 3, '3', 4, 9, 11, 8, 6, 6, 7, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', 'test dataa', 'test dataa', 'test dataa', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 2, '2017-10-07', '4', 'test dataa', 1, 1507084754, 1507391960, 1507259437, '{\n    "id": "ch_88c763df5314ea7139ed9252d84c7",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507391960,\n    "card": {\n        "id": "car_ea23803833f139b21aca217fed39",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507391958,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507391960,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_88c763df5314ea7139ed9252d84c7'),
(79, 11, 1, NULL, NULL, 'T1', 0, 0, 0, 0, 0, 0, 6, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'asdasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', 'adadad', 1, 1507449064, 1507450861, 1507450201, NULL, NULL),
(80, 12, 1, NULL, NULL, 'T1', 0, 0, 0, 0, 0, 0, 3, '230895', 'Tạ Quang Hiếu', 'カケヤ　トモヒデ', '飾り文字', '飾り文字', 'asdasdasd', 'hieutq@scuti.asia', '03-3538-0232 ', '03-3538-0226 ', '231', '4567', 'Vĩnh Phúc', 2, NULL, 1, NULL, '5', 'ádas', 1, 1507515889, 1507516123, 1507515043, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_speaker_member_mast`
--

CREATE TABLE `jl2_speaker_member_mast` (
  `id` int(11) NOT NULL,
  `speech_id` int(10) DEFAULT NULL,
  `member_uid` int(3) DEFAULT NULL,
  `member_userid` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_speech` int(2) DEFAULT NULL,
  `member_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_name_eng` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_info01` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_category01` int(3) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_speaker_member_mast`
--

INSERT INTO `jl2_speaker_member_mast` (`id`, `speech_id`, `member_uid`, `member_userid`, `member_speech`, `member_name`, `member_name_eng`, `member_info01`, `member_category01`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '', NULL, 'dasdasda', 'asdasd', '', 1, 0, 1502787125, 1502787125),
(2, 2, 1, '', NULL, 'asdas', 'sdasd', '', 1, 0, 1502787342, 1502787472),
(3, 2, 2, '66556656565', NULL, 'dsadsda', 'sdasdas', 'asdas', 1, 0, 1502787342, 1502787342),
(4, 3, 3, '010101', NULL, 'asdasdas', 'sdasd', 'asdasd', 3, 0, 1502788647, 1502788647),
(5, 3, 4, '0202020202', NULL, 'dasdasd', 'asdas', 'asdas', 1, 0, 1502788647, 1502788647),
(6, 4, 1, '', NULL, 'asdas', 'asdas', '', 1, 0, 1502794036, 1502794036),
(7, 5, 1, '1111111111111111111', NULL, 'ádasd', 'đâsda', '', 1, 0, 1502865002, 1502866932),
(8, 5, 2, '22222222222222222', NULL, 'ádasdas', 'asdasd', '', 1, 0, 1502865002, 1502866932),
(9, 5, 5, '3333333333333', NULL, 'sdasdas', 'asdasda', '', 1, 0, 1502866932, 1502866932),
(10, 6, 1, '', NULL, 'asdasd', 'asdasd', '', 1, 0, 1502866976, 1502866976),
(11, 6, 2, '', NULL, 'asdasdas', 'asdasd', '', 1, 0, 1502866976, 1502866976),
(12, 7, 1, '123456', NULL, 'asdasd', 'asdasd', '', 3, 0, 1502867026, 1502867026),
(13, 8, 1, '12312312', NULL, 'ádasdas', 'ádasd', '', 1, 0, 1503049654, 1503049654),
(14, 9, 1, '', NULL, 'ádasda', 'ádasd', '', 4, 0, 1503049734, 1503049734),
(15, 10, 1, '1231231', NULL, 'asdasd', 'asdasdas', '', 1, 0, 1503049956, 1503049956),
(16, 10, 2, '1231231', NULL, 'asdasdasd', 'asdasdas', 'asdasdasd', 4, 0, 1503049956, 1503049956),
(17, 12, 1, '', NULL, 'asdasda', 'asdasdasd', '', 1, 0, 1503368874, 1503368874),
(18, 12, 2, '', NULL, '', 'asdasa', '', 1, 0, 1503368874, 1503368874),
(19, 13, 1, '', NULL, 'saasdas', 'asdasdas', '', 1, 0, 1503370429, 1503370429),
(20, 29, 1, '', NULL, 'ádasd', '半角(スペー', '', 1, 0, 1503372656, 1503372656),
(21, 31, 1, '', NULL, 'ádasd', 'Hiếu', '', 1, 0, 1503372692, 1503372692),
(22, 38, 1, '1111111', NULL, 'sdfsfsdfsdf', 'aaaaaaaaaa', '', 1, 0, 1503375203, 1503375321),
(23, 38, 2, '212323', NULL, 'ádasdas', 'aaaaaaaaaaaaaaa', '', 1, 0, 1503375203, 1503375321),
(24, 38, 5, '434343', NULL, 'đâsdasas', 'saaaaaaaaaa', '', 1, 0, 1503375321, 1503375321),
(25, 39, 5, '1230909', NULL, 'sadasda', 'aaaaaaaaaaaa', '', 2, 0, 1503375585, 1503375585),
(26, 40, 1, '', NULL, 'ádasdasd', '', '', 1, 0, 1503388627, 1503388627),
(27, 40, 2, '', NULL, 'ádasdas', 'aaaaaaaa', '', 1, 0, 1503388628, 1503388628),
(28, 41, 1, '', NULL, 'ádasdas', 'aaaaaaaaaaaaa', '', 1, 0, 1503388825, 1503388825),
(29, 42, 1, '', NULL, 'ádasd', '', '', 1, 0, 1503388867, 1503388867),
(30, 42, 2, '', NULL, 'ádasda', 'sdasdad', '', 1, 0, 1503388867, 1503388867),
(31, 45, 1, '123333', NULL, 'aaaaaaaaaaaaaaaaa', 'ddddddaaaa', 'czxczxcz', 3, 0, 1503471314, 1503471314),
(32, 46, 1, '1231231231', NULL, 'ádasdasda', 'hhhhhhhhhhhhhhhh', 'haaa', 3, 0, 1503473295, 1503473295),
(33, 49, 1, '', NULL, 'ádasdas', 'aaaaaaaaaaaaaaa', '', 1, 0, 1503473814, 1503473930),
(34, 50, 1, '230895', NULL, 'Ta Quang Hieu', 'Alex', '', 1, 0, 1503650189, 1503650708),
(35, 50, 2, '898989', NULL, 'adsasdasd', 'aaaaa', '', 1, 0, 1503650189, 1503650708),
(36, 51, 1, '808080', NULL, 'Ta Quang Hieu', 'Alex', '', 1, 0, 1503651526, 1503651526),
(37, 52, 1, '123123', NULL, 'ádasds', 'scuti', '', 1, 0, 1503888697, 1503888697),
(38, 53, 1, '123123', NULL, 'ádasds', 'scuti', '', 1, 0, 1503888794, 1503888794),
(39, 54, 1, '123123', NULL, 'ádasds', 'scuti', '', 1, 0, 1503888819, 1503888819),
(40, 55, 1, '123123', NULL, 'ádasds', 'scuti', '', 1, 0, 1503888837, 1503888837),
(41, 56, 1, '123123', NULL, 'ádasds', 'scuti', '', 1, 0, 1503888856, 1503888856),
(42, 57, 1, '123123', NULL, 'ádasds', 'scuti', '', 1, 0, 1503888897, 1503888983),
(43, 58, 6, '', NULL, 'sdasdasd', 'khakhahkahkkha', '', 1, 0, 1503890223, 1503904069),
(44, 59, 5, '', NULL, 'Ta Quang Hieu', 'alex', '', 1, 0, 1503903918, 1503903918),
(45, 61, 1, '123123', NULL, 'adadada', 'adadada', '', 2, 0, 1504001356, 1504001356),
(46, 62, 1, '444444', NULL, 'adadad', 'adadad', 'adadd', 3, 0, 1504001544, 1504001544),
(47, 63, 1, '1324322', NULL, 'adaddaad', 'dasda', 'adada', 4, 0, 1504061203, 1504061203),
(48, 63, 2, '43534', NULL, 'adadada', 'adadadad', '', 1, 0, 1504061203, 1504061203),
(49, 64, 1, '5646542', NULL, 'adadadadada', 'adadadadad', 'adadadad', 2, 0, 1504062146, 1504062146),
(51, 67, 1, '000056', NULL, 'adadadada', 'adadada', 'adadad', 98, 0, 1505886704, 1505889293),
(52, 67, 2, '000067', NULL, 'adadadad', 'adadada', 'adadadada', 99, 0, 1505886704, 1505889293),
(53, 68, 1, '123123', NULL, 'aadadad', 'adadadad', 'adadadad', 2, 0, 1505889447, 1505889447),
(54, 69, 1, '213123', NULL, 'adadada', 'adadad', 'adada', 1, 0, 1505893447, 1505893447),
(55, 70, 1, '454545', NULL, 'adadada', 'adadada', 'adadad', 2, 0, 1505965336, 1505965685),
(56, 70, 5, '434343', NULL, 'zczzcczzc', 'czzcczzczccz', 'czczcczcz', 4, 0, 1505965685, 1505965685),
(57, 71, 1, '212312', NULL, 'adada', 'adadadad', 'dadada', 1, 0, 1505965963, 1505966030),
(58, 71, 2, '424312', NULL, 'adadad', 'asdas', 'sdas', 3, 0, 1505965963, 1505966030),
(59, 71, 3, '314365', NULL, 'adadaadsa', 'dasdasd', 'asdasdasd', 98, 0, 1505965963, 1505966030),
(60, 71, 4, '432312', NULL, 'adadad', 'adadad', 'dsads', 3, 0, 1505965963, 1505966030),
(61, 71, 5, '767676', NULL, 'SsSsS', 'SsSsSs', 'sSsSsS', 99, 0, 1505965963, 1505966030),
(62, 71, 6, '547699', NULL, 'czczczc', 'zczcz', 'czczcz', 4, 0, 1505965964, 1505966030),
(63, 71, 7, '426588', NULL, 'zczczc', 'zczczcz', 'czzczc', 99, 0, 1505965964, 1505966030),
(64, 71, 8, '998765', NULL, 'zczczc', 'zczczcz', 'zczczczczcz', 99, 0, 1505965964, 1505966030),
(65, 72, 1, '243243', NULL, 'addda', 'adadada', 'adadad', 4, 0, 1505975951, 1505976011),
(66, 73, 1, '234312', NULL, 'addadad', 'adadadad', 'adadada', 3, 0, 1505985921, 1505985921),
(67, 73, 2, '876543', NULL, 'adadad', 'adadadada', 'adasd', 4, 0, 1505985921, 1505985921),
(68, 74, 1, '231134', NULL, 'ddâda', 'adadads', 'dsadas', 4, 0, 1505987189, 1505987803),
(69, 75, 1, '423422', NULL, 'adadada', 'adadada', 'dadadada', 3, 0, 1506585631, 1507048852),
(70, 76, 1, '787679', NULL, 'asdasd', 'asdasda', 'asdasd', 99, 0, 1506998490, 1507084538),
(71, 77, 1, '123456', NULL, 'asdasd', 'adadada', 'dadadada', 1, 0, 1507084617, 1507084617),
(72, 78, 1, '564332', NULL, 'adadad', 'adada', 'adadad', 2, 0, 1507084754, 1507084754),
(73, 78, 2, '123556', NULL, 'adada', 'adada', 'dadad', 3, 0, 1507084754, 1507084754),
(74, 79, 1, '213143', NULL, 'adadad', 'adadad', 'adada', 1, 0, 1507449064, 1507449064),
(75, 80, 1, '123545', NULL, 'acb', 'T.Hieu', 'adad', 2, 0, 1507515889, 1507515889);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_symposium_data`
--

CREATE TABLE `jl2_symposium_data` (
  `id` int(11) NOT NULL,
  `symp_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_subtitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_organiser` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_speech` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_sponsor` text COLLATE utf8_unicode_ci,
  `symp_date3_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_place` text COLLATE utf8_unicode_ci,
  `symp_price_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_capacity` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_support` text COLLATE utf8_unicode_ci,
  `symp_body` text COLLATE utf8_unicode_ci,
  `symp_date1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_date2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_date3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_pric1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_pric2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_pric3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_pric4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `symp_memo01` text COLLATE utf8_unicode_ci,
  `symp_memo02` text COLLATE utf8_unicode_ci,
  `symp_rank` int(11) DEFAULT NULL,
  `view_status` int(11) DEFAULT NULL,
  `pay_way_view_status` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_symposium_data`
--

INSERT INTO `jl2_symposium_data` (`id`, `symp_name`, `symp_subtitle`, `symp_organiser`, `symp_speech`, `symp_sponsor`, `symp_date3_text`, `symp_place`, `symp_price_text`, `symp_capacity`, `symp_support`, `symp_body`, `symp_date1`, `symp_date2`, `symp_date3`, `symp_pric1`, `symp_pric2`, `symp_pric3`, `symp_pric4`, `symp_memo01`, `symp_memo02`, `symp_rank`, `view_status`, `pay_way_view_status`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tạ Quang Hiếu', 'dkajshkdahkjh', 'khdjkaskdh', 'kdhkajshdkajshkjd', 'kdhaksjdhkashk', 'hdkashdkajhk', 'hdkajshdkajh', 'kdhkajshdkah', 'khdkashdkashd', '3 2\n4 3\n5 6\n2 3', NULL, '2017-08-10', '2017-09-07', '2017-08-10', '1-1234,2-2000,3-3000,4-4000,5-5000,6-5000,7-5000,99-6000', NULL, NULL, NULL, 'kdysduasgdj', 'd', NULL, 1, 1, 0, 2147483647, 1503633958, NULL),
(3, 'A Lợi', 'aksdkj', 'ldjlasjdlasjl', 'djlaksjdlak', 'ldkjalskjdalk', 'dlaksjdklajl', 'jdlaksjdlkj', 'ldjalsdjalkj', 'dlasjdalsjd', '1 asda', NULL, '2017-06-28', '2017-06-29', '2017-06-30', '0-123,1-3456,2-3546,3-12322,4-8999,5-9000,6-1000,7-1233', NULL, NULL, NULL, 'ládasda', 'sdasdasdasda', NULL, 1, 1, 0, 2147483647, 0, NULL),
(5, 'alksdlkajlk', 'jldjalsjdl', 'kjdlakjsldkjl', 'jdlaksjdlj', 'ldkjlaskjdl', 'jdlakjsldkajl', 'ldajlskdjl', 'jdlaksjdalksjdl', 'dalksdjlajs', '1 a\n2 d\n3 f\n4 c', NULL, '2107-02-02', '2107-02-02', '2107-02-02', '0-123,1-2312,2-123,3-412,4-213,5-1233,6-4321,7-423', NULL, NULL, NULL, 'ádasd', 'ádasdasda', NULL, 1, 1, 0, 0, 0, NULL),
(6, 'Tạ Quang Hiếu', '', '', '', '', '', '', '', '', 'ádas 123\nđâssdas ', NULL, '2017-08-18', '2017-08-26', '2017-08-30', '1-12312312,2-12312312,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503049037, 1503049142, NULL),
(7, 'zxZxZxZ', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-26', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503298968, 1503298968, NULL),
(8, 'ádasdas', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-19', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503299265, 1503299265, NULL),
(9, 'sdasasdasda', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-31', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503299372, 1503299372, NULL),
(10, 'ádasdasda', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-23', '2017-08-25', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503299575, 1503299575, NULL),
(11, 'sdasdasd', '', '', '', '', '', '', '', '', '', NULL, '2017-08-22', '2017-08-23', '2017-08-31', '1-312312,2-12312,3-12312,4-123123,5-123123,6-123123,7-123123,99-123123', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503299729, 1503300277, NULL),
(12, 'sdasdas', '', '', '', '', '', '', '', '', '123 asdas\n123 asdas', NULL, '2017-08-21', '2017-08-16', '2017-08-11', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503300341, 1503300341, NULL),
(13, 'czxczxczx', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-19', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 1, 1503300806, 1503300819, 1503299319),
(14, 'asdasdas', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-10', '2017-08-18', '1-,2-,3-,4-,5-,6-,7-,99-', NULL, NULL, NULL, '', '', NULL, 0, 1, 1, 1503300842, 1503300850, 1503299290),
(15, 'asdasdasd', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-31', '1-122,2-123123,3-3,4-123123,5-5,6-12312,7-12312,99-9912312', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503304347, 1503307744, NULL),
(16, 'Symposium', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-26', '1-6000,2-5000,3-4000,4-3000,5-2000,6-10000,7-5000,99-1000', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503307817, 1503308532, NULL),
(17, 'ádasdasd', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-26', '1-1000,2-2000,3-3000,4-4000,5-5000,6-6000,7-7000,99-9000', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503308973, 1503308973, NULL),
(18, 'xczxczxcz', '', '', '', '', '', '', '', '', '', NULL, '2017-08-21', '2017-08-24', '2017-08-26', '1-13333,2-13333,3-12312,4-23456,5-132312,6-12312,7-12312,99-123', NULL, NULL, NULL, '', '', NULL, 0, 1, 0, 1503312539, 1503312558, NULL),
(19, 'Final Testing history', 'đâsdasda', 'sdasdas', '', '', '', '', '', '', '', NULL, '2017-08-29', '2017-08-31', '2017-08-31', '1-1000,2-2000,3-3000,4-4000,5-4000,6-5000,7-5000,99-6000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1503634653, 1504001783, NULL),
(20, 'Test Symposium payment bank transfer', '', '', '', '', '', '', '', '', '', NULL, '2017-08-30', '2017-08-31', '2017-08-31', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 1, 1504063338, 1504155216, 1504152516),
(21, 'Test Symposium payment bank transfer', '', '', '', '', '', '', '', '', '', NULL, '2017-08-30', '2017-08-31', '2017-08-31', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 1, 1504063338, 1504155212, 1504152512),
(22, 'Test Symposium payment card', '', '', '', '', '', '', '', '', '', NULL, '2017-09-21', '2017-09-30', '2017-09-30', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1504063372, 1505970353, NULL),
(23, 'Test Symposium payment late', '', '', '', '', '', '', '', '', '', NULL, '2017-09-28', '2017-09-30', '2017-09-30', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1504064071, 1506589377, NULL),
(24, 'test test test', '', '', '', '', '', '', '', '', '', NULL, '2017-09-28', '2017-09-30', '2017-09-30', '1-1000,2-2000,3-2000,4-2000,5-2000,6-2000,7-2000,99-2000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1504155918, 1506585014, NULL),
(25, 'check payment again again', '', '', '', '', '', '', '', '', '', NULL, '2017-09-29', '2017-10-21', '2017-10-21', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 1, 1506667003, 1507260861, 1507259421),
(26, 'test history', '', '', '', '', '', '', '', '', '', NULL, '2017-10-03', '2017-10-13', '2017-10-27', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 1, 1507001204, 1507001399, 1507000259),
(27, 'test symposium participant', 'test symposium participant', 'test symposium participant', 'test symposium participanttest symposium participant', 'test symposium participant', '', '', '', '', '', NULL, '2017-10-08', '2017-10-13', '2017-10-13', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1507451401, 1507451401, NULL),
(28, 'Check condition on not-paid page', '', '', '', '', '', 'q', '', '', '', NULL, '2017-10-09', '2017-10-24', '2017-10-21', '1-1000,2-2000,3-3000,4-4000,5-5000,6-6600,7-7000,99-8000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1507517619, 1507519472, NULL),
(29, 'check price for symposium', 'check price for symposium', 'check price for symposium', 'check price for symposium', 'check price for symposium', '', '', '', '', '', NULL, '2017-10-09', '2017-10-13', '2017-10-21', '1-1000,2-1000,3-1000,4-1000,5-1000,6-1000,7-1000,99-1000', NULL, NULL, NULL, '', '', NULL, 1, 1, 0, 1507533567, 1507533567, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_symposium_participants`
--

CREATE TABLE `jl2_symposium_participants` (
  `id` int(11) NOT NULL,
  `symp_id` int(11) DEFAULT NULL,
  `participant_user_id` int(11) DEFAULT NULL,
  `pay_status` int(11) DEFAULT '1',
  `pay_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_date_plan` text COLLATE utf8_unicode_ci,
  `pay_way` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pay_way_text` text COLLATE utf8_unicode_ci,
  `pay_money` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `participant_memo1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `member_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_kana` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_info01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_info02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_category01` int(11) DEFAULT NULL,
  `member_mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_zip1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_zip2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `member_fax` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_info01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_info02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_zip1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_zip2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `intro_tel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `pay_bill` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '請求書希望',
  `credit_response_json` text COLLATE utf8_unicode_ci COMMENT 'credit response',
  `credit_response_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'credit response'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_symposium_participants`
--

INSERT INTO `jl2_symposium_participants` (`id`, `symp_id`, `participant_user_id`, `pay_status`, `pay_date`, `pay_date_plan`, `pay_way`, `pay_way_text`, `pay_money`, `participant_memo1`, `status`, `created_at`, `updated_at`, `member_name`, `member_username`, `member_kana`, `member_info01`, `member_info02`, `member_category01`, `member_mail`, `member_zip1`, `member_zip2`, `member_address`, `member_tel`, `member_fax`, `intro_name`, `intro_info01`, `intro_info02`, `intro_zip1`, `intro_zip2`, `intro_address`, `intro_tel`, `deleted_at`, `pay_bill`, `credit_response_json`, `credit_response_id`) VALUES
(141, 3, 4, 1, NULL, '2017-07-31', '4', NULL, '4444', 'ádasdasdas', 0, 0, 0, 'Tạ Quang Hiếu', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'quanghieuit.hubt@gmail.com', '231', '4567', '4567', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, 3, 6, 1, NULL, '2017-07-31', '4', NULL, '4444', 'ádasdasdas', 0, 0, 0, 'Tạ Quang Hiếu', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'quanghieuit.hubt@gmail.com', '231', '4567', '4567', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, 3, 8, 1, NULL, '2017-07-31', '3', NULL, '4444', 'ádasdasdas', 0, 0, 0, 'Tạ Quang Hiếu', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'quanghieuit.hubt@gmail.com', '231', '4567', '4567', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 3, 10, 1, NULL, '2017-07-31', '3', NULL, '4444', 'ádasdasdas', 0, 0, 0, 'Tạ Quang Hiếu', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'quanghieuit.hubt@gmail.com', '231', '4567', '4567', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 3, 12, 1, NULL, '2017-07-31', '3', NULL, '4444', 'ádasdasdas', 0, 0, 0, 'Tạ Quang Hiếu', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'quanghieuit.hubt@gmail.com', '231', '4567', '4567', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 3, 14, 1, NULL, '2017-07-31', '4', NULL, '4444', 'ádasdasdas', 0, 0, 0, 'Tạ Quang Hiếu', NULL, 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'quanghieuit.hubt@gmail.com', '231', '4567', '4567', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 1, 1, 1, '2017-08-17', '2017-08-16', '3', '', '23456', 'asdasdasda', 0, 1502872714, 1502966394, 'asdasda', '', '', '', '', 0, 'hieutq@scuti.asia', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(159, 1, 2, 1, NULL, '2017-08-16', '4', NULL, '23456', 'sdasdasd', 0, 1502872866, 1502872866, 'asdasdas', NULL, '', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 1, 3, 1, '', '2017-08-16', '1', '', NULL, 'asdasdasd', 0, 1502873227, 1502874644, 'Tạ Quang Hiếu', '', '', '', '', 1, 'quanghieuit.zentgroup@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(161, 1, 4, 1, NULL, '2017-08-16', '3', NULL, '23456', 'asdasdas', 0, 1502873621, 1502873621, 'asdasdas', NULL, '', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 3, 1, 1, '', '2017-08-16', '1', '', NULL, 'asdasdasd', 0, 1502878124, 1502878124, 'Tạ Quang Hiếu', '', '', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(163, 3, 2, 1, '', '2017-08-16', '1', '', NULL, 'asdasdasd', 0, 1502878245, 1502878245, 'Tạ Quang Hiếu', '', '', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(164, 1, 5, 1, NULL, '2017-08-16', '2', NULL, '123', 'asdasdas', 0, 1502880940, 1502880940, 'Tạ Quang Hiếu', NULL, '', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 1, 6, 1, NULL, '2017-08-16', '3', NULL, '123', 'sdasdasd', 0, 1502883685, 1502883685, 'sdasdas', NULL, 'dasdasdas', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 1, 8, 1, '', '2017-09-18', '1', '', NULL, 'dsasdasdas', 0, 1502951243, 1502951243, 'Hiếu', '888888', '', 'phần mềm', 'IT', 1, 'quanghieuit@gmail.com', '123', '2334', 'Hà Nội', '0968706683', '03-3538-0226 ', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(168, 1, 9, 1, '2017-08-17', '2017-08-19', '1', '', NULL, 'ádasdasd', 0, 1502966593, 1502966593, 'aaaaa', '123423', '', '', '', 0, 'quanghieuit.zentgroup@gmail.com', '123', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(173, 19, 1, 2, '', '2017-08-25', '2', '', NULL, 'sdasdas', 1, 1503634681, 1503634804, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', '121', '', '', '', '', '', '', 1503634084, NULL, NULL, NULL),
(174, 1, 10, 2, '2017-08-25', '2017-08-25', '4', NULL, '2000', '', 0, 1503651609, 1503653213, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 1, 11, 1, NULL, '2017-08-28', '4', NULL, '2000', '', 0, 1503893664, 1503893664, 'Tạ Quang Hiếu', NULL, '', '', '', 2, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 1, 12, 2, '2017-08-28', '2017-08-28', '4', NULL, '', '', 0, 1503893731, 1503893732, 'Tạ Quang Hiếu', NULL, '', '', '', 2, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 19, 2, 2, '2017-08-28', '2017-08-28', '1', '', NULL, '', 1, 1503894247, 1504001820, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', '', '', '', '', '', '', '', 1504001280, NULL, NULL, NULL),
(178, 1, 13, 2, '2017-08-28', '2017-08-28', '4', NULL, '3000', '', 0, 1503903471, 1503903472, 'Tạ Quang Hieu', NULL, 'カケヤ　トモヒデ', 'Harvard', 'Harvard', 3, 'hieutq@scuti.asia', '123', '4324', '', '123123123', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 19, 3, 2, '2017-08-29', '2017-08-29', '1', '', '2000', '', 0, 1504002344, 1507092736, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', 'adasdasdas', '', '', '', '', '', '', NULL, '1', NULL, NULL),
(181, 20, 1, 1, NULL, '2017-08-30', '2', NULL, '1000', '', 1, 1504064138, 1504155216, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1504152516, NULL, NULL, NULL),
(182, 21, 1, 2, '2017-08-30', '2017-08-30', '2', NULL, '1000', '', 1, 1504064565, 1504155212, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1504152512, NULL, NULL, NULL),
(185, 23, 1, 2, '2017-09-28', '2017-08-30', '4', NULL, '1000', '', 0, 1504066644, 1506589591, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 24, 1, 1, '2017-09-28', '2017-08-31', '5', NULL, '2000', '', 0, 1504155976, 1506585075, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', 'Vĩnh Phúc', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 22, 2, 2, '2017-09-21', '2017-09-21', '4', NULL, '1000', 'adadadada', 0, 1505971042, 1505971042, 'Tạ Quang Hieu', NULL, '', '', '', 4, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 22, 3, 1, '', '2017-09-21', '5', '', NULL, '', 0, 1505975258, 1505975258, 'Tạ Quang Hiếu', '000000', '', '', '', 1, 'hieutq@scuti.asia', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(189, 22, 4, 2, '2017-09-28', '2017-09-28', '4', NULL, '1000', 'ádasdasdasdas', 0, 1506594777, 1506594777, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', '', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL),
(190, 25, 1, 1, NULL, '2017-09-29', '3', NULL, '0', '', 1, 1506667367, 1507260861, 'Tạ Quang Hieu', NULL, '', '', '', 4, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '', NULL, NULL),
(191, 25, 2, 1, NULL, '2017-09-29', '3', NULL, '1000', '', 1, 1506669518, 1507260861, 'Tạ Quang Hieu', NULL, '', '', '', 3, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '', NULL, NULL),
(192, 25, 3, 1, NULL, '2017-09-29', '2', NULL, '1000', '', 1, 1506669616, 1507260861, 'Tạ Quang Hieu', NULL, '', '', '', 4, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '', NULL, NULL),
(193, 25, 4, 2, '2017-10-07', '2017-09-29', '4', NULL, '1000', '', 1, 1506669741, 1507392005, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', '', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '', '{\n    "id": "ch_201cc823c142a0a28cc2ca48574bd",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507392005,\n    "card": {\n        "id": "car_88b1481b413e413de1025987060d",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507392004,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4323,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507392005,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_201cc823c142a0a28cc2ca48574bd'),
(194, 25, 5, 2, '2017-09-29', '2017-09-29', '4', NULL, '0', '', 1, 1506669841, 1507260861, 'Tạ Quang Hieu', NULL, '', '', '', 3, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '', NULL, NULL),
(195, 26, 1, 2, '2017-10-03', '2017-10-03', '5', NULL, '1000', 'sdasds', 1, 1507001271, 1507001399, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', '', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507000259, '1', NULL, NULL),
(196, 25, 6, 1, NULL, '2017-10-05', '2', NULL, '1000', '', 1, 1507092813, 1507260861, 'Tạ Quang Hieu', NULL, '', '', '', 2, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '', NULL, NULL),
(197, 25, 7, 1, NULL, '2017-10-05', '3', NULL, '1000', 'asdasdasdasas', 1, 1507092895, 1507260861, 'ご希望のパスワード Hiếu', NULL, '', '', '', 4, 'hieutq@scuti.asia', '', '', '', '12312312', 'ádasdasdasdasd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '2', NULL, NULL),
(198, 25, 8, 2, '2017-10-05', '2017-10-05', '4', NULL, '1000', 'aaaaa', 1, 1507196461, 1507260861, 'Tạ Quang Hieu', NULL, '', '', '', 3, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '2', '{\n    "id": "ch_228e1f95df916a1845c7eb4f33482",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507196461,\n    "card": {\n        "id": "car_edafe29d4839e9f14a4dc4b0744b",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507196459,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507196461,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_228e1f95df916a1845c7eb4f33482'),
(199, 25, 9, 2, '2017-10-06', '2017-10-06', '4', NULL, '1000', 'sadasdas', 1, 1507260526, 1507260861, 'Tạ Quang Hiếu', NULL, '', '', '', 3, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507259421, '1', '{\n    "id": "ch_798cf2139d479221e6c6a8fb36693",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507260527,\n    "card": {\n        "id": "car_7b19b92a55cce668fbf0fd9fe910",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507260526,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4324,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507260527,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_798cf2139d479221e6c6a8fb36693'),
(200, 27, 1, 1, NULL, '2017-10-08', '5', NULL, '1000', 'adadad', 0, 1507451428, 1507451428, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', '', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL),
(201, 28, 1, 2, '2017-10-09', '2017-10-09', '4', NULL, '2000', 'adada', 1, 1507517648, 1507519505, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', '', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1507515030, '2', '{\n    "id": "ch_fa190054def5663bf6174873dafbc",\n    "amount": 2000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507519506,\n    "card": {\n        "id": "car_5767b524678169a382179353efa8",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507519505,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4233,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507519506,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_fa190054def5663bf6174873dafbc'),
(202, 28, 2, 2, '2017-10-09', '2017-10-09', '4', NULL, '0', 'dâdda', 0, 1507533358, 1507533358, 'Tạ Quang Hieu', NULL, '', '', '', 3, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '{\n    "id": "ch_4f4156f570808929cf1ff1b98231e",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507533360,\n    "card": {\n        "id": "car_0b095fac820a547a1b51e85a686c",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507533358,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4234,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507533360,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_4f4156f570808929cf1ff1b98231e'),
(203, 28, 3, 2, '2017-10-09', '2017-10-09', '4', NULL, '3000', 'adadada', 0, 1507533484, 1507533484, 'Tạ Quang Hieu', NULL, '', '', '', 3, 'hieutq@scuti.asia', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', '{\n    "id": "ch_36102d38fd35caf2f4a7afd59556f",\n    "amount": 3000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507533485,\n    "card": {\n        "id": "car_7f3e253e1a4b8f4f02044ce8baea",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507533484,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 4233,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507533485,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_36102d38fd35caf2f4a7afd59556f'),
(204, 29, 1, 2, '2017-10-09', '2017-10-09', '4', NULL, '1000', 'ádasda', 0, 1507533646, 1507533646, 'Tạ Quang Hiếu', '230895', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 'カケヤ　トモヒデ', 2, 'hieutq@scuti.asia', '231', '4567', '', '03-3538-0232 ', '03-3538-0226 ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '{\n    "id": "ch_ffc50ebf3e9846821418143eb77ae",\n    "amount": 1000,\n    "amount_refunded": 0,\n    "captured": true,\n    "captured_at": 1507533648,\n    "card": {\n        "id": "car_0250ec19401bf8e1347f3afd87b4",\n        "address_city": null,\n        "address_line1": null,\n        "address_line2": null,\n        "address_state": null,\n        "address_zip": null,\n        "address_zip_check": "unchecked",\n        "brand": "Visa",\n        "country": null,\n        "created": 1507533647,\n        "customer": null,\n        "cvc_check": "unchecked",\n        "exp_month": 12,\n        "exp_year": 3242,\n        "fingerprint": "e1d8225886e3a7211127df751c86787f",\n        "last4": "4242",\n        "livemode": false,\n        "metadata": [],\n        "name": "scuti",\n        "object": "card"\n    },\n    "created": 1507533648,\n    "currency": "jpy",\n    "customer": null,\n    "description": null,\n    "expired_at": null,\n    "failure_code": null,\n    "failure_message": null,\n    "livemode": false,\n    "metadata": [],\n    "object": "charge",\n    "paid": true,\n    "refund_reason": null,\n    "refunded": false,\n    "subscription": null\n}', 'ch_ffc50ebf3e9846821418143eb77ae');

-- --------------------------------------------------------

--
-- Table structure for table `jl2_token`
--

CREATE TABLE `jl2_token` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'トークン',
  `type` smallint(6) NOT NULL COMMENT 'タイプ',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_topic`
--

CREATE TABLE `jl2_topic` (
  `id` int(11) NOT NULL,
  `open_date` date DEFAULT NULL COMMENT '公開日',
  `topic_body` text COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `is_no_visible` smallint(6) DEFAULT '0' COMMENT '表示・非表示',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jl2_user`
--

CREATE TABLE `jl2_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `blocked_at` int(11) DEFAULT NULL COMMENT 'ブロック時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jl2_user`
--

INSERT INTO `jl2_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `blocked_at`) VALUES
(1, 'supperadmin', 'RYq4KM7Ner1kSbJ8onjG9q8b2aZwCK5T', '$2y$13$dgXeYp2O/QNgc5h5/k275u.aBqGILCV3vXQsYEVuJ1MqwYICSKFEe', NULL, 'supperadmin@gmail.com', 10, 1495520328, 1495520328, NULL),
(2, '888888', '', '$2y$13$.s2962hEvn3abXk7ewKI5.CmfHgn6eCOth/OVzt8mlQA9JDy3xAfS', NULL, 'quanghieuit@gmail.com', 10, 1498018141, 1499744494, NULL),
(3, '123456', '', '$2y$13$rU.UtiuCeebHrvCNG2o/I.hn5B0tfteG7g0/gMvL5SWVE/yXJPVwq', NULL, 'quanghieuit@gmail.com', 10, 1498018334, 1499102494, NULL),
(4, '123567', '', '$2y$13$ZrRUmmObQOL80ZbfPoPZ5.EXp.QSuZWKubSf2Y3L4hmvmwqEfFpHK', NULL, 'quanghieuit@gmail.com', 20, 1498018382, 1498018382, NULL),
(5, '090909', '', '$2y$13$OflPV0zzd7/E/omzjVnkh.v8MEOxGknlsZC/yGZMnpT0YIfd1beDi', NULL, 'quanghieuit@gmail.com', 20, 1498018429, 1498018429, NULL),
(6, '696969', '', '$2y$13$dkAqvvK09o/CaT9VpAb5ROoO1Bfcm167E/JsE0IqM/X5PuggheBUC', NULL, 'quanghieuit@gmail.com', 10, 1498018551, 1500371893, NULL),
(7, '898989', '', '$2y$13$rDmZ8oXcS80CXtxSs7ICt.uOi2DZciONoLRtDJTkTUefaYvblc63.', NULL, 'quanghieuit@gmail.com', 10, 1498018639, 1498018710, NULL),
(8, '230895', '', '$2y$13$7NdtC38lni94doIZ68/G0eIl/0RKxoddKJFUWhM1RU37lzdnRVkzu', NULL, 'quanghieuit.hubt@gmail.com', 10, 1499102666, 1499102687, NULL),
(9, '686868', '', '$2y$13$lGjYzXtikMV..kkNx.STjOFvPGacN6rIahC56gpcCzVjK1hXtdBU2', NULL, 'quanghieuit.hubt@gmail.com', 10, 1499228001, 1499228048, NULL),
(10, '160995', 'Af21Nb8QgIPciYaQymhQCbR4WXjRm_GW', '$2y$13$eIRP87TUTSMt4A6geYyDPOO9ZLkDu5703naUtcEzoi0F1gWyvPjmC', NULL, 'quanghieu@gmail.com', 10, 1501212194, 1501212194, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jl2_withdraw`
--

CREATE TABLE `jl2_withdraw` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `member_id` int(11) NOT NULL COMMENT '会員ID',
  `member_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '会員名',
  `message` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'メッセージ',
  `created_at` int(11) DEFAULT NULL COMMENT '登録日時',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kouen_open`
--

CREATE TABLE `kouen_open` (
  `id` int(11) NOT NULL,
  `conv_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_open` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conv_place` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kouen_open` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kouen_close` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanka_open` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sanka_close` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_text` text COLLATE utf8_unicode_ci,
  `body_text` text COLLATE utf8_unicode_ci,
  `price01` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price02` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price03` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `view_status` int(11) DEFAULT '0',
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filemanager_mediafile`
--
ALTER TABLE `filemanager_mediafile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filemanager_mediafile_tag`
--
ALTER TABLE `filemanager_mediafile_tag`
  ADD KEY `filemanager_mediafile_tag_mediafile_id__mediafile_id` (`mediafile_id`),
  ADD KEY `filemanager_mediafile_tag_tag_id__tag_id` (`tag_id`);

--
-- Indexes for table `filemanager_owners`
--
ALTER TABLE `filemanager_owners`
  ADD PRIMARY KEY (`mediafile_id`,`owner_id`,`owner`,`owner_attribute`);

--
-- Indexes for table `filemanager_tag`
--
ALTER TABLE `filemanager_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_admin_email`
--
ALTER TABLE `jl2_admin_email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_auth_assignment`
--
ALTER TABLE `jl2_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `jl2_auth_item`
--
ALTER TABLE `jl2_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `jl2_auth_item_child`
--
ALTER TABLE `jl2_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `jl2_auth_rule`
--
ALTER TABLE `jl2_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `jl2_books`
--
ALTER TABLE `jl2_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_book_genre`
--
ALTER TABLE `jl2_book_genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_calendar`
--
ALTER TABLE `jl2_calendar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_cms_category`
--
ALTER TABLE `jl2_cms_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_cms_content`
--
ALTER TABLE `jl2_cms_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_contact`
--
ALTER TABLE `jl2_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_convention_cate_data`
--
ALTER TABLE `jl2_convention_cate_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_convention_data`
--
ALTER TABLE `jl2_convention_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_convention_price_data`
--
ALTER TABLE `jl2_convention_price_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_info`
--
ALTER TABLE `jl2_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_log_book_sell`
--
ALTER TABLE `jl2_log_book_sell`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_magazine`
--
ALTER TABLE `jl2_magazine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_mail_queue`
--
ALTER TABLE `jl2_mail_queue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_member`
--
ALTER TABLE `jl2_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_migration`
--
ALTER TABLE `jl2_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `jl2_participant`
--
ALTER TABLE `jl2_participant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_payment_logs`
--
ALTER TABLE `jl2_payment_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_speaker_data`
--
ALTER TABLE `jl2_speaker_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_speaker_member_mast`
--
ALTER TABLE `jl2_speaker_member_mast`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_symposium_data`
--
ALTER TABLE `jl2_symposium_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_symposium_participants`
--
ALTER TABLE `jl2_symposium_participants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_token`
--
ALTER TABLE `jl2_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_topic`
--
ALTER TABLE `jl2_topic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_user`
--
ALTER TABLE `jl2_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jl2_withdraw`
--
ALTER TABLE `jl2_withdraw`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kouen_open`
--
ALTER TABLE `kouen_open`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filemanager_mediafile`
--
ALTER TABLE `filemanager_mediafile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `filemanager_tag`
--
ALTER TABLE `filemanager_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_admin_email`
--
ALTER TABLE `jl2_admin_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_books`
--
ALTER TABLE `jl2_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `jl2_book_genre`
--
ALTER TABLE `jl2_book_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jl2_calendar`
--
ALTER TABLE `jl2_calendar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jl2_cms_category`
--
ALTER TABLE `jl2_cms_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_cms_content`
--
ALTER TABLE `jl2_cms_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_contact`
--
ALTER TABLE `jl2_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_convention_cate_data`
--
ALTER TABLE `jl2_convention_cate_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `jl2_convention_data`
--
ALTER TABLE `jl2_convention_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `jl2_convention_price_data`
--
ALTER TABLE `jl2_convention_price_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jl2_info`
--
ALTER TABLE `jl2_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_log_book_sell`
--
ALTER TABLE `jl2_log_book_sell`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `jl2_magazine`
--
ALTER TABLE `jl2_magazine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_mail_queue`
--
ALTER TABLE `jl2_mail_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_member`
--
ALTER TABLE `jl2_member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jl2_participant`
--
ALTER TABLE `jl2_participant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `jl2_payment_logs`
--
ALTER TABLE `jl2_payment_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `jl2_speaker_data`
--
ALTER TABLE `jl2_speaker_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `jl2_speaker_member_mast`
--
ALTER TABLE `jl2_speaker_member_mast`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `jl2_symposium_data`
--
ALTER TABLE `jl2_symposium_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `jl2_symposium_participants`
--
ALTER TABLE `jl2_symposium_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;
--
-- AUTO_INCREMENT for table `jl2_token`
--
ALTER TABLE `jl2_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_topic`
--
ALTER TABLE `jl2_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jl2_user`
--
ALTER TABLE `jl2_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jl2_withdraw`
--
ALTER TABLE `jl2_withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kouen_open`
--
ALTER TABLE `kouen_open`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `filemanager_mediafile_tag`
--
ALTER TABLE `filemanager_mediafile_tag`
  ADD CONSTRAINT `filemanager_mediafile_tag_mediafile_id__mediafile_id` FOREIGN KEY (`mediafile_id`) REFERENCES `filemanager_mediafile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filemanager_mediafile_tag_tag_id__tag_id` FOREIGN KEY (`tag_id`) REFERENCES `filemanager_tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `filemanager_owners`
--
ALTER TABLE `filemanager_owners`
  ADD CONSTRAINT `filemanager_owners_ref_mediafile` FOREIGN KEY (`mediafile_id`) REFERENCES `filemanager_mediafile` (`id`);

--
-- Constraints for table `jl2_auth_assignment`
--
ALTER TABLE `jl2_auth_assignment`
  ADD CONSTRAINT `jl2_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `jl2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jl2_auth_item`
--
ALTER TABLE `jl2_auth_item`
  ADD CONSTRAINT `jl2_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `jl2_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `jl2_auth_item_child`
--
ALTER TABLE `jl2_auth_item_child`
  ADD CONSTRAINT `jl2_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `jl2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jl2_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `jl2_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
