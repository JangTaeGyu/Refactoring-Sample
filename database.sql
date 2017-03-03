# Database 생성
create database development;

use mysql;

# 계정 확인
select * from user;

# 계정 생성
create user noise@localhost identified by '#cosmos01!';

# Database 계정 권한 부여
grant all privileges on board.* to noise@localhost;

# 권한 확인
show grants for noise@localhost;

# User 테이블 생성
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
