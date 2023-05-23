-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 23 2023 г., 21:49
-- Версия сервера: 10.4.22-MariaDB
-- Версия PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cafe_bond`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Хлеб', '2020-12-23', '2020-12-23'),
(2, 'Булочки', '2020-12-23', '2020-12-23'),
(3, 'Пироги', '2020-12-23', '2020-12-23'),
(5, 'Торты', '2022-11-01', '2022-11-01'),
(7, 'Напитки', '2022-11-15', '2022-11-15'),
(8, 'Десерты', '2022-11-15', '2022-11-15');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `body`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'First comment', 1, 1, '2021-05-05', '2021-05-05'),
(2, 'qwe', 3, 1, '2022-11-21', '2022-11-21'),
(3, 'test comment 2222', 3, 5, '2022-11-21', '2022-11-21'),
(4, 'test comment 3333', 3, 5, '2022-11-21', '2022-11-21'),
(5, 'test comment medicine', 3, 2, '2022-11-21', '2022-11-21'),
(6, 'test comment politika', 3, 3, '2022-11-21', '2022-11-21'),
(7, 'test comment politica', 3, 6, '2022-11-21', '2022-11-21');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adress` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_date`, `name`, `email`, `phone`, `adress`, `total_price`, `created_at`, `updated_at`) VALUES
(70, NULL, '2023-01-18', 'test123', 'sergei.pavlenkov@gmail.com', '123456', 'Tallinn', '5.80', '2023-01-18', '2023-01-18'),
(71, NULL, '2023-01-18', 'NameTest', 'admin@news.ee', '123456', 'fghfg', '7.50', '2023-01-18', '2023-01-18'),
(72, NULL, '2023-01-18', 'NameTest', 'nameTest@user.ee', '123456', 'Tallinn', '5.20', '2023-01-18', '2023-01-18'),
(73, NULL, '2023-01-18', NULL, 'manager@news.ee', '123456', NULL, '6.00', '2023-01-18', '2023-01-18'),
(74, NULL, '2023-01-18', 'test2', 'admin@news.ee', '123456', 'fghfg', '1.50', '2023-01-18', '2023-01-18'),
(75, NULL, '2023-01-19', NULL, 'manager@news.ee', '123456', NULL, '4.10', '2023-01-19', '2023-01-19'),
(76, NULL, '2023-01-19', NULL, 'manager@news.ee', '123456', NULL, '3.80', '2023-01-19', '2023-01-19'),
(77, NULL, '2023-01-19', 'Василина', 'ula@gmail.com', '53769200', 'Ida-Virumaa', '6.10', '2023-01-19', '2023-01-19'),
(78, NULL, '2023-01-21', 'Василина', 'ula@gmail.com', '53764', 'Ida-Virumaa', '41.45', '2023-01-21', '2023-01-21'),
(119, NULL, '2023-02-07', NULL, 'jhj@ghg', '45871', NULL, '5.10', '2023-02-07', '2023-02-07'),
(120, NULL, '2023-03-08', NULL, 'ulabon@gmail.com', '53764', NULL, '1.60', '2023-03-08', '2023-03-08'),
(121, NULL, '2023-03-08', NULL, 'ulabo@gmail.com', '5376', NULL, '2.20', '2023-03-08', '2023-03-08'),
(122, NULL, '2023-03-08', NULL, 'ulabon@gmail.com', '537645', NULL, '1.60', '2023-03-08', '2023-03-08'),
(123, NULL, '2023-03-14', 'Василина', '4587@gmail.com', '53764', 'Ida-Virumaa', NULL, '2023-03-14', '2023-03-14'),
(124, NULL, '2023-03-14', 'Василина', '4587@gmail.com', '53764', 'Ida-Virumaa', '2.10', '2023-03-14', '2023-03-14'),
(127, NULL, '2023-03-14', NULL, '456@gmail.com', '53764', NULL, '0.65', '2023-03-14', '2023-03-14'),
(128, NULL, '2023-03-14', NULL, '456@gmail.com', '53764', NULL, '0.65', '2023-03-14', '2023-03-14'),
(129, NULL, '2023-03-14', NULL, '456@gmail.com', '53764', NULL, '4.40', '2023-03-14', '2023-03-14'),
(135, NULL, '2023-03-15', NULL, 'jgjg@gmail.com', '53764', NULL, '30.00', '2023-03-15', '2023-03-15'),
(136, NULL, '2023-03-15', NULL, '123@gmail.com', '53764', NULL, '16.00', '2023-03-15', '2023-03-15');

-- --------------------------------------------------------

--
-- Структура таблицы `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp(),
  `price` decimal(6,2) DEFAULT NULL,
  `summ_prod` decimal(7,2) DEFAULT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `products_id`, `amount`, `created_at`, `updated_at`, `price`, `summ_prod`, `product_name`) VALUES
(108, 70, 7, 1, '2023-01-18', '2023-01-18', '1.50', '1.50', 'Хлеб ржаной'),
(109, 70, 8, 2, '2023-01-18', '2023-01-18', '2.15', '4.30', 'Хлеб с отрубями'),
(110, 71, 7, 5, '2023-01-18', '2023-01-18', '1.50', '7.50', 'Хлеб ржаной'),
(111, 72, 5, 4, '2023-01-18', '2023-01-18', '1.30', '5.20', 'Багет белый'),
(112, 73, 12, 10, '2023-01-18', '2023-01-18', '0.60', '6.00', 'Рогалики масляные'),
(113, 74, 7, 1, '2023-01-18', '2023-01-18', '1.50', '1.50', 'Хлеб ржаной'),
(114, 75, 5, 2, '2023-01-19', '2023-01-19', '1.30', '2.60', 'Багет белый'),
(115, 75, 1, 2, '2023-01-19', '2023-01-19', '0.75', '1.50', 'Пирог с яблоками'),
(116, 76, 18, 2, '2023-01-19', '2023-01-19', '0.80', '1.60', 'Шарлотка'),
(117, 76, 19, 2, '2023-01-19', '2023-01-19', '1.10', '2.20', 'Чизкейк'),
(220, 119, 7, 1, '2023-02-07', '2023-02-07', '1.50', '1.50', 'Хлеб ржаной'),
(221, 119, 11, 3, '2023-02-07', '2023-02-07', '1.00', '3.00', 'Лаваш'),
(222, 119, 12, 1, '2023-02-07', '2023-02-07', '0.60', '0.60', 'Рогалики масляные'),
(223, 120, 9, 1, '2023-03-08', '2023-03-08', '1.60', '1.60', 'Кукурузный хлеб'),
(224, 121, 1, 1, '2023-03-08', '2023-03-08', '0.75', '0.75', 'Пирог с яблоками'),
(225, 121, 2, 1, '2023-03-08', '2023-03-08', '0.80', '0.80', 'Черничный пирог'),
(226, 121, 3, 1, '2023-03-08', '2023-03-08', '0.65', '0.65', 'Медовик классический'),
(227, 122, 11, 1, '2023-03-08', '2023-03-08', '1.00', '1.00', 'Лаваш'),
(228, 122, 12, 1, '2023-03-08', '2023-03-08', '0.60', '0.60', 'Рогалики масляные'),
(229, 124, 10, 1, '2023-03-14', '2023-03-14', '2.10', '2.10', 'Хлеб цельнозерновой'),
(230, 127, 3, 1, '2023-03-14', '2023-03-14', '0.65', '0.65', 'Медовик классический'),
(231, 128, 3, 1, '2023-03-14', '2023-03-14', '0.65', '0.65', 'Медовик классический'),
(232, 129, 1, 5, '2023-03-14', '2023-03-14', '0.75', '3.75', 'Пирог с яблоками'),
(233, 129, 3, 1, '2023-03-14', '2023-03-14', '0.65', '0.65', 'Медовик классический'),
(244, 135, 7, 20, '2023-03-15', '2023-03-15', '1.50', '30.00', 'Хлеб ржаной'),
(245, 136, 7, 10, '2023-03-15', '2023-03-15', '1.50', '15.00', 'Хлеб ржаной'),
(246, 136, 16, 1, '2023-03-15', '2023-03-15', '1.00', '1.00', 'Тертый пирог с вареньем');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `units` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `units`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Пирог с яблоками', 'Состав:\r\nЯйцо - 2 шт.\r\nКефир - 200 гр.\r\nМука - 400 гр.\r\nСахар - 200 гр.\r\nСода - 1 ч. л.\r\nМасло сливочное - 10 гр.\r\nЯблоко - 2 шт.', 'appleP.jpg', '100гр.', '0.75', 3, '2021-05-03', '2021-05-03'),
(2, 'Черничный пирог', 'Состав:\r\nмука 250 г\r\nмасло сливочное 150 г\r\nРазрыхлитель теста Dr. Bakers. 1 ч. л.\r\nАроматизатор \"Ванилин-интенсив\" Dr. Bakers. 0.25 ч. л.\r\nягоды черника 600 г\r\nСахарная пудра универсальная Dr. Bakers. 1 упаковка\r\nкрахмал картофельный 2 ст. л.', 'mustikaKook.jpg', '100гр.', '0.80', 3, '2021-05-03', '2021-05-03'),
(3, 'Медовик классический', 'Состав: \r\nЯйца 2шт\r\nСахар 150г\r\nМёд 120г\r\nСливочное масло 85г\r\nСода 1ч. л.\r\nМука 350г', 'medovik.jpg', '100гр.', '0.65', 5, '2021-05-03', '2021-05-03'),
(5, 'Багет белый', 'Состав:\r\nмука пшеничная, \r\nвода питьевая, \r\nмасло сливочное, \r\nмасло подсолнечное, \r\nдрожжи, \r\nсоль.', 'багет.jpg', 'шт.', '1.30', 1, '2022-11-02', '2022-11-02'),
(6, 'Булка сдобная', 'мука пшеничная высшего сорта, сахар, маргарин (масла и жиры растительные рафинированное дезодорированное (в том числе модифицированные), вода питьевая, соль поваренная пищевая.', 'bulochki.jpg', 'шт.', '0.50', 2, '2022-11-15', '2022-11-15'),
(7, 'Хлеб ржаной', 'мука в/с, мука ржаная, соль, дрожжи, Монте-Корн Ржаной экстра (мука пшеничная цельнозерновая, клейковина,сахар,молочные продукты, натуральная закваска, ржаные мука и солод, яблочный порошок,специи: кориандр и тмин).', 'black_bread.jpg', 'шт.', '1.50', 1, '2023-01-10', '2023-01-10'),
(8, 'Хлеб с отрубями', 'Отруби овсяные - 90 гр.,\r\nОтруби пшеничные - 90 гр.,\r\nМолоко сухое обезжиренное - 100 гр.,\r\nЯйцо - 1 шт.,\r\nТворог обезжиренный - 125 гр.,\r\nКефир - 100 гр.,\r\nМасло растительное - 1 ст. л.', 'otrub_bread.jpg', 'шт.', '2.15', 1, '2023-01-10', '2023-01-10'),
(9, 'Кукурузный хлеб', 'вода питьевая, мука рисовая, крахмал кукурузный, крахмал картофельный, мука кукурузная, масло подсолнечное рафинированное, семена подсолнечника, дрожжи хлебопекарные прессованные, сахар, волокна пищевые (псиллиум), соль пищевая.', 'kukuruz_bread.jpg', 'шт.', '1.60', 1, '2023-01-10', '2023-01-10'),
(10, 'Хлеб цельнозерновой', 'Мука цельнозерновая, мука пшеничная 1 сорта,мука ржаная обдирная, рожь плющенная, вода, масло подсолнечное, экстракт солодовый, соль, сахар, дрожжи.', 'zerno_bread.jpg', 'шт.', '2.10', 1, '2023-01-10', '2023-01-10'),
(11, 'Лаваш', 'Традиционно лаваш готовят из пшеничной муки с добавлением соли и воды. В составе лепешки нет дрожжей, но много молочнокислых бактерий. Их источником выступает специальная закваска, которую замешивают в тесто для придания лавашу характерного вкуса и текстуры.', 'lavash.jpg', '3шт.', '1.00', 1, '2023-01-10', '2023-01-10'),
(12, 'Рогалики масляные', 'Молоко  — 50 Миллилитров Вода теплая  — 125 Миллилитров Дрожжи сухие  — 6 Грамм Сахар  — 20 Грамм Соль  — 5 Грамм Мёд  — 10 Грамм Мука пшеничная  — 250 Грамм Масло сливочное 82,5%  — 150 Грамм (25 грамм в растопленном виде — в тесто, 125 грамм — для прослаивания) Яичный желток  — 1 Штука (для смазывания перед выпечкой)', 'rogalyk.jpg', 'шт.', '0.60', 2, '2023-01-10', '2023-01-10'),
(13, 'Сочник с творогом', 'мука пшеничная хлебопекарная высшего сорта, творог, маргарин молочный 82%, сахар-песок, яйцо куриное, сметана, сода, разрыхлитель.', 'sochnik.jpg', 'шт.', '0.75', 2, '2023-01-10', '2023-01-10'),
(14, 'Самса с курицей', 'Слоёное тесто - 400 гр.,\r\nФиле куриное - 400 гр.,\r\nЛук - 150 гр.,\r\nСливочное масло - 50 гр.,\r\nСпеции восточные - 1 ч. л.,\r\nСоль - 0,5 ч.л.,\r\nСемена кунжута.', 'samsa.jpg', 'шт.', '1.35', 2, '2023-01-10', '2023-01-10'),
(15, 'Пончик', 'Молоко - 200 мл.\r\nДрожжи - 12 гр.\r\nСахар - 3 ст. л.\r\nМука - 300 гр.\r\nЖелток яичный (сырой) - 3 шт.\r\nМасло сливочное - 50 гр.\r\nСоль - 10 гр.\r\nМасло подсолнечное - 50 мл.\r\nПудра сахарная - 30 гр.', 'ponchik.jpg', 'шт.', '0.45', 2, '2023-01-10', '2023-01-10'),
(16, 'Тертый пирог с вареньем', 'Яйцо - 2 шт.\r\nМука - 2 ст.\r\nМаргарин - 150 гр.\r\nВанилин - 1 гр.\r\nРазрыхлитель - 1 ч. л.\r\nВаренье - 200 гр.\r\nМасло сливочное - 20 гр.', 'tertyi-pirig.jpg', '100гр.', '1.00', 3, '2023-01-10', '2023-01-10'),
(17, 'Заливной пирог с ягодами', 'Мука пшеничная - 1 ст.,\r\nСметана - 4 ст.л.,\r\nСахар - 1 ст.,\r\nЯйцо куриное - 2 шт.,\r\nЯгоды - 1 ст.,\r\nСоль - 1 щепотка,\r\nРазрыхлитель для теста - 1 ч.л.,\r\nВанилин - 0,5 ч.л.', 'zaliv.jpg', '100гр.', '1.20', 3, '2023-01-10', '2023-01-11'),
(18, 'Шарлотка', '2-3 яблока \r\n2 ст. л. апельсинового сока \r\n5 яиц \r\n200 г сахара \r\n200 г муки \r\n20 г сливочного масла (для смазывания формы) \r\n10 г ванильного сахара \r\n1 щепотка соли ', 'sharlotka.jpg', '100гр.', '0.80', 3, '2023-01-10', '2023-01-10'),
(19, 'Чизкейк', 'печенье песочное 300 г\r\nмасло сливочное 100 г\r\nсыр сливочный 600 г\r\nсахар 150 г\r\nяйца 3 шт.\r\nсливки 30-35% 200 мл', 'cheescake.jpg', '100гр.', '1.10', 3, '2023-01-10', '2023-01-10'),
(20, 'Киевский торт', 'Орехи 150 гр\r\nМука пшеничная 75 гр\r\nСахар 355 гр\r\nЯйца 4 шт.\r\nМолоко 170 мл\r\nМасло сливочное 200 гр\r\nВанильный экстракт 1 ч. л.\r\nНатуральный какао порошок 1 ч. л.', 'kyiv.jpg', '100гр.', '1.35', 5, '2023-01-10', '2023-01-10'),
(21, 'Ореховый торт', 'Орехи — 250 Грамм\r\nСахар — 200 Грамм\r\nМасло сливочное — 200 Грамм\r\nМука — 150 Грамм\r\nЯйца — 4 Штуки\r\nРазрыхлитель — 1 Штука', 'gorih.jpg', '100гр.', '1.20', 5, '2023-01-10', '2023-01-10'),
(22, 'Десерт \"Павлова\"', 'Сахарная пудра кг стак.\r\nЯичные белки шт. стак.\r\nКукурузный крахмал стак.\r\nЛимонный сок\r\nЯгоды кг стак.\r\nМята ...\r\nСливки (33-35%) гр кг\r\nСахарная пудра кг', 'pavlova.jpg', 'шт.', '2.00', 8, '2023-01-10', '2023-01-10'),
(23, 'Медовый орешек', 'Мука пшеничная, яйцо, масло растительное, мед, чернослив, курага, изюм, грецкий орех.', 'gorishok.jpg', 'шт.', '0.45', 8, '2023-01-10', '2023-01-10');

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `good` tinyint(1) NOT NULL,
  `notGood` tinyint(1) NOT NULL,
  `created_at` int(11) DEFAULT current_timestamp(),
  `updated_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('user','admin','manager','') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin@news.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'admin', 'admin', '2021-05-05', '2022-11-10'),
(2, 'manager@news.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'manager', 'manager', '2021-05-05', '2021-05-05'),
(3, 'user@news.ee', '$2y$12$mjv/GPng4oQFohhkPl8RPucmgRDFVs/UCVP02US.r92ra09kK4d7u', 'user', 'user', '2021-05-05', '2021-05-05'),
(4, 'ulafgh2@gmail.com', '$2y$10$kVFROkmk/nI5kyS47jwbAubVoxlb9MAKn4DUQlcOtSBE62pf6HBEa', 'user', 'test22', '2022-11-09', '2022-11-09'),
(5, 'sergei.pavlenkov@gmail.com', '$2y$10$/UIZ1yGYrJtEGPteVlN0.OOMcyYLfdj.yEECVfg4EIuCHKtyLOBba', 'user', 'test155', '2022-11-09', '2022-11-09'),
(13, 'vas@gmail.com', '$2y$10$hOzmB8kdMn3YSYF8tFOViOh5.s6x0YxP9Hv7ZIIUR7C74/RJ8Z7zC', 'user', 'vasylyna', '2023-01-11', '2023-01-11'),
(14, 'kitbot@ivkhk.ee', '$2y$10$ktO3fAyAliaIsuuUZZ9Od.yDgQjonCMslm6oVkYunvDa49QyA7YQu', 'user', 'kit Bot', '2023-01-19', '2023-01-19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `task_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT для таблицы `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
