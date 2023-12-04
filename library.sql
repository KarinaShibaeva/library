-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2023 г., 17:46
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reader_ticket` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `book` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `surname`, `name`, `patronymic`) VALUES
(1, 'Пушкин', 'Александр', 'Александрович'),
(2, 'Булгаков', 'Михаил', 'Афанасьевич'),
(3, 'Брэдбери', 'Рэд', ''),
(4, 'Кинг', 'Стивен', ''),
(5, 'Роулинг', 'Джоан', ''),
(6, 'Достоевский', 'Федор', 'Михайлович'),
(7, 'Оруэлл', 'Джордж', ''),
(8, 'Лондон', 'Джек', ''),
(9, 'Толстой', 'Лев', 'Николаевич'),
(10, 'Гоголь', 'Николай', 'Васильевич'),
(11, 'Конан Дойл', 'Артур', ''),
(12, 'Скотт', 'Эмма', ''),
(13, 'Тургенев', 'Иван', 'Сергеевич'),
(14, 'Лермонтов', 'Михаил', 'Юрьевич'),
(15, 'Чехов', 'Антон', 'Павлович'),
(16, 'Шекспир', 'Уильям', '');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `year` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre_id` int(11) NOT NULL,
  `publishing_house_id` int(11) NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_add` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `description`, `author_id`, `year`, `genre_id`, `publishing_house_id`, `image`, `date_add`) VALUES
(1, 'Гарри Поттер и Орден Феникса', 'Гарри Поттер с нетерпением ждет окончания каникул и начала пятого учебного года в Хогвартсе. Юный волшебник как никогда страдает от одиночества, а насмешки и придирки Дурсли стали совсем невыносимыми. К тому же он уверен, Что Волан-де-Морт восстановил силы и скоро начнет действовать. Вас снова ждут опасные и захватывающие приключения, жестокая борьба, верные друзья и волшебный мир Гарри Поттера...', 5, '2020', 6, 1, 'book1.png', '2023-11-08'),
(2, 'Король Лир Ричард III', '«Гремит лишь то, что пусто изнутри», «Полцарства за коня!» — вечно актуальные цитаты Шекспира из гениальных трагедий, вошедших в этот сборник. Трагедий, не сходящих с театральных сцен и снова и снова экранизируемых.\r\n«Король Лир» — о несчастном безумном властителе древнего Уэссекса Лире, разделившем королевство между двумя неблагодарными дочерьми, изгнавшем третью за неумение лицемерно льстить и впоследствии горько раскаявшемся в своих необдуманных решениях.\r\n«Ричард III» — о жестоком узурпаторе. Он жаждет власти и сметает все на своем пути в стремлении добиться английской короны… Но под пером Шекспира обращается в одного из самых харизматичных злодеев в истории мировой литературы.\r\nДва обреченных короля.\r\nДве английские легенды.', 16, '2023', 7, 7, 'book2.png', '2023-11-13'),
(3, 'Капитанская дочка', 'В этот сборник вошла избранная проза Пушкина. \"Повести Белкина\" – цикл из пяти повестей. Временами – трагические, временами – забавные, а порой даже мистические, они рассказывают нам истории о любви, мести, одиночестве, о поиске смысла жизни. \"Дубровский\" – увлекательный роман-повесть о внезапно вспыхнувшем чувстве между потомками двух враждующих семейств. \"Капитанская дочка\" – исторический роман, в котором на фоне крестьянского восстания Емельяна Пугачева разворачивается трогательная история любви. И наконец, неоконченное произведение \"Арап Петра Великого\" – первая попытка наиболее полно описать время правления Петра I, а также рассказ о судьбе предка Пушкина Абрама Петровича Ганнибала. Все эти произведения объединяет тонкое и глубокое описание характеров персонажей, будь то крестьянин или помещик, влюбленная девушка или мятежник Пугачев, богатейший русский язык и, наконец, мастерское умение создавать увлекательные сюжеты – не случайно по прозе Пушкина снято столько фильмов.', 1, '2019', 7, 7, 'book3.png', '2023-11-27'),
(4, 'Евгений Онегин', 'Роман в стихах Евгений Онегин самое известное и самое значительное произведение А. С. Пушкина, вершина русской поэзии и предмет многочисленных исследований. Пушкин начал писать роман в мае 1823 года, а закончил только осенью 1831 года, когда было написано Письмо Онегина к Татьяне . Осенью 1823 года он сообщал друзьям: . Я теперь пишу не роман, а роман в стихах дьявольская разница. Занимательный, легкий, основанный на любовной истории, переданной в манере доверительной беседы автора с читателем, и вместе с тем полный неразрешимых парадоксов и загадок. Противоречивость, многомерность, составляющие самую суть пушкинского романа, привлекают новые поколения читателей, позволяют открывать в нем новые смыслы.', 1, '2019', 7, 8, 'book4.png', '2023-11-29'),
(5, 'Оно', 'Книга рассказывает о группе подростков, которые объединяются, чтобы выследить монстра, который убивает детей в городе Дерри. Роман был написан в 1986 году и стал бестселлером во всем мире.\r\nВ центре сюжета – группа подростков, которые сталкиваются с загадочным монстром, способным принимать различные формы. Они объединяются в «Клуб неудачников» и клянутся выследить чудовище и уничтожить его. Однако, когда они начинают расследование, они понимают, что монстр гораздо опаснее, чем казалось на первый взгляд.\r\n«Оно» – это не только захватывающий роман, но и психологический триллер, который заставляет читателя задуматься о том, что происходит в нашем мире и как мы можем защитить себя от зла. Книга будет интересна как для любителей жанра ужасов, так и для всех, кто любит хорошую литературу.', 4, '2021', 8, 7, 'book5.png', '2023-12-01');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Детектив'),
(2, 'Сборник стихов'),
(3, 'Фэнтези'),
(4, 'Фантастика'),
(5, 'Сказка'),
(6, 'Роман'),
(7, 'Классика'),
(8, 'Ужасы'),
(9, 'Мистика');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `date`) VALUES
(1, 'Музыкально-поэтическая гостиная', '1 декабря в BookLand состоялась музыкально-поэтическая гостиная «Автор стихов строгих и благородных», посвященная 150-летию со дня рождения Валерия Брюсова.\r\n\r\nДесятиклассники школы №22 познакомились с биографией и творческой деятельностью известного русского поэта, прозаика, переводчика и литературного критика. Юноши и девушки посмотрели тематические видеоролики, послушали вдохновенные поэтические строчки Брюсова в исполнении известных российских актеров.', '1.jpg', '2023-12-02'),
(2, 'Беседа по финансовой безопасности', 'Для сотрудников BookLand состоялась беседа по финансовой безопасности.', '2.jpg', '2023-12-01'),
(3, 'Урок-предупреждение', '1 декабря для десятиклассников школы №11 состоялся урок-предупреждение «Вся правда о СПИДе», приуроченный к Всемирному дню борьбы со СПИДом.\r\n\r\nЮноши и девушки узнали о ВИЧ-инфекции, о путях передачи ВИЧ, о мерах профилактики. Молодые люди посмотрели познавательные видеоролики «Простые правила против СПИДа» и «Профилактика ВИЧ-инфекций», а также получили памятки от Курганского областного центра профилактики и борьбы со СПИДом.', '3.jpg', '2023-11-29');

-- --------------------------------------------------------

--
-- Структура таблицы `publishing_house`
--

CREATE TABLE `publishing_house` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publishing_house`
--

INSERT INTO `publishing_house` (`id`, `name`) VALUES
(1, 'Махаон'),
(2, 'Эксмо'),
(3, 'Росмэн'),
(4, 'Просвещение'),
(5, 'Дрофа'),
(6, 'Молодая гвардия'),
(7, 'Neoclassic'),
(8, 'ACT');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(256) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `surname`, `name`, `patronymic`, `email`, `password`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin@mail.ru', 'admin11');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`,`genre_id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `publishing_house_id` (`publishing_house_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `publishing_house`
--
ALTER TABLE `publishing_house`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `publishing_house`
--
ALTER TABLE `publishing_house`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`genre_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`publishing_house_id`) REFERENCES `publishing_house` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
