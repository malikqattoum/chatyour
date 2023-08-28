CREATE TABLE `gr_friends_counter` (
  `user_id` bigint(20) NOT NULL,
  `temp_friends_count` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
