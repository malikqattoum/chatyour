ALTER TABLE chatyour_toto.gr_site_users
ADD is_banned_send_coins TINYINT(1) NOT NULL DEFAULT 0,
ADD is_banned_receive_coins TINYINT(1) NOT NULL DEFAULT 0,
ADD coins_banned_by_user_id INT NOT NULL DEFAULT 0;