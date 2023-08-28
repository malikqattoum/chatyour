CREATE TABLE `gr_user_coins` (
  `user_id` bigint(20) NOT NULL,
  `coins_balance` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_coins_user_id` FOREIGN KEY (`user_id`) REFERENCES `gr_site_users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;