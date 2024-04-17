/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 8.0.17 : Database - soil_to_soul
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`soil_to_soul` /*!40100 DEFAULT CHARACTER SET utf32 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `soil_to_soul`;

/*Table structure for table `amenities` */

DROP TABLE IF EXISTS `amenities`;

CREATE TABLE `amenities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;

/*Data for the table `amenities` */

insert  into `amenities`(`id`,`name`,`icon`,`active`,`created`,`modified`) values 
(1,'Duration','nights.png',1,'2024-01-16 10:17:27','2024-01-19 15:04:20'),
(2,'Destinations Covered','cities.png',1,'2024-01-16 10:19:33','2024-01-19 15:09:08'),
(3,'Unique Hotels','hotel.png',1,'2024-01-16 10:20:35','2024-01-19 15:09:26'),
(4,'Meals','meals.png',1,'2024-01-19 15:09:56','2024-01-19 15:09:56'),
(5,'Activities','activities.png',1,'2024-01-19 15:10:15','2024-01-19 15:10:20'),
(6,'Language','language.png',1,'2024-01-19 15:10:48','2024-01-19 15:10:48');

/*Table structure for table `amenities_our_journies` */

DROP TABLE IF EXISTS `amenities_our_journies`;

CREATE TABLE `amenities_our_journies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journey_id` int(11) DEFAULT NULL,
  `amenity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32;

/*Data for the table `amenities_our_journies` */

insert  into `amenities_our_journies`(`id`,`our_journey_id`,`amenity_id`) values 
(1,1,2),
(2,1,3);

/*Table structure for table `blog_authors` */

DROP TABLE IF EXISTS `blog_authors`;

CREATE TABLE `blog_authors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author_name` varchar(45) DEFAULT NULL,
  `author_image` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `note` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `blog_authors` */

insert  into `blog_authors`(`id`,`author_name`,`author_image`,`page_title`,`page_slug`,`page_url`,`meta_description`,`note`,`active`,`created`,`modified`) values 
(1,'Prime Minister','Prime-Minister.avif','Prime Minister','prime-minister','http://localhost/project/CakePHP/soil2soul/blog_authors/prime-minister','',' Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ',1,'2022-05-11 15:19:47','2024-02-07 15:32:52'),
(2,'Salman Khan','s-5048-v-tradition-original-imagfupfp8dhtaay.webp',NULL,NULL,NULL,NULL,'This is for test',1,'2022-05-11 16:04:55','2024-01-17 15:11:51'),
(3,'Author Name','transport_mana_img2.jpg','','author-name','http://localhost/project/CakePHP/soil2soul/blog_authors/author-name','',' reservations, operations and accounts. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiu',1,'2022-06-01 13:30:32','2024-01-18 18:17:28'),
(4,'Robin Sharma','kurta.webp',NULL,NULL,NULL,NULL,'Aspiring leaders should consider subscribing to these and devouring their sage wisdom and advice as regularly as possible! Good leadership is a habit and habits are built up over time through repeating actions and behaviors until they become second nature',1,'2022-06-02 15:14:59','2024-01-17 15:19:58'),
(5,'Dinesh Jagtab','team_management.jpg','','dinesh-jagtab','http://localhost/project/CakePHP/soil2soul/blog_authors/dinesh-jagtab','','',0,'2022-06-06 13:35:00','2024-01-18 18:18:12'),
(6,'unkonwn',NULL,NULL,NULL,NULL,NULL,'',1,'2022-06-09 14:11:22','2022-06-09 14:11:22'),
(7,'Tvisha Sharma',NULL,NULL,NULL,NULL,NULL,'',1,'2022-06-21 15:10:38','2022-06-21 15:10:38'),
(8,'Sasa',NULL,NULL,NULL,NULL,NULL,'',0,'2023-05-11 13:55:41','2023-05-11 13:55:41');

/*Table structure for table `blog_categories` */

DROP TABLE IF EXISTS `blog_categories`;

CREATE TABLE `blog_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `page_title` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `meta_keyword` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `blog_categories` */

insert  into `blog_categories`(`id`,`order`,`name`,`page_title`,`page_slug`,`page_url`,`image_file`,`active`,`meta_description`,`meta_keyword`,`created`,`modified`) values 
(10,1,'Spiritual Places','','spiritual-places','http://localhost/project/CakePHP/soil2soul/blogs/spiritual-places','blogcat_img01.jpg',1,'','','2024-01-15 14:56:42','2024-01-17 11:19:33'),
(11,2,'The Mindful Word','The Mindful Word','the-mindful-word','http://localhost/project/CakePHP/soil2soul/blogs/the-mindful-word','blogcat_img02.jpg',1,'','','2024-01-15 15:26:19','2024-01-17 11:19:45'),
(12,3,'Top 10 Post','','top-10-post','http://localhost/project/CakePHP/soil2soul/blogs/top-10-post','blogcat_img03.jpg',1,'','','2024-01-15 15:26:58','2024-01-17 11:19:54'),
(13,4,'Category Name 04','','category-name-04','http://localhost/project/CakePHP/soil2soul/blogs/category-name-04','blogcat_img04.jpg',1,'','','2024-01-15 15:27:25','2024-01-17 11:20:04'),
(14,5,'Category Name 05','','category-name-05','http://localhost/project/CakePHP/soil2soul/blogs/category-name-05','blogcat_img05.jpg',1,'','','2024-01-15 15:27:51','2024-01-17 11:20:15'),
(15,6,'Category Name 06','','category-name-06','http://localhost/project/CakePHP/soil2soul/blogs/category-name-06','blogcat_img06.jpg',1,'','','2024-01-15 15:28:06','2024-01-17 11:20:25'),
(16,7,'Category Name 07','','category-name-07','http://localhost/project/CakePHP/soil2soul/blogs/category-name-07','blogcat_img07.jpg',0,'','','2024-01-15 15:28:14','2024-01-17 11:20:38');

/*Table structure for table `blog_comments` */

DROP TABLE IF EXISTS `blog_comments`;

CREATE TABLE `blog_comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `comments` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `blog_comments` */

insert  into `blog_comments`(`id`,`blog_id`,`name`,`email`,`comments`,`active`,`token`,`created`,`modified`) values 
(1,12,'test','moin@gmail.com','This is for test ',1,NULL,'2024-01-19 12:12:02','2024-01-19 14:32:56'),
(2,8,'Shehzad','shehzad215@gmail.com','This is for test ',1,NULL,'2024-01-19 14:11:14','2024-01-19 14:11:14'),
(3,13,'Shehzad','shehzad215@gmail.com','This is for test ',0,'f877eb','2024-04-15 15:56:53','2024-04-15 15:56:53');

/*Table structure for table `blog_tags` */

DROP TABLE IF EXISTS `blog_tags`;

CREATE TABLE `blog_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `blog_tags` */

insert  into `blog_tags`(`id`,`name`,`active`,`created`,`modified`,`page_slug`,`page_url`,`page_title`,`meta_description`) values 
(1,'Spiritual',1,'2024-01-15 16:42:08','2024-01-15 18:35:23','spiritual','http://localhost/project/CakePHP/soil2soul/blog_tags/spiritual','',''),
(2,'Travel',1,'2024-01-15 16:42:18','2024-01-15 16:47:08','travel','http://localhost/project/CakePHP/soil2soul/blog_tags/travel','',''),
(3,'Meditations',1,'2024-01-15 16:42:33','2024-01-15 16:47:16','meditations','http://localhost/project/CakePHP/soil2soul/blog_tags/meditations','',''),
(4,'Retreat',1,'2024-01-15 16:42:41','2024-01-15 16:59:44','retreat','http://localhost/project/CakePHP/soil2soul/blog_tags/retreat','',''),
(5,'Sacred Places',1,'2024-01-15 16:42:56','2024-01-15 16:59:53','sacred-places','http://localhost/project/CakePHP/soil2soul/blog_tags/sacred-places','',''),
(6,'Yoga Tour',1,'2024-01-15 16:43:08','2024-01-15 17:00:01','yoga-tour','http://localhost/project/CakePHP/soil2soul/blog_tags/yoga-tour','',''),
(7,'Mindfulness',1,'2024-01-15 16:43:16','2024-01-15 17:00:07','mindfulness','http://localhost/project/CakePHP/soil2soul/blog_tags/mindfulness','',''),
(8,'Yoga',1,'2024-01-15 16:43:21','2024-01-15 17:00:14','yoga','http://localhost/project/CakePHP/soil2soul/blog_tags/yoga','',''),
(9,'Healing',1,'2024-01-15 16:43:28','2024-01-15 17:00:32','healing','http://localhost/project/CakePHP/soil2soul/blog_tags/healing','',''),
(10,'Spiritual Travel',1,'2024-01-15 16:43:36','2024-01-15 17:00:38','spiritual-travel','http://localhost/project/CakePHP/soil2soul/blog_tags/spiritual-travel','','');

/*Table structure for table `blog_views` */

DROP TABLE IF EXISTS `blog_views`;

CREATE TABLE `blog_views` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

/*Data for the table `blog_views` */

insert  into `blog_views`(`id`,`blog_id`,`ip_address`,`created`,`modified`) values 
(1,13,'::1','2024-03-11 14:30:04','2024-03-11 14:30:04'),
(2,5,'::1','2024-03-11 14:30:19','2024-03-11 14:30:19'),
(3,11,'::1','2024-03-11 15:01:01','2024-03-11 15:01:01'),
(4,7,'::1','2024-04-04 15:52:18','2024-04-04 15:52:18'),
(5,12,'::1','2024-04-15 11:42:04','2024-04-15 11:42:04');

/*Table structure for table `blogs` */

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `blog_category_id` int(11) DEFAULT NULL,
  `blog_author_id` int(11) DEFAULT NULL,
  `title` text,
  `page_slug` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `canonical_url` text,
  `small_image` varchar(255) DEFAULT NULL,
  `main_image` varchar(255) DEFAULT NULL,
  `note` text,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_display_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `page_url` varchar(255) DEFAULT NULL,
  `page_title` text,
  `meta_description` text,
  `meta_keyword` text,
  `blog_date` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `blogs` */

insert  into `blogs`(`id`,`user_id`,`blog_category_id`,`blog_author_id`,`title`,`page_slug`,`canonical_url`,`small_image`,`main_image`,`note`,`description`,`active`,`is_display_homepage`,`page_url`,`page_title`,`meta_description`,`meta_keyword`,`blog_date`,`created`,`modified`) values 
(1,1,10,1,'Great Benefits of Reading the Hanuman Chalisa','great-benefits-of-reading-the-hanuman-chalisa','http://localhost/project/CakePHP/tatvayog/blogs/great-benefits-of-reading-the-hanuman-chalisaf-1','HanumanChalisa.jpg','HanumanChalisa1.jpg','Lord Veer Hanuman is a renowned icon of courage, heroic acts and ultimate devotion to the divine. A number of mythological episodes lend us stories that showcase his sheer strength, valor, and love for the divine - Lord Ram.','<p><strong>The 10 Great Benefits of reciting the Hanuman Chalisa</strong></p>\r\n<p><br />Lord&nbsp;Veer Hanuman&nbsp;is a renowned icon of courage, heroic acts and ultimate devotion to the divine. A number of mythological episodes lend us stories that showcase his sheer strength, valor, and love for the divine -&nbsp;Lord Ram.</p>\r\n<p>The Great Poet Tulsidas, a devotee of Lord Ram and author of Ramcharitmanas, wrote verses in praise of Lord Hanuman, which became the embodiment of his divinity and a channel to invoke his blessings.</p>\r\n<p>There are myriads of benefits of reading the&nbsp;Hanuman Chalisa&nbsp;or literally the 40 verses about Lord&nbsp;Hanuman. The power embedded in the verses can boost any ventures and imparts protection from negativity and dispel obstacles. It is a popular belief that chanting the&nbsp;Hanuman Chalisa&nbsp;with utmost devotion invokes Lord Hanuman&rsquo;s divine intervention in life&rsquo;s greatest issues and resolves them.</p>\r\n<p>Here are compelling benefits of chanting the&nbsp;Hanuman Chalisa&nbsp;that will make you want to recite it over and over again. And they are not the only ones. Each verse has its own effects and it takes very little time to recite the beautiful verses filled with the grace of Lord&nbsp;Hanuman.</p>',1,0,'http://localhost/project/CakePHP/soil2soul/spiritual-places/great-benefits-of-reading-the-hanuman-chalisa-1','','','','2023-06-07','2023-06-06 11:37:06','2024-02-08 15:17:41'),
(2,1,11,2,'Navratri Celebrations and its Meaning','navratri-celebrations-and-its-meaning','http://localhost/project/CakePHP/tatvayog/blogs/navratri-celebrations-and-its-meaning-2','happy-navratri-hindu-festival.avif','happy-navratri-hindu-festival.avif','Navaratri comes four times in a year. But the one falling in the Sharad month (autumn) is the most important and celebrated across the country. This year, Navaratri starts on September 21 and ends on September 29.','<p>Navaratri comes four times in a year. But the one falling in the Sharad month (autumn) is the most important and celebrated across the country. This year, Navaratri starts on September 21 and ends on September 29.</p>',1,1,'http://localhost/project/CakePHP/soil2soul/the-mindful-word/navratri-celebrations-and-its-meaning-2','','','','2023-07-24','2023-06-06 12:00:24','2024-02-08 15:17:23'),
(3,1,12,3,'The Perfect Corporate Gift','the-perfect-corporate-gift','http://tatvayog.epuratech.com//blogs/the-perfect-corporate-gift-3','blog_img03.jpg','Christmas-Gifting-Guide.jpg','Gifting is an act of giving. When done without expectations or with an eye towards quid-pro-quo, it is noble and cleansing. But corporate gifting falls in no-man’s land. It is a reality of corporate life, yet it is not truly altruistic.','<p>Gifting is an act of giving. When done without expectations or with an eye towards quid-pro-quo, it is noble and cleansing. But corporate gifting falls in no-man&rsquo;s land. It is a reality of corporate life, yet it is not truly altruistic.</p>',1,0,'http://localhost/project/CakePHP/soil2soul/top-10-post/the-perfect-corporate-gift-3','','','','2023-07-07','2023-06-06 12:09:27','2024-02-08 15:17:07'),
(4,1,13,4,'Unlock Your Chakras: The Power of Incense Sticks','unlock-your-chakras:-the-power-of-incense-sticks','http://tatvayog.epuratech.com//blogs/unlock-your-chakras:-the-power-of-incense-sticks-4','Unlock-Your-Chakras-The-Power-of-Incense-Sticks.jpg','Unlock-Your-Chakras-The-Power-of-Incense-Sticks.jpg','Discover the power of Tatvayog incense sticks in unlocking chakras and promoting spiritual well-being. Learn how to use Tatvayog Incense to activate your chakras and support a healthy flow of energy throughout your body.','<p style=\"text-align: justify;\">Incense has been used for thousands of years in spiritual practices and various cultural rituals. Its unique ability to create a fragrant environment has made it a staple in meditation and relaxation practices around the world.</p>\r\n<p style=\"text-align: justify;\">Incense sticks, in particular, have become increasingly popular due to their convenience, affordability, and effectiveness. But did you know that incense products can also play a vital role in unlocking chakras and promoting physical, emotional, and spiritual well-being? Tatvayog products are the best if you are looking for agarbattis and dhoop sticks. They have various options that you can choose from, click here to view their products <a href=\"https://www.tatvayog.com/\">https://www.tatvayog.com/ </a>.</p>\r\n<p style=\"text-align: justify;\">In this beginner\'s guide, we\'ll explore how incense sticks can help activate your chakras and promote a healthy energy flow throughout your body.</p>\r\n<p style=\"text-align: justify;\">We\'ll also take a look at Tatvayog &ndash; a leading brand that offers a range of unique and powerful incense blends specifically designed to support chakra activation. You can check out their range of incense sticks here -<a href=\"https://www.tatvayog.com/fragrance-of-chakras\"> https://www.tatvayog.com/fragrance-of-chakras</a></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">What are Chakras?</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; Before we dive into the benefits of incense sticks in chakra activation, it\'s important to understand exactly what chakras are.<br />●&nbsp;&nbsp;Chakras are centers of energy located throughout the human body. There are seven primary chakras, each associated with a specific color, sound, and purpose.<br />●&nbsp; When these chakras are balanced and open, energy flows freely through the body, promoting physical, emotional, and spiritual well-being.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Importance of Chakra Activation</h3>\r\n<p style=\"text-align: justify;\">When our chakras become blocked or imbalanced, we may experience physical ailments, emotional challenges, and spiritual disconnection. Chakra activation can help restore balance and promote a healthier flow of energy throughout the body. This, in turn, can lead to feelings of relaxation, clarity, and spiritual connectedness.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Why Incense Sticks are Effective for Chakra Activation</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; Incense products have been used for centuries to create a sacred atmosphere, enhance meditation practices, and promote relaxation.But incense sticks, in particular, have become a popular choice due to their unique ability to support chakra activation.<br />●&nbsp; For example to activate you ajna chakra you can light these Tatvayog incense sticks - <a href=\"https://www.tatvayog.com/fragrance-of-chakras and practise meditation\">https://www.tatvayog.com/fragrance-of-chakras and practise meditation</a>.&nbsp;<br />●&nbsp; When burned, incense sticks release fragrant smoke that can have a powerful effect on the body and mind.<br />●&nbsp; The act of burning incense can also be a ritualistic and meditative practice in and of itself.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Tatvayog Incense: A Leading Brand for Chakra Activation</h3>\r\n<p style=\"text-align: justify;\">Tatvayog Incense offers a range of unique incense blends specifically designed to support chakra activation and promote spiritual well-being. Each blend is crafted using high-quality herbs, oils, and resins, combined in precise ratios to create a powerful scent that supports each chakra.&nbsp;</p>\r\n<p style=\"text-align: justify;\">For example, their Muladhara blend is designed to activate the root chakra and promote grounding, while their Ajna blend promotes intuition and clarity of thought. Let\'s have a look at the different chakras of the human body and the Tatvayog chakra fragrances.&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Different types of chakras and how to unlock them with the Tatayog fragrance of chakras collection.</strong></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">1.&nbsp;&nbsp;Muladhara Chakra - Root Chakra</h3>\r\n<p style=\"text-align: justify;\">Muladhara chakra is the first energy center in the body, located at the base of the spine. To unlock it, engage in grounding practices like meditation, deep breathing, and physical exercises such as yoga. Meditate while lighting up our root chakra incense sticks and experience its soothing aroma. You can buy now at - <a href=\"https://www.tatvayog.com/fragrance-of-chakras/natural-success-incense-sticks%20\">https://www.tatvayog.com/fragrance-of-chakras/natural-success-incense-sticks</a></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">2.&nbsp;&nbsp;Swadhisthana Chakra - Sacral Chakra</h3>\r\n<p style=\"text-align: justify;\">Swadhisthana chakra is the second energy center in the body, located in the lower abdomen. To unlock it, engage in activities that promote creativity, such as painting, dancing, or writing. Meditation, chanting, and incorporating the color orange can also activate Swadhisthana chakra. You can light Tatvayog incense sticks and breathe in its chakra cleansing aroma. Click here to buy now - <a href=\"https://www.tatvayog.com/fragrance-of-chakras/sacred-aura-incense-sticks\">https://www.tatvayog.com/fragrance-of-chakras/sacred-aura-incense-sticks</a></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">3.&nbsp;&nbsp;Manipura Chakra - Solar Plexus Chakra</h3>\r\n<p style=\"text-align: justify;\">Manipura chakra, the third energy center, can be activated using incense sticks by focusing on the yellow flame. Sit in a comfortable position, light the incense, and inhale its aroma while visualizing a vibrant, spinning yellow energy at the navel area. This chakra governs personal power, confidence, and transformation. The incense sticks appease the destinies that control fame, power and growth. Tatvayog incense sticks play a crucial role in helping to unlock chakras. You can click here to buy now <a href=\"https://www.tatvayog.com/fragrance-of-chakras/radiating-power-incense-sticks\">https://www.tatvayog.com/fragrance-of-chakras/radiating-power-incense-sticks</a>.</p>\r\n<h3 style=\"text-align: justify;\"><br />4.&nbsp;&nbsp;Anahata Chakra - Heart Chakra</h3>\r\n<p style=\"text-align: justify;\">To activate the Anahata chakra, the fourth energy center, sit in a peaceful environment and light the incense. Focus on the rising smoke while placing your attention on the heart area. Breathe deeply, envisioning a glowing green light expanding and radiating love, compassion, and harmony. The Anahata chakra governs love, empathy, and spiritual connection. These fragrance sticks ensure that dharma, compassion and faith keep blossoming in your heart. Click here to buy now - <a href=\"https://www.tatvayog.com/fragrance-of-chakras/divine-love-anahata-chakra\">https://www.tatvayog.com/fragrance-of-chakras/divine-love-anahata-chakra</a></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">5.&nbsp;&nbsp;Visuddha Chakra - Throat Chakra</h3>\r\n<p style=\"text-align: justify;\">To activate the Visuddha chakra, the fifth energy center, sit in a quiet space and focus on the throat area. Chanting \"ham\" or \"om\" can help activate this chakra. Visualize a bright blue light emanating from the throat, expressing clear communication, creativity, and self-expression. Light up an incense stick to uplift the environment and focus better. Tatvayog incense sticks are crafted with natural ingredients that help with the unlocking of the chakras easier. Buy now<a href=\"https://www.tatvayog.com/fragrance-of-chakras/pure-expression-incense-sticks\"> https://www.tatvayog.com/fragrance-of-chakras/pure-expression-incense-sticks</a></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">6.&nbsp;&nbsp;Ajna Chakra - Third Eye Chakra</h3>\r\n<p style=\"text-align: justify;\">Cleanse your aura and uplift your mood with Tatvayog Ajna incense sticks. To activate the Ajna chakra, the sixth energy center, find a calm space and sit with closed eyes. Focus on the space between the eyebrows. Practice deep, slow breathing while visualizing a vibrant indigo light. Engage in meditation, intuition-enhancing practices, and cultivate inner wisdom. The Ajna chakra represents intuition, insight, and inner vision. Buy now at <a href=\"https://www.tatvayog.com/fragrance-of-chakras/blissful-awakening-incense-sticks\">https://www.tatvayog.com/fragrance-of-chakras/blissful-awakening-incense-sticks</a></p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">7.&nbsp;&nbsp;Sahasrara Chakra - Crown Chakra</h3>\r\n<p style=\"text-align: justify;\">To activate the Sahasrara chakra, the crown energy center, meditate in a peaceful setting. Sit with an upright posture, close your eyes, and focus on the top of the head. Visualize a radiant violet or white light expanding from the crown, connecting with divine consciousness and spiritual awakening. Meditation is very important in opening up the chakras and what better way to do it with Tatvayog chakra activation incense sticks.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">How to Use Incense Sticks for Chakra Activation</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; To use incense sticks for chakra activation, it\'s important to choose the right blend for the chakra you wish to activate.<br />●&nbsp; Explore the range of incense sticks by Tatvayog that helps in chakra activation -&nbsp; https://www.tatvayog.com/fragrance-of-chakras. Now you can select the incense sticks based on the chakra you are looking to activate.<br />●&nbsp; You can then light the incense stick and let it burn for a few seconds before blowing out the flame.<br />●&nbsp; Place the incense stick in a holder and allow it to burn, filling the room with its fragrant smoke.<br />●&nbsp; As you inhale the scent, focus your attention on the chakra you wish to activate, imagining a warm and energizing light flowing through your body.<br />●&nbsp; There are different incense sticks available on Tatvayog website for different chakras.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h4 style=\"text-align: justify;\">Conclusion:</h4>\r\n<p style=\"text-align: justify;\">Overall, incense products play a vital role in unlocking chakras and promoting physical, emotional, and spiritual well-being.</p>\r\n<p style=\"text-align: justify;\">By using incense sticks specifically designed for chakra activation, such as those offered by Tatvayog, you can support the healthy flow of energy throughout your body and experience a deeper sense of relaxation, clarity, and spiritual connectedness. Click here to order now <a href=\"https://www.tatvayog.com/fragrance-of-chakras\">https://www.tatvayog.com/fragrance-of-chakras</a></p>',1,1,'http://localhost/project/CakePHP/soil2soul/category-name-04/unlock-your-chakras:-the-power-of-incense-sticks-4','','Discover the power of Tatvayog incense sticks in unlocking chakras and promoting spiritual well-being. Learn how to use Tatvayog Incense to activate your chakras and support a healthy flow of energy throughout your body.','Incense Sticks, Chakra, Tatvayog, Chakra Activation, Spiritual Well-being','2023-08-02','2023-08-02 16:41:53','2024-02-08 15:16:51'),
(5,1,14,4,'Unveiling the Rituals: Significance of Puja Essentials in Hindu Worship\r\n\r\n','unveiling-the-rituals:-significance-of-puja-essentials-in-hindu-worship','http://tatvayog.epuratech.com//blogs/significance-puja-essentials-hindu-worship-5','Unveiling-the-Rituals-Significance-of-Puja-Essentials-in-Hindu-Worship.jpg','Unveiling-the-Rituals-Significance-of-Puja-Essentials-in-Hindu-Worship.jpg','Dive into the world of Hindu worship as we explore the significance of Puja essentials and their role in Tatvayog. Discover the rituals, puja kits, and the profound connection they establish in the sacred act of worship.','<p style=\"text-align: justify;\">Puja, the sacred act of worship in Hinduism, holds immense significance for devotees. Central to this ancient practice are the puja essentials, which play a vital role in establishing a connection between the devotee and the divine.</p>\r\n<p style=\"text-align: justify;\">From understanding the concept of Tatvayog and its meaning to exploring the various components of a puja kit, we unravel the deep-rooted customs and rituals associated with Hindu worship.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Essence of Tatvayog in Hindu Worship and its meaning</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; In Hinduism, Tatvayog refers to the union of the five elements (tatvas) - earth, water, fire, air, and space.<br />●&nbsp; It symbolizes the harmonious integration of these elements within oneself, connecting the individual with the divine consciousness.<br />●&nbsp; The name Tatvayog is carefully chosen to represent the brands identity and its significance with Hinduism.<br />●&nbsp;&nbsp;Tatvayog along with incense and dhoop sticks also offer puja essentials.<br />●&nbsp; The Significance of Puja essentials is determined by chosen items that hold symbolic significance and are integral to the puja ceremony.<br />●&nbsp; These essentials include items such as idols or images of deities, incense sticks, flowers, lamps, sacred water, and more. You can shop for them at <a href=\"https://www.tatvayog.com/puja-essentials\">https://www.tatvayog.com/puja-essentials</a><br />●&nbsp; Each item represents a unique aspect of the divine and contributes to the overall sanctity of the puja ritual.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Establishing Sacred Space with Puja Kit</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; A puja kit is a collection of puja essentials assembled in a single package, making it convenient for devotees to perform their worship rituals.<br />●&nbsp; The puja kit typically includes items such as a small deity idol, incense sticks, camphor, sacred thread, holy water, and a bell.<br />●&nbsp; The careful arrangement of these essentials ensures the creation of a sacred space, allowing the devotee to engage in a focused and serene worship experience.<br />●&nbsp; You can find all these items on Tatvayog website. You can just click this link https://www.tatvayog.com/puja-essentials and buy.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Rituals and Practices of Puja</h3>\r\n<p style=\"text-align: justify;\">●&nbsp;&nbsp;Puja rituals involve a structured sequence of actions performed in a particular order.<br />●&nbsp; It begins with purifying oneself through ablutions and wearing clean clothes.<br />●&nbsp; The devotee then sets up the puja space, lights incense sticks, offers flowers and food, and chants mantras.<br />●&nbsp; Each ritual has a specific purpose and meaning, fostering a deep connection with the divine.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Symbolism of Puja Essentials</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; Every puja essential embodies symbolic significance. The idol or image of the deity represents the divine presence, while Tatvayog incense sticks purify the air and create a pleasant aroma.<br />●&nbsp; Flowers symbolize purity and devotion, while lamps represent the divine light. The sacred water, known as \"tirtha,\" purifies the devotee\'s body and soul.<br />●&nbsp; Understanding the symbolism behind these essentials enhances the devotee\'s connection with the divine.<br />●&nbsp; Beyond the external rituals, puja serves as a means for inner transformation and spiritual growth.<br />●&nbsp; By engaging in puja practices regularly, one cultivates qualities such as devotion, gratitude, humility, and discipline.<br />●&nbsp; The focused attention on the puja essentials helps quiet the mind, enabling the devotee to experience a deep sense of peace and connection with the divine.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Puja: A Personal and Universal Experience</h3>\r\n<p style=\"text-align: justify;\">While puja is a personal act of worship, it also holds universal significance. It is a way for individuals to express their reverence and seek blessings from the divine.</p>\r\n<p style=\"text-align: justify;\">Puja rituals are performed in temples, homes, and sacred spaces, creating a sense of unity among the community of devotees. The puja essentials, with their rich symbolism and profound rituals, bridge the gap between the mortal and the divine, fostering a harmonious relationship between the individual and the cosmos.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h4 style=\"text-align: justify;\">Conclusion:</h4>\r\n<p style=\"text-align: justify;\">Puja essentials form the backbone of Hindu worship, encapsulating the spiritual essence and symbolic significance of the rituals. Through the puja kit and its carefully selected items, devotees establish a deep connection with the divine. The profound significance of puja essentials goes beyond the external rituals, allowing individuals to embark on an inner journey of transformation and spiritual growth. You can buy Tatvayog&rsquo;s latest puja kit collection now, visit (www.tatvayog.com/puja)</p>',1,0,'http://localhost/project/CakePHP/soil2soul/category-name-05/unveiling-the-rituals:-significance-of-puja-essentials-in-hindu-worship-5','','Dive into the world of Hindu worship as we explore the significance of Puja essentials and their role in Tatvayog. Discover the rituals, puja kits, and the profound connection they establish in the sacred act of worship. ','puja essentials, Puja Kit, Hindu Worship, Worship','2023-08-02','2023-08-02 16:46:50','2024-02-08 15:24:55'),
(6,1,15,6,'Creating a Sacred Atmosphere: Using Incense Sticks to Set the Mood for Meditation','creating-a-sacred-atmosphere:-using-incense-sticks-to-set-the-mood-for-meditation','http://tatvayog.epuratech.com//blogs/creating-a-sacred-atmosphere:-using-incense-sticks-to-set-the-mood-for-meditation-6','Creating-a-Sacred-Atmosphere-Using-Incense-Sticks.jpg','Creating-a-Sacred-Atmosphere-Using-Incense-Sticks.jpg','Discover the transformative power of incense sticks in creating a sacred atmosphere for meditation. Explore the enchanting fragrances of India and learn how incense sticks from Ekaa can help elevate your meditation practice.','<h1 style=\"text-align: justify;\"><span style=\"color: #993366;\">Harness the Power of Fragrance: Enhance Your Meditation Experience with Incense Sticks!</span></h1>\r\n<p style=\"text-align: justify;\">Meditation is a powerful practice that allows us to quiet the mind, connect with our inner selves, and experience profound states of peace and tranquility. Creating a sacred atmosphere is essential to enhance the meditation experience and foster a sense of calm and focus.</p>\r\n<p style=\"text-align: justify;\">In this article, we explore the transformative power of Tatvayog\'s incense sticks, also known as agarbatti, in setting the mood for meditation. Discover the beauty of the fragrance of India collection by Tatvayog and experience the profound effects of using incense sticks in your meditation practice. Click this link to check out the collection - https://www.tatvayog.com/fragrance-of-india<br /><br /></p>\r\n<h3 style=\"text-align: justify;\">The Significance of a Sacred Space</h3>\r\n<p style=\"text-align: justify;\">Creating a sacred space for meditation is paramount to cultivate an environment that supports deep introspection and spiritual growth. Explore the importance of a sacred atmosphere in meditation:<br />●&nbsp; Tranquility and Stillness: A sacred space promotes a sense of calm and stillness, enabling us to detach from external distractions and turn our focus inward.<br />●&nbsp; Energy and Intentions: By infusing the space with positive energy and setting intentions, we create a conducive environment for deep meditation and self-reflection.</p>\r\n<h3 style=\"text-align: justify;\"><br />The Transformative Power of Incense Sticks</h3>\r\n<p style=\"text-align: justify;\">Incense sticks have been used for centuries to enhance the meditation experience. Tatvayog\'s incense sticks, part of the fragrance of India collection, offer a range of exquisite scents designed to elevate the mood and create a sacred atmosphere. Discover the transformative power of incense sticks in meditation:</p>\r\n<p style=\"text-align: justify;\">●&nbsp; Aromatherapy Benefits: Incense sticks emit fragrances that have a direct impact on our emotions and mental state. The scents from Tatvayog\'s incense sticks are carefully curated to promote relaxation, focus, and spiritual upliftment.</p>\r\n<p style=\"text-align: justify;\">●&nbsp; Engaging the Senses: The captivating aroma of incense sticks engages our sense of smell, helping to anchor our attention and deepen our focus during meditation.<br /><br /></p>\r\n<h3 style=\"text-align: justify;\">Exploring Tatvayog\'s Incense Stick Collection</h3>\r\n<p style=\"text-align: justify;\">Tatvayog offers a diverse range of incense sticks as part of their Fragrance of India collection. Delve into the exquisite scents and discover the perfect incense sticks to create a sacred atmosphere for your meditation practice:</p>\r\n<p style=\"text-align: justify;\">●&nbsp;Ekaa: Ekaa is a premium collection associated with Tatvayog, making incense sticks made from natural ingredients and infused with divine fragrances. Each scent is carefully crafted to evoke specific emotions and spiritual energies. Check out the Ekaa collection now - https://www.tatvayog.com/fragrance-of-india<br />●&nbsp; The Ekaa collection has five unique flavours.<br />●&nbsp; The \"Sandalwood Incense Sticks\" bring a rich, woody scent that promotes mental clarity and enhances spiritual practices.<br />●&nbsp; For a rejuvenating experience, \"Jasmine Incense Sticks\" fill the air with a sweet floral fragrance, known to uplift moods and instill a sense of positivity.<br />●&nbsp; To invigorate your senses, \"Rose Incense Sticks\" offer a romantic and soothing aroma that fosters self-love and emotional healing.<br />●&nbsp;&nbsp;Eka incense sticks embody the qualities of purity and devotion. Discover eternal peace with Eka. &ldquo;Musk Incense Sticks&rdquo; Made with the aromas of the deep forest.<br />●&nbsp;&nbsp;IFRA Certified Incense sticks with a soothing aroma, the &ldquo;Kewra Incense Sticks&rdquo; is a must-have for anyone looking to declutter their thoughts and relax.</p>\r\n<p style=\"text-align: justify;\">Tatvayog Fragrance of India Incense Sticks offer a sensory journey, combining these exquisite flavors to create an ambiance that uplifts the mind, body, and soul.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Setting the Mood for Meditation</h3>\r\n<p style=\"text-align: justify;\">To create a sacred atmosphere for meditation, consider the following steps:</p>\r\n<p style=\"text-align: justify;\">●&nbsp; Clearing the Space: Begin by decluttering and cleaning the meditation area, removing any distractions or negative energy.<br />●&nbsp; Intentions and Affirmations: Set clear intentions and affirmations for your meditation practice, aligning them with your spiritual goals and aspirations.<br />●&nbsp; Lighting the Incense Stick: Select an incense stick from Tatvayog\'s collection that resonates with your intentions. Light the incense stick and allow the fragrant smoke to fill the space, creating a serene ambiance.<br /><br /></p>\r\n<h3 style=\"text-align: justify;\">Embracing the Sacredness of Meditation</h3>\r\n<p style=\"text-align: justify;\">With the sacred atmosphere created, immerse yourself in your meditation practice and embrace the transformative power it holds:</p>\r\n<p style=\"text-align: justify;\">● Centering and Grounding: Use the fragrant aroma from the incense stick as a focal point for your attention, allowing it to guide you into a state of centeredness and grounding.</p>\r\n<p style=\"text-align: justify;\">● Deepening the Experience: The fragrance of the incense stick can serve as a gentle reminder to bring your attention back tothe present moment whenever your mind wanders. Embrace the aroma and let it deepen your meditation experience.<br /><br /></p>\r\n<h4 style=\"text-align: justify;\">Conclusion:</h4>\r\n<p style=\"text-align: justify;\">By using Tatvayog\'s incense sticks, you can create a sacred atmosphere that supports deep meditation and spiritual growth. The transformative power of these fragrances from the fragrance of India collection can enhance your meditation practice, bringing relaxation, focus, and a sense of divine presence.</p>\r\n<p style=\"text-align: justify;\">Embrace the beauty of incense sticks and allow their captivating scents to transport you to a place of inner peace and tranquility. With Tatvayog\'s incense sticks, you can elevate your meditation practice and cultivate a sacred space that nurtures your spiritual journey. Click here to explore their collection - https://www.tatvayog.com/</p>\r\n<p>&nbsp;</p>',1,0,'http://localhost/project/CakePHP/soil2soul/category-name-06/creating-a-sacred-atmosphere:-using-incense-sticks-to-set-the-mood-for-meditation-6','','Discover the transformative power of incense sticks in creating a sacred atmosphere for meditation. Explore the enchanting fragrances of India and learn how incense sticks from Ekaa can help elevate your meditation practice.','sacred atmosphere, Incense Sticks, meditation practice, tatvayogs incense, tatvayogs incense sticks','2023-08-02','2023-08-02 16:50:09','2024-02-08 15:15:56'),
(7,1,10,7,'Exploring the Importance of Yantras: Unveiling the Sacred Symbols','exploring-the-importance-of-yantras:-unveiling-the-sacred-symbols','http://tatvayog.epuratech.com//blogs/exploring-the-importance-of-yantras:-unveiling-the-sacred-symbols-7','Exploring-the-Importance-of-Yantras-Unveiling-the-Sacred-Symbols.jpg','Exploring-the-Importance-of-Yantras-Unveiling-the-Sacred-Symbols.jpg','Journey into the realm of spiritual symbols as we delve into the profound importance of Yantras in worship. Explore the divine energy embodied by Tatvayog\'s Yantras, including the Gayatri Yantra, Kailash Dhan Rashak Yantra, Katyayani Yantra,Hanuman Yantra, etc. Unlock the transformative power of these sacred symbols to enhance your spiritual practice and connect with the cosmic energies.','<h1><span style=\"color: #993366;\">Unleash the Power Within: Discover the Significance of Yantras in Worship and Harness their Energy with Tatvayog</span></h1>\r\n<p style=\"text-align: justify;\">Yantras are ancient mystical symbols that hold immense spiritual significance in various traditions. These geometric diagrams serve as powerful tools for meditation, manifestation, and spiritual awakening.</p>\r\n<p style=\"text-align: justify;\">In this article, we delve into the importance of Yantras and explore their transformative potential. Tatvayog, a trusted brand associated with spiritual enlightenment, offers a range of Yantras that bring blessings, protection, and abundance into our lives.</p>\r\n<h3 style=\"text-align: justify;\">Understanding the Essence of Yantras</h3>\r\n<p style=\"text-align: justify;\">Yantras are sacred geometric symbols that represent specific deities, energies, or intentions. They are visual representations of spiritual concepts and serve as focal points for meditation and worship.</p>\r\n<h3 style=\"text-align: justify;\"><br />Explore the significance of Yantras and their role in spiritual practices:</h3>\r\n<p style=\"text-align: justify;\"><strong>Sacred Geometry:</strong> Yantras are constructed using precise geometric patterns that carry specific energetic vibrations. These patterns create a harmonious resonance with the cosmic energies, facilitating spiritual connection and transformation.<br /> <br /><strong>Manifestation and Intentions:</strong> Yantras are utilized to manifest desires, attract positive energies, and align with specific intentions. By meditating on a Yantra, one can enhance focus, clarity, and the manifestation of desired outcomes.</p>\r\n<h3 style=\"text-align: justify;\"><br />Exploring Tatvayog\'s Yantras Collection</h3>\r\n<p style=\"text-align: justify;\">Tatvayog offers a range of powerful Yantras that bring blessings and abundance into our lives.</p>\r\n<p style=\"text-align: justify;\"><strong>Let\'s explore a few notable Yantras and their significance:</strong></p>\r\n<p style=\"text-align: justify;\"><strong>1. Gayatri Yantra:</strong> The Gayatri Yantra is a revered symbol associated with the goddess Gayatri, who embodies wisdom, knowledge, and spiritual enlightenment. This Yantra aids in invoking the divine qualities of wisdom and illumination, guiding seekers towards inner transformation.<br /><br /><strong>2. Dhan Akarshan Yantra:</strong> The Dhan Akarshan Yantra is designed to attract wealth, prosperity, and abundance into one\'s life. By meditating on this Yantra and setting intentions for financial growth, one can align themselves with the energies of prosperity and attract material abundance.<br /> <br /><strong>3. Pitru Dosh Nivaran Yantra:</strong> The Pitru Dosh Nivaran Yantra is a powerful tool to resolve ancestral karma and seek blessings from ancestors. This Yantra helps in mitigating the negative effects of ancestral imbalances, fostering ancestral healing, and bringing harmony to one\'s lineage.<br /><br /><strong>4. Kailash Dhan Rashak Yantra:</strong> The Kailash Dhan Rashak Yantra is associated with Lord Shiva and is believed to bring protection, peace, and blessings. This Yantra acts as a shield against negative energies, purifies the environment, and promotes spiritual growth.<br /><br />To buy these yantras and get more details about them you can check out https://www.tatvayog.com/yantras. They also have a variety of other Yantras that you can buy and put to use!<br /><br /></p>\r\n<h3 style=\"text-align: justify;\"><span style=\"color: #000000;\">Harnessing the Power of Yantras</span></h3>\r\n<p style=\"text-align: justify;\">To harness the power of Yantras, it is important to understand how to work with them effectively:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Proper Placement:</strong> Yantras should be placed in clean and sacred spaces, such as altars or meditation areas. The energy of the space enhances the Yantra\'s effectiveness and supports the practitioner\'s spiritual journey.<br /><br /><strong>2. Activation and Energization:</strong> Yantras need to be activated and energized to align them with the desired intentions and cosmic energies. This can be done through rituals, prayers, and recitation of relevant mantras.<br /> <br /><strong>3. Meditation and Contemplation:</strong> Meditating on a Yantra allows one to dive deep into its symbolism, invoking the corresponding energies within. By focusing on the Yantra\'s intricate patterns and visualizing its essence, one can experience profound spiritual insights and inner transformation.</p>\r\n<h3 style=\"text-align: justify;\"><br />Embracing the Transformative Power of Yantras</h3>\r\n<p style=\"text-align: justify;\">Yantras hold the potential to awaken our inner divinity, manifest intentions, and bring blessings into our lives. By incorporating Yantras into our spiritual practices, we can embrace their transformative power:<br /><br /><strong>1. Meditation and Spiritual Growth:</strong> Yantras serve as gateways to deep meditation and spiritual growth. By meditating on a Yantra, one can access higher states of consciousness, receive divine guidance, and experience inner transformation.<br /> <br /><strong>2. Manifestation and Abundance:</strong> Yantras can be utilized to manifest desires and attract abundance into various aspects of life. By aligning with the specific energies represented by the Yantra, one can amplify intentions and manifest positive outcomes.<br /> <br /><strong>3. Protection and Blessings:&nbsp;</strong>Yantras act as potent shields against negative energies and offer divine protection. They bring blessings from specific deities or energies, fostering a sense of security, harmony, and spiritual well-being.</p>\r\n<h4 style=\"text-align: justify;\"><br />Conclusion:</h4>\r\n<p style=\"text-align: justify;\">Yantras are sacred symbols that hold immense power and significance in spiritual practices.</p>\r\n<p style=\"text-align: justify;\">Tatvayog\'s collection of Yantras offers a transformative journey towards spiritual growth, manifestation, and divine connection. By incorporating Yantras into our meditation, worship, and manifestation practices, we can unlock their transformative potential and experience profound blessings, protection, and abundance in our lives.</p>\r\n<p style=\"text-align: justify;\">Embrace the power of Yantras by Tatvayog and embark on a spiritual journey of self-discovery, empowerment, and divine awakening. Buy now at https://www.tatvayog.com/yantras</p>',1,1,'http://localhost/project/CakePHP/soil2soul/spiritual-places/Exploring-the-Importance-of-Yantras:-Unveiling-the-Sacred-Symbols-7','','Journey into the realm of spiritual symbols as we delve into the profound importance of Yantras in worship. Explore the divine energy embodied by Tatvayog\'s Yantras, including the Gayatri Yantra, Kailash Dhan Rashak Yantra, Katyayani Yantra,Hanuman Yantra, etc. Unlock the transformative power of these sacred symbols to enhance your spiritual practice and connect with the cosmic energies.','spiritual practice, power yantras, meditating yantra, Inner transformation, Spiritual yantra','2023-08-02','2023-08-02 16:56:04','2024-02-08 15:15:36'),
(8,1,10,1,'The Art of Aromatherapy: Exploring the Benefits of Incense Sticks','the-art-of-aromatherapy:-exploring-the-benefits-of-incense-sticks','http://tatvayog.epuratech.com//blogs/the-art-of-aromatherapy:-exploring-the-benefits-of-incense-sticks-8','The-Art-of-Aromatherapy-Exploring-the-Benefits-of-Incense-Sticks.jpg','The-Art-of-Aromatherapy-Exploring-the-Benefits-of-Incense-Sticks.jpg','Are you seeking a natural way to relax, rejuvenate, and create a serene atmosphere? \r\n\r\nLook no further than the world of aromatherapy, where the delightful fragrance of incense sticks can transport you to a place of tranquillity. Aromatherapy has been practised for centuries and has gained popularity for its therapeutic benefits. \r\n','<h1><span style=\"color: #993366;\">Unlock the Serenity and Healing Power of Fragrance</span></h1>\r\n<h2><span style=\"color: #000000;\">Introduction to Aromatherapy</span></h2>\r\n<p>●&nbsp; Aromatherapy, derived from the words \"aroma\" and \"therapy,\" involves the use of aromatic plant extracts to promote physical, mental, and emotional well-being.<br />●&nbsp; It harnesses the power of scents to enhance mood, reduce stress, and create a harmonious environment.<br />●&nbsp; One of the most popular and accessible forms of aromatherapy is through the use of incense sticks.</p>\r\n<p>&nbsp;</p>\r\n<h3><span style=\"color: #000000;\">The Fascination of Incense Sticks</span></h3>\r\n<p>●&nbsp; Incense sticks, also known as agarbatti, have been an integral part of various cultures, especially in India.<br />●&nbsp; They are crafted using a combination of natural ingredients, including fragrant woods, resins, and essential oils.<br />●&nbsp; When burned, incense sticks release aromatic smoke, filling the air with enchanting scents that captivate the senses.<br />●&nbsp;&nbsp;Tatvayogs incense sticks are 100% natural and IFRA certified, their latest EKAA collection is hand rolled. It is available in different natural flavours, making them the perfect collection.<br />●&nbsp;&nbsp;Tatvayog is renowned for its handcrafted incense sticks made with traditional Indian techniques and infused with natural scents.<br />●&nbsp; Their range includes captivating fragrances like Mogra (Jasmine), Chandan (Sandalwood), and Gulab (Rose), providing a touch of Indian heritage to your aromatherapy practice.<br />Click here to buy now - https://www.tatvayog.com/fragrance-of-india</p>\r\n<h1>&nbsp;<br /><span style=\"color: #993366;\">Let\'s have a look at Tatvayog&rsquo;s Ekaa collection!</span></h1>\r\n<h3><span style=\"color: #000000;\">1. Jasmine handcrafted and natural masala sticks (Ekaa Collection By Tatvayog)</span></h3>\r\n<p>Made with the delicate aroma of the beautiful white flowers, these incense sticks have the sweet and sublime single notes of the white Indian Jasmines that blossom in the wild. It is perfect for any occasion, especially meditation. You can inhale the sweet scent of jasmine and find yourself relaxing. You can buy these incense sticks now at https://www.tatvayog.com/fragrance-of-india?product_id=402</p>\r\n<p>&nbsp;</p>\r\n<h3>2. Kewra handcrafted and natural masala sticks (Ekaa Collection By Tatvayog)</h3>\r\n<p>Made in 5 essential oil aromas that aim to bring you closer to the eternal divinity and stir a sense of calm that evoke the experience of being one with it. This Eka variant carries the honeyed aroma of the Ganjam Kewra. Its fruity-floral and crisp, single note has a unique scent that fills any space with calm serenity. Its simplicity is what makes it special. You can buy it now at https://www.tatvayog.com/fragrance-of-india?product_id=403</p>\r\n<p>&nbsp;</p>\r\n<h3>3. Musk handcrafted and natural masala sticks (Ekaa Collection By Tatvayog)</h3>\r\n<p>Made with the aromas of the deep forest. This Eka variant carries the earthy, spicy, and woody scent of the wild. Its energising single note has a quality that evokes the devotional spirit. The fragrance of this incense intends to spread an awakening &ndash; &lsquo;Respect for Nature is Devotion to God&rsquo;. If you are someone who likes musky scent that this incense stick is for you! You can make a purchase now at - https://www.tatvayog.com/fragrance-of-india?product_id=401&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>4. Rose handcrafted and natural masala sticks (Ekaa Collection By Tatvayog)&nbsp;</h3>\r\n<p>Made with the sweet and enchanting smell of roses. These incense sticks are what you need if you love roses. It will lighten up the ambience and add a touch of sparkle to your days. Its scent does not overwhelm you but rather gently spreads its presence and permeates your senses with one emotion &ndash; Tranquillity. If you are looking for a flowery sweet scent then this incense stick is for you! You can directly click on this link to buy now - https://www.tatvayog.com/fragrance-of-india?product_id=404&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>5. Sandal handcrafted and natural masala sticks (Ekaa Collection By Tatvayog)</h3>\r\n<p>Made with the aroma of the soothing sandal. This Eka variant carries the distinct woody single-note aroma of the Indian Sandalwood. Its healing attributes make it a sacred ingredient for rituals and it serves as an aromatic reminder that divinity dwells within. It is perfect for pujas and rituals or to experience calmness during yoga. You can click here to buy now - https://www.tatvayog.com/fragrance-of-india?product_id=405</p>\r\n<p>&nbsp;</p>\r\n<p>With Tatvayog Fragrance of India, each incense stick flavor offers a distinct experience, inviting you to indulge in the aromatic bliss and benefit from its unique qualities.</p>\r\n<p>You can buy these flavours in individual packs or if you want to try the entire collection, you can go for the pack of 5, which has all the flavours. To make purchasing simpler for you, we are attaching the link to the product below - https://www.tatvayog.com/fragrance-of-india?product_id=406&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h1><span style=\"color: #993366;\">Benefits of Incense Sticks</span></h1>\r\n<h3>1. Enhancing Relaxation and Meditation&nbsp;</h3>\r\n<p>The soothing aroma of incense sticks helps create a calm and peaceful ambience, perfect for relaxation and meditation. - The act of lighting incense sticks can serve as a ritualistic cue.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>2. Stress Reduction&nbsp;</h3>\r\n<p>Certain scents, such as lavender and sandalwood, have been known to alleviate stress and promote a sense of calm. - The act of focusing on the aroma while inhaling deeply can help redirect thoughts and promote mindfulness.</p>\r\n<p>&nbsp;</p>\r\n<h3>3.&nbsp;Improving Sleep Quality</h3>\r\n<p>Fragrances like chamomile and jasmine have sleep-inducing properties, making incense sticks a valuable aid for those struggling with insomnia or irregular sleep patterns. - Burning incense sticks before bedtime creates a relaxing environment conducive to a peaceful night\'s sleep.</p>\r\n<p>&nbsp;</p>\r\n<h1><span style=\"color: #993366;\">Incorporating Incense Sticks into Daily Life</span></h1>\r\n<p>1. Creating a Soothing Home Environment - Light incense sticks in your living spaces to infuse a pleasant aroma and create a serene ambience. - Choose scents that resonate with you and align with the atmosphere you wish to cultivate, whether it\'s cosy and warm or fresh and invigorating.</p>\r\n<p>2. Meditation and Yoga Practice - Ignite incense sticks during your meditation or yoga sessions to enhance focus and relaxation. - Select scents like sandalwood, frankincense, or lavender to deepen your spiritual connection and promote a meditative state.</p>\r\n<p>●&nbsp; With their captivating fragrances and therapeutic properties, incense sticks offer a gateway to the world of aromatherapy.<br />●&nbsp; Whether you seek relaxation, stress relief, or a heightened sensory experience, the fragrance of India encapsulated in incense sticks can provide solace and tranquillity.<br />●&nbsp; Embrace the art of aromatherapy and allow the fragrant embrace of incense sticks to elevate your everyday life.<br />●&nbsp; As you delve into the world of incense sticks, embrace the transformative power of their scents and embrace the harmony and peace they bring. Let the enchanting aroma guide you on a path of serenity and well-being.<br />●&nbsp; Remember, the art of aromatherapy is an ongoing exploration, and each fragrance can unlock a unique experience.<br />●&nbsp; Embrace the journey and let the fragrance of incense sticks become an integral part of your life.</p>\r\n<p>&nbsp;</p>\r\n<p><strong>You can explore Tatvayogs incense collection on their website and make a purchase! Check out their various flavours today - https://www.tatvayog.com/fragrance-of-india</strong></p>',1,0,'http://localhost/project/CakePHP/soil2soul/spiritual-places/the-art-of-aromatherapy:-exploring-the-benefits-of-incense-sticks-8','','Discover the therapeutic wonders of aromatherapy with incense sticks. Explore the soothing scents, health benefits, and cultural significance of incense sticks, including renowned brands like Tatvayog. Learn how to incorporate these aromatic treasures into your daily life for enhanced well-being and tranquillity.','','2023-08-02','2023-08-02 17:01:46','2024-02-08 15:15:10'),
(9,1,11,3,'The Evil Eye in Fashion and Design: Stylishly Incorporating the Symbol for Protection in Rakhis','the-evil-eye-in-fashion-and-design:-stylishly-incorporating-the-symbol-for-protection-in-rakhis','http://tatvayog.epuratech.com//blogs/the-evil-eye-in-fashion-and-design:-stylishly-incorporating-the-symbol-for-protection-in-rakhis-8','The-Evil-Eye-in-Fashion-and-Design.jpg','The-Evil-Eye-in-Fashion-and-Design.jpg','Uncover the fascinating fusion of fashion and tradition as we explore the incorporation of the Evil Eye symbol in Tatvayog Rakhis. Discover how this ancient symbol not only adds style to your wrist but also provides a powerful talisman of protection. Delve into the significance of the Evil Eye and learn how Tatvayog Rakhis forge a bond of love and safeguard against negative energies.','<h1 style=\"text-align: justify;\"><span style=\"color: #993366;\">Embrace Style and Tradition: Discover the Power of the Evil Eye Symbol in Tatvayog Rakhi\'s.&nbsp;</span></h1>\r\n<p style=\"text-align: justify;\">The evil eye symbol has long been recognized as a potent symbol of protection against negative energies and ill intentions. In recent years, this symbol has found its way into the realm of fashion and design, with its stylish incorporation in various accessories.</p>\r\n<p style=\"text-align: justify;\">In this article, we explore the significance of the evil eye symbol in fashion and design, particularly in the context of Rakhis.</p>\r\n<p style=\"text-align: justify;\">Tatvayog, a trusted brand associated with spiritual enlightenment, offers a range of Rakhis that stylishly incorporate the evil eye symbol, adding an element of protection to the cherished bond between siblings.</p>\r\n<h3 style=\"text-align: justify;\">Understanding the Symbolism of the Evil Eye</h3>\r\n<p style=\"text-align: justify;\">The evil eye symbol, known for its mesmerizing appearance, holds deep cultural and spiritual significance. Explore the symbolism of the evil eye and its association with protection:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Warding off Negative Energies:</strong> The evil eye is believed to possess the power to repel negative energies and protect against the malevolent intentions of others. It is regarded as a talisman of safeguarding and preserving well-being.<br /><br /><strong>2. Symbol of Awareness:</strong> The evil eye symbol serves as a reminder to stay vigilant and aware of one\'s surroundings. By acknowledging its presence, individuals can cultivate a sense of protection and ward off negativity.</p>\r\n<h3 style=\"text-align: justify;\"><br />The Significance of Rakhi and its Symbolic Bond</h3>\r\n<p style=\"text-align: justify;\">Rakhi, also known as Raksha Bandhan, is a cherished Hindu festival that celebrates the bond between brothers and sisters.</p>\r\n<p style=\"text-align: justify;\">Explore the symbolic significance of Rakhi and its connection with protection:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Promise of Protection:</strong> Rakhi symbolizes the sacred bond between siblings, with sisters tying a Rakhi thread around their brothers\' wrists. This act represents the brother\'s promise to protect and care for his sister.<br /> <br /><strong>2. Strengthening the Bond:</strong> Rakhi serves as a reminder of the unconditional love and support between siblings. It deepens the sense of belonging and fosters a lifelong bond built on trust and protection.</p>\r\n<h3 style=\"text-align: justify;\"><br />Stylishly Incorporating the Evil Eye in Rakhi\'s</h3>\r\n<p style=\"text-align: justify;\">In recent years, the evil eye symbol has become a fashionable and trendy design element. Tatvayog\'s collection of Rakhi\'s offers a stylish incorporation of the evil eye symbol, blending tradition with contemporary design:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Protection and Style:</strong> Tatvayog\'s Rakhi\'s artfully blend the traditional sacred thread with the evil eye symbol, creating a unique and fashionable accessory. These Rakhi\'s serve as a symbol of protection and make a stylish statement when worn.<br /><br /><strong>2. Symbolic Significance:</strong> By incorporating the evil eye symbol in Rakhi\'s, Tatvayog adds an extra layer of significance to the bond between siblings. It signifies not only the promise of protection but also the intention to ward off negative energies and bring blessings to the wearer.</p>\r\n<h3 style=\"text-align: justify;\"><br />Embracing the Protective Symbolism in Rakhi\'s</h3>\r\n<p style=\"text-align: justify;\">By choosing Rakhis that incorporate the evil eye symbol, siblings can embrace the protective symbolism and add a touch of style to their celebrations:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Enhancing the Bond:</strong> The evil eye symbol in Rakhi\'s strengthens the bond between siblings, reminding them of their commitment to protect and support one another. It serves as a visual representation of their shared love and care.<br /><br /><strong>2. Fashionable Expression:</strong>Tatvayog\'s Rakhi\'s allow individuals to express their personal style while honoring the traditional significance of Rakhi. The incorporation of the evil eye symbol adds a fashionable element to the celebration, making the Rakhi a trendy accessory to be cherished.</p>\r\n<h4 style=\"text-align: justify;\"><br />Conclusion:</h4>\r\n<p style=\"text-align: justify;\">The evil eye symbol, known for its protective qualities, has found its way into the world of fashion and design. By incorporating this symbol in Rakhis, Tatvayog offers a stylish and meaningful way to celebrate the bond between siblings. These Rakhis not only symbolize the promise of protection but also serve as fashionable accessories that add a touch of style to the celebration.</p>\r\n<p>&nbsp;</p>',1,1,'http://localhost/project/CakePHP/soil2soul/the-mindful-word/the-evil-eye-in-fashion-and-design:-stylishly-incorporating-the-symbol-for-protection-in-rakhis-9','','Uncover the fascinating fusion of fashion and tradition as we explore the incorporation of the Evil Eye symbol in Tatvayog Rakhis. Discover how this ancient symbol not only adds style to your wrist but also provides a powerful talisman of protection. Delve into the significance of the Evil Eye and learn how Tatvayog Rakhis forge a bond of love and safeguard against negative energies.','evil eye, evil eye symbol, Evil rakhi, Rakhi Fashion','2023-08-02','2023-08-02 17:01:54','2024-02-08 15:14:54'),
(10,1,12,4,'The Essence of the Bhagavad Gita: Its Teachings for Modern Living ','the-essence-of-the-bhagavad-gita:-its-teachings-for-modern-living','http://tatvayog.epuratech.com//blogs/the-essence-of-the-bhagavad-gita:-its-teachings-for-modern-living--10','The-Essence-of-the-Bhagavad-Gita.jpg','The-Essence-of-the-Bhagavad-Gita.jpg','Discover the profound teachings of Tatvayog\'s Bhagavad Gita and learn how its timeless wisdom can guide us in navigating the complexities of modern life. Explore the essence of this ancient scripture and gain valuable insights for a meaningful and fulfilling existence.','<p style=\"text-align: justify;\">The Bhagavad Gita, a revered Hindu scripture, has been hailed as a beacon of knowledge, guiding individuals on their spiritual journeys for centuries. In today\'s fast-paced and ever-changing world, the lessons contained within the Bhagavad Gita are as relevant as ever.</p>\r\n<p style=\"text-align: justify;\">In this article, we delve into the teachings of Tatvayog\'s Bhagavad Gita and explore its profound wisdom, offering insights for modern living.</p>\r\n<h3 style=\"text-align: justify;\">Understanding the Bhagavad Gita</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; The Bhagavad Gita, often referred to as the \"Gita,\" is a sacred text that encapsulates the essence of ancient Indian philosophy.<br />●&nbsp; By studying the Gita, we gain insights into the nature of existence, purpose, and the path to self-realization.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Core Teachings of Tatvayog\'s Bhagavad Gita</h3>\r\n<p style=\"text-align: justify;\">&nbsp;Tatvayog\'s Bhagavad Gita imparts invaluable lessons for navigating the complexities of modern living. These teachings provide guidance on various aspects of life, from personal growth to societal harmony.</p>\r\n<h4 style=\"text-align: justify;\"><br />Key principles include:</h4>\r\n<p style=\"text-align: justify;\"><strong>1.&nbsp;&nbsp;Dharma:</strong> Discovering one\'s righteous duties and obligations is a cornerstone of the Gita\'s teachings. By aligning our actions with our inherent nature and the greater good, we find fulfilment and contribute positively to society.</p>\r\n<p style=\"text-align: justify;\"><strong>2.&nbsp; Yoga:</strong> The Gita explains the path of yoga as a means to unite the body, mind, and spirit. It emphasises the importance of self-discipline, meditation, and self-awareness to attain spiritual enlightenment and inner peace.</p>\r\n<p style=\"text-align: justify;\"><strong>3.&nbsp; Karma:</strong> The concept of karma underscores the idea that our actions have consequences. The Gita teaches us to act selflessly, detached from the results, and to accept both success and failure with calmness.</p>\r\n<p style=\"text-align: justify;\"><strong>4.&nbsp; Detachment:</strong> The Gita encourages us to cultivate a state of detached involvement in our endeavours. By relinquishing attachment to the outcomes, we free ourselves from the burdens of anxiety and expectations, leading to greater clarity and peace of mind.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Relevance of the Bhagavad Gita in Modern Life</h3>\r\n<p style=\"text-align: justify;\">Despite being thousands of years old, the teachings of the Bhagavad Gita hold immense relevance in the modern era. The Gita equips us with the tools to overcome the challenges of our fast-paced, materialistic world:&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>1. Stress and Anxiety Management:</strong> By incorporating the Gita\'s teachings into our daily lives, we learn to manage stress, reduce anxiety, and find solace amidst chaos. Its wisdom helps us develop resilience and equanimity, enabling us to respond to challenges with composure.</p>\r\n<p style=\"text-align: justify;\"><strong>2. Ethical Decision-Making:</strong> The Gita\'s emphasis on moral values and righteous actions provides a moral compass for decision-making in our personal and professional lives. It encourages us to make choices that benefit both ourselves and society, fostering a harmonious existence.</p>\r\n<p style=\"text-align: justify;\"><strong>3. Inner Fulfillment:</strong> In an age where external achievements are often prioritized, the Bhagavad Gita reminds us of the importance of inner fulfillment. It teaches us to seek lasting happiness by connecting with our true selves, transcending the fleeting desires of material possessions.&nbsp;<br /><br /></p>\r\n<h3 style=\"text-align: justify;\">Applying the Teachings of Bhagavad Gita</h3>\r\n<p style=\"text-align: justify;\">Bhagavad Gita is not merely a theoretical discourse but a practical guide for modern living. By incorporating its teachings into our daily lives, we can experience profound personal transformation.</p>\r\n<p style=\"text-align: justify;\">Here are some ways to apply its wisdom:</p>\r\n<p style=\"text-align: justify;\"><strong>1.&nbsp; Regular Spiritual Practice:</strong> Cultivate a daily practice of meditation, self-reflection, and mindfulness to deepen your understanding of the Gita\'s teachings. This consistent effort will gradually bring about positive changes in your mindset and behavior.</p>\r\n<p style=\"text-align: justify;\"><strong>2.&nbsp; Self-Discovery and Self-Realization:</strong> Engage in introspection to understand your inherent strengths, weaknesses, and aspirations. Align your actions with your values, seeking self-realization and purpose in every aspect of your life.</p>\r\n<p style=\"text-align: justify;\"><strong>3.&nbsp; Service to Others:</strong> Embrace selfless service as a means to express compassion and contribute to the well-being of others. The Gita teaches us that acts of kindness and generosity not only benefit others but also uplift our own consciousness.<br /><br /></p>\r\n<h3 style=\"text-align: justify;\">How can you order your own Bhagvad Gita by Tatvayog&nbsp;</h3>\r\n<p style=\"text-align: justify;\">Tatvayog, a trusted name in spiritual enlightenment, offers an illuminating interpretation of the ancient scripture Bhagvad Gita, making its teachings accessible and applicable to the challenges of contemporary life. Tatvayog is know for its spiritual products in the market. From Incense Sticks to Yantras, Tatvayog has it all. You can check out their variety of products by clicking this link - https://www.tatvayog.com/</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h4 style=\"text-align: justify;\">Gift the Knowledge of Bhagvad Gita to your loved ones:</h4>\r\n<p style=\"text-align: justify;\">You can easily order their products along with their mini Bhagvad Gita that comes with a wooden case. It is the perfect gift for yourself or your family and friends who are looking to attain enlightenment. You can check it out here - https://www.tatvayog.com/knowledge</p>\r\n<p style=\"text-align: justify;\">The Bhagavad Gita, as interpreted by Tatvayog, serves as a guiding light in our quest for a meaningful and purposeful existence. Its teachings offer timeless wisdom that transcends cultural and temporal boundaries, providing valuable insights into the complexities of modern living. By incorporating the Gita\'s principles into our lives, we can navigate the challenges of the present with grace, resilience, and profound inner peace.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h4 style=\"text-align: justify;\">Conclusion:</h4>\r\n<p style=\"text-align: justify;\">Bhagavad Gita presents a transformative journey of self-discovery and spiritual growth, relevant to individuals from all walks of life. Its teachings serve as a compass in the modern era, empowering us to lead purposeful lives, foster harmonious relationships, and find inner fulfillment. By delving into this ancient scripture, we unlock the timeless wisdom that continues to inspire and guide us on the path to self-realization in the present day. You can buy now at https://www.tatvayog.com/knowledge</p>',1,0,'http://localhost/project/CakePHP/soil2soul/top-10-post/the-essence-of-the-bhagavad-gita:-its-teachings-for-modern-living-10','','Discover the profound teachings of Tatvayog\'s Bhagavad Gita and learn how its timeless wisdom can guide us in navigating the complexities of modern life. Explore the essence of this ancient scripture and gain valuable insights for a meaningful and fulfilling existence.','bhagavad gita, tatvayog bhagavad gita, teachings tatvayog bhagavad, bhagavad gita','2023-08-02','2023-08-02 17:14:52','2024-02-08 15:23:15'),
(11,1,13,2,'Discover the Benefits of Jasmine Flavoured Aroma for Deep Meditation','discover-the-benefits-of-jasmine-flavoured-aroma-for-deep-meditation','http://tatvayog.epuratech.com//blogs/discover-the-benefits-of-jasmine-flavoured-aroma-for-deep-meditation-11','Discover-the-Benefits-of-Jasmine-Flavored.jpg','Discover-the-Benefits-of-Jasmine-Flavored.jpg','Unveil the transformative power of jasmine-flavored aroma in deep meditation as Tatvayog explores the synergistic blend of meditation, yoga, and the enchanting fragrance of India. Experience the soothing effects of Ekaa\'s Jasmine aroma and elevate your meditation practice to new heights.','<p style=\"text-align: justify;\">Meditation is a powerful practice that allows us to connect with our inner selves, find peace, and cultivate a state of deep relaxation. The addition of aromatic fragrances can enhance the meditation experience, creating a harmonious environment that facilitates focus and tranquility.</p>\r\n<p style=\"text-align: justify;\">In this article, Tatvayog explores the benefits of incorporating jasmine-flavored aroma into deep meditation, shedding light on the transformative synergy of meditation, yoga, and the enchanting fragrance of India collection.&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Understanding the Essence of Meditation</h3>\r\n<p style=\"text-align: justify;\">Meditation is a centuries-old practice that originated in ancient civilizations. It involves cultivating mindfulness and directing one\'s focus inward, fostering a sense of calm and clarity.</p>\r\n<p style=\"text-align: justify;\">Tatvayog delves into the essence of meditation, highlighting its numerous physical, mental, and spiritual benefits.</p>\r\n<p style=\"text-align: justify;\">&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Power of Aromatherapy in Meditation</h3>\r\n<p style=\"text-align: justify;\">Aromatherapy is a holistic healing practice that utilizes the power of scents to enhance well-being. When integrated with meditation, aromatherapy can deepen the practice and elevate the overall experience.</p>\r\n<p style=\"text-align: justify;\">Explore the transformative effects of incorporating fragrances into meditation and unlock their potential to support focus, relaxation, and spiritual growth.</p>\r\n<p style=\"text-align: justify;\"><strong>1. Fragrance as a Gateway:</strong> Fragrances have the unique ability to transport us to a different state of mind. By incorporating a specific scent, such as jasmine, into meditation, we create a sensory trigger that helps us transition into a calm and centered state more easily.</p>\r\n<p style=\"text-align: justify;\"><strong>2. Enhancing Concentration:</strong> Aromas like jasmine can help improve focus and concentration during meditation. The captivating scent of jasmine can serve as an anchor, redirecting our wandering thoughts back to the present moment and facilitating a deeper state of mindfulness.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Enchanting Fragrance of Jasmine</h3>\r\n<p style=\"text-align: justify;\">Jasmine, part of the Ekaa collection from the \"Fragrance of India,\" is a cherished flower renowned for its captivating scent. Ekaa, a trusted product associated with Tatvayog, offers a range of jasmine-flavored aromas specifically designed to enhance meditation and elevate the senses. Explore the unique qualities of jasmine and its transformative effects on the meditation experience.</p>\r\n<p style=\"text-align: justify;\"><strong>1. Calming and Soothing:</strong> Jasmine\'s sweet and floral aroma has calming properties that help relax the mind and body. It creates an atmosphere of tranquility, reducing stress and promoting a sense of serenity conducive to deep meditation.<br /><br /><strong>2. Spiritual Upliftment:</strong> Jasmine is often associated with spirituality and higher consciousness. Its fragrance has been used for centuries to invoke a sense of connection with the divine and elevate the spiritual experience during meditation.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">The Benefits of Jasmine-Flavored Aroma in Meditation</h3>\r\n<p style=\"text-align: justify;\">Incorporating jasmine-flavored aroma into meditation offers a range of benefits, enhancing the overall practice and deepening the experience. Embrace the transformative effects of Ekaa\'s Jasmine aroma as you explore its advantages:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Relaxation and Stress Relief:</strong> The soothing scent of jasmine helps release tension, promoting relaxation and stress relief. It creates an environment that encourages the release of negative emotions and facilitates a deeper sense of calm and tranquility.<br /><br /><strong>2. Heightened Sensory Experience:</strong> The addition of jasmine-flavored aroma to meditation enhances the sensory experience, engaging not only the mind but also the sense of smell. This heightened sensory awareness can deepen the connection with the present moment and intensify the overall meditation practice.&nbsp;</p>\r\n<p style=\"text-align: justify;\">Ready to embark on a transformative meditation journey with the enchanting fragrance of jasmine? Discover practical tips for integrating jasmine-flavored aroma into your meditation practice:</p>\r\n<p style=\"text-align: justify;\"><strong>Choose the Right Aroma:</strong> Select a high-quality jasmine-flavored aroma, such as Ekaa\'s Jasmine fragrance, known for its authenticity and purity. Ensure that the aroma complements your personal preferences and resonates with your meditation goals.<br /><br /><strong>Create a Sacred Space:</strong> Designate a dedicated meditation space and infuse it with the aroma of jasmine. Create a serene atmosphere with soft lighting, comfortable seating, and soothing music to enhance the overall experience.<br /><br /><strong>Intention Setting:&nbsp;</strong>Before beginning your meditation, set a clear intention or focus for your practice. Visualize the jasmine fragrance enveloping you, bringing tranquility, clarity, and spiritual upliftment.<br />&nbsp;</p>\r\n<h4 style=\"text-align: justify;\">Conclusion:</h4>\r\n<p style=\"text-align: justify;\">By integrating the enchanting fragrance of jasmine into your meditation practice, you can elevate your experience to new heights.</p>\r\n<p style=\"text-align: justify;\">Tatvayog, invites you to explore the transformative power of jasmine-flavored aroma and unlock the full potential of deep meditation. Experience the calming, spiritual, and uplifting effects of jasmine as you embark on a journey of self-discovery, inner peace, and profound relaxation. To explore the Ekaa collection click here - https://www.tatvayog.com/fragrance-of-india</p>',1,0,'http://localhost/project/CakePHP/soil2soul/category-name-04/discover-the-benefits-of-jasmine-flavoured-aroma-for-deep-meditation-11','','Unveil the transformative power of jasmine-flavored aroma in deep meditation as Tatvayog explores the synergistic blend of meditation, yoga, and the enchanting fragrance of India. Experience the soothing effects of Ekaa\'s Jasmine aroma and elevate your meditation practice to new heights.','jasmine Falvoured Aroma, Jasmine Aroma, aroma deep meditation, Meditation Experience','2023-08-02','2023-08-02 17:40:45','2024-02-08 15:14:13'),
(12,1,14,1,'The Importance of Worshipping with Tatvayog Incense Sticks','the-importance-of-worshipping-with-tatvayog-incense-sticks','http://tatvayog.epuratech.com/blogs/the-importance-of-worshipping-with-tatvayog-incense-sticks-12','The-Importance-of-Worshiping.jpg','The-Importance-of-Worshiping.jpg','Discover the significance of worshipping with Tatvayog\'s exquisite incense sticks, as we delve into the transformative power of agarbatti and the divine fragrance they bring. Experience the sacredness of worship and create a divine ambiance with the fragrances of God from Tatvayog.','<p style=\"text-align: justify;\">Worship is a sacred practise that connects us with the divine and nurtures our spiritual journey. In this article, we explore the importance of worshipping with Tatvayog\'s incense sticks, also known as agarbatti.</p>\r\n<p style=\"text-align: justify;\">These exquisite fragrant sticks not only elevate the aesthetic appeal of the worship space but also create an atmosphere conducive to spiritual awakening and divine connection.</p>\r\n<p style=\"text-align: justify;\">Join us as we dive into the transformative power of incense sticks and the significance they hold in worship.<br /><br /></p>\r\n<h3>The Divine Fragrance of Incense Sticks</h3>\r\n<p style=\"text-align: justify;\">●&nbsp; Incense sticks have been an integral part of religious and spiritual rituals for centuries.<br />●&nbsp; Their captivating fragrances have the power to transport us to a state of heightened awareness and evoke a sense of the sacred.<br />●&nbsp;&nbsp;Tatvayog\'s incense sticks are carefully crafted to produce the fragrance of God, elevating the worship experience to a higher realm.&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Tatvayog Fragrance of Gods collection</h3>\r\n<p style=\"text-align: justify;\">Tatvayog has come up with a new sacred collection of incense and dhoop sticks that have a divine fragrance. The ingredients are all natural and it smells heavenly. These sticks are IFRA-certified and their smell can calm your senses instantly. These fragrances are carefully crafted for each god keeping in mind their favourite scents and ingredients.</p>\r\n<h3 style=\"text-align: justify;\">Let\'s have a look at a few incense sticks from this collection.</h3>\r\n<p style=\"text-align: justify;\"><strong>1. ADISHAKTI</strong></p>\r\n<p style=\"text-align: justify;\">A fascinating fragrance of courageous black pepper for fearless action (karma) on the foundation of almond (willpower) arising from worship of abundant roses, freesia and iris for cosmic wisdom (jnana). Realize your potential with aroma sticks for Adishakti.<br /><br /></p>\r\n<p style=\"text-align: justify;\"><strong>2. AISHWARYA LAKSHMI</strong>&nbsp;</p>\r\n<p style=\"text-align: justify;\">Welcome the magnificent Goddess Lakshmi with an abundant essence that combines her beloved pure fertile lotus, pristine tuberose, harmonizing pink pepper, majestically delightful pomegranate, graceful rose petals and royal saffron gold coins.<br /><br /></p>\r\n<p style=\"text-align: justify;\"><strong>3. AKSHOBHYA BUDDHA</strong>&nbsp;</p>\r\n<p style=\"text-align: justify;\">Experience pure tranquillity. An infinite ocean-wide love through pineapple and bergamot that&rsquo;s bright as sunshine and pure as supreme knowledge. Breathe in and breathe out the scents of these aromatic sticks and find yourself relaxing.<br />&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>4. KRISHNA LEELA</strong>&nbsp;&nbsp;</p>\r\n<p style=\"text-align: justify;\">Make this a part of your Krishna puja items. Invoke the charming One, with an enchanting essence that brings together His adored osmanthus, jasmine buds and rose petals. Receive his eternal love with his favourite puja items. These incense sticks will help you connect with the divine one.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Creating an Ambiance of Sacredness</h3>\r\n<p style=\"text-align: justify;\">Incense sticks play a vital role in creating an ambience of sacredness during worship.</p>\r\n<p style=\"text-align: justify;\">Explore the various aspects that make incense sticks an essential component of the worship space:</p>\r\n<p style=\"text-align: justify;\"><strong>Purification:</strong> The fragrant smoke emanating from incense sticks is believed to cleanse and purify the environment. It helps remove negative energies, creating a pure and sacred space for worship.<br /><br /><strong>Aesthetic Appeal:</strong> Incense sticks add visual beauty to the worship area, enhancing the overall ambience. The gentle wafts of smoke rising from the burning sticks create a serene and mystical atmosphere, invoking a sense of reverence.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Symbolism and Significance</h3>\r\n<p style=\"text-align: justify;\">Incense sticks hold deep symbolism and significance in religious and spiritual practices. They represent offerings to the divine and serve as a medium of communication with the higher realms. Delve into the symbolic aspects of incense sticks in worship:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Invocation:</strong> Burning incense sticks symbolize the invocation of the divine presence. The fragrant smoke is believed to carry prayers, chants, and devotions to the heavenly realms, establishing a connection with the divine.<br /><br /><strong>2. Purification and Blessings:</strong> Incense sticks are often associated with purification rituals. Their fragrance is believed to purify the worshiper\'s body, mind, and spirit, while also attracting divine blessings and grace.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Enhancing Focus and Meditation</h3>\r\n<p style=\"text-align: justify;\">Worship is not just an act of offering prayers; it is also a practice that cultivates mindfulness and deepens our spiritual connection. Discover how incense sticks enhance focus and meditation during worship:</p>\r\n<p style=\"text-align: justify;\"><strong>1. Sensory Stimulation:</strong> The aroma of incense sticks engages the sense of smell, captivating our senses and redirecting our focus to the present moment. This sensory stimulation aids in grounding and creating a focused mindset for worship and meditation.<br /><br /><strong>2. Calming Effect:</strong> The fragrance emitted by incense sticks has a calming effect on the mind and body. It helps create a tranquil environment, allowing for a deeper state of relaxation and meditation.<br /><br /><strong>3. Divine Connections:</strong> Different fragrances are associated with different deities and spiritual energies. For example, the scent of Ganesha incense sticks can be used to invoke the blessings and guidance of Lord Ganesha. Choose incense sticks that align with the divine energies you wish to connect with during worship.<br /><br /><strong>4. Quality and Purity:&nbsp;</strong>Ensure that the incense sticks you choose are made from high-quality natural ingredients, free from harmful chemicals. Tatvayog\'s incense sticks are crafted with utmost care and purity, offering a divine fragrance experience.<br />&nbsp;</p>\r\n<h3 style=\"text-align: justify;\">Conclusion:</h3>\r\n<p style=\"text-align: justify;\">Worshipping with Tatvayog\'s incense sticks is an enriching experience that enhances the sacredness of rituals and fosters a deep connection with the divine. The transformative power of agarbatti can elevate your worship practice, creating an atmosphere of spirituality and divine presence.</p>\r\n<p style=\"text-align: justify;\">Embrace the fragrances of God and infuse your worship space with the captivating scents from Tatvayog, allowing your spiritual journey to unfold in an environment of reverence and grace. Order now on - https://www.tatvayog.com/</p>',1,1,'http://localhost/project/CakePHP/soil2soul/category-name-05/the-importance-of-worshipping-with-tatvayog-incense-sticks-12','','Discover the significance of worshipping with Tatvayog\'s exquisite incense sticks, as we delve into the transformative power of agarbatti and the divine fragrance they bring. Experience the sacredness of worship and create a divine ambiance with the fragrances of God from Tatvayog.','Incense Sticks, Divine Fragrance, tatvayog incense sticks, Worship Sacred','2023-08-10','2023-08-02 17:56:09','2024-02-08 15:10:34'),
(13,1,15,1,'Sacred Rakhi\'s and Their Purposes - Exploring the Significance of Rakhi Celebrations in India','sacred-rakhi\'s-and-their-purposes---exploring-the-significance-of-rakhi-celebrations-in-india','http://tatvayog.epuratech.com/blogs/sacred-rakhi\'s-and-their-purposes---exploring-the-significance-of-rakhi-celebrations-in-india-13','Sacred-Rakhi\'s-and-Their-Purposes.jpg','Sacred-Rakhi\'s-and-Their-Purposes.jpg','Rakhi, also known as Raksha Bandhan, is a joyous festival celebrated in India, symbolizing the eternal bond of love and protection between siblings. The sacred thread, or rakhi, holds deep spiritual significance and is a testament to the unbreakable connection shared between brothers and sisters.','<h1><span style=\"color: #993366;\">Understanding the Significance of Rakhi</span></h1>\r\n<p><br />Rakhi is a celebration of love, unity, and protection. Its roots can be traced back to ancient times, steeped in mythology and historical legends. Tatvayog, a trusted name in spiritual enlightenment, delves into the essence of Rakhi, shedding light on its significance beyond the surface-level traditions.</p>\r\n<h3><br />The Symbolism of the Sacred Thread</h3>\r\n<p>The rakhi, or sacred thread, is the centerpiece of Rakhi celebrations. It symbolizes the strong bond between siblings and serves as a tangible reminder of the promise of protection. Exploring the symbolism of the rakhi reveals its deeper meaning and spiritual essence.</p>\r\n<p><strong>1. Love and Affection:</strong> The rakhi represents the unconditional love and affection shared between siblings. It is a symbol of the eternal connection that transcends time and distance, strengthening the bond between brothers and sisters.<br /><br /><strong>2. Protection:</strong> Tying the rakhi on the brother\'s wrist is a symbolic gesture of protection. The brother, in turn, pledges to safeguard his sister\'s well-being and offer support in times of need. This act highlights the sense of security and care that exists within the sibling relationship.</p>\r\n<h3>Traditions and Rituals of Rakhi</h3>\r\n<p>Rakhi is more than just tying a thread; it encompasses a range of rituals and customs that add depth to the celebration. These traditions foster a sense of unity, gratitude, and joy among family members.&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<h3>Key rituals and customs include:</h3>\r\n<p><strong>1. Preparation and Purity:</strong> Before tying the rakhi, both the sister and brother partake in a cleansing ritual, purifying themselves physically and spiritually. This ritual signifies the importance of starting the celebration with a pure heart and mind.<br /><br /><strong>2. Offering of Sweets and Gifts:</strong> As a gesture of love and appreciation, sisters offer sweets and gifts to their brothers. These offerings symbolize the exchange of blessings and convey the sentiment of goodwill and prosperity.<br /><br /><strong>3. Aarti and Prayers:</strong> Sisters perform aarti, a ceremonial offering of light, accompanied by prayers for the well-being and protection of their brothers. This ritual holds a deep spiritual significance, invoking divine blessings and auspiciousness.</p>\r\n<h3>The Emotional Essence of Rakhi</h3>\r\n<p>Beyond the rituals and traditions, Rakhi carries profound emotional significance. It strengthens the bond between siblings and serves as a reminder of unconditional love and support.&nbsp;<br /><br /></p>\r\n<h4>The festival embodies several emotional aspects:</h4>\r\n<p><strong>1. Sibling Love and Unity:</strong> Rakhi celebrates the unique and irreplaceable bond between siblings. It serves as an occasion to express gratitude, reminisce about shared memories, and reinforce the love that siblings hold for one another.<br /><br /><strong>2. Promoting Harmony and Forgiveness:</strong> Rakhi encourages forgiveness and reconciliation. It offers an opportunity for siblings to let go of past grievances and start afresh, fostering harmonious relationships and nurturing familial bonds.</p>\r\n<h3>Rakhi\'s Universal Message of Love</h3>\r\n<p>While Rakhi is deeply rooted in Indian culture and tradition, its underlying message of love, protection, and unity transcends boundaries. This festival teaches valuable lessons that can be embraced by people of all backgrounds and walks of life:</p>\r\n<p><strong>1. Strengthening Relationships:</strong> Rakhi serves as a reminder to cherish and nurture all meaningful relationships in our lives, not just those between siblings. It encourages us to express love, gratitude, and support to those who hold a special place in our hearts.<br /><br /><strong>2. Universal Brotherhood:</strong> Rakhi exemplifies the universal brotherhood that binds humanity together. It emphasizes the importance of love, compassion, and protection for all individuals, transcending societal divisions and promoting a sense of unity.</p>\r\n<p>To keep up with the festive spirit Tatvayog has come up with a rakhi collection with beautiful and unique designs to choose from. To strength the bond between the siblings they have introduced the concept of making your own rakhi which comes in 4 designs. Lets have a look at the designs -&nbsp;</p>\r\n<h3><br />1. GANESHA RAKHI</h3>\r\n<p>GANESHA means \" VIGHNAHARTA \" The Protector, and since the festival is about protection, this will make up the perfect rakhi. Ganesha rakhi, featuring Lord Ganesha, symbolizes wisdom, prosperity, and the removal of obstacles. This rakhi represents auspiciousness, strength, and the belief that Ganesha\'s presence will guide and bless the wearer on their life\'s journey.</p>\r\n<h3>2. HANUMAN RAKHI</h3>\r\n<p>Hanuman rakhi, depicting Lord Hanuman, embodies devotion, courage, and strength. Hanuman is revered as the epitome of loyalty and selflessness. This rakhi signifies the bond of protection and signifies the wearer\'s connection with Hanuman, seeking his blessings for bravery, wisdom, and the overcoming of obstacles in life.<br /><br /></p>\r\n<h3>3. SHIVA RAKHI</h3>\r\n<p>Shiva rakhi, showcasing Lord Shiva, represents transcendence, power, and divine consciousness. Shiva is the embodiment of destruction and creation, symbolizing the cycle of life. This rakhi signifies the wearer\'s devotion to Shiva, seeking his blessings for inner peace, spiritual growth, and liberation from worldly attachments.<br /><br /></p>\r\n<h3>4. EVIL EYE RAKHI&nbsp;</h3>\r\n<p>Evil eye rakhi, featuring the protective evil eye symbol, wards off negative energy and ill will. It is believed to safeguard the wearer from envy, misfortune, and evil intentions. This rakhi represents the belief in spiritual protection and serves as a talisman to ensure the wearer\'s well-being, happiness, and good luck.</p>\r\n<p><br />Tatvayog\'s exploration of Rakhi reveals the profound symbolism and emotional essence that underlies this beloved festival. Beyond the sacred thread and traditional rituals, Rakhi celebrates the unbreakable bond between siblings and fosters a spirit of love, protection, and unity. By understanding the deeper meanings behind Rakhi, we can embrace its universal message and cultivate stronger relationships, fostering a world infused with love, compassion, and harmony.</p>\r\n<p>&nbsp;</p>\r\n<p><img src=\"/project/CakePHP/soil2soul/files/tinymce_uploads/ourjourneys_img04.jpg\" alt=\"\" /></p>',1,1,'http://localhost/project/CakePHP/soil2soul/category-name-06/sacred-rakhi\'s-and-their-purposes---exploring-the-significance-of-rakhi-celebrations-in-india-13','Sacred Rakhi\'s and Their Purposes - Exploring the Significance of Rakhi Celebrations in India','Discover the profound meaning behind the celebration of Rakhi in India, as Tatvayog explores the significance of the sacred thread and the traditions associated with this beloved festival. Explore the spiritual and emotional aspects that make Rakhi a cherished occasion of love and protection.','sacred thread, Rakhi festival, rakhi tradition, Rakhi Brother, Rakhi Siblings','2023-12-21','2023-08-02 18:19:00','2024-02-08 12:17:20');

/*Table structure for table `blogs_blog_tags` */

DROP TABLE IF EXISTS `blogs_blog_tags`;

CREATE TABLE `blogs_blog_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) DEFAULT NULL,
  `blog_tag_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `blogs_blog_tags` */

insert  into `blogs_blog_tags`(`id`,`blog_id`,`blog_tag_id`,`created`,`modified`) values 
(1,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(2,1,5,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(3,13,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(4,13,2,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(5,13,3,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
(6,13,5,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*Table structure for table `booking_facilities` */

DROP TABLE IF EXISTS `booking_facilities`;

CREATE TABLE `booking_facilities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;

/*Data for the table `booking_facilities` */

insert  into `booking_facilities`(`id`,`name`,`class`,`image_file`,`active`,`created`,`modified`) values 
(1,'Scholar Led','affordablejourneysbox','scholar_led.png',1,'2024-01-18 12:38:14','2024-03-07 10:33:57'),
(2,'Immersive Daily Programs','guidedexperiencesbox','daily_programs.png',1,'2024-01-18 12:40:22','2024-02-23 14:14:43'),
(3,'Inner Transformation','accomodationbox','inner_transformation.png',1,'2024-01-19 15:14:44','2024-02-23 14:13:13'),
(4,'Daily Yoga and Meditation Practises','bestvalueitinerarybox','daily_yoga.png',1,'2024-01-19 15:17:19','2024-02-23 14:13:25'),
(5,' Luxurious Touring Facility','responsibletourismbox','luxurious_touring.png',1,'2024-01-19 15:17:43','2024-02-23 14:13:36'),
(6,'Culture of India','guestsupportbox','culture_india.png',1,'2024-01-19 15:18:09','2024-02-23 14:13:48');

/*Table structure for table `contact_enqueries` */

DROP TABLE IF EXISTS `contact_enqueries`;

CREATE TABLE `contact_enqueries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `msg` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf32;

/*Data for the table `contact_enqueries` */

insert  into `contact_enqueries`(`id`,`token`,`first_name`,`last_name`,`contact_no`,`email`,`msg`,`created`,`modified`) values 
(1,NULL,'Moin','Shaikh','8850860719','moin@gmail.com','This is for Test .','2024-01-25 10:44:41','2024-01-25 10:44:41'),
(2,NULL,'Prachi','Chotu','9870848260','prachi@gmail.com','This is for Test .','2024-01-25 11:19:50','2024-01-25 11:19:50'),
(3,NULL,'Prachi','Chotu','9870848260','prachi@gmail.com','This is for Test .','2024-01-25 11:20:06','2024-01-25 11:20:06'),
(4,NULL,'Prachi','Chotu','9870848260','prachi@gmail.com','This is for Test .','2024-01-25 11:20:46','2024-01-25 11:20:46'),
(5,NULL,'Prachi','Chotu','9870848260','prachi@gmail.com','This is for Test .','2024-01-25 11:21:29','2024-01-25 11:21:29'),
(6,NULL,'Prachi','Chotu','9870848260','prachi@gmail.com','This is for Test .','2024-01-25 11:22:37','2024-01-25 11:22:37'),
(7,NULL,'Prachi','Khobragade','9870848260','prachi@puratech.in','This is for Test .','2024-01-25 11:24:18','2024-01-25 11:24:18'),
(8,NULL,'Shehzad','Shehzad','8989279606','shehzad215@gmail.com','This is for test ','2024-04-15 12:15:45','2024-04-15 12:15:45'),
(9,'0499ea','Mukesh','Khanna','8989279606','mukesh@puratech.in','THis is for test','2024-04-15 14:08:52','2024-04-15 14:08:52');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` int(10) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alpha_2_code` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alpha_3_code` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `calling_code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_num_length` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='https://en.wikipedia.org/wiki/ISO_3166-1\nhttps://en.wikipedia.org/wiki/List_of_country_calling_codes';

/*Data for the table `countries` */

insert  into `countries`(`id`,`zone_id`,`name`,`alpha_2_code`,`alpha_3_code`,`calling_code`,`phone_num_length`,`active`,`created`,`modified`) values 
(1,NULL,'Afghanistan','AF','AFG','+93',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:59:49'),
(2,NULL,'Albania','AL','ALB','+355',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:35:23'),
(3,NULL,'Algeria','DZ','DZA','+213',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:35:40'),
(4,NULL,'American Samoa','AS','ASM','+1684',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:36:02'),
(5,NULL,'Andorra','AD','AND','+376',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:36:17'),
(6,NULL,'Angola','AO','AGO','+244',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:00:32'),
(7,NULL,'Anguilla','AI','AIA','+1264',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:43:04'),
(8,NULL,'Antarctica','AQ','ATA','0',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:00:58'),
(9,NULL,'Antigua And Barbuda','AG','ATG','+1268',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:01:36'),
(10,NULL,'Argentina','AR','ARG','+54',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:01:15'),
(11,NULL,'Armenia','AM','ARM','+374',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:02:01'),
(12,NULL,'Aruba','AW','ABW','+297',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:03:40'),
(13,NULL,'Australia','AU','AUS','+61',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:41:15'),
(14,NULL,'Austria','AT','AUT','+43',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:41:46'),
(15,NULL,'Azerbaijan','AZ','AZE','+994',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:42:07'),
(16,NULL,'Bahamas The','BS','BHS','+1242',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:42:27'),
(17,NULL,'Bahrain','BH','BHR','+973',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:43:24'),
(18,NULL,'Bangladesh','BD','BGD','+880',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:44:06'),
(19,NULL,'Barbados','BB','BRB','1246',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:44:21'),
(20,NULL,'Belarus','BY','BLR','+375',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:44:44'),
(21,NULL,'Belgium','BE','BEL','+32',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:45:11'),
(22,NULL,'Belize','BZ','BLZ','+501',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:45:36'),
(23,NULL,'Benin','BJ','BEN','+229',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:45:54'),
(24,NULL,'Bermuda','BM','BMU','+1441',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:46:19'),
(25,NULL,'Bhutan','BT','BTN','+975',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:46:42'),
(26,NULL,'Bolivia','BO','BOL','+591',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:46:59'),
(27,NULL,'Bosnia and Herzegovina','BA','BIH','+387',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:47:17'),
(28,NULL,'Botswana','BW','BWA','+267',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:47:54'),
(29,NULL,'Bouvet Island','BV','','0',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:48:40'),
(30,NULL,'Brazil','BR','BRA','+55','11',0,'2016-06-14 11:04:51','2023-08-22 10:17:52'),
(31,NULL,'British Indian Ocean Territory','IO','IOT','+246',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:05:37'),
(32,NULL,'Brunei','BN','BRN','+673',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:50:39'),
(33,NULL,'Bulgaria','BG','BGR','+359',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:51:09'),
(34,NULL,'Burkina Faso','BF','BFA','+226',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:51:32'),
(35,NULL,'Burundi','BI','BDI','+257',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:52:03'),
(36,NULL,'Cambodia','KH','KHM','+855',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:52:25'),
(37,NULL,'Cameroon','CM','CMR','+237',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:52:42'),
(38,NULL,'Canada','CA','CAN','+1',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:53:26'),
(39,NULL,'Cape Verde','CV','CPV','+238',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:53:49'),
(40,NULL,'Cayman Islands','KY','CYM','+1345',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:54:16'),
(41,NULL,'Central African Republic','CF','CAF','+236',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:55:08'),
(42,NULL,'Chad','TD','TCD','+235',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:55:35'),
(43,NULL,'Chile','CL','CHL','+56',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:55:56'),
(44,NULL,'China','CN','CHN','+86','13',0,'2016-06-14 11:04:51','2023-08-22 10:17:08'),
(45,NULL,'Christmas Island','CX','CXR','+61',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:56:43'),
(46,NULL,'Cocos (Keeling) Islands','CC','CCK','+61',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:58:18'),
(47,NULL,'Colombia','CO','COL','+57',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:58:31'),
(48,NULL,'Comoros','KM','COM','+269',NULL,0,'2016-06-14 11:04:51','2022-04-29 11:58:05'),
(49,NULL,'Republic Of The Congo','CG','','+242',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:01:23'),
(50,NULL,'Democratic Republic Of The Congo','CD','COD','+243',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:00:51'),
(51,NULL,'Cook Islands','CK','COK','+682',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:01:18'),
(52,NULL,'Costa Rica','CR','CRI','+506',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:01:51'),
(53,NULL,'Cote D\'Ivoire (Ivory Coast)','CI','CIV','+225',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:03:05'),
(54,NULL,'Croatia (Hrvatska)','HR','HRV','385',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:03:41'),
(55,NULL,'Cuba','CU','CUB','+53',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:04:09'),
(56,NULL,'Cyprus','CY','CYP','+357',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:04:51'),
(57,NULL,'Czech Republic','CZ','CZE','+420',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:05:15'),
(58,NULL,'Denmark','DK','DNK','+45',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:05:40'),
(59,NULL,'Djibouti','DJ','DJI','+253',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:06:08'),
(60,NULL,'Dominica','DM','DMA','+1767',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:06:30'),
(61,NULL,'Dominican Republic','DO','DOM','+1809',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:07:00'),
(62,NULL,'East Timor','TL','TLS','+670',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:07:29'),
(63,NULL,'Ecuador','EC','ECU','+593',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:07:49'),
(64,NULL,'Egypt','EG','EGY','+20',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:08:10'),
(65,NULL,'El Salvador','SV','SLV','+503',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:08:29'),
(66,NULL,'Equatorial Guinea','GQ','GNQ','+240',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:09:25'),
(67,NULL,'Eritrea','ER','ERI','+291',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:14:18'),
(68,NULL,'Estonia','EE','EST','+372',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:14:37'),
(69,NULL,'Ethiopia','ET','ETH','+251',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:14:59'),
(70,NULL,'External Territories of Australia','XA','','+61',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:15:17'),
(71,NULL,'Falkland Islands','FK','FLK','+500',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:15:37'),
(72,NULL,'Faroe Islands','FO','FRO','+298',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:15:54'),
(73,NULL,'Fiji Islands','FJ','FJI','+679',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:16:14'),
(74,NULL,'Finland','FI','FIN','+358',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:16:32'),
(75,NULL,'France','FR','FRA','+33',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:16:50'),
(76,NULL,'French Guiana','GF','','+594',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:17:09'),
(77,NULL,'French Polynesia','PF','PYF','+689',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:17:33'),
(78,NULL,'French Southern Territories','TF','','0',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:15:02'),
(79,NULL,'Gabon','GA','GAB','+241',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:21:19'),
(80,NULL,'Gambia ','GM','GMB','+220',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:21:35'),
(81,NULL,'Georgia','GE','GEO','+995',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:21:59'),
(82,NULL,'Germany','DE','DEU','+49',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:22:15'),
(83,NULL,'Ghana','GH','GHA','+233',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:22:32'),
(84,NULL,'Gibraltar','GI','GIB','+350',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:22:50'),
(85,NULL,'Greece','GR','GRC','+30',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:23:09'),
(86,NULL,'Greenland','GL','GRL','+299',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:21:01'),
(87,NULL,'Grenada','GD','GRD','+1473',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:29:07'),
(88,NULL,'Guadeloupe','GP','','+590',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:28:41'),
(89,NULL,'Guam','GU','GUM','+1671',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:34:10'),
(90,NULL,'Guatemala','GT','GTM','+502',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:33:51'),
(91,NULL,'Guernsey and Alderney','XU','','+44',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:33:30'),
(92,NULL,'Guinea','GN','GIN','+224',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:33:04'),
(93,NULL,'Guinea-Bissau','GW','GNB','+245',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:31:43'),
(94,NULL,'Guyana','GY','GUY','+592',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:31:24'),
(95,NULL,'Haiti','HT','HTI','+509',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:37:39'),
(96,NULL,'Heard and McDonald Islands','HM','','0',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:37:58'),
(97,NULL,'Honduras','HN','HND','+504',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:38:15'),
(98,NULL,'Hong Kong S.A.R.','HK','HKG','+852',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:38:34'),
(99,NULL,'Hungary','HU','HUN','+36',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:38:49'),
(100,NULL,'Iceland','IS','ISL','+354',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:37:18'),
(101,NULL,'India','IN','IND','+91','10',1,'2016-06-14 11:04:51','2023-08-21 18:46:35'),
(102,NULL,'Indonesia','ID','IDN','+62',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:41:31'),
(103,NULL,'Iran','IR','IRN','+98',NULL,0,'2016-06-14 11:04:51','2023-03-30 10:55:06'),
(104,NULL,'Iraq','IQ','IRQ','+964',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:41:47'),
(105,NULL,'Ireland','IE','IRL','+353',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:42:04'),
(106,NULL,'Israel','IL','ISR','+972',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:42:22'),
(107,NULL,'Italy','IT','ITA','+39',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:41:15'),
(108,NULL,'Jamaica','JM','JAM','+1876',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:44:53'),
(109,NULL,'Japan','JP','JPN','+81',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:44:36'),
(110,NULL,'Jersey','JE','JEY','+44',NULL,0,'2016-06-14 11:04:51','2022-04-29 15:56:30'),
(111,NULL,'Jordan','JO','JOR','+962',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:44:03'),
(112,NULL,'Kazakhstan','KZ','KAZ','+7',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:46:00'),
(113,NULL,'Kenya','KE','KEN','+254',NULL,0,'2016-06-14 11:04:51','2022-04-29 12:45:45'),
(114,NULL,'Kiribati','KI','KIR','+686',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:00:39'),
(115,NULL,'Korea North','KP','PRK','+850',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:02:22'),
(116,NULL,'Korea South','KR','KOR','+82',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:01:34'),
(117,NULL,'Kuwait','KW','KWT','+965',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:02:40'),
(118,NULL,'Kyrgyzstan','KG','KGZ','+996',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:00:16'),
(119,NULL,'Laos','LA','LAO','+856',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:03:53'),
(120,NULL,'Latvia','LV','LVA','+371',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:03:37'),
(121,NULL,'Lebanon','LB','LBN','+961',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:06:46'),
(122,NULL,'Lesotho','LS','LSO','+266',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:07:09'),
(123,NULL,'Liberia','LR','LBR','+231',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:07:25'),
(124,NULL,'Libya','LY','LBY','+218',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:07:45'),
(125,NULL,'Liechtenstein','LI','LIE','+423',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:08:03'),
(126,NULL,'Lithuania','LT','LTU','+370',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:08:23'),
(127,NULL,'Luxembourg','LU','LUX','+352',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:06:31'),
(128,NULL,'Macau ','MO','MAC','+853',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:13:49'),
(129,NULL,'Macedonia','MK','MKD','+389',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:14:06'),
(130,NULL,'Madagascar','MG','MDG','+261',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:14:23'),
(131,NULL,'Malawi','MW','MWI','+265',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:14:40'),
(132,NULL,'Malaysia','MY','MYS','+60',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:14:57'),
(133,NULL,'Maldives','MV','MDV','+960',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:13:31'),
(134,NULL,'Mali','ML','MLI','+223',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:13:15'),
(135,NULL,'Malta','MT','MLT','+356',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:11:49'),
(136,NULL,'Man (Isle of)','XM','','+44',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:18:13'),
(137,NULL,'Marshall Islands','MH','MHL','+692',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:18:35'),
(138,NULL,'Martinique','MQ','','+596',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:18:54'),
(139,NULL,'Mauritania','MR','MRT','+222',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:17:12'),
(140,NULL,'Mauritius','MU','MUS','+230',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:16:56'),
(141,NULL,'Mayotte','YT','MYT','+269',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:22:00'),
(142,NULL,'Mexico','MX','MEX','+52',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:22:16'),
(143,NULL,'Micronesia','FM','FSM','+691',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:22:32'),
(144,NULL,'Moldova','MD','MDA','+373',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:22:50'),
(145,NULL,'Monaco','MC','MCA','+377',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:23:06'),
(146,NULL,'Mongolia','MN','MNG','+976',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:23:24'),
(147,NULL,'Montserrat','MS','MSR','+1664',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:21:43'),
(148,NULL,'Morocco','MA','MAR','+212',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:25:21'),
(149,NULL,'Mozambique','MZ','MOZ','+258',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:25:39'),
(150,NULL,'Myanmar','MM','MMR','+95',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:26:01'),
(151,NULL,'Namibia','NA','NAM','+264',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:25:01'),
(152,NULL,'Nauru','NR','NRU','+674',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:29:19'),
(153,NULL,'Nepal','NP','NPL','+977',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:29:39'),
(154,NULL,'Netherlands Antilles','AN','ANT','+599',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:29:57'),
(155,NULL,'Netherlands The','NL','NLD','+31',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:30:13'),
(156,NULL,'New Caledonia','NC','NCL','+687',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:30:34'),
(157,NULL,'New Zealand','NZ','NZL','+64',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:30:51'),
(158,NULL,'Nicaragua','NI','NIC','+505',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:31:09'),
(159,NULL,'Niger','NE','NER','+227',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:31:28'),
(160,NULL,'Nigeria','NG','NGA','+234',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:29:03'),
(161,NULL,'Niue','NU','NIU','+683',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:34:14'),
(162,NULL,'Norfolk Island','NF','','+672',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:33:53'),
(163,NULL,'Northern Mariana Islands','MP','MNP','+1670',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:33:34'),
(164,NULL,'Norway','NO','NOR','+47',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:33:04'),
(165,NULL,'Oman','OM','OMN','+968',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:36:57'),
(166,NULL,'Pakistan','PK','PAK','+92',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:37:14'),
(167,NULL,'Palau','PW','PLW','+680',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:37:32'),
(168,NULL,'Palestinian','PS','','+970',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:36:04'),
(169,NULL,'Panama','PA','PAN','+507',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:36:40'),
(170,NULL,'Papua new Guinea','PG','PNG','+675',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:40:03'),
(171,NULL,'Paraguay','PY','PRY','+595',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:39:38'),
(172,NULL,'Peru','PE','PER','+51',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:39:20'),
(173,NULL,'Philippines','PH','PHL','+63',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:39:04'),
(174,NULL,'Pitcairn Island','PN','PCN','64',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:43:11'),
(175,NULL,'Poland','PL','POL','+48',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:42:50'),
(176,NULL,'Portugal','PT','PRT','+351',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:42:16'),
(177,NULL,'Puerto Rico','PR','PRI','+1787',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:41:51'),
(178,NULL,'Qatar','QA','QAT','+974',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:44:41'),
(179,NULL,'Reunion','RE','REU','+262',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:45:01'),
(180,NULL,'Romania','RO','ROU','+40',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:44:21'),
(181,NULL,'Russia','RU','RUS','+70',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:46:55'),
(182,NULL,'Rwanda','RW','RWA','+250',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:46:40'),
(183,NULL,'Saint Helena','SH','SHN','+290',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:46:19'),
(184,NULL,'Saint Kitts And Nevis','KN','KNA','+1869',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:51:01'),
(185,NULL,'Saint Lucia','LC','LCA','+1758',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:50:35'),
(186,NULL,'Saint Pierre and Miquelon','PM','SPM','+508',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:49:43'),
(187,NULL,'Saint Vincent And The Grenadines','VC','VCT','+1784',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:49:12'),
(188,NULL,'Samoa','WS','WSM','+684',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:48:41'),
(189,NULL,'San Marino','SM','SMR','+378',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:56:46'),
(190,NULL,'Sao Tome and Principe','ST','STP','+239',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:57:07'),
(191,NULL,'Saudi Arabia','SA','SAU','+966',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:59:24'),
(192,NULL,'Senegal','SN','SEN','+221',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:57:34'),
(193,NULL,'Serbia','RS','SRB','+381',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:57:55'),
(194,NULL,'Seychelles','SC','SYC','+248',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:58:19'),
(195,NULL,'Sierra Leone','SL','SLE','+232',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:58:39'),
(196,NULL,'Singapore','SG','SGP','+65',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:59:02'),
(197,NULL,'Slovakia','SK','SVK','+421',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:56:23'),
(198,NULL,'Slovenia','SI','SVN','+386',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:56:01'),
(199,NULL,'Smaller Territories of the UK','XG','','+44',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:55:40'),
(200,NULL,'Solomon Islands','SB','SLB','+677',NULL,0,'2016-06-14 11:04:51','2022-04-29 13:50:38'),
(201,NULL,'Somalia','SO','SOM','+252',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:48:09'),
(202,NULL,'South Africa','ZA','ZAF','+27',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:47:12'),
(203,NULL,'South Georgia','GS','','0',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:46:28'),
(204,NULL,'South Sudan','SS','SSD','+211',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:45:44'),
(205,NULL,'Spain','ES','ESP','+34',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:44:55'),
(206,NULL,'Sri Lanka','LK','LKA','+94',NULL,0,'2016-06-14 11:04:51','2022-04-29 13:53:25'),
(207,NULL,'Sudan','SD','SDN','+249',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:44:09'),
(208,NULL,'Suriname','SR','SUR','+597',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:43:18'),
(209,NULL,'Svalbard And Jan Mayen Islands','SJ','SJM','+47',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:42:36'),
(210,NULL,'Swaziland','SZ','SWZ','+268',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:41:38'),
(211,NULL,'Sweden','SE','SWE','+46',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:40:24'),
(212,NULL,'Switzerland','CH','CHE','+41',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:39:42'),
(213,NULL,'Syria','SY','SYR','+963',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:38:52'),
(214,NULL,'Taiwan','TW','TWN','+886',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:38:12'),
(215,NULL,'Tajikistan','TJ','TJK','+992',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:37:13'),
(216,NULL,'Tanzania','TZ','TZA','+255',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:36:22'),
(217,NULL,'Thailand','TH','THA','66',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:35:18'),
(218,NULL,'Togo','TG','TGO','+228',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:34:25'),
(219,NULL,'Tokelau','TK','TKL','+690',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:33:03'),
(220,NULL,'Tonga','TO','TON','+676',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:32:16'),
(221,NULL,'Trinidad And Tobago','TT','TTO','+1868',NULL,0,'2016-06-14 11:04:51','2022-04-29 13:59:45'),
(222,NULL,'Tunisia','TN','TUN','+216',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:31:32'),
(223,NULL,'Turkey','TR','TUR','+90',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:30:48'),
(224,NULL,'Turkmenistan','TM','TKM','+7370',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:30:13'),
(225,NULL,'Turks And Caicos Islands','TC','TCA','+1649',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:29:32'),
(226,NULL,'Tuvalu','TV','TUV','+688',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:28:51'),
(227,NULL,'Uganda','UG','UGA','+256',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:28:05'),
(228,NULL,'Ukraine','UA','UKR','+380',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:27:02'),
(229,NULL,'United Arab Emirates','AE','ARE','+971',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:03:01'),
(230,NULL,'United Kingdom','GB','GBR','+44',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:26:03'),
(231,NULL,'United States','US','USA','1',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:25:21'),
(232,NULL,'United States Minor Outlying Islands','UM','','1',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:24:41'),
(233,NULL,'Uruguay','UY','URY','+598',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:24:04'),
(234,NULL,'Uzbekistan','UZ','UZB','+998',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:23:26'),
(235,NULL,'Vanuatu','VU','VUT','+678',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:23:01'),
(236,NULL,'Vatican City State (Holy See)','VA','VAT','+39',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:21:55'),
(237,NULL,'Venezuela','VE','VEN','+58',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:21:09'),
(238,NULL,'Vietnam','VN','VNM','+84',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:20:31'),
(239,NULL,'Virgin Islands (British)','VG','','+1284',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:19:43'),
(240,NULL,'Virgin Islands (US)','VI','','+1340',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:19:05'),
(241,NULL,'Wallis And Futuna Islands','WF','WLF','+681',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:18:19'),
(242,NULL,'Western Sahara','EH','ESH','+212',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:17:42'),
(243,NULL,'Yemen','YE','YEM','+967',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:16:56'),
(244,NULL,'Yugoslavia','YU','YUG','+38',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:16:20'),
(245,NULL,'Zambia','ZM','ZMB','+260',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:15:35'),
(246,NULL,'Zimbabwe','ZW','ZWE','+263',NULL,0,'2016-06-14 11:04:51','2022-04-29 14:13:58');

/*Table structure for table `currencies` */

DROP TABLE IF EXISTS `currencies`;

CREATE TABLE `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `iso_code` varchar(3) NOT NULL,
  `iso_code_num` varchar(3) NOT NULL,
  `sign` varchar(8) DEFAULT NULL,
  `blank` tinyint(1) NOT NULL DEFAULT '0',
  `format` tinyint(1) NOT NULL DEFAULT '0',
  `decimals` tinyint(1) unsigned DEFAULT NULL,
  `conversion_rate` decimal(13,6) NOT NULL,
  `display_on_frontend` tinyint(1) unsigned DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=209 DEFAULT CHARSET=utf8;

/*Data for the table `currencies` */

insert  into `currencies`(`id`,`name`,`iso_code`,`iso_code_num`,`sign`,`blank`,`format`,`decimals`,`conversion_rate`,`display_on_frontend`,`active`,`created`,`modified`) values 
(6,'Angolan kwanza','AOA','973','Kz',1,0,0,2.622012,0,0,'2015-11-04 10:16:41','2017-06-28 05:54:44'),
(7,'Argentine peso','ARS','032','$',1,0,0,0.258978,0,0,'2015-11-04 10:17:11','2017-06-28 05:54:44'),
(8,'Australian dollar','AUD','036','$',1,0,0,0.020808,1,0,'2015-11-04 10:17:50','2017-06-28 05:54:44'),
(9,'Aruban florin','AWG','533','ƒ',1,0,0,0.028254,0,0,'2015-11-04 10:18:17','2017-06-28 05:54:44'),
(10,'Azerbaijani manat','AZN','944','منات',1,0,0,0.026826,0,0,'2015-11-04 10:19:02','2017-06-28 05:54:44'),
(11,'Bosnia and Herzegovina convertible mark','BAM','977','KM',1,0,0,0.027234,0,0,'2015-11-04 10:19:37','2017-06-28 05:54:44'),
(12,'Barbados dollar','BBD','052','$',1,0,0,0.031620,0,0,'2015-11-04 10:26:16','2017-06-28 05:54:44'),
(13,'Bangladeshi taka','BDT','050','৳',1,0,0,1.274184,0,0,'2015-11-04 10:26:42','2017-06-28 05:54:44'),
(14,'Bulgarian lev','BGN','975','лв',1,0,0,0.027234,0,0,'2015-11-04 10:27:45','2017-06-28 05:54:44'),
(15,'Bahraini dinar','BHD','048','.د.ب',1,0,0,0.005916,0,0,'2015-11-04 10:28:28','2017-06-28 05:54:44'),
(16,'Burundian franc','BIF','108','Fr',1,0,0,27.371598,0,0,'2015-11-04 10:28:54','2017-06-28 05:54:44'),
(17,'Bermudian dollar','BMD','060','$',1,0,0,0.015810,0,0,'2015-11-04 10:29:55','2017-06-28 05:54:44'),
(18,'Brunei dollar','BND','096','$',1,0,0,0.021930,0,0,'2015-11-04 10:30:21','2017-06-28 05:54:44'),
(19,'Boliviano','BOB','068','Bs.',1,0,0,0.109242,0,0,'2015-11-04 10:30:44','2017-06-28 05:54:44'),
(21,'Brazilian real','BRL','986','R$',1,0,0,0.052326,0,0,'2015-11-04 10:31:59','2017-06-28 05:54:44'),
(22,'Bahamian dollar','BSD','044','$',1,0,0,0.015810,0,0,'2015-11-04 10:32:27','2017-06-28 05:54:44'),
(23,'Bhutanese ngultrum','BTN','064','Nu.',1,0,0,1.019898,0,0,'2015-11-04 10:32:49','2017-06-28 05:54:44'),
(24,'Botswana pula','BWP','072','P',1,0,0,0.160548,0,0,'2015-11-04 10:33:24','2017-06-28 05:54:44'),
(25,'Belarusian ruble','BYR','974','Br',1,0,0,317.638914,0,0,'2015-11-04 10:33:54','2017-06-28 05:54:44'),
(26,'Belize dollar','BZD','084','$',1,0,0,0.031620,0,0,'2015-11-04 10:34:25','2017-06-28 05:54:44'),
(27,'Canadian dollar','CAD','124','$',1,0,0,0.020808,1,0,'2015-11-04 10:34:46','2017-06-28 05:54:44'),
(28,'Congolese franc','CDF','976','Fr',1,0,0,23.546394,0,0,'2015-11-04 10:35:12','2017-06-28 05:54:44'),
(30,'Swiss franc','CHF','756','Fr',1,0,0,0.015198,0,0,'2015-11-04 10:41:33','2017-06-28 05:54:44'),
(32,'Unidad de Fomento','CLF','990','UF',1,0,0,0.000408,0,0,'2015-11-04 10:42:37','2017-06-28 05:54:44'),
(33,'Chilean peso','CLP','152','$',1,0,0,10.484172,0,0,'2015-11-04 10:42:57','2017-06-28 05:54:44'),
(34,'Chinese yuan','CNY','156','¥',1,0,0,0.107508,0,0,'2015-11-04 10:43:32','2017-06-28 05:54:44'),
(35,'Colombian peso','COP','170','$',1,0,0,47.745180,0,0,'2015-11-04 10:46:29','2017-06-28 05:54:44'),
(37,'Costa Rican colon','CRC','188','₡',1,0,0,9.024246,0,0,'2015-11-04 10:47:48','2017-06-28 05:54:44'),
(39,'Cuban peso','CUP','192','₱',1,0,0,0.015810,0,0,'2015-11-04 10:49:03','2017-06-28 05:54:44'),
(40,'Cape Verde escudo','CVE','132','$',1,0,0,1.542852,0,0,'2015-11-04 10:49:33','2017-06-28 05:54:44'),
(41,'Czech koruna','CZK','203','Kč',1,0,0,0.366078,0,0,'2015-11-04 10:49:55','2017-06-28 05:54:44'),
(42,'Djiboutian franc','DJF','262','Fr',1,0,0,2.821932,0,0,'2015-11-04 10:50:21','2017-06-28 05:54:44'),
(43,'Danish krone','DKK','208','kr',1,0,0,0.103428,0,0,'2015-11-04 10:50:58','2017-06-28 05:54:44'),
(44,'Dominican peso','DOP','214','$',1,0,0,0.747150,0,0,'2015-11-04 10:51:23','2017-06-28 05:54:44'),
(45,'Algerian dinar','DZD','012','دج',1,0,0,1.708092,0,0,'2015-11-04 10:51:55','2017-06-28 05:54:44'),
(46,'Egyptian pound','EGP','818','£',1,0,0,0.286722,0,0,'2015-11-04 10:54:00','2017-06-28 05:54:44'),
(47,'Eritrean nakfa','ERN','232','Nfk',1,0,0,0.242454,0,0,'2015-11-04 10:54:25','2017-06-28 05:54:44'),
(48,'Ethiopian birr','ETB','230','Br',1,0,0,0.366588,0,0,'2015-11-04 10:54:53','2017-06-28 05:54:44'),
(49,'Euro','EUR','978','€',1,0,0,0.013872,1,0,'2015-11-04 10:55:34','2017-06-28 05:54:44'),
(50,'Fiji dollar','FJD','242','$',1,0,0,0.032640,0,0,'2015-11-04 10:56:15','2017-06-28 05:54:44'),
(51,'Falkland Islands pound','FKP','238','£',1,0,0,0.012342,0,0,'2015-11-04 10:56:36','2017-06-28 05:54:44'),
(52,'Pound sterling','GBP','826','£',1,0,0,0.012342,1,0,'2015-11-04 10:57:27','2017-06-28 05:54:44'),
(53,'Georgian lari','GEL','981','ლ',1,0,0,0.038046,0,0,'2015-11-04 10:58:00','2017-06-28 05:54:44'),
(54,'Ghanaian cedi','GHS','936','₵',1,0,0,0.069768,0,0,'2015-11-04 10:58:27','2017-06-28 05:54:44'),
(55,'Gibraltar pound','GIP','292','£',1,0,0,0.012342,0,0,'2015-11-04 10:59:57','2017-06-28 05:54:44'),
(56,'Gambian dalasi','GMD','270','D',1,0,0,0.727464,0,0,'2015-11-04 11:00:29','2017-06-28 05:54:44'),
(57,'Guinean franc','GNF','324','Fr',1,0,0,143.246556,0,0,'2015-11-04 11:01:10','2017-06-28 05:54:44'),
(58,'Guatemalan quetzal','GTQ','320','Q',1,0,0,0.115872,0,0,'2015-11-04 11:01:44','2017-06-28 05:54:44'),
(59,'Guyanese dollar','GYD','328','$',1,0,0,3.286848,0,0,'2015-11-04 11:02:09','2017-06-28 05:54:44'),
(60,'Hong Kong dollar','HKD','344','$',1,0,0,0.123318,1,0,'2015-11-04 11:02:29','2017-06-28 05:54:44'),
(61,'Honduran lempira','HNL','340','L',1,0,0,0.370464,0,0,'2015-11-04 12:13:16','2017-06-28 05:54:44'),
(62,'Croatian kuna','HRK','191','kn',1,0,0,0.103122,0,0,'2015-11-04 12:13:38','2017-06-28 05:54:44'),
(63,'Haitian gourde','HTG','332','G',1,0,0,0.995112,0,0,'2015-11-04 12:14:00','2017-06-28 05:54:44'),
(64,'Hungarian forint','HUF','348','Ft',1,0,0,4.312254,0,0,'2015-11-04 12:14:22','2017-06-28 05:54:44'),
(65,'Indonesian rupiah','IDR','360','Rp',1,0,0,210.479244,0,0,'2015-11-04 12:14:57','2017-06-28 05:54:44'),
(66,'Israeli new shekel','ILS','376','₪',1,0,0,0.055488,0,0,'2015-11-04 12:15:33','2017-06-28 05:54:44'),
(67,'Indian rupee','INR','356','₹',1,0,0,1.000000,1,1,'2015-11-04 12:15:59','2017-06-28 05:54:44'),
(68,'Iraqi dinar','IQD','368','ع.د',1,0,0,18.336132,0,0,'2015-11-04 12:16:40','2017-06-28 05:54:44'),
(69,'Iranian rial','IRR','364','﷼',1,0,0,513.468816,0,0,'2015-11-04 12:17:04','2017-06-28 05:54:44'),
(70,'Icelandic króna','ISK','352','kr',1,0,0,1.632510,0,0,'2015-11-04 12:17:27','2017-06-28 05:54:44'),
(71,'Jamaican dollar','JMD','388','$',1,0,0,2.031432,0,0,'2015-11-04 12:17:53','2017-06-28 05:54:44'),
(72,'Jordanian dinar','JOD','400','دينار',1,0,0,0.011220,0,0,'2015-11-04 12:18:24','2017-06-28 05:54:44'),
(73,'Japanese yen','JPY','392','¥',1,0,0,1.772352,0,0,'2015-11-04 12:18:49','2017-06-28 05:54:44'),
(74,'Kenyan shilling','KES','404','Sh',1,0,0,1.638732,0,0,'2015-11-04 12:19:14','2017-06-28 05:54:44'),
(75,'Kyrgyzstani som','KGS','417','лв',1,0,0,1.088034,0,0,'2015-11-04 12:19:38','2017-06-28 05:54:44'),
(76,'Cambodian riel','KHR','116','៛',1,0,0,64.205736,0,0,'2015-11-04 12:20:03','2017-06-28 05:54:44'),
(77,'Comoro franc','KMF','174','Fr',1,0,0,6.852258,0,0,'2015-11-04 12:20:26','2017-06-28 05:54:44'),
(78,'North Korean won','KPW','408','₩',1,0,0,14.222676,0,0,'2015-11-04 12:20:49','2017-06-28 05:54:44'),
(79,'South Korean won','KRW','410','₩',1,0,0,18.057366,0,0,'2015-11-04 12:21:15','2017-06-28 05:54:44'),
(80,'Kuwaiti dinar','KWD','414','د.ك',1,0,0,0.004794,1,0,'2015-11-04 12:21:43','2023-03-14 14:16:15'),
(81,'Cayman Islands dollar','KYD','136','$',1,0,0,0.012954,0,0,'2015-11-04 12:22:03','2017-06-28 05:54:44'),
(82,'Kazakhstani tenge','KZT','398','₸',1,0,0,5.090412,0,0,'2015-11-04 12:22:27','2017-06-28 05:54:44'),
(83,'Lao kip','LAK','418','₭',1,0,0,129.560298,0,0,'2015-11-04 12:22:53','2017-06-28 05:54:44'),
(84,'Lebanese pound','LBP','422','ل.ل',1,0,0,23.830770,0,0,'2015-11-04 12:23:12','2017-06-28 05:54:44'),
(85,'Sri Lankan rupee','LKR','144','Rs',1,0,0,2.423418,0,0,'2015-11-04 12:23:40','2017-06-28 05:54:44'),
(86,'Liberian dollar','LRD','430','$',1,0,0,1.485426,0,0,'2015-11-04 12:23:58','2017-06-28 05:54:44'),
(87,'Lesotho loti','LSL','426','L',1,0,0,0.205326,0,0,'2015-11-04 12:24:22','2017-06-28 05:54:44'),
(88,'Libyan dinar','LYD','434','ل.د',1,0,0,0.021624,0,0,'2015-11-04 12:24:54','2017-06-28 05:54:44'),
(89,'Moroccan dirham','MAD','504','د.م.',1,0,0,0.154326,0,0,'2015-11-04 12:25:22','2017-06-28 05:54:44'),
(90,'Moldovan leu','MDL','498','L',1,0,0,0.287028,0,0,'2015-11-04 12:25:42','2017-06-28 05:54:44'),
(91,'Malagasy ariary','MGA','969','Ar',1,0,0,49.344642,0,0,'2015-11-04 12:27:04','2017-06-28 05:54:44'),
(92,'Macedonian denar','MKD','807','ден',1,0,0,0.857616,0,0,'2015-11-04 12:27:24','2017-06-28 05:54:44'),
(93,'Myanmar kyat','MMK','104','Ks',1,0,0,21.492012,0,0,'2015-11-04 12:27:45','2017-06-28 05:54:44'),
(94,'Mongolian tögrög','MNT','496','₮',1,0,0,37.136874,0,0,'2015-11-04 12:28:06','2017-06-28 05:54:44'),
(95,'Macanese pataca','MOP','446','P',1,0,0,0.126990,0,0,'2015-11-04 12:28:30','2017-06-28 05:54:44'),
(96,'Mauritanian ouguiya','MRO','478','UM',1,0,0,5.679972,0,0,'2015-11-04 12:28:51','2017-06-28 05:54:44'),
(97,'Mauritian rupee','MUR','480','₨',1,1,1,0.547128,1,0,'2015-11-04 12:29:20','2017-06-28 05:54:44'),
(98,'Maldivian rufiyaa','MVR','462','ރ',1,0,0,0.243372,0,0,'2015-11-04 12:29:45','2017-06-28 05:54:44'),
(99,'Malawian kwacha','MWK','454','MK',1,0,0,11.460006,0,0,'2015-11-04 12:31:10','2017-06-28 05:54:44'),
(100,'Mexican peso','MXN','484','$',1,0,0,0.283968,0,0,'2015-11-04 12:31:43','2017-06-28 05:54:44'),
(102,'Malaysian ringgit','MYR','458','RM',1,0,0,0.067932,1,0,'2015-11-04 12:32:35','2017-06-28 05:54:44'),
(103,'Mozambican metical','MZN','943','MT',1,0,0,0.941664,0,0,'2015-11-04 12:33:02','2017-06-28 05:54:44'),
(104,'Namibian dollar','NAD','516','$',1,0,0,0.205326,0,0,'2015-11-04 12:33:22','2017-06-28 05:54:44'),
(105,'Nigerian naira','NGN','566','₦',1,0,0,4.981884,0,0,'2015-11-04 12:33:45','2017-06-28 05:54:44'),
(106,'Nicaraguan córdoba','NIO','558','C$',1,0,0,0.474606,0,0,'2015-11-04 12:34:46','2017-06-28 05:54:44'),
(107,'Norwegian krone','NOK','578','kr',1,0,0,0.132702,0,0,'2015-11-04 12:35:25','2017-06-28 05:54:44'),
(108,'Nepalese rupee','NPR','524','₨',1,0,0,1.631898,0,0,'2015-11-04 12:35:53','2017-06-28 05:54:44'),
(109,'New Zealand dollar','NZD','554','$',1,0,0,0.021624,0,0,'2015-11-04 12:36:15','2017-06-28 05:54:44'),
(110,'Omani rial','OMR','512','ر.ع.',1,0,0,0.006120,0,0,'2015-11-04 12:36:47','2017-06-28 05:54:44'),
(111,'Panamanian balboa','PAB','590','B/.',1,0,0,0.015810,0,0,'2015-11-04 12:37:10','2017-06-28 05:54:44'),
(112,'Peruvian nuevo sol','PEN','604','S/.',1,0,0,0.051408,0,0,'2015-11-04 12:37:33','2017-06-28 05:54:44'),
(113,'Papua New Guinean kina','PGK','598','K',1,0,0,0.050286,0,0,'2015-11-04 12:38:24','2017-06-28 05:54:44'),
(114,'Philippine peso','PHP','608','₱',1,0,0,0.798252,0,0,'2015-11-04 12:38:45','2017-06-28 05:54:44'),
(115,'Pakistani rupee','PKR','586','₨',1,0,0,1.656888,0,0,'2015-11-04 12:39:11','2017-06-28 05:54:44'),
(116,'Polish złoty','PLN','985','zł',1,0,0,0.058956,0,0,'2015-11-04 12:39:38','2017-06-28 05:54:44'),
(117,'Paraguayan guaraní','PYG','600','₲',1,0,0,87.864330,0,0,'2015-11-04 12:39:58','2017-06-28 05:54:44'),
(118,'Qatari riyal','QAR','634','ر.ق',1,0,0,0.059670,0,0,'2015-11-04 12:40:19','2017-06-28 05:54:44'),
(119,'Romanian leu','RON','946','lei',1,0,0,0.063444,0,0,'2015-11-04 12:40:55','2017-06-28 05:54:44'),
(120,'Serbian dinar','RSD','941','дин.',1,0,0,1.685856,0,0,'2015-11-04 12:41:12','2017-06-28 05:54:44'),
(121,'Russian ruble','RUB','643','py6',1,0,0,0.935136,0,0,'2015-11-04 12:41:51','2017-06-28 05:54:44'),
(122,'Rwandan franc','RWF','646','Fr',1,0,0,13.276626,0,0,'2015-11-04 12:42:16','2017-06-28 05:54:44'),
(123,'Saudi riyal','SAR','682','ر.س',1,0,0,0.059262,0,0,'2015-11-04 12:42:41','2017-06-28 05:54:44'),
(124,'Solomon Islands dollar','SBD','090','$',1,0,0,0.123726,0,0,'2015-11-04 12:43:01','2017-06-28 05:54:44'),
(125,'Seychelles rupee','SCR','690','₨',1,0,0,0.215832,0,0,'2015-11-04 12:43:29','2017-06-28 05:54:44'),
(126,'Sudanese pound','SDG','938','ج.س.',1,0,0,0.105570,0,0,'2015-11-04 12:43:51','2017-06-28 05:54:44'),
(127,'Swedish krona/kronor','SEK','752','kr',1,0,0,0.135864,0,0,'2015-11-04 12:44:12','2017-06-28 05:54:44'),
(128,'Singapore dollar','SGD','702','$',1,0,0,0.021930,1,0,'2015-11-04 12:44:33','2017-06-28 05:54:44'),
(129,'Saint Helena pound','SHP','654','£',1,0,0,0.012342,0,0,'2015-11-04 12:44:52','2017-06-28 05:54:44'),
(130,'Sierra Leonean leone','SLL','694','Le',1,0,0,117.731868,0,0,'2015-11-04 12:45:15','2017-06-28 05:54:44'),
(131,'Somali shilling','SOS','706','Sh',1,0,0,9.081468,0,0,'2015-11-04 12:45:48','2017-06-28 05:54:44'),
(132,'Surinamese dollar','SRD','968','$',1,0,0,0.118626,0,0,'2015-11-04 12:46:13','2017-06-28 05:54:44'),
(134,'São Tomé and Príncipe dobra','STD','678','Db',1,0,0,343.841796,0,0,'2015-11-04 12:47:28','2017-06-28 05:54:44'),
(135,'Syrian pound','SYP','760','ل.س',1,0,0,3.387216,0,0,'2015-11-04 12:47:50','2017-06-28 05:54:44'),
(136,'Swazi lilangeni','SZL','748','L',1,0,0,0.205326,0,0,'2015-11-04 12:48:13','2017-06-28 05:54:44'),
(137,'Thai baht','THB','764','฿',1,0,0,0.536826,1,0,'2015-11-04 12:48:47','2017-06-28 05:54:44'),
(138,'Tajikistani somoni','TJS','972','SM',1,0,0,0.139230,0,0,'2015-11-04 12:49:08','2017-06-28 05:54:44'),
(139,'Turkmenistani manat','TMT','934','m',1,0,0,0.055284,0,0,'2015-11-04 12:49:34','2017-06-28 05:54:44'),
(140,'Tunisian dinar','TND','788','د.ت',1,0,0,0.038454,0,0,'2015-11-04 12:50:25','2017-06-28 05:54:44'),
(141,'Tongan paʻanga','TOP','776','T$',1,0,0,0.034578,0,0,'2015-11-04 12:50:46','2017-06-28 05:54:44'),
(142,'Turkish lira','TRY','949','YTL',1,0,0,0.055590,0,0,'2015-11-04 12:51:11','2017-06-28 05:54:44'),
(143,'Trinidad and Tobago dollar','TTD','780','$',1,0,0,0.106692,0,0,'2015-11-04 12:51:31','2017-06-28 05:54:44'),
(144,'New Taiwan dollar','TWD','901','$',1,0,0,0.480828,0,0,'2015-11-04 12:52:23','2017-06-28 05:54:44'),
(145,'Tanzanian shilling','TZS','834','Sh',1,0,0,35.351160,0,0,'2015-11-04 12:52:47','2017-06-28 05:54:44'),
(146,'Ukrainian hryvnia','UAH','980','₴',1,0,0,0.411978,0,0,'2015-11-04 12:53:12','2017-06-28 05:54:44'),
(147,'Ugandan shilling','UGX','800','Sh',1,0,0,56.732502,0,0,'2015-11-04 12:53:30','2017-06-28 05:54:44'),
(148,'United States dollar','USD','840','$',1,0,0,0.012000,1,1,'2015-11-04 12:54:08','2023-05-30 14:15:31'),
(151,'Uruguayan peso','UYU','858','$',1,0,0,0.447780,0,0,'2015-11-04 12:56:30','2017-06-28 05:54:44'),
(152,'Uzbekistan som','UZS','860','лв',1,0,0,62.556804,0,0,'2015-11-04 12:57:17','2017-06-28 05:54:44'),
(153,'Venezuelan bolívar','VEF','937','Bs F',1,0,0,0.160344,0,0,'2015-11-04 12:57:38','2017-06-28 05:54:44'),
(154,'Vietnamese dong','VND','704','₫',1,0,0,359.319174,0,0,'2015-11-04 12:58:00','2017-06-28 05:54:44'),
(155,'Vanuatu vatu','VUV','548','Vt',1,0,0,1.735734,0,0,'2015-11-04 12:58:29','2017-06-28 05:54:44'),
(156,'Samoan tala','WST','882','T',1,0,0,0.039576,0,0,'2015-11-04 12:58:48','2017-06-28 05:54:44'),
(157,'CFA franc BEAC','XAF','950','Fr',1,0,0,9.136344,0,0,'2015-11-04 12:59:15','2017-06-28 05:54:44'),
(164,'East Caribbean dollar','XCD','951','$',1,0,0,0.042636,0,0,'2015-11-04 13:02:03','2017-06-28 05:54:44'),
(165,'Special drawing rights','XDR','960','SDR',1,0,0,0.011424,0,0,'2015-11-04 13:02:22','2017-06-28 05:54:44'),
(167,'CFA franc BCEAO','XOF','952','Fr',1,0,0,9.136344,0,0,'2015-11-04 13:03:05','2017-06-28 05:54:44'),
(169,'CFP franc (franc Pacifique)','XPF','953','Fr',1,0,0,1.662090,0,0,'2015-11-04 13:03:42','2017-06-28 05:54:44'),
(175,'Yemeni rial','YER','886','﷼',1,0,0,3.954642,0,0,'2015-11-04 13:06:07','2017-06-28 05:54:44'),
(176,'South African rand','ZAR','710','R',1,0,0,0.205326,0,0,'2015-11-04 13:06:25','2017-06-28 05:54:44'),
(177,'Zambian kwacha','ZMW','967','ZK',1,0,0,0.147390,0,0,'2015-11-04 13:06:46','2017-06-28 05:54:44'),
(181,'United Arab Emirates Dirham','AED','784','د.إ',1,0,0,0.058038,1,0,'0000-00-00 00:00:00','2017-10-12 13:10:52'),
(182,'AFGHANI','AFA','AFA',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:24','2016-09-23 05:28:24'),
(183,'LEK','ALL','ALL',NULL,1,0,NULL,1.838958,0,0,'2016-09-23 05:28:24','2017-06-28 05:54:44'),
(184,'ARMENIAN DRAM','AMD','AMD',NULL,1,0,NULL,7.593186,0,0,'2016-09-23 05:28:25','2017-06-28 05:54:44'),
(185,'ANTIL. GUILDER','ANG','ANG',NULL,1,0,NULL,0.028254,0,0,'2016-09-23 05:28:25','2017-06-28 05:54:44'),
(186,'KWANZA REAJUST.','AOR','AOR',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(187,'CHELIN AUSTRIACO','ATS','ATS',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(188,'AZERB. MANAT','AZM','AZM',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(189,'DINAR','BAD','BAD',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(190,'BELARUS RUBLE','BYB','BYB',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(191,'ECUADORIAN SUCRE','ECS','ECS',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(192,'GHANAIAN CEDI','GHC','GHC',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(193,'Lithuanian Litas','LTL','LTL',NULL,1,0,NULL,0.048144,0,0,'2016-09-23 05:28:25','2017-06-28 05:54:44'),
(194,'Latvian Lats','LVL','LVL',NULL,1,0,NULL,0.009792,0,0,'2016-09-23 05:28:25','2017-06-28 05:54:44'),
(195,'MALAGASY FRANC','MGF','MGF',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:25','2016-09-23 05:28:25'),
(196,'Mozambican METICAL','MZM','MZM',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(197,'CHINESE YUAN RMB','RMB','RMB',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(198,'SUDANESE DINAR','SDD','SDD',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(199,'SURINAM GUILDER','SRG','SRG',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(200,'EL SALV. COLON','SVC','SVC',NULL,1,0,NULL,0.138312,0,0,'2016-09-23 05:28:26','2017-06-28 05:54:44'),
(201,'TAJIK RUBLE','TJR','TJR',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(202,'MANAT','TMM','TMM',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(203,'TIMOR ESCUDO','TPE','TPE',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(204,'BOLIVAR','VEB','VEB',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(205,'UNIDAD MONETARIA EUROPEA      ','XEU','XEU',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(206,'NEW DINAR','YUM','YUM',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(207,'Zambian KWACHA','ZMK','ZMK',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:26','2016-09-23 05:28:26'),
(208,'NEW ZAIRE','ZRN','ZRN',NULL,1,0,NULL,0.000000,0,0,'2016-09-23 05:28:27','2016-09-23 05:28:27');

/*Table structure for table `enquiries` */

DROP TABLE IF EXISTS `enquiries`;

CREATE TABLE `enquiries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `tour_cost_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `country_id` varchar(45) DEFAULT NULL,
  `journey_date` varchar(255) DEFAULT NULL,
  `no_of_adults` int(11) DEFAULT NULL,
  `no_of_child` int(11) DEFAULT NULL,
  `total_cost` int(45) DEFAULT NULL,
  `cust_name` varchar(255) DEFAULT NULL,
  `cust_email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(45) DEFAULT NULL,
  `message` text,
  `token` varchar(45) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `enquiries` */

insert  into `enquiries`(`id`,`our_journy_id`,`tour_cost_id`,`currency_id`,`country_id`,`journey_date`,`no_of_adults`,`no_of_child`,`total_cost`,`cust_name`,`cust_email`,`contact_no`,`message`,`token`,`created`,`modified`) values 
(1,2,NULL,67,'101','',NULL,NULL,NULL,'adsa','dsa@gmail.com','25874123','This sif ','','2024-04-15 14:22:52','2024-04-15 14:22:52'),
(2,2,NULL,67,'101','',NULL,NULL,NULL,'Shehzad','shehzad215@gmail.com','88989279606','Enquiry Date: 2024-04-15\r\nJourney Date: \r\nNumber of Adults: undefined\r\nNumber of Child: undefined\r\n----------------------------------','','2024-04-15 14:24:05','2024-04-15 14:24:05'),
(3,2,NULL,67,'101','',NULL,NULL,NULL,'Shehzad','shehzad215@gmail.com','88989279606','Enquiry Date: 2024-04-15\r\nJourney Date: \r\nNumber of Adults: undefined\r\nNumber of Child: undefined\r\n----------------------------------','d2190f','2024-04-15 14:29:26','2024-04-15 14:29:26'),
(4,2,NULL,67,'101','',NULL,NULL,NULL,'Shehzad','shehzad215@gmail.com','88989279606','Enquiry Date: 2024-04-15\r\nJourney Date: \r\nNumber of Adults: undefined\r\nNumber of Child: undefined\r\n----------------------------------','ea072b','2024-04-15 14:30:09','2024-04-15 14:30:09');

/*Table structure for table `faq_types` */

DROP TABLE IF EXISTS `faq_types`;

CREATE TABLE `faq_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `faq_types` */

insert  into `faq_types`(`id`,`name`,`active`,`created`,`modified`) values 
(1,'General FAQs',1,'2024-02-05 13:51:06','2024-02-12 11:18:24'),
(2,'Journey FAQs',1,'2024-02-05 13:51:20','2024-02-07 09:43:28');

/*Table structure for table `faqs` */

DROP TABLE IF EXISTS `faqs`;

CREATE TABLE `faqs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `faq_type_id` int(11) DEFAULT NULL,
  `question` text,
  `answer` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf32;

/*Data for the table `faqs` */

insert  into `faqs`(`id`,`our_journy_id`,`faq_type_id`,`question`,`answer`,`active`,`created`,`modified`) values 
(1,1,NULL,'How to Download Faq','Press the Download Button',1,'2024-01-17 15:34:52','2024-01-17 15:34:52'),
(2,4,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(3,4,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(4,4,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(5,4,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(6,4,NULL,'How many people will be on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(7,4,NULL,'What will the weather be like?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(8,4,NULL,'What should I pack?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 11:27:29','2024-01-25 11:28:06'),
(9,5,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:36:05','2024-01-25 12:36:05'),
(10,5,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:36:05','2024-01-25 12:36:05'),
(11,5,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:36:05','2024-01-25 12:36:05'),
(12,5,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:36:05','2024-01-25 12:36:05'),
(13,5,NULL,'How many people will be on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:36:05','2024-01-25 12:36:05'),
(14,5,NULL,'What will the weather be like?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat',1,'2024-01-25 12:36:05','2024-01-25 12:36:05'),
(15,6,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:56:43','2024-01-25 13:46:54'),
(16,6,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 12:56:43','2024-01-25 13:46:54'),
(17,6,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 13:46:54','2024-01-25 13:46:54'),
(18,6,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 13:46:54','2024-01-25 13:46:54'),
(19,6,NULL,'How many people will be on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 13:46:54','2024-01-25 13:46:54'),
(20,6,NULL,'What will the weather be like?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-25 13:46:54','2024-01-25 13:46:54'),
(21,9,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 12:39:53','2024-01-29 12:39:53'),
(22,9,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 12:39:53','2024-01-29 12:39:53'),
(23,9,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 12:39:53','2024-01-29 12:39:53'),
(24,9,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 12:39:53','2024-01-29 12:39:53'),
(25,10,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 15:32:59','2024-01-29 15:32:59'),
(26,10,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 15:32:59','2024-01-29 15:32:59'),
(27,10,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 15:32:59','2024-01-29 15:32:59'),
(28,11,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 16:00:42','2024-01-29 16:00:42'),
(29,11,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 16:00:42','2024-01-29 16:00:42'),
(30,11,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 16:00:42','2024-01-29 16:00:42'),
(31,12,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 16:28:17','2024-01-29 16:28:17'),
(32,12,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 16:28:17','2024-01-29 16:28:17'),
(33,12,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 16:28:17','2024-01-29 16:28:17'),
(34,13,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 17:38:19','2024-01-29 17:38:19'),
(35,13,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 17:38:19','2024-01-29 17:38:19'),
(36,13,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-01-29 17:38:19','2024-01-29 17:38:19'),
(37,14,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 14:16:04','2024-02-01 14:16:04'),
(38,14,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 14:16:04','2024-02-01 14:16:04'),
(39,14,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 14:16:04','2024-02-01 14:16:04'),
(40,14,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 14:16:04','2024-02-01 14:16:04'),
(41,15,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 15:14:59','2024-02-01 16:55:31'),
(42,15,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 15:14:59','2024-02-01 16:55:31'),
(43,15,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 15:14:59','2024-02-01 16:55:31'),
(44,16,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 15:48:15','2024-02-01 15:48:15'),
(45,16,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 15:48:15','2024-02-01 15:48:15'),
(46,16,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 15:48:15','2024-02-01 15:48:15'),
(47,17,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:03:36','2024-02-01 17:03:36'),
(48,17,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:03:36','2024-02-01 17:03:36'),
(49,17,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:03:36','2024-02-01 17:03:36'),
(50,17,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:03:36','2024-02-01 17:03:36'),
(51,18,NULL,'What is the price of the journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:35:45','2024-02-01 17:42:44'),
(52,18,NULL,'Am I the right age to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:35:45','2024-02-01 17:42:44'),
(53,18,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-01 17:35:45','2024-02-01 17:42:44'),
(54,19,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-02 16:00:20','2024-02-02 16:00:20'),
(55,19,NULL,'How many people will be on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-02 16:00:20','2024-02-02 16:00:20'),
(56,19,NULL,'What will the weather be like?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-02 16:00:20','2024-02-02 16:00:20'),
(57,20,NULL,'Am I the right age to come on this journey?\r\n','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-05 11:02:10','2024-02-05 11:03:30'),
(58,20,NULL,'Do I have to have certain spiritual beliefs to come on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-05 11:02:10','2024-02-05 11:03:30'),
(59,20,NULL,'I\'m planning to travel by myself. Is there anything I should know?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-05 11:02:10','2024-02-05 11:03:30'),
(60,20,NULL,'How many people will be on this journey?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-05 11:02:10','2024-02-05 11:03:30'),
(61,20,NULL,'What will the weather be like?','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed augue tellus. Nullam tincidunt sem eget lacus rutrum efficitur. Donec convallis accumsan dolor ut varius. Donec fermentum diam a dolor condimentum iaculis. Maecenas placerat maximus felis eu vestibulum. Mauris sollicitudin, nisi nec auctor pharetra, purus neque tincidunt dui, nec egestas orci arcu sit amet nibh. Phasellus sed nulla ut odio consectetur vulputate. Maecenas porttitor efficitur consequat.',1,'2024-02-05 11:03:30','2024-02-05 11:03:30'),
(62,NULL,1,'What types of tours do you offer?','This question aims to provide an overview of the variety of tours available on the website.',1,'2024-02-07 09:46:57','2024-02-12 11:40:42'),
(63,NULL,1,'How do I book a tour?','Users often want to know the steps involved in booking a tour through the website.',1,'2024-02-07 09:47:52','2024-02-12 11:40:41'),
(64,NULL,1,'Can I make changes to my booking after it\'s confirmed?','Customers might inquire about the flexibility of modifying their bookings',1,'2024-02-07 09:48:12','2024-02-12 11:40:40'),
(65,NULL,1,'What is your cancellation policy?','This question addresses concerns about cancelling bookings and any associated fees or refund policies.',1,'2024-02-07 09:48:44','2024-02-12 11:40:40'),
(66,NULL,1,'How far in advance should I book a tour?','Users might seek advice on the optimal timing for booking tours to ensure availability.',1,'2024-02-07 09:49:54','2024-02-12 11:40:39'),
(67,NULL,1,'Are there any age restrictions for the tours?','Relevant for tours that may have age limitations or suitability concerns.',1,'2024-02-07 09:50:15','2024-02-12 11:40:39'),
(68,NULL,1,'What is included in the tour package?','This question clarifies the inclusions such as transportation, meals, guides, etc., in the tour package',1,'2024-02-07 09:51:02','2024-02-12 11:40:35'),
(69,NULL,1,'Do you offer group discounts?','Customers might be interested in knowing if there are any discounts available for booking in groups.',1,'2024-02-07 09:51:32','2024-02-12 11:40:34'),
(70,NULL,1,'Is travel insurance included in the booking?','Users may want to know if travel insurance is automatically included or if it can be added to their booking.',1,'2024-02-07 09:51:53','2024-02-12 11:40:34'),
(71,NULL,1,'What languages are the tours conducted in?','Relevant for tours that are offered in multiple languages to accommodate different customer preferences',1,'2024-02-07 09:54:07','2024-02-12 11:40:33'),
(72,NULL,1,'How can I contact the tour operator during my trip?','Customers often seek information about emergency contact details or support channels during their tour.',1,'2024-02-07 09:54:54','2024-02-12 11:40:32'),
(73,NULL,1,'Do you offer custom/private tours?','This question addresses whether the website provides options for customized or private tours tailored to specific preferences.',1,'2024-02-07 09:55:26','2024-02-12 11:40:32'),
(74,NULL,1,'Are there any health or fitness requirements for the tours?','Users might inquire about any physical fitness levels or health considerations for participating in certain tours.',1,'2024-02-07 09:55:57','2024-02-07 09:55:57'),
(75,NULL,1,'What payment methods do you accept?','Customers often want to know the accepted forms of payment for booking tours through the website.',0,'2024-02-07 09:56:23','2024-03-07 11:14:43'),
(76,NULL,1,'Do you offer tours for solo travelers?','Relevant for solo travelers seeking opportunities to join group tours or find suitable itineraries.',0,'2024-02-07 10:16:37','2024-03-07 11:14:37'),
(77,3,NULL,'THis is for test ','yes it is test ',1,'2024-03-08 17:50:50','2024-03-08 18:02:52'),
(78,3,NULL,'THis is for test ','tet',1,'2024-03-08 17:50:50','2024-03-08 18:02:52'),
(79,3,NULL,'dsad','sadsad',1,'2024-03-08 17:51:58','2024-03-08 18:02:52'),
(80,3,NULL,'sad','sad',1,'2024-03-08 17:52:24','2024-03-08 18:02:52');

/*Table structure for table `galleries` */

DROP TABLE IF EXISTS `galleries`;

CREATE TABLE `galleries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gallery_category_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `galleries` */

insert  into `galleries`(`id`,`gallery_category_id`,`order`,`name`,`image`,`active`,`created`,`modified`) values 
(1,1,1,'Gallery 1','increased_wellbeing_img.jpg',1,'2024-01-19 15:25:12','2024-01-19 15:42:12'),
(2,1,2,'Gallery 2','costefficient_img.jpg',1,'2024-01-23 17:29:32','2024-01-23 17:29:32'),
(3,2,3,'Gallery 3','productivity_img.jpg',1,'2024-01-23 17:52:37','2024-01-23 17:52:37'),
(4,4,1,'Image 1','anup_jalota.jpg',1,'2024-04-10 14:04:10','2024-04-10 14:04:10'),
(22,NULL,NULL,NULL,NULL,0,'2024-04-17 14:21:49','2024-04-17 14:21:49');

/*Table structure for table `gallery_categories` */

DROP TABLE IF EXISTS `gallery_categories`;

CREATE TABLE `gallery_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_url` text,
  `meta_description` text,
  `its_external_gallery` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `gallery_categories` */

insert  into `gallery_categories`(`id`,`name`,`image_file`,`page_title`,`page_slug`,`page_url`,`meta_description`,`its_external_gallery`,`active`,`created`,`modified`) values 
(1,'Journey 2021','gallery_category_01.jpg','','journey-2021','http://localhost/project/CakePHP/soil2soul/galleries/journey-2021','',0,1,'2024-01-19 15:02:58','2024-04-17 11:50:48'),
(2,'Journey 2022','gallery_category_02.jpg','','journey-2022','http://localhost/project/CakePHP/soil2soul/galleries/journey-2022','',0,1,'2024-01-23 15:34:04','2024-04-17 11:50:44'),
(3,'Journey 2023','gallery_category_03.jpg','','journey-2023','http://localhost/project/CakePHP/soil2soul/galleries/journey-2023','',0,1,'2024-01-23 15:34:13','2024-04-17 11:50:41'),
(4,'Inner Rama Day 3','Abstract.avif','','inner-rama-day-3','http://localhost/project/CakePHP/soil2soul/galleries/inner-rama-day-3','',0,1,'2024-01-23 15:34:26','2024-04-17 11:50:37'),
(5,'Inner Rama Day 1','journey_img05.jpg','','inner-rama-day-1','http://localhost/project/CakePHP/soil2soul/galleries/inner-rama-day-1','',0,1,'2024-04-10 14:00:47','2024-04-17 12:04:05'),
(6,'Inner Rama Day 2',NULL,'','inner-rama-day-2','http://localhost/project/CakePHP/soil2soul/galleries/inner-rama-day-2','',0,1,'2024-04-10 14:01:03','2024-04-17 11:50:21');

/*Table structure for table `journey_images` */

DROP TABLE IF EXISTS `journey_images`;

CREATE TABLE `journey_images` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `order` varchar(3) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `its_main_image` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf32;

/*Data for the table `journey_images` */

insert  into `journey_images`(`id`,`our_journy_id`,`name`,`order`,`image_file`,`its_main_image`,`active`,`created`,`modified`) values 
(1,1,'Image 1','1','ourjourneys_img04.jpg',1,1,'2024-01-17 12:22:31','2024-03-01 15:20:07'),
(2,1,'Image 2','2','journey_img01.jpg',1,1,'2024-01-17 12:32:49','2024-03-07 15:06:34'),
(3,1,'Image 3','3','bodh-gaya-768x574.jpg',0,1,'2024-01-17 12:33:10','2024-03-01 15:20:07'),
(4,2,'Image 1','1','journey_img03.jpg',0,1,'2024-01-25 12:01:51','2024-01-29 15:16:17'),
(5,2,'Image 2 ','2','journey_img04.jpg',0,1,'2024-01-25 12:01:51','2024-01-29 15:16:17'),
(6,2,'Image 3 ','3','journey_img05.jpg',0,1,'2024-01-25 12:01:51','2024-01-29 15:16:17'),
(7,3,'Image 1','1','journey_img03.jpg',1,1,'2024-01-25 12:11:00','2024-03-04 13:29:22'),
(8,3,'Image 2 ','2','journey_img04.jpg',0,1,'2024-01-25 12:11:00','2024-03-04 13:29:22'),
(9,3,'Image 3 ','3','journey_img05.jpg',0,1,'2024-01-25 12:11:00','2024-01-25 12:11:00'),
(10,4,'Image 1','1','Bikaner-to-Sam-Sand-Dunes-1.webp',0,1,'2024-01-25 12:16:57','2024-01-25 12:17:05'),
(11,4,'Image 2 ','2','Bikaner-to-Sam-Sand-Dunes-2-1024x691.jpg',1,1,'2024-01-25 12:16:57','2024-03-04 13:47:32'),
(12,4,'Image 3 ','3','Delhi-to-Mandawa-1.webp',0,1,'2024-01-25 12:16:57','2024-01-25 12:16:57'),
(13,5,'Image 1','1','bodh-gaya-768x574.jpg',0,1,'2024-01-25 12:20:49','2024-01-25 12:20:58'),
(14,5,'Image 2 ','2','dungeshwari-cave.webp',0,1,'2024-01-25 12:20:49','2024-01-25 12:20:49'),
(15,5,'Image 3 ','3','Gautama-Buddha-2-1024x520.webp',1,1,'2024-01-25 12:20:49','2024-03-04 13:47:53'),
(16,1,'image 4 ','4','Bikaner-to-Sam-Sand-Dunes-2-1024x691.jpg',0,1,'2024-01-25 17:28:18','2024-03-01 15:20:07'),
(17,1,'image 5 ','5','Gautama-Buddha-2-1024x520.webp',0,1,'2024-01-25 17:29:10','2024-03-01 15:20:07'),
(18,1,'image 6 ','6','journey_img05.jpg',0,1,'2024-01-25 17:49:14','2024-03-01 15:20:07'),
(19,1,'image 7 ','7','Bikaner-to-Sam-Sand-Dunes-1.webp',0,1,'2024-01-29 12:36:40','2024-03-01 15:20:07'),
(20,2,'image 4 ','4','Abstract.avif',0,1,'2024-01-29 15:16:17','2024-01-29 15:16:17'),
(21,2,'image 5 ','5','dungeshwari-cave.webp',0,1,'2024-01-29 15:16:17','2024-01-29 15:16:17'),
(22,2,'Image 6','6','Gautama-Buddha-2-1024x520.webp',0,1,'2024-01-29 15:16:17','2024-01-29 15:16:17'),
(23,2,'Image 7','7','journeydet_collage.jpg',1,1,'2024-01-29 15:16:17','2024-03-04 13:46:48'),
(24,1,'image 8','8','costefficient_img.jpg',0,1,'2024-03-01 15:20:07','2024-03-01 15:20:07');

/*Table structure for table `menu_links` */

DROP TABLE IF EXISTS `menu_links`;

CREATE TABLE `menu_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `menu_id` int(10) unsigned NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attributes` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_file` tinyint(1) NOT NULL DEFAULT '0',
  `is_outer_link` tinyint(1) NOT NULL DEFAULT '0',
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `outer_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=408 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menu_links` */

insert  into `menu_links`(`id`,`parent_id`,`lft`,`rght`,`menu_id`,`icon`,`title`,`link`,`attributes`,`active`,`is_file`,`is_outer_link`,`file`,`outer_link`,`created`,`modified`) values 
(1,NULL,1,2,1,'home','Dashboards','{\"controller\":\"dashboards\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2017-07-15 11:09:33','2022-08-31 15:02:16'),
(20,NULL,75,104,1,'users','Admin Master','#','',1,0,0,NULL,'','2017-07-15 11:57:03','2022-08-31 11:34:55'),
(28,NULL,119,136,1,'gears','Super Masters','#','',1,0,0,NULL,NULL,'2017-07-15 12:07:13','2019-01-21 16:31:20'),
(29,28,112,113,1,'list','Menus','{\"controller\":\"menus\", \"action\":\"admin_index\"}','',1,0,0,NULL,NULL,'2017-07-15 12:08:18','2017-07-15 12:08:54'),
(30,28,114,115,1,'list','Menu Links','{\"controller\":\"menu_links\", \"action\":\"admin_index\"}','',1,0,0,NULL,NULL,'2017-07-15 12:09:39','2017-07-15 12:09:39'),
(31,20,96,97,1,'list','Roles','{\"controller\":\"roles\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2017-07-15 12:10:37','2022-08-31 10:44:35'),
(34,NULL,349,476,1,'caret-square-o-down','Dropdowns','#','',1,0,0,NULL,'','2017-07-15 12:15:27','2024-01-15 18:28:04'),
(136,20,94,95,1,'list','Admin','{\"controller\":\"users\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2018-03-19 10:25:42','2023-01-17 14:23:42'),
(304,20,100,101,1,'list','Salutations','{\"controller\":\"salutations\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2022-08-31 12:11:36','2022-08-31 12:11:36'),
(353,354,478,479,1,'rss','Blogs','{\"controller\":\"blogs\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2023-01-10 19:42:26','2023-01-11 14:01:50'),
(354,NULL,477,490,1,'file-o','Article','#','',1,0,0,NULL,'','2023-01-11 14:01:30','2023-01-11 14:01:30'),
(373,NULL,491,500,1,'list','Our Journey','#','',1,0,0,NULL,'','2023-05-11 17:21:40','2024-01-15 18:30:51'),
(374,28,132,133,1,'list','Seo Modules','{\"controller\":\"seo_modules\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2023-05-11 17:56:14','2023-05-11 17:56:14'),
(386,354,480,481,1,'list','Blog Categories','{\"controller\":\"blog_categories\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 14:18:37','2024-01-15 14:18:37'),
(387,354,482,483,1,'tags','Blog Tags','{\"controller\":\"blog_tags\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 16:06:11','2024-01-15 16:06:11'),
(388,34,454,455,1,'list','Amenities','{\"controller\":\"amenities\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 18:28:50','2024-01-15 18:28:50'),
(389,34,456,457,1,'list','Booking Facilities','{\"controller\":\"booking_facilities\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 18:29:59','2024-01-18 12:34:02'),
(390,373,496,497,1,'list','Our Journies','{\"controller\":\"our_journies\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 18:31:19','2024-03-01 16:04:37'),
(391,34,458,459,1,'users','Our Teams','{\"controller\":\"our_teams\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 18:31:50','2024-01-15 18:31:50'),
(392,28,134,135,1,'money','Currencies','{\"controller\":\"currencies\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-15 18:34:23','2024-01-15 18:34:23'),
(393,354,484,485,1,'users','Blog Authors','{\"controller\":\"blog_authors\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-17 14:53:45','2024-01-17 14:53:45'),
(394,34,460,461,1,'list','Galleries','{\"controller\":\"gallery_categories\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-19 14:48:34','2024-02-08 12:32:14'),
(395,NULL,501,506,1,'List','Enquiries','#','',1,0,0,NULL,'','2024-01-23 11:55:21','2024-01-23 11:55:21'),
(396,395,502,503,1,'Book','Contact Enqueries','{\"controller\":\"contact_enqueries\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-23 11:57:37','2024-01-23 11:58:14'),
(397,34,462,463,1,'comments','Testimonials','{\"controller\":\"testimonials\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-01-25 12:52:16','2024-01-25 12:52:38'),
(398,34,464,465,1,'list','Newsletters','{\"controller\":\"newsletters\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-02 17:01:10','2024-02-02 17:01:10'),
(399,34,466,467,1,'list','FAQ Types','{\"controller\":\"faq_types\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-05 12:52:54','2024-02-05 16:09:05'),
(400,34,468,469,1,'list','FAQs','{\"controller\":\"faqs\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-05 14:05:15','2024-02-05 16:03:06'),
(401,395,504,505,1,'list','Journey Enquiries','{\"controller\":\"enquiries\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-06 12:29:54','2024-02-06 12:29:54'),
(402,34,470,471,1,'list','Social Media','{\"controller\":\"social_media\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-06 17:44:57','2024-02-06 17:44:57'),
(403,34,472,473,1,'list','Our Journies','{\"controller\":\"our_partners\", \"action\":\"admin_index\"}','',0,0,0,NULL,'','2024-02-12 11:55:43','2024-03-01 16:04:12'),
(404,34,474,475,1,'list','Our Partners','{\"controller\":\"our_partners\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-12 11:56:50','2024-02-12 11:56:50'),
(405,373,498,499,1,'list','Packages','{\"controller\":\"packages\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-02-22 15:15:31','2024-02-22 15:15:31'),
(406,354,486,487,1,'list','Videos','{\"controller\":\"videos\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-03-04 14:50:32','2024-03-06 15:27:14'),
(407,354,488,489,1,'list','Video Categories','{\"controller\":\"video_categories\", \"action\":\"admin_index\"}','',1,0,0,NULL,'','2024-03-06 15:42:52','2024-03-06 15:42:52');

/*Table structure for table `menu_links_roles` */

DROP TABLE IF EXISTS `menu_links_roles`;

CREATE TABLE `menu_links_roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_link_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menu_links_roles` */

/*Table structure for table `menu_links_users` */

DROP TABLE IF EXISTS `menu_links_users`;

CREATE TABLE `menu_links_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_link_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `menu_links_users` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `menus` */

insert  into `menus`(`id`,`name`,`link`,`created`,`modified`) values 
(1,'Backend','#','2015-09-24 05:53:21','2015-09-24 05:53:21'),
(2,'Frontend Header','#','2015-09-24 05:53:44','2015-09-24 05:53:44'),
(4,'Frontend Footer','#','2015-10-08 04:47:53','2022-08-04 12:01:35');

/*Table structure for table `newsletters` */

DROP TABLE IF EXISTS `newsletters`;

CREATE TABLE `newsletters` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `newsletters` */

insert  into `newsletters`(`id`,`email`,`created`,`modified`) values 
(10,'moin@puratech.in','2024-02-02 16:59:55','2024-02-02 16:59:55'),
(11,'test@gmail.com','2024-04-04 15:35:51','2024-04-04 15:35:51');

/*Table structure for table `our_journey_exlusions` */

DROP TABLE IF EXISTS `our_journey_exlusions`;

CREATE TABLE `our_journey_exlusions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32;

/*Data for the table `our_journey_exlusions` */

insert  into `our_journey_exlusions`(`id`,`our_journy_id`,`note`,`active`,`created`,`modified`) values 
(1,1,'this is for test ',1,'2024-01-16 18:34:04','2024-02-27 17:16:58'),
(2,1,'test',0,'2024-01-16 18:34:04','2024-02-27 17:16:58'),
(3,1,'fasfaf',1,'2024-02-23 12:48:11','2024-02-27 17:16:58'),
(4,1,'asfsafsaf',1,'2024-02-23 12:48:11','2024-02-27 17:16:58'),
(5,1,'fffffffffffffffffffffffff',0,'2024-02-23 12:48:11','2024-02-27 17:16:58');

/*Table structure for table `our_journey_hotels` */

DROP TABLE IF EXISTS `our_journey_hotels`;

CREATE TABLE `our_journey_hotels` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `hotel_name` varchar(255) DEFAULT NULL,
  `city_name` varchar(255) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `our_journey_hotels` */

insert  into `our_journey_hotels`(`id`,`our_journy_id`,`hotel_name`,`city_name`,`image_file`,`rating`,`active`,`created`,`modified`) values 
(1,1,'Oberoi Hotel','Mumbai','partners_img_03.jpg',3,1,'2024-03-01 11:41:45','2024-03-01 14:50:47'),
(2,1,'Taj Hotel','Mumbai','partners_img_01.jpg',4,1,'2024-03-01 11:51:18','2024-03-01 14:50:47'),
(3,NULL,NULL,NULL,NULL,NULL,1,'2024-03-01 14:29:35','2024-03-01 14:29:35'),
(4,NULL,NULL,NULL,NULL,NULL,0,'2024-03-01 14:29:42','2024-03-01 14:29:42');

/*Table structure for table `our_journey_inclusions` */

DROP TABLE IF EXISTS `our_journey_inclusions`;

CREATE TABLE `our_journey_inclusions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf32;

/*Data for the table `our_journey_inclusions` */

insert  into `our_journey_inclusions`(`id`,`our_journy_id`,`note`,`active`,`created`,`modified`) values 
(1,1,'This is for test ',0,'2024-01-17 11:18:22','2024-02-27 17:16:11'),
(3,1,'d',0,'2024-02-27 17:09:25','2024-02-27 17:16:11'),
(4,1,'dd',0,'2024-02-27 17:09:25','2024-02-27 17:16:11'),
(5,1,'ddd',1,'2024-02-27 17:09:25','2024-02-27 17:16:11'),
(6,1,'dddd',1,'2024-02-27 17:09:25','2024-02-27 17:16:11'),
(18,1,'dddddddd',1,'2024-02-27 17:14:56','2024-02-27 17:16:11'),
(19,1,'dddddsfsdfd',1,'2024-02-27 17:14:56','2024-02-27 17:16:11'),
(20,1,'sdfdsfdsfdsf',1,'2024-02-27 17:14:56','2024-02-27 17:16:11');

/*Table structure for table `our_journey_iteneries` */

DROP TABLE IF EXISTS `our_journey_iteneries`;

CREATE TABLE `our_journey_iteneries` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `day` varchar(45) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

/*Data for the table `our_journey_iteneries` */

insert  into `our_journey_iteneries`(`id`,`our_journy_id`,`day`,`title`,`description`,`latitude`,`longitude`,`active`,`created`,`modified`) values 
(1,1,'1','sdgfq','1dsf',NULL,NULL,1,'2024-01-17 18:42:51','2024-01-18 15:29:07'),
(2,1,'2','test','This',NULL,NULL,1,'2024-01-17 18:42:51','2024-01-17 18:46:25');

/*Table structure for table `our_journies` */

DROP TABLE IF EXISTS `our_journies`;

CREATE TABLE `our_journies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `currency_id` int(11) DEFAULT NULL,
  `package_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `trail` int(33) DEFAULT NULL,
  `video_link_2` text CHARACTER SET utf32 COLLATE utf32_general_ci,
  `video_link_1` text,
  `description` text,
  `overview` text,
  `no_of_nights` int(11) DEFAULT NULL,
  `total_seat` varchar(45) DEFAULT NULL,
  `cost` varchar(255) DEFAULT NULL,
  `map` text,
  `page_title` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `payment_terms` text,
  `cancellation_policy` text,
  `broucher_file` varchar(255) DEFAULT NULL,
  `upload_map` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `display_on_home_page` tinyint(1) NOT NULL DEFAULT '0',
  `journey_banner` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

/*Data for the table `our_journies` */

insert  into `our_journies`(`id`,`currency_id`,`package_id`,`order`,`name`,`trail`,`video_link_2`,`video_link_1`,`description`,`overview`,`no_of_nights`,`total_seat`,`cost`,`map`,`page_title`,`page_slug`,`meta_description`,`meta_keywords`,`payment_terms`,`cancellation_policy`,`broucher_file`,`upload_map`,`page_url`,`display_on_home_page`,`journey_banner`,`active`,`created`,`modified`) values 
(1,67,1,3,'Discover Your Inner Rama',1,'','','<div><strong>\"Discovering your inner Ram&rdquo;</strong> is a transformative journey, where the ancient wisdom of Ramayana becomes a guiding light for your modern life. In the hustle of today, many find themselves adrit, yearning for true well-being. Our quest is to help you rediscover your Inner Ram &ndash; <strong>to experience life, embrace challenges, and find joy in the journey</strong>.</div>\r\n<div>&nbsp;</div>\r\n<div>This pursuit isn\'t about escaping life\'s realities but embracing them. It\'s about connecting with your transcendental self, the spiritual soul that rejuvenates mind and body even amidst uncertainties. Come, delve into the art of experiencing life through the profound wisdom of Ram and Ramayana. \"<strong>Let\'s have this journey together and live life by embracing Sri Ram within us\"</strong>.</div>','<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</div>',8,NULL,'15000','','Discover Your Inner Rama','discover-your-inner-rama','','','<p>This is For Test .</p>','<p>This is For Test .</p>','iqac_annual_report_18-19.pdf','ramayan_trail1.jpg','http://localhost/project/CakePHP/soil2soul/trail/discover-your-inner-rama',1,'journeydet_collage.jpg',1,'2024-01-16 15:50:36','2024-03-05 15:17:18'),
(2,67,1,2,'Mystical Varanasi Pilgrimage',2,'','','<p>This pilgrimage offers spiritual seekers from all paths an opportunity to tread the paths that have been laid down by yogis and sages throughout centuries and... Read More</p>','',4,NULL,'15000','','Mystical Varanasi Pilgrimage','mystical-varanasi-pilgrimage','','','','',NULL,NULL,'http://localhost/project/CakePHP/soil2soul/trail/mystical-varanasi-pilgrimage',1,NULL,1,'2024-01-25 12:00:21','2024-03-04 14:36:06'),
(3,67,2,1,'Buddhist Tour from Varanasi to Gorakhpur',1,'','','<p>This pilgrimage offers spiritual seekers from all paths an opportunity to tread the paths that have been laid down by yogis and sages throughout centuries and</p>','',4,NULL,'15000','','Buddhist Tour from Varanasi to Gorakhpur','buddhist-tour-from-varanasi-to-gorakhpur','','','','',NULL,NULL,'http://localhost/project/CakePHP/soil2soul/trail/buddhist-tour-from-varanasi-to-gorakhpur',1,'bodh-gaya-768x574.jpg',1,'2024-01-25 12:10:27','2024-03-08 18:02:52'),
(4,67,2,4,'Rajasthan to Varanasi Tour',2,'','','<p>Come on a journey with us &ndash; Spiritual India &ndash; to the royal cities of&nbsp;princely&nbsp;state of Rajasthan in India which top tourist destination famous for its marvellous architecture, ancient forts and palaces, and cultural heritage. After spending 12 incredible days in Rajasthan, we&rsquo;ll enjoy the last 2 days of this Rajasthan to Varanasi Tour in the Holiest City of the world, Varanasi. The oldest city in the world i.e. Varanasi is perched on the banks of the River Ganga.</p>','',5,NULL,'2000','','Rajasthan to Varanasi Tour ','rajasthan-to-varanasi-tour','','','','',NULL,NULL,'http://localhost/project/CakePHP/soil2soul/trail/rajasthan-to-varanasi-tour',1,NULL,1,'2024-01-25 12:16:11','2024-03-04 18:04:31');

/*Table structure for table `our_partners` */

DROP TABLE IF EXISTS `our_partners`;

CREATE TABLE `our_partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `our_partners` */

insert  into `our_partners`(`id`,`name`,`logo`,`active`,`created`,`modified`) values 
(1,'Technical Partner','partners_img_01.jpg',1,'2024-02-12 12:09:56','2024-02-12 12:25:02'),
(2,'Spiritual Essential Products','partners_img_02.jpg',1,'2024-02-12 12:10:34','2024-02-12 12:10:34'),
(3,'Digital Twin','partners_img_03.jpg',1,'2024-02-12 12:10:52','2024-02-12 12:10:52'),
(4,'Bussiness Coach','partners_img_04.jpg',1,'2024-02-12 12:11:13','2024-02-12 12:11:13'),
(5,'Ground Handler','partners_img_05..jpg',1,'2024-02-12 12:11:42','2024-02-12 12:11:42');

/*Table structure for table `our_scholar_details` */

DROP TABLE IF EXISTS `our_scholar_details`;

CREATE TABLE `our_scholar_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `our_team_id` int(11) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf32;

/*Data for the table `our_scholar_details` */

insert  into `our_scholar_details`(`id`,`our_journy_id`,`our_team_id`,`description`,`active`,`created`,`modified`) values 
(6,4,1,'<p>sdfdsf</p>',1,'2024-03-04 18:05:15','2024-03-04 18:05:15');

/*Table structure for table `our_team_types` */

DROP TABLE IF EXISTS `our_team_types`;

CREATE TABLE `our_team_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `our_team_types` */

insert  into `our_team_types`(`id`,`name`,`active`,`created`,`modified`) values 
(1,'Our Team',1,'2024-03-04 10:34:17','2024-03-04 10:34:17'),
(2,'Our Scholars',1,'2024-03-04 10:34:36','2024-03-04 10:34:36'),
(3,'Our Mentors',1,'2024-03-04 12:36:01','2024-03-04 12:36:01');

/*Table structure for table `our_teams` */

DROP TABLE IF EXISTS `our_teams`;

CREATE TABLE `our_teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `expertise` varchar(255) DEFAULT NULL,
  `description` text,
  `image_file` varchar(255) DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `meta_description` text,
  `meta_keywords` text,
  `page_url` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `its_scholar` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

/*Data for the table `our_teams` */

insert  into `our_teams`(`id`,`name`,`order`,`designation`,`expertise`,`description`,`image_file`,`page_slug`,`page_title`,`meta_description`,`meta_keywords`,`page_url`,`active`,`its_scholar`,`created`,`modified`) values 
(1,'Prof. Sampadanada Mishra',2,'Jr Developer','Guide','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. <strong>Excepteur sint occaecat cupidatat non proident</strong>, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>','guide_img01.jpg','prof-sampadanada-mishra','Prof. Sampadanada Mishra','Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',NULL,'http://localhost/project/CakePHP/soil2soul/our_teams/prof-sampadanada-mishra',1,1,'2024-01-16 13:47:08','2024-03-04 14:33:22'),
(2,'Prof. Kulsum Shaikh shetty',1,'QA Tester','A Sanskrit Scholar and Awardee by the President of India','<p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore dolore...</p>','guide_img03.jpg','prof.-kulsum-shaikh-shetty','','',NULL,'http://localhost/project/CakePHP/soil2soul/our_teams/prof.-kulsum-shaikh-shetty',1,1,'2024-01-23 16:44:58','2024-03-06 11:58:31'),
(3,'Prof. Javed Ali',3,'Senior Developer','','<p>Lorem ipsum dolor amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt labore dolore...</p>','guide_img02.jpg','prof-javed-ali','','',NULL,'http://localhost/project/CakePHP/soil2soul/our_teams/prof-javed-ali',1,0,'2024-01-23 16:56:12','2024-03-04 14:45:51'),
(4,'Mr. Kalyan Gullapalli',4,'','','<p><br /> Like most Indians of his generation, Kalyan grew up under the influence of the western education system and its attitudes towards life. Academically inclined, he graduated in &lt;strong&gt;Metallurgical Engineering&lt;/strong&gt; from the N.I.T, Rourkela, post-graduated in &lt;strong&gt;business management&lt;/strong&gt; from S.P.J.I.M.R, Mumbai, and has had a &ldquo;well-settled&rdquo; career in the General Insurance industry. &lt;br&gt;<br />&lt;br&gt;<br />But he is essentially a restless soul. With a million dreams in his mind&rsquo;s eyes, and his feet refusing to stay on the ground, he meandered through life&rsquo;s mundaneness with a thousand questions in his heart. Until one day, he realized two things. One, he is a seeker. And two, he belongs to a land which pioneered the art and science of seeking. That&rsquo;s when he fell in love with Bharat. &lt;br&gt;<br />&lt;br&gt;<br />&lt;strong&gt;Rediscovering Bharat&lt;/strong&gt; is simply a reflection of his personal journey into getting to know himself and his Bharat, with a wish and a desire that all Indians start their own journeys too!</p>\r\n<p>&nbsp;</p>','Kalyanji.jpg','mr.-kalyan-gullapalli','Mr. Kalyan Gullapalli','',NULL,'http://localhost/project/CakePHP/soil2soul/our_teams/mr.-kalyan-gullapalli',1,0,'2024-02-22 14:55:45','2024-03-04 12:37:03');

/*Table structure for table `our_teams_our_journies` */

DROP TABLE IF EXISTS `our_teams_our_journies`;

CREATE TABLE `our_teams_our_journies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_team_id` int(11) DEFAULT NULL,
  `our_journey_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf32;

/*Data for the table `our_teams_our_journies` */

insert  into `our_teams_our_journies`(`id`,`our_team_id`,`our_journey_id`) values 
(1,1,1),
(3,2,1),
(4,1,2),
(6,2,2),
(7,2,3),
(9,2,4),
(10,1,4);

/*Table structure for table `our_teams_our_team_types` */

DROP TABLE IF EXISTS `our_teams_our_team_types`;

CREATE TABLE `our_teams_our_team_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_team_id` int(11) DEFAULT NULL,
  `our_team_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `our_teams_our_team_types` */

insert  into `our_teams_our_team_types`(`id`,`our_team_id`,`our_team_type_id`) values 
(3,2,2),
(4,2,1),
(5,1,1),
(6,3,1),
(7,4,1),
(8,2,3),
(9,1,2),
(10,3,3);

/*Table structure for table `packages` */

DROP TABLE IF EXISTS `packages`;

CREATE TABLE `packages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `short_name` varchar(45) DEFAULT NULL,
  `tag_line` varchar(255) DEFAULT NULL,
  `short_note` varchar(255) DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_title` text,
  `page_url` varchar(255) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `display_on_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf32;

/*Data for the table `packages` */

insert  into `packages`(`id`,`name`,`short_name`,`tag_line`,`short_note`,`page_slug`,`page_title`,`page_url`,`image_file`,`description`,`active`,`display_on_homepage`,`created`,`modified`) values 
(1,'Discover Your Inner Rama','Ramayana','Saryu Se Sagar Tak','“Lorem ipsum dolor sit amet, consectetur adipiscing elit”','discover-your-inner-rama','','http://localhost/project/CakePHP/soil2soul/discover-your-inner-rama-1','gallery_category_04.jpg','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>',1,1,'2024-02-22 15:38:05','2024-03-01 18:59:32'),
(2,'Jyotirlingas of Madhya Pradesh Indore & Ujjain','Jyotirlingas',NULL,NULL,'jyotirlingas-of-madhya-pradesh-indore-and-ujjain','Jyotirlingas of Madhya Pradesh Indore & Ujjain','http://localhost/project/CakePHP/soil2soul/jyotirlingas-of-madhya-pradesh-indore-and-ujjain-2','ujjain-tour-1.jpg','<p>Ujjain is an ancient city beside the Kshipra River in the central Indian state of Madhya Pradesh. An important Hindu pilgrimage destination, it&rsquo;s known for the centuries-old Mahakaleshwar Temple, a towering structure with a distinctively ornate roof. Nearby, Bade Ganesh Temple houses a colorful statue of Ganesh, the elephant-headed Hindu deity. Harsiddhi Temple features a pair of tall dark pillars studded with lamps.</p>',1,1,'2024-02-22 15:43:40','2024-02-27 11:43:15'),
(3,'Kedarnath Yatra','Kedarnath',NULL,NULL,'kedarnath-yatra','kedarnath-yatra','http://localhost/project/CakePHP/soil2soul/kedarnath-yatra-3','kedarnath-mandir-ke-lord-god.jpg','<p>Immerse in the spiritual vibes of Kedarnath with this special package! Worship Bholenath at the prestigious Kedarnath Temple, take a refreshing dip in the Ganga at Haridwar and unwind in the scenic town of Ukhimath.</p>',1,1,'2024-02-22 15:45:31','2024-02-27 11:43:56');

/*Table structure for table `pages` */

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `description` text,
  `image_file` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `pages` */

/*Table structure for table `post_images` */

DROP TABLE IF EXISTS `post_images`;

CREATE TABLE `post_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` int(10) unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `image_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `post_images` */

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `lft` int(10) unsigned DEFAULT NULL,
  `rght` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cover_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `featured_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `template_layout_id` int(10) unsigned NOT NULL,
  `meta_title` varchar(70) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_keyword` varchar(160) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `active` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `posts` */

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text,
  `full_view` tinyint(1) DEFAULT NULL,
  `full_add` tinyint(1) DEFAULT NULL,
  `full_edit` tinyint(1) DEFAULT NULL,
  `full_delete` tinyint(1) DEFAULT NULL,
  `super_config` tinyint(1) DEFAULT NULL,
  `config` tinyint(1) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`description`,`full_view`,`full_add`,`full_edit`,`full_delete`,`super_config`,`config`,`created`,`modified`) values 
(1,'Administrator','Demo description!',1,1,1,1,1,0,'2015-09-23 15:23:38','2022-08-31 10:57:06'),
(2,'Teacher','Demo description!',1,1,1,1,0,0,'2015-10-01 11:34:16','2022-08-31 10:57:56'),
(3,'Report','Demo description!',1,1,1,1,1,0,'2015-10-01 11:34:16','2022-08-31 10:57:42'),
(4,'Backoffice','Demo Description',1,1,1,1,1,0,'2015-10-01 11:34:16','2017-08-16 05:02:12');

/*Table structure for table `salutations` */

DROP TABLE IF EXISTS `salutations`;

CREATE TABLE `salutations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `created` text NOT NULL,
  `modified` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `salutations` */

insert  into `salutations`(`id`,`title`,`created`,`modified`) values 
(8,'Mr.','1661928344','1661928344'),
(9,'Mrs.','1661928353','1661928353'),
(10,'Ms.','1661928364','1661928364'),
(11,'Dr.','1661928374','1661928374'),
(12,'Prof.','1661928384','1661928384'),
(13,'Miss','1662530814','1662530814');

/*Table structure for table `seo_modules` */

DROP TABLE IF EXISTS `seo_modules`;

CREATE TABLE `seo_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) DEFAULT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `page_url` varchar(255) DEFAULT NULL,
  `meta_image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

/*Data for the table `seo_modules` */

insert  into `seo_modules`(`id`,`page_name`,`controller`,`action`,`link`,`page_title`,`meta_keyword`,`meta_description`,`page_url`,`meta_image`,`active`,`created`,`modified`) values 
(38,'Home Page ','dashboards','index','{\"controller\":\"dashboards\", \"action\":\"index\"}','Soil 2 Soul : expeditions : Home Page','Soil 2 Soul : expeditions : Home Page','Soil 2 Soul : expeditions : Home Page','http://localhost/project/CakePHP/soil2soul/',NULL,1,'2024-01-19 12:08:12','2024-01-19 12:08:12'),
(39,'Blogs Index Page','blogs','index','{\"controller\":\"blogs\", \"action\":\"index\"}','Soil 2 Soul : expeditions : Blogs','Soil 2 Soul : expeditions : Blogs','Soil 2 Soul : expeditions : Blogs','http://localhost/project/CakePHP/soil2soul/blogs','thumbnail_ourmentor_collage.jpg',1,'2024-01-19 12:09:11','2024-03-06 17:23:13'),
(40,'Videos','videos','index','{\"controller\":\"videos\", \"action\":\"index\"}','Soil 2 Soul : expeditions : Videos','Soil 2 Soul : expeditions : Videos','Soil 2 Soul : expeditions : Videos','http://localhost/project/CakePHP/soil2soul/videos',NULL,1,'2024-03-12 10:04:53','2024-03-12 10:04:53');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`,`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `settings` */

/*Table structure for table `social_medias` */

DROP TABLE IF EXISTS `social_medias`;

CREATE TABLE `social_medias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon_class` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `social_medias` */

insert  into `social_medias`(`id`,`name`,`icon_class`,`url`,`image_file`,`active`,`created`,`modified`) values 
(1,'Whatsapp','social-whatsapp','#','whatsapp.png',1,'2023-11-27 17:09:54','2024-02-12 12:39:41'),
(2,'Facebook','social-facebook','#','faceb.png',1,'2023-11-27 14:39:03','2024-02-12 12:39:41'),
(3,'Instagram','social-instagram','#','insta.png',1,'2023-11-27 17:10:53','2024-02-12 12:39:42');

/*Table structure for table `template_layouts` */

DROP TABLE IF EXISTS `template_layouts`;

CREATE TABLE `template_layouts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `template_layouts` */

/*Table structure for table `testimonials` */

DROP TABLE IF EXISTS `testimonials`;

CREATE TABLE `testimonials` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `msg` text,
  `image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_display_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `its_video_link` tinyint(1) NOT NULL DEFAULT '0',
  `video_link` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `testimonials` */

insert  into `testimonials`(`id`,`our_journy_id`,`name`,`email`,`mobile`,`country`,`msg`,`image`,`active`,`is_display_homepage`,`its_video_link`,`video_link`,`created`,`modified`) values 
(1,0,'Moin Shaikh','moin@puratech.in','8850860719','India','Each and every place that we visited has its own reverberations. And yes, there were things I witnessed that are still unfathomable to me...','testimonials_img01.jpg',1,1,1,'https://www.youtube.com/embed/Ln6iT8yCtQo?si=i_fJdaTwkANNGSa3','2024-02-05 12:01:02','2024-03-01 14:27:14'),
(2,0,'Prachi Chotu','prachi@puratech.in','9967865756','India','Each and every place that we visited has its own reverberations. And yes, there were things I witnessed that are still unfathomable to me...','testimonials_img02.jpg',1,1,1,'https://www.youtube.com/embed/Ik7PE2XJ-8g?si=A0k3Zb0Vgw1x2fTU','2024-02-05 12:03:01','2024-03-01 14:38:27'),
(3,0,'Vijay Singh','vijay@gmail.com','9967865752','India','Each and every place that we visited has its own reverberations. And yes, there were things I witnessed that are still unfathomable to me...','testimonials_img03.jpg',1,0,0,NULL,'2024-02-05 12:11:22','2024-03-01 14:26:44'),
(4,0,'Nawed Shaikh','nawe@puratech.in','132468790','India',NULL,NULL,1,0,0,NULL,'2024-02-08 11:22:16','2024-03-01 14:26:46');

/*Table structure for table `tour_cost_details` */

DROP TABLE IF EXISTS `tour_cost_details`;

CREATE TABLE `tour_cost_details` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `tour_cost_id` int(11) DEFAULT NULL,
  `tour_cost_type_id` int(11) DEFAULT NULL,
  `currency_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf32;

/*Data for the table `tour_cost_details` */

insert  into `tour_cost_details`(`id`,`our_journy_id`,`tour_cost_id`,`tour_cost_type_id`,`currency_id`,`price`,`active`,`created`,`modified`) values 
(1,1,1,1,67,18000,1,'2024-01-24 17:04:42','2024-02-29 15:58:55'),
(2,1,1,2,67,13000,1,'2024-01-24 17:05:27','2024-02-29 15:58:55'),
(3,1,1,3,67,15000,1,'2024-01-24 17:05:27','2024-02-29 15:58:55'),
(4,1,1,4,67,5000,1,'2024-01-24 17:05:27','2024-02-29 15:58:55'),
(5,1,1,5,67,8000,1,'2024-01-24 17:05:27','2024-02-29 15:58:55'),
(6,1,2,1,67,15000,1,'2024-01-24 17:14:46','2024-02-29 14:50:24'),
(7,1,2,2,67,13000,1,'2024-01-24 17:14:46','2024-02-29 14:50:24'),
(8,1,2,3,67,15000,1,'2024-01-24 17:14:46','2024-02-29 14:50:24'),
(9,1,2,4,67,5000,1,'2024-01-24 17:14:46','2024-02-29 14:50:24'),
(10,1,2,5,67,8000,1,'2024-01-24 17:14:46','2024-02-29 14:50:24'),
(11,1,1,1,148,5,1,'2024-02-29 12:25:18','2024-02-29 15:58:55'),
(12,1,1,2,148,6,1,'2024-02-29 12:26:01','2024-02-29 15:58:55'),
(13,1,1,3,148,10,1,'2024-02-29 12:26:01','2024-02-29 15:58:55'),
(14,1,1,4,148,15,1,'2024-02-29 12:26:01','2024-02-29 15:58:55'),
(15,1,1,5,148,20,1,'2024-02-29 12:26:01','2024-02-29 15:58:55');

/*Table structure for table `tour_cost_types` */

DROP TABLE IF EXISTS `tour_cost_types`;

CREATE TABLE `tour_cost_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf32;

/*Data for the table `tour_cost_types` */

insert  into `tour_cost_types`(`id`,`name`,`active`,`created`,`modified`) values 
(1,'Double/Twin',1,'2024-01-24 14:21:57','2024-01-24 14:27:39'),
(2,'Triple',1,'2024-01-24 14:22:25','2024-01-24 14:22:25'),
(3,'Child Sharing (2-9)	',1,'2024-01-24 14:22:57','2024-01-24 14:22:57'),
(4,'Child Own Room (10-18)	',1,'2024-01-24 14:23:09','2024-01-24 14:23:09'),
(5,'Single Supliment',1,'2024-01-24 14:23:24','2024-01-24 14:23:24'),
(6,'Per Person',0,'2024-03-05 16:25:17','2024-03-05 16:26:13');

/*Table structure for table `tour_costs` */

DROP TABLE IF EXISTS `tour_costs`;

CREATE TABLE `tour_costs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `no_of_seats` varchar(45) DEFAULT NULL,
  `pending_seats` varchar(45) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32;

/*Data for the table `tour_costs` */

insert  into `tour_costs`(`id`,`our_journy_id`,`date`,`no_of_seats`,`pending_seats`,`active`,`created`,`modified`) values 
(1,1,'2024-03-20','4','0',1,'2024-01-18 14:42:34','2024-03-05 15:17:18'),
(3,2,'2024-03-01','5','0',1,'2024-01-25 12:04:22','2024-02-28 12:01:01');

/*Table structure for table `tour_glimpses` */

DROP TABLE IF EXISTS `tour_glimpses`;

CREATE TABLE `tour_glimpses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `our_journy_id` int(11) DEFAULT NULL,
  `amenity_id` int(11) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf32;

/*Data for the table `tour_glimpses` */

insert  into `tour_glimpses`(`id`,`our_journy_id`,`amenity_id`,`description`,`active`,`created`,`modified`) values 
(1,1,1,'<p><strong>04 Nights / 05 Days</strong> - Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>',1,'2024-01-24 11:32:38','2024-03-01 11:19:08'),
(2,1,2,'<p>Varanasi - Temple Tour - Sarnath - Pushkar Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.</p>',1,'2024-01-24 11:48:03','2024-01-24 11:48:12'),
(3,1,3,'<ul>\r\n<li>Varanasi: - <strong>Aashirwad Inn</strong> / Similar (Budget)</li>\r\n<li>Sarnath: - <strong>Yelchiko</strong> / Similar (4 Star)</li>\r\n<li>Pushkar: - <strong>Madin </strong>/ Similar (4 Star)</li>\r\n</ul>',1,'2024-01-24 13:58:08','2024-01-24 13:58:08'),
(4,1,4,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',1,'2024-01-24 13:59:24','2024-01-24 13:59:45'),
(5,1,5,'<p>Lorem ipsum dolor sit amet, consectetur Incididunt ut labore et incididunt Sed do eiusmod tempor incididunt ut laborer</p>',1,'2024-01-24 14:00:29','2024-01-24 14:00:29'),
(6,1,6,'<p>हिंदी, ગુજરાતી, English</p>',1,'2024-01-24 14:00:49','2024-01-24 14:05:23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) DEFAULT NULL,
  `salutation_id` int(11) DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Email Address',
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password_string` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `created_by_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `users_idx_id_name` (`id`,`name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`role_id`,`salutation_id`,`username`,`password`,`password_string`,`first_name`,`last_name`,`name`,`email`,`contact_no`,`image_file`,`active`,`last_login`,`created_by_id`,`created`,`modified`) values 
(1,1,8,'admin@puratech.com','dbeab83d8eb22e42bd0c4878b64e42fbee44540f',NULL,'Super','Admin','Super Admin','admin@puratech.com','8898927606','Prime-Minister.avif',1,'2024-04-17 11:29:10',1,'2022-12-21 10:38:50','2024-04-17 11:29:10');

/*Table structure for table `video_categories` */

DROP TABLE IF EXISTS `video_categories`;

CREATE TABLE `video_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `page_title` varchar(255) DEFAULT NULL,
  `page_slug` varchar(255) DEFAULT NULL,
  `page_url` varchar(255) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `video_categories` */

insert  into `video_categories`(`id`,`order`,`name`,`page_title`,`page_slug`,`page_url`,`image_file`,`active`,`meta_description`,`meta_keyword`,`created`,`modified`) values 
(1,1,'Discover India','','discover-india','http://localhost/project/CakePHP/soil2soul/videos/discover-india','thumbnail_faq_collage.jpg',1,'','','2024-03-06 16:26:33','2024-03-06 17:10:04'),
(2,2,'Tourist Place','','tourist-place','http://localhost/project/CakePHP/soil2soul/videos/tourist-place',NULL,1,'','','2024-03-08 17:54:28','2024-03-08 17:54:28');

/*Table structure for table `videos` */

DROP TABLE IF EXISTS `videos`;

CREATE TABLE `videos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `video_category_id` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_file` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `description` text,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `is_display_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `is_external_link` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `videos` */

insert  into `videos`(`id`,`video_category_id`,`order`,`title`,`image_file`,`video_link`,`description`,`active`,`is_display_homepage`,`is_external_link`,`created`,`modified`) values 
(1,1,1,'Exploring Hampi: UNESCO World Heritage Site','a_journey_beyond.jpg','https://www.youtube.com/embed/Ww2IU-eaKLs?si=8QPJIiFrMJ5SPpVZ','<p>Enter a realm where ancient ruins whisper tales of a glorious past and sacred landscapes inspire profound introspection. Join @Soil2soulexpedition as we delve into the mystical allure of #Hampi, a #UNESCO World #Heritage Site nestled amidst the rocky terrain of #Karnataka, India. <br />Wander through the remnants of a bygone era, where majestic temples and intricately carved monuments stand as testaments to Hampi\'s rich cultural and spiritual heritage. <br />Feel the spiritual resonance of Virupaksha Temple, dedicated to Lord Shiva, where devotees offer prayers amidst intricate architecture and serene surroundings. <br />Traverse the boulder-strewn landscape to explore the enigmatic ruins of the Vijayanagara Empire, where every stone whispers echoes of a glorious past. Immerse yourself in the tranquil ambiance of Hampi\'s sacred water bodies, such as the Tungabhadra River, where moments of reflection and contemplation come effortlessly. <br />Experience the vibrant energy of the local bazaars, where traditional crafts and artifacts echo the timeless traditions of Hampi.</p>',1,1,0,'2024-03-04 15:00:33','2024-04-01 12:50:31'),
(2,2,2,'Unveiling India\'s Vibrant Festivals','festivals.jpg','https://www.youtube.com/embed/0mWV0SSCs7U?si=ZkzNKa3R03O6qB6V','<p>Enter a realm where ancient ruins whisper tales of a glorious past and sacred landscapes inspire profound introspection. Join @Soil2soulexpedition as we delve into the mystical allure of #Hampi, a #UNESCO World #Heritage Site nestled amidst the rocky terrain of #Karnataka, India. <br />Wander through the remnants of a bygone era, where majestic temples and intricately carved monuments stand as testaments to Hampi\'s rich cultural and spiritual heritage. <br />Feel the spiritual resonance of Virupaksha Temple, dedicated to Lord Shiva, where devotees offer prayers amidst intricate architecture and serene surroundings. <br />Traverse the boulder-strewn landscape to explore the enigmatic ruins of the Vijayanagara Empire, where every stone whispers echoes of a glorious past. Immerse yourself in the tranquil ambiance of Hampi\'s sacred water bodies, such as the Tungabhadra River, where moments of reflection and contemplation come effortlessly. <br />Experience the vibrant energy of the local bazaars, where traditional crafts and artifacts echo the timeless traditions of Hampi.</p>',1,1,0,'2024-03-04 16:35:13','2024-03-11 15:18:04'),
(3,1,3,'Discover the Soul of India: Top 10 Spiritual Sanctuaries Await','antaryatra_img01.jpg','https://www.youtube.com/embed/861BF0wJzeA?si=F3oRoU7zSUOLzpNz','<p>This is for Test .</p>',1,1,0,'2024-03-04 16:40:12','2024-03-11 11:00:04'),
(4,NULL,4,'A Divine Journey Through the Shakti Peeths with Soil 2 Soul Expeditions',NULL,'https://www.youtube.com/embed/vcPG0JVkOXw?si=EWYXEe9ua6RJCZFY','<p>This is for Test .</p>',1,1,0,'2024-03-04 16:42:38','2024-03-04 16:59:33'),
(5,NULL,4,'Varanasi Unveiled: Exploring the Spiritual Heart of India',NULL,'https://www.youtube.com/embed/bmXhxk2aR68?si=dfI6XtmaVLcP4eIv','<p>This is for Test .</p>',1,0,0,'2024-03-04 16:47:03','2024-03-04 16:57:37'),
(6,NULL,6,'Soil 2 Soul Expeditions - A Journey Beyond the Ordinary',NULL,'https://www.youtube.com/embed/Ik7PE2XJ-8g?si=7feLrr1LUYeB5v6A','<p>This is for Test .</p>',1,0,0,'2024-03-04 16:48:04','2024-03-04 16:57:38');

/*Table structure for table `videos_blog_tags` */

DROP TABLE IF EXISTS `videos_blog_tags`;

CREATE TABLE `videos_blog_tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `video_id` int(11) DEFAULT NULL,
  `blog_tag_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `videos_blog_tags` */

insert  into `videos_blog_tags`(`id`,`video_id`,`blog_tag_id`) values 
(1,1,2),
(2,1,5);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
