CREATE TABLE `gr_coins` (
  `coin_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender_user_id` bigint(20) NOT NULL,
  `receiver_user_id` bigint(20) NOT NULL,
  `coins_amount` int(11) NOT NULL,
  `transaction_type` enum('send','receive', 'grant', 'remove', 'purchase') NOT NULL,
  `transaction_date` datetime NOT NULL,
  PRIMARY KEY (`coin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;