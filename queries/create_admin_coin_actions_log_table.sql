CREATE TABLE `gr_admin_coin_actions_log` (
  `log_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `target_user_id` bigint(20) NOT NULL,
  `action_type` enum('send','receive','grant','remove','ban send','unban send', 'ban receive','unban receive', 'purchase') NOT NULL,
  `coins_amount` int(11) NOT NULL,
  `deleted_by` JSON DEFAULT NULL,
  `action_date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;