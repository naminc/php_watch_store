<?php
if(empty($DB->num_rows("SELECT * FROM `system` WHERE 1"))){
    $DB->query('CREATE TABLE `system` (
     `id` int(6) UNSIGNED NOT NULL,
     `title` text NOT NULL,
     `domain` text NOT NULL,
     `keyword` text NOT NULL,
     `idfb` text NOT NULL,
     `phone` text NOT NULL,
     `admin` text NOT NULL,
     `docquyen` text NOT NULL,
     `username` varchar(32) NOT NULL,
     `noti` text NOT NULL,
     `run` varchar(32) NOT NULL
   ) ENGINE=MyISAM DEFAULT CHARSET=utf8;');
   $DB->query("INSERT INTO `system` (`id`, `title`, `domain`, `keyword`, `idfb`, `phone`, `admin`, `username`, `docquyen`,`noti`, `run`) VALUES
   (0, 'SellClone', 'TranCongThanh.Online', 'Hệ thống bán clone Facebook uy tín - chất lượng số 1 Việt Nam', '4', '0777482707', 'Trần Công Thành', 'trancongthanh', 'Trần Công Thành', 'Chào mừng bạn đến với hệ thống, chúc bạn sử dụng dịch vụ vui vẻ','on')");
}
if(empty($DB->num_rows("SELECT * FROM `recharge_momo` WHERE 1"))){
  $DB->query('CREATE TABLE `recharge_momo` (
   `id` int(6) UNSIGNED NOT NULL,
   `stk` text NOT NULL,
   `ctk` text NOT NULL,
   `email` text NOT NULL,
   `password` text NOT NULL
 ) ENGINE=MyISAM DEFAULT CHARSET=utf8;');
 $DB->query("INSERT INTO `recharge_momo` (`id`, `stk`, `ctk`, `email`, `password`) VALUES
 (0, '0777482707','Trần Công Thành','trancongthanhahihi@gmail.com','trancongthanh')");
}
if(empty($DB->num_rows("SELECT * FROM `users` WHERE 1"))){
  $DB->query('CREATE TABLE `users` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
    `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `cash` bigint(20) NOT NULL,
    `auth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `date` datetime NOT NULL DEFAULT current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');
}
if(empty($DB->num_rows("SELECT * FROM `history_login` WHERE 1"))){
  $DB->query('CREATE TABLE `history_login` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `useragent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
    `date` datetime NOT NULL DEFAULT current_timestamp()
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');
}
if(empty($DB->num_rows("SELECT * FROM `type_domain` WHERE 1"))){
  $DB->query('CREATE TABLE `type_domain` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `value` text COLLATE utf8_unicode_ci NOT NULL,
    `rate` int(11) NOT NULL,
    `note` text COLLATE utf8_unicode_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');
}
if(empty($DB->num_rows("SELECT * FROM `history_buy_domain` WHERE 1"))){
  $DB->query('CREATE TABLE `history_buy_domain` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `type` text COLLATE utf8_unicode_ci NOT NULL,
    `value` text COLLATE utf8_unicode_ci NOT NULL,
    `rate` int(11) NOT NULL,
    `domain_name` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
    `time` int(11) NOT NULL,
    `nameserver` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `socket_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
    `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
    PRIMARY KEY (`id`)
   ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci');
}
if(empty($DB->num_rows("SELECT * FROM `history_recharge_momo` WHERE 1"))){
  $DB->query('CREATE TABLE `history_recharge_momo` (
    `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `transaction_code` bigint(11) NOT NULL,
    `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
    `phone` int(11) NOT NULL,
    `cash` bigint(20) NOT NULL,
    `mess` text COLLATE utf8_unicode_ci NOT NULL,
    `date` text COLLATE utf8_unicode_ci NOT NULL,
    `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;');
}
?>