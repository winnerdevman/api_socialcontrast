<?php $query = "CREATE TABLE IF NOT EXISTS `post_comment`(`id` int(10) NOT NULL auto_increment,  `post_id1` int(11) NOT NULL,  `photo2` varchar(300) NOT NULL,  `description` text NOT NULL,  `created_id` int NULL,  `created_at` datetime NULL,  `updated_id` int NULL,  `updated_at` timestamp,PRIMARY KEY(`id`)); alter table `post_comment` add foreign key (`post_id1`) references posts (id);" ?>